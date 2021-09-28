<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBouquetCandies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'bouquet_candies', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('bouquet_id');
                $table->foreign('bouquet_id', 'fk_bouquet_candies_bouquet')->references('id')->on('bouquets')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('candy_id');
                $table->foreign('candy_id', 'fk_bouquet_candies_candies')->references('id')->on('candies')->onDelete('cascade')->onUpdate('cascade');
                $table->timestamps();
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
        Schema::dropIfExists('bouquet_candies');
    }
}
