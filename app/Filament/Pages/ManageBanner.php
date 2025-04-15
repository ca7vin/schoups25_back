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

    protected static string $settings = BannerSettings::class;

    protected static ?string $navigationGroup = 'Settings';

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
            Section::make('Home banner')
                ->schema([
                    TextInput::make('home_title')
                        ->required()
                        ->maxLength(255),
                    TinyEditor::make('home_text')
                        ->required(),
                    FileUpload::make('home_image')
                        ->disk('public')
                        ->visibility('public')
                        ->required(),
                ])->collapsible()
                ->columns(1),
            Section::make('About banner')
                ->schema([
                    TextInput::make('about_title')
                        ->required()
                        ->maxLength(255),
                    TinyEditor::make('about_text')
                        ->required(),
                    FileUpload::make('about_image')
                        ->disk('public')
                        ->visibility('public')
                        ->required(),
                ])->collapsible()
                ->columns(1)
        ];
    }
}
