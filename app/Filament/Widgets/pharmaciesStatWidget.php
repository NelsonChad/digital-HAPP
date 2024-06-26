<?php

namespace App\Filament\Widgets;

use App\Models\Pharmacies;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Enums\IconPosition;


class pharmaciesStatWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Farmacias', Pharmacies::count())
                ->description("Farmacias do cadastradas")
                ->descriptionIcon("heroicon-m-cog", IconPosition::Before)
                ->chart([1,2,3,7,9,12])
                ->color('danger')
        ];
    }
}
