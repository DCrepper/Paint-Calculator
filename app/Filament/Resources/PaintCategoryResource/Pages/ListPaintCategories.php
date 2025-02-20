<?php

namespace App\Filament\Resources\PaintCategoryResource\Pages;

use App\Filament\Resources\PaintCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaintCategories extends ListRecords
{
    protected static string $resource = PaintCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
