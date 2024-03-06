<?php

namespace App\Models;

use App\Enums\Activity as EnumsActivity;
use App\Observers\ActivityObserver;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([ActivityObserver::class])]
class Activity extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => EnumsActivity::class,
    ];

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
            Section::make()
            ->schema([
                Select::make('name')
                ->options(EnumsActivity::class)
                ->searchable()
                ->unique()
                ->required(),
            Repeater::make('slots')
                ->hiddenOn(['view','edit'])
                ->relationship('slots')
                ->schema(Slot::getForm())
                ->columns(4)
            ])
            ->columnSpanFull()

        ];
    }
}
