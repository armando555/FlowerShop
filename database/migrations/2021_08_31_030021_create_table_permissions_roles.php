<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePermissionsRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('permissions_id');
            $table->foreign('permissions_id','fk_permissions_roles_permissions')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id','fk_permissions__roles_roles')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions_roles');
    }
}
