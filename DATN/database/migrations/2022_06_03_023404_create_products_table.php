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
            $table->increments('id');
            $table->string('product_id');
            $table->string('sku');
            $table->string('product_name');
            $table->string('price');
            $table->string('discount');
            $table->integer('like');
            $table->integer('product_type')->unsigned();
            $table->integer('supplier')->unsigned();
            $table->string('status')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_type')
            ->references('id')->on('product_types')
            ->onDelete('cascade');
            $table->foreign('supplier')
            ->references('id')->on('suppliers')
            ->onDelete('cascade');
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
