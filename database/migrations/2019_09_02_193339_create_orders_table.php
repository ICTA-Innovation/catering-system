<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('orderId');
            $table->unsignedInteger('foodId');
            $table->unsignedInteger('customerId');
            $table->unsignedInteger('waiterId');
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->timestamps();

            //Foreign keys
            // $table->foreign('foodId')->references('foodId')->on('foods');
            // $table->foreign('customerId')->references('customerId')->on('customer');
            // $table->foreign('waiterId')->references('userId')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
