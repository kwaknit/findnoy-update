<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommittedCrimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('committed_crimes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('filed_case_id')->unsigned();
            $table->foreign('filed_case_id')->references('id')->on('filed_cases');
            $table->bigInteger('crime_id')->unsigned();
            $table->foreign('crime_id')->references('id')->on('crimes');
            $table->string('name', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('committed_crimes');
    }
}
