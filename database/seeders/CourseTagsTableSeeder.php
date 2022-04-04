<?php

namespace Database\Seeders;

use App\Models\CourseTag;
use Illuminate\Database\Seeder;

class CourseTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseTag::factory(200)->create();
    }
}
