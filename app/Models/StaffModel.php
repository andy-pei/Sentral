<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffModel extends Model
{
    protected $table = 'staffs';
    protected $guarded = array();

    public function events()
    {
        return $this->morphToMany('App\Models\EventModel', 'participantable', null, null, 'event_id')->withPivot('has_permission');
    }

    public function transactions() {
        return $this->morphMany('App\Models\TransactionModel', 'transactionable');
    }
}
