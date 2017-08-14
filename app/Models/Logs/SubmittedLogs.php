<?php

namespace App\Models\Logs;

use Illuminate\Database\Eloquent\Model;

class SubmittedLogs extends Model
{
    protected $table = 'submission_logs';
    protected $fillable = ['staff_payroll', 'staff_name', 'who_was_it', 'accepted_application'];
}
