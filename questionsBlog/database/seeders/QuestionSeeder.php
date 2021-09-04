<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use database\factories\QuestionFactory;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::factory()->times(20)->create();
    }
}
