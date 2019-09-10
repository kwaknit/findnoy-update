<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiledCaseDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filed_case_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('filed_case_id')->unsigned();
            $table->foreign('filed_case_id')->references('id')->on('filed_cases');
            $table->string('title', 100);
            $table->text('filename');
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
        Schema::dropIfExists('filed_case_documents');
    }
}
