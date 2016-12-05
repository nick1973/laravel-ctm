<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Dropdowns\RegistrationNotes;
use App\Models\Dropdowns\Unis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class RegistrationNotesController extends Controller
{
    function store(Request $request)
    {
        $input = $request->all();
        RegistrationNotes::create($input);
        return redirect('dashboard/register/dropdowns')->withFlashSuccess('The Selection was successfully added.');
    }

    function update(Request $request, $id)
    {
        $notes = RegistrationNotes::findOrFail(1);

        $input = $request->all();
        $notes->fill($input)->save();
        return redirect('dashboard/register/dropdowns')->withFlashSuccess('The Selection was successfully altered.');
    }

}
