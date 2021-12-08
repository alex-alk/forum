<?php

namespace Database\Seeders;

use App\Subtopic;
use App\Topic;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(5)
            ->create();
//        Topic::factory()
//            ->count(5)
//            ->create();
//        Subtopic::factory()
//            ->count(5)
//            ->create();
    }
}
