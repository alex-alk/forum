<?php

namespace Tests\Unit;

use Database\Seeders\UsersTableSeeder;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_be_created()
    {
        // Run the DatabaseSeeder...
        //$this->seed();

        // Run a specific seeder...
        $this->seed();
        $this->assertDatabaseCount('users', 5);
        // ...
    }
}
