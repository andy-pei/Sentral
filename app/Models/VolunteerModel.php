<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerModel extends Model
{
    protected $table = 'volunteers';
    protected $guarded = array();

    public function events()
    {
        return $this->morphToMany('App\Models\EventModel', 'participantable', null, null, 'event_id');
    }

    public function transactions() {
        return $this->morphMany('App\Models\TransactionModel', 'transactionable');
    }
}
