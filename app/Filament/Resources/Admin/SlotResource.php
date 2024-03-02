<?php

namespace App\Filament\Resources\Admin;

use App\Enums\Day;
use App\Filament\Resources\Admin\SlotResource\Pages;
use App\Filament\Resources\Admin\SlotResource\RelationManagers;
use App\Filament\Resources\Admin\SlotResource\RelationManagers\RestrictionsRelationManager;
use App\Models\Slot;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlotResource extends Resource
{
    protected static ?string $model = Slot::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('branch_id')
                    ->relationship('branch', 'name')
                    ->required(),
                Forms\Components\Select::make('day')
                    ->options(Day::class)
                    ->required(),
                Forms\Components\TimePicker::make('starts_at')
                    ->required(),
                Forms\Components\TimePicker::make('ends_at')
                    ->required(),
                Forms\Components\TextInput::make('no_of_slots')
                    ->required()
                    ->numeric(),
                Repeater::make('restrictions')
                    ->schema([
                        Forms\Components\Select::make('branch_id')
                            ->relationship('branch', 'name')
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
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('branch.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('day')
                    ->searchable(),
                Tables\Columns\TextColumn::make('starts_at'),
                Tables\Columns\TextColumn::make('ends_at'),
                Tables\Columns\TextColumn::make('no_of_slots')
                    ->numeric()
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
            RestrictionsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSlots::route('/'),
            'create' => Pages\CreateSlot::route('/create'),
            'view' => Pages\ViewSlot::route('/{record}'),
            'edit' => Pages\EditSlot::route('/{record}/edit'),
        ];
    }
}
