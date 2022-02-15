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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['api']], function () {
    Route::get('/properties', "API\PropertyController@index");
    // Route::post('/properties', "API\PropertyController@index");
    // Route::get('/properties/{propertey_id}', "API\PropertyController@index");
    // Route::put('/properties/{propertey_id}', "API\PropertyController@index");

    // Route::any('/properties', "API\SampleController@getProperties");
});