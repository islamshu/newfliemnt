<?php

namespace App\Filament\Resources\MainCatsResource\Pages;

use App\Filament\Resources\MainCatsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMainCats extends ViewRecord
{
    protected static string $resource = MainCatsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
