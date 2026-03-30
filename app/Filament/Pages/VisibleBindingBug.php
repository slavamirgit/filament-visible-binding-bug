<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Schema;

class VisibleBindingBug extends Page
{
    protected string $view = 'filament.pages.visible-binding-bug';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'mode' => null,
            'field_1' => null,
            'field_2' => null,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    Select::make('mode')
                        ->options([
                            'mode_1' => 'Mode 1',
                            'mode_2' => 'Mode 2',
                        ])
                        ->live()
                        ->native(false),

                    TextInput::make('field_1')
                        ->visible(fn ($get): bool => $get('mode') === 'mode_1')
                        ->live(onBlur: true)
                        ->afterStateUpdated(function ($state, $set, $get): void {
                            $set('field_1_data', $state);
                        }),

                    TextInput::make('field_2')
                        ->visible(fn ($get): bool => $get('mode') === 'mode_2')
                        ->live(onBlur: true)
                        ->afterStateUpdated(function ($state, $set, $get): void {
                            $set('field_2_data', $state);
                        }),

                    TextInput::make('field_1_data')->disabled(),

                    TextInput::make('field_2_data')->disabled(),
                ])
                ->livewireSubmitHandler('save')
                ->footer([
                    //
                ]),
            ])
            ->statePath('data');
    }
}
