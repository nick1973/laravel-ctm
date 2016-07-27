<?php

/**
 * Frontend Controllers
 */
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('macros', 'FrontendController@macros')->name('frontend.macros');

/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User'], function() {
//        Route::resource('dashboard/profile', 'ProfileController');
        Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
        Route::get('profile/edit/', 'ProfileController@edit')->name('frontend.user.profile.edit');
        Route::patch('profile/updates', 'ProfileController@updates')->name('frontend.user.profile.updates');
        Route::get('profile/edit_address', 'ProfileController@edit_address')->name('frontend.user.profile.edit_address');
        Route::patch('profile/update_address/{update_address}', 'ProfileController@update_address')->name('frontend.user.profile.update_address');
        Route::get('profile/edit_employer_reference', 'ProfileController@edit_employer_reference')->name('frontend.user.profile.edit_employer_reference');
        Route::patch('profile/update_employer_reference/{update_employer_reference}', 'ProfileController@update_employer_reference')->name('frontend.user.profile.update_employer_reference');
        Route::get('profile/edit_character_reference', 'ProfileController@edit_character_reference')->name('frontend.user.profile.edit_character_reference');
    });
});

/**
 * These frontend controllers require the user to be logged in as Managers
 */
//Route::group(['middleware' => 'managers'], function () {
//    Route::group(['namespace' => 'User'], function() {
//        Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
//        Route::get('profile/edit', 'ProfileController@edit')->name('frontend.user.profile.edit');
//        Route::patch('profile/update', 'ProfileController@update')->name('frontend.user.profile.update');
//    });
//});