<?php

namespace App\Http\Controllers\Frontend\Ops;

use App\Events\Event;
use App\Models\Ops\Events;
use App\Http\Controllers\Controller;
use App\Models\Ops\Opstab;
use App\Models\Ops\PayGrades;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OpsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.ops.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('frontend.ops.create');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {

        $input = $request->all();
        Events::create($input);
        return redirect()->route('dashboard.ops.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $event = Events::find($id);
        return view('frontend.ops.edit', compact('event'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $event = Events::find($id);
        $input = $request->except('event_start_date','event_end_date','ctm_start_date','ctm_end_date');
        $all = $request->all();
        //return $all;
        $event_start_date = $request->input('event_start_date');
        $event_start_date_formated = date_create($event_start_date);
        //dd($event_start_date_formated) ;
        $event_start_date_formated = date_format($event_start_date_formated,"Y/d/m");

        $event_end_date = $request->input('event_end_date');
        $event_end_date_formated = date_create($event_end_date);
        $event_end_date_formated = date_format($event_end_date_formated,"Y/d/m");

        $ctm_start_date = $request->input('ctm_start_date');
        $ctm_start_date_formated = date_create($ctm_start_date);
        $ctm_start_date_formated = date_format($ctm_start_date_formated,"Y/d/m");

        $ctm_end_date = $request->input('ctm_end_date');
        $ctm_end_date_formated = date_create($ctm_end_date);
        $ctm_end_date_formated = date_format($ctm_end_date_formated,"Y/d/m");

        $event->update($input);
        $event->update(['event_start_date'=>$event_start_date_formated,
                        'event_end_date'=>$event_end_date_formated,
                        'ctm_start_date'=>$ctm_start_date_formated,
                        'ctm_end_date'=>$ctm_end_date_formated]);
        return redirect()->route('dashboard.ops.index');
    }

    public function show($id)
    {
        $event = Events::find($id);
        $pay_grades = PayGrades::all();
        $tabs = Opstab::where('event_id', $id)->get();
        $tab_array = [];
        foreach ($tabs as $tab){
            $tab_array = explode(',', $tab->tab_title);
        }
        $event_start_date = Carbon::parse($event->event_start_date);
        $event_end_date = Carbon::parse($event->event_end_date);
        $ctm_start_date = Carbon::parse($event->ctm_start_date);
        $ctm_end_date = Carbon::parse($event->ctm_end_date);
        $diffInDays = $ctm_start_date->diffInDays($ctm_end_date);
        $diffInDays_event = $event_start_date->diffInDays($event_end_date);
        $day_number = $ctm_start_date->dayOfWeek;
        $day_number_table = $ctm_start_date->dayOfWeek;
        $day_number_ng = $ctm_start_date->dayOfWeek;
        $day_number_scope = $ctm_start_date->dayOfWeek;
        $day_number_copy = $ctm_start_date->dayOfWeek;
        $day = $ctm_start_date->day;
//        $obj = file_get_contents('http://btbeqt.com/hardware_flat');
        $pay_grades = json_decode($pay_grades, true);
        return view('frontend.ops.show', compact('event', 'pay_grades', 'ctm_start_date', 'ctm_end_date', 'diffInDays',
            'day_number', 'day', 'day_number_table', 'day_number_ng', 'day_number_scope', 'day_number_copy', 'event_start_date',
            'event_end_date', 'diffInDays_event', 'tab_array'));
    }

    public function save_tabs(Request $request){
        $event_id = $request->input('event_id');
        $tab_title = $request->input('tab_title');
        $tab_href = $request->input('tab_href');
        $tab_title_array = implode(',', $tab_title);
        $tab_href_array = implode(',', $tab_href);
        if(Opstab::where('event_id', $event_id)->exists()){
            Opstab::where('event_id', $event_id)->update(['tab_href'=>$tab_href_array, 'tab_title'=>$tab_title_array]);
            return ['tab_href'=>$tab_href_array, 'tab_title'=>$tab_title_array];
        } else{
            Opstab::create(['tab_href'=>$tab_href_array, 'tab_title'=>$tab_title_array, 'event_id'=>$event_id]);
        }

    }
}
