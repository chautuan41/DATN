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
            $table->integer('price');
            $table->integer('amount');
            $table->integer('discount');
            $table->integer('like');
            $table->string('image');
            $table->integer('product_type')->unsigned();
            $table->integer('supplier')->unsigned();
            $table->integer('product_brand')->unsigned();
            $table->integer('men')->nullable()->default(1);
            $table->integer('women')->nullable()->default(2);
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_type')
            ->references('id')->on('product_types')
            ->onDelete('cascade');
            $table->foreign('supplier')
            ->references('id')->on('suppliers')
            ->onDelete('cascade');
            $table->foreign('product_brand')
            ->references('id')->on('product_brands')
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