<?php

namespace App\Filament\Resources\GlaceResource\Pages;

use App\Filament\Resources\GlaceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGlace extends EditRecord
{
    protected static string $resource = GlaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
