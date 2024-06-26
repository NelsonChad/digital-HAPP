<?php

namespace App\Filament\Resources\PharmaciesResource\Pages;

use App\Filament\Resources\PharmaciesResource;
use App\Filament\Widgets\pharmaciesStatWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPharmacies extends ListRecords
{
    protected static string $resource = PharmaciesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    /*protected function getHeaderWidgets(): array
    {
        return [
            pharmaciesStatWidget::class,
        ];
    }*/
}
