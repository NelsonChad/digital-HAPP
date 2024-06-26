<?php

namespace App\Filament\Resources\ProductBrandsResource\Pages;

use App\Filament\Resources\ProductBrandsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProductBrands extends ManageRecords
{
    protected static string $resource = ProductBrandsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
