<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MainCatsResource\Pages;
use App\Filament\Resources\MainCatsResource\RelationManagers;
use App\Models\MainCats;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MainCatsResource extends Resource
{
    protected static ?string $navigationLabel = 'القوائم بالصفحة الرئيسية';
    protected static ?string $modelLabel = 'قائمة';
    protected static ?string $pluralModelLabel ='القوائم بالصفحة الرئيسية';
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $model = MainCats::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('اسم القائمة')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->label('صورة القائمة')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('اسم القائمة')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('صورة القائمة'),
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
            'index' => Pages\ListMainCats::route('/'),
            'create' => Pages\CreateMainCats::route('/create'),
            'view' => Pages\ViewMainCats::route('/{record}'),
            'edit' => Pages\EditMainCats::route('/{record}/edit'),
        ];
    }
}
