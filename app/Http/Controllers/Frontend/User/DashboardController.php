<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Access\User\References;

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
        return view('frontend.user.dashboard', compact('reference'))
            ->withUser(access()->user());
    }
}
