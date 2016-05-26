<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/','PagesController@index');
Route::get('/home','PagesController@index');
Route::get('about','PagesController@about');
Route::get('contact','PagesController@contact');

Route::get('api/cities','PagesController@cities');
Route::get('api/inventories','PagesController@inventories');

/**
 * spoof route to add inventory
 */

Route::post('inventories', 'PagesController@storeInventory');

Route::resource('films','FilmsController',['parameters'=>['films'=>'film']]);
Route::resource('actors','ActorsController',['parameters'=>['actors'=>'actor']]);
Route::resource('customers','CustomersController',['parameters'=>['customers'=>'customer']]);
Route::resource('staffs','StaffsController',['parameters'=>['staffs'=>'staff']]);
// delete this route not used Route::resource('addresses','AddressesController',['parameters'=>['addresses'=>'address']]);
Route::resource('rentals','RentalsController',['parameters'=>['rentals'=>'rental'],'except' => ['create','destroy']]);

Route::get('rentals/{rental}/payment',['as'=>'rentals.payment','uses'=>'RentalsController@payment']);
Route::post('rentals/{rental}/payment',['as'=>'rentals.payUp','uses'=>'RentalsController@payUp']);


Route::auth();

