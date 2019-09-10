<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'User', 'access_type' => '1905', 'created_at' => now()],
            ['name' => 'Application Administrator', 'access_type' => '2318', 'created_at' => now()],
            ['name' => 'System Administrator', 'access_type' => '3011', 'created_at' => now()]
        ];

        Role::insert($roles);
    }
}
