<?php

namespace App\Filament\Resources\MetierResource\Pages;

use Filament\Pages\Actions;
use App\Filament\Resources\MetierResource;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\MetierResource\Widgets\MetierStatsOverview;

class ManageMetiers extends ManageRecords
{
    protected static string $resource = MetierResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets():array

    {


return[

    MetierStatsOverview::class,


];
    }




}
