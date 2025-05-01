<?php

namespace App\Filament\Resources\MainCatsResource\Pages;

use App\Filament\Resources\MainCatsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMainCats extends EditRecord
{
    protected static string $resource = MainCatsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
