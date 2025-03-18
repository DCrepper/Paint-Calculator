<?php

namespace App\Filament\Resources\PartnerShopResource\Pages;

use App\Filament\Resources\PartnerShopResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnerShop extends EditRecord
{
    protected static string $resource = PartnerShopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
