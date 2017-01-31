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
    $ctm_start_date = \Carbon\Carbon::createFromFormat('Y/m/d', $event->ctm_start_date);
    $ctm_start_date = \Carbon\Carbon::parse($ctm_start_date);
    $ctm_end_date = \Carbon\Carbon::createFromFormat('Y/m/d', $event->ctm_end_date);
    $ctm_end_date = \Carbon\Carbon::parse($ctm_end_date);
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
            array_push($day_array,['date' => $date, 'row_id' => $row_id, 'id' => $specs[0]->id, 'events_id' => $event->id, 'grade' => $grade[$i], 'position' => $position[$i], 'qty' => $qty[$i], 'total' => $total[$i]]);

            //DAY NUMBER LOOP
            $week = 0;
            $day_number = $ctm_start_date->dayOfWeek;
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
                    $day_array[$i]['week'.$week][$lower.$x.'_start'] = explode(',', $specs[0]->$start)[$i];
                //}
                //if(count(explode(',', $specs[0]->$end)) == $day_number ){
                    $day_array[$i]['week'.$week][$lower.$x.'_end'] = explode(',', $specs[0]->$end)[$i];
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

        Route::get('dashboard/manager/staff/search', 'ManagerController@staff_search')->name('dashboard.manager.staff_search');
        Route::resource('dashboard/sbf', 'SBFController');

        Route::resource('dashboard/register/dropdowns', 'PromotionsDropdownsController');
        Route::resource('dashboard/register/reg-notes', 'RegistrationNotesController');

        Route::resource('dashboard/register/uni-dropdowns', 'UniDropdownsController');
        Route::resource('dashboard/register/hearaboutus-dropdowns', 'HearAboutUsDropdownsController');


        Route::get('dashboard/manager/staff/search/allp45', function () {
            //$staff= \App\Models\Access\User\User::where('visible', 1);
            ini_set('memory_limit','2048M');
            $columns =  DB::getSchemaBuilder()->getColumnListing('users');
            unset($columns['visible']);
            $columnsNeeded = array_except($columns, [1,2,3,4,5,6,7,14,15,18,23,25,26,28,30,32,33,40,41,42,43,44,45,46,48,49,50,51,52,53,54,55,56,57,58,59]);
            //dd($columnsNeeded);

            $payroll = [
                34271,35037,35594,36353,36408,36492,36528,36570,36627,36684,36699,36702,36707,36714,36743,36744,36791,36828,36847,36892,36904,37112,37121,37143,37147,37162,37239,37272,37326,37402,37468,37584,37653,37940,37952,37969,38008,38220,38281,38298,38321,38396,38432,38495,38519,38539,38540,38547,38567,38605,38694,38732,38741,38744,38849,38873,38879,38925,38976,38993,39016,39052,39065,39085,39094,39139,39176,39177,39187,39193,39200,39228,39250,39276,39334,39383,39387,39393,39470,39474,39500,39520,39545,39548,39573,39576,39599,39611,39627,39664,39671,39700,39702,39710,39716,39724,39736,39741,39744,39751,39752,39755,39756,39758,39765,39769,39774,39790,39799,39844,39870,39872,39876,39887,39892,39893,39896,39899,39944,39966,39973,39981,39999,40011,40026,40028,40037,40054,40055,40058,40063,40090,40091,40106,40109,40114,40118,40121,40127,40140,40152,40161,40162,40169,40203,40205,40208,40215,40229,40241,40274,40278,40284,40293,40296,40299,40328,40341,40351,40383,40384,40392,40397,40399,40403,40412,40442,40451,40454,40468,40474,40485,40495,40497,40506,40508,40514,40515,40546,40563,40567,40579,40581,40582,40583,40601,40614,40618,40622,40643,40647,40648,40650,40656,40663,40666,40670,40672,40678,40682,50000,50003,50004,50010,50015,50018,50020,50021,50028,50031,50033,50035,50040,50041,50047,50048,50061,50068,50073,50074,50075,50079,50082,50092,50095,50096,50098,50099,50101,50102,50105,50106,50109,50113,50117,50118,50119,50122,50123,50124,50126,50127,50128,50129,50130,50131,50132,50134,50135,50136,50137,50140,50144,50146,50148,50151,50154,50155,50157,50159,50163,50164,50165,50166,50169,50170,50171,50172,50174,50176,50177,50178,50179,50183,50184,50185,50188,50191,50192,50193,50195,50196,50198,50199,50201,50202,50203,50204,50205,50206,50211,50213,50214,50218,50221,50222,50225,50226,50230,50232,50234,50236,50240,50241,50242,50244,50245,50246,50249,50252,50254,50256,50257,50259,50263,50264,50265,50266,50268,50269,50280,50282,50283,50284,50285,50288,50289,50290,50291,50293,50294,50296,50297,50298,50301,50303,50305,50306,50307,50308,50309,50312,50313,50315,50316,50319,50320,50322,50323,50325,50331,50333,50339,50345,50347,50348,50349,50350,50351,50352,50353,50357,50359,50360,50364,50368,50371,50373,50374,50376,50378,50379,50381,50383,50385,50386,50388,50390,50391,50395,50399,50400,50401,50402,50403,50407,50408,50412,50416,50417,50418,50420,50421,50428,50429,50430,50431,50434,50435,50436,50443,50449,50452,50453,50454,50456,50457,50460,50461,50463,50467,50469,50471,50472,50475,50482,50484,50486,50490,50492,50493,50495,50497,50501,50502,50505,50508,50509,50510,50512,50513,50514,50515,50516,50519,50521,50522,50527,50528,50530,50532,50534,50535,50540,50545,50546,50552,50554,50555,50556,50558,50559,50563,50564,50570,50572,50576,50579,50580,50581,50585,50586,50587,50590,50592,50594,50595,50598,50599,50600,50602,50604,50606,50607,50608,50609,50614,50615,50618,50620,50626,50627,50629,50635,50636,50637,50638,50640,50641,50642,50646,50648,50649,50650,50651,50656,50657,50658,50661,50663,50668,50669,50670,50671,50672,50673,50675,50679,50681,50683,50685,50686,50687,50688,50689,50692,50693,50695,50698,50699,50700,50703,50707,50708,50709,50714,50716,50720,50721,50722,50723,50725,50728,50731,50734,50737,50738,50742,50748,50749,50750,50751,50752,50753,50760,50764,50771,50772,50778,50779,50781,50783,50784,50787,50789,50790,50808,50810,50811,50813,50814,50818,50819,50822,50824,50828,50831,50835,50840,50843,50848,50849,50852,50853,50855,50856,50858,50859,50861,50862,50864,50865,50866,50867,50868,50870,50872,50876,50878,50879,50884,50885,50887,50890,50893,50895,50896,50899,50900,50902,50903,50904,50905,50907,50908,50909,50911,50913,50916,50917,50919,50921,50922,50925,50926,50933,50935,50938,50939,50940,50941,50944,50945,50946,50948,50951,50959,50960,50962,50963,50967,50969,50970,50975,50978,50979,50980,50981,50982,50986,50989,50990,50991,50996,50997,51002,51004,51005,51007,51008,51009,51010,51011,51014,51015,51016,51017,51019,51020,51021,51024,51035,51037,51038,51040,51043,51046,51048,51049,51061,51065,51066,51069,51070,51071,51072,51073,51075,51076,51078,51079,51080,51083,51084,51087,51088,51094,51095,51098,51101,51104,51105,51108,51113,51115,51116,51120,51128,51129,51130,51132,51133,51134,51138,51140,51141,51142,51149,51151,51152,51155,51156,51157,51161,51165,51166,51168,51169,51173,51174,51178,51180,51181,51182,51183,51184,51186,51188,51189,51190,51191,51192,51194,51200,51202,51209,51210,51212,51214,51215,51219,51221,51222,51223,51227,51228,51229,51230,51231,51232,51233,51235,51239,51240,51241,51242,51243,51244,51246,51247,51249,51250,51251,51255,51256,51257,51258,51259,51260,51262,51263,51265,51266,51267,51268,51269,51270,51271,51273,51274,51275,51276,51277,51278,51279,51280,51281,51282,51283,51284,51285,51286,51287,51288,51289,51290,51291,51292,51293,51294,51295,51296,51297,51298,51299,51300,51301,51302,51305,51306,51307,51308,51309
            ];
            foreach ($payroll as $result){
                $staff[] = \App\Models\Access\User\User::
                where('payroll', $result)->select('markAsp45')->get();
            }

            dd($staff);
            return ['data'=>$staff];

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
                ['app_status', '=', 3],
                ['markAsp45', '=' ,0],
                ['payroll','!=','0'],
                ['profile_confirmed', '=', 'yes'],
            ])->get();

            return ['data'=>$staff];

        });

        Route::get('dashboard/manager/staff/export', 'ManagerController@staff_export')->name('dashboard.manager.staff_export');
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