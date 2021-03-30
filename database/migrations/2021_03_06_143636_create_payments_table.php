<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('transactionId');
            $table->unsignedInteger('customerId');
            $table->unsignedInteger('orderId');
            $table->integer('paymentMethod');
            $table->string('status');
            $table->integer('amount');
            $table->dateTime('timeDateOfPayment');
            $table->timestamps();

            //Foreign key
            // $table->foreign('customerId')->references('customerId')->on('customer');
            // $table->foreign('orderId')->references('orderId')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
