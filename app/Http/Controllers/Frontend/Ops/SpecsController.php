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

            $rows = [
                'events_id' => $events_id,
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

            Specs::where('events_id', $events_id)->delete();

            Specs::create($rows);

            //return 'saved';
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
