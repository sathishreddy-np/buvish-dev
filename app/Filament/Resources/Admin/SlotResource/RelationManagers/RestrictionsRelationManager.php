<?php

namespace App\Filament\Resources\Admin\SlotResource\RelationManagers;

use App\Models\Restriction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RestrictionsRelationManager extends RelationManager
{
    protected static string $relationship = 'restrictions';

    public function form(Form $form): Form
    {
        return $form
            ->schema(Restriction::getForm($this->getOwnerRecord()->id));
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('gender')
            ->columns([
                Tables\Columns\TextColumn::make('gender'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
