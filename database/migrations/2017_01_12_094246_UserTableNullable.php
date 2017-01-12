<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTableNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->increments('id');
            //$table->tinyInteger('visible')->default(true)->change();
            $table->text('dirty')->nullable()->change();
            $table->text('address_dirty')->nullable()->change();
            $table->text('reference_dirty')->nullable()->change();
            $table->text('rtw_dirty')->nullable()->change();
            $table->text('docs_dirty')->nullable()->change();
            $table->string('photo')->nullable()->change();
            $table->string('title')->nullable()->change();
            $table->string('name')->nullable()->change();
            $table->string('lastname')->nullable()->change();
            $table->string('mobile')->nullable()->change();
            $table->string('land')->nullable()->change();
            $table->string('dob')->nullable()->change();
            $table->string('origin')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('nationality')->nullable()->change();
            $table->string('townofbirth')->nullable()->change();
            $table->string('countryofbirth')->nullable()->change();
            $table->string('emergency_contact_name')->nullable()->change();
            $table->string('emergency_contact_rel')->nullable()->change();
            $table->string('emergency_contact_number')->nullable()->change();
            $table->string('emergency_contact_mobile')->nullable()->change();
            $table->string('other_lang')->nullable()->change();
            $table->string('uk_driving_license')->nullable()->change();
            $table->text('d1')->nullable()->change();
            $table->string('nrswa')->nullable()->change();
            $table->string('convictions')->nullable()->change();
            $table->string('convictions_info')->nullable()->change();
            $table->string('medical_conditions')->nullable()->change();
            $table->string('medical_conditions_info')->nullable()->change();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            //ADDRESSES
            $table->string('address_line_1')->nullable()->change();
            $table->string('address_line_2')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('county')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('postcode')->nullable()->change();
            //ACCOUNTS
            $table->string('account_name')->nullable()->change();
            $table->string('account_sort_code')->nullable()->change();
            $table->string('account_number')->nullable()->change();
            $table->string('ni_number')->nullable()->change();
            $table->string('job_status')->nullable()->change();
            $table->string('student_loan')->nullable()->change();
            $table->string('profile_confirmed')->nullable()->change();
            $table->string('payroll')->nullable()->change();
            //$table->tinyInteger('payroll_export')->nullable()->change();
            //Marketing
            $table->string('heard_about_us')->nullable()->change();
            $table->string('uni')->nullable()->change();
            $table->string('promotion')->nullable()->change();

            $table->string('confirmation_code')->nullable()->change();
            $table->boolean('confirmed')->default(true)->change();
            $table->rememberToken()->nullable()->change();
            //$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            //$table->timestamp('updated_at');
            //$table->softDeletes();
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
