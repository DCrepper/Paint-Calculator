<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Filament\Imports\PartnerShopImporter;
use App\Models\PartnerShop;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class ListPartnerShops extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {

        return $table
            ->query(PartnerShop::query())
            ->columns([
                TextColumn::make('region.name')
                    ->sortable(),
                TextColumn::make('company_name')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([

            ])->headerActions([
                ImportAction::make()->importer(PartnerShopImporter::class),
            ])
            ->bulkActions([

            ]);
    }

    public function render()
    {
        return view('livewire.list-partner-shops');
    }
}
