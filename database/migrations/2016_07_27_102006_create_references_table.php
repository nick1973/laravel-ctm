<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('ref_job_title');
            $table->string('ref_employed_from');
            $table->string('ref_employed_to');
            $table->string('ref_company_name');
            $table->string('ref_contact');
            $table->string('ref_phone_number');
            $table->string('ref_employer_address_line_1');
            $table->string('ref_employer_address_line_2');
            $table->string('ref_employer_city');
            $table->string('ref_employer_county');
            $table->string('ref_employer_country');
            $table->string('ref_employer_postcode');

            $table->string('ref_char_name');
            $table->string('ref_char_how_know');
            $table->string('ref_char_company');
            $table->string('ref_char_phone_number');
            $table->string('ref_character_address_line_1');
            $table->string('ref_character_address_line_2');
            $table->string('ref_character_city');
            $table->string('ref_character_county');
            $table->string('ref_character_country');
            $table->string('ref_character_postcode');

//            DOCUMENTS
            $table->string('passport_photo');
            $table->string('passport_photo_page');
            $table->string('birth_cert');
            $table->string('ni_card');

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
        Schema::drop('references');
    }
}
