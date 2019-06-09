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
            ['Name' => 'User', 'AccessType' => '1905', 'created_at' => now()],
            ['Name' => 'Application Administrator', 'AccessType' => '2318', 'created_at' => now()],
            ['Name' => 'System Administrator', 'AccessType' => '3011', 'created_at' => now()]
        ];

        Role::insert($roles);
    }
}
