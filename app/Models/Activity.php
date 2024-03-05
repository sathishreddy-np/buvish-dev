<?php

namespace App\Models;

use App\Observers\ActivityObserver;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([ActivityObserver::class])]
class Activity extends Model
{
    use HasFactory;

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function slots(): HasMany
    {
        return $this->hasMany(Slot::class);
    }

    public static function getForm(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            Repeater::make('slots')
                ->hiddenOn(['view','edit'])
                ->relationship('slots')
                ->schema(Slot::getForm())
                ->columnSpanFull()

        ];
    }
}
