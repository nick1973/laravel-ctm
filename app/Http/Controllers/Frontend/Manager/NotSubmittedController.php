<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Access\User\UserSnapshot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\GlobalState\Snapshot;

class NotSubmittedController extends Controller
{
    function index(){
        //$snapshot_created = UserSnapshot::all();
        $snapshot_created = DB::table('user_snapshot')->select('name', 'payroll')->get();
        dd($snapshot_created);
        return view('frontend.manager.not_submitted.index');
    }
}
