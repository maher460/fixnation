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




Route::get('/', 'WelcomeController@index');
Route::post('/profile/save', 'UserController@profileSave');
Route::post('/registration/save', 'UserController@createUser');
Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');
Route::post('/map/filter', 'MapController@filterMap');
Route::get('/map', 'MapController@filterMap');

Route::get('/jobs', 'UserController@showJobs');
Route::post('/jobs/create', 'UserController@createJob');

Route::get('/registration', 'UserController@showRegistration');
Route::get('/profile', 'UserController@showProfile');

Route::get('/jobs/accept/{id}', 'UserController@acceptJob');
Route::get('/jobs/decline/{id}', 'UserController@declineJob');
Route::post('/jobs/complete', 'UserController@completeJob');

Route::get('/login','UserController@loginView');


Route::post('/registrationKarl/save', 'TestController@createUser');
Route::post('/feedback/save', 'UserController@giveFeedback');

Route::get('/about', function () {
    return view('about');
});

Route::get('/dev', function () {
    return view('dev');
});

Route::get('/feedback', function () {
    return view('feedback');
});



Route::get('/maherdev','MapController@filterMaherMap' );
Route::get('/tomasdev','MapController@filterTomasMap' );
Route::get('/karldev','MapController@filterKarlMap' );















