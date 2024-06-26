<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class userStatWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Utilizadores', User::count())
                ->description("utilizadores do sistema")
                ->descriptionIcon("heroicon-m-user-group", IconPosition::Before)
                ->chart([1,5,3,10,6,11])
                ->color('success')
        ];
    }
}
