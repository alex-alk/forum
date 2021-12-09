<?php

namespace Tests\Feature;

use App\Topic;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TopicsTest extends TestCase
{
    use DatabaseMigrations;

    public function test_a_user_can_view_all_topics()
    {
        /** @var Topic $topic */
        $topic = Topic::factory()->create();
        $response = $this->get('/');
        $response->assertSee($topic->title);
    }

    public function test_a_user_can_view_a_single_topic()
    {
        /** @var Topic $topic */
        $topic = Topic::factory()->create();
        $response = $this->get(route('topics.show', [$topic->id]));
        $response->assertSee($topic->title);
    }
}
