<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('permanent_address');
            $table->string('temporary_address');
            $table->string('phone');
            $table->integer('height');
            $table->integer('weight');
            $table->string('maritial_status');
            $table->string('next_of_kin');
            $table->string('contact_no');
            $table->string('nationality');
            $table->string('prof_img')->nullable();
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
        Schema::dropIfExists('personal_details');
    }
}
