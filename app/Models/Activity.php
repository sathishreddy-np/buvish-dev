<?php

namespace App\Models;

use App\Observers\ActivityObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([ActivityObserver::class])]
class Activity extends Model
{
    use HasFactory;

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
