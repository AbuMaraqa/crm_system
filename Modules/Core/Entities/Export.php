<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Core\Custom\Query\Traits\SoftDeletes;
use Modules\Core\Enums\ExportStatus;
use Modules\Core\Enums\ExportType;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Export extends Model implements HasMedia
{
    use InteractsWithMedia;
    use SoftDeletes;

    protected $table = 'exports';

    protected $fillable = [
        'name',
        'description',
        'exported_by',
        'export_status',
        'export_type',
    ];

    protected $casts = [
        'export_status' => ExportStatus::class,
        'export_type' => ExportType::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'exported_by');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('export-attachments')
            ->singleFile()
            ->useDisk('exports');
    }

    public function addFile(string $file): self
    {
        $extension = $this->export_type->getExtension();

        $this
            ->addMediaFromString($file)
            ->usingFileName($this->name.'.'.time().".{$extension}")
            ->toMediaCollection('export-attachments');

        return $this;
    }
}
