<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    protected $table = 'parents';
    protected $guarded = array();

    public function students()
    {
        return $this->belongsToMany('App\Models\StudentModel', 'student_parent', 'parent_id', 'student_id');
    }

    public function events()
    {
        return $this->morphToMany('App\Models\EventModel', 'participantable', null, null, 'event_id');
    }

    public function transactions() {
        return $this->morphMany('App\Models\TransactionModel', 'transactionable');
    }
}
