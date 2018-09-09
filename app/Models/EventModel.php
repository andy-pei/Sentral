<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $guarded = array();

    public function eventType() {
        return $this->belongsTo('App\Models\EventTypeModel', 'event_type_id');
    }

    public function organisers()
    {
        return $this->belongsToMany('App\Models\OrganiserModel', 'event_organiser', 'event_id', 'organiser_id');
    }

    public function students()
    {
        return $this->morphedByMany('App\Models\StudentModel', 'participantable', null, 'event_id')->withPivot('has_permission');
    }

    public function staffs()
    {
        return $this->morphedByMany('App\Models\StaffModel', 'participantable', null, 'event_id')->withPivot('has_permission');
    }

    public function volunteers()
    {
        return $this->morphedByMany('App\Models\VolunteerModel', 'participantable', null, 'event_id')->withPivot('has_permission');
    }

    public function parents()
    {
        return $this->morphedByMany('App\Models\ParentModel', 'participantable', null, 'event_id')->withPivot('has_permission');
    }
}
