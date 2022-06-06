<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_invoice_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('amount');
            $table->string('price');
            $table->integer('import_invoice')->unsigned();
            $table->integer('product')->unsigned();
            $table->string('status')->default(1);
            $table->timestamps();

            $table->foreign('import_invoice')
            ->references('id')->on('import_invoices')
            ->onDelete('cascade');
            $table->foreign('product')
            ->references('id')->on('products')
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
        Schema::dropIfExists('import_invoice_details');
    }
}