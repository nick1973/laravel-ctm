<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Dropdowns\EventsList;
use App\Models\Dropdowns\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    function index()
    {
        if(access()->hasRole('User')){
            return redirect('dashboard');
        }
        $events = Tag::all();

        return view('frontend.manager.events.index', compact('events'));
    }

    function create()
    {
        return view('frontend.manager.events.create');
    }

    function store(Request $request)
    {
        $input = $request->all();
        Tag::create($input);
        return redirect('dashboard/events');
    }

    function edit($id)
    {
        $event = Tag::find($id);
        return view('frontend.manager.events.edit', compact('event'));
    }

    function update(Request $request, $id)
    {
        $event = Tag::find($id);
        $event->update($request->all());
        return redirect('dashboard/events');
    }

    function destroy($id)
    {
        Tag::destroy($id);
        return redirect('dashboard/events');
    }

}
