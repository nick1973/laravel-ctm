<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Dropdowns\HearAboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HearAboutUsDropdownsController extends Controller
{
    function create()
    {
        return view('frontend.manager.dropdowns.hear_about_us.create');
    }

    function store(Request $request)
    {
        $input = $request->all();
        HearAboutUs::create($input);
        return redirect('dashboard/register/dropdowns')->withFlashSuccess('The list was successfully added.');
    }

    function edit($id)
    {
        $list = HearAboutUs::findOrFail($id);
        return view('frontend.manager.dropdowns.hear_about_us.edit', compact('list'));
    }

    function update(Request $request, $id)
    {
        $uni = HearAboutUs::findOrFail($id);
        $this->validate($request, [
            'hear_about_us_name' => 'required'
        ]);
        $input = $request->all();
        $uni->fill($input)->save();
        return redirect('dashboard/register/dropdowns')->withFlashSuccess('The list was successfully altered.');
    }

    function destroy($id)
    {
        $uni = HearAboutUs::findOrFail($id);
        $uni->delete();
        return redirect('dashboard/register/dropdowns')->withFlashSuccess('The list was successfully deleted.');

    }
}
