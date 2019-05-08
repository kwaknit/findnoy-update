<?php

use Illuminate\Database\Seeder;
use App\Coverage;

class CoveragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coverages = [
            ['CategoryID' => 1, 'Name' => 'English', 'created_at' => now()],
            ['CategoryID' => 1, 'Name' => 'Filipino', 'created_at' => now()],
            ['CategoryID' => 1, 'Name' => 'Mathematics', 'created_at' => now()],
            ['CategoryID' => 1, 'Name' => 'Science', 'created_at' => now()],
            ['CategoryID' => 1, 'Name' => 'Social Science', 'created_at' => now()],
            ['CategoryID' => 2, 'Name' => 'Teaching Profession', 'created_at' => now()],
            ['CategoryID' => 2, 'Name' => 'Social Dimensions of Education', 'created_at' => now()],
            ['CategoryID' => 2, 'Name' => 'Principles of Teaching', 'created_at' => now()],
            ['CategoryID' => 2, 'Name' => 'Educational Technology', 'created_at' => now()],
            ['CategoryID' => 2, 'Name' => 'Curriculum Development', 'created_at' => now()],
            ['CategoryID' => 2, 'Name' => 'Facilitating Learning', 'created_at' => now()],
            ['CategoryID' => 2, 'Name' => 'Child and Adolescent Development', 'created_at' => now()],
            ['CategoryID' => 2, 'Name' => 'Assessment of Student Learning', 'created_at' => now()],
            ['CategoryID' => 2, 'Name' => 'Developmental Reading', 'created_at' => now()],
            ['CategoryID' => 2, 'Name' => 'Field Study', 'created_at' => now()],
            ['CategoryID' => 2, 'Name' => 'Practice Teaching', 'created_at' => now()],
            ['CategoryID' => 3, 'Name' => 'English', 'created_at' => now()],
            ['CategoryID' => 3, 'Name' => 'Filipino', 'created_at' => now()],
            ['CategoryID' => 3, 'Name' => 'Biological Sciences', 'created_at' => now()],
            ['CategoryID' => 3, 'Name' => 'Physical Sciences', 'created_at' => now()],
            ['CategoryID' => 3, 'Name' => 'Mathematics', 'created_at' => now()],
            ['CategoryID' => 3, 'Name' => 'Social Studies/Social Sciences', 'created_at' => now()],
            ['CategoryID' => 3, 'Name' => 'Values Education', 'created_at' => now()],
            ['CategoryID' => 3, 'Name' => 'MAPEH', 'created_at' => now()],
            ['CategoryID' => 3, 'Name' => 'Agricultural and Fishery Arts', 'created_at' => now()],
            ['CategoryID' => 3, 'Name' => 'Technology and Livelihood Education', 'created_at' => now()],
        ];

        Coverage::insert($coverages);
    }
}
