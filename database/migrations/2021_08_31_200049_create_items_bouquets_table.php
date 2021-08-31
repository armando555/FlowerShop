<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsBouquetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_bouquets', function (Blueprint $table) {
            $table->unsignedBigInteger('bouquet_id');
            $table->foreign('bouquet_id','fk_items_bouquets_bouquets')->references('id')->on('bouquets')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id','fk_items_bouquets_items')->references('id')->on('items')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_bouquets');
    }
}
