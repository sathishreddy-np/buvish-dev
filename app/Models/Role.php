<?php

namespace App\Models;

use App\Observers\RoleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Models\Role as SpatieRole;

#[ObservedBy([RoleObserver::class])]
class Role extends SpatieRole
{
    use HasFactory;

    protected $table = "roles";

    public function company() :BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

