<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string("product_name", 100);
            $table->foreign("product_id")->references("id")->on("products");
            $table->unsignedBigInteger('user_id');
            $table->string("hostname", 100);
            $table->foreign("user_id")->references("id")->on("users");
            $table->enum('status', ['process', 'active', 'inactive','wait']);
            $table->text("comment")->nullable();
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
        Schema::dropIfExists('activations');
    }
}
