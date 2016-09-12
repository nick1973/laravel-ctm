<?php

namespace App\Http\Controllers\Frontend\Ops;

use App\Events\Event;
use App\Models\Ops\Events;
use App\Http\Controllers\Controller;
use App\Models\Ops\PayGrades;
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
        $input = $request->all();
        $event->update($input);
        return redirect()->route('dashboard.ops.index');
    }

    public function show($id)
    {
        $event = Events::find($id);
        $pay_grades = PayGrades::all();
//        $obj = file_get_contents('http://btbeqt.com/hardware_flat');
        $pay_grades = json_decode($pay_grades, true);

        return view('frontend.ops.show', compact('event', 'pay_grades'));
    }
}