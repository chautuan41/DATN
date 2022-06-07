<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unique();
            $table->string('date_time');
            $table->string('address');
            $table->integer('total');
            $table->integer('account')->unsigned();
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('invoices');
    }
}
