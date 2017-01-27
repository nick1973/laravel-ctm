<?php

namespace App\Models\Dropdowns;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'visible', 'date'];

    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('tag_id')->withTimestamps();
    }
}
