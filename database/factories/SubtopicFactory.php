<?php

namespace Database\Factories;

use App\Models\Subtopic;
use App\Models\Topic;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->sentence,
            'topic_id' => Topic::all()->random()->id
        ];
    }
}
