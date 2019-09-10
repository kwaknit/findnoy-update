<?php

use App\Crime;
use Illuminate\Database\Seeder;

class CrimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crime::create([
        	'name' => 'Murder',
        	'description' => 'Murder'
        ]);

        Crime::create([
        	'name' => 'Kidnapping',
        	'description' => 'Kidnapping'
        ]);

        Crime::create([
        	'name' => 'Rape',
        	'description' => 'Rape'
        ]);

        Crime::create([
        	'name' => 'Robbery',
        	'description' => 'Robbery'
        ]);

        Crime::create([
        	'name' => 'Homicide',
        	'description' => 'Homicide'
        ]);

        Crime::create([
        	'name' => 'Harassment',
        	'description' => 'Harassment'
        ]);

        Crime::create([
        	'name' => 'Drug Possession',
        	'description' => 'Drug Possession'
        ]);

        Crime::create([
        	'name' => 'Drug Distribution',
        	'description' => 'Drug Distribution'
        ]);

        Crime::create([
        	'name' => 'Bribery',
        	'description' => 'Bribery'
        ]);

        Crime::create([
        	'name' => 'Fraud',
        	'description' => 'Fraud'
        ]);
    }
}
