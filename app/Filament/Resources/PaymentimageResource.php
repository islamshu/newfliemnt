<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentimageResource\Pages;
use App\Filament\Resources\PaymentimageResource\RelationManagers;
use App\Models\Paymentimage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentimageResource extends Resource
{
    protected static ?string $model = Paymentimage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationLabel = 'صور عمليات الدفع';
    protected static ?string $modelLabel = 'صورة عملية الدفع';
    protected static ?string $pluralModelLabel ='صور عمليات الدفع';
    protected static ?string $slug ='paymentimages';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('اسم شركة الدفع')
                ]),
                Forms\Components\Grid::make(1)->schema([
                    Forms\Components\FileUpload::make('image')
                    ->label('اختر صورة الدفع')
                        ->image()
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('اسم شركة الدفع'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('صورة الدفع'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentimages::route('/'),
            'create' => Pages\CreatePaymentimage::route('/create'),
            'view' => Pages\ViewPaymentimage::route('/{record}'),
            'edit' => Pages\EditPaymentimage::route('/{record}/edit'),
        ];
    }
}
