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
            $pc = $request->input('postcode');
            $radius = $request->input('radius');// in miles
            $nrswa = $request->input('nrswa');// in miles
            $uk_driving_license = $request->input('uk_driving_license');// in miles
            $meters = $radius / .00062137;
            if($pc==''){
                $users = User::where('app_status', 3)
                    ->get();
                return ['data'=>$users];
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
            if ($nrswa == "Yes" && $uk_driving_license == "Yes") {
                $users = User::where('app_status', 3)
                    ->where('nrswa', 'Yes')
                    ->where('uk_driving_license', 'Yes')
                    ->get();
//                if($radius==0 || $radius=='50+'){
//                    return ['data'=>$users];
//                }
            }
            if ($nrswa == "Yes" && $uk_driving_license == "No") {
                $users = User::where('app_status', 3)
                    ->where('nrswa', 'Yes')
                    ->get();
//                if($radius==0 || $radius=='50+'){
//                    return ['data'=>$users];
//                }
            }
            if ($nrswa == "No" && $uk_driving_license == "Yes") {
                $users = User::where('app_status', 3)
                    ->where('uk_driving_license', 'Yes')
                    ->get();
//                if($radius==0 || $radius=='50+'){
//                    return ['data'=>$users];
//                }
            }
            if ($nrswa == "No" && $uk_driving_license == "No") {
                $users = User::where('app_status', 3)
                    ->get();
                if($radius==0 || $radius=='50+'){
                    return ['data'=>$users];
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
