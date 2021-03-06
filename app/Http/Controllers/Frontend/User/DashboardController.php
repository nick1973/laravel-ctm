<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Access\User\References;
use App\Models\Access\User\RTWork;
use App\Models\Dropdowns\Tag;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Frontend
 */
class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        if(access()->user()->app_status == 8){
            access()->logout();
            return redirect('/');
        } else{
            $reference = References::where('user_id', access()->id())->get();
            $rt_work = RTWork::where('user_id', access()->id())->get();
            $events = Tag::where('visible', 1)->where('csas', 0)->orderBy('date', 'asc')->get();   //->orderBy('date', 'asc')

            if(access()->hasRole('Executive'))
            {
                return redirect('dashboard/manager');
            }
            if(access()->hasRole('drivers'))
            {
                return redirect('dashboard/drivers');
            }
            return view('frontend.user.dashboard', compact('reference', 'rt_work', 'events'))
                ->withUser(access()->user());
        }
    }
}
