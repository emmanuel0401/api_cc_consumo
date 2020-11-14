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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::apiresource('property_deed', 'PropertyDeedController');
Route::apiresource('escrituras', 'EscrituraController');
Route::apiresource('solicitudes', 'SolicitudController');
Route::apiresource('solicitantes', 'SolicitanteController');
Route::apiresource('pagos', 'PagoController');


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'LoginController@login');
    Route::post('signup', 'LoginController@signup');
  
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'LoginController@logout');
        Route::get('user', 'LoginController@user');
    });
});