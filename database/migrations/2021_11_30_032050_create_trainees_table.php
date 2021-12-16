<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->default('not');
            $table->string('dateOfBirth');
            $table->string('education');
            $table->string('programingLanguages');
            $table->string('toeicScore');
            $table->string('experienceDetails');
            $table->string('department');
            $table->string('location');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainees');
    }
}
