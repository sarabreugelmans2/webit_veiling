<?php

namespace App\Filament\Resources\ItemResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BidsRelationManager extends RelationManager
{
    protected static string $relationship = 'bids';

    protected static ?string $recordTitleAttribute = 'amount';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->maxLength(255),
            ]);
    }
    protected function getDefaultTableSortColumn(): ?string
    {
        return 'amount';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('item.name'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('amount')->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
