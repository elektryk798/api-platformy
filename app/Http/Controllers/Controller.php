<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *    title="Bitcoin Trades API",
 *    version="1.0.0",
 * ),
 * "securitySchemes": {
"bearer": {
"type": "http",
"scheme": "bearer"
}
 * @OA\SecurityScheme(
 *     type="http",
 *     name="bearerAuth",
 *     securityScheme="bearerAuth",
 *     scheme="bearer"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
