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
        Schema::table('users', function ($table) {
            $table->text('dirty')->nullable()->change();
            $table->text('address_dirty')->nullable()->change();
            $table->text('reference_dirty')->nullable()->change();
            $table->text('rtw_dirty')->nullable()->change();
            $table->text('docs_dirty')->nullable()->change();
            $table->string('photo')->nullable()->change();
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
