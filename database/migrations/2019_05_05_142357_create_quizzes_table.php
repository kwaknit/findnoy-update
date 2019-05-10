<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('ID');
            $table->unsignedInteger('CategoryID');
            $table->foreign('CategoryID')->references('ID')->on('categories')->onDelete('cascade');
            $table->unsignedInteger('CoverageID')->nullable();
            $table->foreign('CoverageID')->references('ID')->on('coverages')->onDelete('cascade');
            $table->unsignedInteger('FocusID')->nullable();
            $table->foreign('FocusID')->references('ID')->on('focuses')->onDelete('cascade');
            $table->string('Name')->unique();
            $table->tinyInteger('QuestionCount');
            $table->tinyInteger('Time');
            $table->boolean('IsFeatured')->default(false);
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
        Schema::dropIfExists('quizzes');
    }
}
