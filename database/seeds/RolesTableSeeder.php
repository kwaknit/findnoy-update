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
            ['id' => '1905', 'name' => 'Civilian', 'access_type' => '1905', 'created_at' => now()],
            ['id' => '2318', 'name' => 'Field Officer', 'access_type' => '2318', 'created_at' => now()],
            ['id' => '3011', 'name' => 'Administrator', 'access_type' => '3011', 'created_at' => now()]
        ];

        Role::insert($roles);
    }
}
