<?php

namespace App\Models\Ops;

use Illuminate\Database\Eloquent\Model;

class PayGrades extends Model
{
    protected $table = 'pay_grades';
    protected $fillable = ['role', 'market_rate', 'pay', 'base_pay', 'hol_pay', 'pension', 'nirs', 'uniform', 'training', 'accreditation', 'charge_per_hour', 'margin'];
}
