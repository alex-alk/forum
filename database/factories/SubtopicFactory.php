<?php

namespace Database\Factories;

use App\Subtopic;
use App\Topic;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'topic_id' => Topic::factory()
        ];
    }
}
