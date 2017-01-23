<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSnapshotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_snapshot', function ($table) {
            $table->text('dirty')->nullable()->change();
            $table->text('address_dirty')->nullable()->change();
            $table->text('reference_dirty')->nullable()->change();
            $table->text('rtw_dirty')->nullable()->change();
            $table->text('docs_dirty')->nullable()->change();
            $table->string('photo')->nullable()->change();
            $table->string('student_loan')->nullable()->change();
            $table->string('payroll')->nullable()->change();
            $table->string('promotion')->nullable()->change();
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
