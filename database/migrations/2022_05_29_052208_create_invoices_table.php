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
            $table->id('invoice_id');
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('invoiceproduct_id');
            $table->foreign('product_id')->references('product_id')->on('products')->onUpdate('cascade');
            $table->foreign('invoiceproduct_id')->references('invoice_products_id')->on('invoice_products');
            $table->integer('quantity');
            
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
