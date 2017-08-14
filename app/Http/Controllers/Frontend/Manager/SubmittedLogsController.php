<?php
namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Dropdowns\Unis;
use App\Models\Logs\SubmittedLogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubmittedLogsController extends Controller
{
    function index(){
        $staff = SubmittedLogs::all();
        return view('frontend.manager.logs', compact('staff'));
    }
}
