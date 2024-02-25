<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
    protected $table = 'model_has_roles';

    public function role():BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function branch():BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

}
