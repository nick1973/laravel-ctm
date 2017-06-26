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
        $users = DB::table('users')
            ->join('user_snapshot', 'users.payroll', '=', 'user_snapshot.payroll')
            ->where('users.updated_at', '!=', null)
            ->where('users.confirmed', '=', 1)
            ->where('users.markAsp45', '=' ,0)
            ->where('user_snapshot.updated_at', '!=', null)
            ->where('users.updated_at', '>', 'user_snapshot.updated_at')
            ->select('users.name', 'users.payroll', 'users.updated_at as user_updated', 'users.mobile', 'user_snapshot.updated_at as snapshot_created')
            ->get();
        $unique = collect($users);
        //$unique->whereIn('payroll');
        $unique_payroll = $unique->unique('payroll');
//        $unique = collect($unique_payroll);
        //return $unique_payroll;
        return view('frontend.manager.not_submitted.index', compact('users', 'unique_payroll'));
    }
}
