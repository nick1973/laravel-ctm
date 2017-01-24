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
            $m->to($email, 'nick')->subject('Your CTM Application!');
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
//        $staff = User::where([
//            ['profile_confirmed', '=', 'Yes'],
//            ['confirmed', '=', 1],
//            ['payroll_export', '=', 1],
//            ['payroll', '!=', '']
//        ])->get();
//        $foo = User::where('id', 34416)->get();
//        return $foo;
        ini_set('max_execution_time', 10000);
        ini_set('request_terminate_timeout ', 10000);
        ini_set('memory_limit','2048M');

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $app_status = [
            [
                "id" => 7117,
                "app_status" => 3
            ],
            [
                "id" => 7136,
                "app_status" => 3
            ],
            [
                "id" => 9181,
                "app_status" => 3
            ],
            [
                "id" => 9892,
                "app_status" => 3
            ],
            [
                "id" => 10049,
                "app_status" => 3
            ],
            [
                "id" => 10309,
                "app_status" => 3
            ],
            [
                "id" => 10715,
                "app_status" => 3
            ],
            [
                "id" => 11052,
                "app_status" => 3
            ],
            [
                "id" => 11059,
                "app_status" => 3
            ],
            [
                "id" => 11384,
                "app_status" => 3
            ],
            [
                "id" => 12403,
                "app_status" => 3
            ],
            [
                "id" => 12501,
                "app_status" => 3
            ],
            [
                "id" => 12655,
                "app_status" => 3
            ],
            [
                "id" => 13663,
                "app_status" => 3
            ],
            [
                "id" => 15554,
                "app_status" => 3
            ],
            [
                "id" => 16237,
                "app_status" => 3
            ],
            [
                "id" => 16524,
                "app_status" => 3
            ],
            [
                "id" => 16694,
                "app_status" => 3
            ],
            [
                "id" => 16720,
                "app_status" => 3
            ],
            [
                "id" => 16912,
                "app_status" => 3
            ],
            [
                "id" => 17217,
                "app_status" => 3
            ],
            [
                "id" => 17266,
                "app_status" => 3
            ],
            [
                "id" => 17314,
                "app_status" => 3
            ],
            [
                "id" => 17559,
                "app_status" => 3
            ],
            [
                "id" => 17777,
                "app_status" => 3
            ],
            [
                "id" => 18118,
                "app_status" => 3
            ],
            [
                "id" => 18257,
                "app_status" => 3
            ],
            [
                "id" => 18331,
                "app_status" => 3
            ],
            [
                "id" => 18487,
                "app_status" => 3
            ],
            [
                "id" => 19004,
                "app_status" => 3
            ],
            [
                "id" => 19082,
                "app_status" => 3
            ],
            [
                "id" => 19491,
                "app_status" => 3
            ],
            [
                "id" => 19712,
                "app_status" => 3
            ],
            [
                "id" => 19727,
                "app_status" => 3
            ],
            [
                "id" => 19735,
                "app_status" => 3
            ],
            [
                "id" => 19781,
                "app_status" => 3
            ],
            [
                "id" => 19957,
                "app_status" => 3
            ],
            [
                "id" => 20208,
                "app_status" => 3
            ],
            [
                "id" => 20614,
                "app_status" => 3
            ],
            [
                "id" => 20622,
                "app_status" => 3
            ],
            [
                "id" => 20652,
                "app_status" => 3
            ],
            [
                "id" => 20760,
                "app_status" => 3
            ],
            [
                "id" => 20790,
                "app_status" => 3
            ],
            [
                "id" => 20831,
                "app_status" => 3
            ],
            [
                "id" => 20923,
                "app_status" => 3
            ],
            [
                "id" => 21010,
                "app_status" => 3
            ],
            [
                "id" => 21100,
                "app_status" => 3
            ],
            [
                "id" => 21223,
                "app_status" => 3
            ],
            [
                "id" => 21247,
                "app_status" => 3
            ],
            [
                "id" => 21288,
                "app_status" => 3
            ],
            [
                "id" => 21352,
                "app_status" => 3
            ],
            [
                "id" => 21358,
                "app_status" => 3
            ],
            [
                "id" => 22655,
                "app_status" => 3
            ],
            [
                "id" => 22968,
                "app_status" => 3
            ],
            [
                "id" => 23097,
                "app_status" => 3
            ],
            [
                "id" => 23230,
                "app_status" => 3
            ],
            [
                "id" => 23302,
                "app_status" => 3
            ],
            [
                "id" => 23312,
                "app_status" => 3
            ],
            [
                "id" => 23319,
                "app_status" => 3
            ],
            [
                "id" => 23392,
                "app_status" => 3
            ],
            [
                "id" => 23422,
                "app_status" => 3
            ],
            [
                "id" => 23579,
                "app_status" => 3
            ],
            [
                "id" => 23635,
                "app_status" => 3
            ],
            [
                "id" => 23766,
                "app_status" => 3
            ],
            [
                "id" => 23806,
                "app_status" => 3
            ],
            [
                "id" => 23822,
                "app_status" => 3
            ],
            [
                "id" => 23858,
                "app_status" => 3
            ],
            [
                "id" => 23880,
                "app_status" => 3
            ],
            [
                "id" => 23889,
                "app_status" => 3
            ],
            [
                "id" => 23907,
                "app_status" => 3
            ],
            [
                "id" => 23913,
                "app_status" => 3
            ],
            [
                "id" => 23922,
                "app_status" => 3
            ],
            [
                "id" => 23954,
                "app_status" => 3
            ],
            [
                "id" => 23989,
                "app_status" => 3
            ],
            [
                "id" => 24059,
                "app_status" => 3
            ],
            [
                "id" => 24126,
                "app_status" => 3
            ],
            [
                "id" => 24192,
                "app_status" => 3
            ],
            [
                "id" => 24211,
                "app_status" => 3
            ],
            [
                "id" => 24263,
                "app_status" => 3
            ],
            [
                "id" => 24280,
                "app_status" => 3
            ],
            [
                "id" => 24391,
                "app_status" => 3
            ],
            [
                "id" => 24526,
                "app_status" => 3
            ],
            [
                "id" => 24533,
                "app_status" => 3
            ],
            [
                "id" => 24741,
                "app_status" => 3
            ],
            [
                "id" => 24783,
                "app_status" => 3
            ],
            [
                "id" => 24787,
                "app_status" => 3
            ],
            [
                "id" => 24842,
                "app_status" => 3
            ],
            [
                "id" => 24900,
                "app_status" => 3
            ],
            [
                "id" => 24933,
                "app_status" => 3
            ],
            [
                "id" => 24973,
                "app_status" => 3
            ],
            [
                "id" => 25026,
                "app_status" => 3
            ],
            [
                "id" => 25059,
                "app_status" => 3
            ],
            [
                "id" => 25247,
                "app_status" => 3
            ],
            [
                "id" => 25267,
                "app_status" => 3
            ],
            [
                "id" => 25333,
                "app_status" => 3
            ],
            [
                "id" => 25386,
                "app_status" => 3
            ],
            [
                "id" => 25425,
                "app_status" => 3
            ],
            [
                "id" => 25436,
                "app_status" => 3
            ],
            [
                "id" => 25544,
                "app_status" => 3
            ],
            [
                "id" => 25563,
                "app_status" => 3
            ],
            [
                "id" => 25564,
                "app_status" => 3
            ],
            [
                "id" => 25598,
                "app_status" => 3
            ],
            [
                "id" => 25617,
                "app_status" => 3
            ],
            [
                "id" => 25702,
                "app_status" => 3
            ],
            [
                "id" => 25704,
                "app_status" => 3
            ],
            [
                "id" => 26026,
                "app_status" => 3
            ],
            [
                "id" => 26047,
                "app_status" => 3
            ],
            [
                "id" => 26131,
                "app_status" => 3
            ],
            [
                "id" => 26197,
                "app_status" => 3
            ],
            [
                "id" => 26219,
                "app_status" => 3
            ],
            [
                "id" => 26241,
                "app_status" => 3
            ],
            [
                "id" => 26308,
                "app_status" => 3
            ],
            [
                "id" => 26375,
                "app_status" => 3
            ],
            [
                "id" => 26392,
                "app_status" => 3
            ],
            [
                "id" => 26415,
                "app_status" => 3
            ],
            [
                "id" => 26442,
                "app_status" => 3
            ],
            [
                "id" => 26593,
                "app_status" => 3
            ],
            [
                "id" => 26604,
                "app_status" => 3
            ],
            [
                "id" => 26630,
                "app_status" => 3
            ],
            [
                "id" => 26631,
                "app_status" => 3
            ],
            [
                "id" => 26636,
                "app_status" => 3
            ],
            [
                "id" => 26663,
                "app_status" => 3
            ],
            [
                "id" => 26714,
                "app_status" => 3
            ],
            [
                "id" => 26718,
                "app_status" => 3
            ],
            [
                "id" => 26721,
                "app_status" => 3
            ],
            [
                "id" => 26729,
                "app_status" => 3
            ],
            [
                "id" => 26789,
                "app_status" => 3
            ],
            [
                "id" => 26812,
                "app_status" => 3
            ],
            [
                "id" => 26866,
                "app_status" => 3
            ],
            [
                "id" => 26877,
                "app_status" => 3
            ],
            [
                "id" => 26913,
                "app_status" => 3
            ],
            [
                "id" => 26918,
                "app_status" => 3
            ],
            [
                "id" => 26969,
                "app_status" => 3
            ],
            [
                "id" => 27020,
                "app_status" => 3
            ],
            [
                "id" => 27025,
                "app_status" => 3
            ],
            [
                "id" => 27040,
                "app_status" => 3
            ],
            [
                "id" => 27052,
                "app_status" => 3
            ],
            [
                "id" => 27068,
                "app_status" => 3
            ],
            [
                "id" => 27070,
                "app_status" => 3
            ],
            [
                "id" => 27093,
                "app_status" => 3
            ],
            [
                "id" => 27101,
                "app_status" => 3
            ],
            [
                "id" => 27111,
                "app_status" => 3
            ],
            [
                "id" => 27130,
                "app_status" => 3
            ],
            [
                "id" => 27139,
                "app_status" => 3
            ],
            [
                "id" => 27141,
                "app_status" => 3
            ],
            [
                "id" => 27152,
                "app_status" => 3
            ],
            [
                "id" => 27163,
                "app_status" => 3
            ],
            [
                "id" => 27165,
                "app_status" => 3
            ],
            [
                "id" => 27172,
                "app_status" => 3
            ],
            [
                "id" => 27174,
                "app_status" => 3
            ],
            [
                "id" => 27181,
                "app_status" => 3
            ],
            [
                "id" => 27192,
                "app_status" => 3
            ],
            [
                "id" => 27207,
                "app_status" => 3
            ],
            [
                "id" => 27217,
                "app_status" => 3
            ],
            [
                "id" => 27223,
                "app_status" => 3
            ],
            [
                "id" => 27228,
                "app_status" => 3
            ],
            [
                "id" => 27230,
                "app_status" => 3
            ],
            [
                "id" => 27238,
                "app_status" => 3
            ],
            [
                "id" => 27243,
                "app_status" => 3
            ],
            [
                "id" => 27254,
                "app_status" => 3
            ],
            [
                "id" => 27266,
                "app_status" => 3
            ],
            [
                "id" => 27267,
                "app_status" => 3
            ],
            [
                "id" => 27270,
                "app_status" => 3
            ],
            [
                "id" => 27283,
                "app_status" => 3
            ],
            [
                "id" => 27284,
                "app_status" => 3
            ],
            [
                "id" => 27289,
                "app_status" => 3
            ],
            [
                "id" => 27292,
                "app_status" => 3
            ],
            [
                "id" => 27297,
                "app_status" => 3
            ],
            [
                "id" => 27300,
                "app_status" => 3
            ],
            [
                "id" => 27302,
                "app_status" => 3
            ],
            [
                "id" => 27304,
                "app_status" => 3
            ],
            [
                "id" => 27305,
                "app_status" => 3
            ],
            [
                "id" => 27312,
                "app_status" => 3
            ],
            [
                "id" => 27313,
                "app_status" => 3
            ],
            [
                "id" => 27314,
                "app_status" => 3
            ],
            [
                "id" => 27316,
                "app_status" => 3
            ],
            [
                "id" => 27354,
                "app_status" => 3
            ],
            [
                "id" => 27355,
                "app_status" => 3
            ],
            [
                "id" => 27359,
                "app_status" => 3
            ],
            [
                "id" => 27362,
                "app_status" => 3
            ],
            [
                "id" => 27363,
                "app_status" => 3
            ],
            [
                "id" => 27366,
                "app_status" => 3
            ],
            [
                "id" => 27368,
                "app_status" => 3
            ],
            [
                "id" => 27373,
                "app_status" => 3
            ],
            [
                "id" => 27376,
                "app_status" => 3
            ],
            [
                "id" => 27377,
                "app_status" => 3
            ],
            [
                "id" => 27383,
                "app_status" => 3
            ],
            [
                "id" => 27385,
                "app_status" => 3
            ],
            [
                "id" => 27389,
                "app_status" => 3
            ],
            [
                "id" => 27391,
                "app_status" => 3
            ],
            [
                "id" => 27394,
                "app_status" => 3
            ],
            [
                "id" => 27397,
                "app_status" => 3
            ],
            [
                "id" => 27402,
                "app_status" => 3
            ],
            [
                "id" => 27408,
                "app_status" => 3
            ],
            [
                "id" => 27410,
                "app_status" => 3
            ],
            [
                "id" => 27411,
                "app_status" => 3
            ],
            [
                "id" => 27421,
                "app_status" => 3
            ],
            [
                "id" => 27426,
                "app_status" => 3
            ],
            [
                "id" => 27427,
                "app_status" => 3
            ],
            [
                "id" => 27429,
                "app_status" => 3
            ],
            [
                "id" => 27430,
                "app_status" => 3
            ],
            [
                "id" => 27433,
                "app_status" => 3
            ],
            [
                "id" => 27435,
                "app_status" => 3
            ],
            [
                "id" => 27436,
                "app_status" => 3
            ],
            [
                "id" => 27440,
                "app_status" => 3
            ],
            [
                "id" => 27444,
                "app_status" => 3
            ],
            [
                "id" => 27446,
                "app_status" => 3
            ],
            [
                "id" => 27447,
                "app_status" => 3
            ],
            [
                "id" => 27448,
                "app_status" => 3
            ],
            [
                "id" => 27449,
                "app_status" => 3
            ],
            [
                "id" => 27464,
                "app_status" => 3
            ],
            [
                "id" => 27468,
                "app_status" => 3
            ],
            [
                "id" => 27470,
                "app_status" => 3
            ],
            [
                "id" => 27475,
                "app_status" => 3
            ],
            [
                "id" => 27481,
                "app_status" => 3
            ],
            [
                "id" => 27483,
                "app_status" => 3
            ],
            [
                "id" => 27484,
                "app_status" => 3
            ],
            [
                "id" => 27488,
                "app_status" => 3
            ],
            [
                "id" => 27492,
                "app_status" => 3
            ],
            [
                "id" => 27494,
                "app_status" => 3
            ],
            [
                "id" => 27501,
                "app_status" => 3
            ],
            [
                "id" => 27505,
                "app_status" => 3
            ],
            [
                "id" => 27510,
                "app_status" => 3
            ],
            [
                "id" => 27514,
                "app_status" => 3
            ],
            [
                "id" => 27516,
                "app_status" => 3
            ],
            [
                "id" => 27517,
                "app_status" => 3
            ],
            [
                "id" => 27518,
                "app_status" => 3
            ],
            [
                "id" => 27524,
                "app_status" => 3
            ],
            [
                "id" => 27527,
                "app_status" => 3
            ],
            [
                "id" => 27533,
                "app_status" => 3
            ],
            [
                "id" => 27537,
                "app_status" => 3
            ],
            [
                "id" => 27544,
                "app_status" => 3
            ],
            [
                "id" => 27545,
                "app_status" => 3
            ],
            [
                "id" => 27550,
                "app_status" => 3
            ],
            [
                "id" => 27552,
                "app_status" => 3
            ],
            [
                "id" => 27555,
                "app_status" => 3
            ],
            [
                "id" => 27562,
                "app_status" => 3
            ],
            [
                "id" => 27563,
                "app_status" => 3
            ],
            [
                "id" => 27569,
                "app_status" => 3
            ],
            [
                "id" => 27578,
                "app_status" => 3
            ],
            [
                "id" => 27579,
                "app_status" => 3
            ],
            [
                "id" => 27580,
                "app_status" => 3
            ],
            [
                "id" => 27588,
                "app_status" => 3
            ],
            [
                "id" => 27589,
                "app_status" => 3
            ],
            [
                "id" => 27590,
                "app_status" => 3
            ],
            [
                "id" => 27595,
                "app_status" => 3
            ],
            [
                "id" => 27598,
                "app_status" => 3
            ],
            [
                "id" => 27604,
                "app_status" => 3
            ],
            [
                "id" => 27607,
                "app_status" => 3
            ],
            [
                "id" => 27615,
                "app_status" => 3
            ],
            [
                "id" => 27617,
                "app_status" => 3
            ],
            [
                "id" => 27618,
                "app_status" => 3
            ],
            [
                "id" => 27621,
                "app_status" => 3
            ],
            [
                "id" => 27622,
                "app_status" => 3
            ],
            [
                "id" => 27626,
                "app_status" => 3
            ],
            [
                "id" => 27631,
                "app_status" => 3
            ],
            [
                "id" => 27633,
                "app_status" => 3
            ],
            [
                "id" => 27638,
                "app_status" => 3
            ],
            [
                "id" => 27640,
                "app_status" => 3
            ],
            [
                "id" => 27644,
                "app_status" => 3
            ],
            [
                "id" => 27645,
                "app_status" => 3
            ],
            [
                "id" => 27652,
                "app_status" => 3
            ],
            [
                "id" => 27656,
                "app_status" => 3
            ],
            [
                "id" => 27657,
                "app_status" => 3
            ],
            [
                "id" => 27659,
                "app_status" => 3
            ],
            [
                "id" => 27662,
                "app_status" => 3
            ],
            [
                "id" => 27668,
                "app_status" => 3
            ],
            [
                "id" => 27669,
                "app_status" => 3
            ],
            [
                "id" => 27670,
                "app_status" => 3
            ],
            [
                "id" => 27674,
                "app_status" => 3
            ],
            [
                "id" => 27676,
                "app_status" => 3
            ],
            [
                "id" => 27678,
                "app_status" => 3
            ],
            [
                "id" => 27684,
                "app_status" => 3
            ],
            [
                "id" => 27689,
                "app_status" => 3
            ],
            [
                "id" => 27690,
                "app_status" => 3
            ],
            [
                "id" => 27693,
                "app_status" => 3
            ],
            [
                "id" => 27699,
                "app_status" => 3
            ],
            [
                "id" => 27704,
                "app_status" => 3
            ],
            [
                "id" => 27705,
                "app_status" => 3
            ],
            [
                "id" => 27708,
                "app_status" => 3
            ],
            [
                "id" => 27711,
                "app_status" => 3
            ],
            [
                "id" => 27714,
                "app_status" => 3
            ],
            [
                "id" => 27715,
                "app_status" => 3
            ],
            [
                "id" => 27718,
                "app_status" => 3
            ],
            [
                "id" => 27723,
                "app_status" => 3
            ],
            [
                "id" => 27727,
                "app_status" => 3
            ],
            [
                "id" => 27729,
                "app_status" => 3
            ],
            [
                "id" => 27732,
                "app_status" => 3
            ],
            [
                "id" => 27733,
                "app_status" => 3
            ],
            [
                "id" => 27735,
                "app_status" => 3
            ],
            [
                "id" => 27743,
                "app_status" => 3
            ],
            [
                "id" => 27744,
                "app_status" => 3
            ],
            [
                "id" => 27745,
                "app_status" => 3
            ],
            [
                "id" => 27746,
                "app_status" => 3
            ],
            [
                "id" => 27752,
                "app_status" => 3
            ],
            [
                "id" => 27755,
                "app_status" => 3
            ],
            [
                "id" => 27763,
                "app_status" => 3
            ],
            [
                "id" => 27765,
                "app_status" => 3
            ],
            [
                "id" => 27768,
                "app_status" => 3
            ],
            [
                "id" => 27769,
                "app_status" => 3
            ],
            [
                "id" => 27773,
                "app_status" => 3
            ],
            [
                "id" => 27780,
                "app_status" => 3
            ],
            [
                "id" => 27781,
                "app_status" => 3
            ],
            [
                "id" => 27782,
                "app_status" => 3
            ],
            [
                "id" => 27783,
                "app_status" => 3
            ],
            [
                "id" => 27784,
                "app_status" => 3
            ],
            [
                "id" => 27788,
                "app_status" => 3
            ],
            [
                "id" => 27792,
                "app_status" => 3
            ],
            [
                "id" => 27800,
                "app_status" => 3
            ],
            [
                "id" => 27801,
                "app_status" => 3
            ],
            [
                "id" => 27803,
                "app_status" => 3
            ],
            [
                "id" => 27805,
                "app_status" => 3
            ],
            [
                "id" => 27814,
                "app_status" => 3
            ],
            [
                "id" => 27818,
                "app_status" => 3
            ],
            [
                "id" => 27826,
                "app_status" => 3
            ],
            [
                "id" => 27832,
                "app_status" => 3
            ],
            [
                "id" => 27836,
                "app_status" => 3
            ],
            [
                "id" => 27838,
                "app_status" => 3
            ],
            [
                "id" => 27839,
                "app_status" => 3
            ],
            [
                "id" => 27840,
                "app_status" => 3
            ],
            [
                "id" => 27841,
                "app_status" => 3
            ],
            [
                "id" => 27843,
                "app_status" => 3
            ],
            [
                "id" => 27851,
                "app_status" => 3
            ],
            [
                "id" => 27856,
                "app_status" => 3
            ],
            [
                "id" => 27859,
                "app_status" => 3
            ],
            [
                "id" => 27863,
                "app_status" => 3
            ],
            [
                "id" => 27866,
                "app_status" => 3
            ],
            [
                "id" => 27868,
                "app_status" => 3
            ],
            [
                "id" => 27869,
                "app_status" => 3
            ],
            [
                "id" => 27870,
                "app_status" => 3
            ],
            [
                "id" => 27881,
                "app_status" => 3
            ],
            [
                "id" => 27882,
                "app_status" => 3
            ],
            [
                "id" => 27885,
                "app_status" => 3
            ],
            [
                "id" => 27889,
                "app_status" => 3
            ],
            [
                "id" => 27892,
                "app_status" => 3
            ],
            [
                "id" => 27896,
                "app_status" => 3
            ],
            [
                "id" => 27899,
                "app_status" => 3
            ],
            [
                "id" => 27903,
                "app_status" => 3
            ],
            [
                "id" => 27904,
                "app_status" => 3
            ],
            [
                "id" => 27905,
                "app_status" => 3
            ],
            [
                "id" => 27906,
                "app_status" => 3
            ],
            [
                "id" => 27914,
                "app_status" => 3
            ],
            [
                "id" => 27915,
                "app_status" => 3
            ],
            [
                "id" => 27921,
                "app_status" => 3
            ],
            [
                "id" => 27924,
                "app_status" => 3
            ],
            [
                "id" => 27936,
                "app_status" => 3
            ],
            [
                "id" => 27937,
                "app_status" => 3
            ],
            [
                "id" => 27945,
                "app_status" => 3
            ],
            [
                "id" => 27946,
                "app_status" => 3
            ],
            [
                "id" => 27947,
                "app_status" => 3
            ],
            [
                "id" => 27957,
                "app_status" => 3
            ],
            [
                "id" => 27959,
                "app_status" => 3
            ],
            [
                "id" => 27960,
                "app_status" => 3
            ],
            [
                "id" => 27964,
                "app_status" => 3
            ],
            [
                "id" => 27966,
                "app_status" => 3
            ],
            [
                "id" => 27968,
                "app_status" => 3
            ],
            [
                "id" => 27971,
                "app_status" => 3
            ],
            [
                "id" => 27978,
                "app_status" => 3
            ],
            [
                "id" => 27989,
                "app_status" => 3
            ],
            [
                "id" => 27990,
                "app_status" => 3
            ],
            [
                "id" => 27995,
                "app_status" => 3
            ],
            [
                "id" => 27996,
                "app_status" => 3
            ],
            [
                "id" => 27998,
                "app_status" => 3
            ],
            [
                "id" => 28000,
                "app_status" => 3
            ],
            [
                "id" => 28001,
                "app_status" => 3
            ],
            [
                "id" => 28004,
                "app_status" => 3
            ],
            [
                "id" => 28010,
                "app_status" => 3
            ],
            [
                "id" => 28015,
                "app_status" => 3
            ],
            [
                "id" => 28019,
                "app_status" => 3
            ],
            [
                "id" => 28022,
                "app_status" => 3
            ],
            [
                "id" => 28025,
                "app_status" => 3
            ],
            [
                "id" => 28027,
                "app_status" => 3
            ],
            [
                "id" => 28028,
                "app_status" => 3
            ],
            [
                "id" => 28030,
                "app_status" => 3
            ],
            [
                "id" => 28031,
                "app_status" => 3
            ],
            [
                "id" => 28032,
                "app_status" => 3
            ],
            [
                "id" => 28037,
                "app_status" => 3
            ],
            [
                "id" => 28039,
                "app_status" => 3
            ],
            [
                "id" => 28043,
                "app_status" => 3
            ],
            [
                "id" => 28046,
                "app_status" => 3
            ],
            [
                "id" => 28054,
                "app_status" => 3
            ],
            [
                "id" => 28058,
                "app_status" => 3
            ],
            [
                "id" => 28064,
                "app_status" => 3
            ],
            [
                "id" => 28071,
                "app_status" => 3
            ],
            [
                "id" => 28073,
                "app_status" => 3
            ],
            [
                "id" => 28076,
                "app_status" => 3
            ],
            [
                "id" => 28078,
                "app_status" => 3
            ],
            [
                "id" => 28080,
                "app_status" => 3
            ],
            [
                "id" => 28081,
                "app_status" => 3
            ],
            [
                "id" => 28084,
                "app_status" => 3
            ],
            [
                "id" => 28086,
                "app_status" => 3
            ],
            [
                "id" => 28087,
                "app_status" => 3
            ],
            [
                "id" => 28088,
                "app_status" => 3
            ],
            [
                "id" => 28093,
                "app_status" => 3
            ],
            [
                "id" => 28094,
                "app_status" => 3
            ],
            [
                "id" => 28098,
                "app_status" => 3
            ],
            [
                "id" => 28102,
                "app_status" => 3
            ],
            [
                "id" => 28103,
                "app_status" => 3
            ],
            [
                "id" => 28104,
                "app_status" => 3
            ],
            [
                "id" => 28112,
                "app_status" => 3
            ],
            [
                "id" => 28116,
                "app_status" => 3
            ],
            [
                "id" => 28118,
                "app_status" => 3
            ],
            [
                "id" => 28119,
                "app_status" => 3
            ],
            [
                "id" => 28124,
                "app_status" => 3
            ],
            [
                "id" => 28126,
                "app_status" => 3
            ],
            [
                "id" => 28127,
                "app_status" => 3
            ],
            [
                "id" => 28129,
                "app_status" => 3
            ],
            [
                "id" => 28130,
                "app_status" => 3
            ],
            [
                "id" => 28139,
                "app_status" => 3
            ],
            [
                "id" => 28143,
                "app_status" => 3
            ],
            [
                "id" => 28146,
                "app_status" => 3
            ],
            [
                "id" => 28148,
                "app_status" => 3
            ],
            [
                "id" => 28152,
                "app_status" => 3
            ],
            [
                "id" => 28154,
                "app_status" => 3
            ],
            [
                "id" => 28157,
                "app_status" => 3
            ],
            [
                "id" => 28166,
                "app_status" => 3
            ],
            [
                "id" => 28167,
                "app_status" => 3
            ],
            [
                "id" => 28169,
                "app_status" => 3
            ],
            [
                "id" => 28178,
                "app_status" => 3
            ],
            [
                "id" => 28179,
                "app_status" => 3
            ],
            [
                "id" => 28187,
                "app_status" => 3
            ],
            [
                "id" => 28193,
                "app_status" => 3
            ],
            [
                "id" => 28194,
                "app_status" => 3
            ],
            [
                "id" => 28196,
                "app_status" => 3
            ],
            [
                "id" => 28197,
                "app_status" => 3
            ],
            [
                "id" => 28201,
                "app_status" => 3
            ],
            [
                "id" => 28204,
                "app_status" => 3
            ],
            [
                "id" => 28206,
                "app_status" => 3
            ],
            [
                "id" => 28214,
                "app_status" => 3
            ],
            [
                "id" => 28215,
                "app_status" => 3
            ],
            [
                "id" => 28223,
                "app_status" => 3
            ],
            [
                "id" => 28231,
                "app_status" => 3
            ],
            [
                "id" => 28234,
                "app_status" => 3
            ],
            [
                "id" => 28235,
                "app_status" => 3
            ],
            [
                "id" => 28240,
                "app_status" => 3
            ],
            [
                "id" => 28246,
                "app_status" => 3
            ],
            [
                "id" => 28250,
                "app_status" => 3
            ],
            [
                "id" => 28252,
                "app_status" => 3
            ],
            [
                "id" => 28253,
                "app_status" => 3
            ],
            [
                "id" => 28263,
                "app_status" => 3
            ],
            [
                "id" => 28268,
                "app_status" => 3
            ],
            [
                "id" => 28279,
                "app_status" => 3
            ],
            [
                "id" => 28280,
                "app_status" => 3
            ],
            [
                "id" => 28283,
                "app_status" => 3
            ],
            [
                "id" => 28285,
                "app_status" => 3
            ],
            [
                "id" => 28287,
                "app_status" => 3
            ],
            [
                "id" => 28288,
                "app_status" => 3
            ],
            [
                "id" => 28290,
                "app_status" => 3
            ],
            [
                "id" => 28291,
                "app_status" => 3
            ],
            [
                "id" => 28292,
                "app_status" => 3
            ],
            [
                "id" => 28295,
                "app_status" => 3
            ],
            [
                "id" => 28296,
                "app_status" => 3
            ],
            [
                "id" => 28297,
                "app_status" => 3
            ],
            [
                "id" => 28301,
                "app_status" => 3
            ],
            [
                "id" => 28302,
                "app_status" => 3
            ],
            [
                "id" => 28306,
                "app_status" => 3
            ],
            [
                "id" => 28307,
                "app_status" => 3
            ],
            [
                "id" => 28312,
                "app_status" => 3
            ],
            [
                "id" => 28315,
                "app_status" => 3
            ],
            [
                "id" => 28316,
                "app_status" => 3
            ],
            [
                "id" => 28325,
                "app_status" => 3
            ],
            [
                "id" => 28332,
                "app_status" => 3
            ],
            [
                "id" => 28333,
                "app_status" => 3
            ],
            [
                "id" => 28337,
                "app_status" => 3
            ],
            [
                "id" => 28339,
                "app_status" => 3
            ],
            [
                "id" => 28341,
                "app_status" => 3
            ],
            [
                "id" => 28342,
                "app_status" => 3
            ],
            [
                "id" => 28347,
                "app_status" => 3
            ],
            [
                "id" => 28349,
                "app_status" => 3
            ],
            [
                "id" => 28350,
                "app_status" => 3
            ],
            [
                "id" => 28352,
                "app_status" => 3
            ],
            [
                "id" => 28353,
                "app_status" => 3
            ],
            [
                "id" => 28354,
                "app_status" => 3
            ],
            [
                "id" => 28359,
                "app_status" => 3
            ],
            [
                "id" => 28363,
                "app_status" => 3
            ],
            [
                "id" => 28369,
                "app_status" => 3
            ],
            [
                "id" => 28370,
                "app_status" => 3
            ],
            [
                "id" => 28374,
                "app_status" => 3
            ],
            [
                "id" => 28377,
                "app_status" => 3
            ],
            [
                "id" => 28379,
                "app_status" => 3
            ],
            [
                "id" => 28380,
                "app_status" => 3
            ],
            [
                "id" => 28383,
                "app_status" => 3
            ],
            [
                "id" => 28391,
                "app_status" => 3
            ],
            [
                "id" => 28393,
                "app_status" => 3
            ],
            [
                "id" => 28394,
                "app_status" => 3
            ],
            [
                "id" => 28398,
                "app_status" => 3
            ],
            [
                "id" => 28399,
                "app_status" => 3
            ],
            [
                "id" => 28400,
                "app_status" => 3
            ],
            [
                "id" => 28404,
                "app_status" => 3
            ],
            [
                "id" => 28405,
                "app_status" => 3
            ],
            [
                "id" => 28410,
                "app_status" => 3
            ],
            [
                "id" => 28411,
                "app_status" => 3
            ],
            [
                "id" => 28412,
                "app_status" => 3
            ],
            [
                "id" => 28416,
                "app_status" => 3
            ],
            [
                "id" => 28417,
                "app_status" => 3
            ],
            [
                "id" => 28418,
                "app_status" => 3
            ],
            [
                "id" => 28422,
                "app_status" => 3
            ],
            [
                "id" => 28423,
                "app_status" => 3
            ],
            [
                "id" => 28424,
                "app_status" => 3
            ],
            [
                "id" => 28425,
                "app_status" => 3
            ],
            [
                "id" => 28427,
                "app_status" => 3
            ],
            [
                "id" => 28428,
                "app_status" => 3
            ],
            [
                "id" => 28429,
                "app_status" => 3
            ],
            [
                "id" => 28446,
                "app_status" => 3
            ],
            [
                "id" => 28452,
                "app_status" => 3
            ],
            [
                "id" => 28461,
                "app_status" => 3
            ],
            [
                "id" => 28463,
                "app_status" => 3
            ],
            [
                "id" => 28464,
                "app_status" => 3
            ],
            [
                "id" => 28469,
                "app_status" => 3
            ],
            [
                "id" => 28472,
                "app_status" => 3
            ],
            [
                "id" => 28478,
                "app_status" => 3
            ],
            [
                "id" => 28479,
                "app_status" => 3
            ],
            [
                "id" => 28480,
                "app_status" => 3
            ],
            [
                "id" => 28483,
                "app_status" => 3
            ],
            [
                "id" => 28485,
                "app_status" => 3
            ],
            [
                "id" => 28486,
                "app_status" => 3
            ],
            [
                "id" => 28490,
                "app_status" => 3
            ],
            [
                "id" => 28491,
                "app_status" => 3
            ],
            [
                "id" => 28492,
                "app_status" => 3
            ],
            [
                "id" => 28493,
                "app_status" => 3
            ],
            [
                "id" => 28496,
                "app_status" => 3
            ],
            [
                "id" => 28498,
                "app_status" => 3
            ],
            [
                "id" => 28501,
                "app_status" => 3
            ],
            [
                "id" => 28502,
                "app_status" => 3
            ],
            [
                "id" => 28505,
                "app_status" => 3
            ],
            [
                "id" => 28508,
                "app_status" => 3
            ],
            [
                "id" => 28528,
                "app_status" => 3
            ],
            [
                "id" => 28534,
                "app_status" => 3
            ],
            [
                "id" => 28542,
                "app_status" => 3
            ],
            [
                "id" => 28543,
                "app_status" => 3
            ],
            [
                "id" => 28544,
                "app_status" => 3
            ],
            [
                "id" => 28546,
                "app_status" => 3
            ],
            [
                "id" => 28548,
                "app_status" => 3
            ],
            [
                "id" => 28549,
                "app_status" => 3
            ],
            [
                "id" => 28552,
                "app_status" => 3
            ],
            [
                "id" => 28553,
                "app_status" => 3
            ],
            [
                "id" => 28555,
                "app_status" => 3
            ],
            [
                "id" => 28556,
                "app_status" => 3
            ],
            [
                "id" => 28560,
                "app_status" => 3
            ],
            [
                "id" => 28561,
                "app_status" => 3
            ],
            [
                "id" => 28563,
                "app_status" => 3
            ],
            [
                "id" => 28564,
                "app_status" => 3
            ],
            [
                "id" => 28565,
                "app_status" => 3
            ],
            [
                "id" => 28566,
                "app_status" => 3
            ],
            [
                "id" => 28568,
                "app_status" => 3
            ],
            [
                "id" => 28569,
                "app_status" => 3
            ],
            [
                "id" => 28570,
                "app_status" => 3
            ],
            [
                "id" => 28571,
                "app_status" => 3
            ],
            [
                "id" => 28573,
                "app_status" => 3
            ],
            [
                "id" => 28574,
                "app_status" => 3
            ],
            [
                "id" => 28576,
                "app_status" => 3
            ],
            [
                "id" => 28578,
                "app_status" => 3
            ],
            [
                "id" => 28580,
                "app_status" => 3
            ],
            [
                "id" => 28581,
                "app_status" => 3
            ],
            [
                "id" => 28583,
                "app_status" => 3
            ],
            [
                "id" => 28584,
                "app_status" => 3
            ],
            [
                "id" => 28585,
                "app_status" => 3
            ],
            [
                "id" => 28586,
                "app_status" => 3
            ],
            [
                "id" => 28590,
                "app_status" => 3
            ],
            [
                "id" => 28591,
                "app_status" => 3
            ],
            [
                "id" => 28592,
                "app_status" => 3
            ],
            [
                "id" => 28593,
                "app_status" => 3
            ],
            [
                "id" => 28594,
                "app_status" => 3
            ],
            [
                "id" => 28597,
                "app_status" => 3
            ],
            [
                "id" => 28600,
                "app_status" => 3
            ],
            [
                "id" => 28602,
                "app_status" => 3
            ],
            [
                "id" => 28608,
                "app_status" => 3
            ],
            [
                "id" => 28611,
                "app_status" => 3
            ],
            [
                "id" => 28619,
                "app_status" => 3
            ],
            [
                "id" => 28621,
                "app_status" => 3
            ],
            [
                "id" => 28623,
                "app_status" => 3
            ],
            [
                "id" => 28627,
                "app_status" => 3
            ],
            [
                "id" => 28630,
                "app_status" => 3
            ],
            [
                "id" => 28632,
                "app_status" => 3
            ],
            [
                "id" => 28633,
                "app_status" => 3
            ],
            [
                "id" => 28637,
                "app_status" => 3
            ],
            [
                "id" => 28640,
                "app_status" => 3
            ],
            [
                "id" => 28641,
                "app_status" => 3
            ],
            [
                "id" => 28643,
                "app_status" => 3
            ],
            [
                "id" => 28644,
                "app_status" => 3
            ],
            [
                "id" => 28646,
                "app_status" => 3
            ],
            [
                "id" => 28647,
                "app_status" => 3
            ],
            [
                "id" => 28649,
                "app_status" => 3
            ],
            [
                "id" => 28652,
                "app_status" => 3
            ],
            [
                "id" => 28654,
                "app_status" => 3
            ],
            [
                "id" => 28656,
                "app_status" => 3
            ],
            [
                "id" => 28659,
                "app_status" => 3
            ],
            [
                "id" => 28662,
                "app_status" => 3
            ],
            [
                "id" => 28669,
                "app_status" => 3
            ],
            [
                "id" => 28673,
                "app_status" => 3
            ],
            [
                "id" => 28674,
                "app_status" => 3
            ],
            [
                "id" => 28678,
                "app_status" => 3
            ],
            [
                "id" => 28679,
                "app_status" => 3
            ],
            [
                "id" => 28686,
                "app_status" => 3
            ],
            [
                "id" => 28688,
                "app_status" => 3
            ],
            [
                "id" => 28690,
                "app_status" => 3
            ],
            [
                "id" => 28693,
                "app_status" => 3
            ],
            [
                "id" => 28698,
                "app_status" => 3
            ],
            [
                "id" => 28699,
                "app_status" => 3
            ],
            [
                "id" => 28702,
                "app_status" => 3
            ],
            [
                "id" => 28703,
                "app_status" => 3
            ],
            [
                "id" => 28707,
                "app_status" => 3
            ],
            [
                "id" => 28708,
                "app_status" => 3
            ],
            [
                "id" => 28709,
                "app_status" => 3
            ],
            [
                "id" => 28711,
                "app_status" => 3
            ],
            [
                "id" => 28713,
                "app_status" => 3
            ],
            [
                "id" => 28714,
                "app_status" => 3
            ],
            [
                "id" => 28715,
                "app_status" => 3
            ],
            [
                "id" => 28716,
                "app_status" => 3
            ],
            [
                "id" => 28717,
                "app_status" => 3
            ],
            [
                "id" => 28725,
                "app_status" => 3
            ],
            [
                "id" => 28726,
                "app_status" => 3
            ],
            [
                "id" => 28730,
                "app_status" => 3
            ],
            [
                "id" => 28732,
                "app_status" => 3
            ],
            [
                "id" => 28733,
                "app_status" => 3
            ],
            [
                "id" => 28734,
                "app_status" => 3
            ],
            [
                "id" => 28736,
                "app_status" => 3
            ],
            [
                "id" => 28740,
                "app_status" => 3
            ],
            [
                "id" => 28742,
                "app_status" => 3
            ],
            [
                "id" => 28747,
                "app_status" => 3
            ],
            [
                "id" => 28748,
                "app_status" => 3
            ],
            [
                "id" => 28751,
                "app_status" => 3
            ],
            [
                "id" => 28755,
                "app_status" => 3
            ],
            [
                "id" => 28757,
                "app_status" => 3
            ],
            [
                "id" => 28773,
                "app_status" => 3
            ],
            [
                "id" => 28775,
                "app_status" => 3
            ],
            [
                "id" => 28778,
                "app_status" => 3
            ],
            [
                "id" => 28791,
                "app_status" => 3
            ],
            [
                "id" => 28792,
                "app_status" => 3
            ],
            [
                "id" => 28793,
                "app_status" => 3
            ],
            [
                "id" => 28794,
                "app_status" => 3
            ],
            [
                "id" => 28800,
                "app_status" => 3
            ],
            [
                "id" => 28803,
                "app_status" => 3
            ],
            [
                "id" => 28806,
                "app_status" => 3
            ],
            [
                "id" => 28814,
                "app_status" => 3
            ],
            [
                "id" => 28815,
                "app_status" => 3
            ],
            [
                "id" => 28816,
                "app_status" => 3
            ],
            [
                "id" => 28817,
                "app_status" => 3
            ],
            [
                "id" => 28819,
                "app_status" => 3
            ],
            [
                "id" => 28823,
                "app_status" => 3
            ],
            [
                "id" => 28825,
                "app_status" => 3
            ],
            [
                "id" => 28827,
                "app_status" => 3
            ],
            [
                "id" => 28829,
                "app_status" => 3
            ],
            [
                "id" => 28831,
                "app_status" => 3
            ],
            [
                "id" => 28844,
                "app_status" => 3
            ],
            [
                "id" => 28845,
                "app_status" => 3
            ],
            [
                "id" => 28846,
                "app_status" => 3
            ],
            [
                "id" => 28849,
                "app_status" => 3
            ],
            [
                "id" => 28850,
                "app_status" => 3
            ],
            [
                "id" => 28851,
                "app_status" => 3
            ],
            [
                "id" => 28856,
                "app_status" => 3
            ],
            [
                "id" => 28873,
                "app_status" => 3
            ],
            [
                "id" => 28876,
                "app_status" => 3
            ],
            [
                "id" => 28878,
                "app_status" => 3
            ],
            [
                "id" => 28879,
                "app_status" => 3
            ],
            [
                "id" => 28880,
                "app_status" => 3
            ],
            [
                "id" => 28891,
                "app_status" => 3
            ],
            [
                "id" => 28895,
                "app_status" => 3
            ],
            [
                "id" => 28898,
                "app_status" => 3
            ],
            [
                "id" => 28900,
                "app_status" => 3
            ],
            [
                "id" => 28904,
                "app_status" => 3
            ],
            [
                "id" => 28905,
                "app_status" => 3
            ],
            [
                "id" => 28907,
                "app_status" => 3
            ],
            [
                "id" => 28912,
                "app_status" => 3
            ],
            [
                "id" => 28917,
                "app_status" => 3
            ],
            [
                "id" => 28919,
                "app_status" => 3
            ],
            [
                "id" => 28920,
                "app_status" => 3
            ],
            [
                "id" => 28924,
                "app_status" => 3
            ],
            [
                "id" => 28927,
                "app_status" => 3
            ],
            [
                "id" => 28928,
                "app_status" => 3
            ],
            [
                "id" => 28931,
                "app_status" => 3
            ],
            [
                "id" => 28934,
                "app_status" => 3
            ],
            [
                "id" => 28936,
                "app_status" => 3
            ],
            [
                "id" => 28939,
                "app_status" => 3
            ],
            [
                "id" => 28940,
                "app_status" => 3
            ],
            [
                "id" => 28941,
                "app_status" => 3
            ],
            [
                "id" => 28942,
                "app_status" => 3
            ],
            [
                "id" => 28943,
                "app_status" => 3
            ],
            [
                "id" => 28946,
                "app_status" => 3
            ],
            [
                "id" => 28951,
                "app_status" => 3
            ],
            [
                "id" => 28962,
                "app_status" => 3
            ],
            [
                "id" => 28965,
                "app_status" => 3
            ],
            [
                "id" => 28966,
                "app_status" => 3
            ],
            [
                "id" => 28967,
                "app_status" => 3
            ],
            [
                "id" => 28971,
                "app_status" => 3
            ],
            [
                "id" => 28972,
                "app_status" => 3
            ],
            [
                "id" => 28974,
                "app_status" => 3
            ],
            [
                "id" => 28976,
                "app_status" => 3
            ],
            [
                "id" => 28981,
                "app_status" => 3
            ],
            [
                "id" => 28983,
                "app_status" => 3
            ],
            [
                "id" => 28985,
                "app_status" => 3
            ],
            [
                "id" => 28988,
                "app_status" => 3
            ],
            [
                "id" => 28997,
                "app_status" => 3
            ],
            [
                "id" => 29000,
                "app_status" => 3
            ],
            [
                "id" => 29002,
                "app_status" => 3
            ],
            [
                "id" => 29003,
                "app_status" => 3
            ],
            [
                "id" => 29005,
                "app_status" => 3
            ],
            [
                "id" => 29006,
                "app_status" => 3
            ],
            [
                "id" => 29008,
                "app_status" => 3
            ],
            [
                "id" => 29026,
                "app_status" => 3
            ],
            [
                "id" => 29032,
                "app_status" => 3
            ],
            [
                "id" => 29034,
                "app_status" => 3
            ],
            [
                "id" => 29058,
                "app_status" => 3
            ],
            [
                "id" => 29064,
                "app_status" => 3
            ],
            [
                "id" => 29084,
                "app_status" => 3
            ],
            [
                "id" => 29085,
                "app_status" => 3
            ],
            [
                "id" => 29099,
                "app_status" => 3
            ],
            [
                "id" => 29113,
                "app_status" => 3
            ],
            [
                "id" => 29115,
                "app_status" => 3
            ],
            [
                "id" => 29118,
                "app_status" => 3
            ],
            [
                "id" => 29123,
                "app_status" => 3
            ],
            [
                "id" => 29144,
                "app_status" => 3
            ],
            [
                "id" => 29180,
                "app_status" => 3
            ],
            [
                "id" => 29189,
                "app_status" => 3
            ],
            [
                "id" => 29200,
                "app_status" => 3
            ],
            [
                "id" => 29207,
                "app_status" => 3
            ],
            [
                "id" => 29231,
                "app_status" => 3
            ],
            [
                "id" => 29237,
                "app_status" => 3
            ],
            [
                "id" => 29243,
                "app_status" => 3
            ],
            [
                "id" => 29248,
                "app_status" => 3
            ],
            [
                "id" => 29249,
                "app_status" => 3
            ],
            [
                "id" => 29257,
                "app_status" => 3
            ],
            [
                "id" => 29274,
                "app_status" => 3
            ],
            [
                "id" => 29282,
                "app_status" => 3
            ],
            [
                "id" => 29304,
                "app_status" => 3
            ],
            [
                "id" => 29311,
                "app_status" => 3
            ],
            [
                "id" => 29319,
                "app_status" => 3
            ],
            [
                "id" => 29330,
                "app_status" => 3
            ],
            [
                "id" => 29333,
                "app_status" => 3
            ],
            [
                "id" => 29337,
                "app_status" => 3
            ],
            [
                "id" => 29349,
                "app_status" => 3
            ],
            [
                "id" => 29360,
                "app_status" => 3
            ],
            [
                "id" => 29379,
                "app_status" => 3
            ],
            [
                "id" => 29390,
                "app_status" => 3
            ],
            [
                "id" => 29398,
                "app_status" => 3
            ],
            [
                "id" => 29402,
                "app_status" => 3
            ],
            [
                "id" => 29435,
                "app_status" => 3
            ],
            [
                "id" => 29458,
                "app_status" => 3
            ],
            [
                "id" => 29459,
                "app_status" => 3
            ],
            [
                "id" => 29468,
                "app_status" => 3
            ],
            [
                "id" => 29948,
                "app_status" => 3
            ],
            [
                "id" => 29963,
                "app_status" => 3
            ],
            [
                "id" => 29973,
                "app_status" => 3
            ],
            [
                "id" => 29992,
                "app_status" => 3
            ],
            [
                "id" => 29997,
                "app_status" => 3
            ],
            [
                "id" => 30013,
                "app_status" => 3
            ],
            [
                "id" => 30023,
                "app_status" => 3
            ],
            [
                "id" => 30024,
                "app_status" => 3
            ],
            [
                "id" => 30047,
                "app_status" => 3
            ],
            [
                "id" => 30059,
                "app_status" => 3
            ],
            [
                "id" => 30068,
                "app_status" => 3
            ],
            [
                "id" => 30072,
                "app_status" => 3
            ],
            [
                "id" => 30073,
                "app_status" => 3
            ],
            [
                "id" => 30079,
                "app_status" => 3
            ],
            [
                "id" => 30098,
                "app_status" => 3
            ],
            [
                "id" => 30102,
                "app_status" => 3
            ],
            [
                "id" => 30108,
                "app_status" => 3
            ],
            [
                "id" => 30139,
                "app_status" => 3
            ],
            [
                "id" => 30151,
                "app_status" => 3
            ],
            [
                "id" => 30153,
                "app_status" => 3
            ],
            [
                "id" => 30154,
                "app_status" => 3
            ],
            [
                "id" => 30160,
                "app_status" => 3
            ],
            [
                "id" => 30167,
                "app_status" => 3
            ],
            [
                "id" => 30182,
                "app_status" => 3
            ],
            [
                "id" => 30188,
                "app_status" => 3
            ],
            [
                "id" => 30203,
                "app_status" => 3
            ],
            [
                "id" => 30212,
                "app_status" => 3
            ],
            [
                "id" => 30219,
                "app_status" => 3
            ],
            [
                "id" => 30227,
                "app_status" => 3
            ],
            [
                "id" => 30230,
                "app_status" => 3
            ],
            [
                "id" => 30231,
                "app_status" => 3
            ],
            [
                "id" => 30238,
                "app_status" => 3
            ],
            [
                "id" => 30253,
                "app_status" => 3
            ],
            [
                "id" => 30256,
                "app_status" => 3
            ],
            [
                "id" => 30271,
                "app_status" => 3
            ],
            [
                "id" => 30273,
                "app_status" => 3
            ],
            [
                "id" => 30280,
                "app_status" => 3
            ],
            [
                "id" => 30284,
                "app_status" => 3
            ],
            [
                "id" => 30286,
                "app_status" => 3
            ],
            [
                "id" => 30288,
                "app_status" => 3
            ],
            [
                "id" => 30297,
                "app_status" => 3
            ],
            [
                "id" => 30310,
                "app_status" => 3
            ],
            [
                "id" => 30316,
                "app_status" => 3
            ],
            [
                "id" => 30350,
                "app_status" => 3
            ],
            [
                "id" => 30361,
                "app_status" => 3
            ],
            [
                "id" => 30371,
                "app_status" => 3
            ],
            [
                "id" => 30407,
                "app_status" => 3
            ],
            [
                "id" => 30417,
                "app_status" => 3
            ],
            [
                "id" => 30420,
                "app_status" => 3
            ],
            [
                "id" => 30433,
                "app_status" => 3
            ],
            [
                "id" => 30436,
                "app_status" => 3
            ],
            [
                "id" => 30440,
                "app_status" => 3
            ],
            [
                "id" => 30466,
                "app_status" => 3
            ],
            [
                "id" => 30481,
                "app_status" => 3
            ],
            [
                "id" => 30485,
                "app_status" => 3
            ],
            [
                "id" => 30486,
                "app_status" => 3
            ],
            [
                "id" => 30487,
                "app_status" => 3
            ],
            [
                "id" => 30489,
                "app_status" => 3
            ],
            [
                "id" => 30497,
                "app_status" => 3
            ],
            [
                "id" => 30504,
                "app_status" => 3
            ],
            [
                "id" => 30507,
                "app_status" => 3
            ],
            [
                "id" => 30512,
                "app_status" => 3
            ],
            [
                "id" => 30513,
                "app_status" => 3
            ],
            [
                "id" => 30515,
                "app_status" => 3
            ],
            [
                "id" => 30517,
                "app_status" => 3
            ],
            [
                "id" => 30520,
                "app_status" => 3
            ],
            [
                "id" => 30521,
                "app_status" => 3
            ],
            [
                "id" => 30522,
                "app_status" => 3
            ],
            [
                "id" => 30523,
                "app_status" => 3
            ],
            [
                "id" => 30528,
                "app_status" => 3
            ],
            [
                "id" => 30529,
                "app_status" => 3
            ],
            [
                "id" => 30530,
                "app_status" => 3
            ],
            [
                "id" => 30532,
                "app_status" => 3
            ],
            [
                "id" => 30533,
                "app_status" => 3
            ],
            [
                "id" => 30539,
                "app_status" => 3
            ],
            [
                "id" => 30543,
                "app_status" => 3
            ],
            [
                "id" => 30545,
                "app_status" => 3
            ],
            [
                "id" => 30547,
                "app_status" => 3
            ],
            [
                "id" => 30548,
                "app_status" => 3
            ],
            [
                "id" => 30550,
                "app_status" => 3
            ],
            [
                "id" => 30559,
                "app_status" => 3
            ],
            [
                "id" => 30563,
                "app_status" => 3
            ],
            [
                "id" => 30566,
                "app_status" => 3
            ],
            [
                "id" => 30573,
                "app_status" => 3
            ],
            [
                "id" => 30574,
                "app_status" => 3
            ],
            [
                "id" => 30579,
                "app_status" => 3
            ],
            [
                "id" => 30580,
                "app_status" => 3
            ],
            [
                "id" => 30590,
                "app_status" => 3
            ],
            [
                "id" => 30607,
                "app_status" => 3
            ],
            [
                "id" => 30611,
                "app_status" => 3
            ],
            [
                "id" => 30636,
                "app_status" => 3
            ],
            [
                "id" => 30638,
                "app_status" => 3
            ],
            [
                "id" => 30650,
                "app_status" => 3
            ],
            [
                "id" => 30654,
                "app_status" => 3
            ],
            [
                "id" => 30658,
                "app_status" => 3
            ],
            [
                "id" => 30660,
                "app_status" => 3
            ],
            [
                "id" => 30665,
                "app_status" => 3
            ],
            [
                "id" => 30666,
                "app_status" => 3
            ],
            [
                "id" => 30677,
                "app_status" => 3
            ],
            [
                "id" => 30680,
                "app_status" => 3
            ],
            [
                "id" => 30685,
                "app_status" => 3
            ],
            [
                "id" => 30686,
                "app_status" => 3
            ],
            [
                "id" => 30711,
                "app_status" => 3
            ],
            [
                "id" => 30712,
                "app_status" => 3
            ],
            [
                "id" => 30714,
                "app_status" => 3
            ],
            [
                "id" => 30717,
                "app_status" => 3
            ],
            [
                "id" => 30718,
                "app_status" => 3
            ],
            [
                "id" => 30719,
                "app_status" => 3
            ],
            [
                "id" => 30722,
                "app_status" => 3
            ],
            [
                "id" => 30724,
                "app_status" => 3
            ],
            [
                "id" => 30725,
                "app_status" => 3
            ],
            [
                "id" => 30726,
                "app_status" => 3
            ],
            [
                "id" => 30728,
                "app_status" => 3
            ],
            [
                "id" => 30740,
                "app_status" => 3
            ],
            [
                "id" => 30741,
                "app_status" => 3
            ],
            [
                "id" => 30744,
                "app_status" => 3
            ],
            [
                "id" => 30754,
                "app_status" => 3
            ],
            [
                "id" => 30756,
                "app_status" => 3
            ],
            [
                "id" => 30759,
                "app_status" => 3
            ],
            [
                "id" => 30774,
                "app_status" => 3
            ],
            [
                "id" => 30776,
                "app_status" => 3
            ],
            [
                "id" => 30779,
                "app_status" => 3
            ],
            [
                "id" => 30780,
                "app_status" => 3
            ],
            [
                "id" => 30783,
                "app_status" => 3
            ],
            [
                "id" => 30787,
                "app_status" => 3
            ],
            [
                "id" => 30789,
                "app_status" => 3
            ],
            [
                "id" => 30791,
                "app_status" => 3
            ],
            [
                "id" => 30797,
                "app_status" => 3
            ],
            [
                "id" => 30802,
                "app_status" => 3
            ],
            [
                "id" => 30813,
                "app_status" => 3
            ],
            [
                "id" => 30818,
                "app_status" => 3
            ],
            [
                "id" => 30819,
                "app_status" => 3
            ],
            [
                "id" => 30821,
                "app_status" => 3
            ],
            [
                "id" => 30824,
                "app_status" => 3
            ],
            [
                "id" => 30825,
                "app_status" => 3
            ],
            [
                "id" => 30838,
                "app_status" => 3
            ],
            [
                "id" => 30848,
                "app_status" => 3
            ],
            [
                "id" => 30849,
                "app_status" => 3
            ],
            [
                "id" => 30850,
                "app_status" => 3
            ],
            [
                "id" => 30860,
                "app_status" => 3
            ],
            [
                "id" => 30866,
                "app_status" => 3
            ],
            [
                "id" => 30871,
                "app_status" => 3
            ],
            [
                "id" => 30875,
                "app_status" => 3
            ],
            [
                "id" => 30876,
                "app_status" => 3
            ],
            [
                "id" => 30883,
                "app_status" => 3
            ],
            [
                "id" => 30889,
                "app_status" => 3
            ],
            [
                "id" => 30894,
                "app_status" => 3
            ],
            [
                "id" => 30898,
                "app_status" => 3
            ],
            [
                "id" => 30899,
                "app_status" => 3
            ],
            [
                "id" => 30901,
                "app_status" => 3
            ],
            [
                "id" => 30902,
                "app_status" => 3
            ],
            [
                "id" => 30913,
                "app_status" => 3
            ],
            [
                "id" => 30918,
                "app_status" => 3
            ],
            [
                "id" => 30930,
                "app_status" => 3
            ],
            [
                "id" => 30935,
                "app_status" => 3
            ],
            [
                "id" => 30937,
                "app_status" => 3
            ],
            [
                "id" => 30938,
                "app_status" => 3
            ],
            [
                "id" => 30939,
                "app_status" => 3
            ],
            [
                "id" => 30940,
                "app_status" => 3
            ],
            [
                "id" => 30943,
                "app_status" => 3
            ],
            [
                "id" => 30955,
                "app_status" => 3
            ],
            [
                "id" => 30956,
                "app_status" => 3
            ],
            [
                "id" => 30961,
                "app_status" => 3
            ],
            [
                "id" => 30963,
                "app_status" => 3
            ],
            [
                "id" => 30965,
                "app_status" => 3
            ],
            [
                "id" => 30969,
                "app_status" => 3
            ],
            [
                "id" => 30970,
                "app_status" => 3
            ],
            [
                "id" => 30987,
                "app_status" => 3
            ],
            [
                "id" => 30989,
                "app_status" => 3
            ],
            [
                "id" => 30996,
                "app_status" => 3
            ],
            [
                "id" => 31012,
                "app_status" => 3
            ],
            [
                "id" => 31014,
                "app_status" => 3
            ],
            [
                "id" => 31016,
                "app_status" => 3
            ],
            [
                "id" => 31018,
                "app_status" => 3
            ],
            [
                "id" => 31040,
                "app_status" => 3
            ],
            [
                "id" => 31043,
                "app_status" => 3
            ],
            [
                "id" => 31045,
                "app_status" => 3
            ],
            [
                "id" => 31049,
                "app_status" => 3
            ],
            [
                "id" => 31051,
                "app_status" => 3
            ],
            [
                "id" => 31070,
                "app_status" => 3
            ],
            [
                "id" => 31073,
                "app_status" => 3
            ],
            [
                "id" => 31077,
                "app_status" => 3
            ],
            [
                "id" => 31083,
                "app_status" => 3
            ],
            [
                "id" => 31088,
                "app_status" => 3
            ],
            [
                "id" => 31089,
                "app_status" => 3
            ],
            [
                "id" => 31094,
                "app_status" => 3
            ],
            [
                "id" => 31096,
                "app_status" => 3
            ],
            [
                "id" => 31102,
                "app_status" => 3
            ],
            [
                "id" => 31108,
                "app_status" => 3
            ],
            [
                "id" => 31110,
                "app_status" => 3
            ],
            [
                "id" => 31112,
                "app_status" => 3
            ],
            [
                "id" => 31115,
                "app_status" => 3
            ],
            [
                "id" => 31136,
                "app_status" => 3
            ],
            [
                "id" => 31139,
                "app_status" => 3
            ],
            [
                "id" => 31146,
                "app_status" => 3
            ],
            [
                "id" => 31153,
                "app_status" => 3
            ],
            [
                "id" => 31155,
                "app_status" => 3
            ],
            [
                "id" => 31159,
                "app_status" => 3
            ],
            [
                "id" => 31163,
                "app_status" => 3
            ],
            [
                "id" => 31164,
                "app_status" => 3
            ],
            [
                "id" => 31166,
                "app_status" => 3
            ],
            [
                "id" => 31173,
                "app_status" => 3
            ],
            [
                "id" => 31178,
                "app_status" => 3
            ],
            [
                "id" => 31180,
                "app_status" => 3
            ],
            [
                "id" => 31189,
                "app_status" => 3
            ],
            [
                "id" => 31191,
                "app_status" => 3
            ],
            [
                "id" => 31202,
                "app_status" => 3
            ],
            [
                "id" => 31205,
                "app_status" => 3
            ],
            [
                "id" => 31206,
                "app_status" => 3
            ],
            [
                "id" => 31216,
                "app_status" => 3
            ],
            [
                "id" => 31231,
                "app_status" => 3
            ],
            [
                "id" => 31244,
                "app_status" => 3
            ],
            [
                "id" => 31252,
                "app_status" => 3
            ],
            [
                "id" => 31254,
                "app_status" => 3
            ],
            [
                "id" => 31255,
                "app_status" => 3
            ],
            [
                "id" => 31299,
                "app_status" => 3
            ],
            [
                "id" => 31301,
                "app_status" => 3
            ],
            [
                "id" => 31305,
                "app_status" => 3
            ],
            [
                "id" => 31315,
                "app_status" => 3
            ],
            [
                "id" => 31318,
                "app_status" => 3
            ],
            [
                "id" => 31332,
                "app_status" => 3
            ],
            [
                "id" => 31346,
                "app_status" => 3
            ],
            [
                "id" => 31352,
                "app_status" => 3
            ],
            [
                "id" => 31356,
                "app_status" => 3
            ],
            [
                "id" => 31365,
                "app_status" => 3
            ],
            [
                "id" => 31373,
                "app_status" => 3
            ],
            [
                "id" => 31375,
                "app_status" => 3
            ],
            [
                "id" => 31398,
                "app_status" => 3
            ],
            [
                "id" => 31415,
                "app_status" => 3
            ],
            [
                "id" => 31425,
                "app_status" => 3
            ],
            [
                "id" => 31443,
                "app_status" => 3
            ],
            [
                "id" => 31445,
                "app_status" => 3
            ],
            [
                "id" => 31449,
                "app_status" => 3
            ],
            [
                "id" => 31450,
                "app_status" => 3
            ],
            [
                "id" => 31453,
                "app_status" => 3
            ],
            [
                "id" => 31455,
                "app_status" => 3
            ],
            [
                "id" => 31463,
                "app_status" => 3
            ],
            [
                "id" => 31464,
                "app_status" => 3
            ],
            [
                "id" => 31491,
                "app_status" => 3
            ],
            [
                "id" => 31507,
                "app_status" => 3
            ],
            [
                "id" => 31509,
                "app_status" => 3
            ],
            [
                "id" => 31510,
                "app_status" => 3
            ],
            [
                "id" => 31532,
                "app_status" => 3
            ],
            [
                "id" => 31536,
                "app_status" => 3
            ],
            [
                "id" => 31538,
                "app_status" => 3
            ],
            [
                "id" => 31542,
                "app_status" => 3
            ],
            [
                "id" => 31548,
                "app_status" => 3
            ],
            [
                "id" => 31571,
                "app_status" => 3
            ],
            [
                "id" => 31576,
                "app_status" => 3
            ],
            [
                "id" => 31584,
                "app_status" => 3
            ],
            [
                "id" => 31591,
                "app_status" => 3
            ],
            [
                "id" => 31595,
                "app_status" => 3
            ],
            [
                "id" => 31597,
                "app_status" => 3
            ],
            [
                "id" => 31599,
                "app_status" => 3
            ],
            [
                "id" => 31618,
                "app_status" => 3
            ],
            [
                "id" => 31638,
                "app_status" => 3
            ],
            [
                "id" => 31646,
                "app_status" => 3
            ],
            [
                "id" => 31659,
                "app_status" => 3
            ],
            [
                "id" => 31673,
                "app_status" => 3
            ],
            [
                "id" => 31687,
                "app_status" => 3
            ],
            [
                "id" => 31689,
                "app_status" => 3
            ],
            [
                "id" => 31691,
                "app_status" => 3
            ],
            [
                "id" => 31715,
                "app_status" => 3
            ],
            [
                "id" => 31730,
                "app_status" => 3
            ],
            [
                "id" => 31735,
                "app_status" => 3
            ],
            [
                "id" => 31742,
                "app_status" => 3
            ],
            [
                "id" => 31744,
                "app_status" => 3
            ],
            [
                "id" => 31746,
                "app_status" => 3
            ],
            [
                "id" => 31747,
                "app_status" => 3
            ],
            [
                "id" => 31749,
                "app_status" => 3
            ],
            [
                "id" => 31750,
                "app_status" => 3
            ],
            [
                "id" => 31752,
                "app_status" => 3
            ],
            [
                "id" => 31758,
                "app_status" => 3
            ],
            [
                "id" => 31776,
                "app_status" => 3
            ],
            [
                "id" => 31778,
                "app_status" => 3
            ],
            [
                "id" => 31781,
                "app_status" => 3
            ],
            [
                "id" => 31791,
                "app_status" => 3
            ],
            [
                "id" => 31799,
                "app_status" => 3
            ],
            [
                "id" => 31802,
                "app_status" => 3
            ],
            [
                "id" => 31819,
                "app_status" => 3
            ],
            [
                "id" => 31821,
                "app_status" => 3
            ],
            [
                "id" => 31822,
                "app_status" => 3
            ],
            [
                "id" => 31835,
                "app_status" => 3
            ],
            [
                "id" => 31839,
                "app_status" => 3
            ],
            [
                "id" => 31846,
                "app_status" => 3
            ],
            [
                "id" => 31847,
                "app_status" => 3
            ],
            [
                "id" => 31848,
                "app_status" => 3
            ],
            [
                "id" => 31851,
                "app_status" => 3
            ],
            [
                "id" => 31856,
                "app_status" => 3
            ],
            [
                "id" => 31866,
                "app_status" => 3
            ],
            [
                "id" => 31874,
                "app_status" => 3
            ],
            [
                "id" => 31875,
                "app_status" => 3
            ],
            [
                "id" => 31878,
                "app_status" => 3
            ],
            [
                "id" => 31879,
                "app_status" => 3
            ],
            [
                "id" => 31880,
                "app_status" => 3
            ],
            [
                "id" => 31881,
                "app_status" => 3
            ],
            [
                "id" => 31884,
                "app_status" => 3
            ],
            [
                "id" => 31885,
                "app_status" => 3
            ],
            [
                "id" => 31929,
                "app_status" => 3
            ],
            [
                "id" => 31935,
                "app_status" => 3
            ],
            [
                "id" => 31943,
                "app_status" => 3
            ],
            [
                "id" => 31951,
                "app_status" => 3
            ],
            [
                "id" => 31952,
                "app_status" => 3
            ],
            [
                "id" => 31959,
                "app_status" => 3
            ],
            [
                "id" => 31960,
                "app_status" => 3
            ],
            [
                "id" => 31965,
                "app_status" => 3
            ],
            [
                "id" => 31978,
                "app_status" => 3
            ],
            [
                "id" => 31999,
                "app_status" => 3
            ],
            [
                "id" => 32000,
                "app_status" => 3
            ],
            [
                "id" => 32006,
                "app_status" => 3
            ],
            [
                "id" => 32011,
                "app_status" => 3
            ],
            [
                "id" => 32015,
                "app_status" => 3
            ],
            [
                "id" => 32017,
                "app_status" => 3
            ],
            [
                "id" => 32026,
                "app_status" => 3
            ],
            [
                "id" => 32036,
                "app_status" => 3
            ],
            [
                "id" => 32042,
                "app_status" => 3
            ],
            [
                "id" => 32051,
                "app_status" => 3
            ],
            [
                "id" => 32068,
                "app_status" => 3
            ],
            [
                "id" => 32072,
                "app_status" => 3
            ],
            [
                "id" => 32076,
                "app_status" => 3
            ],
            [
                "id" => 32088,
                "app_status" => 3
            ],
            [
                "id" => 32093,
                "app_status" => 3
            ],
            [
                "id" => 32097,
                "app_status" => 3
            ],
            [
                "id" => 32098,
                "app_status" => 3
            ],
            [
                "id" => 32103,
                "app_status" => 3
            ],
            [
                "id" => 32104,
                "app_status" => 3
            ],
            [
                "id" => 32106,
                "app_status" => 3
            ],
            [
                "id" => 32116,
                "app_status" => 3
            ],
            [
                "id" => 32120,
                "app_status" => 3
            ],
            [
                "id" => 32123,
                "app_status" => 3
            ],
            [
                "id" => 32126,
                "app_status" => 3
            ],
            [
                "id" => 32127,
                "app_status" => 3
            ],
            [
                "id" => 32132,
                "app_status" => 3
            ],
            [
                "id" => 32142,
                "app_status" => 3
            ],
            [
                "id" => 32145,
                "app_status" => 3
            ],
            [
                "id" => 32146,
                "app_status" => 3
            ],
            [
                "id" => 32148,
                "app_status" => 3
            ],
            [
                "id" => 32152,
                "app_status" => 3
            ],
            [
                "id" => 32159,
                "app_status" => 3
            ],
            [
                "id" => 32160,
                "app_status" => 3
            ],
            [
                "id" => 32169,
                "app_status" => 3
            ],
            [
                "id" => 32170,
                "app_status" => 3
            ],
            [
                "id" => 32171,
                "app_status" => 3
            ],
            [
                "id" => 32176,
                "app_status" => 3
            ],
            [
                "id" => 32177,
                "app_status" => 3
            ],
            [
                "id" => 32182,
                "app_status" => 3
            ],
            [
                "id" => 32187,
                "app_status" => 3
            ],
            [
                "id" => 32188,
                "app_status" => 3
            ],
            [
                "id" => 32192,
                "app_status" => 3
            ],
            [
                "id" => 32194,
                "app_status" => 3
            ],
            [
                "id" => 32196,
                "app_status" => 3
            ],
            [
                "id" => 32201,
                "app_status" => 3
            ],
            [
                "id" => 32212,
                "app_status" => 3
            ],
            [
                "id" => 32216,
                "app_status" => 3
            ],
            [
                "id" => 32217,
                "app_status" => 3
            ],
            [
                "id" => 32218,
                "app_status" => 3
            ],
            [
                "id" => 32223,
                "app_status" => 3
            ],
            [
                "id" => 32233,
                "app_status" => 3
            ],
            [
                "id" => 32236,
                "app_status" => 3
            ],
            [
                "id" => 32237,
                "app_status" => 3
            ],
            [
                "id" => 32241,
                "app_status" => 3
            ],
            [
                "id" => 32242,
                "app_status" => 3
            ],
            [
                "id" => 32251,
                "app_status" => 3
            ],
            [
                "id" => 32253,
                "app_status" => 3
            ],
            [
                "id" => 32258,
                "app_status" => 3
            ],
            [
                "id" => 32261,
                "app_status" => 3
            ],
            [
                "id" => 32265,
                "app_status" => 3
            ],
            [
                "id" => 32270,
                "app_status" => 3
            ],
            [
                "id" => 32272,
                "app_status" => 3
            ],
            [
                "id" => 32275,
                "app_status" => 3
            ],
            [
                "id" => 32276,
                "app_status" => 3
            ],
            [
                "id" => 32280,
                "app_status" => 3
            ],
            [
                "id" => 32282,
                "app_status" => 3
            ],
            [
                "id" => 32283,
                "app_status" => 3
            ],
            [
                "id" => 32286,
                "app_status" => 3
            ],
            [
                "id" => 32293,
                "app_status" => 3
            ],
            [
                "id" => 32297,
                "app_status" => 3
            ],
            [
                "id" => 32298,
                "app_status" => 3
            ],
            [
                "id" => 32299,
                "app_status" => 3
            ],
            [
                "id" => 32300,
                "app_status" => 3
            ],
            [
                "id" => 32302,
                "app_status" => 3
            ],
            [
                "id" => 32304,
                "app_status" => 3
            ],
            [
                "id" => 32309,
                "app_status" => 3
            ],
            [
                "id" => 32310,
                "app_status" => 3
            ],
            [
                "id" => 32312,
                "app_status" => 3
            ],
            [
                "id" => 32313,
                "app_status" => 3
            ],
            [
                "id" => 32314,
                "app_status" => 3
            ],
            [
                "id" => 32317,
                "app_status" => 3
            ],
            [
                "id" => 32318,
                "app_status" => 3
            ],
            [
                "id" => 32319,
                "app_status" => 3
            ],
            [
                "id" => 32324,
                "app_status" => 3
            ],
            [
                "id" => 32325,
                "app_status" => 3
            ],
            [
                "id" => 32326,
                "app_status" => 3
            ],
            [
                "id" => 32328,
                "app_status" => 3
            ],
            [
                "id" => 32329,
                "app_status" => 3
            ],
            [
                "id" => 32330,
                "app_status" => 3
            ],
            [
                "id" => 32333,
                "app_status" => 3
            ],
            [
                "id" => 32334,
                "app_status" => 3
            ],
            [
                "id" => 32335,
                "app_status" => 3
            ],
            [
                "id" => 32338,
                "app_status" => 3
            ],
            [
                "id" => 32339,
                "app_status" => 3
            ],
            [
                "id" => 32347,
                "app_status" => 3
            ],
            [
                "id" => 32352,
                "app_status" => 3
            ],
            [
                "id" => 32354,
                "app_status" => 3
            ],
            [
                "id" => 32359,
                "app_status" => 3
            ],
            [
                "id" => 32368,
                "app_status" => 3
            ],
            [
                "id" => 32372,
                "app_status" => 3
            ],
            [
                "id" => 32375,
                "app_status" => 3
            ],
            [
                "id" => 32377,
                "app_status" => 3
            ],
            [
                "id" => 32378,
                "app_status" => 3
            ],
            [
                "id" => 32379,
                "app_status" => 3
            ],
            [
                "id" => 32382,
                "app_status" => 3
            ],
            [
                "id" => 32388,
                "app_status" => 3
            ],
            [
                "id" => 32391,
                "app_status" => 3
            ],
            [
                "id" => 32392,
                "app_status" => 3
            ],
            [
                "id" => 32394,
                "app_status" => 3
            ],
            [
                "id" => 32396,
                "app_status" => 3
            ],
            [
                "id" => 32397,
                "app_status" => 3
            ],
            [
                "id" => 32400,
                "app_status" => 3
            ],
            [
                "id" => 32402,
                "app_status" => 3
            ],
            [
                "id" => 32404,
                "app_status" => 3
            ],
            [
                "id" => 32405,
                "app_status" => 3
            ],
            [
                "id" => 32410,
                "app_status" => 3
            ],
            [
                "id" => 32412,
                "app_status" => 3
            ],
            [
                "id" => 32416,
                "app_status" => 3
            ],
            [
                "id" => 32420,
                "app_status" => 3
            ],
            [
                "id" => 32423,
                "app_status" => 3
            ],
            [
                "id" => 32427,
                "app_status" => 3
            ],
            [
                "id" => 32428,
                "app_status" => 3
            ],
            [
                "id" => 32435,
                "app_status" => 3
            ],
            [
                "id" => 32438,
                "app_status" => 3
            ],
            [
                "id" => 32442,
                "app_status" => 3
            ],
            [
                "id" => 32450,
                "app_status" => 3
            ],
            [
                "id" => 32456,
                "app_status" => 3
            ],
            [
                "id" => 32462,
                "app_status" => 3
            ],
            [
                "id" => 32464,
                "app_status" => 3
            ],
            [
                "id" => 32474,
                "app_status" => 3
            ],
            [
                "id" => 32479,
                "app_status" => 3
            ],
            [
                "id" => 32480,
                "app_status" => 3
            ],
            [
                "id" => 32482,
                "app_status" => 3
            ],
            [
                "id" => 32484,
                "app_status" => 3
            ],
            [
                "id" => 32488,
                "app_status" => 3
            ],
            [
                "id" => 32489,
                "app_status" => 3
            ],
            [
                "id" => 32491,
                "app_status" => 3
            ],
            [
                "id" => 32493,
                "app_status" => 3
            ],
            [
                "id" => 32494,
                "app_status" => 3
            ],
            [
                "id" => 32495,
                "app_status" => 3
            ],
            [
                "id" => 32497,
                "app_status" => 3
            ],
            [
                "id" => 32500,
                "app_status" => 3
            ],
            [
                "id" => 32501,
                "app_status" => 3
            ],
            [
                "id" => 32505,
                "app_status" => 3
            ],
            [
                "id" => 32515,
                "app_status" => 3
            ],
            [
                "id" => 32517,
                "app_status" => 3
            ],
            [
                "id" => 32518,
                "app_status" => 3
            ],
            [
                "id" => 32521,
                "app_status" => 3
            ],
            [
                "id" => 32527,
                "app_status" => 3
            ],
            [
                "id" => 32537,
                "app_status" => 3
            ],
            [
                "id" => 32543,
                "app_status" => 3
            ],
            [
                "id" => 32545,
                "app_status" => 3
            ],
            [
                "id" => 32546,
                "app_status" => 3
            ],
            [
                "id" => 32551,
                "app_status" => 3
            ],
            [
                "id" => 32552,
                "app_status" => 3
            ],
            [
                "id" => 32555,
                "app_status" => 3
            ],
            [
                "id" => 32556,
                "app_status" => 3
            ],
            [
                "id" => 32557,
                "app_status" => 3
            ],
            [
                "id" => 32563,
                "app_status" => 3
            ],
            [
                "id" => 32564,
                "app_status" => 3
            ],
            [
                "id" => 32579,
                "app_status" => 3
            ],
            [
                "id" => 32583,
                "app_status" => 3
            ],
            [
                "id" => 32585,
                "app_status" => 3
            ],
            [
                "id" => 32589,
                "app_status" => 3
            ],
            [
                "id" => 32592,
                "app_status" => 3
            ],
            [
                "id" => 32594,
                "app_status" => 3
            ],
            [
                "id" => 32606,
                "app_status" => 3
            ],
            [
                "id" => 32612,
                "app_status" => 3
            ],
            [
                "id" => 32616,
                "app_status" => 3
            ],
            [
                "id" => 32628,
                "app_status" => 3
            ],
            [
                "id" => 32631,
                "app_status" => 3
            ],
            [
                "id" => 32634,
                "app_status" => 3
            ],
            [
                "id" => 32637,
                "app_status" => 3
            ],
            [
                "id" => 32645,
                "app_status" => 3
            ],
            [
                "id" => 32648,
                "app_status" => 3
            ],
            [
                "id" => 32649,
                "app_status" => 3
            ],
            [
                "id" => 32651,
                "app_status" => 3
            ],
            [
                "id" => 32653,
                "app_status" => 3
            ],
            [
                "id" => 32661,
                "app_status" => 3
            ],
            [
                "id" => 32662,
                "app_status" => 3
            ],
            [
                "id" => 32664,
                "app_status" => 3
            ],
            [
                "id" => 32666,
                "app_status" => 3
            ],
            [
                "id" => 32668,
                "app_status" => 3
            ],
            [
                "id" => 32672,
                "app_status" => 3
            ],
            [
                "id" => 32677,
                "app_status" => 3
            ],
            [
                "id" => 32678,
                "app_status" => 3
            ],
            [
                "id" => 32684,
                "app_status" => 3
            ],
            [
                "id" => 32690,
                "app_status" => 3
            ],
            [
                "id" => 32698,
                "app_status" => 3
            ],
            [
                "id" => 32699,
                "app_status" => 3
            ],
            [
                "id" => 32706,
                "app_status" => 3
            ],
            [
                "id" => 32711,
                "app_status" => 3
            ],
            [
                "id" => 32715,
                "app_status" => 3
            ],
            [
                "id" => 32724,
                "app_status" => 3
            ],
            [
                "id" => 32726,
                "app_status" => 3
            ],
            [
                "id" => 32727,
                "app_status" => 3
            ],
            [
                "id" => 32728,
                "app_status" => 3
            ],
            [
                "id" => 32732,
                "app_status" => 3
            ],
            [
                "id" => 32735,
                "app_status" => 3
            ],
            [
                "id" => 32738,
                "app_status" => 3
            ],
            [
                "id" => 32739,
                "app_status" => 3
            ],
            [
                "id" => 32744,
                "app_status" => 3
            ],
            [
                "id" => 32754,
                "app_status" => 3
            ],
            [
                "id" => 32755,
                "app_status" => 3
            ],
            [
                "id" => 32756,
                "app_status" => 3
            ],
            [
                "id" => 32757,
                "app_status" => 3
            ],
            [
                "id" => 32761,
                "app_status" => 3
            ],
            [
                "id" => 32763,
                "app_status" => 3
            ],
            [
                "id" => 32765,
                "app_status" => 3
            ],
            [
                "id" => 32767,
                "app_status" => 3
            ],
            [
                "id" => 32775,
                "app_status" => 3
            ],
            [
                "id" => 32779,
                "app_status" => 3
            ],
            [
                "id" => 32783,
                "app_status" => 3
            ],
            [
                "id" => 32787,
                "app_status" => 3
            ],
            [
                "id" => 32791,
                "app_status" => 3
            ],
            [
                "id" => 32796,
                "app_status" => 3
            ],
            [
                "id" => 32800,
                "app_status" => 3
            ],
            [
                "id" => 32801,
                "app_status" => 3
            ],
            [
                "id" => 32805,
                "app_status" => 3
            ],
            [
                "id" => 32807,
                "app_status" => 3
            ],
            [
                "id" => 32808,
                "app_status" => 3
            ],
            [
                "id" => 32814,
                "app_status" => 3
            ],
            [
                "id" => 32815,
                "app_status" => 3
            ],
            [
                "id" => 32817,
                "app_status" => 3
            ],
            [
                "id" => 32821,
                "app_status" => 3
            ],
            [
                "id" => 32822,
                "app_status" => 3
            ],
            [
                "id" => 32841,
                "app_status" => 3
            ],
            [
                "id" => 32845,
                "app_status" => 3
            ],
            [
                "id" => 32847,
                "app_status" => 3
            ],
            [
                "id" => 32851,
                "app_status" => 3
            ],
            [
                "id" => 32860,
                "app_status" => 3
            ],
            [
                "id" => 32862,
                "app_status" => 3
            ],
            [
                "id" => 32871,
                "app_status" => 3
            ],
            [
                "id" => 32873,
                "app_status" => 3
            ],
            [
                "id" => 32882,
                "app_status" => 3
            ],
            [
                "id" => 32884,
                "app_status" => 3
            ],
            [
                "id" => 32886,
                "app_status" => 3
            ],
            [
                "id" => 32890,
                "app_status" => 3
            ],
            [
                "id" => 32892,
                "app_status" => 3
            ],
            [
                "id" => 32893,
                "app_status" => 3
            ],
            [
                "id" => 32894,
                "app_status" => 3
            ],
            [
                "id" => 32897,
                "app_status" => 3
            ],
            [
                "id" => 32899,
                "app_status" => 3
            ],
            [
                "id" => 32903,
                "app_status" => 3
            ],
            [
                "id" => 32905,
                "app_status" => 3
            ],
            [
                "id" => 32907,
                "app_status" => 3
            ],
            [
                "id" => 32909,
                "app_status" => 3
            ],
            [
                "id" => 32916,
                "app_status" => 3
            ],
            [
                "id" => 32917,
                "app_status" => 3
            ],
            [
                "id" => 32924,
                "app_status" => 3
            ],
            [
                "id" => 32928,
                "app_status" => 3
            ],
            [
                "id" => 32930,
                "app_status" => 3
            ],
            [
                "id" => 32931,
                "app_status" => 3
            ],
            [
                "id" => 32934,
                "app_status" => 3
            ],
            [
                "id" => 32940,
                "app_status" => 3
            ],
            [
                "id" => 32941,
                "app_status" => 3
            ],
            [
                "id" => 32942,
                "app_status" => 3
            ],
            [
                "id" => 32951,
                "app_status" => 3
            ],
            [
                "id" => 32965,
                "app_status" => 3
            ],
            [
                "id" => 32966,
                "app_status" => 3
            ],
            [
                "id" => 32972,
                "app_status" => 3
            ],
            [
                "id" => 32974,
                "app_status" => 3
            ],
            [
                "id" => 32976,
                "app_status" => 3
            ],
            [
                "id" => 32978,
                "app_status" => 3
            ],
            [
                "id" => 32979,
                "app_status" => 3
            ],
            [
                "id" => 32981,
                "app_status" => 3
            ],
            [
                "id" => 32986,
                "app_status" => 3
            ],
            [
                "id" => 32993,
                "app_status" => 3
            ],
            [
                "id" => 32995,
                "app_status" => 3
            ],
            [
                "id" => 32996,
                "app_status" => 3
            ],
            [
                "id" => 33003,
                "app_status" => 3
            ],
            [
                "id" => 33004,
                "app_status" => 3
            ],
            [
                "id" => 33006,
                "app_status" => 3
            ],
            [
                "id" => 33008,
                "app_status" => 3
            ],
            [
                "id" => 33011,
                "app_status" => 3
            ],
            [
                "id" => 33015,
                "app_status" => 3
            ],
            [
                "id" => 33017,
                "app_status" => 3
            ],
            [
                "id" => 33018,
                "app_status" => 3
            ],
            [
                "id" => 33019,
                "app_status" => 3
            ],
            [
                "id" => 33020,
                "app_status" => 3
            ],
            [
                "id" => 33022,
                "app_status" => 3
            ],
            [
                "id" => 33027,
                "app_status" => 3
            ],
            [
                "id" => 33031,
                "app_status" => 3
            ],
            [
                "id" => 33043,
                "app_status" => 3
            ],
            [
                "id" => 33047,
                "app_status" => 3
            ],
            [
                "id" => 33060,
                "app_status" => 3
            ],
            [
                "id" => 33066,
                "app_status" => 3
            ],
            [
                "id" => 33073,
                "app_status" => 3
            ],
            [
                "id" => 33076,
                "app_status" => 3
            ],
            [
                "id" => 33079,
                "app_status" => 3
            ],
            [
                "id" => 33086,
                "app_status" => 3
            ],
            [
                "id" => 33088,
                "app_status" => 3
            ],
            [
                "id" => 33092,
                "app_status" => 3
            ],
            [
                "id" => 33093,
                "app_status" => 3
            ],
            [
                "id" => 33097,
                "app_status" => 3
            ],
            [
                "id" => 33100,
                "app_status" => 3
            ],
            [
                "id" => 33102,
                "app_status" => 3
            ],
            [
                "id" => 33103,
                "app_status" => 3
            ],
            [
                "id" => 33107,
                "app_status" => 3
            ],
            [
                "id" => 33108,
                "app_status" => 3
            ],
            [
                "id" => 33110,
                "app_status" => 3
            ],
            [
                "id" => 33111,
                "app_status" => 3
            ],
            [
                "id" => 33120,
                "app_status" => 3
            ],
            [
                "id" => 33122,
                "app_status" => 3
            ],
            [
                "id" => 33123,
                "app_status" => 3
            ],
            [
                "id" => 33124,
                "app_status" => 3
            ],
            [
                "id" => 33127,
                "app_status" => 3
            ],
            [
                "id" => 33130,
                "app_status" => 3
            ],
            [
                "id" => 33131,
                "app_status" => 3
            ],
            [
                "id" => 33133,
                "app_status" => 3
            ],
            [
                "id" => 33139,
                "app_status" => 3
            ],
            [
                "id" => 33140,
                "app_status" => 3
            ],
            [
                "id" => 33146,
                "app_status" => 3
            ],
            [
                "id" => 33149,
                "app_status" => 3
            ],
            [
                "id" => 33150,
                "app_status" => 3
            ],
            [
                "id" => 33153,
                "app_status" => 3
            ],
            [
                "id" => 33155,
                "app_status" => 3
            ],
            [
                "id" => 33156,
                "app_status" => 3
            ],
            [
                "id" => 33157,
                "app_status" => 3
            ],
            [
                "id" => 33163,
                "app_status" => 3
            ],
            [
                "id" => 33164,
                "app_status" => 3
            ],
            [
                "id" => 33167,
                "app_status" => 3
            ],
            [
                "id" => 33168,
                "app_status" => 3
            ],
            [
                "id" => 33169,
                "app_status" => 3
            ],
            [
                "id" => 33172,
                "app_status" => 3
            ],
            [
                "id" => 33173,
                "app_status" => 3
            ],
            [
                "id" => 33182,
                "app_status" => 3
            ],
            [
                "id" => 33184,
                "app_status" => 3
            ],
            [
                "id" => 33192,
                "app_status" => 3
            ],
            [
                "id" => 33197,
                "app_status" => 3
            ],
            [
                "id" => 33198,
                "app_status" => 3
            ],
            [
                "id" => 33199,
                "app_status" => 3
            ],
            [
                "id" => 33200,
                "app_status" => 3
            ],
            [
                "id" => 33206,
                "app_status" => 3
            ],
            [
                "id" => 33209,
                "app_status" => 3
            ],
            [
                "id" => 33210,
                "app_status" => 3
            ],
            [
                "id" => 33216,
                "app_status" => 3
            ],
            [
                "id" => 33217,
                "app_status" => 3
            ],
            [
                "id" => 33218,
                "app_status" => 3
            ],
            [
                "id" => 33221,
                "app_status" => 3
            ],
            [
                "id" => 33225,
                "app_status" => 3
            ],
            [
                "id" => 33228,
                "app_status" => 3
            ],
            [
                "id" => 33230,
                "app_status" => 3
            ],
            [
                "id" => 33232,
                "app_status" => 3
            ],
            [
                "id" => 33240,
                "app_status" => 3
            ],
            [
                "id" => 33241,
                "app_status" => 3
            ],
            [
                "id" => 33243,
                "app_status" => 3
            ],
            [
                "id" => 33246,
                "app_status" => 3
            ],
            [
                "id" => 33251,
                "app_status" => 3
            ],
            [
                "id" => 33255,
                "app_status" => 3
            ],
            [
                "id" => 33259,
                "app_status" => 3
            ],
            [
                "id" => 33261,
                "app_status" => 3
            ],
            [
                "id" => 33262,
                "app_status" => 3
            ],
            [
                "id" => 33263,
                "app_status" => 3
            ],
            [
                "id" => 33267,
                "app_status" => 3
            ],
            [
                "id" => 33271,
                "app_status" => 3
            ],
            [
                "id" => 33273,
                "app_status" => 3
            ],
            [
                "id" => 33276,
                "app_status" => 3
            ],
            [
                "id" => 33277,
                "app_status" => 3
            ],
            [
                "id" => 33279,
                "app_status" => 3
            ],
            [
                "id" => 33283,
                "app_status" => 3
            ],
            [
                "id" => 33284,
                "app_status" => 3
            ],
            [
                "id" => 33289,
                "app_status" => 3
            ],
            [
                "id" => 33296,
                "app_status" => 3
            ],
            [
                "id" => 33297,
                "app_status" => 3
            ],
            [
                "id" => 33302,
                "app_status" => 3
            ],
            [
                "id" => 33303,
                "app_status" => 3
            ],
            [
                "id" => 33306,
                "app_status" => 3
            ],
            [
                "id" => 33309,
                "app_status" => 3
            ],
            [
                "id" => 33314,
                "app_status" => 3
            ],
            [
                "id" => 33316,
                "app_status" => 3
            ],
            [
                "id" => 33319,
                "app_status" => 3
            ],
            [
                "id" => 33323,
                "app_status" => 3
            ],
            [
                "id" => 33325,
                "app_status" => 3
            ],
            [
                "id" => 33327,
                "app_status" => 3
            ],
            [
                "id" => 33329,
                "app_status" => 3
            ],
            [
                "id" => 33334,
                "app_status" => 3
            ],
            [
                "id" => 33335,
                "app_status" => 3
            ],
            [
                "id" => 33340,
                "app_status" => 3
            ],
            [
                "id" => 33342,
                "app_status" => 3
            ],
            [
                "id" => 33343,
                "app_status" => 3
            ],
            [
                "id" => 33346,
                "app_status" => 3
            ],
            [
                "id" => 33352,
                "app_status" => 3
            ],
            [
                "id" => 33368,
                "app_status" => 3
            ],
            [
                "id" => 33369,
                "app_status" => 3
            ],
            [
                "id" => 33374,
                "app_status" => 3
            ],
            [
                "id" => 33375,
                "app_status" => 3
            ],
            [
                "id" => 33382,
                "app_status" => 3
            ],
            [
                "id" => 33383,
                "app_status" => 3
            ],
            [
                "id" => 33386,
                "app_status" => 3
            ],
            [
                "id" => 33388,
                "app_status" => 3
            ],
            [
                "id" => 33389,
                "app_status" => 3
            ],
            [
                "id" => 33390,
                "app_status" => 3
            ],
            [
                "id" => 33394,
                "app_status" => 3
            ],
            [
                "id" => 33395,
                "app_status" => 3
            ],
            [
                "id" => 33397,
                "app_status" => 3
            ],
            [
                "id" => 33405,
                "app_status" => 3
            ],
            [
                "id" => 33407,
                "app_status" => 3
            ],
            [
                "id" => 33410,
                "app_status" => 3
            ],
            [
                "id" => 33413,
                "app_status" => 3
            ],
            [
                "id" => 33417,
                "app_status" => 3
            ],
            [
                "id" => 33418,
                "app_status" => 3
            ],
            [
                "id" => 33420,
                "app_status" => 3
            ],
            [
                "id" => 33421,
                "app_status" => 3
            ],
            [
                "id" => 33422,
                "app_status" => 3
            ],
            [
                "id" => 33424,
                "app_status" => 3
            ],
            [
                "id" => 33425,
                "app_status" => 3
            ],
            [
                "id" => 33435,
                "app_status" => 3
            ],
            [
                "id" => 33436,
                "app_status" => 3
            ],
            [
                "id" => 33442,
                "app_status" => 3
            ],
            [
                "id" => 33443,
                "app_status" => 3
            ],
            [
                "id" => 33444,
                "app_status" => 3
            ],
            [
                "id" => 33452,
                "app_status" => 3
            ],
            [
                "id" => 33453,
                "app_status" => 3
            ],
            [
                "id" => 33455,
                "app_status" => 3
            ],
            [
                "id" => 33461,
                "app_status" => 3
            ],
            [
                "id" => 33463,
                "app_status" => 3
            ],
            [
                "id" => 33469,
                "app_status" => 3
            ],
            [
                "id" => 33471,
                "app_status" => 3
            ],
            [
                "id" => 33475,
                "app_status" => 3
            ],
            [
                "id" => 33476,
                "app_status" => 3
            ],
            [
                "id" => 33480,
                "app_status" => 3
            ],
            [
                "id" => 33486,
                "app_status" => 3
            ],
            [
                "id" => 33491,
                "app_status" => 3
            ],
            [
                "id" => 33498,
                "app_status" => 3
            ],
            [
                "id" => 33500,
                "app_status" => 3
            ],
            [
                "id" => 33501,
                "app_status" => 3
            ],
            [
                "id" => 33504,
                "app_status" => 3
            ],
            [
                "id" => 33505,
                "app_status" => 3
            ],
            [
                "id" => 33507,
                "app_status" => 3
            ],
            [
                "id" => 33515,
                "app_status" => 3
            ],
            [
                "id" => 33516,
                "app_status" => 3
            ],
            [
                "id" => 33521,
                "app_status" => 3
            ],
            [
                "id" => 33523,
                "app_status" => 3
            ],
            [
                "id" => 33525,
                "app_status" => 3
            ],
            [
                "id" => 33526,
                "app_status" => 3
            ],
            [
                "id" => 33527,
                "app_status" => 3
            ],
            [
                "id" => 33528,
                "app_status" => 3
            ],
            [
                "id" => 33529,
                "app_status" => 3
            ],
            [
                "id" => 33530,
                "app_status" => 3
            ],
            [
                "id" => 33541,
                "app_status" => 3
            ],
            [
                "id" => 33542,
                "app_status" => 3
            ],
            [
                "id" => 33544,
                "app_status" => 3
            ],
            [
                "id" => 33547,
                "app_status" => 3
            ],
            [
                "id" => 33548,
                "app_status" => 3
            ],
            [
                "id" => 33550,
                "app_status" => 3
            ],
            [
                "id" => 33554,
                "app_status" => 3
            ],
            [
                "id" => 33555,
                "app_status" => 3
            ],
            [
                "id" => 33559,
                "app_status" => 3
            ],
            [
                "id" => 33561,
                "app_status" => 3
            ],
            [
                "id" => 33562,
                "app_status" => 3
            ],
            [
                "id" => 33566,
                "app_status" => 3
            ],
            [
                "id" => 33569,
                "app_status" => 3
            ],
            [
                "id" => 33571,
                "app_status" => 3
            ],
            [
                "id" => 33576,
                "app_status" => 3
            ],
            [
                "id" => 33578,
                "app_status" => 3
            ],
            [
                "id" => 33582,
                "app_status" => 3
            ],
            [
                "id" => 33585,
                "app_status" => 3
            ],
            [
                "id" => 33586,
                "app_status" => 3
            ],
            [
                "id" => 33587,
                "app_status" => 3
            ],
            [
                "id" => 33588,
                "app_status" => 3
            ],
            [
                "id" => 33593,
                "app_status" => 3
            ],
            [
                "id" => 33594,
                "app_status" => 3
            ],
            [
                "id" => 33597,
                "app_status" => 3
            ],
            [
                "id" => 33598,
                "app_status" => 3
            ],
            [
                "id" => 33599,
                "app_status" => 3
            ],
            [
                "id" => 33601,
                "app_status" => 3
            ],
            [
                "id" => 33602,
                "app_status" => 3
            ],
            [
                "id" => 33604,
                "app_status" => 3
            ],
            [
                "id" => 33612,
                "app_status" => 3
            ],
            [
                "id" => 33615,
                "app_status" => 3
            ],
            [
                "id" => 33618,
                "app_status" => 3
            ],
            [
                "id" => 33619,
                "app_status" => 3
            ],
            [
                "id" => 33621,
                "app_status" => 3
            ],
            [
                "id" => 33622,
                "app_status" => 3
            ],
            [
                "id" => 33627,
                "app_status" => 3
            ],
            [
                "id" => 33628,
                "app_status" => 3
            ],
            [
                "id" => 33629,
                "app_status" => 3
            ],
            [
                "id" => 33630,
                "app_status" => 3
            ],
            [
                "id" => 33631,
                "app_status" => 3
            ],
            [
                "id" => 33634,
                "app_status" => 3
            ],
            [
                "id" => 33638,
                "app_status" => 3
            ],
            [
                "id" => 33639,
                "app_status" => 3
            ],
            [
                "id" => 33650,
                "app_status" => 3
            ],
            [
                "id" => 33653,
                "app_status" => 3
            ],
            [
                "id" => 33655,
                "app_status" => 3
            ],
            [
                "id" => 33656,
                "app_status" => 3
            ],
            [
                "id" => 33657,
                "app_status" => 3
            ],
            [
                "id" => 33659,
                "app_status" => 3
            ],
            [
                "id" => 33664,
                "app_status" => 3
            ],
            [
                "id" => 33666,
                "app_status" => 3
            ],
            [
                "id" => 33668,
                "app_status" => 3
            ],
            [
                "id" => 33674,
                "app_status" => 3
            ],
            [
                "id" => 33675,
                "app_status" => 3
            ],
            [
                "id" => 33679,
                "app_status" => 3
            ],
            [
                "id" => 33680,
                "app_status" => 3
            ],
            [
                "id" => 33681,
                "app_status" => 3
            ],
            [
                "id" => 33682,
                "app_status" => 3
            ],
            [
                "id" => 33683,
                "app_status" => 3
            ],
            [
                "id" => 33686,
                "app_status" => 3
            ],
            [
                "id" => 33688,
                "app_status" => 3
            ],
            [
                "id" => 33689,
                "app_status" => 3
            ],
            [
                "id" => 33699,
                "app_status" => 3
            ],
            [
                "id" => 33701,
                "app_status" => 3
            ],
            [
                "id" => 33703,
                "app_status" => 3
            ],
            [
                "id" => 33705,
                "app_status" => 3
            ],
            [
                "id" => 33706,
                "app_status" => 3
            ],
            [
                "id" => 33711,
                "app_status" => 3
            ],
            [
                "id" => 33717,
                "app_status" => 3
            ],
            [
                "id" => 33720,
                "app_status" => 3
            ],
            [
                "id" => 33722,
                "app_status" => 3
            ],
            [
                "id" => 33725,
                "app_status" => 3
            ],
            [
                "id" => 33727,
                "app_status" => 3
            ],
            [
                "id" => 33731,
                "app_status" => 3
            ],
            [
                "id" => 33737,
                "app_status" => 3
            ],
            [
                "id" => 33739,
                "app_status" => 3
            ],
            [
                "id" => 33742,
                "app_status" => 3
            ],
            [
                "id" => 33744,
                "app_status" => 3
            ],
            [
                "id" => 33747,
                "app_status" => 3
            ],
            [
                "id" => 33748,
                "app_status" => 3
            ],
            [
                "id" => 33749,
                "app_status" => 3
            ],
            [
                "id" => 33751,
                "app_status" => 3
            ],
            [
                "id" => 33752,
                "app_status" => 3
            ],
            [
                "id" => 33757,
                "app_status" => 3
            ],
            [
                "id" => 33758,
                "app_status" => 3
            ],
            [
                "id" => 33761,
                "app_status" => 3
            ],
            [
                "id" => 33764,
                "app_status" => 3
            ],
            [
                "id" => 33766,
                "app_status" => 3
            ],
            [
                "id" => 33771,
                "app_status" => 3
            ],
            [
                "id" => 33772,
                "app_status" => 3
            ],
            [
                "id" => 33775,
                "app_status" => 3
            ],
            [
                "id" => 33778,
                "app_status" => 3
            ],
            [
                "id" => 33779,
                "app_status" => 3
            ],
            [
                "id" => 33782,
                "app_status" => 3
            ],
            [
                "id" => 33784,
                "app_status" => 3
            ],
            [
                "id" => 33788,
                "app_status" => 3
            ],
            [
                "id" => 33789,
                "app_status" => 3
            ],
            [
                "id" => 33790,
                "app_status" => 3
            ],
            [
                "id" => 33793,
                "app_status" => 3
            ],
            [
                "id" => 33794,
                "app_status" => 3
            ],
            [
                "id" => 33795,
                "app_status" => 3
            ],
            [
                "id" => 33797,
                "app_status" => 3
            ],
            [
                "id" => 33800,
                "app_status" => 3
            ],
            [
                "id" => 33803,
                "app_status" => 3
            ],
            [
                "id" => 33804,
                "app_status" => 3
            ],
            [
                "id" => 33811,
                "app_status" => 3
            ],
            [
                "id" => 33817,
                "app_status" => 3
            ],
            [
                "id" => 33824,
                "app_status" => 3
            ],
            [
                "id" => 33830,
                "app_status" => 3
            ],
            [
                "id" => 33835,
                "app_status" => 3
            ],
            [
                "id" => 33836,
                "app_status" => 3
            ],
            [
                "id" => 33840,
                "app_status" => 3
            ],
            [
                "id" => 33845,
                "app_status" => 3
            ],
            [
                "id" => 33848,
                "app_status" => 3
            ],
            [
                "id" => 33851,
                "app_status" => 3
            ],
            [
                "id" => 33853,
                "app_status" => 3
            ],
            [
                "id" => 33862,
                "app_status" => 3
            ],
            [
                "id" => 33866,
                "app_status" => 3
            ],
            [
                "id" => 33870,
                "app_status" => 3
            ],
            [
                "id" => 33871,
                "app_status" => 3
            ],
            [
                "id" => 33872,
                "app_status" => 3
            ],
            [
                "id" => 33875,
                "app_status" => 3
            ],
            [
                "id" => 33880,
                "app_status" => 3
            ],
            [
                "id" => 33889,
                "app_status" => 3
            ],
            [
                "id" => 33892,
                "app_status" => 3
            ],
            [
                "id" => 33893,
                "app_status" => 3
            ],
            [
                "id" => 33894,
                "app_status" => 3
            ],
            [
                "id" => 33895,
                "app_status" => 3
            ],
            [
                "id" => 33898,
                "app_status" => 3
            ],
            [
                "id" => 33902,
                "app_status" => 3
            ],
            [
                "id" => 33903,
                "app_status" => 3
            ],
            [
                "id" => 33905,
                "app_status" => 3
            ],
            [
                "id" => 33907,
                "app_status" => 3
            ],
            [
                "id" => 33910,
                "app_status" => 3
            ],
            [
                "id" => 33911,
                "app_status" => 3
            ],
            [
                "id" => 33915,
                "app_status" => 3
            ],
            [
                "id" => 33921,
                "app_status" => 3
            ],
            [
                "id" => 33926,
                "app_status" => 3
            ],
            [
                "id" => 33928,
                "app_status" => 3
            ],
            [
                "id" => 33929,
                "app_status" => 3
            ],
            [
                "id" => 33934,
                "app_status" => 3
            ],
            [
                "id" => 33937,
                "app_status" => 3
            ],
            [
                "id" => 33939,
                "app_status" => 3
            ],
            [
                "id" => 33943,
                "app_status" => 3
            ],
            [
                "id" => 33954,
                "app_status" => 3
            ],
            [
                "id" => 33958,
                "app_status" => 3
            ],
            [
                "id" => 33960,
                "app_status" => 3
            ],
            [
                "id" => 33962,
                "app_status" => 3
            ],
            [
                "id" => 33963,
                "app_status" => 3
            ],
            [
                "id" => 33966,
                "app_status" => 3
            ],
            [
                "id" => 33969,
                "app_status" => 3
            ],
            [
                "id" => 33970,
                "app_status" => 3
            ],
            [
                "id" => 33972,
                "app_status" => 3
            ],
            [
                "id" => 33973,
                "app_status" => 3
            ],
            [
                "id" => 33974,
                "app_status" => 3
            ],
            [
                "id" => 33981,
                "app_status" => 3
            ],
            [
                "id" => 33984,
                "app_status" => 3
            ],
            [
                "id" => 33989,
                "app_status" => 3
            ],
            [
                "id" => 34000,
                "app_status" => 3
            ],
            [
                "id" => 34004,
                "app_status" => 3
            ],
            [
                "id" => 34007,
                "app_status" => 3
            ],
            [
                "id" => 34014,
                "app_status" => 3
            ],
            [
                "id" => 34015,
                "app_status" => 3
            ],
            [
                "id" => 34020,
                "app_status" => 3
            ],
            [
                "id" => 34021,
                "app_status" => 3
            ],
            [
                "id" => 34025,
                "app_status" => 3
            ],
            [
                "id" => 34033,
                "app_status" => 3
            ],
            [
                "id" => 34042,
                "app_status" => 3
            ],
            [
                "id" => 34043,
                "app_status" => 3
            ],
            [
                "id" => 34044,
                "app_status" => 3
            ],
            [
                "id" => 34054,
                "app_status" => 3
            ],
            [
                "id" => 34070,
                "app_status" => 3
            ],
            [
                "id" => 34073,
                "app_status" => 3
            ],
            [
                "id" => 34079,
                "app_status" => 3
            ],
            [
                "id" => 34080,
                "app_status" => 3
            ],
            [
                "id" => 34081,
                "app_status" => 3
            ],
            [
                "id" => 34090,
                "app_status" => 3
            ],
            [
                "id" => 34095,
                "app_status" => 3
            ],
            [
                "id" => 34115,
                "app_status" => 3
            ],
            [
                "id" => 34120,
                "app_status" => 3
            ],
            [
                "id" => 34124,
                "app_status" => 3
            ],
            [
                "id" => 34125,
                "app_status" => 3
            ],
            [
                "id" => 34132,
                "app_status" => 3
            ],
            [
                "id" => 34134,
                "app_status" => 3
            ],
            [
                "id" => 34144,
                "app_status" => 3
            ],
            [
                "id" => 34146,
                "app_status" => 3
            ],
            [
                "id" => 34151,
                "app_status" => 3
            ],
            [
                "id" => 34152,
                "app_status" => 3
            ],
            [
                "id" => 34159,
                "app_status" => 3
            ],
            [
                "id" => 34168,
                "app_status" => 3
            ],
            [
                "id" => 34170,
                "app_status" => 3
            ],
            [
                "id" => 34172,
                "app_status" => 3
            ],
            [
                "id" => 34173,
                "app_status" => 3
            ],
            [
                "id" => 34177,
                "app_status" => 3
            ],
            [
                "id" => 34183,
                "app_status" => 3
            ],
            [
                "id" => 34191,
                "app_status" => 3
            ],
            [
                "id" => 34196,
                "app_status" => 3
            ],
            [
                "id" => 34199,
                "app_status" => 3
            ],
            [
                "id" => 34207,
                "app_status" => 3
            ],
            [
                "id" => 34211,
                "app_status" => 3
            ],
            [
                "id" => 34221,
                "app_status" => 3
            ],
            [
                "id" => 34233,
                "app_status" => 3
            ],
            [
                "id" => 34235,
                "app_status" => 3
            ],
            [
                "id" => 34236,
                "app_status" => 3
            ],
            [
                "id" => 34238,
                "app_status" => 3
            ],
            [
                "id" => 34250,
                "app_status" => 3
            ],
            [
                "id" => 34261,
                "app_status" => 3
            ],
            [
                "id" => 34271,
                "app_status" => 3
            ],
            [
                "id" => 34277,
                "app_status" => 3
            ],
            [
                "id" => 34284,
                "app_status" => 3
            ],
            [
                "id" => 34286,
                "app_status" => 3
            ],
            [
                "id" => 34292,
                "app_status" => 3
            ],
            [
                "id" => 34304,
                "app_status" => 3
            ],
            [
                "id" => 34305,
                "app_status" => 3
            ],
            [
                "id" => 34314,
                "app_status" => 3
            ],
            [
                "id" => 34317,
                "app_status" => 3
            ],
            [
                "id" => 34325,
                "app_status" => 3
            ],
            [
                "id" => 34330,
                "app_status" => 3
            ],
            [
                "id" => 34336,
                "app_status" => 3
            ],
            [
                "id" => 34338,
                "app_status" => 3
            ],
            [
                "id" => 34339,
                "app_status" => 3
            ],
            [
                "id" => 34345,
                "app_status" => 3
            ],
            [
                "id" => 34348,
                "app_status" => 3
            ],
            [
                "id" => 34370,
                "app_status" => 3
            ],
            [
                "id" => 34375,
                "app_status" => 3
            ],
            [
                "id" => 34382,
                "app_status" => 3
            ],
            [
                "id" => 34385,
                "app_status" => 3
            ],
            [
                "id" => 34390,
                "app_status" => 3
            ],
            [
                "id" => 34399,
                "app_status" => 3
            ],
            [
                "id" => 34414,
                "app_status" => 3
            ],
            [
                "id" => 34429,
                "app_status" => 3
            ],
            [
                "id" => 34431,
                "app_status" => 3
            ],
            [
                "id" => 34435,
                "app_status" => 3
	]
];



foreach($app_status as $res){
            //echo $res['p45'];
            User::where('id',$res['id'])->update(['exportP45'=>$res['app_status']]);
        }
        //User::where('id',117)->update(['markAsp45'=>1]);
        //User::insert($pFortyFive);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
}


}
