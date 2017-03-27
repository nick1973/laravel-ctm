<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Dropdowns\HearAboutUs;
use App\Models\Dropdowns\Promotions;
use App\Models\Dropdowns\RegistrationNotes;
use App\Models\Dropdowns\Unis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Access\User\User;
use App\Models\Access\User\RTWork;

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
        $list = HearAboutUs::all();
        $promotions = Promotions::all();
        $unis = Unis::all();
        $notes = RegistrationNotes::find(1);
        return view('frontend.auth.register', compact('list','promotions','unis','notes'));
    }

    /**
     * @return string
     */
    public function map()
    {
        return view('frontend.maps');
    }

    public function e_mail(Request $request)
    {
        $input = $request->except('e_address');
        $email = $request->input('e_address');
            //return $input;
        //User::find(access()->id())->update(['payroll_export'=>0]);

        Mail::send('emails.welcome', ['input'=>$input], function ($m) use ($input, $email) {
            $m->from('admin@ctm.uk.com', 'CTM Application');
            $m->bcc($email)->subject('Your CTM Application!');
        });
        //return redirect()->back()->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
        //return $email;
    }


    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }

    public function users_sql()
    {
        ini_set('max_execution_time', 10000);
        ini_set('request_terminate_timeout ', 10000);
        ini_set('memory_limit','2048M');
        $staff = User::where('promotion','!=','')->update(['promotion'=>'']);

        //$staff->update(['promotion'=>'']);
//        $foo = User::where('id', 34416)->get();
//        return $foo;

        //$affected = DB::table('users')->where('notes', '!=', '')->update(array('notes' => ''));
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //phpinfo();
        //$sql = file_get_contents('http://localhost/open_postcode_geo.txt');

        //return $sql;
        //User::where('id',117)->update(['markAsp45'=>1]);
        //User::insert($pFortyFive);
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
}


}
