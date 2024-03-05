<?php

namespace App\Models;

use App\Observers\RestrictionObserver;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([RestrictionObserver::class])]
class Restriction extends Model
{
    use HasFactory;

    public function slot(): BelongsTo
    {
        return $this->belongsTo(Slot::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public static function getForm($slot_id = NULL): array
    {
        return [
            Select::make('slot_id')
                ->hidden(function () use ($slot_id) {
                    return $slot_id != NULL;
                })
                ->relationship('slot', 'id')

                ->required(),
            TextInput::make('gender')
                ->required()
                ->maxLength(255),
            TextInput::make('age_from')
                ->required()
                ->numeric(),
            TextInput::make('age_to')
                ->required()
                ->numeric(),
            TextInput::make('currency')
                ->required()
                ->maxLength(255),
            TextInput::make('price')
                ->required()
                ->numeric()
                ->prefix('$'),
        ];
    }
}
