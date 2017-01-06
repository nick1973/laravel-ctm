<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('visible');
            $table->text('dirty');
            $table->text('address_dirty');
            $table->text('reference_dirty');
            $table->text('rtw_dirty');
            $table->text('docs_dirty');
            $table->string('photo');
            $table->string('title');
            $table->string('name');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('land');
            $table->string('dob');
            $table->string('origin');
            $table->string('gender');
            $table->string('nationality');
            $table->string('townofbirth');
            $table->string('countryofbirth');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_rel');
            $table->string('emergency_contact_number');
            $table->string('emergency_contact_mobile');
            $table->string('other_lang');
            $table->string('uk_driving_license');
            $table->string('nrswa');
            $table->string('convictions');
            $table->string('convictions_info');
            $table->string('medical_conditions');
            $table->string('medical_conditions_info');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            //ADDRESSES
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('county');
            $table->string('country');
            $table->string('postcode');
            //ACCOUNTS
            $table->string('account_name');
            $table->string('account_sort_code');
            $table->string('account_number');
            $table->string('ni_number');
            $table->string('job_status');
            $table->string('student_loan');
            $table->string('profile_confirmed');
            $table->string('payroll');
            $table->tinyInteger('payroll_export');
            //Marketing
            $table->string('heard_about_us');
            $table->string('uni');
            $table->string('promotion');

            $table->string('confirmation_code');
            $table->boolean('confirmed')->default(config('access.users.confirm_email') ? false : true);
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
