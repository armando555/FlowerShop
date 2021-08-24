<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class CreateCombosTable extends Migration

{
    /* Run the migrations.
    *
    * @return void
    */
    public function up(){

        Schema::create('combos', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->text('name');

            $table->text('bouquetType');

            $table->float('rate');

            $table->float('price');
            
            $table->timestamps();
        });
    }

    /* Reverse the migrations.
     *
     * @return void
     */

    public function down() {
        Schema::dropIfExists('combos');
    }
}
