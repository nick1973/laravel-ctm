<?php

namespace App\Models\Dropdowns;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'visible', 'date'];
}
