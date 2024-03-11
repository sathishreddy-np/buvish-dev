<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = ['Role', 'Permission', 'User', 'Company', 'Branch', 'Activity'];
        $permissions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
        foreach ($models as $model) {
            foreach ($permissions as $permission) {
                $record = [
                    'name' => "$model::$permission",
                    'guard_name' => 'web'
                ];
                Permission::create($record);
            }
        }
    }
}
