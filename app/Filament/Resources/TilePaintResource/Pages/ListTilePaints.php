<?php

namespace App\Filament\Resources\TilePaintResource\Pages;

use App\Filament\Resources\TilePaintResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTilePaints extends ListRecords
{
    protected static string $resource = TilePaintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
