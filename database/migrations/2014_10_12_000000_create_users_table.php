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
            $table->bigIncrements('id');
            $table->string('first_name', 30);
            $table->string('middle_name', 20)->nullable();
            $table->string('last_name', 20);
            $table->date('birthdate');
            $table->string('birthplace', 100);
            $table->enum('gender', ['male', 'female']);
            $table->enum('civil_status', ['single', 'married', 'widowed', 'legally_separated']);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type', ['admin', 'field_officer', 'civilian'])->default('civilian');
            $table->string('contact_no', 20);
            $table->string('permanent_address', 100);
            $table->string('present_address', 100);
            $table->string('contact_person', 80);
            $table->string('contact_person_no', 20);
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
