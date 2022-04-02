<?php

namespace Database\Seeders;

use Database\Factories\UserLessonFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(TagTableSeeder::class);
    }
}
