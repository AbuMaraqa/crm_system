<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Laravel\Sanctum\HasApiTokens;
use Laravolt\Avatar\Facade as Avatar;
use Modules\Core\Contracts\ActivityLogsContract;
use Modules\Core\Custom\ActivityLog\Traits\LogsActivity;
use Modules\Core\Custom\Query\Traits\SoftDeletes;
use Modules\Core\Custom\VerificationCode\Contracts\HasVerificationCodes as HasVerificationCodesContract;
use Modules\Core\Custom\VerificationCode\Traits\HasVerificationCodes;
use Modules\Core\database\factories\UserFactory;
use Modules\Core\Enums\UserRole;
use Modules\Core\Events\UserDeleted;
use Modules\Core\Events\UserRestored;
use Modules\Core\Events\UserSaved;
use Modules\Core\Notifications\Auth\ResetPasswordByUrlTokenNotification;
use Modules\Core\Notifications\Auth\VerifyEmailNotification;
use Modules\Core\Services\Localization\Localization;
use Modules\Core\Traits\ActiveStatus;
use Modules\Core\Traits\HasPhoneNumber;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Throwable;

class User extends Authenticatable implements ActivityLogsContract, HasMedia, HasVerificationCodesContract, MustVerifyEmail
{
    use ActiveStatus;
    use CausesActivity;
    use HasApiTokens;
    use HasFactory, Notifiable;
    use HasPhoneNumber;
    use HasRoles;
    use HasVerificationCodes;
    use InteractsWithMedia;
    use LogsActivity;
    use SoftDeletes;

    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'email',
        'status',
        'notes',
        'password',
        'phone_number',
        'fcm_token',
        'email_verified_at',
        'current_role_id',
        'preferences',
    ];

    protected $appends = ['avatar'];

    protected $with = ['media', 'currentRole'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime:Y-m-d H:i:s',
        'status' => 'boolean',
        'preferences' => 'array',
    ];

    protected $dispatchesEvents = [
        'deleted' => UserDeleted::class,
        'restored' => UserRestored::class,
        'saved' => UserSaved::class,
    ];

    public function getAvatarAttribute()
    {
        return $this->getAvatarUrl('avatar-lg');
    }

    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('Users')
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->setDescriptionForEvent(fn (string $eventName) => "User [ID: {$this->id}, Name: {$this->name}] has been {$eventName}")
            ->logExcept(['current_role_id'])
            ->dontLogIfAttributesChangedOnly(['current_role_id', 'updated_at']);
    }

    public function getProfileRouteName(): string
    {
        return 'dashboard.account.profile';
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify((new ResetPasswordByUrlTokenNotification($token))
            ->locale(Localization::getCurrentLocale()));
    }

    public function sendEmailVerificationNotification(): void
    {
        $this->notify((new VerifyEmailNotification())
            ->locale(Localization::getCurrentLocale()));
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function history()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function currentRole(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'current_role_id');
    }

    public function updateCurrentRole(): void
    {
        if ($this->current_role_id === null || ! $this->roles->contains('id', $this->current_role_id)) {

            $this->update([
                'current_role_id' => $this->roles?->first()?->id,
            ]);

            $this->refresh();
        }
    }

    /**
     * Determine if the model has, via roles, the given permission.
     */
    protected function hasPermissionViaRole(Permission $permission): bool
    {
        $this->updateCurrentRole();

        $this->loadMissing(['roles', 'currentRole']);

        return $this->hasRole($permission->roles) && $permission->roles->contains($this->currentRole->getKeyName(), $this->currentRole->getKey());
    }

    public function isAccountBlocked(): bool
    {
        return ($this instanceof MustVerifyEmail && ! $this->hasVerifiedEmail()) ||
            ! $this->isInfromationInCompleted() ||
            ! $this->isAccountActive();
    }

    public function isInfromationInCompleted(): bool
    {
        return $this->phone_number !== null;
    }

    public function isAccountActive(): bool
    {
        return $this->status;
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('dashboard-users-avatar')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {

                $this->addMediaConversion('avatar-lg')
                    ->fit(Manipulations::FIT_STRETCH, 300, 300)
                    ->format(Manipulations::FORMAT_WEBP);

                $this->addMediaConversion('avatar-md')
                    ->fit(Manipulations::FIT_STRETCH, 160, 160)
                    ->format(Manipulations::FORMAT_WEBP);

                $this->addMediaConversion('avatar-sm')
                    ->fit(Manipulations::FIT_STRETCH, 32, 32)
                    ->format(Manipulations::FORMAT_WEBP);
            });
    }

    public function addAvatar($image, bool $syncWithCustomerUser = true): self
    {
        try {
            $basicName = pathinfo($image, PATHINFO_FILENAME);
            if (empty($basicName)) {
                $fileName = hash('sha256', $this->name.microtime());
            } else {
                $fileName = pathinfo($image, PATHINFO_FILENAME).'_'.time();
            }
        } catch (Throwable) {
            $fileName = hash('sha256', $this->name.microtime());
        }

        $stream = Image::make($image)
            ->encode('webp')
            ->stream();

        $this->addMediaFromStream($stream)
            ->usingFileName($fileName.'.webp')
            ->usingName($this->name)
            ->toMediaCollection('dashboard-users-avatar');

        return $this;
    }

    public function getAvatarUrl(string $fileName = ''): ?string
    {

        if ($this->getMedia('dashboard-users-avatar')->count() > 0) {
            try {
                return $this->getMedia('dashboard-users-avatar')->last()->getFullUrl($fileName);
            } catch (Throwable $th) {
            }
        }

        return null;
    }

    public function generateAvatar()
    {
        $backgroundColor = $this->randomColor();

        $this->addAvatar(Avatar::create($this->name)
            ->setBackground($backgroundColor)
            ->getImageObject());
    }

    public function randomColorPart()
    {
        return str_pad(dechex(mt_rand(0, 127)), 2, '0', STR_PAD_LEFT);
    }

    public function randomColor()
    {
        return $this->randomColorPart().$this->randomColorPart().$this->randomColorPart();
    }

    public function getRecordLabel(): string
    {
        $trans = 'trans';

        return <<<Html
            <ul class="space-y-1">
                <li class="text-gray-500 font-bold text-xs">
                    {$trans('Type')}: {$trans('User')}
                </li>
                <li class="text-gray-500 font-bold text-xs">
                    {$trans('ID')}: {$this->id}
                </li>
                <li>{$trans('Name')}: {$this->name}</li>
            </ul>
        Html;
    }

    public function getRecordUrl(): ?string
    {
        return route('dashboard.user_management.users.edit', $this->id);
    }

    public function canImpersonate(): bool
    {
        return true;
    }

    public function canBeImpersonated()
    {
        return true;
    }

    public static function firstOrCreateSuperUser(array $findArray, array $appends): static
    {
        if ($superAdmin = self::where($findArray)->withTrashed()->first()) {
            $superAdmin->restore();

            return $superAdmin;
        }

        $superAdmin = self::create($findArray + $appends);

        $superAdmin->markEmailAsVerified();

        $superAdmin->syncRoles(UserRole::SuperAdmin->value);

        $superAdmin->generateAvatar();

        return $superAdmin;
    }

    public function renderAsTableColumn(bool $hasLinkToUser = true,bool $hasEmail = true): string
    {

        $name = <<<LABEL
                        <span class="text-xs font-semibold text-primary-600 dark:text-primary-400">{$this->name}</span>
                    LABEL;

        if ($hasLinkToUser) {
            $url = route('dashboard.user_management.users.view', $this->id);
            $name = <<<LABEL
                <a href="{$url}" class="text-xs font-semibold text-primary-600 dark:text-primary-400 transition focus:outline-none hover:underline dark:hover:underline focus:underline dark:focus:underline">{$this->name}</a>
            LABEL;
        }

        $email = '';
        if ($hasEmail) {
            $email = <<<LABEL
                <span class="text-xs text-gray-500 dark:text-gray-400">{$this->email}</span>
            LABEL;
        }

        $avatarUrl = $this->getAvatarUrl('avatar-lg');
        $avatarClass = '';
        if (blank($avatarUrl)) {
            $avatarUrl = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNgYAAAAAMAASsJTYQAAAAASUVORK5CYII=';
            $avatarClass = '';
        }

        $status = '';
        if ($this->trashed()) {
            $status = "<span class='text-red-500 text-xs'>(".__('Deleted').')</span>';
        }

        if ($this->disabled()) {
            $status = "<span class='text-yellow-500 text-xs'>(".__('Disabled').')</span>';
        }

        return <<<LABEL
                    <div class="w-max flex items-center employee gap-2">
                        <img loading="lazy" class="$avatarClass bg-gray-200/60 dark:bg-gray-800 w-10 h-10 rounded-full" src="{$avatarUrl}"/>
                        <div class="flex flex-col gap-0">
                            <div>{$name} {$status}</div>
                            $email
                        </div>
                    </div>
                LABEL;
    }

    public function renderAsHistoryTableColumn(): string
    {
        $url = route('dashboard.user_management.users.view', $this->id);

        $avatarUrl = $this->getAvatarUrl('avatar-lg');
        $avatarClass = '';
        if (blank($avatarUrl)) {
            $avatarUrl = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNgYAAAAAMAASsJTYQAAAAASUVORK5CYII=';
            $avatarClass = '';
        }

        $status = '';
        if ($this->trashed()) {
            $status = "<span class='text-red-500 text-xs'>(".__('Deleted').')</span>';
        }

        if ($this->disabled()) {
            $status = "<span class='text-yellow-500 text-xs'>(".__('Disabled').')</span>';
        }

        return <<<LABEL
                    <div class="w-max flex items-center gap-2">
                        <img loading="lazy" class="$avatarClass bg-gray-200/60 dark:bg-gray-800 w-10 h-10 rounded-full" src="{$avatarUrl}"/>
                        <div>
                            <a href="{$url}" class="text-xs font-semibold text-primary-600 dark:text-primary-400 focus:outline-none transition hover:underline dark:hover:underline focus:underline dark:focus:underline">
                                {$this->name} {$status}
                            </a>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{$this->email}</div>
                        </div>
                    </div>
                LABEL;
    }
}
