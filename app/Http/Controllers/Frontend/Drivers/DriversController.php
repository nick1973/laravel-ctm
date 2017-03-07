<?php

namespace App\Http\Controllers\Frontend\Drivers;

use App\Models\Access\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriversController extends Controller
{
    function index(){

        return view('frontend.drivers.index');
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

    function staff_all(){
        return view('frontend.drivers.all_staff');
    }
}
