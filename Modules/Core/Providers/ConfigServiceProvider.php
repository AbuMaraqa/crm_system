<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Providers;

use Filament\Actions\StaticAction;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Support\Facades\FilamentColor;
use Filament\Support\Facades\FilamentView;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Filament\Forms\Components\Flatpickr;
use Modules\Core\Services\Settings\ApplicationSettings;
use Modules\Core\Services\Settings\SettingRegistrar;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class ConfigServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot(SettingRegistrar $settingLoader)
    {

        $this->app->singleton(SettingRegistrar::class, function (Application $app) use ($settingLoader) {
            return $settingLoader;
        });

        $this->app->singleton(ApplicationSettings::class, function (Application $app) {
            return new ApplicationSettings();
        });

        app(ApplicationSettings::class)->initializSettings();

        // $this->app->bind(BaseNotification::class, DatabaseNotifications::class);

        FilamentView::spa(false);

        Section::configureUsing(function (Section $section) {
            $section->collapsible();
        });

        Textarea::configureUsing(function (Textarea $textarea) {
            return $textarea->autosize();
        });

        PhoneInput::configureUsing(function (PhoneInput $phoneInput) {

            $applicationSettings = app(ApplicationSettings::class);

            $initialCountry = $applicationSettings->getValue('app_phone_initial_country');

            $initialCountry = $initialCountry ? $initialCountry : 'PS';

            return $phoneInput
                ->initialCountry($initialCountry)
                ->rule('phone');
        });

        // MountableAction::configureUsing(function(MountableAction $action){
        //     $action->extraAttributes([
        //         'wire:navigate'=>'',
        //     ],true);
        // });

        FileUpload::macro('pdfOrImage', function (): static {
            $this
                ->helperText(__('Allowed File Types') . ': png, jpg, jpeg, webp, pdf')
                ->acceptedFileTypes([
                    'image/png',
                    'image/jpeg',
                    'image/jpg',
                    'image/webp',
                    'application/pdf',
                ]);

            return $this;
        });

        FileUpload::macro('onlyImage', function (): static {
            $this
                ->helperText(__('Allowed File Types') . ': png, jpg, jpeg, webp')
                ->acceptedFileTypes([
                    'image/png',
                    'image/jpeg',
                    'image/jpg',
                    'image/webp',
                ]);

            return $this;
        });

        Select::configureUsing(function (Select $select): void {
            $select->extraAttributes([
                'x-cloak' => '',
                'style'   => 'min-height: 36px;',
            ]);
        });

        Radio::macro('cardStyle', function (): static {
            $this->extraAttributes([
                'class' => 'radio-card',
            ], true);

            return $this;
        });

        $this->booted(function () {
            $applicationSettings = app(ApplicationSettings::class);

            $dateTimeFormat = $applicationSettings->getValue('datetime_format', 'd M, Y (h:i A)');
            $dateFormat     = $applicationSettings->getValue('date_format', 'd M, Y');
            $timeFormat     = $applicationSettings->getValue('time_format', 'H:i:s');

            Table::$defaultTimeDisplayFormat    = $timeFormat;
            Infolist::$defaultTimeDisplayFormat = $timeFormat;

            Table::$defaultDateDisplayFormat    = $dateFormat;
            Infolist::$defaultDateDisplayFormat = $dateFormat;

            Table::$defaultDateTimeDisplayFormat    = $dateTimeFormat;
            Infolist::$defaultDateTimeDisplayFormat = $dateTimeFormat;
        });

        DatePicker::configureUsing(function (DatePicker $datePicker) {
            $datePicker->displayFormat(Table::$defaultDateDisplayFormat);
        });

        Table::configureUsing(function (Table $table): void {
            $table->defaultSort('created_at', 'desc')
                ->paginated([1, 5, 10, 25, 50, 100])
                ->defaultPaginationPageOption(25)
                ->searchDebounce('1000ms')
                ->searchOnBlur()
                ->emptyStateHeading(__('There are no records.'));
        });

        TextColumn::configureUsing(function (TextColumn $textColumn): void {
            $textColumn
                ->placeholder(__('None'))
                ->weight('semibold')
                ->size('xs');
        });

        ImageColumn::configureUsing(function (ImageColumn $imageColumn): void {
            $imageColumn
                ->extraAttributes([
                    'class' => 'image-column',
                ]);
        });

        TextEntry::configureUsing(function (TextEntry $textEntry): void {
            $textEntry
                ->placeholder(__('None'))
                ->weight('semibold')
                ->size('xs');
        });

        Flatpickr::configureUsing(function (Flatpickr $flatpickr): void {
            $flatpickr
                ->formatStateUsing(function (?string $state) use ($flatpickr) {
                    if ($flatpickr->isTime()) {
                        return $state;
                    }

                    if ($flatpickr->isMonthSelect()) {
                        return $state;
                    }

                    return $state ? Carbon::parse($state)->format('d/m/Y') : '';
                })
                // ->rule('date_format:d/m/Y')
                ->use24hr()
                ->autocomplete(false)
                ->animate()
                ->dateFormat('Y-m-d')
                ->allowInput();
        });

        ViewAction::configureUsing(function (ViewAction $viewAction): void {
            $viewAction
                ->extraAttributes([
                    'class' => 'font-meduim',
                ], true);
        });

        Builder::configureUsing(function (Builder $builder): void {
            $builder->addAction(function (Action $action) {
                return $action->color('primary');
            });
        });

        Repeater::configureUsing(function (Repeater $repeater): void {
            $repeater->addAction(function (Action $action) {
                return $action->color('primary')
                    ->icon('heroicon-m-plus');
            });
        });

        Notification::configureUsing(function (Notification $notification): void {
            $notification->view('core::components.notifications.notification');
        });


        FilamentColor::register([
            'primary'   => [
                50  => '#484AF9',
                100 => '#3437F9',
                200 => '#0D10F7',
                300 => '#0709D5',
                400 => '#0607AD',
                500 => '#040686',
                600 => '#03045E',
                700 => '#010228',
                800 => '#000000',
                900 => '#000000',
                950 => '#000000',
            ],
            'secondary' => [
                50  => '#FFFFFF',
                100 => '#FFFFFF',
                200 => '#FFFFFF',
                300 => '#FFFFFF',
                400 => '#FFFFFF',
                500 => '#FFFFFF',
                600 => '#EBEFF4',
                700 => '#C7D2E0',
                800 => '#A3B5CC',
                900 => '#7E98B8',
                950 => '#6C8AAE',
            ],
            'success'   => [
                50  => '#8CF5D2',
                100 => '#79F3CB',
                200 => '#53F0BC',
                300 => '#2EEDAE',
                400 => '#13DF9B',
                500 => '#10B981',
                600 => '#0C855D',
                700 => '#075239',
                800 => '#031E15',
                900 => '#000000',
                950 => '#000000',
            ],
            'warning'   => [
                50  => '#FFE2B8',
                100 => '#FFDAA3',
                200 => '#FFC97A',
                300 => '#FFB952',
                400 => '#FFA829',
                500 => '#FF9800',
                600 => '#C77700',
                700 => '#8F5500',
                800 => '#573400',
                900 => '#1F1200',
                950 => '#030200',
            ],
            'pending'   => [
                50  => '#FAC9B4',
                100 => '#F9BBA1',
                200 => '#F79F7A',
                300 => '#F48354',
                400 => '#F2672E',
                500 => '#E84E0E',
                600 => '#C2410C',
                700 => '#8D2F09',
                800 => '#581E05',
                900 => '#240C02',
                950 => '#090301',
            ],
            'danger'    => [
                50  => '#F5C0C0',
                100 => '#F3AEAE',
                200 => '#ED8B8B',
                300 => '#E86767',
                400 => '#E34444',
                500 => '#DC2121',
                600 => '#B91C1C',
                700 => '#881515',
                800 => '#580D0D',
                900 => '#270606',
                950 => '#0E0202',
            ],
            'dark'      => [
                50  => '#7D95BD',
                100 => '#6F8AB6',
                200 => '#5574A7',
                300 => '#47618C',
                400 => '#3A4F71',
                500 => '#2C3C56',
                600 => '#1E293B',
                700 => '#0B0F16',
                800 => '#000000',
                900 => '#000000',
                950 => '#000000',
            ],
            'cerulean'  => [
                50  => '#D9F3FF',
                100 => '#C5ECFE',
                200 => '#9CDFFE',
                300 => '#74D3FD',
                400 => '#4CC6FD',
                500 => '#23B9FC',
                600 => '#03A9F4',
                700 => '#0283BD',
                800 => '#025C85',
                900 => '#01364E',
                950 => '#012332',
            ],
        ]);

        Wizard::configureUsing(function (Wizard $wizard): void {
            $wizard
                ->submitAction(
                    new HtmlString(
                        Blade::render(
                            <<<'BLADE'
                                    <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end"
                                         wire:key="{{ rand() }}">
                                        <x-filament::button type="submit" size="md" wire:target="save" data-tw-merge color="primary"
                                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary">
                                            @lang('Save Changes')
                                        </x-filament::button>
                                    </div>
                                BLADE
                        )
                    )
                )
                ->nextAction(
                    fn(Action $action) => $action
                        ->extraAttributes(['class' => 'fi-fo-wizard-next-action-btn'])
                        ->label(__('Next Step'))
                        ->icon('eos-keyboard-double-arrow-left')
                        ->color('secondary')
                )
                ->previousAction(
                    fn(Action $action) => $action
                        ->extraAttributes(['class' => 'fi-fo-wizard-previous-action-btn'])
                        ->label(__('Previous Step'))
                        ->icon('eos-keyboard-double-arrow-right')
                        ->color('secondary')
                );
        });

        ToggleColumn::configureUsing(function (ToggleColumn $toggleColumn): void {
            $toggleColumn
                ->onColor('success')
                ->offColor('danger')
                ->onIcon('iconoir-check')
                ->offIcon('iconoir-xmark');
        });

        Toggle::configureUsing(function (Toggle $toggle): void {
            $toggle
                ->onColor('success')
                ->onIcon('iconoir-check')
                ->offIcon('iconoir-xmark');
        });

        ViewAction::macro('viewActionCommonConfiguration', function (): static {
            $this
                ->hiddenLabel()
                ->extraAttributes([
                    'class' => 'fi-ta-view-action-btn',
                    'title' => __('View'),
                ])
                ->modalCancelAction(fn(StaticAction $action) => $action->color('secondary')->extraAttributes(['class' => 'transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 !text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 !dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80']))
                ->button();

            return $this;
        });

        EditAction::macro('editActionCommonConfiguration', function (): static {
            $this
                ->hiddenLabel()
                ->extraAttributes([
                    'class' => 'fi-ta-edit-action-btn tooltip',
                    'title' => __('Edit'),
                ])
                ->button();

            return $this;
        });

        DeleteAction::macro('deleteActionCommonConfiguration', function (): static {
            $this
                ->hiddenLabel()
                ->extraAttributes([
                    'class' => 'fi-ta-delete-action-btn tooltip',
                    'title' => __('Delete'),
                ])
                ->button();

            return $this;
        });

        RestoreAction::macro('restoreActionCommonConfiguration', function (): static {
            $this
                ->hiddenLabel()
                ->extraAttributes([
                    'class' => 'fi-ta-restore-action-btn tooltip',
                    'title' => __('Restore'),
                ])
                ->button();

            return $this;
        });
    }
}
