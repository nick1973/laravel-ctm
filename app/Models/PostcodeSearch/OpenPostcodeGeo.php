<?php

namespace App\Models\PostcodeSearch;

use Illuminate\Database\Eloquent\Model;

class OpenPostcodeGeo extends Model
{
    protected $table = 'open_postcode_geo';
    protected $fillable = ['postcode', 'distance'];
}
