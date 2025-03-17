<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/23/24, 9:35 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Users;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Livewire\Component;
use Modules\Core\Entities\User;
use Modules\Core\Facades\UserHelper;
use Modules\Core\Filament\Tables\Actions\ActivitiesAction;
use Modules\Core\Filament\Tables\Actions\Impersonate;
use Modules\Core\Filament\Tables\Columns\EventAtColumn;
use Modules\Core\Filament\Tables\Filters\DisabledFilter;
use Modules\Core\Services\Formatters\Phone;
use Modules\Core\View\Components\AppLayouts;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        // If authenticated user is not super admin (First User), then show only users without first user
        $query = User::with(['roles'])->when(auth()->user()->id != 1, function ($query) {
            $query->where('id', '!=', 1);
        });

        return $table
            ->heading(__('Users'))
            ->query($query)
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->formatStateUsing(function (User $user): string {
                        return $user->renderAsTableColumn();
                    })
                    ->html()
                    ->wrap()
                    ->searchable(['name', 'email'])
                    ->sortable(),

                TextColumn::make('phone_number')
                    ->label(__('Phone'))
                    ->formatStateUsing(function (string $state) {
                        return Phone::make()->state($state)->renderAsHtml();
                    })
                    ->html()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('roles.name')
                    ->label(__('Roles'))
                    ->badge()
                    ->color('info')
                    ->separator(',')
                    ->searchable(),

                TextColumn::make('status')
                    ->label(__('Status'))
                    ->formatStateUsing(function (User $user): string {
                        return UserHelper::renderStatusAsHtml($user);
                    })
                    ->html()
                    ->searchable(),

                EventAtColumn::make('created_at')
                    ->createdAt(),

                EventAtColumn::make('updated_at')
                    ->updatedAt(),

            ])
            ->filters([
                TrashedFilter::make()
                    ->visible(auth()->user()->can('dashboard.user_management.users.filters.trashed')),

                DisabledFilter::make()
                    ->visible(auth()->user()->can('dashboard.user_management.users.filters.disabled')),

            ])
            ->actions([

                ActivitiesAction::make('activities'),

                Impersonate::make()
                    ->label(__('Login'))
                    ->hiddenLabel()
                    ->requiresConfirmation()
                    ->backTo(route('dashboard.user_management.users'))
                    ->link()
                    ->authorize('dashboard.user_management.users.impersonate')
                    ->icon('ri-login-box-line')
                    ->extraAttributes([
                        'class' => 'fi-ta-login-action-btn tooltip',
                        'title' => __('Login'),
                    ])
                    ->button(),

                ViewAction::make()
                    ->url(fn(User $user) => route('dashboard.user_management.users.view', $user->id))
                    ->visible(fn(): bool => auth()->user()->can('dashboard.user_management.users.view'))
                    ->viewActionCommonConfiguration(),

                EditAction::make()
                    ->url(fn(User $user) => route('dashboard.user_management.users.edit', $user->id))
                    ->visible(fn(): bool => auth()->user()->can('dashboard.user_management.users.edit'))
                    ->editActionCommonConfiguration(),

                DeleteAction::make()
                    ->modalHeading(__('Delete User'))
                    ->visible(function (User $user): bool {
                        return auth()->user()->can('dashboard.user_management.users.delete') &&
                            !$user->deleted_at;
                    })
                    ->deleteActionCommonConfiguration(),

                RestoreAction::make()
                    ->modalHeading(__('Restore User'))
                    ->visible(function (User $user): bool {
                        return auth()->user()->can('dashboard.user_management.users.user') &&
                            $user->deleted_at;
                    })
                    ->restoreActionCommonConfiguration(),

            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make('DeleteBulkAction')
                        ->modalHeading(__('Delete selected Users'))
                        ->visible(fn(): bool => auth()->user()->can('dashboard.user_management.users.delete.bulk')),
                ])
                    ->visible(fn(): bool => auth()->user()->canany(['dashboard.user_management.users.delete.bulk'])),

            ])->headerActions([
                $this->createAction(),
            ])
            ->emptyStateDescription(__('Create a user to get started.'));
    }

    private function createAction(): CreateAction
    {
        return CreateAction::make('create')
            ->label(__('Create User'))
            ->url(fn() => route('dashboard.user_management.users.create'))
            ->visible(fn(): bool => auth()->user()->can('dashboard.user_management.users.create'))
            ->extraAttributes([
                'class' => 'fi-ta-create-action-btn',
            ])
            ->button();
    }

    public function render()
    {
        return view('core::livewire.pages.users.index')
            ->layout(AppLayouts::class, [
                'pageTitle'   => __('Users'),
                'breadcrumbs' => [
                    route('dashboard.home')                  => __('Home'),
                    route('dashboard.user_management.users') => __('Users'),
                ],
            ]);
    }
}
