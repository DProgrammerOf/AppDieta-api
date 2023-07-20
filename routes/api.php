<?php

use App\Http\Endpoints\AlimentosEndpoint;
use App\Http\Endpoints\DiarioEndpoint;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/', function () {
    return 'ola';
});

Route::prefix('food')->group(function () {
    Route::get('/', [ AlimentosEndpoint::class, 'all' ]);
    Route::get('/{id}', [ AlimentosEndpoint::class, 'get' ]);
    Route::post('/save', [ AlimentosEndpoint::class, 'store' ]);
});

Route::prefix('diary')->group(function () {
    Route::get('/', [ DiarioEndpoint::class, 'all' ]);
    Route::get('/{id}', [ DiarioEndpoint::class, 'get' ]);
});