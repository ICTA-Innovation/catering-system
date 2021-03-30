<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_login', function (Blueprint $table) {
            $table->unsignedInteger('customerId');
            $table->string('userName');
            $table->string('password');
            $table->string('otp')->nullable();
            $table->rememberToken();
            $table->timestamps();
            //Foreign Key
            // $table->foreign('customerId')->references('customerId')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_login');
    }
}
