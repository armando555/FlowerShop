<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableComboFlowers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'combo_flowers', function (Blueprint $table) {
                $table->unsignedBigInteger('flower_id');
                $table->foreign('flower_id', 'fk_combo_flowers_flower')->references('id')->on('flowers')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('combo_id');
                $table->foreign('combo_id', 'fk_combo_flowers_combo')->references('id')->on('combos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('combo_flowers');
    }
}
