<?php

namespace Database\Factories;

use App\Models\Answerer;
use App\Models\Field;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'answer' => fake()->word(),
            'field_id' => Field::inRandomOrder()->first()->id,
            'answerer_id' => Answerer::inRandomOrder()->first()->id
        ];
    }
}
