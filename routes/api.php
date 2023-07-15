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

Route::get('/alimentos', [ AlimentosEndpoint::class, 'all' ]);
Route::get('/alimentos/{id}', [ AlimentosEndpoint::class, 'get' ]);

Route::get('/diarios', [ DiarioEndpoint::class, 'all' ]);
Route::get('/diarios/{id}', [ DiarioEndpoint::class, 'get' ]);