<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('person_id')->unsigned();
            $table->string('position_applied');
            $table->string('reference_person');
            $table->string('ref_contact');
            $table->string('country');
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
        Schema::dropIfExists('final_details');
    }
}
