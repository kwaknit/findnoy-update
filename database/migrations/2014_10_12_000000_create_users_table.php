<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('MobileNumber', 11)->nullable();
            $table->string('EmailAddress')->unique();
            $table->string('Password')->nullable();
            $table->boolean('IsTeaching');
            $table->string('School')->nullable();
            $table->string('YearGraduated', 4);
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
        Schema::dropIfExists('users');
    }
}
