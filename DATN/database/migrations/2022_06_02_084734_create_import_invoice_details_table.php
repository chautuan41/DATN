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
            $table->increments('iid_id');
            $table->string('product_name');
            $table->string('size');
            $table->string('color');
            $table->string('amount');
            $table->string('price');
            $table->integer('ii_fk')->unsigned();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('import_invoice_details');
    }
}
