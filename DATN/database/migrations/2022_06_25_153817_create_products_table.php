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
            $table->string('sku',50)->nullable();
            $table->string('product_name');
            $table->longText('description');
            $table->integer('price')->default(0);
            $table->integer('gender');
            $table->integer('discount')->default(0);
            $table->integer('like')->default(0);
            $table->string('image');
            $table->integer('categories')->unsigned();
            $table->integer('product_type')->unsigned();
            $table->integer('supplier')->unsigned();
            $table->integer('brand')->unsigned();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('categories')
            ->references('id')->on('categories')
            ->onDelete('cascade');
            $table->foreign('product_type')
            ->references('id')->on('product_types')
            ->onDelete('cascade');
            $table->foreign('supplier')
            ->references('id')->on('suppliers')
            ->onDelete('cascade');
            $table->foreign('brand')
            ->references('id')->on('brands')
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
