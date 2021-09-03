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
        Schema::create(
            'items', function (Blueprint $table) {
                $table->id();
                $table->string('type', 50);
                $table->decimal('amount');
                $table->decimal('subtotal');
                $table->decimal('discount');
                $table->unsignedBigInteger('order_id');
                $table->foreign('order_id', 'fk_items_orders')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('flower_id');
                $table->foreign('flower_id', 'fk_items_flower')->references('id')->on('flowers')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('bouquet_id');
                $table->foreign('bouquet_id', 'fk_items_bouquets')->references('id')->on('bouquets')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('candy_id');
                $table->foreign('candy_id', 'fk_items_candies')->references('id')->on('candies')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('combo_id');
                $table->foreign('combo_id', 'fk_items_combos')->references('id')->on('combos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('items');
    }
}
