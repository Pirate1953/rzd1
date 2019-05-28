<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcomepage');

// Объявляем маршруты для ресурсного контроллера ProductController,
// назначая слово products префиксом URI
Route::get('zones/sort', 'ZoneController@sort')
     ->name('zones.sort');
Route::resource('zones', 'ZoneController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('zones/{zone}/remove', 'ZoneController@remove')
     ->name('zones.remove');



Route::resource('types', 'TypeController');
Route::get('types/{type}/remove', 'TypeController@remove')
          ->name('types.remove');

//=================================СТАНЦИИ============================================
Route::get('stations/{station}/showforusers', 'StationController@showforusers')
      ->name('stations.showforusers');
Route::get('stations/{station}/showforanonym', 'StationController@showforanonym')
      ->name('stations.showforanonym');
Route::get('stations/indexforusers', 'StationController@indexforusers')
      ->name('stations.indexforusers');
Route::get('stations/{station}/remove', 'StationController@remove')
      ->name('stations.remove');

Route::get('stations/sort', 'StationController@sort')
          ->name('stations.sort');
Route::get('stations/sortforusers', 'StationController@sortforusers')
          ->name('stations.sortforusers');
Route::get('stations/sortforanonym', 'StationController@sortforanonym')
          ->name('stations.sortforanonym');
Route::get('stations/indexforanonym', 'StationController@indexforanonym')
          ->name('stations.indexforanonym');
Route::get('stations/aboutproject', 'StationController@aboutproject')
          ->name('stations.aboutproject');
Route::get('stations/mobileinfo', 'StationController@mobileinfo')
          ->name('stations.mobileinfo');
Route::get('stations/stages', 'StationController@stages')
          ->name('stations.stages');
Route::get('stations/{station}/addimage', 'StationController@addimage')
          ->name('stations.addimage');
Route::post('stations/storeimage', 'StationController@storeimage')
          ->name('stations.storeimage');
Route::resource('stations', 'StationController');

Route::resource('images', 'ImageController');

//=================================ПОЛЬЗОВАТЕЛИ============================================
Route::put('users/{user}/updateuser', 'StationController@updateuser')
          ->name('users.updateuser');
Route::get('users/editprofile', 'StationController@editprofile')
          ->name('users.editprofile');
Route::get('users/editprofileforadmin', 'StationController@editprofileforadmin')
          ->name('users.editprofileforadmin');
Route::get('users/editpass', 'StationController@editpass')
          ->name('users.editpass');
Route::get('users/editpassforadmin', 'StationController@editpassforadmin')
        ->name('users.editpassforadmin');
Route::put('users/updatepass', 'StationController@updatepass')
          ->name('users.updatepass');
Route::get('users/cancel', 'StationController@cancel')
          ->name('users.cancel');
Route::get('users/index', 'StationController@usersindex')
          ->name('users.usersindex');
Route::get('users/indexact', 'StationController@usersindexact')
          ->name('users.indexact');
Route::get('users/{user}/editrole', 'StationController@editrole')
          ->name('users.editrole');
Route::put('users/{user}/updaterole', 'StationController@updaterole')
          ->name('users.updaterole');
Route::delete('users/{user}/deleteuser', 'StationController@deleteuser')
          ->name('users.deleteuser');
Route::delete('users/{user}/deletecurrentuser', 'StationController@deletecurrentuser')
          ->name('users.deletecurrentuser');
Route::get('users/editstat', 'StationController@editstat')
          ->name('users.editstat');
Route::put('users/updatestat', 'StationController@updatestat')
          ->name('users.updatestat');
Route::resource('users', 'StationController');

//=================================КАРТОЧКИ============================================
Route::get('cards/createcard', 'StationController@createcard')
          ->name('cards.createcard');
Route::post('cards/storecard', 'StationController@storecard')
          ->name('cards.storecard');
Route::get('cards/indexcard', 'StationController@indexcard')
          ->name('cards.indexcard');
Route::get('cards/{card}/remove', 'StationController@removecard')
          ->name('cards.removecard');
Route::delete('cards/{card}/destroycard', 'StationController@destroycard')
          ->name('cards.destroycard');
Route::resource('cards', 'StationController');

//=================================ТОКЕНЫ============================================
Route::get('tokens/list', 'StationController@tokenlist')
          ->name('tokens.tokenlist');
Route::resource('tokens', 'StationController');

//=================================БИЛЕТЫ============================================
Route::get('tickets/{ticket}/remove', 'TicketController@remove')
     ->name('tickets.remove');
Route::get('tickets/sortforuserswithprice', 'TicketController@sortforuserswithprice')
    ->name('tickets.sortforuserswithprice');
Route::get('tickets/prepare', 'TicketController@prepare')
      ->name('tickets.prepare');
Route::get('tickets/createwithprice', 'TicketController@createwithprice')
      ->name('tickets.createwithprice');
Route::post('tickets/prepareview', 'TicketController@prepareview')
      ->name('tickets.prepareview');
Route::get('tickets/{ticket}/showfinal', 'TicketController@showfinal')
      ->name('tickets.showfinal');
Route::get('tickets/historyticketusers', 'TicketController@historyticketusers')
      ->name('tickets.historyticketusers');
Route::resource('tickets', 'TicketController');

//=================================РАСПИСАНИЕ============================================
Route::get('rasps/raspmain', 'StationController@raspmain')
      ->name('rasps.raspmain');
Route::get('rasps/raspget', 'StationController@raspget')
      ->name('rasps.raspget');

Route::get('rasps/raspmainuser', 'StationController@raspmainuser')
      ->name('rasps.raspmainuser');
Route::get('rasps/raspgetuser', 'StationController@raspgetuser')
      ->name('rasps.raspgetuser');
Route::resource('raps', 'StationController');

//=================================СТАТИСТИКА==========================================
Route::get('stats/statindex', 'StationController@statindex')
          ->name('stats.statindex');
Route::get('stats/depsort', 'StationController@depsort')
          ->name('stats.depsort');
Route::get('stats/arrsort', 'StationController@arrsort')
          ->name('stats.arrsort');
Route::resource('stats', 'StationController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redir', 'StationController@redir')->name('redir');
