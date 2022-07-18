<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->integer('total');
            $table->integer('account')->unsigned();
            $table->integer('product')->unsigned();
            $table->integer('size')->unsigned();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product')
            ->references('id')->on('products')
            ->onDelete('cascade');
            $table->foreign('account')
            ->references('id')->on('accounts')
            ->onDelete('cascade');
            $table->foreign('size')
            ->references('id')->on('sizes')
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
        Schema::dropIfExists('carts');
    }
}
