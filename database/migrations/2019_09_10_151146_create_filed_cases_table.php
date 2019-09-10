<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiledCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filed_cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50);
            $table->string('description');
            $table->enum('type', ['wanted_criminal', 'missing_person', 'carnapped_vehicle']);
            $table->string('full_name');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('last_seen_date')->nullable();
            $table->string('last_seen_place');
            $table->enum('status', ['open', 'ongoing', 'closed']);
            $table->dateTime('issued_at');
            $table->dateTime('closed_at')->nullable();
            $table->bigInteger('assigned_to_user_id')->unsigned();
            $table->foreign('assigned_to_user_id')->references('id')->on('users');
            $table->boolean('privacy')->default(0);
            $table->bigInteger('police_station_id')->unsigned();
            $table->foreign('police_station_id')->references('id')->on('police_stations');
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
        Schema::dropIfExists('filed_cases');
    }
}
