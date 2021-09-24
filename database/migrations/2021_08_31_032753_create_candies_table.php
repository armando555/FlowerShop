<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'candies', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->float('price');
                $table->string('urlImg', 100);
                $table->unsignedBigInteger('bouquet_id')->nullable();
                $table->foreign('bouquet_id', 'fk_candies_bouquets')->references('id')->on('bouquets')->onDelete('cascade')->onUpdate('cascade');
                $table->unsignedBigInteger('combo_id')->nullable();
                $table->foreign('combo_id', 'fk_candies_combos')->references('id')->on('combos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('candies');
    }
}
