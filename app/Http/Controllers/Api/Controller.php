<?php

namespace App\Http\Controllers\Api;

use App\Events\ApiAccess;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        auth()->setDefaultDriver('api');

        if ($user = Auth::user()) {
            Event::dispatch(new ApiAccess(Route::currentRouteName(), $user));
        }
    }
}
