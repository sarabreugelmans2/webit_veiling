<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LotResource\Pages;
use App\Filament\Resources\LotResource\RelationManagers;
use App\Models\Lot;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LotResource extends Resource
{
    protected static ?string $model = Lot::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('started_at')
                    ->required(),
                Forms\Components\DateTimePicker::make('ended_at')
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('img')->collection('lot_image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('started_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('ended_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ItemsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLots::route('/'),
            'create' => Pages\CreateLot::route('/create'),
            'edit' => Pages\EditLot::route('/{record}/edit'),
        ];
    }
}
