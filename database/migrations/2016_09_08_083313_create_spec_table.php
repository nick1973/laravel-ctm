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
            $table->text('row_id');
            $table->text('grade');
            $table->text('qty');
            $table->text('position');
            $table->text('monday_start');
            $table->text('monday_end');
            $table->text('monday_hours');
            $table->text('tuesday_start');
            $table->text('tuesday_end');
            $table->text('tuesday_hours');
            $table->text('wednesday_start');
            $table->text('wednesday_end');
            $table->text('wednesday_hours');
            $table->text('thursday_start');
            $table->text('thursday_end');
            $table->text('thursday_hours');
            $table->text('friday_start');
            $table->text('friday_end');
            $table->text('friday_hours');
            $table->text('saturday_start');
            $table->text('saturday_end');
            $table->text('saturday_hours');
            $table->text('sunday_start');
            $table->text('sunday_end');
            $table->text('sunday_hours');
            $table->text('total');
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
