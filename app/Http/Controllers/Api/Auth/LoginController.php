<?php

namespace App\Http\Controllers\Api\Auth;


use App\Events\ApiAccess;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;

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

    public function refreshToken()
    {
        $newToken = auth()->refresh();

        Event::dispatch(new ApiAccess(Route::currentRouteName(), Auth::user()));

        return response()->json(['token' => $newToken]);
    }
}
