<?php

namespace App\Models\Dropdowns;

use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'visible', 'date', 'postcode'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('user_id')->withTimestamps();
    }
}
