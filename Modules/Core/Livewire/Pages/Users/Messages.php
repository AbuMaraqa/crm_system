<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Livewire\Pages\Users;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Modules\Core\Custom\Query\QueryContainer;
use Modules\Core\Entities\Message;
use Modules\Core\Entities\User;
use Modules\Core\Enums\MessageSeverity;
use Modules\Core\Enums\MessageStatus;
use Modules\Core\Filament\Tables\Columns\EventAtColumn;
use Modules\Core\View\Components\AppLayouts;

class Messages extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    #[Locked]
    public int $userID;

    public function mount($user)
    {
        $this->userID = $user;
    }

    #[Computed()]
    public function user(): User
    {
        return User::findOrFail($this->userID);
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('Messages'))
            ->relationship(fn (): HasMany => $this->user->messages())
            ->columns([

                TextColumn::make('title')
                    ->label(__('Title'))
                    ->copyable()
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label(__('Status'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('severity')
                    ->label(__('Severity'))
                    ->searchable()
                    ->sortable(),

                EventAtColumn::make('created_at')
                    ->createdAt(),

                EventAtColumn::make('updated_at')
                    ->updatedAt(),

            ])
            ->headerActions([
                $this->createAction(),

            ])
            ->actions([

                $this->editAction(),

                DeleteAction::make()
                    ->deleteActionCommonConfiguration(),

            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),

            ]);
    }

    protected function editAction(): EditAction
    {
        return EditAction::make('editAction')
            ->modalHeading(__('Edit Message'))
            ->slideOver()
            ->form([
                TextInput::make('title')
                    ->label(__('Title'))
                    ->required()
                    ->maxLength(255),

                RichEditor::make('message')
                    ->label(__('Message'))
                    ->required()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'undo',
                    ]),

                ToggleButtons::make('severity')
                    ->label(__('Severity'))
                    ->inline()
                    ->options(MessageSeverity::class)
                    ->required()
                    ->enum(MessageSeverity::class),

                ToggleButtons::make('status')
                    ->label(__('Status'))
                    ->inline()
                    ->options(MessageStatus::class)
                    ->required()
                    ->enum(MessageStatus::class),

            ])
            ->using(function (Message $message, array $data): Message {
                return QueryContainer::make()
                    ->wrap(function () use ($message, $data) {
                        $message->update($data);

                        return $message;
                    });
            })
            ->editActionCommonConfiguration();
    }

    protected function createAction(): CreateAction
    {
        return CreateAction::make('createAction')
            ->label(__('Create New Message'))
            ->modalHeading(__('Create New Message'))
            ->slideOver()
            ->form([
                TextInput::make('title')
                    ->label(__('Title'))
                    ->required()
                    ->maxLength(255),

                RichEditor::make('message')
                    ->label(__('Message'))
                    ->required()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'undo',
                    ]),

                ToggleButtons::make('severity')
                    ->label(__('Severity'))
                    ->inline()
                    ->options(MessageSeverity::class)
                    ->required()
                    ->enum(MessageSeverity::class),

            ])
            ->using(function (array $data): Message {
                return QueryContainer::make()
                    ->wrap(function () use ($data) {
                        $data['user_id'] = $this->user->id;
                        $data['status'] = MessageStatus::Opened;

                        return Message::create($data);
                    });
            })
            ->extraAttributes([
                'class' => 'fi-ta-create-new-message-action-btn',
            ])
            ->button();
    }

    public function render()
    {
        return view('core::livewire.pages.users.messages')
            ->layout(AppLayouts::class, [
                'pageTitle' => __('Messages'),
                'breadcrumbs' => [
                    route('dashboard.home') => __('Home'),
                    route('dashboard.user_management.users') => __('Users'),
                    route('dashboard.user_management.users.messages', [$this->user->id]) => __('User Messages'),
                ],
            ]);
    }
}
