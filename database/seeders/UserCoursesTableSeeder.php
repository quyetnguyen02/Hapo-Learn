<?php

namespace Database\Seeders;

use App\Models\UserCourse;
use Illuminate\Database\Seeder;

class UserCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserCourse::factory(200)->create();
    }
}
