<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Branch;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $branches_per_company = 5;

        // While Creating User . We are creating company also in the observer
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678')
        ]);
        // Creating Brnaches For A Company
        $branches = Branch::factory($branches_per_company)->create(['company_id' => $user->company->id]);

        // Assign all branches to the user
        $user->branches()->attach($branches);

        // Creating Roles For Company
        Role::factory(4)->create(['company_id' => $user->company->id]);

        // Creating Common Permissions
        $this->call(PermissionSeeder::class);
    }
}
