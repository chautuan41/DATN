<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('full_name');
            $table->string('phone');
            $table->string('address');
            $table->string('date_of_birth');
            $table->string('avatar');
            $table->integer('role')->unsigned(); 
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();

            $table->foreign('role')
            ->references('id')->on('roles')
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
        Schema::dropIfExists('accounts');
    }
}
