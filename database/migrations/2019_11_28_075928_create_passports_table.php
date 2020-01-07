<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('person_id')->unsigned();;
            $table->integer('passport_no');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->string('issue_place');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->integer('age');
            $table->string('image');
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
        Schema::dropIfExists('passports');
    }
}
