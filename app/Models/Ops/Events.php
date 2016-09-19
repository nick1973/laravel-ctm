<?php

namespace App\Models\Ops;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    protected $fillable = ['event_name', 'contract_manager', 'operation_manager', 'event_start_date', 'event_end_date', 'ctm_start_date', 'ctm_end_date'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
//    public function spec()
//    {
//        return $this->hasMany(Specs::class);
//    }
}
