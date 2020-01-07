<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTechKnowledgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_tech_knowledge', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('person_id')->unsigned();;
            $table->string('knowledge');
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
        Schema::dropIfExists('training_tech_knowledge');
    }
}
