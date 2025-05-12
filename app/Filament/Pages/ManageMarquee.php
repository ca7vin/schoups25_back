<?php

namespace App\Filament\Pages;

use App\Settings\MarqueeSettings;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageMarquee extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = MarqueeSettings::class;

    protected static ?string $title = 'Alerte';

    protected static ?string $navigationLabel = 'Alerte';

    protected static ?string $navigationGroup = 'Paramètres';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Alerte')
                    ->schema([
                        Checkbox::make('active')
                            ->label('Actif ?'),
                        TextInput::make('text')
                            ->required()
                            ->label('Texte')
                            ->maxLength(255),
                    ])->collapsible()
                    ->columns(1),
            ]);
    }
}
