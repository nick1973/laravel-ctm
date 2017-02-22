<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Access\User\User;
use App\Models\Dropdowns\EventsList;
use App\Models\Dropdowns\Tag;
use App\Models\Dropdowns\Unis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StaffSearchController extends Controller
{
    function index(){
        $events = Tag::all();
        return view('frontend.manager.staff_search.index', compact('events'));
    }

        function staff_search(Request $request){
        //return $request->all();
        $pc = $request->input('postcode');
        $radius = $request->input('radius');// in miles
        $nrswa = $request->input('nrswa');// in miles
        $uk_driving_license = $request->input('uk_driving_license');// in miles
        $meters = $radius / .00062137;
        $coords = DB::select("select easting, northing from open_postcode_geo where postcode = '$pc'");

        foreach($coords as $results) {
            $easting = $results->easting;
            $northing = $results->northing;
        }
        //return $easting . ' ' . $northing;
        if($easting=='' || $northing==''){
            return;
        }
        ini_set('memory_limit','2048M');
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
        foreach ($postcodes as $postcode){
            $post_code[] = $postcode->postcode;
        }
            //ini_set('max_execution_time', 600);
            $users = User::where('app_status', 3)
                        ->where('nrswa', $nrswa)
                        ->where('uk_driving_license', $uk_driving_license)
                        ->get();
            //$filtered = $users->whereInLoose('postcode', $post_code);
            //return $filtered->all();
            return $users;
    }
}
