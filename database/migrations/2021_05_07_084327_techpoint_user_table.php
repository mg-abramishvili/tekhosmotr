<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TechpointUserTable extends Migration
{
    public function up()
    {
        Schema::create('techpoint_user', function (Blueprint $table) {
            $table->id();
            $table->integer('techpoint_id');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
