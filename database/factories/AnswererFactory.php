<?php

namespace Database\Factories;

use App\Models\Form;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswererFactory extends Factory
{
    public function definition(): array
    {
        return [
            'form_id' => Form::inRandomOrder()->first()->id,
        ];
    }
}
