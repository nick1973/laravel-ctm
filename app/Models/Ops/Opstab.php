<?php

namespace App\Models\Ops;

use Illuminate\Database\Eloquent\Model;

class Opstab extends Model
{
    protected $table = 'ops_tabs';
    protected $fillable = ['event_id', 'tab_title', 'tab_href'];

}
