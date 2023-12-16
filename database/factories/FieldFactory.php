<?php

namespace Database\Factories;

use App\Models\Form;
use Illuminate\Database\Eloquent\Factories\Factory;

class FieldFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'regex' => '[A-Za-z0-9]{20}',
            'form_id' => Form::inRandomOrder()->first()->id
        ];
    }
}
