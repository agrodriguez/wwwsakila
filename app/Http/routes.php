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

Route::get('api/cities','ApiController@cities');
Route::get('api/inventories','ApiController@inventories');

/** spoof route to add inventory */
Route::post('inventories', 'ApiController@storeInventory');

Route::resource('films','FilmsController',['parameters'=>['films'=>'film']]);
Route::resource('actors','ActorsController',['parameters'=>['actors'=>'actor'],'except' => ['create','destroy','update','edit']]);
Route::resource('customers','CustomersController',['parameters'=>['customers'=>'customer']]);
Route::resource('staffs','StaffsController',['parameters'=>['staffs'=>'staff']]);
Route::resource('rentals','RentalsController',['parameters'=>['rentals'=>'rental'],'except' => ['create','destroy','edit']]);
/** delete this route not used Route::resource('addresses','AddressesController',['parameters'=>['addresses'=>'address']]); */

/** * custom routes for rental payment */

Route::get('rentals/{rental}/payment',['as'=>'rentals.payment','uses'=>'RentalsController@payment']);
Route::post('rentals/{rental}/payment',['as'=>'rentals.payUp','uses'=>'RentalsController@payUp']);

/** * custom routes for login, not using register route Route::auth();*/

route::get('login','Auth\AuthController@showLoginForm');
route::post('login','Auth\AuthController@login');
route::get('logout','Auth\AuthController@logout');



