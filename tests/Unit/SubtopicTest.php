<?php

namespace Tests\Unit;

use App\Models\Message;
use App\Models\Subtopic;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubtopicTest extends TestCase
{
    use RefreshDatabase;

    /** @var Subtopic $subtopic  */
    private $subtopic;

    /** @var User $user  */
    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->be($this->user);

        Topic::factory()->create();
        $this->subtopic = Subtopic::factory()->create();
    }

    function test_a_subtopic_has_messages()
    {
        /** @var Message $message */
        Message::factory()->create();
        $this->assertInstanceOf(Collection::class, $this->subtopic->messages);
    }

    function test_a_subtopic_has_a_creator()
    {
        $this->assertInstanceOf(User::class, $this->subtopic->user);
    }
}