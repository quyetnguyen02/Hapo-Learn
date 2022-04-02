<?php

namespace Database\Seeders;

use App\Models\TeacherCourse;
use Illuminate\Database\Seeder;

class TeacherCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeacherCourse::factory(200)->create();
    }
}
