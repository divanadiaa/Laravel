<?php

namespace App\Filament\Resources\TempatKursusResource\Pages;

use App\Filament\Resources\TempatKursusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTempatKursuses extends ListRecords
{
    protected static string $resource = TempatKursusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
