<?php

namespace App\Filament\Resources\PaintCategoryResource\Pages;

use App\Filament\Resources\PaintCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPaintCategory extends ViewRecord
{
    protected static string $resource = PaintCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
