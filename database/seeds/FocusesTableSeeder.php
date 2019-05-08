<?php

use Illuminate\Database\Seeder;
use App\Focus;

class FocusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $focuses = [
            ['CoverageID' => 1, 'Name' => 'Study and Thinking Skills', 'created_at' => now()],
            ['CoverageID' => 1, 'Name' => 'Writing in the Discipline ', 'created_at' => now()],
            ['CoverageID' => 1, 'Name' => 'Speech and Oral Communication', 'created_at' => now()],
            ['CoverageID' => 1, 'Name' => 'Philippine Literature ', 'created_at' => now()],
            ['CoverageID' => 1, 'Name' => 'Master of Works of the World', 'created_at' => now()],
            
            ['CoverageID' => 2, 'Name' => 'Komunikasyon sa Akademikong Filipino', 'created_at' => now()],
            ['CoverageID' => 2, 'Name' => 'Pagbasa at Pagsulat tungo sa Pananaliksik', 'created_at' => now()],
            ['CoverageID' => 2, 'Name' => 'Masining na Pagpapahayag', 'created_at' => now()],

            ['CoverageID' => 3, 'Name' => 'Fundamentals of Math', 'created_at' => now()],
            ['CoverageID' => 3, 'Name' => 'Plane Geometry', 'created_at' => now()],
            ['CoverageID' => 3, 'Name' => 'Elementary Algebra', 'created_at' => now()],
            ['CoverageID' => 3, 'Name' => 'Statistics and Probability', 'created_at' => now()],

            ['CoverageID' => 4, 'Name' => 'Biological Science', 'created_at' => now()],
            ['CoverageID' => 4, 'Name' => 'General Biology', 'created_at' => now()],
            ['CoverageID' => 4, 'Name' => 'Physical Science  with Earth Science', 'created_at' => now()],

            ['CoverageID' => 5, 'Name' => 'Philippine Government New Constitution with Human Rights ', 'created_at' => now()],
            ['CoverageID' => 5, 'Name' => 'Philippine History ', 'created_at' => now()],
            ['CoverageID' => 5, 'Name' => 'Basic Economics ', 'created_at' => now()],
            ['CoverageID' => 5, 'Name' => 'Taxation', 'created_at' => now()],
            ['CoverageID' => 5, 'Name' => 'Agrarian Reform', 'created_at' => now()],
            ['CoverageID' => 5, 'Name' => 'Society ', 'created_at' => now()],
            ['CoverageID' => 5, 'Name' => 'Culture with Family Planning ', 'created_at' => now()],
            ['CoverageID' => 5, 'Name' => 'Rizal and Other Heroes ', 'created_at' => now()],
            ['CoverageID' => 5, 'Name' => 'Philosophy of Man', 'created_at' => now()],
            ['CoverageID' => 5, 'Name' => 'Arts ', 'created_at' => now()],
            ['CoverageID' => 5, 'Name' => 'General Psychology', 'created_at' => now()],
            ['CoverageID' => 5, 'Name' => 'Information Communication Technology', 'created_at' => now()],

            ['CoverageID' => 6, 'Name' => 'Remedial Instruction in English', 'created_at' => now()],
            ['CoverageID' => 6, 'Name' => 'English for Specific Purposes', 'created_at' => now()],
            ['CoverageID' => 6, 'Name' => 'Theoretical Foundations of Language and Literature ', 'created_at' => now()],
            ['CoverageID' => 6, 'Name' => 'Literature', 'created_at' => now()],
            ['CoverageID' => 6, 'Name' => 'Methodology', 'created_at' => now()],

            ['CoverageID' => 7, 'Name' => 'Mga Batayang Teoretikal', 'created_at' => now()],
            ['CoverageID' => 7, 'Name' => 'Nilalaman   ', 'created_at' => now()],

            ['CoverageID' => 8, 'Name' => 'Biological Science I', 'created_at' => now()],
            ['CoverageID' => 8, 'Name' => 'Biological Science II', 'created_at' => now()],
            ['CoverageID' => 8, 'Name' => 'Inorganic Chemistry', 'created_at' => now()],
            ['CoverageID' => 8, 'Name' => 'Call Biology', 'created_at' => now()],
            ['CoverageID' => 8, 'Name' => 'Ecology', 'created_at' => now()],
            ['CoverageID' => 8, 'Name' => 'Organic Chemistry', 'created_at' => now()],
            ['CoverageID' => 8, 'Name' => 'Microbiology', 'created_at' => now()],
            ['CoverageID' => 8, 'Name' => 'Genetic and Evolution', 'created_at' => now()],
            ['CoverageID' => 8, 'Name' => 'Biochemistry and Anatomy and Physics', 'created_at' => now()],

            ['CoverageID' => 9, 'Name' => 'Introduction Nature of Science', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Chemistry', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Atomic and Molecular ', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Chemical Bonds', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Conservation Thermodynamics', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Chemical Thermondynamics ', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Chemical Kinetics and Equilibrium', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Organic and Biochemistry', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Nuclear Processes ', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Physics Quantities and Vectors', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Mechanics Electricity', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Magnetism and Electronics', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Thermodynamics ', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Modern Physics', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Light and Geometrics Options ', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Earth and Space ', 'created_at' => now()],
            ['CoverageID' => 9, 'Name' => 'Astronomy and Environment', 'created_at' => now()],

            ['CoverageID' => 10, 'Name' => 'Number Theory', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Business Math', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Basic and Advanced Algebra', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Plan and Solid Geometry', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Trigonometry', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Arithmetic', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Probability and Statistics ', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Analytic Geometry', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Calculus', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Modern Geometry', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Linear and Abstract Algebra', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'History of Mathematics', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Problem Solving ', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Mathematical Investigation', 'created_at' => now()],
            ['CoverageID' => 10, 'Name' => 'Instrumentation and Assessment', 'created_at' => now()],

            ['CoverageID' => 11, 'Name' => 'Trends and Issues in Social Studies', 'created_at' => now()],
            ['CoverageID' => 11, 'Name' => 'Research Geography', 'created_at' => now()],
            ['CoverageID' => 11, 'Name' => 'Sociology and Anthopology ', 'created_at' => now()],
            ['CoverageID' => 11, 'Name' => 'Polictics/Government/Law-Related History ', 'created_at' => now()],
            ['CoverageID' => 11, 'Name' => 'World History and Civilization I', 'created_at' => now()],
            ['CoverageID' => 11, 'Name' => 'Wolrd History and Civilization II', 'created_at' => now()],
            ['CoverageID' => 11, 'Name' => 'Asian Studies', 'created_at' => now()],
            ['CoverageID' => 11, 'Name' => 'Economics', 'created_at' => now()],
            ['CoverageID' => 11, 'Name' => 'Methods', 'created_at' => now()],
            ['CoverageID' => 11, 'Name' => 'MAKABAYAN as a core learning area in Basic Eudcation', 'created_at' => now()],
            ['CoverageID' => 11, 'Name' => 'Assessment', 'created_at' => now()],

            ['CoverageID' => 12, 'Name' => 'Foundation of Values Education', 'created_at' => now()],
            ['CoverageID' => 12, 'Name' => 'Personhood Development', 'created_at' => now()],
            ['CoverageID' => 12, 'Name' => 'Transformative Education (sources of Values and Factors in Values Ed)', 'created_at' => now()],
            ['CoverageID' => 12, 'Name' => 'Work Ethics and Community Service: Commitment to Social responsibility and accountability', 'created_at' => now()],
            ['CoverageID' => 12, 'Name' => 'Approaches and Methodologies', 'created_at' => now()],
            ['CoverageID' => 12, 'Name' => 'Research and Evalutiona', 'created_at' => now()],

            ['CoverageID' => 13, 'Name' => 'Foundations of MAPEH', 'created_at' => now()],
            ['CoverageID' => 13, 'Name' => 'Methods and Strategies of Teaching MAPEH', 'created_at' => now()],
            ['CoverageID' => 13, 'Name' => 'Coaching and Officiating of Sports Events, Dance Competitions and Music Activities ', 'created_at' => now()],
            ['CoverageID' => 13, 'Name' => 'Organization and Management,', 'created_at' => now()],
            ['CoverageID' => 13, 'Name' => 'Research,', 'created_at' => now()],
            ['CoverageID' => 13, 'Name' => 'Special Education in MAPEH', 'created_at' => now()],
            ['CoverageID' => 13, 'Name' => 'Physical Education', 'created_at' => now()],
            ['CoverageID' => 13, 'Name' => 'Gymnastics', 'created_at' => now()],
            ['CoverageID' => 13, 'Name' => 'Health Education', 'created_at' => now()],
            ['CoverageID' => 13, 'Name' => 'MUSIC', 'created_at' => now()],
            ['CoverageID' => 13, 'Name' => 'Art Education', 'created_at' => now()],

            ['CoverageID' => 14, 'Name' => 'Functional Application of Knowledge', 'created_at' => now()],
            ['CoverageID' => 14, 'Name' => 'Breeds of Farm Animals and Fish', 'created_at' => now()],
            ['CoverageID' => 14, 'Name' => 'Pests and Diseases Affecting Animals and Fish Propagation,', 'created_at' => now()],
            ['CoverageID' => 14, 'Name' => 'Marketing Stategies in the Industry/Entrepreneurship', 'created_at' => now()],
            ['CoverageID' => 14, 'Name' => 'Proper Care and Management of Agricultural and Fishery Products ', 'created_at' => now()],

            ['CoverageID' => 15, 'Name' => 'Basic Drafting', 'created_at' => now()],
            ['CoverageID' => 15, 'Name' => 'Business Math', 'created_at' => now()],
            ['CoverageID' => 15, 'Name' => 'Basic Electricity', 'created_at' => now()],
            ['CoverageID' => 15, 'Name' => 'Basic Plmbing ', 'created_at' => now()],
            ['CoverageID' => 15, 'Name' => 'Cosmetology ', 'created_at' => now()],
            ['CoverageID' => 15, 'Name' => 'Foods ', 'created_at' => now()],
            ['CoverageID' => 15, 'Name' => 'Carpentry and Masonry', 'created_at' => now()],
            ['CoverageID' => 15, 'Name' => 'Basic Electronics and Entrepreneurship', 'created_at' => now()]
        ];

        Focus::insert($focuses);
    }
}
