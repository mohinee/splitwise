<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionMeta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'transaction_id', 'user_id', 'amount', 'split_type', 'split_factor', 'payer_id', 'isActive'
    ];
}
