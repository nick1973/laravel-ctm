<?php

namespace App\Models\Ops;

use Illuminate\Database\Eloquent\Model;

class PayGrades extends Model
{
    protected $table = 'pay_grades';
    protected $fillable = ['role', 'pay', 'leeway', 'training', 'accreditation', 'charge_per_hour', 'margin'];
}
