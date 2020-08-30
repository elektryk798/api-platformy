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

    /**
     * @OA\Get(
     * path="/api/getAllBitcoins",
     * summary="Get all bitcoin information",
     * description="Get information about all bitcoin trades",
     * operationId="getBitcoins",
     * tags={"getAll"},
     * security={ {"bearerAuth": {} }},
     * @OA\Response(
     * response=200,
     * description="Success",
     * @OA\JsonContent(
     * type="array",
     * @OA\Items(
     * ref="#/components/schemas/bitcoinTrades"
     * )
     * ),
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Unathorized user",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Unauthorized")
     *        )
     *     )
     * )
     */

    public function allTrades(): JsonResponse
    {
        $bitcoinTrades = $this->bitcoinTrades->getAll();

        return new JsonResponse($bitcoinTrades, JsonResponse::HTTP_OK);
    }

    /**
     * @OA\Get(
     * path="/api/getBitcoinById/{id}",
     * summary="Get specific trade information",
     * description="Get information one bitcoin trade",
     * operationId="getBitcoinById",
     * tags={"getById"},
     * security={ {"bearerAuth": {} }},
     * @OA\Parameter(
     *    description="ID of bitcoin trade",
     *    in="path",
     *    name="id",
     *    required=true,
     *    example="1",
     *    @OA\Schema(
     *       type="integer",
     *       format="int64"
     *    )
     * ),
     * @OA\Response(
     * response=200,
     * description="Success",
     * @OA\JsonContent(
     * ref="#/components/schemas/bitcoinTrades"
     * ),
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Unathorized user",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Unauthorized")
     *        )
     *     )
     * )
     */
    public function getTradeById(Request $request): JsonResponse
    {
        $bitcoinTrade = $this->bitcoinTrades->getOneById($request->id);

        return new JsonResponse($bitcoinTrade, JsonResponse::HTTP_OK);
    }
}
