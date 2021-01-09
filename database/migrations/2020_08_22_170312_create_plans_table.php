<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('currency')->default('usd');
            $table->string('interval')->default('month');
            $table->string('product');
            $table->string('nickname')->unique();
            $table->float('amount');
            $table->float('cost');
            $table->unsignedBigInteger("type_id")->comment("Tipo de plan");
            $table->text('description')->nullable();
            $table->enum('status',['active', 'inactive'])->default('active');
            $table->string("document", 200);
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
        Schema::dropIfExists('plans');
    }
}
