<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->date('order_date');
            $table->integer('order_qty');
            $table->decimal('order_amount', 9, 2);
            $table->integer('order_product_id');
            $table->integer('order_customer_id');
            $table->foreign('order_product_id')->references('product_id')->on('product')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('order_customer_id')->references('customer_id')->on('customer')
                  ->onUpdate('cascade')->onDelete('restrict');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
