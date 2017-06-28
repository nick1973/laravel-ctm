<?php

/**
 * Frontend Controllers
 */
//Route::get('/', 'User\DashboardController@index')->name('frontend.index');
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('/map', 'FrontendController@map')->name('frontend.map');
Route::get('macros', 'FrontendController@macros')->name('frontend.macros');

Route::post('/email', 'FrontendController@e_mail');
Route::get('/users_sql', 'FrontendController@users_sql');

Route::get('/spec-staff/{staff}', function ($staff) {
    $spec = \App\Models\Ops\Specs::where('events_id',$staff)->first();
    //$collection = collect($spec->staff);
    return $spec;
});

Route::get('/phpinfo', function () {
    //return phpinfo();
});

Route::get('/events', function () {
    return ['data' => \App\Models\Ops\Events::all()];
});

Route::get('/doc', function () {
    //return ['data' => \App\Models\Ops\Events::all()];
    $file = Storage::disk('volume')->get('/NickAshford.1988-01-20/birth_cert/computer-people0.png');//get('file.jpg');
    $path = '/mnt/volume-1/About-had-its-chips.jpg';


    if (file_exists($path))
    {
        // Note: You should probably do some more checks
        // on the filetype, size, etc.
        $contents = file_get_contents($path);

        // Note: You should probably implement some kind
        // of check on filetype
        header('Content-type: image/jpeg');

        echo $contents;
    }





            //ob_clean();   // discard any data in the output buffer (if possible)
            //flush();      // flush headers (if possible)
//            $file = Storage::get('payroll/'.$file);
            //return (new \Illuminate\Http\Response($file, 200))
                //->header('Content-Type', 'application/octet-stream');
//$data = file_get_contents($path);
    //dd($file);
    //return base64_decode($file);

});

//Route::get('/amazon_docs', function () {
//    //dd(Storage::disk('s3')->exists('file.jpg'));
//
//    $client = new Aws\S3\S3Client([
//        'version'     => 'latest',
//        'region'      => 'eu-west-1',
//        'credentials' => [
//            'key'    => 'AKIAJ55IJY67EKI2TSJA',
//            'secret' => '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'
//        ]
//    ]);
//
//    // Where the files will be source from
//    $source = 's3://ctmuserfiles-production';
//// Where the files will be transferred to
//    $dest = 'public/path';
//    ini_set('max_execution_time', 3000);
//    $manager = new \Aws\S3\Transfer($client, $source, $dest);
//    $manager->transfer();
//
//});

Route::get('/staff', function () {
    $first_name=[];
    $last_name=[];
    $id=[];
    $staff = \App\Models\Access\User\User::all();
    foreach($staff as $row) {
        $id[] = $row->id;
        $first_name[] = $row->name;
        $last_name[] = $row->lastname;
    }
    $response = [
        'id'        => $id,
        'first_name' => $first_name,
        'last_name' => $last_name
    ];
    return json_encode($response);
});

Route::get('/staffname', function (){
    //$period = $_POST['events_id'];
//    $query = \Illuminate\Support\Facades\DB::table('users')->select('name')->get();
//    return json_encode($query);
    return \App\Models\Access\User\User::all();
});

Route::get('/event/{event}', function ($id) {

    $event = \App\Models\Ops\Events::find($id);
    $ctm_start_date = \Carbon\Carbon::parse($event->ctm_start_date);
    $ctm_start_date2 = \Carbon\Carbon::parse($event->ctm_start_date);
    $ctm_end_date = \Carbon\Carbon::parse($event->ctm_end_date);
    $diffInDays = $ctm_start_date->diffInDays($ctm_end_date);
    $day_number = $ctm_start_date->dayOfWeek;
    $day_numbers = $ctm_start_date->dayOfWeek;

    $specs = \App\Models\Ops\Specs::where('events_id', $id)->get();
    $grade = explode(',', $specs[0]->grade);

    //return $ctm_start_date->dayOfWeek;

    function dayOfWeek($day){
        switch ($day) {
            case 1:
                return "Monday";
                break;
            case 2:
                return "Tuesday";
                break;
            case 3:
                return "Wednesday";
                break;
            case 4:
                return "Thursday";
                break;
            case 5:
                return "Friday";
                break;
            case 6:
                return "Saturday";
                break;
            case 0:
                return "Sunday";
                break;
            default:
                return "Oops!";
        }
    }
    $qty = explode(',', $specs[0]->qty);
    $position = explode(',', $specs[0]->position);
    $total = explode(',', $specs[0]->total);
    $array = [];
    $day_array= [];
    $lower_day = strtolower(dayOfWeek($day_number));
    $start = $lower_day.'_start';
    $start_count = explode(',', $specs[0]->$start);
    $max_days = count($start_count);
    $day = -1;


    //dd (count(explode(',', $specs[0]->$start)) !==0 );


        for($i=0; $i <= $diffInDays; $i++) {
            if ($day_numbers == 7) {
                $day_numbers = 0;
            }
            //echo dayOfWeek($day_number) . $ctm_start_date->day;
            $date[] = dayOfWeek($day_numbers) . $ctm_start_date->day;

            $day_numbers++; $ctm_start_date->addDay();
        }
        //array_push($day_array,['date' => $date]);
        //return count($grade)-1;
        for($i=0; $i < count($grade); $i++) {

            //$array = array_add($json, 'sunday0_start', $sunday_start[$i]);
            $row_id = explode(',', $specs[0]->row_id)[$i];
            array_push($day_array,['date' => $date, 'row_id' => $row_id,
                'id' => $specs[0]->id, 'events_id' => $event->id, 'grade' => $grade[$i],
                'position' => $position[$i], 'qty' => $qty[$i], 'total' => $total[$i]]);

            //DAY NUMBER LOOP
            $week = 0;
            $day_number = $ctm_start_date2->dayOfWeek;

            for ($x = 0; $x <= $diffInDays; $x++) {
                if ($day_number == 7) {
                    $day_number = 0;
                }
                //EVERY WEEK +1
                if($x % 7 == 0){
                    $week++;
                    //$day++;
                }

                //CREATES THE WEEK
                $lower = strtolower(dayOfWeek($day_number));
                $start = $lower.'_start';
                $end = $lower.'_end';
                $sub_total = $lower.'_hours';

                // LOOP THROUGH THE MAX_DAYS IN THAT WEEK
                // PREVENT OFFSETS
                    //$day_array[$i] = explode(',', $specs[0]->row_id)[$i];

//                if(count(explode(',', $specs[0]->$start)) == $day_number ){
                    $day_array[$i]['week'.$week][$lower.$x.'_start'] = explode(',', $specs[0]->$start)[$week-1];
                //}
                //if(count(explode(',', $specs[0]->$end)) == $day_number ){
                    $day_array[$i]['week'.$week][$lower.$x.'_end'] = explode(',', $specs[0]->$end)[$week-1];
                //}
                //if(count(explode(',', $specs[0]->$sub_total)) == $day_number ){
                    //$day_array[$i]['week'.$week]['date'] = $date[$i];
                //}

                $day_number++;
            }
            //$day = $i;
        }
    return ['data'=>$day_array];
});


//Route::get('/event/{event}', function ($id) {
//
//    $specs = \App\Models\Ops\Specs::where('events_id', $id)->get();
//    $grade = explode(',', $specs[0]->grade);
//
//    //return count($grade);
//    if(count($grade) <= 1)
//    {
//        return $specs;
//    }
//
//    //$grade = explode(',', $specs[0]->grade);
//    $qty = explode(',', $specs[0]->qty);
//    $position = explode(',', $specs[0]->position);
//    $monday_start = explode(',', $specs[0]->monday_start);
//    $monday_end = explode(',', $specs[0]->monday_end);
//    $monday_hours = explode(',', $specs[0]->monday_hours);
//    $tuesday_start = explode(',', $specs[0]->tuesday_start);
//    $tuesday_end = explode(',', $specs[0]->tuesday_end);
//    $tuesday_hours = explode(',', $specs[0]->tuesday_hours);
//    $wednesday_start = explode(',', $specs[0]->wednesday_start);
//    $wednesday_end = explode(',', $specs[0]->wednesday_end);
//    $wednesday_hours = explode(',', $specs[0]->wednesday_hours);
//    $thursday_start = explode(',', $specs[0]->thursday_start);
//    $thursday_end = explode(',', $specs[0]->thursday_end);
//    $thursday_hours = explode(',', $specs[0]->thursday_hours);
//    $friday_start = explode(',', $specs[0]->friday_start);
//    $friday_end = explode(',', $specs[0]->friday_end);
//    $friday_hours = explode(',', $specs[0]->friday_hours);
//    $saturday_start = explode(',', $specs[0]->saturday_start);
//    $saturday_end = explode(',', $specs[0]->saturday_end);
//    $saturday_hours = explode(',', $specs[0]->saturday_hours);
//    $sunday_start = explode(',', $specs[0]->sunday_start);
//    $sunday_end= explode(',', $specs[0]->sunday_end);
//    $sunday_hours = explode(',', $specs[0]->sunday_hours);
//    $total = explode(',', $specs[0]->total);
//    $json = [];
//
//    for($i=0; $i <= count($grade)-1; $i++)
//    {
//        //DAY NUMBER LOOP
//
//        array_push($json, ['grade' => $grade[$i], 'position' => $position[$i], 'qty' => $qty[$i],
//            'monday_start' => $monday_start[$i], 'mon_end' => $monday_end[$i], 'mon_sub_total' => $monday_hours[$i],
//            'tues_start' => $tuesday_start[$i], 'tues_end' => $tuesday_end[$i], 'tues_sub_total' => $tuesday_hours[$i],
//            'wed_start' => $wednesday_start[$i], 'wed_end' => $wednesday_end[$i], 'wed_sub_total' => $wednesday_hours[$i],
//            'thur_start' => $thursday_start[$i], 'thur_end' => $thursday_end[$i], 'thur_sub_total' => $thursday_hours[$i],
//            'fri_start' => $friday_start[$i], 'fri_end' => $friday_end[$i], 'fri_sub_total' => $friday_hours[$i],
//            'sat_start' => $saturday_start[$i], 'sat_end' => $saturday_end[$i], 'sat_sub_total' => $saturday_hours[$i],
//            'sun_start' => $sunday_start[$i], 'sun_end' => $sunday_end[$i], 'sun_sub_total' => $sunday_hours[$i],
//            'total' => $total[$i]
//        ]);
//    }
//    return json_encode($json, true);
//
////            $event = App\Models\Ops\Events::find($id);
////    return $event->spec;
//});

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
            Route::patch('profile/update_bank/{update_bank}', 'ProfileController@update_bank')->name('frontend.user.profile.update_bank');

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
            Route::post('profile/update_license_photo/{id}', 'ProfileController@update_license_photo')->name('frontend.user.profile.update_license_photo');
            //Route::post('profile/get_postcode', 'ProfileController@get_postcode')->name('frontend.user.profile.get_postcode');

            Route::post('profile/get_postcode', 'ProfileController@get_postcode')->name('frontend.user.profile.get_postcode');
            Route::post('profile/get_postcode_ref', 'ProfileController@get_postcode_ref')->name('frontend.user.profile.get_postcode_ref');
            Route::post('profile/get_postcode_ref_char', 'ProfileController@get_postcode_ref_char')->name('frontend.user.profile.get_postcode_ref_char');

            Route::patch('profile/submit_events/{submit_events}', 'ProfileController@submit_events')->name('frontend.user.profile.submit_events');
            Route::patch('profile/submit_profile/{submit_profile}', 'ProfileController@submit_profile')->name('frontend.user.profile.submit_profile');

        });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Manager'], function () {
        Route::resource('dashboard/manager', 'ManagerController');

        Route::resource('dashboard/rtw', 'RTWController');
        Route::get('dashboard/rtw/search/rtw', function () {
            ini_set('memory_limit','2048M');
            $staff = \App\Models\Access\User\User::
            where([
                //['confirmed', '=', 1],
                ['visible', '=', 1],
                ['app_status', '=', 3],
                ['markAsp45', '=' ,0],
                ['payroll','!=','0'],
                //['uk_driving_license', '=', 'Yes'],
            ])->get();
            return ['data'=>$staff];
        });
        Route::resource('dashboard/exports', 'ExportController');

        Route::get('dashboard/export_download/payroll/{file}', function ($file) {

            $path = Storage::url('payroll/'.$file);
            $path = $path = base_path(). "/storage/app/docs/payroll/$file";
                ob_clean();   // discard any data in the output buffer (if possible)
                flush();      // flush headers (if possible)
            $text_file = Storage::get('payroll/'.$file);
            return (new \Illuminate\Http\Response($text_file, 200))
                ->header('Content-Type', 'application/octet-stream');
        });

        Route::resource('dashboard/events', 'EventsController');

        Route::resource('dashboard/staff-search', 'StaffSearchController');
        Route::any('dashboard/manager/staff-search/approved', 'StaffSearchController@staff_search')->name('dashboard.manager.staff-search.approved');
        Route::any('dashboard/manager/staff-search/non_approved', 'StaffSearchController@staff_search_non_approved')->name('dashboard.manager.staff-search.staff_search_non_approved');

        Route::resource('dashboard/staff-report', 'StaffReportController');
        Route::any('dashboard/manager/staff-report/approved', 'StaffReportController@staff_search')->name('dashboard.manager.staff-report.approved');
        Route::any('dashboard/manager/staff-report/non_approved', 'StaffReportController@staff_search_non_approved')->name('dashboard.manager.staff-report.staff_search_non_approved');

        Route::any('dashboard/manager/notes', 'ManagerController@update_notes')->name('dashboard.manager.notes');
        Route::any('dashboard/manager/medicalnotes', 'ManagerController@update_medicalnotes')->name('dashboard.manager.medicalnotes');
        Route::get('dashboard/manager/notes/{id}', function ($id) {
            $user = \App\Models\Access\User\User::find($id);
            return $user;
        });
        Route::get('dashboard/manager/staff/search', 'ManagerController@staff_search')->name('dashboard.manager.staff_search');
        Route::resource('dashboard/sbf', 'SBFController');

        Route::resource('dashboard/register/dropdowns', 'PromotionsDropdownsController');
        Route::resource('dashboard/register/reg-notes', 'RegistrationNotesController');

        Route::resource('dashboard/register/uni-dropdowns', 'UniDropdownsController');
        Route::resource('dashboard/register/hearaboutus-dropdowns', 'HearAboutUsDropdownsController');

        Route::get('dashboard/manager/reports/map', 'ManagerController@postcodes_search')->name('dashboard.manager.reports.map');

        Route::get('dashboard/map', function () {
            //return "foo";
            ini_set('memory_limit','2048M');
            $postcodes = DB::select('select postcode, sqrt(pow(abs(454599 - easting),2) + pow(abs(295170 - northing),2)) 
                as distance from open_postcode_geo where status = "live"
                and easting is not null 
                and northing is not null 
                and easting between 454599 - 80467 and 454599 + 80467 
                and northing between 295170 - 80467 and 295170 + 80467 
                and postcode != "LE9 1RR"
                order by distance limit 10');
            //return $postcodes;
            foreach ($postcodes as $postcode){
                echo $postcode->postcode . '<br>';
            }
        });

        Route::get('dashboard/manager/staff/search/id100', function () {
            $users = DB::table('users')->select('users.name', 'users.payroll', 'assigned_roles.role_id')
                ->join('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')->where('assigned_roles.role_id', 1)->get();
            $executive = DB::table('users')->select('users.name', 'users.payroll', 'assigned_roles.role_id')
                ->join('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')->where('assigned_roles.role_id', 2)->get();
            $count_executive_users = DB::table('users')->select('users.name', 'users.payroll', 'assigned_roles.role_id')
                ->join('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')->where('assigned_roles.role_id', 2)->count();
            $count_admin_users = DB::table('users')->select('users.name', 'assigned_roles.role_id')
                ->join('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')->where('assigned_roles.role_id', 1)->count();
            return ['ADMIN'=>$users,'Executive'=>$executive, 'ADMIN COUNT'=>$count_admin_users, 'EXECUTIVE COUNT'=>$count_executive_users];

//            $staff = \App\Models\Access\User\User::where([
//                ['profile_confirmed', '=', 'Yes'],
//                ['confirmed', '=', 1],            profile_confirmed
//                ['payroll_export', '=', 1],
//                ['payroll', '!=', 0]
//            ])->get();
            //$staff = \App\Models\Access\User\RTWork::where('user_id',34489)->get();

            //$staff = \App\Models\Access\User\User::where('app_status', '=', 3)->get();
            //foreach ($staff as $result){
                //$ref = \App\Models\Access\User\RTWork::where('user_id',$result->id)->get();
                //foreach ($ref as $rtw){
                    //echo $rtw['id'] . '</br>';
                    //$foo = \App\Models\Access\User\RTWork::find($rtw['id']);
                    //echo $result->payroll . ' ' . $result->title . ' ' . $result->name . ' ' . $result->lastname . ' ' . $result->gender . '</br>';
                    //$foo->update(['work_status'=>'0']);
                //}
            //}


        });

        Route::get('dashboard/manager/staff/search/medical', function () {
            //$user = DB::table('users')->where('payroll', 50659)->get();
            $user = \App\Models\Access\User\User::where('payroll', 39982)->get();
            return $user;
                return Crypt::decrypt($user->account_sort_code) . ' ' .Crypt::decrypt($user->account_number);
        });


        Route::get('dashboard/manager/staff/search/all', function () {
            //$staff= \App\Models\Access\User\User::where('visible', 1);
            ini_set('memory_limit','2048M');
            $columns =  DB::getSchemaBuilder()->getColumnListing('users');
            unset($columns['visible']);
            $columnsNeeded = array_except($columns, [1,2,3,4,5,6,7,14,15,18,23,25,26,28,30,32,33,40,41,42,43,44,45,46,48,49,50,51,52,53,54,55,56,57,58,59]);
            //dd($columnsNeeded);

            $staff = \App\Models\Access\User\User::
                where([
                ['confirmed', '=', 1],
                ['visible', '=', 1],
                //['app_status', '=', 3],
                ['markAsp45', '=' ,0],
                ['payroll','!=','0'],
                ['profile_confirmed', '=', 'yes'],
            ])->whereIn('app_status',[3,8])->get();

            return ['data'=>$staff];

        });

        Route::get('dashboard/manager/staff/export', 'ManagerController@staff_export')->name('dashboard.manager.staff_export');
        Route::post('dashboard/manager/text', 'ManagerController@text')->name('dashboard.manager.text');
        Route::post('dashboard/manager/postcode', 'ManagerController@postcode')->name('dashboard.manager.postcode');
        Route::post('dashboard/manager/postcode_with_event', 'ManagerController@postcode_with_event')->name('dashboard.manager.postcode_with_event');

        Route::resource('dashboard/not_submitted', 'NotSubmittedController');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Ops'], function () {
        Route::resource('dashboard/ops', 'OpsController');
        Route::resource('dashboard/specs', 'SpecsController');
        Route::post('dashboard/ops/tabs/save', 'OpsController@save_tabs')->name('dashboard.ops.tabs.save');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Drivers'], function () {

        Route::resource('dashboard/drivers', 'DriversController');
        Route::get('dashboard/drivers/staff/all', 'DriversController@staff_all')->name('dashboard.drivers.staff.all');

        Route::get('dashboard/search/drivers', function () {
            ini_set('memory_limit','2048M');
            $staff = \App\Models\Access\User\User::
            where([
                //['confirmed', '=', 1],
                ['visible', '=', 1],
                ['app_status', '=', 3],
                ['markAsp45', '=' ,0],
                ['payroll','!=','0'],
                ['uk_driving_license', '=', 'Yes'],
            ])->get();
            return ['data'=>$staff];
        });
        Route::get('dashboard/search/drivers/all', function () {
            ini_set('memory_limit','2048M');
            $staff = \App\Models\Access\User\User::
            where([
                //['confirmed', '=', 1],
                ['visible', '=', 1],
                ['app_status', '=', 3],
                ['markAsp45', '=' ,0],
                ['payroll','!=','0'],
                //['uk_driving_license', '=', 'Yes'],
            ])->get();
            return ['data'=>$staff];
        });
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