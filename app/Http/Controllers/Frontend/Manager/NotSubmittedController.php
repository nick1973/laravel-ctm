<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Access\User\User;
use App\Models\Access\User\UserSnapshot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\GlobalState\Snapshot;

class NotSubmittedController extends Controller
{
    function index(){
        //$snapshot_created = UserSnapshot::all();
        //$snapshot_created = DB::table('user_snapshot')->select('name', 'payroll', 'updated_at')->get();
        //$application_updated = DB::table('users')->select('name', 'payroll', 'updated_at')->get();
//        $collection = collect($application_updated)->each(function ($item, $key) {
//            //
//        });
        $users = DB::table('users')
            ->leftJoin('user_snapshot', 'users.payroll', '=', 'user_snapshot.payroll')
            ->where('users.updated_at', '!=', null)
            ->where('user_snapshot.updated_at', '!=', null)
            ->where('users.updated_at', '>', 'user_snapshot.updated_at')
            ->select('users.name', 'users.payroll', 'users.updated_at as user_updated', 'users.mobile', 'user_snapshot.updated_at as snapshot_created')
            ->get();
        //dd($application_updated);
        //return $users;
        return view('frontend.manager.not_submitted.index', compact('users'));
    }
}
