<?php

namespace App\Models\Access\User;

use App\Models\Access\User\Traits\UserAccess;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Access\User\Traits\Attribute\UserAttribute;
use App\Models\Access\User\Traits\Relationship\UserRelationship;

/**
 * Class User
 * @package App\Models\Access\User
 */
class User extends Authenticatable
{

    use SoftDeletes, UserAccess, UserAttribute, UserRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'name', 'photo', 'lasttname', 'mobile', 'dob', 'origin', 'gender', 'nationality', 'townofbirth',
                            'countryofbirth', 'email', 'password', 'status', 'confirmation_code', 'confirmed',
                            'address_line_1', 'address_line_2', 'city', 'county', 'country', 'postcode',
                            'account_name', 'account_sort_code', 'account_number', 'ni_number', 'job_status', 'student_loan', 'profile_confirmed',
                            'visible'];


    public function references()
    {
        return $this->hasOne('App\Models\Access\User\References');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
