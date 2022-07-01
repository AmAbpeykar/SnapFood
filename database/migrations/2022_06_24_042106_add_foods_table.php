<?php

use App\Models\FoodCategory;
use App\Models\Offer;
use App\Models\Restaurant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('price');
            $table->foreignIdFor(FoodCategory::class);
            $table->boolean('in_food_party');
            $table->foreignIdFor(Offer::class)->nullable();
            $table->foreignIdFor(Restaurant::class);
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
        //
    }
};
