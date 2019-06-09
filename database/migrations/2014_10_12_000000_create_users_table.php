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
            $table->string('MiddleName');
            $table->string('LastName');
            $table->string('CompanyName');
            $table->string('OfficeNumber')->nullable();
            $table->string('FaxNumber')->nullable();
            $table->string('HomeNumber')->nullable();
            $table->string('MobileNumber')->nullable();
            $table->string('EmailAddress')->unique();
            $table->string('Password')->nullable();
            $table->string('City');
            $table->string('PostalCode', 4);
            $table->string('Country');
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
