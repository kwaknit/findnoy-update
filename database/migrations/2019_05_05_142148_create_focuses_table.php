<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFocusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('focuses', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedInteger('CoverageID');
            $table->foreign('CoverageID')->references('ID')->on('coverages')->onDelete('cascade');
            $table->longText('Name');
            $table->softDeletes();
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
        Schema::dropIfExists('focuses');
    }
}
