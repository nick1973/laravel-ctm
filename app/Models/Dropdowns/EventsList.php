<?php

namespace App\Models\Dropdowns;

use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\Model;

class EventsList extends Model
{
    protected $table = 'events_list';
    protected $fillable = ['event_name', 'visible', 'month'];





}
