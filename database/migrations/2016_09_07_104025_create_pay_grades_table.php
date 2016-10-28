<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->decimal('pay', 5, 2);
            $table->decimal('leeway', 5, 2);
            $table->decimal('training', 5, 2);
            $table->decimal('accreditation', 5, 2);
            $table->decimal('charge_per_hour', 5, 2);

            $table->decimal('market_rate');
            $table->decimal('base_pay');
            $table->decimal('hol_pay', 5, 2);
            $table->decimal('pension', 5, 2);
            $table->decimal('nirs', 5, 2);
            $table->decimal('uniform', 5, 2);

            $table->string('margin');

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
        //Schema::drop('pay_grades');
    }
}
