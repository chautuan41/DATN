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
            $table->string('iinvoices_id');
            $table->string('date');
            $table->integer('total');
            $table->integer('account')->unsigned();
            $table->integer('supplier')->unsigned();
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();

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
