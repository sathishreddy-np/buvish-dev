<?php

namespace App\Models;

use App\Enums\Day;
use App\Observers\SlotObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([SlotObserver::class])]
class Slot extends Model
{
    use HasFactory;

    protected $casts = [
        'day' => Day::class,
    ];

    public function branch() : BelongsTo {
        return $this->belongsTo(Branch::class);
    }

    public function restrictions() : HasMany {
        return $this->hasMany(Restriction::class);
    }
}
