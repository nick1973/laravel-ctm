<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

class RTWork extends Model
{

    protected $table = 'rt_work';
    protected $fillable = ['user_id', 'student', 'work_status', 'teaching_establishment', 'autumn_term_starts', 'autumn_term_ends', 'spring_term_starts', 'spring_term_ends',
        'autumn_term_starts', 'autumn_term_ends', 'spring_term_starts', 'spring_term_ends', 'summer_term_starts', 'summer_term_ends'];
}
