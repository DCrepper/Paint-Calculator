<?php

namespace App\Filament\Resources\TilePaintDescriptionResource\Pages;

use App\Filament\Resources\TilePaintDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTilePaintDescription extends ViewRecord
{
    protected static string $resource = TilePaintDescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
