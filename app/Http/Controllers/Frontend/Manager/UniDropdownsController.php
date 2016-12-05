<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Dropdowns\Unis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UniDropdownsController extends Controller
{
//    function index()
//    {
//        $uni = Unis::all();
//        return view('frontend.manager.dropdowns.index', compact('uni'));
//    }

    function create()
    {
        return view('frontend.manager.dropdowns.unis.create');
    }

    function store(Request $request)
    {
        $input = $request->all();
        Unis::create($input);
        return redirect('dashboard/register/dropdowns')->withFlashSuccess('The Uni was successfully added.');
    }

    function edit($id)
    {
        $uni = Unis::findOrFail($id);
        return view('frontend.manager.dropdowns.unis.edit', compact('uni'));
    }

    function update(Request $request, $id)
    {
        $uni = Unis::findOrFail($id);
        $this->validate($request, [
            'uni_name' => 'required'
        ]);
        $input = $request->all();
        $uni->fill($input)->save();
        return redirect('dashboard/register/dropdowns')->withFlashSuccess('The Uni was successfully altered.');
    }

    function destroy($id)
    {
        $uni = Unis::findOrFail($id);
        $uni->delete();
        return redirect('dashboard/register/dropdowns')->withFlashSuccess('The Uni was successfully deleted.');

    }
}
