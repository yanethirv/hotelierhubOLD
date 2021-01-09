<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_id');
            $table->foreign("subscription_id")->references("id")->on("subscriptions");
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")->references("id")->on("users");
            $table->enum('status', ['process', 'active', 'inactive','review']);
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
        Schema::dropIfExists('subscription_requests');
    }
}
