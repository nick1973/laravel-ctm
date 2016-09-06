<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        javascript()->put([
            'test' => 'it works!',
        ]);

        return view('frontend.auth.register');
    }

    public function e_mail(Request $request)
    {
        $input = $request->all();

        Mail::send('emails.welcome', ['input'=>$input], function ($m) use ($input) {
            $m->from('admin@ctm.uk.com', 'CTM Application');

            $m->to('nick@ctm.uk.com', 'nick')->subject('Your CTM Application!');
        });
    }


    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
