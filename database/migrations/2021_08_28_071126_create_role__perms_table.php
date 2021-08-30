<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role__perms', function (Blueprint $table) {
            $table->id('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->id('perm_id');
            $table->foreign('perm_id')->references('id')->on('permission');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role__perms');
    }
}
