<?php


Route::get('/' , function(){
        return view('user.index');    
});

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});


//----------Password Reset
Route::get('/password/reset','Auth\PasswordController@showResetForm');
Route::post('/password/email','Auth\PasswordController@sendResetLinkEmail');


//---------Admin Logout Logins
Route::get('/admin/login','Auth\AuthController@getlogin');
Route::post('/admin/login','Auth\AuthController@postlogin');
Route::get('/admin/logout','Auth\AuthController@logout');


//---------Front End & Mobile Api Routes
Route::post('api/users/register','UsersController@store');
Route::post('api/users/login','UsersController@login');

Route::group(['prefix' => 'api'], function () {
    Route::get('users/all','UsersController@show');    
    Route::get('books/all','BooksController@show');
    Route::get('banner/all','BannerController@show');
    Route::get('bible/chapters','BibleController@showChapters');
    Route::get('bible/books','BibleController@showBooks');
    Route::get('bible/verses','BibleController@showVerses');
    Route::get('bible/search','BibleController@searchBible');
    Route::get('audio/all','AudiosController@show');
    Route::get('audio/category','AudiosController@showbyCategory');
    Route::get('audio/category/list','AudioCategoryController@showCategorylist');
    Route::get('audio/category/id','AudiosController@showbyCategoryId');
    Route::get('dailyprayer/all','DailyPrayerController@show');
    Route::get('dailyprayer/search','DailyPrayerController@DailyPrayerApi');
    Route::get('books/search','BooksController@bookSearch');
    Route::post('comment/store','CommentsController@store');
    Route::get('settings/store','SettingsController@storeSetting');
});


//--------------- All Admin Routes ------->>

Route::group(['prefix' => 'admin', 'middleware'=> 'auth'], function () {
    
    Route::get('/',function(){
        return view('home');
    });
    //Book -----
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
    
    //Audio Category -----
    Route::get('/delete_category/{id}', 'AudioCategoryController@DeleteCategory');
    Route::any('/category/edit/{id}', 'AudioCategoryController@updateCategory');
    Route::resource('/category', 'AudioCategoryController');

});
//------------End Admin Routes---------->>


Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);


