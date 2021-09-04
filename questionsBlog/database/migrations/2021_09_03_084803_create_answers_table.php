<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('answers')){
            Schema::create('answers', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('question_id')->unsigned();
                $table->text('answer');
                $table->integer('likes')->default(0);
                $table->timestamps();

                $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
