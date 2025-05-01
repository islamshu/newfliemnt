<?php

namespace App\Filament\Resources\PaymentimageResource\Pages;

use App\Filament\Resources\PaymentimageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaymentimage extends EditRecord
{
    protected static string $resource = PaymentimageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
