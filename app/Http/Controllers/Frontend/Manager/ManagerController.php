<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Access\User\References;
use App\Models\Access\User\RTWork;
use App\Models\Access\User\User;
use App\Models\Access\User\UserSnapshot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


/**
 * Class DashboardController
 * @package App\Http\Controllers\Frontend
 */
class ManagerController extends Controller
{
    function index()
    {
        $users = User::where('visible', 1)->where('profile_confirmed', '!=', 'yes')->where('confirmed', 0)->paginate(5);
        return view('frontend.manager.index', compact('users'));
    }

    function show($id)
    {
        $user = User::find($id);
        $reference = References::where('user_id', $id)->get();
        $rt_work = RTWork::where('user_id', $id)->get();

        //$dirty = $user->getDirty();
        //return $dirty;
        return view('frontend.manager.user_dashboard', compact('user', 'reference', 'rt_work', 'dirty'));
    }

    function update(Request $request, $id)
    {
        $input = $request->all();
        User::find($id)->update($input);
        $user = User::find($id);
        $collection = collect($user);
        // remove ID
        $collection->forget('id');
        //Inserts a copy of the user
        if($request->input('profile_confirmed')=="Yes"){
            //ISSUE PAYROLL IF EMPTY
            $last_payroll = User::latest('payroll')->first();
            if($last_payroll->payroll==""){
                $last_payroll_number = 6000;
            }
            //return $last_payroll_number->payroll;
            if($user->payroll=="" || $user->payroll=='0')
            {
                $last_payroll_number = (int)$last_payroll->payroll + 1;
                //return $last_payroll_number;
                User::find($id)->update(['payroll'=>$last_payroll_number]);
                //$user->fill($input)->save();
            }
            //SEND A SUCCESS EMAIL
//            Mail::send('emails.success', ['user'=>$user], function ($m) use ($user) {
//                $m->from('admin@ctm.uk.com', 'CTM Application');
//                $m->to($user->email, $user->name)->subject('Your CTM Application!');
//            });
            //SNAPSHOT OF USER
            UserSnapshot::insertGetId($collection->all());
            return redirect('dashboard/manager')->withFlashSuccess($user->name . ' has been emailed!');
        }
        //return $this->index();
        //return redirect()->route('frontend.index')->withFlashSuccess('Your Applications has been submitted!');flash_warning
        return redirect('dashboard/manager')->withFlashWarning($user->name . '\'s application has been declined!');
    }

    function staff_search()
    {
        return view('frontend.manager.staff');
    }

    function staff_export()
    {
        $staff = User::where('profile_confirmed', 'yes')
            ->where('confirmed', 1)
            ->where('payroll_export', 1)
            ->get();


    }
}
