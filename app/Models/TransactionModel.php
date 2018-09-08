<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $guarded = array();

    public function transactionable()
    {
        return $this->morphTo();
    }

    public function event()
    {
        return $this->belongsTo('App\Models\EventModel', 'event_id');
    }
}
