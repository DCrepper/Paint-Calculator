<?php

namespace App\Filament\Resources\TilePaintDescriptionResource\Pages;

use App\Filament\Resources\TilePaintDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTilePaintDescription extends EditRecord
{
    protected static string $resource = TilePaintDescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
