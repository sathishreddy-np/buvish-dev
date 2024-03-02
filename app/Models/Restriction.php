<?php

namespace App\Models;

use App\Observers\RestrictionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([RestrictionObserver::class])]
class Restriction extends Model
{
    use HasFactory;

    public function slot() : BelongsTo {
        return $this->belongsTo(Slot::class);
    }

    public function branch() : BelongsTo {
        return $this->belongsTo(Branch::class);
    }

}
