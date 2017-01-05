<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ExportController extends Controller
{
    function index()
    {
        $files = Storage::files('payroll');
        return view('frontend.manager.exports.index', compact('files'));
    }
}
