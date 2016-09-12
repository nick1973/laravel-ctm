<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ops\PayGrades;
use Illuminate\Http\Request;

use App\Http\Requests;

class OpsController extends Controller
{
    public function index()
    {
        return view('backend.ops.index');
    }

}
