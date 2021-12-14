<?php

namespace Tests\Unit;

use App\Models\Message;
use App\Models\Subtopic;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubtopicTest extends TestCase
{
    use RefreshDatabase;

    function test_a_subtopic_has_messages()
    {
        User::factory()->create();
        Topic::factory()->create();
        /** @var Subtopic $subtopic */
        $subtopic = Subtopic::factory()->create();

        /** @var Message $message */
        Message::factory()->create();
        $this->assertInstanceOf(Collection::class, $subtopic->messages);
    }

    function test_a_subtopic_has_a_creator()
    {
        User::factory()->create();
        Topic::factory()->create();
        /** @var Subtopic $subtopic */
        $subtopic = Subtopic::factory()->create();

        $this->assertInstanceOf(User::class, $subtopic->user);
    }
}
