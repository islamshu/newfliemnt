<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('إضافة فئة جديدة')
                ->modalHeading('إنشاء فئة جديدة')
                ->form([
                    TextInput::make('name')
                        ->label('اسم الفئة')
                        ->required(),
                ])
                ->modalButton('حفظ الفئة'),
        ];
    }
}
