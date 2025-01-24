<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin', 'guard_name' => 'Admin']);
        Role::create(['name' => 'agent', 'guard_name' => 'Agent']);
        Role::create(['name' => 'user', 'guard_name' => 'User']);
    }
}

?>
