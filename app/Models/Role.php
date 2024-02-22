<?php

namespace App\Models;

use App\Observers\RoleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function users() :BelongsToMany
    {
        return $this->belongsToMany(User::class,'model_has_roles','role_id','model_id')->withPivot('branch_id');
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class,'role_has_permissions');
    }

}

