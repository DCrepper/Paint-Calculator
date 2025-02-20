<?php

namespace App\Filament\Resources\TilePaintDescriptionResource\Pages;

use App\Filament\Resources\TilePaintDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTilePaintDescriptions extends ListRecords
{
    protected static string $resource = TilePaintDescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
