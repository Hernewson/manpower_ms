<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquiryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiry_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cat_name');
            $table->string('cat_companyName');
            $table->date('cat_expiryDate');
            $table->integer('cat_vacancies');
            $table->string('cat_countries');
            $table->integer('cat_lotNumber');
            $table->date('cat_approvalDate');
            $table->tinyInteger('status')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('enquiry_categories');
    }
}
