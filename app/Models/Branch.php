<?php

namespace App\Models;

use App\Observers\BranchObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([BranchObserver::class])]
class Branch extends Model
{
    use HasFactory;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function activities() : HasMany {
        return $this->hasMany(Activity::class);
    }

    public function slots() : HasMany {
        return $this->hasMany(Slot::class);
    }

    public function restrictions() : HasMany {
        return $this->hasMany(Restriction::class);
    }

}
