<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Dropdowns\EventsList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    function index()
    {
        if(access()->hasRole('User')){
            return redirect('dashboard');
        }
        $events = EventsList::all();
        return view('frontend.manager.events.index', compact('events'));
    }

    function create()
    {
        return view('frontend.manager.events.create');
    }

    function store(Request $request)
    {
        $input = $request->all();
        EventsList::create($input);
        return redirect('dashboard/events');
    }

    function edit($id)
    {
        $event = EventsList::find($id);
        return view('frontend.manager.events.edit', compact('event'));
    }

    function update(Request $request, $id)
    {
        $event = EventsList::find($id);
        $event->update($request->all());
        return redirect('dashboard/events');
    }

    function destroy($id)
    {
        EventsList::destroy($id);
        return redirect('dashboard/events');
    }

}
