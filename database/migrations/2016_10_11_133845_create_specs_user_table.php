<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specs_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('specs_id');
            $table->integer('row_id');
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->text('days');
            //$table->primary(['user_id','specs_id']);
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
        Schema::drop('specs_user');
    }
}
