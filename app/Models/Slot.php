<?php

namespace App\Models;

use App\Enums\Day;
use App\Observers\SlotObserver;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

#[ObservedBy([SlotObserver::class])]
class Slot extends Model
{
    use HasFactory;

    protected $casts = [
        'day' => Day::class,
    ];

    public function restrictions(): HasMany
    {
        return $this->hasMany(Restriction::class);
    }


    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }


    public static function getForm($activity_id = NULL): array
    {
        return [
            Section::make()
                ->schema([
                    Select::make('activity_id')
                        ->hidden(function () use ($activity_id) {
                            return $activity_id != NULL;
                        })
                        ->hiddenOn(['create', 'edit'])
                        ->relationship('activity', 'id')
                        ->required(),
                    Select::make('day')
                        ->options(Day::class)
                        ->searchable()
                        ->required(),
                    TimePicker::make('starts_at')
                        ->required(),
                    TimePicker::make('ends_at')
                        ->required(),
                    TextInput::make('no_of_slots')
                        ->required()
                        ->numeric(),
                ])->columns(4),
            Repeater::make('restrictions')
                ->relationship('restrictions')
                ->schema(Restriction::getForm())
                ->columns(4)
        ];
    }
}
