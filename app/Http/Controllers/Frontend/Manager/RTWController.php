<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Access\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RTWController extends Controller
{
    function index(){

        return view('frontend.manager.rtw.index');
    }

    function update(Request $request, $id){
        $id = $request->input('id');
        $input = $request->except('id');
        $user = User::find($id);
        $user->update($input);
//        return view('frontend.drivers.index');
//        return "doo";
//        return redirect('dashboard/drivers');
    }
}
