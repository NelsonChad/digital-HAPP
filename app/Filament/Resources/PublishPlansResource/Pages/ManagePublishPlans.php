<?php

namespace App\Filament\Resources\PublishPlansResource\Pages;

use App\Filament\Resources\PublishPlansResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePublishPlans extends ManageRecords
{
    protected static string $resource = PublishPlansResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
