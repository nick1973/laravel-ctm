<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePayGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pay_grades', function ($table) {

            $table->decimal('market_rate');
            $table->decimal('base_pay');
            $table->decimal('hol_pay', 5, 2);
            $table->decimal('pension', 5, 2);
            $table->decimal('nirs', 5, 2);
            $table->decimal('uniform', 5, 2);


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
        Schema::drop('pay_grades');
    }
}
