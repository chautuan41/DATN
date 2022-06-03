<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_invoices', function (Blueprint $table) {
            $table->increments('ii_id');
            $table->string('SKU');
            $table->string('date');
            $table->string('total');
            $table->integer('account_fk')->unsigned();
            $table->integer('supplier_fk')->unsigned();
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
        Schema::dropIfExists('import_invoices');
    }
}
