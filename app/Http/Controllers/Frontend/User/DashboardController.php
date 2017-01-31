<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Access\User\References;
use App\Models\Access\User\RTWork;
use App\Models\Dropdowns\Tag;

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
        $reference = References::where('user_id', access()->id())->get();
        $rt_work = RTWork::where('user_id', access()->id())->get();
        $events = Tag::where('visible', 1)->orderBy('date', 'asc')->get();

        if(access()->hasRole('Executive'))
        {
            return redirect('dashboard/manager');
        }
        return view('frontend.user.dashboard', compact('reference', 'rt_work', 'events'))
            ->withUser(access()->user());
    }
}
