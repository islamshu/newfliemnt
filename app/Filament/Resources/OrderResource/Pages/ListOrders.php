<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions\Modal\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    public function getTableActions(): array
    {
        return [
            // أزرار Filament العادية مثل Edit وDelete (إن وجدت)
    
            Action::make('عرض الفاتورة')
                ->label('عرض الفاتورة')
                ->icon('heroicon-o-document-text')
                ->url(fn ($record) => route('invoice.show', $record)) // رابط Route من web.php
                ->openUrlInNewTab(), // يفتح الفاتورة في تبويب جديد (اختياري)
        ];
    }}
