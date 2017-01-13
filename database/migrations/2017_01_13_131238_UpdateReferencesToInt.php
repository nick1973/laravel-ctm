<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReferencesToInt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('references', function (Blueprint $table) {
            $table->integer('ref_employed_from')->nullable()->change();
            $table->integer('ref_employed_to')->nullable()->change();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //int(11)
        
        Schema::table('references', function (Blueprint $table) {
            $table->string('ref_employed_from')->nullable()->change();
            $table->string('ref_employed_to')->nullable()->change();
            });
    }
}
