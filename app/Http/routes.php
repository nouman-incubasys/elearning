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

//Route::get('/', function () {
//    return 'aaaa';//view('welcome');
//});

Route::auth();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

Route::get('/AudioCheck/{id}', 'AudiosController@api_audio_check');

//Mobile Api Routes
Route::post('api/users/register','UsersController@store');
Route::post('api/users/login','UsersController@login');

Route::group(['prefix' => 'api', 'middleware'=>'api_validate'], function () {
    Route::get('users/all','UsersController@show');    
    Route::get('books/all','BooksController@show'); 
});














//Books -----

//Route::resource('/books',[
//    'middleware' => 'Authenticate',
//    'uses'=>'BooksController'
//]);

Route::resource('/books', 'BooksController');

Route::any('/updatebooks/{id}', 'BooksController@updateBook');

Route::get('/DeleteBook/{id}', 'BooksController@DeleteBook');


//Daily Devotion -----
Route::any('/dailyprayer/edit/{id}', 'DailyPrayerController@updatePrayer');

Route::resource('/dailyprayer', 'DailyPrayerController');

Route::get('/delete_prayer/{id}', 'DailyPrayerController@DeletePrayer');

//Settings -----

Route::get('/delete_settings/{id}', 'SettingsController@DeleteSetting');

Route::any('/settings/edit/{id}', 'SettingsController@updateSettings');

//Route::get('/dailyprayerapi/{id}', 'DailyPrayerController@DailyPrayerApi');

Route::resource('/settings', 'SettingsController');

//Audio -----

Route::any('/audio/edit/{id}', 'AudiosController@updateAudio');

Route::resource('/audio', 'AudiosController');

Route::get('/delete_audio/{id}', 'AudiosController@deleteAudio');

Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);


