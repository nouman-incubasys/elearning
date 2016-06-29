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

Route::auth();


Route::get('/' , function(){
//    if(Auth::check()){
//        
//        if(Auth::user()->usergroups_id == 1 || Auth::user()->usergroups_id == 2){
//             return redirect('/admin');
//        }
        
        return view('user.index'); 
//    }
//    return view('user.index');    
});

Route::get('/admin/login','Auth\AuthController@getlogin');
Route::get('/admin', function(){
    if(Auth::check()){
        return view('home');
    }
    else{
        return  Redirect::to('/admin/login');
    }
});


//Mobile Api Routes
Route::post('api/users/register','UsersController@store');
Route::post('api/users/login','UsersController@login');

Route::group(['prefix' => 'api'], function () {
    Route::get('users/all','UsersController@show');    
    Route::get('books/all','BooksController@show');
    Route::get('banner/all','BannerController@show');
    Route::get('audio/all','AudiosController@show');
    Route::get('dailyprayer/all','DailyPrayerController@show');
    Route::get('dailyprayer/search','DailyPrayerController@DailyPrayerApi');
    Route::get('books/search','BooksController@bookSearch');
    Route::get('settings/store','SettingsController@storeSetting');
});


//------->> All Admin Routes

Route::group(['prefix' => 'admin', 'middleware'=> 'auth'], function () {
    
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
    Route::resource('/settings', 'SettingsController');

    //Audio -----

    Route::any('/audio/edit/{id}', 'AudiosController@updateAudio');
    Route::resource('/audio', 'AudiosController');
    Route::get('/delete_audio/{id}', 'AudiosController@deleteAudio');
    
    //Banner -----
    Route::any('/banner/edit/{id}', 'BannerController@updateBanner');
    Route::resource('/banner', 'BannerController');
    Route::get('/delete_banner/{id}', 'BannerController@deleteBanner');

});
//-------->>

//Route::get('read','HomeController@getBooks'); 
//Route::get('video','HomeController@getVideo'); 
//Route::get('radio','HomeController@getRadio'); 
//Route::get('live','HomeController@getBooks'); 
//Route::get('signup','HomeController@getSignup'); 
//Route::get('login','HomeController@getLogin'); 
//Route::get('devotion','HomeController@getDevotion'); 
//Route::get('donation','HomeController@getDonation');
//Route::get('livestream','HomeController@getLivestream');

Route::group(['middleware'=>'auth'], function () {
    
});


Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);


