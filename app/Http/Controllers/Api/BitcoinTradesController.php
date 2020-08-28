<?php

namespace App\Http\Controllers\Api;

use App\Repositories\BitcoinTradesRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BitcoinTradesController extends Controller
{
    private BitcoinTradesRepository $bitcoinTrades;

    public function __construct(BitcoinTradesRepository $bitcoinTrades)
    {
        parent::__construct();

        $this->bitcoinTrades = $bitcoinTrades;
    }

    public function allTrades(): JsonResponse
    {
        $bitcoinTrades = $this->bitcoinTrades->getAll();

        return new JsonResponse($bitcoinTrades, JsonResponse::HTTP_OK);
    }

    public function getTradeById(Request $request): JsonResponse
    {
        $bitcoinTrade = $this->bitcoinTrades->getOneById($request->id);

        return new JsonResponse($bitcoinTrade, JsonResponse::HTTP_OK);
    }
}
