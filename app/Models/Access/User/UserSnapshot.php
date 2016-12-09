<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

class UserSnapshot extends Model
{

    protected $table = 'user_snapshot';
    protected $fillable = ['title', 'name', 'photo', 'lastname', 'mobile', 'land', 'dob', 'origin', 'gender', 'nationality', 'townofbirth',
        'countryofbirth', 'email', 'password', 'status', 'confirmation_code', 'confirmed',
        'address_line_1', 'address_line_2', 'city', 'county', 'country', 'postcode',
        'account_name', 'account_sort_code', 'account_number', 'ni_number', 'job_status', 'student_loan', 'profile_confirmed',
        'visible', 'dirty', 'address_dirty', 'reference_dirty', 'rtw_dirty', 'docs_dirty', 'heard_about_us', 'uni', 'promotion', 'payroll',
        'payroll_export'];

    //protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    //protected $dates = ['deleted_at'];
}
