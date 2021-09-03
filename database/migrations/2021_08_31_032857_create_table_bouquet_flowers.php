<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBouquetFlowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'bouquet_flowers', function (Blueprint $table) {
                $table->unsignedBigInteger('flower_id');
                $table->foreign('flower_id', 'fk_bouquet_flowers_flower')->references('id')->on('flowers')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('bouquet_id');
                $table->foreign('bouquet_id', 'fk_bouquet_flowers_bouquets')->references('id')->on('bouquets')->onDelete('cascade')->onUpdate('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bouquet_flowers');
    }
}
