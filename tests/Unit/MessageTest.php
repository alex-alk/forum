<?php

namespace Tests\Unit;

use App\Models\Message;
use App\Models\Subtopic;
use App\Models\Topic;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_has_an_owner()
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->be($user);

        Topic::factory()->create();
        Subtopic::factory()->create();

        /** @var Message $message */
        $message = Message::factory()->create();
        $this->assertInstanceOf(User::class, $message->user);
    }
}
