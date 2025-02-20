<?php

namespace App\Filament\Resources\TilePaintResource\Pages;

use App\Filament\Resources\TilePaintResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTilePaint extends ViewRecord
{
    protected static string $resource = TilePaintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
