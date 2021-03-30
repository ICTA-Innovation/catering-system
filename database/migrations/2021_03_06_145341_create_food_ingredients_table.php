<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_ingredients', function (Blueprint $table) {
            $table->unsignedInteger('foodId');
            $table->unsignedInteger('ingredientId');
            $table->timestamps();

            //Foreing Key            
            // $table->foreign('foodId')->references('foodId')->on('foods');
            // $table->foreign('ingredientId')->references('ingredientId')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_ingredients');
    }
}
