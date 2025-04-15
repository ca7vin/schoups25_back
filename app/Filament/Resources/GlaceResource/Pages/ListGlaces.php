<?php

namespace App\Filament\Resources\GlaceResource\Pages;

use App\Filament\Resources\GlaceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGlaces extends ListRecords
{
    protected static string $resource = GlaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
