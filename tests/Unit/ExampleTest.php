<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function tables()
    {
        $this->seed();
        $this->assertDatabaseCount('users', 5);
        $this->assertDatabaseCount('topics', 5);
        $this->assertDatabaseCount('subtopics', 5);
    }
}
