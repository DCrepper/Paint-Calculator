<?php

declare(strict_types=1);

namespace App\Filament\Imports;

use App\Models\PartnerShop;
use App\Models\Region;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class PartnerShopImporter extends Importer
{
    protected static ?string $model = PartnerShop::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('region_id')
                ->numeric()
                ->relationship('region', function (string $state): ?Region {
                    return Region::firstOrCreate(['name' => $state]);
                }),
            ImportColumn::make('company_name')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('address')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('phone')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('email')
                ->requiredMapping()
                ->rules(['required', 'email']),
        ];
    }

    public function resolveRecord(): ?PartnerShop
    {
        if ($this->data['email'] === null) {
            return null;
        }

        return PartnerShop::firstOrCreate([
            'email' => $this->data['email'],
            'company_name' => $this->data['company_name'],
            'name' => $this->data['name'],
            'address' => $this->data['address'],
            'phone' => $this->data['phone'],
            'region_id' => Region::firstOrCreate(['name' => $this->data['region_id']])->id,
        ]);

        // return new PartnerShop;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your partner shop import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
