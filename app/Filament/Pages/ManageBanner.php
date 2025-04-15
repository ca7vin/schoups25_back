<?php

namespace App\Filament\Pages;

use App\Settings\BannerSettings;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ManageBanner extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationLabel = 'Bannieres';

    protected static ?string $title = 'Bannieres';

    protected static string $settings = BannerSettings::class;

    protected static ?string $navigationGroup = 'Paramètres';

    protected function getForms(): array
    {
        return [
            'form' => $this->makeForm()
                ->schema($this->getFormSchema())
                ->statePath('data')
                ->columns(1)
                ->inlineLabel(config('filament.layout.forms.have_inline_labels')),
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Banniere Hero')
                ->schema([
                    TextInput::make('home_title')
                        ->label('Titre Hero')
                        ->required()
                        ->maxLength(255),
                    TinyEditor::make('home_text')
                        ->label('Texte Hero')
                        ->required(),
                    FileUpload::make('home_image')
                        ->disk('public')
                        ->label('Image Hero')
                        ->visibility('public')
                        ->required(),
                ])->collapsible()
                ->columns(1),
            Section::make('Banniere A propos')
                ->schema([
                    TextInput::make('about_title')
                        ->label('Titre A propos')
                        ->required()
                        ->maxLength(255),
                    TinyEditor::make('about_text')
                        ->label('Texte A propos')
                        ->required(),
                    FileUpload::make('about_image')
                        ->label('Image A propos')
                        ->disk('public')
                        ->visibility('public')
                        ->required(),
                ])->collapsible()
                ->columns(1)
        ];
    }
}
