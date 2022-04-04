<?php

namespace Database\Seeders;

use App\Models\UserLesson;
use Illuminate\Database\Seeder;

class UserLessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLesson::factory(200)->create();
    }
}
