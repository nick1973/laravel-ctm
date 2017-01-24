<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserSanpshotTable4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_snapshot', function ($table) {
            $table->text('p45')->nullable();
            $table->integer('markAsp45')->nullable();
            $table->integer('exportP45')->nullable();
            $table->integer('app_status')->nullable();
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
