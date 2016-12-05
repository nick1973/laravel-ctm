<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Dropdowns\HearAboutUs;
use App\Models\Dropdowns\Promotions;
use App\Models\Dropdowns\RegistrationNotes;
use App\Models\Dropdowns\Unis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionsDropdownsController extends Controller
{
    function index()
    {
        $promotions = Promotions::all();
        $uni = Unis::all();
        $hear_about_us = HearAboutUs::all();
        $notes = RegistrationNotes::find(1);
        return view('frontend.manager.dropdowns.promotion.index', compact('promotions','uni','hear_about_us','notes'));
    }

    function create()
    {
        return view('frontend.manager.dropdowns.promotion.create');
    }

    function store(Request $request)
    {
        $input = $request->all();
        Promotions::create($input);
        return redirect('dashboard/register/dropdowns')->withFlashSuccess('The Selection was successfully added.');
    }

    function edit($id)
    {
        $promotion = Promotions::findOrFail($id);
        return view('frontend.manager.dropdowns.promotion.edit', compact('promotion'));
    }

    function update(Request $request, $id)
    {
        //$id = str_replace("lob","",$id);
        $promotion = Promotions::findOrFail($id);
        $this->validate($request, [
            'promo_name' => 'required'
        ]);
        $input = $request->all();
        $promotion->fill($input)->save();
        return redirect('dashboard/register/dropdowns')->withFlashSuccess('The Selection was successfully altered.');
    }

    function destroy($id)
    {
        $promotion = Promotions::findOrFail($id);
        $promotion->delete();
        return redirect('dashboard/register/dropdowns')->withFlashSuccess('The promotion was successfully deleted.');
    }
}
