<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageKnownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_knowns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('person_id')->unsigned();;
            $table->string('language');
            $table->enum('reading',['Good','Fair','Slight']);
            $table->enum('speaking',['Good','Fair','Slight']);
            $table->enum('writing',['Good','Fair','Slight']);
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_knowns');
    }
}
