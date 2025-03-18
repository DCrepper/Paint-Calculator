<?php

namespace App\Filament\Resources\PartnerShopResource\Pages;

use App\Filament\Resources\PartnerShopResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnerShops extends ListRecords
{
    protected static string $resource = PartnerShopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
