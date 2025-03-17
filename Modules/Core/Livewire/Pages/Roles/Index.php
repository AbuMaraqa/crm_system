<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Roles;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Modules\Core\Entities\Role;
use Modules\Core\Filament\Tables\Actions\ActivitiesAction;
use Modules\Core\Filament\Tables\Columns\EventAtColumn;
use Modules\Core\View\Components\AppLayouts;

class Index extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Roles'))
            ->query(Role::with(['permissions']))
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->sortable(),

                EventAtColumn::make('created_at')
                    ->toggleable(false)
                    ->createdAt(),

                EventAtColumn::make('updated_at')
                    ->toggleable(false)
                    ->updatedAt(),

            ])

            ->actions([
                ActivitiesAction::make('activities'),

                EditAction::make()
                    ->url(fn (Role $role): string => route('dashboard.user_management.roles.edit', $role->id))
                    ->visible(fn (): bool => auth()->user()->can('dashboard.user_management.roles.edit'))
                    ->editActionCommonConfiguration(),

                DeleteAction::make()
                    ->modalHeading(__('Delete Role'))
                    ->visible(fn (): bool => auth()->user()->can('dashboard.user_management.roles.delete'))
                    ->deleteActionCommonConfiguration(),

            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make('DeleteBulkAction')
                        ->modalHeading(__('Delete selected roles'))
                        ->visible(fn (): bool => auth()->user()->can('dashboard.user_management.roles.delete.bulk')),
                ])
                    ->visible(fn (): bool => auth()->user()->canany(['dashboard.user_management.roles.delete.bulk'])),
            ])
            ->headerActions([
                CreateAction::make('create')
                    ->label(__('Create Role'))
                    ->url(route('dashboard.user_management.roles.create'))
                    ->visible(fn (): bool => auth()->user()->can('dashboard.user_management.roles.create'))
                    ->extraAttributes([
                        'class' => 'fi-ta-create-action-btn',
                    ])
                    ->button(),

            ]);
    }

    public function render()
    {
        return view('core::livewire.pages.roles.index')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Roles'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.user_management.roles') => __('Roles'),
                ],
            ]);
    }
}
