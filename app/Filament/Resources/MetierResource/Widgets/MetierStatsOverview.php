<?php

namespace App\Filament\Resources\MetierResource\Widgets;



use App\Models\Metier;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class MetierStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            //


            card::make('Nombre des Metiers',Metier::all()->count()),

           // card::make('vous','22'),
            //card::make('SSS','3444'),
        ];
    }
}
