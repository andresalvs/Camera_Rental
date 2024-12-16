<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['role_id' => 1, 'name' => 'Customer', 'description' => 'Customer role', 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 2, 'name' => 'Employee', 'description' => 'Employee role', 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 3, 'name' => 'Manager', 'description' => 'Manager role', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
