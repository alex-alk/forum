<?php

namespace Database\Seeders;

use App\Subtopic;
use App\Topic;
use App\User;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::factory()
            ->count(5)
            ->create();
    }
}
