<?php

namespace App\Filament\Resources\PaymentimageResource\Pages;

use App\Filament\Resources\PaymentimageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPaymentimage extends ViewRecord
{
    protected static string $resource = PaymentimageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
