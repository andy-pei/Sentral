<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganiserModel extends Model
{
    protected $table = 'organisers';
    protected $guarded = array();

    public function events()
    {
        return $this->belongsToMany('App\Models\EventModel', 'event_organiser', 'organiser_id', 'event_id');
    }
}
