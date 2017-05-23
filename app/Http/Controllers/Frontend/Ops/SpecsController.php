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
        $events_id = $request->input('events_id');
        $row_id = $request->input('row_id');
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
            $gradei = implode(',', $grade);
            $row_idi = implode(',', $row_id);
            $qtyi = implode(',', $qty);
            $positioni = implode(',', $position);
            if($mon_start!== null){
                $mon_starti = implode(',', $mon_start);
                $mon_endi = implode(',', $mon_end);
                $mon_sub_totali = implode(',', $mon_sub_total);
            } else{
//                $mon_starti = ',';
//                $mon_endi = ',';
//                $mon_sub_totali = ',';
            }
            if($tues_start!== null){
                $tues_starti = implode(',', $tues_start);
                $tues_endi = implode(',', $tues_end);
                $tues_sub_totali = implode(',', $tues_sub_total);
            } else{
//                $tues_starti = ',';
//                $tues_endi = ',';
//                $tues_sub_totali = ',';
            }
            if($wed_start!== null){
                $wed_starti = implode(',', $wed_start);
                $wed_endi = implode(',', $wed_end);
                $wed_sub_totali = implode(',', $wed_sub_total);
            } else{
//                $wed_starti = ',';
//                $wed_endi = ',';
//                $wed_sub_totali = ',';
            }
            if($thur_start!== null){
                $thur_starti = implode(',', $thur_start);
                $thur_endi = implode(',', $thur_end);
                $thur_sub_totali = implode(',', $thur_sub_total);
            } else{
//                $thur_starti = ',';
//                $thur_endi = ',';
//                $thur_sub_totali = ',';
            }
            if($fri_start!== null){
                $fri_starti = implode(',', $fri_start);
                $fri_endi = implode(',', $fri_end);
                $fri_sub_totali = implode(',', $fri_sub_total);
            } else{
//                $fri_starti = ',';
//                $fri_endi = ',';
//                $fri_sub_totali = ',';
            }
            if($sat_start!== null){
                $sat_starti = implode(',', $sat_start);
                $sat_endi = implode(',', $sat_end);
                $sat_sub_totali = implode(',', $sat_sub_total);
            } else{
//                $sat_starti = ',';
//                $sat_endi = ',';
//                $sat_sub_totali = ',';
            }
            if($sun_start!== null){
                $sun_starti = implode(',', $sun_start);
                $sun_endi = implode(',', $sun_end);
                $sun_sub_totali = implode(',', $sun_sub_total);
            } else{
//                $sun_starti = ',';
//                $sun_endi = ',';
//                $sun_sub_totali = ',';
            }

            $totali = implode(',', $total);

            $rows = [
                'events_id' => $events_id,
                'row_id' => $row_idi,
                'grade' => $gradei,
                'qty' => $qtyi,
                'position' => $positioni,
                'monday_start' => $mon_starti,
                'monday_end' => $mon_endi,
                'monday_hours' => $mon_sub_totali,
                'tuesday_start' => $tues_starti,
                'tuesday_end' => $tues_endi,
                'tuesday_hours' => $tues_sub_totali,
                'wednesday_start' => $wed_starti,
                'wednesday_end' => $wed_endi,
                'wednesday_hours' => $wed_sub_totali,
                'thursday_start' => $thur_starti,
                'thursday_end' => $thur_endi,
                'thursday_hours' => $thur_sub_totali,
                'friday_start' => $fri_starti,
                'friday_end' => $fri_endi,
                'friday_hours' => $fri_sub_totali,
                'saturday_start' => $sat_starti,
                'saturday_end' => $sat_endi,
                'saturday_hours' => $sat_sub_totali,
                'sunday_start' => $sun_starti,
                'sunday_end' => $sun_endi,
                'sunday_hours' => $sun_sub_totali,
                'total' => $totali,
            ];
            if(Specs::where('events_id', $events_id)->exists())
            {
                Specs::where('events_id', $events_id)->delete();
            }

            Specs::create($rows);
            return redirect()->back();
        }

        Specs::where('events_id', $events_id)->delete();
        return redirect()->back();
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
