<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\Subtopic;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use RefreshDatabase;

    function test_unauthenticated_users_may_not_add_replies()
    {
        $response = $this->post(route('messages.store'), []);
        $response->assertRedirect(route('login'));
    }

    function test_an_authenticated_user_may_participate_in_forum_subtopics()
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->be($user);

        Topic::factory()->create();
        /** @var Subtopic $subtopic */
        $subtopic = Subtopic::factory()->create();

        /** @var Message $message */
        $message = Message::factory()->make(); // just in memory

        $this->post(route('messages.store'), $message->toArray());

        $this->get(route('subtopics.show', [$subtopic->id]))
            ->assertSee($message->body);
    }
}
