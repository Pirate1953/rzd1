<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('stations/indexforusers', 'StationController@indexforusers')
     ->name('stations.indexforusers')->middleware('auth:api');

Route::get('stations/stationmobile', 'StationController@stationmobile')
    ->name('stations.stationmobile')->middleware('auth:api');

Route::get('stations/stationimagemobile', 'StationController@stationimagemobile')
    ->name('stations.stationimagemobile')->middleware('auth:api');

Route::get('tickets/historyticketusers', 'TicketController@historyticketusers')
      ->name('tickets.historyticketusers')->middleware('auth:api');

Route::post('tickets/prepareview', 'TicketController@prepareview')
      ->name('tickets.prepareview')->middleware('auth:api');

Route::post('tickets/store', 'TicketController@store')
      ->name('tickets.store')->middleware('auth:api');

Route::post('tickets/prepareviewmobile', 'TicketController@prepareviewmobile')
      ->name('tickets.prepareviewmobile')->middleware('auth:api');

Route::get('tickets/mobileticket', 'TicketController@mobileticket')
      ->name('tickets.mobileticket')->middleware('auth:api');

Route::get('tickets/mobileticketqrcode', 'TicketController@mobileticketqrcode')
      ->name('tickets.mobileticketqrcode')->middleware('auth:api');

Route::get('tickets/prepare', 'TicketController@prepare')
      ->name('tickets.prepare')->middleware('auth:api');

Route::get('tickets/indexcardmobile', 'TicketController@indexcardmobile')
      ->name('tickets.indexcardmobile')->middleware('auth:api');

Route::get('tickets/showfinal', 'TicketController@showfinal')
      ->name('tickets.showfinal')->middleware('auth:api');
