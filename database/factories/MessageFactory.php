<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Subtopic;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /** @var User $user */
        $user = User::first();

        /** @var Subtopic $subtopic */
        $subtopic = Subtopic::all()->random();
        return [
            'user_id' => $user->id,
            'body' => $this->faker->sentence,
            'subtopic_id' => $subtopic->id,
        ];
    }
}
