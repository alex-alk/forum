<?php

namespace Database\Seeders;


use App\Models\Subtopic;
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
            ->count(10)
            ->create();
    }
}
