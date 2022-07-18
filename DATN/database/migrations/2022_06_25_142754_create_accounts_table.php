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
            $table->string('email',50)->unique();
            $table->string('password',30);
            $table->string('full_name',50)->nullable();
            $table->string('phone',11)->nullable();
            $table->string('address')->nullable();
            $table->string('date_of_birth',30)->nullable();
            $table->string('avatar')->nullable();
            $table->integer('role')->unsigned();
            $table->integer('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

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
