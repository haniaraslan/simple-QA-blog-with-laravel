<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->sentence.'?', //Generates a fake sentence
            'likes' => $this->faker->numberBetween(1, 20), //generates fake 30 paragraphs
            'hasAnswer' => $this->faker->boolean,
        ];
    }
}
