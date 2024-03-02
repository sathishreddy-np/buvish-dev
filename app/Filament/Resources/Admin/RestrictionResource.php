<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin\RestrictionResource\Pages;
use App\Filament\Resources\Admin\RestrictionResource\RelationManagers;
use App\Models\Restriction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RestrictionResource extends Resource
{
    protected static ?string $model = Restriction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('branch_id')
                    ->relationship('branch', 'name')
                    ->required(),
                Forms\Components\Select::make('slot_id')
                    ->relationship('slot', 'id')
                    ->required(),
                Forms\Components\TextInput::make('gender')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('age_from')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('age_to')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('currency')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('branch.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slot.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age_from')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('age_to')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
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
            'index' => Pages\ListRestrictions::route('/'),
            'create' => Pages\CreateRestriction::route('/create'),
            'view' => Pages\ViewRestriction::route('/{record}'),
            'edit' => Pages\EditRestriction::route('/{record}/edit'),
        ];
    }
}
