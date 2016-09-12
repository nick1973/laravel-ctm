<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->string('grade');
            $table->string('qty');
            $table->string('position');
            $table->string('monday_start');
            $table->string('monday_end');
            $table->string('monday_hours');
            $table->string('tuesday_start');
            $table->string('tuesday_end');
            $table->string('tuesday_hours');
            $table->string('wednesday_start');
            $table->string('wednesday_end');
            $table->string('wednesday_hours');
            $table->string('thursday_start');
            $table->string('thursday_end');
            $table->string('thursday_hours');
            $table->string('friday_start');
            $table->string('friday_end');
            $table->string('friday_hours');
            $table->string('saturday_start');
            $table->string('saturday_end');
            $table->string('saturday_hours');
            $table->string('sunday_start');
            $table->string('sunday_end');
            $table->string('sunday_hours');
            $table->string('total');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');

//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('specs');
    }
}
