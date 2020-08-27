<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitcoinTrade extends Model
{
    protected $table = 'bitcoin_trades';

    protected $fillable = [
        'date', 'price', 'type', 'amount', 'tid'
    ];
}
