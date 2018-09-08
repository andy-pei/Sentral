<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $guarded = array();

    public function parents()
    {
        return $this->belongsToMany('App\Models\ParentModel', 'student_parent', 'student_id', 'parent_id');
    }

    public function events()
    {
        return $this->morphToMany('App\Models\EventModel', 'participantable', null, null, 'event_id')->withPivot('has_permission');
    }

    public function transactions() {
        return $this->morphMany('App\Models\TransactionModel', 'transactionable');
    }
}
