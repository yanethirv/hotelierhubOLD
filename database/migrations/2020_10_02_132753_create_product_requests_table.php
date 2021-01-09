<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_line_id');
            $table->foreign("order_line_id")->references("id")->on("order_lines");
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
        Schema::dropIfExists('product_requests');
    }
}
