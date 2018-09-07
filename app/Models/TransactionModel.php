<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $guarded = array();

    public function transactionType()
    {
        return $this->belongsTo('App\Models\TransactionTypeModel', 'transaction_type_id');
    }

    public function transactionable()
    {
        return $this->morphTo();
    }
}
