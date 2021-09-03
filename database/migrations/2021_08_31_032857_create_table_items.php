<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('type',50);
            $table->decimal('amount');
            $table->decimal('subtotal');
            $table->decimal('discount');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id','fk_items_orders')->references('id')->on('orders')->onDelete('cascade')->onUpdate('restrict');
            $table->unsignedBigInteger('flower_id');
            $table->foreign('flower_id','fk_items_flower')->references('id')->on('flowers')->onDelete('cascade')->onUpdate('restrict');
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
        Schema::dropIfExists('items');
    }
}
