<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderResource extends Resource
{
    protected static ?string $navigationLabel = 'السلايدرات';
    protected static ?string $modelLabel = 'سلايدر';
    protected static ?string $pluralModelLabel = 'السلايدرات';
    protected static ?string $model = Slider::class;
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('اختر صورة السلايدر')
                        ->image()
                        ->required(),
                ]),
                Forms\Components\Grid::make(1)->schema([
                    Forms\Components\TextInput::make('url')
                        ->label('رابط السلايدر')
                        ->url()
                        
                ]),
                Forms\Components\Toggle::make('show')
                ->label('عرض السلايدر')
                ->default(true),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('صورة السلايدر'),
                Tables\Columns\TextColumn::make('url')
                    ->label('رابط السلايدر'),
                Tables\Columns\ToggleColumn::make('show')
                    ->label('عرض السلايدر'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'view' => Pages\ViewSlider::route('/{record}'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
