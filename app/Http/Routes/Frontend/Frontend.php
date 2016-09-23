<?php

/**
 * Frontend Controllers
 */
//Route::get('/', 'User\DashboardController@index')->name('frontend.index');
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('macros', 'FrontendController@macros')->name('frontend.macros');

Route::post('/email', 'FrontendController@e_mail');

Route::get('/events', function () {
    return ['data' => \App\Models\Ops\Events::all()];
});

Route::post('/specs', function (){
    //$period = $_POST['events_id'];

});

Route::get('/event/{event}', function ($id) {

    $specs = \App\Models\Ops\Specs::where('events_id', $id)->get();
    $grade = explode(',', $specs[0]->grade);

    //return count($grade);
    if(count($grade) <= 1)
    {
        return $specs;
    }

    //$grade = explode(',', $specs[0]->grade);
    $qty = explode(',', $specs[0]->qty);
    $position = explode(',', $specs[0]->position);
    $monday_start = explode(',', $specs[0]->monday_start);
    $monday_end = explode(',', $specs[0]->monday_end);
    $monday_hours = explode(',', $specs[0]->monday_hours);
    $tuesday_start = explode(',', $specs[0]->tuesday_start);
    $tuesday_end = explode(',', $specs[0]->tuesday_end);
    $tuesday_hours = explode(',', $specs[0]->tuesday_hours);
    $wednesday_start = explode(',', $specs[0]->wednesday_start);
    $wednesday_end = explode(',', $specs[0]->wednesday_end);
    $wednesday_hours = explode(',', $specs[0]->wednesday_hours);
    $thursday_start = explode(',', $specs[0]->thursday_start);
    $thursday_end = explode(',', $specs[0]->thursday_end);
    $thursday_hours = explode(',', $specs[0]->thursday_hours);
    $friday_start = explode(',', $specs[0]->friday_start);
    $friday_end = explode(',', $specs[0]->friday_end);
    $friday_hours = explode(',', $specs[0]->friday_hours);
    $saturday_start = explode(',', $specs[0]->saturday_start);
    $saturday_end = explode(',', $specs[0]->saturday_end);
    $saturday_hours = explode(',', $specs[0]->saturday_hours);
    $sunday_start = explode(',', $specs[0]->sunday_start);
    $sunday_end= explode(',', $specs[0]->sunday_end);
    $sunday_hours = explode(',', $specs[0]->sunday_hours);
    $total = explode(',', $specs[0]->total);
    $json = [];

    for($i=0; $i <= count($grade)-1; $i++)
    {
        array_push($json, ['grade' => $grade[$i], 'position' => $position[$i], 'qty' => $qty[$i],
            'mon_start' => $monday_start[$i], 'mon_end' => $monday_end[$i], 'mon_sub_total' => $monday_hours[$i],
            'tues_start' => $tuesday_start[$i], 'tues_end' => $tuesday_end[$i], 'tues_sub_total' => $tuesday_hours[$i],
            'wed_start' => $wednesday_start[$i], 'wed_end' => $wednesday_end[$i], 'wed_sub_total' => $wednesday_hours[$i],
            'thur_start' => $thursday_start[$i], 'thur_end' => $thursday_end[$i], 'thur_sub_total' => $thursday_hours[$i],
            'fri_start' => $friday_start[$i], 'fri_end' => $friday_end[$i], 'fri_sub_total' => $friday_hours[$i],
            'sat_start' => $saturday_start[$i], 'sat_end' => $saturday_end[$i], 'sat_sub_total' => $saturday_hours[$i],
            'sun_start' => $sunday_start[$i], 'sun_end' => $sunday_end[$i], 'sun_sub_total' => $sunday_hours[$i],
            'total' => $total[$i]
        ]);
    }
    return json_encode($json, true);

//            $event = App\Models\Ops\Events::find($id);
//    return $event->spec;
});

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

Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Ops'], function () {
        Route::resource('dashboard/ops', 'OpsController');
        Route::resource('dashboard/specs', 'SpecsController');

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