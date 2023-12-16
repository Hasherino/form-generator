<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Answerer;
use App\Models\Field;
use App\Models\Form;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Form::factory(3)->create();
        Field::factory(15)->create();
        Answerer::factory(10)->create();
        Answer::factory(50)->create();
    }
}
