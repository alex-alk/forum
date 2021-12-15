<?php

namespace Database\Factories;

use App\Models\Subtopic;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class SubtopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subtopic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        /** @var User $user */
        $user = Auth::user();
        return [
            'user_id' => $user->id,
            'title' => $this->faker->sentence,
            'topic_id' => Topic::all()->random()->id
        ];
    }
}
