<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\Subtopic;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TopicsTest extends TestCase
{
    use RefreshDatabase;

    /** @var Topic $topic */
    private $topic;

    public function setUp(): void
    {
        parent::setUp();
        $this->topic = Topic::factory()->create();
    }

    public function test_a_user_can_view_all_topics()
    {
        $response = $this->get('/');
        $response->assertSee($this->topic->title);
    }

    public function test_a_user_can_view_a_single_topic()
    {
        $response = $this->get(route('topics.show', [$this->topic->id]));
        $response->assertSee($this->topic->title);
    }

    public function test_a_user_can_read_messages_that_are_associated_with_a_subtopic()
    {
        User::factory()->create();
        /** @var Subtopic $subtopic */
        $subtopic = Subtopic::factory()->create();
        /** @var Message $message */
        $message = Message::factory()->create();
        $response = $this->get(route('subtopics.show', [$subtopic->id]));
        $response->assertSee($message->body);
    }
}
