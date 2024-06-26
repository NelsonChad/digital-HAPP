<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Pharmacies;
use App\Models\Products;
use Filament\Support\Enums\IconPosition;


class dashboardStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Utilizadores', User::count())
                ->description("utilizadores do sistema")
                ->descriptionIcon("heroicon-m-user-group", IconPosition::Before)
                ->chart([1,5,3,10,6,11])
                ->color('success'),
            Stat::make('Farmacias', Pharmacies::count())
                ->description("Farmacias do cadastradas")
                ->descriptionIcon("heroicon-m-cog", IconPosition::Before)
                ->chart([1,2,3,7,9,12])
                ->color('danger'),
            Stat::make('Produtos', Products::count())
                ->description("produtos do cadastrados")
                ->descriptionIcon("heroicon-m-cog", IconPosition::Before)
                ->chart([1,2,3,7,3,2])
                ->color('warning')
        ];
    }
}
