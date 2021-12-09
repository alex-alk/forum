<?php

namespace Database\Seeders;

use App\Subtopic;
use App\Topic;
use App\User;
use Illuminate\Database\Seeder;

class SubtopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subtopic::factory()
            ->count(5)
            ->create();
    }
}
