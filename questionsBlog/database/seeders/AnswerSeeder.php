<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use database\factories\AnswerFactory;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::factory()->times(25)->create();
    }
}
