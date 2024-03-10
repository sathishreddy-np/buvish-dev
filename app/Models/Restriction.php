<?php

namespace App\Models;

use App\Enums\Gender;
use App\Observers\RestrictionObserver;
use Filament\Forms\Components\Section;
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

    protected $casts = [
        'gender' => Gender::class,
    ];

    public function slot(): BelongsTo
    {
        return $this->belongsTo(Slot::class);
    }

    public static function getForm($slot_id = NULL): array
    {
        return [
            Section::make()
            ->schema([
                Select::make('slot_id')
                ->hidden(function () use ($slot_id) {
                    return $slot_id != NULL;
                })
                ->hiddenOn(['create', 'edit'])
                ->relationship('slot', 'id')
                ->required(),
            Select::make('gender')
                ->options(Gender::class)
                ->searchable()
                ->required(),
            TextInput::make('age_from')
                ->required()
                ->numeric(),
            TextInput::make('age_to')
                ->required()
                ->numeric(),
            TextInput::make('price')
                ->required()
                ->numeric()
                ->prefix('$'),

            ])
            ->columns(4)
        ];
    }
}
