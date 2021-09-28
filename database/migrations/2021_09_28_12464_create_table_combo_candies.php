<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableComboCandies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'combo_candies', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('candy_id');
                $table->foreign('combo_id', 'fk_combo_candies_candy')->references('id')->on('candies')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('combo_id');
                $table->foreign('combo_id', 'fk_combo_candies_combo')->references('id')->on('combos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('combo_candies');
    }
}
