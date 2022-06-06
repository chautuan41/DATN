<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->string('date_time');
            $table->integer('product')->unsigned();
            $table->integer('account')->unsigned();
            $table->string('status')->default(1);
            $table->timestamps();

            $table->foreign('product')
            ->references('id')->on('products')
            ->onDelete('cascade');
            $table->foreign('account')
            ->references('id')->on('accounts')
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
        Schema::dropIfExists('comments');
    }
}