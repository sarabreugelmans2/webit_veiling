<?php

namespace App\Filament\Resources\LotResource\Pages;

use App\Filament\Resources\LotResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLots extends ListRecords
{
    protected static string $resource = LotResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
