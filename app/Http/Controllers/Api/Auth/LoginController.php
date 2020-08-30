<?php

namespace App\Http\Controllers\Api\Auth;


use App\Events\ApiAccess;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;

/**
 * @OA\Post(
 * path="/api/login",
 * summary="Sign in",
 * description="Login by email and password",
 * operationId="authLogin",
 * tags={"auth"},
 * security={},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"email","password"},
 *       @OA\Property(property="email", type="string", format="email", example="test@test.com"),
 *       @OA\Property(property="password", type="string", format="password", example="Password123$")
 *    ),
 * ),
 * @OA\Response(
 *     response=200,
 *     description="Success",
 *     @OA\JsonContent(
 *        @OA\Property(property="token", type="string", example="token")
 *     )
 *  ),
 * @OA\Response(
 *     response=422,
     *     description="Wrong email response",
 *     @OA\JsonContent(
 *        @OA\Property(property="message", type="string", example="The given data was invalid.")
 *     )
 *  ),
 * @OA\Response(
 *    response=401,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="error", type="string", example="Incorrect credentials")
 *        )
 *     )
 * )
 */
class LoginController extends Controller
{
    public function __construct()
    {
        auth()->setDefaultDriver('api');
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (!$token = Auth::attempt($credentials)) {
            return new JsonResponse(['error' => 'Incorrect credentials'], JsonResponse::HTTP_UNAUTHORIZED);
        }

        Auth::user()->loggedIn();

        return new JsonResponse(['token' => $token], JsonResponse::HTTP_OK);
    }

    /**
     * @OA\Get(
     * path="/api/refreshToken",
     * summary="Get new token",
     * description="Refresh token",
     * operationId="refreshToken",
     * tags={"refreshToken"},
     * security={ {"bearerAuth": {} }},
     * @OA\Response(
     * response=200,
     * description="Success",
     * @OA\JsonContent(
     * @OA\Property(property="token", type="string", example="token")
     * )
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

    public function refreshToken(): JsonResponse
    {
        $newToken = auth()->refresh();

        Auth::user()->refreshedToken();

        return new JsonResponse(['token' => $newToken], JsonResponse::HTTP_OK);
    }
}
