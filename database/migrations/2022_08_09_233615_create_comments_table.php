<?php

use App\Models\Cart;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Food::class);
            $table->foreignIdFor(Restaurant::class);
            $table->string('title');
            $table->string('content');
            $table->foreignIdFor(User::class)->nullable();
            $table->foreignIdFor(Cart::class)->nullable();
            $table->float('score');
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
        Schema::dropIfExists('comments');
    }
};