<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\text;

class ProductResource extends Resource
{
    
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationLabel = 'المنتجات';
    protected static ?string $modelLabel = 'منتج';
    protected static ?string $pluralModelLabel = 'المنتجات';
    protected static ?int $navigationSort = 4;


  
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('اسم المنتج')
                        ->required(),
                ]),
                Forms\Components\Grid::make(1)->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('اختر صورة المنتج')
                        ->image()
                        ->required(),
                ]),
                Forms\Components\Grid::make(1)->schema([
                    Forms\Components\Textarea::make('description')
                        ->label('وصف المنتج'),
                ]),
                Forms\Components\Grid::make(1)->schema([
                    Forms\Components\TextInput::make('price')
                        ->label('السعر')
                        ->numeric()
                        ->required(),
                ]),
                Forms\Components\Grid::make(1)->schema([
                    Forms\Components\TextInput::make('discount')
                        ->label('الخصم')
                        ->numeric(),
                ]),
                Forms\Components\Grid::make(1)->schema([
                    Select::make('sub_category_id')
                        ->label('اختر التصنيف')
                        ->options(function () {
                            $options = [];
                    
                            \App\Models\Category::with('subcategories')->get()->each(function ($category) use (&$options) {
                                if ($category->subcategories->isNotEmpty()) {
                                    $options[$category->name] = $category->subcategories->pluck('name', 'id')->toArray();
                                }
                            });
                    
                            return $options;
                        })
                        ->searchable()
                        ->required()
                        ->preload(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('صورة المنتج'),
                Tables\Columns\TextColumn::make('name')
                    ->label('اسم المنتج'),
                
                Tables\Columns\TextColumn::make('subCategory.name')
                    ->label('التصنيف '),
            ])
            
            ->filters([
                
                Tables\Filters\SelectFilter::make('sub_category_id')
                    ->label('التصنيف')
                    ->options(\App\Models\SubCategory::pluck('name', 'id')->toArray()),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
