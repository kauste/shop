<?php

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
        Schema::create('cloths', function (Blueprint $table) {
            $table->id();
            $table->string('cloth_name', 50);
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->decimal('price',  $precision = 8, $scale = 2);
            $table->unsignedTinyInteger('amount_left');
            $table->unsignedTinyInteger('discount')->nullable();
            $table->unsignedTinyInteger('rate')->default(0);
            $table->unsignedBigInteger('amount_of_rates')->default(0);
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
        Schema::dropIfExists('cloths');
    }
};
