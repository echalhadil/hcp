<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anquite_id')->references('id')->on('anquites'); 
            $table->foreignId('question_id')->references('id')->on('questions');
            $table->foreignId('option_id')->references('id')->on('options')->nullable(); //nullable
            $table->string('value')->nullable();
            $table->timestamps();

            $table->unique(['question_id', 'anquite_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reponses');
    }
}
