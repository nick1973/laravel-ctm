<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Access\User\User;
use App\Models\Dropdowns\EventsList;
use App\Models\Dropdowns\Tag;
use App\Models\Dropdowns\Unis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class StaffSearchController extends Controller
{
    function index(){
        $events = Tag::all();
        return view('frontend.manager.staff_search.index', compact('events'));
    }

        function staff_search(Request $request)
        {
            //ini_set('memory_limit', '2048M');
            //return $request->all();
            $app_status = 3;
            $pc = $request->input('postcode');
            $staff_event = $request->input('staff_event');
            $event_name = $request->input('event_name');
            $pc = trim($pc);
            $radius = $request->input('radius');// in miles
            $nrswa = $request->input('nrswa');// in miles
            $uk_driving_license = $request->input('uk_driving_license');// in miles   driver_paper_work
            $meters = $radius / .00062137;
            //$events = [];
            if($pc==''){
                if ($nrswa == "Yes" && $uk_driving_license == "No") {
                    $users = User::where('nrswa', 'yes')
                        ->where('app_status', $app_status)
                        ->where('visible', 1)
                        ->get();
                    return ['data'=>$users->values()];
                }
                if ($nrswa == "No" && $uk_driving_license == "Yes") {
                    $users = User::where('driver_paper_work', 1)
                        ->where('app_status', $app_status)
                        ->where('visible', 1)
                        ->get();
                    return ['data'=>$users->values()];
                }
                if ($nrswa == "Yes" && $uk_driving_license == "Yes") {
                    $users = User::where('driver_paper_work', 1)
                        ->where('visible', 1)
                        ->where('nrswa', 'yes')
                        ->where('app_status', $app_status)
                        ->get();
                    return ['data'=>$users->values()];
                }
                $users = User::where('app_status', $app_status)
                    ->where('visible', 1)
                    ->get();
                return ['data'=>$users->values()];
            }

            $coords = DB::select("select easting, northing from open_postcode_geo where postcode = '$pc'");

            foreach ($coords as $results) {
                $easting = $results->easting;
                $northing = $results->northing;
            }
            //return $easting . ' ' . $northing;
            if ($easting == '' || $northing == '') {
                return;
            }

            $postcodes = DB::select("select postcode, sqrt(pow(abs('$easting' - easting),2) + pow(abs('$northing' - northing),2))
                as distance from open_postcode_geo where status = 'live'
                and easting is not null
                and northing is not null
                and easting between '$easting' - '$meters' and '$easting' + '$meters'
                and northing between '$northing' - '$meters' and '$northing' + '$meters'
                and postcode != ''
                order by distance
                ");
            $post_code = [];
            foreach ($postcodes as $postcode) {
                $post_code[] = $postcode->postcode;
            }

            if($staff_event == 'Yes'){

                if ($nrswa == "Yes" && $uk_driving_license == "No") {
                    $users = User::where('nrswa', 'yes')
                        ->where('visible', 1)
                        ->where('app_status', $app_status)
                        ->get();
                }
                if ($nrswa == "Yes" && $uk_driving_license == "Yes") {
                    $users = User::where('driver_paper_work', 1)
                        ->where('visible', 1)
                        ->where('nrswa', 'yes')
                        ->where('app_status', $app_status)
                        ->get();
                }
                if ($nrswa == "No" && $uk_driving_license == "No") {
                    $users = User::where('app_status', $app_status)
                        ->where('visible', 1)
                        ->get();
                }
                if ($nrswa == "No" && $uk_driving_license == "Yes") {
                    $users = User::where('driver_paper_work', 1)
                        ->where('visible', 1)
                        ->where('app_status', $app_status)
                        ->get();
                }
                //return $users;
                if(!$users->isEmpty()){
                    foreach ($users as $user){
                        foreach ($user->tags as $tags){
                            if($tags->name == $event_name) {
                                $events[] = $tags->pivot->user_id;
                                $events_users = User::find($events);
                            }
                        }
                    }
                    if($radius>0){
                        $users = $events_users;
                    } else{
                        return ['data'=>$events_users];
                    }
                } else{
                    return ['data'=>[]];
                }
            } else {

                if ($nrswa == "Yes" && $uk_driving_license == "Yes") {
                    $users = User::where('app_status', $app_status)
                        ->where('visible', 1)
                        ->where('nrswa', 'Yes')
                        ->where('driver_paper_work', 1)
                        ->get();
                }
                if ($nrswa == "Yes" && $uk_driving_license == "No") {
                    $users = User::where('app_status', $app_status)
                        ->where('visible', 1)
                        ->where('nrswa', 'Yes')
                        ->get();
                }
                if ($nrswa == "No" && $uk_driving_license == "Yes") {
                    $users = User::where('app_status', $app_status)
                        ->where('visible', 1)
                        ->where('driver_paper_work', 1)
                        ->get();
                }
                if ($nrswa == "No" && $uk_driving_license == "No") {
                    $users = User::where('app_status', $app_status)
                        ->where('visible', 1)
                        ->get();
                    if ($radius == 0 || $radius == '50+') {
                        return ['data' => $users->values()];
                    }
                }
            }

            $filtered = $users->whereInLoose('postcode', $post_code);
            //values() resets the keys
            if($radius==0 || $radius=='50+'){
                //return ['data'=>$users];
            }
            return ['data'=>$filtered->values()];
    }

    function staff_search_non_approved(Request $request)
    {
        //ini_set('memory_limit', '2048M');
        //return $request->all();
        $app_status = [0,1,2,3];
        $pc = $request->input('postcode');
        $staff_event = $request->input('staff_event');
        $event_name = $request->input('event_name');
        $pc = trim($pc);
        $radius = $request->input('radius');// in miles
        $nrswa = $request->input('nrswa');// in miles
        $uk_driving_license = $request->input('uk_driving_license');// in miles   driver_paper_work
        $meters = $radius / .00062137;
        //$events = [];
        if($pc==''){
            if ($nrswa == "Yes" && $uk_driving_license == "No") {
                $users = User::where('nrswa', 'yes')
                    ->whereIn('app_status', $app_status)
                    ->where('visible', 1)
                    ->get();
                return ['data'=>$users->values()];
            }
            if ($nrswa == "No" && $uk_driving_license == "Yes") {
                $users = User::where('driver_paper_work', 1)
                    ->whereIn('app_status', $app_status)
                    ->where('visible', 1)
                    ->get();
                return ['data'=>$users->values()];
            }
            if ($nrswa == "Yes" && $uk_driving_license == "Yes") {
                $users = User::where('driver_paper_work', 1)
                    ->where('visible', 1)
                    ->where('nrswa', 'yes')
                    ->whereIn('app_status', $app_status)
                    ->get();
                return ['data'=>$users->values()];
            }
            $users = User::where('visible', 1)
                    ->whereIn('app_status', $app_status)
                ->get();
            return ['data'=>$users->values()];
        }

        $coords = DB::select("select easting, northing from open_postcode_geo where postcode = '$pc'");

        foreach ($coords as $results) {
            $easting = $results->easting;
            $northing = $results->northing;
        }
        //return $easting . ' ' . $northing;
        if ($easting == '' || $northing == '') {
            return;
        }

        $postcodes = DB::select("select postcode, sqrt(pow(abs('$easting' - easting),2) + pow(abs('$northing' - northing),2))
                as distance from open_postcode_geo where status = 'live'
                and easting is not null
                and northing is not null
                and easting between '$easting' - '$meters' and '$easting' + '$meters'
                and northing between '$northing' - '$meters' and '$northing' + '$meters'
                and postcode != ''
                order by distance
                ");
        $post_code = [];
        foreach ($postcodes as $postcode) {
            $post_code[] = $postcode->postcode;
        }

        if($staff_event == 'Yes'){

            if ($nrswa == "Yes" && $uk_driving_license == "No") {
                $users = User::where('nrswa', 'yes')
                    ->where('visible', 1)
                    ->whereIn('app_status', $app_status)
                    ->get();
            }
            if ($nrswa == "Yes" && $uk_driving_license == "Yes") {
                $users = User::where('driver_paper_work', 1)
                    ->where('visible', 1)
                    ->where('nrswa', 'yes')
                    ->whereIn('app_status', $app_status)
                    ->get();
            }
            if ($nrswa == "No" && $uk_driving_license == "No") {
                $users = User::whereIn('app_status', $app_status)
                    ->where('visible', 1)
                    ->get();
            }
            if ($nrswa == "No" && $uk_driving_license == "Yes") {
                $users = User::where('driver_paper_work', 1)
                    ->where('visible', 1)
                    ->whereIn('app_status', $app_status)
                    ->get();
            }
            //return $users;
            if(!$users->isEmpty()){
                foreach ($users as $user){
                    foreach ($user->tags as $tags){
                        if($tags->name == $event_name) {
                            $events[] = $tags->pivot->user_id;
                            $events_users = User::find($events);
                        }
                    }
                }
                if($radius>0){
                    $users = $events_users;
                } else{
                    return ['data'=>$events_users];
                }
            } else{
                return ['data'=>[]];
            }
        } else {

            if ($nrswa == "Yes" && $uk_driving_license == "Yes") {
                $users = User::whereIn('app_status', $app_status)
                    ->where('visible', 1)
                    ->where('nrswa', 'Yes')
                    ->where('driver_paper_work', 1)
                    ->get();
            }
            if ($nrswa == "Yes" && $uk_driving_license == "No") {
                $users = User::whereIn('app_status', $app_status)
                    ->where('visible', 1)
                    ->where('nrswa', 'Yes')
                    ->get();
            }
            if ($nrswa == "No" && $uk_driving_license == "Yes") {
                $users = User::whereIn('app_status', $app_status)
                    ->where('visible', 1)
                    ->where('driver_paper_work', 1)
                    ->get();
            }
            if ($nrswa == "No" && $uk_driving_license == "No") {
                $users = User::whereIn('app_status', $app_status)
                    ->where('visible', 1)
                    ->get();
                if ($radius == 0 || $radius == '50+') {
                    return ['data' => $users->values()];
                }
            }
        }

        $filtered = $users->whereInLoose('postcode', $post_code);
        //values() resets the keys
        if($radius==0 || $radius=='50+'){
            //return ['data'=>$users];
        }
        return ['data'=>$filtered->values()];
    }
}
