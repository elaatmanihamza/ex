<?php

namespace App\Filament\Resources\SegmentResource\Pages;

use App\Filament\Resources\SegmentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSegments extends ManageRecords
{
    protected static string $resource = SegmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
