<?php

namespace App\Filament\Resources\TilePaintResource\Pages;

use App\Filament\Resources\TilePaintResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTilePaint extends EditRecord
{
    protected static string $resource = TilePaintResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
