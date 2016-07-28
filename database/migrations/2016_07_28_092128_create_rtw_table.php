<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRtwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rt_work', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('teaching_establishment');
            $table->string('student');
            $table->string('work_status');
            $table->string('autumn_term_starts');
            $table->string('autumn_term_ends');
            $table->string('spring_term_starts');
            $table->string('spring_term_ends');
            $table->string('summer_term_starts');
            $table->string('summer_term_ends');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rt_work');
    }
}
