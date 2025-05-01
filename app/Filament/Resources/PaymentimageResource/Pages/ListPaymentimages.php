<?php

namespace App\Filament\Resources\PaymentimageResource\Pages;

use App\Filament\Resources\PaymentimageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentimages extends ListRecords
{
    protected static string $resource = PaymentimageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
