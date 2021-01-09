<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('avatar')->nullable();
            $table->string('hostname')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string("name_hotel", 100)->unique()->nullable();
            $table->text("description")->nullable();
            $table->string("instagram", 100)->nullable();
            $table->string("facebook", 100)->nullable();
            $table->string("linkedin", 100)->nullable();
            $table->string("twitter", 100)->nullable();
            $table->string("logo", 200)->nullable();
            $table->string("frontdesk_phone", 100)->nullable();
            $table->string("reservations_phone", 100)->nullable();
            $table->string("frontdesk_email", 100)->nullable();
            $table->string("reservations_email", 100)->nullable();
            $table->string("billing_email", 100)->nullable();
            $table->string("location", 200)->nullable();
            $table->integer("floor_number")->nullable();
            $table->text("amenities")->nullable();
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
