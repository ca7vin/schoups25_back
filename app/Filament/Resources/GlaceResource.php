<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GlaceResource\Pages;
use App\Filament\Resources\GlaceResource\RelationManagers;
use App\Models\Glace;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\View;

class GlaceResource extends Resource
{
    protected static ?string $model = Glace::class;

    protected static ?string $recordTitleAttribute = 'gout';

    protected static ?int $navigationSort = 999;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return __('Glace');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Glaces');
    }

    public static function getNavigationLabel(): string
    {
        return __('Glaces');
    }

    /**
     * @return array<int, string>
     */
    public static function getGloballySearchableAttributes(): array
    {
        return ['gout'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                View::make('qr-download')
                    ->visible(fn($record) => filled($record)),
                Section::make('Informations générales')->schema([
                    Select::make('categorie')
                        ->label('Catégorie')
                        ->required()
                        ->options([
                            'glace' => 'Glace',
                            'sorbet' => 'Sorbet',
                        ]),
                    TextInput::make('gout')->required()->label('Goût'),
                    FileUpload::make('image')
                        ->label('Image (600 x 600)')
                        ->required(),
                    TagsInput::make('ingredients')->label('Ingrédients')
                        ->reorderable(),
                ]),

                Section::make('Valeurs nutritionnelles')->schema([
                    Fieldset::make('Énergie')->schema([
                        TextInput::make('nutrition.energie.kj')->numeric()->label('kJ'),
                        TextInput::make('nutrition.energie.kcal')->numeric()->label('kcal'),
                    ]),
                    Grid::make(2)->schema([
                        TextInput::make('nutrition.matieresGrasses')->numeric()->label('Matières grasses (g)'),
                        TextInput::make('nutrition.acidesGrasSatures')->numeric()->label('Acides gras saturés (g)'),
                        TextInput::make('nutrition.glucides')->numeric()->label('Glucides (g)'),
                        TextInput::make('nutrition.sucres')->numeric()->label('Sucres (g)'),
                        TextInput::make('nutrition.proteines')->numeric()->label('Protéines (g)'),
                        TextInput::make('nutrition.fibres')->numeric()->label('Fibres (g)'),
                        TextInput::make('nutrition.sel')->numeric()->label('Sel (g)'),
                    ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('categorie'),
                Tables\Columns\TextColumn::make('gout'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('categorie')
                    ->label('Catégorie')
                    ->options([
                        'glace' => 'Glace',
                        'sorbet' => 'Sorbet',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('qr')
                    ->label('QR Code')
                    ->icon('heroicon-m-arrow-down-tray') // icône de téléchargement
                    ->url(fn($record) => route('download.qr', ['glace' => $record->id])) // Lien vers la route de téléchargement
                    ->color('primary')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order_column')
            ->defaultSort('order_column');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGlaces::route('/'),
            'create' => Pages\CreateGlace::route('/create'),
            'edit' => Pages\EditGlace::route('/{record}/edit'),
        ];
    }
}
