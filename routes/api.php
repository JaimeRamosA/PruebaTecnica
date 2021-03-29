<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\API',

], function ($router) {

    Route::get('listar-email', 'ConsultaAPIController@listar');
    Route::get('buscar', 'ConsultaAPIController@Buscar');
    
});


//Route::get('listar-email', [App\Http\Controllers\API\ConsultaAPIController::class, 'listar']);



