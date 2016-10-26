<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Access\User\References;
use App\Models\Access\User\RTWork;
use App\Models\Access\User\User;
use App\Models\Ops\Events;
use App\Models\Ops\PayGrades;
use App\Models\Ops\Specs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SBFController extends Controller
{
    /**
     * @return string
     */
    public function index()
    {
        return view('frontend.manager.sbf.index');
    }

    public function store(Request $request)
    {
        $spec_id = $request->input('spec_id');
        $row_id = $request->input('row_id');
        $user_id = $request->input('user_id');
        $days = $request->input('days');
        $start = $request->input('start');
        $end = $request->input('end');
        $day_count = count($request->input('days'));
        $day_array = implode(',', $days);
        //return $days;
        $spec = Specs::where('id', $spec_id)->first();
        $spec->staff()->detach();
        //LOOP THROUGH POST ARRAYS THEN SYNC 1 AT A TIME
        for ($i = 0; $i < count($user_id);){
                $spec->staff()->attach([$user_id[$i] => ['row_id' => $row_id[$i], 'days' => $days[$i],
                    //'start' => $start[$i], 'end' => $end[$i]
                ]]);
            $i++;
        }
        return $request->all();
    }

    public function show($id)
    {
        $user = Auth::user();
        $event = Events::find($id);
        $spec = Specs::where('events_id',$id)->first();
        $collection = collect($spec->staff);
        $pay_grades = PayGrades::all();
        $users = User::all();
        $ctm_start_date = Carbon::createFromFormat('Y/m/d', $event->ctm_start_date);
        $ctm_start_date = Carbon::parse($ctm_start_date);
        $ctm_start_date_copy = Carbon::parse($ctm_start_date);
        $ctm_start_date_rep = Carbon::parse($ctm_start_date);
        $ctm_start_date_scope = Carbon::parse($ctm_start_date);
        $ctm_end_date = Carbon::createFromFormat('Y/m/d', $event->ctm_end_date);
        $ctm_end_date = Carbon::parse($ctm_end_date);
        $ctm_end_date = Carbon::parse($ctm_end_date);
        $diffInDays = $ctm_start_date->diffInDays($ctm_end_date);
        $day_number = $ctm_start_date->dayOfWeek;
        $day_number_table = $ctm_start_date->dayOfWeek;
        $day_number_ng = $ctm_start_date->dayOfWeek;
        $day_number_scope = $ctm_start_date->dayOfWeek;
        $day_number_copy = $ctm_start_date->dayOfWeek;
        $day_number_rep = $ctm_start_date->dayOfWeek;
        $day = $ctm_start_date->day;
//        $obj = file_get_contents('http://btbeqt.com/hardware_flat');
        $pay_grades = json_decode($pay_grades, true);
        return view('frontend.manager.sbf.show_test', compact('event', 'pay_grades', 'ctm_start_date', 'ctm_end_date', 'diffInDays',
            'day_number', 'day', 'day_number_table', 'day_number_ng', 'day_number_scope', 'day_number_copy', 'day_number_rep','ctm_start_date_copy',
            'ctm_start_date_rep', 'users',
            'collection', 'spec', 'user', 'ctm_start_date_scope'));

    }
}
