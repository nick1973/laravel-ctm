<?php

/**
 * Frontend Controllers
 */
//Route::get('/', 'User\DashboardController@index')->name('frontend.index');
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('macros', 'FrontendController@macros')->name('frontend.macros');

Route::post('/email', 'FrontendController@e_mail');

/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {
        Route::group(['namespace' => 'User'], function () {
            Route::resource('dashboard/manager', 'ManagerController');

            Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
            Route::get('profile/edit/', 'ProfileController@edit')->name('frontend.user.profile.edit');
            Route::patch('profile/updates', 'ProfileController@updates')->name('frontend.user.profile.updates');

            Route::get('profile/edit_address', 'ProfileController@edit_address')->name('frontend.user.profile.edit_address');
            Route::patch('profile/update_address/{update_address}', 'ProfileController@update_address')->name('frontend.user.profile.update_address');

            Route::get('profile/edit_employer_reference', 'ProfileController@edit_employer_reference')->name('frontend.user.profile.edit_employer_reference');
            Route::patch('profile/update_employer_reference/{update_employer_reference}', 'ProfileController@update_employer_reference')->name('frontend.user.profile.update_employer_reference');
            Route::get('profile/edit_character_reference', 'ProfileController@edit_character_reference')->name('frontend.user.profile.edit_character_reference');

            Route::get('profile/edit_righttowork', 'ProfileController@edit_righttowork')->name('frontend.user.profile.edit_righttowork');
            Route::patch('profile/update_righttowork/{update_righttowork}', 'ProfileController@update_righttowork')->name('frontend.user.profile.update_righttowork');

            Route::get('profile/edit_money', 'ProfileController@edit_money')->name('frontend.user.profile.edit_money');
            Route::get('profile/edit_documents', 'ProfileController@edit_documents')->name('frontend.user.profile.edit_documents');
            Route::post('profile/update_passport_photo_page/{id}', 'ProfileController@update_passport_photo_page')->name('frontend.user.profile.update_passport_photo_page');
            Route::post('profile/update_passport_photo/{id}', 'ProfileController@update_passport_photo')->name('frontend.user.profile.update_passport_photo');
            Route::post('profile/update_birth_cert/{id}', 'ProfileController@update_birth_cert')->name('frontend.user.profile.update_birth_cert');
            Route::post('profile/update_ni_card/{id}', 'ProfileController@update_ni_card')->name('frontend.user.profile.update_ni_card');
            //Route::post('profile/get_postcode', 'ProfileController@get_postcode')->name('frontend.user.profile.get_postcode');

            Route::post('profile/get_postcode', 'ProfileController@get_postcode')->name('frontend.user.profile.get_postcode');

            Route::patch('profile/submit_profile/{submit_profile}', 'ProfileController@submit_profile')->name('frontend.user.profile.submit_profile');

        });
});


Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Manager'], function () {
        Route::resource('dashboard/manager', 'ManagerController');

    });
});


/**
 * These frontend controllers require the user to be logged in as Managers
 */
//Route::group(['middleware' => 'Executive'], function () {
//    Route::group(['namespace' => 'User'], function() {
//        Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
//    });
//});