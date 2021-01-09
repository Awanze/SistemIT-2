<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::get('/', function () {
    return view('auth/login');
});
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('view-data', 'AuthorizationController@viewData');
Route::get('create-data', 'AuthorizationController@createData');
Route::get('register', function () {
    return view('register');
});

Route::get('access', function () {
    return view('master/access');
});

// Ini route pada form client

Route::group(['middleware' => ['web']], function() {
  Route::resource('client','ClientController');
  Route::post ( '/editItem', 'ClientController@editItem' );
});

Route::post('/client/store', 'ClientController@store')->name('client.store');

Route::get('/client/edit/{id_client}','ClientController@edit')->name('client.edit');

Route::delete('/client/destroy/{id_client}', 'ClientController@destroy')->name('client.destroy');

// Ini route pada form itsupport

Route::group(['middleware' => ['web']], function() {
    Route::resource('its','ITSController');
    Route::post ( '/editItem', 'ITSController@editItem' );
  });
  Route::post('/its/store', 'ITSController@store')->name('its.store');

Route::post('/its/update', 'ITSController@update')->name('its.update');

Route::delete('/its/destroy/{id_its}', 'ITSController@destroy')->name('its.destroy');

// Ini route pada form programmer

Route::group(['middleware' => ['web']], function() {
    Route::resource('pro','PROController');
    Route::post ( '/editItem', 'PROController@editItem' );
  });

Route::post('/pro/store', 'PROController@store')->name('pro.store');

Route::post('/pro/update', 'PROController@update')->name('pro.update');

Route::delete('/pro/destroy/{id_pro}', 'PROController@destroy')->name('pro.destroy');

// Ini route pada form progress
Route::post('/progress/store', 'ProgressController@store')->name('progress.store');


Route::group(['middleware' => ['web']], function() {
    Route::resource('/progress','ProgressController');
    Route::post ( '/editItem', 'ProgressController@editItem' );
  });

Route::post('/progress/update', 'ProgressController@update')->name('progress.update');

Route::delete('/progress/destroy/{id_progress}', 'ProgressController@destroy')->name('progress.destroy');


// Ini route pada form staff
Route::group(['middleware' => ['web']], function() {
    Route::resource('staff','UserController');
    Route::post ( '/editItem', 'UserController@editItem' );
  });

Route::post('/staff/store', 'UserController@store')->name('user.store');

Route::post('/staff/update', 'UserController@update')->name('user.update');

Route::delete('/staff/destroy/{id}', 'UserController@destroy')->name('user.destroy');



// Ini route pada form status

Route::group(['middleware' => ['web']], function() {
    Route::resource('status','StatusController');
    Route::post ( '/editItem', 'StatusController@editItem' );
  });

Route::post('/status/store', 'StatusController@store')->name('status.store');

Route::post('/status/update', 'StatusController@update')->name('status.update');

Route::delete('/status/destroy/{id_status}', 'StatusController@destroy')->name('status.destroy');

// Ini route pada form hardware
Route::get('/hardware', 'HardwareController@index')->name('hardware.index');

Route::get('/hardware/create', 'HardwareController@create')->name('hardware.create');

Route::post('/hardware/store', 'HardwareController@store')->name ('hardware.store');

Route::get('/hardware/view/{id_hard}','HardwareController@view')->name('hardware.view');

// Route::get('/hardware/print/{id_hard}','HardwareController@print')->name('hardware.print');

Route::get('/hardware/edit/{id_hard}','HardwareController@edit')->name('hardware.edit');

Route::post('/hardware/update', 'HardwareController@update')->name('hardware.update');

Route::delete('/hardware/destroy/{id_hard}', 'HardwareController@destroy')->name('hardware.destroy');

// Ini route pada form selesai dan urgent hardware

Route::get('/hardware/print/{id_hard}', 'HardwareController@print')->name('hardware.print');

Route::get('/report/printselesai_hard', 'HardwareController@print2')->name('hardware.print2');

Route::get('/report/printurgent_hard', 'HardwareController@print3')->name('hardware.print3');

// Ini route pada form selesai dan urgent hardware
Route::get('/detail_data/detail_hard', 'HardwareController@index2')->name('hardware.index2');

Route::get('/detail_data/urgent_hard', 'HardwareController@index3')->name('hardware.index3');



// Ini route pada form network
Route::get('/network', 'NetworkController@index')->name('network.index');

Route::get('/network/create', 'NetworkController@create')->name('network.create');

Route::post('/network/store', 'NetworkController@store')->name('network.store');

Route::get('/network/view/{id_net}','NetworkController@view')->name('network.view');

Route::get('/network/edit/{id_net}','NetworkController@edit')->name('network.edit');

Route::post('/network/update', 'NetworkController@update')->name('network.update');

Route::delete('/network/destroy/{id_net}', 'NetworkController@destroy')->name('network.destroy');

// Ini route pada form print network
Route::get('/network/print/{id_net}', 'NetworkController@print')->name('network.print');

Route::get('/report/printselesai_network', 'NetworkController@print2')->name('network.print2');

Route::get('/report/printurgent_network', 'NetworkController@print3')->name('network.print3');

// Ini route pada form selesai dan urgent network
Route::get('/detail_data/detail_network', 'NetworkController@index2')->name('network.index2');

Route::get('/detail_data/urgent_network', 'NetworkController@index3')->name('network.index3');


// Ini route pada form newsofts
Route::get('/newsoft', 'NewsoftController@index')->name('newsoft.index');

Route::get('/newsoft/create', 'NewsoftController@create')->name('newsoft.create');

Route::post('/newsoft/store', 'NewsoftController@store')->name('newsoft.store');

Route::get('/newsoft/view/{id_nsoft}','NewsoftController@view')->name('newsoft.view');

Route::get('/newsoft/edit/{id_nsoft}','NewsoftController@edit')->name('newsoft.edit');

Route::post('/newsoft/update', 'NewsoftController@update')->name('newsoft.update');

Route::delete('/newsoft/destroy/{id_nsoft}', 'NewsoftController@destroy')->name('newsoft.destroy');

// Ini route pada form print newsoft
Route::get('/newsoft/print/{id_nsoft}', 'NewsoftController@print')->name('newsoft.print');

Route::get('/report/printselesai_newsoft', 'NewsoftController@print2')->name('newsoft.print2');

Route::get('/report/printurgent_newsoft', 'NewsoftController@print3')->name('newsoft.print3');


// Ini route pada form selesai dan urgent newsoft
Route::get('/detail_data/detail_newsofts', 'NewsoftController@index2')->name('newsoft.index2');

Route::get('/detail_data/urgent_newsofts', 'NewsoftController@index3')->name('newsoft.index3');

// Ini route pada form softclient
Route::get('/softclient', 'SoftclientController@index')->name('softclient.index');

Route::get('/softclient/create', 'SoftclientController@create')->name('softclient.create');

Route::post('/softclient/store', 'SoftclientController@store')->name('softclient.store');

Route::get('/softclient/view/{id_sclient}','SoftclientController@view')->name('softclient.view');

Route::get('/softclient/edit/{id_sclient}','SoftclientController@edit')->name('softclient.edit');

Route::post('/softclient/update', 'SoftclientController@update')->name('softclient.update');

Route::delete('/softclient/destroy/{id_sclient}', 'SoftclientController@destroy')->name('softclient.destroy');

// Ini route pada form print softclient
Route::get('/softclient/print/{id_sclient}', 'SoftclientController@print')->name('softclient.print');

Route::get('/report/printselesai_softclient', 'SoftclientController@print2')->name('softclient.print2');

Route::get('/report/printurgent_softclient', 'SoftclientController@print3')->name('softclient.print3');

// Ini route pada form selesai dan urgent softclient
Route::get('/detail_data/detail_softclients', 'SoftclientController@index2')->name('softclient.index2');

Route::get('/detail_data/urgent_softclient', 'SoftclientController@index3')->name('softclient.index3');

// Ini route pada form katalog
Route::get('katalog', function () {
return view('pengelola/katalog');
});

Route::get('/katalog', 'KatalogController@index')->name('katalog.index');

Route::post('/katalog/store', 'KatalogController@store')->name('katalog.store');

Route::delete('/katalog/destroy/{id}', 'KatalogController@destroy')->name('katalog.destroy');


// Ini route pada form about
Route::get('about', function () {
    return view('utilities/about');
});

// Ini route pada form contact
Route::get('contact', function () {
    return view('/contact');
});

//fullcalender
Route::get('/event', 'EventController@index');
Route::get('/event/{date}', 'EventController@create')->name('event.create');
Route::post('/event/{id}', 'EventController@update')->name('update');

Route::resource('/event', 'EventController');

// Route::group(['prefix' => 'invoice'], function() {
//   //[.. CODE SEBELUMNYA ..]
//   Route::get('/{id}/print', 'InvoiceController@generateInvoice')->name('invoice.print');
// });