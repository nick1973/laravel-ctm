<?php

namespace App\Models\Dropdowns;

use Illuminate\Database\Eloquent\Model;

class RegistrationNotes extends Model
{
    protected $table = 'registration_notes';
    protected $fillable = ['notes'];
}
