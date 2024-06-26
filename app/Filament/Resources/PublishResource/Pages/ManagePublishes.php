<?php

namespace App\Filament\Resources\PublishResource\Pages;

use App\Filament\Resources\PublishResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePublishes extends ManageRecords
{
    protected static string $resource = PublishResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
