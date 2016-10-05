<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Access\User\References;
use App\Models\Access\User\RTWork;
use App\Models\Access\User\User;
use App\Models\Ops\Events;
use App\Models\Ops\PayGrades;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
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

    public function show($id)
    {
        $event = Events::find($id);
        $pay_grades = PayGrades::all();
        $ctm_start_date = Carbon::createFromFormat('d/m/Y', $event->ctm_start_date);
        $ctm_start_date = Carbon::parse($ctm_start_date);
        $ctm_end_date = Carbon::createFromFormat('d/m/Y', $event->ctm_end_date);
        $ctm_end_date = Carbon::parse($ctm_end_date);
        $diffInDays = $ctm_start_date->diffInDays($ctm_end_date);
        $day_number = $ctm_start_date->dayOfWeek;
        $day_number_table = $ctm_start_date->dayOfWeek;
        $day_number_ng = $ctm_start_date->dayOfWeek;
        $day_number_scope = $ctm_start_date->dayOfWeek;
        $day_number_copy = $ctm_start_date->dayOfWeek;
        $day = $ctm_start_date->day;
//        $obj = file_get_contents('http://btbeqt.com/hardware_flat');
        $pay_grades = json_decode($pay_grades, true);
        return view('frontend.manager.sbf.show_test', compact('event', 'pay_grades', 'ctm_start_date', 'ctm_end_date', 'diffInDays',
            'day_number', 'day', 'day_number_table', 'day_number_ng', 'day_number_scope', 'day_number_copy'));

    }
}
