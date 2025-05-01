<?php

namespace App\Filament\Resources\MainCatsResource\Pages;

use App\Filament\Resources\MainCatsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMainCats extends ListRecords
{
    protected static string $resource = MainCatsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
