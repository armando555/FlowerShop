<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableItemsFlowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_flowers', function (Blueprint $table) {
            $table->unsignedBigInteger('flower_id');
            $table->foreign('flower_id','fk_items_flowers_flowers')->references('id')->on('flowers')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id','fk_items_flowers_items')->references('id')->on('items')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_flowers');
    }
}
