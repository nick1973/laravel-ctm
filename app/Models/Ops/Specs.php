<?php

namespace App\Models\Ops;

use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\Model;

class Specs extends Model
{
    protected $table = 'specs';
    protected $fillable = ['events_id', 'row_id', 'grade', 'qty', 'position', 'monday_start', 'monday_end', 'monday_hours'
        , 'tuesday_start', 'tuesday_end', 'tuesday_hours', 'wednesday_start', 'wednesday_end', 'wednesday_hours'
        , 'thursday_start', 'thursday_end', 'thursday_hours', 'friday_start', 'friday_end', 'friday_hours'
        , 'saturday_start', 'saturday_end', 'saturday_hours', 'sunday_start', 'sunday_end', 'sunday_hours'
        , 'total', 'start', 'end', 'days'];

    public function event()
    {
        return $this->belongsTo(Events::class);
    }

    public function staff()
    {
        return $this->belongsToMany(User::class)->withPivot('id', 'row_id', 'start', 'end', 'days')->withTimestamps();
    }
}
