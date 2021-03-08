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
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->string("name", 100)->unique();
            $table->string("range_rooms", 10)->default('0');
            $table->text("description");
            $table->string("stars", 20);
            $table->string("opening_date", 20);
            $table->string("floor_number", 20);
            $table->string("property_type", 20);
            $table->string("instagram", 100);
            $table->string("facebook", 100);
            $table->string("linkedin", 100);
            $table->string("youtube", 100);
            $table->string("twitter", 100);
            $table->string("frontdesk_phone", 100);
            $table->string("reservation_phone", 100);
            $table->string("frontdesk_email", 100);
            $table->string("reservation_email", 100);
            $table->string("billingcontact_email", 100);
            $table->string("country", 200);
            $table->string("state", 200);
            $table->string("city", 200);
            $table->string("address", 200);
            $table->softDeletes(); //Columna para soft delete
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
