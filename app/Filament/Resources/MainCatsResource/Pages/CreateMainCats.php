<?php

namespace App\Filament\Resources\MainCatsResource\Pages;

use App\Filament\Resources\MainCatsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMainCats extends CreateRecord
{
    protected static string $resource = MainCatsResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
