<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubCategoryResource\Pages;
use App\Filament\Resources\SubCategoryResource\RelationManagers;
use App\Models\SubCategory;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubCategoryResource extends Resource
{

    public static function canViewAny(): bool
    {
        return true;
    }
    
    public static function canCreate(): bool
    {
        return true;
    }
    
    public static function canEdit(Model $record): bool
    {
        return true;
    }
    
    public static function canDelete(Model $record): bool
    {
        return true;
    }
    
    protected static ?string $model = SubCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'التصنيفات الفرعية';
    protected static ?string $modelLabel = 'تصنيف';
    protected static ?string $pluralModelLabel = 'التصنيفات الفرعية';
    protected static ?string $navigationGroup = 'التصنيفات';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('صورة')
                    ->image()
                    ->required()
                    ->columnSpanFull()
                    ->imageResizeTargetWidth(300) // Set the desired width
                    ->imageResizeTargetHeight(300), // Set the desired height
                TextInput::make('name')
                    ->label('اسم القسم')
                    ->required(),
                Select::make('category_id')
                    ->label('القسم الرئيسي')
                    ->relationship('category', 'name')
                    ->required(),

                Forms\Components\Toggle::make('is_homepage')
                    ->label('عرض في الصفحة الرئيسية')
                    ->default(false),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('اسم التصنيف'),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('اسم القسم الرئيسي'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('صورة'),
                Tables\Columns\ToggleColumn::make('is_homepage')
                    ->label('عرض في الصفحة الرئيسية')
                    ->onColor('success')
                    ->offColor('danger'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('name')
                    ->label('اسم التصنيف')
                    ->form([
                        TextInput::make('name')->label('اسم التصنيف'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when($data['name'], function ($query, $name) {
                            return $query->where('name', 'like', "%{$name}%");
                        });
                    }),

                Tables\Filters\SelectFilter::make('category_id')
                    ->label('القسم الرئيسي')
                    ->relationship('category', 'name'),

                Tables\Filters\TernaryFilter::make('is_homepage')
                    ->label('عرض في الصفحة الرئيسية'),
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
            'index' => Pages\ListSubCategories::route('/'),
            'create' => Pages\CreateSubCategory::route('/create'),
            'edit' => Pages\EditSubCategory::route('/{record}/edit'),
        ];
    }
}
