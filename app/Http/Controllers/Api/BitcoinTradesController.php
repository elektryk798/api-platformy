<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BitcoinTradesRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BitcoinTradesController extends Controller
{
    private BitcoinTradesRepository $bitcoinTrades;

    public function __construct(BitcoinTradesRepository $bitcoinTrades)
    {
        $this->bitcoinTrades = $bitcoinTrades;
    }

    public function allTrades()
    {
        $bitcoinTrades = $this->bitcoinTrades->getAll();

        return new JsonResponse(['AllTradesData' => $bitcoinTrades], 200);
    }

    public function getTradeById(Request $request)
    {
        $bitcoinTrade = $this->bitcoinTrades->getOneById($request->id);

        return new JsonResponse(['TradeData' => $bitcoinTrade], 200);
    }
}
