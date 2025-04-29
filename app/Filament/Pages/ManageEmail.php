<?php

namespace App\Filament\Pages;

use App\Settings\EmailSettings;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageEmail extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = EmailSettings::class;

    protected static ?string $title = 'Contact';

    protected static ?string $navigationLabel = 'Contact';

    protected static ?string $navigationGroup = 'Paramètres';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make('Contact')
                ->schema([
                    TextInput::make('contact')
                    ->required()
                    ->email()
                    ->label('Email de Contact')
                    ->maxLength(255),
                    TextInput::make('facebook')
                    ->required()
                    ->label('Lien Facebook')
                    ->maxLength(255),
                    TextInput::make('instagram')
                    ->required()
                    ->label('Lien Instagram')
                    ->maxLength(255),
                ]),
            ]);
    }
}
