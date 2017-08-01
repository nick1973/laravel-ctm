<?php

namespace App\Http\Controllers\Frontend\Ops;

use App\Models\Ops\Events;
use App\Models\Ops\Specs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecsController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        //return $request->input('wed_hours');
        $spec_name = $request->input('spec_name');
        $events_id = $request->input('events_id');
        $row_id = $request->input('row_id');
        $grade = $request->input('grade');
        $qty = $request->input('qty');
        $position = $request->input('position');
        $mon_start = $request->input('mon_start');
        $mon_end = $request->input('mon_end');
        $mon_sub_total = $request->input('mon_hours');
        $tues_start = $request->input('tues_start');
        $tues_end = $request->input('tues_end');
        $tues_sub_total = $request->input('tues_hours');
        $wed_start = $request->input('wed_start');
        $wed_end = $request->input('wed_end');
        $wed_sub_total = $request->input('wed_hours');
        $thur_start = $request->input('thurs_start');
        $thur_end = $request->input('thurs_end');
        $thur_sub_total = $request->input('thurs_hours');
        $fri_start = $request->input('fri_start');
        $fri_end = $request->input('fri_end');
        $fri_sub_total = $request->input('fri_hours');
        $sat_start = $request->input('sat_start');
        $sat_end = $request->input('sat_end');
        $sat_sub_total = $request->input('sat_hours');
        $sun_start = $request->input('sun_start');
        $sun_end = $request->input('sun_end');
        $sun_sub_total = $request->input('sun_hours');
        $total = $request->input('total');

        function makeCollection($array, $start, $rowid){
            if(count($start)<1){
                return collect($array)->toArray();
            }
             return collect($array)->chunk(count($start)/count($rowid))->toArray();
        }
        if ($grade != "") {
            //$mon_start = makeCollection($mon_start, $mon_start, $row_id);
            //$mon_end = makeCollection($mon_end, $mon_end, $row_id);
            //$mon_sub_total = makeCollection($mon_sub_total, $mon_sub_total, $row_id);
            $mon_start = collect($mon_start)->chunk(count($mon_start)/count($row_id))->toArray();
            $mon_end = collect($mon_end)->chunk(count($mon_end)/count($row_id))->toArray();
            $mon_sub_total = collect($mon_sub_total)->chunk(count($mon_sub_total)/count($row_id))->toArray();
            $tues_start = collect($tues_start)->chunk(count($tues_start)/count($row_id))->toArray();
            $tues_end = collect($tues_end)->chunk(count($tues_end)/count($row_id))->toArray();
            $tues_sub_total = collect($tues_sub_total)->chunk(count($tues_sub_total)/count($row_id))->toArray();
            $wed_start = collect($wed_start)->chunk(count($wed_start)/count($row_id))->toArray();
            $wed_end = collect($wed_end)->chunk(count($wed_end)/count($row_id))->toArray();
            $wed_sub_total = collect($wed_sub_total)->chunk(count($wed_sub_total)/count($row_id))->toArray();
            $thur_start = collect($thur_start)->chunk(count($thur_start)/count($row_id))->toArray();
            $thur_end = collect($thur_end)->chunk(count($thur_end)/count($row_id))->toArray();
            $thur_sub_total = collect($thur_sub_total)->chunk(count($thur_sub_total)/count($row_id))->toArray();
            $fri_start = collect($fri_start)->chunk(count($fri_start)/count($row_id))->toArray();
            $fri_end = collect($fri_end)->chunk(count($fri_end)/count($row_id))->toArray();
            $fri_sub_total = collect($fri_sub_total)->chunk(count($fri_sub_total)/count($row_id))->toArray();
            $sat_start = collect($sat_start)->chunk(count($sat_start)/count($row_id))->toArray();
            $sat_end = collect($sat_end)->chunk(count($sat_end)/count($row_id))->toArray();
            $sat_sub_total = collect($sat_sub_total)->chunk(count($sat_sub_total)/count($row_id))->toArray();
            $sun_start = collect($sun_start)->chunk(count($sun_start)/count($row_id))->toArray();
            $sun_end = collect($sun_end)->chunk(count($sun_end)/count($row_id))->toArray();
            $sun_sub_total = collect($sun_sub_total)->chunk(count($sun_sub_total)/count($row_id))->toArray();
            $day_array = [];
            //DELETES EXISTING RECORDS
            if(Specs::where('events_id', $events_id)->where('spec_name', $spec_name)->exists()){
                Specs::where('events_id', $events_id)->where('spec_name', $spec_name)->delete();
            }

            for ($i = 0; $i < count($row_id); $i++) {
                $day_array[$i]['events_id'] = $events_id;
                $day_array[$i]['spec_name'] = $spec_name;
                $day_array[$i]['row_id'] = $row_id[$i];
                $day_array[$i]['grade'] = $grade[$i];
                $day_array[$i]['qty'] = $qty[$i];
                $day_array[$i]['position'] = $position[$i];
                $day_array[$i]['total'] = $total[$i];
                //MONDAY
                if($request->input('mon_start') != null) {
                    $mon_starti = implode(',', $mon_start[$i]);
                    $mon_endi = implode(',', $mon_end[$i]);
                    $mon_sub_totali = implode(',', $mon_sub_total[$i]);

                    $day_array[$i]['monday_start'] = $mon_starti;
                    $day_array[$i]['monday_end'] = $mon_endi;
                    $day_array[$i]['monday_hours'] = $mon_sub_totali;
                } else{
                    $day_array[$i]['monday_start'] = "";
                    $day_array[$i]['monday_end'] = "";
                    $day_array[$i]['monday_hours'] = "";
                }
                //TUESDAY
                if($request->input('tues_start') != null) {
                    $tues_starti = implode(',', $tues_start[$i]);
                    $tues_endi = implode(',', $tues_end[$i]);
                    $tues_sub_totali = implode(',', $tues_sub_total[$i]);

                    $day_array[$i]['tuesday_start'] = $tues_starti;
                    $day_array[$i]['tuesday_end'] = $tues_endi;
                    $day_array[$i]['tuesday_hours'] = $tues_sub_totali;
                } else{
                    $day_array[$i]['tuesday_start'] = "";
                    $day_array[$i]['tuesday_end'] = "";
                    $day_array[$i]['tuesday_hours'] = "";
                }
                //WEDNESDAY
                if($request->input('wed_start') != null) {
                    $wed_starti = implode(',', $wed_start[$i]);
                    $wed_endi = implode(',', $wed_end[$i]);
                    $wed_sub_totali = implode(',', $wed_sub_total[$i]);

                    $day_array[$i]['wednesday_start'] = $wed_starti;
                    $day_array[$i]['wednesday_end'] = $wed_endi;
                    $day_array[$i]['wednesday_hours'] = $wed_sub_totali;
                } else{
                    $day_array[$i]['wednesday_start'] = "";
                    $day_array[$i]['wednesday_end'] = "";
                    $day_array[$i]['wednesday_hours'] = "";
                }
                //THURSDAY
                if($request->input('thurs_start') != null) {
                    $thur_starti = implode(',', $thur_start[$i]);
                    $thur_endi = implode(',', $thur_end[$i]);
                    $thur_sub_totali = implode(',', $thur_sub_total[$i]);

                    $day_array[$i]['thursday_start'] = $thur_starti;
                    $day_array[$i]['thursday_end'] = $thur_endi;
                    $day_array[$i]['thursday_hours'] = $thur_sub_totali;
                } else{
                    $day_array[$i]['thursday_start'] = "";
                    $day_array[$i]['thursday_end'] = "";
                    $day_array[$i]['thursday_hours'] = "";
                }
                //FRIDAY
                if($request->input('fri_start') != null) {
                    $fri_starti = implode(',', $fri_start[$i]);
                    $fir_endi = implode(',', $fri_end[$i]);
                    $fri_sub_totali = implode(',', $fri_sub_total[$i]);

                    $day_array[$i]['friday_start'] = $fri_starti;
                    $day_array[$i]['friday_end'] = $fir_endi;
                    $day_array[$i]['friday_hours'] = $fri_sub_totali;
                } else{
                    $day_array[$i]['friday_start'] = "";
                    $day_array[$i]['friday_end'] = "";
                    $day_array[$i]['friday_hours'] = "";
                }
                //SATURDAY
                if($request->input('fri_start') != null) {
                    $sat_starti = implode(',', $sat_start[$i]);
                    $sat_endi = implode(',', $sat_end[$i]);
                    $sat_sub_totali = implode(',', $sat_sub_total[$i]);

                    $day_array[$i]['saturday_start'] = $sat_starti;
                    $day_array[$i]['saturday_end'] = $sat_endi;
                    $day_array[$i]['saturday_hours'] = $sat_sub_totali;
                } else{
                    $day_array[$i]['saturday_start'] = "";
                    $day_array[$i]['saturday_end'] = "";
                    $day_array[$i]['saturday_hours'] = "";
                }
                //SUNDAY
                if($request->input('fri_start') != null) {
                    $sun_starti = implode(',', $sun_start[$i]);
                    $sun_endi = implode(',', $sun_end[$i]);
                    $sun_sub_totali = implode(',', $sun_sub_total[$i]);

                    $day_array[$i]['sunday_start'] = $sun_starti;
                    $day_array[$i]['sunday_end'] = $sun_endi;
                    $day_array[$i]['sunday_hours'] = $sun_sub_totali;
                } else{
                    $day_array[$i]['sunday_start'] = "";
                    $day_array[$i]['sunday_end'] = "";
                    $day_array[$i]['sunday_hours'] = "";
                }
                Specs::create($day_array[$i]);
            }
            //dd($day_array);
                return redirect()->back();
        }
    }




    public function update(Request $request, $id)
    {
        //return $request->all();
        $grade = $request->input('grade');
        $qty = $request->input('qty');
        $position = $request->input('position');
        $mon_start = $request->input('monday_start');
        $mon_end = $request->input('monday_end');
        $mon_sub_total = $request->input('monday_hours');
        $tues_start = $request->input('tuesday_start');
        $tues_end = $request->input('tuesday_end');
        $tues_sub_total = $request->input('tuesday_hours');
        $wed_start = $request->input('wednesday_start');
        $wed_end = $request->input('wednesday_end');
        $wed_sub_total = $request->input('wednesday_hours');
        $thur_start = $request->input('thursday_start');
        $thur_end = $request->input('thursday_end');
        $thur_sub_total = $request->input('thursday_hours');
        $fri_start = $request->input('friday_start');
        $fri_end = $request->input('friday_end');
        $fri_sub_total = $request->input('friday_hours');
        $sat_start = $request->input('saturday_start');
        $sat_end = $request->input('saturday_end');
        $sat_sub_total = $request->input('saturday_hours');
        $sun_start = $request->input('sunday_start');
        $sun_end = $request->input('sunday_end');
        $sun_sub_total = $request->input('sunday_hours');
        $total = $request->input('total');

        if ($grade != "") {
            $grade= implode(',', $grade);
            $qty = implode(',', $qty);
            $position = implode(',', $position);
            $mon_start = implode(',', $mon_start);
            $mon_end = implode(',', $mon_end);
            $mon_sub_total = implode(',', $mon_sub_total);
            $tues_start = implode(',', $tues_start);
            $tues_end = implode(',', $tues_end);
            $tues_sub_total = implode(',', $tues_sub_total);
            $wed_start = implode(',', $wed_start);
            $wed_end = implode(',', $wed_end);
            $wed_sub_total = implode(',', $wed_sub_total);
            $thur_start = implode(',', $thur_start);
            $thur_end = implode(',', $thur_end);
            $thur_sub_total = implode(',', $thur_sub_total);
            $fri_start = implode(',', $fri_start);
            $fri_end = implode(',', $fri_end);
            $fri_sub_total = implode(',', $fri_sub_total);
            $sat_start = implode(',', $sat_start);
            $sat_end = implode(',', $sat_end);
            $sat_sub_total = implode(',', $sat_sub_total);
            $sun_start = implode(',', $sun_start);
            $sun_end = implode(',', $sun_end);
            $sun_sub_total = implode(',', $sun_sub_total);

            $specs = [
                'grade' => $grade,
                'qty' => $qty,
                'position' => $position,
                'monday_start' => $mon_start,
                'monday_end' => $mon_end,
                'monday_hours' => $mon_sub_total,
                'tuesday_start' => $tues_start,
                'tuesday_end' => $tues_end,
                'tuesday_hours' => $tues_sub_total,
                'wednesday_start' => $wed_start,
                'wednesday_end' => $wed_end,
                'wednesday_hours' => $wed_sub_total,
                'thursday_start' => $thur_start,
                'thursday_end' => $thur_end,
                'thursday_hours' => $thur_sub_total,
                'friday_start' => $fri_start,
                'friday_end' => $fri_end,
                'friday_hours' => $fri_sub_total,
                'saturday_start' => $sat_start,
                'saturday_end' => $sat_end,
                'saturday_hours' => $sat_sub_total,
                'sunday_start' => $sun_start,
                'sunday_end' => $sun_end,
                'sunday_hours' => $sun_sub_total
            ];
            //return $specs;
            $spec = new Specs($specs);
            //return $specs;
            $event = Events::find($id);
            //DELETE ALL RECORDS WITH events_id of ID
            $event->spec()->delete();

            $event->spec()->save($spec);
            return redirect()->back();
        } else{
            $event = Events::find($id);
            $event->spec()->delete();
            return redirect()->back();
        }
    }
}
