<?php

namespace Tests\Feature;

use App\Models\Message;
use App\Models\Subtopic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use RefreshDatabase;

    function test_an_authenticated_user_may_participate_in_forum_subtopics()
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->be($user);

        /** @var Subtopic $subtopic */
        $subtopic = Subtopic::factory()->create();

        /** @var Message $message */
        $message = Message::factory()->create();
        $this->post(route('messages.store'), $message->toArray());

        $this->get(route('subtopics.show', [$subtopic->id]))
            ->assertSee($message->body);
    }
}
