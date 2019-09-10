<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserts delivery branches
        User::create([
            'first_name' => 'Victor Kim',
	        'middle_name' => 'Manugas',
	        'last_name' => 'Taping',
	        'birthdate' => '1989-04-06',
	        'birthplace' => 'South Poblacion, San Fernando, Cebu',
	        'gender' => 'male',
	        'civil_status' => 'single',
	        'email' => 'kim.taping2019@gmail.com',
	        'password' => Hash::make('12345678'),
	        'type' => 'admin',
	        'contact_no' => '09266930364',
	        'permanent_address' => '311 Happy Village, South Poblacion, San Fernando, Cebu, Philippines 6018',
	        'present_address' => 'Sambag 2, Urgello, Cebu City, Cebu, Philippines 6000',
	        'contact_person' => 'Felisa M. Taping',
	        'contact_person_no' => '09321199788'
        ]);
    }
}
