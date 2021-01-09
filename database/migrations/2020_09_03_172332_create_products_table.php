<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name", 100)->unique();
            $table->text("description");
            $table->float("price")->comment("Precio del producto");
            $table->float("cost")->comment("Costo del producto");
            $table->unsignedBigInteger("type_id")->comment("Tipo de producto");
            $table->string("picture", 150)->nullable()->comment("Imagen del producto");
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
        Schema::dropIfExists('products');
    }
}
