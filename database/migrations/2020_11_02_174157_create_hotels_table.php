<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("name", 100)->unique();
            $table->varchar("range_rooms", 10);
            $table->text("description");
            $table->string("instagram", 100);
            $table->string("facebook", 100);
            $table->string("linkedin", 100);
            $table->string("twitter", 100);
            $table->string("logo", 200);
            $table->string("frontdesk_phone", 100);
            $table->string("reservations_phone", 100);
            $table->string("frontdesk_email", 100);
            $table->string("reservations_email", 100);
            $table->string("billing_email", 100);
            $table->string("location", 200);
            $table->integer("floor_number");
            $table->text("amenities");
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
        Schema::dropIfExists('hotels');
    }
}
