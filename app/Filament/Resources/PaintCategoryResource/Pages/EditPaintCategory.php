<?php

namespace App\Filament\Resources\PaintCategoryResource\Pages;

use App\Filament\Resources\PaintCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaintCategory extends EditRecord
{
    protected static string $resource = PaintCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
