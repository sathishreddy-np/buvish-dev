<?php

namespace App\Models;

use App\Observers\PermissionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;

#[ObservedBy([PermissionObserver::class])]
class Permission extends SpatiePermission
{
    use HasFactory;
}
