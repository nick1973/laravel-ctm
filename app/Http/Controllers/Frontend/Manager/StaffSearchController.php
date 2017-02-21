<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Dropdowns\EventsList;
use App\Models\Dropdowns\Unis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffSearchController extends Controller
{
    function index(){
        $events = EventsList::all();
        return view('frontend.manager.staff_search.index', compact('events'));
    }

    function staff_search(Request $request){
        return $request->all();
//        ini_set('memory_limit','2048M');
//        $postcodes = DB::select('select postcode, sqrt(pow(abs(454599 - easting),2) + pow(abs(295170 - northing),2))
//                as distance from open_postcode_geo where status = "live"
//                and easting is not null
//                and northing is not null
//                and easting between 454599 - 80467 and 454599 + 80467
//                and northing between 295170 - 80467 and 295170 + 80467
//                and postcode != "LE9 1RR"
//                order by distance limit 10');
//        //return $postcodes;
//        foreach ($postcodes as $postcode){
//            echo $postcode->postcode . '<br>';
//        }
    }
}
