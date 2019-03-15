<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('invoice_id');
            $table->integer('order_id')->unsigned();
            $table->integer('user_id')->unsigned();             
            $table->string('prod_name');
            $table->string('description');
            $table->integer('qty');
            $table->decimal('price', 10,2);
            $table->decimal('discount', 10,2);
            $table->decimal('total', 10,2);
            //$table->decimal('amount', 8, 2);
            $table->integer('status');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('user_id')->references('id')->on('users');
            
   
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
