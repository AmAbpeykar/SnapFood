<?php

use App\Models\RestaurantCategory;
use App\Models\User;
use App\Models\WorkingHour;
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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(WorkingHour::class);
            $table->string('address');
            $table->float('score_gt')->default(0);
            $table->foreignIdFor(RestaurantCategory::class);
            $table->float('latitude')->default(0);
            $table->float('longitude')->default(0);
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
        Schema::dropIfExists('restaurants');
    }
};
