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
            $table->integer('events_id')->unsigned();
            $table->text('row_id');
            $table->text('grade');
            $table->text('qty');
            $table->text('position');
            $table->text('monday_start')->nullable();
            $table->text('monday_end')->nullable();
            $table->text('monday_hours')->nullable();
            $table->text('tuesday_start')->nullable();
            $table->text('tuesday_end')->nullable();
            $table->text('tuesday_hours')->nullable();
            $table->text('wednesday_start')->nullable();
            $table->text('wednesday_end')->nullable();
            $table->text('wednesday_hours')->nullable();
            $table->text('thursday_start')->nullable();
            $table->text('thursday_end')->nullable();
            $table->text('thursday_hours')->nullable();
            $table->text('friday_start')->nullable();
            $table->text('friday_end')->nullable();
            $table->text('friday_hours')->nullable();
            $table->text('saturday_start')->nullable();
            $table->text('saturday_end')->nullable();
            $table->text('saturday_hours')->nullable();
            $table->text('sunday_start')->nullable();
            $table->text('sunday_end')->nullable();
            $table->text('sunday_hours')->nullable();
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
