<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['ID' => 1, 'Name' => 'Gen Ed', 'created_at' => now()],
            ['ID' => 2, 'Name' => 'Prof Ed', 'created_at' => now()],
            ['ID' => 3, 'Name' => 'Specialization', 'created_at' => now()],
        ];

        Category::insert($categories);
    }
}
