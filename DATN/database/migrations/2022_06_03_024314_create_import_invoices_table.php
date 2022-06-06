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
            $table->increments('id');
            $table->string('sku');
            $table->string('ii_id');
            $table->string('date');
            $table->string('total');
            $table->integer('account')->unsigned();
            $table->integer('supplier')->unsigned();
            $table->string('status')->default(1);
            $table->timestamps();

            $table->foreign('supplier')
            ->references('id')->on('suppliers')
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
        Schema::dropIfExists('import_invoices');
    }
}
