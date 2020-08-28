<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 * schema="bitcoinTrades",
 * @OA\Property( property="id", type="integer", example="1"),
 * @OA\Property( property="date", type="string", example="1396096603"),
 * @OA\Property( property="price", type="string", example="4400.50"),
 * @OA\Property( property="type", type="string", example="buy"),
 * @OA\Property( property="amount", type="string", example="0.01136400"),
 * @OA\Property( property="tid", type="string", example="2"),
 * @OA\Property( property="created_at", type="datetime", example="2020-01-27 07:52:56" ),
 * @OA\Property( property="updated_at", type="datetime", example="2020-01-27 07:52:56" )
 * )
 */

class BitcoinTrade extends Model
{
    protected $table = 'bitcoin_trades';

    protected $fillable = [
        'date', 'price', 'type', 'amount', 'tid'
    ];
}
