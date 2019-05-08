<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedInteger('CategoryID');
            $table->foreign('CategoryID')->references('ID')->on('categories')->onDelete('cascade');
            $table->unsignedInteger('CoverageID');
            $table->foreign('CoverageID')->references('ID')->on('coverages')->onDelete('cascade');
            $table->unsignedInteger('FocusID');
            $table->foreign('FocusID')->references('ID')->on('focuses')->onDelete('cascade');
            $table->string('Name');
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
        Schema::dropIfExists('questions');
    }
}
