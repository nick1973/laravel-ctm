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
        
        //return References::all();
        ini_set('max_execution_time', 10000);
        //ini_set('request_terminate_timeout ', 10000);
        ini_set('memory_limit','2048M');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
          $rtw = [
	[
		"id" => 13342,
		"user_id" => 17146,
		"work_status" => "European National"
	],
	[
		"id" => 14491,
		"user_id" => 18295,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4828,
		"user_id" => 7136,
		"work_status" => "European National"
	],
	[
		"id" => 14082,
		"user_id" => 17886,
		"work_status" => "European National"
	],
	[
		"id" => 5043,
		"user_id" => 7351,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15139,
		"user_id" => 18943,
		"work_status" => "Non European National"
	],
	[
		"id" => 4974,
		"user_id" => 7282,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19566,
		"user_id" => 24113,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5076,
		"user_id" => 7384,
		"work_status" => "Non European National"
	],
	[
		"id" => 13238,
		"user_id" => 17042,
		"work_status" => "European National"
	],
	[
		"id" => 19821,
		"user_id" => 24368,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18794,
		"user_id" => 23341,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14142,
		"user_id" => 17946,
		"work_status" => "Non European National"
	],
	[
		"id" => 15200,
		"user_id" => 19004,
		"work_status" => "European National"
	],
	[
		"id" => 19395,
		"user_id" => 23942,
		"work_status" => "European National"
	],
	[
		"id" => 18909,
		"user_id" => 23456,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19377,
		"user_id" => 23924,
		"work_status" => "Non European National"
	],
	[
		"id" => 4885,
		"user_id" => 7193,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13937,
		"user_id" => 17741,
		"work_status" => "Non European National"
	],
	[
		"id" => 19571,
		"user_id" => 24118,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25818,
		"user_id" => 31937,
		"work_status" => "European National"
	],
	[
		"id" => 5174,
		"user_id" => 7482,
		"work_status" => "0"
	],
	[
		"id" => 19526,
		"user_id" => 24073,
		"work_status" => "European National"
	],
	[
		"id" => 15138,
		"user_id" => 18942,
		"work_status" => "European National"
	],
	[
		"id" => 12203,
		"user_id" => 15843,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19201,
		"user_id" => 23748,
		"work_status" => "Non European National"
	],
	[
		"id" => 4850,
		"user_id" => 7158,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5120,
		"user_id" => 7428,
		"work_status" => "European National"
	],
	[
		"id" => 5042,
		"user_id" => 7350,
		"work_status" => "0"
	],
	[
		"id" => 5044,
		"user_id" => 7352,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7106,
		"user_id" => 9767,
		"work_status" => "Non European National"
	],
	[
		"id" => 13161,
		"user_id" => 16965,
		"work_status" => "Non European National"
	],
	[
		"id" => 4874,
		"user_id" => 7182,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15229,
		"user_id" => 19033,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13179,
		"user_id" => 16983,
		"work_status" => "Non European National"
	],
	[
		"id" => 5287,
		"user_id" => 7595,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22622,
		"user_id" => 28148,
		"work_status" => "Non European National"
	],
	[
		"id" => 4903,
		"user_id" => 7211,
		"work_status" => "European National"
	],
	[
		"id" => 22206,
		"user_id" => 27732,
		"work_status" => "Non European National"
	],
	[
		"id" => 16641,
		"user_id" => 21075,
		"work_status" => "Non European National"
	],
	[
		"id" => 22532,
		"user_id" => 28058,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8941,
		"user_id" => 12439,
		"work_status" => "0"
	],
	[
		"id" => 5224,
		"user_id" => 7532,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14427,
		"user_id" => 18231,
		"work_status" => "European National"
	],
	[
		"id" => 15370,
		"user_id" => 19174,
		"work_status" => "Non European National"
	],
	[
		"id" => 15333,
		"user_id" => 19137,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22431,
		"user_id" => 27957,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5205,
		"user_id" => 7513,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16766,
		"user_id" => 21248,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15034,
		"user_id" => 18838,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16742,
		"user_id" => 21224,
		"work_status" => "Non European National"
	],
	[
		"id" => 14548,
		"user_id" => 18352,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14578,
		"user_id" => 18382,
		"work_status" => "European National"
	],
	[
		"id" => 14746,
		"user_id" => 18550,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15149,
		"user_id" => 18953,
		"work_status" => "European National"
	],
	[
		"id" => 14935,
		"user_id" => 18739,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4924,
		"user_id" => 7232,
		"work_status" => "European National"
	],
	[
		"id" => 18994,
		"user_id" => 23541,
		"work_status" => "Non European National"
	],
	[
		"id" => 16791,
		"user_id" => 21273,
		"work_status" => "Non European National"
	],
	[
		"id" => 13332,
		"user_id" => 17136,
		"work_status" => "Non European National"
	],
	[
		"id" => 19555,
		"user_id" => 24102,
		"work_status" => "Non European National"
	],
	[
		"id" => 5126,
		"user_id" => 7434,
		"work_status" => "Non European National"
	],
	[
		"id" => 5243,
		"user_id" => 7551,
		"work_status" => "Non European National"
	],
	[
		"id" => 12185,
		"user_id" => 15825,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4969,
		"user_id" => 7277,
		"work_status" => "European National"
	],
	[
		"id" => 5206,
		"user_id" => 7514,
		"work_status" => "Non European National"
	],
	[
		"id" => 5003,
		"user_id" => 7311,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13909,
		"user_id" => 17713,
		"work_status" => "European National"
	],
	[
		"id" => 13359,
		"user_id" => 17163,
		"work_status" => "Non European National"
	],
	[
		"id" => 16754,
		"user_id" => 21236,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13194,
		"user_id" => 16998,
		"work_status" => "Non European National"
	],
	[
		"id" => 22885,
		"user_id" => 28411,
		"work_status" => "Non European National"
	],
	[
		"id" => 12507,
		"user_id" => 16147,
		"work_status" => "European National"
	],
	[
		"id" => 13733,
		"user_id" => 17537,
		"work_status" => "0"
	],
	[
		"id" => 19075,
		"user_id" => 23622,
		"work_status" => "Non European National"
	],
	[
		"id" => 5495,
		"user_id" => 7803,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5255,
		"user_id" => 7563,
		"work_status" => "European National"
	],
	[
		"id" => 5151,
		"user_id" => 7459,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13764,
		"user_id" => 17568,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14662,
		"user_id" => 18466,
		"work_status" => "European National"
	],
	[
		"id" => 12008,
		"user_id" => 15648,
		"work_status" => "Non European National"
	],
	[
		"id" => 8608,
		"user_id" => 11902,
		"work_status" => "European National"
	],
	[
		"id" => 14734,
		"user_id" => 18538,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13698,
		"user_id" => 17502,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4929,
		"user_id" => 7237,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13341,
		"user_id" => 17145,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4852,
		"user_id" => 7160,
		"work_status" => "Non European National"
	],
	[
		"id" => 5177,
		"user_id" => 7485,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23200,
		"user_id" => 28726,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24974,
		"user_id" => 30556,
		"work_status" => "0"
	],
	[
		"id" => 24975,
		"user_id" => 30555,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16752,
		"user_id" => 21234,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5116,
		"user_id" => 7424,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12350,
		"user_id" => 15990,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5033,
		"user_id" => 7341,
		"work_status" => "Non European National"
	],
	[
		"id" => 13552,
		"user_id" => 17356,
		"work_status" => "0"
	],
	[
		"id" => 13912,
		"user_id" => 17716,
		"work_status" => "Non European National"
	],
	[
		"id" => 5257,
		"user_id" => 7565,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23696,
		"user_id" => 29260,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5230,
		"user_id" => 7538,
		"work_status" => "Non European National"
	],
	[
		"id" => 19093,
		"user_id" => 23640,
		"work_status" => "Non European National"
	],
	[
		"id" => 5238,
		"user_id" => 7546,
		"work_status" => "Non European National"
	],
	[
		"id" => 16814,
		"user_id" => 21296,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19334,
		"user_id" => 23881,
		"work_status" => "European National"
	],
	[
		"id" => 13454,
		"user_id" => 17258,
		"work_status" => "Non European National"
	],
	[
		"id" => 19404,
		"user_id" => 23951,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24689,
		"user_id" => 30253,
		"work_status" => "Non European National"
	],
	[
		"id" => 14305,
		"user_id" => 18109,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23627,
		"user_id" => 29191,
		"work_status" => "European National"
	],
	[
		"id" => 14372,
		"user_id" => 18176,
		"work_status" => "European National"
	],
	[
		"id" => 14972,
		"user_id" => 18776,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5260,
		"user_id" => 7568,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14655,
		"user_id" => 18459,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4892,
		"user_id" => 7200,
		"work_status" => "European National"
	],
	[
		"id" => 5261,
		"user_id" => 7569,
		"work_status" => "Non European National"
	],
	[
		"id" => 4876,
		"user_id" => 7184,
		"work_status" => "Non European National"
	],
	[
		"id" => 12144,
		"user_id" => 15784,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18809,
		"user_id" => 23356,
		"work_status" => "Non European National"
	],
	[
		"id" => 21984,
		"user_id" => 27510,
		"work_status" => "Non European National"
	],
	[
		"id" => 19421,
		"user_id" => 23968,
		"work_status" => "Non European National"
	],
	[
		"id" => 23846,
		"user_id" => 29410,
		"work_status" => "Non European National"
	],
	[
		"id" => 19306,
		"user_id" => 23853,
		"work_status" => "Non European National"
	],
	[
		"id" => 14754,
		"user_id" => 18558,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18971,
		"user_id" => 23518,
		"work_status" => "Non European National"
	],
	[
		"id" => 13389,
		"user_id" => 17193,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4820,
		"user_id" => 7128,
		"work_status" => "Non European National"
	],
	[
		"id" => 15359,
		"user_id" => 19163,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4798,
		"user_id" => 7106,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4835,
		"user_id" => 7143,
		"work_status" => "Non European National"
	],
	[
		"id" => 15132,
		"user_id" => 18936,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14728,
		"user_id" => 18532,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22815,
		"user_id" => 28341,
		"work_status" => "Non European National"
	],
	[
		"id" => 5081,
		"user_id" => 7389,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14452,
		"user_id" => 18256,
		"work_status" => "Non European National"
	],
	[
		"id" => 19105,
		"user_id" => 23652,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5197,
		"user_id" => 7505,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26864,
		"user_id" => 33443,
		"work_status" => "Non European National"
	],
	[
		"id" => 23581,
		"user_id" => 29145,
		"work_status" => "Non European National"
	],
	[
		"id" => 4881,
		"user_id" => 7189,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5015,
		"user_id" => 7323,
		"work_status" => "European National"
	],
	[
		"id" => 25220,
		"user_id" => 30922,
		"work_status" => "0"
	],
	[
		"id" => 25221,
		"user_id" => 30921,
		"work_status" => "Non European National"
	],
	[
		"id" => 242,
		"user_id" => 117,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20087,
		"user_id" => 24729,
		"work_status" => "Non European National"
	],
	[
		"id" => 20088,
		"user_id" => 24732,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14615,
		"user_id" => 18419,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22242,
		"user_id" => 27768,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15191,
		"user_id" => 18995,
		"work_status" => "Non European National"
	],
	[
		"id" => 8752,
		"user_id" => 12135,
		"work_status" => "0"
	],
	[
		"id" => 14553,
		"user_id" => 18357,
		"work_status" => "European National"
	],
	[
		"id" => 13257,
		"user_id" => 17061,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19545,
		"user_id" => 24092,
		"work_status" => "European National"
	],
	[
		"id" => 13988,
		"user_id" => 17792,
		"work_status" => "Non European National"
	],
	[
		"id" => 14495,
		"user_id" => 18299,
		"work_status" => "Non European National"
	],
	[
		"id" => 13216,
		"user_id" => 17020,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13431,
		"user_id" => 17235,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12597,
		"user_id" => 12625,
		"work_status" => "Non European National"
	],
	[
		"id" => 5383,
		"user_id" => 7691,
		"work_status" => "Non European National"
	],
	[
		"id" => 13234,
		"user_id" => 17038,
		"work_status" => "Non European National"
	],
	[
		"id" => 5208,
		"user_id" => 7516,
		"work_status" => "0"
	],
	[
		"id" => 14472,
		"user_id" => 18276,
		"work_status" => "Non European National"
	],
	[
		"id" => 5142,
		"user_id" => 7450,
		"work_status" => "Non European National"
	],
	[
		"id" => 4988,
		"user_id" => 7296,
		"work_status" => "European National"
	],
	[
		"id" => 5173,
		"user_id" => 7481,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22119,
		"user_id" => 27645,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12693,
		"user_id" => 16308,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4966,
		"user_id" => 7274,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22359,
		"user_id" => 27885,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5009,
		"user_id" => 7317,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5266,
		"user_id" => 7574,
		"work_status" => "European National"
	],
	[
		"id" => 21791,
		"user_id" => 27317,
		"work_status" => "0"
	],
	[
		"id" => 21793,
		"user_id" => 27319,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8663,
		"user_id" => 11988,
		"work_status" => "0"
	],
	[
		"id" => 5290,
		"user_id" => 7598,
		"work_status" => "Non European National"
	],
	[
		"id" => 13250,
		"user_id" => 17054,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14405,
		"user_id" => 18209,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5269,
		"user_id" => 7577,
		"work_status" => "European National"
	],
	[
		"id" => 4839,
		"user_id" => 7147,
		"work_status" => "Non European National"
	],
	[
		"id" => 22131,
		"user_id" => 27657,
		"work_status" => "Non European National"
	],
	[
		"id" => 21904,
		"user_id" => 27430,
		"work_status" => "Non European National"
	],
	[
		"id" => 5182,
		"user_id" => 7490,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24583,
		"user_id" => 30147,
		"work_status" => "Non European National"
	],
	[
		"id" => 24408,
		"user_id" => 29972,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14112,
		"user_id" => 17916,
		"work_status" => "European National"
	],
	[
		"id" => 16781,
		"user_id" => 21263,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16825,
		"user_id" => 21308,
		"work_status" => "Non European National"
	],
	[
		"id" => 14414,
		"user_id" => 18218,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23729,
		"user_id" => 29293,
		"work_status" => "European National"
	],
	[
		"id" => 13528,
		"user_id" => 17332,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4937,
		"user_id" => 7245,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13324,
		"user_id" => 17128,
		"work_status" => "European National"
	],
	[
		"id" => 5090,
		"user_id" => 7398,
		"work_status" => "European National"
	],
	[
		"id" => 19487,
		"user_id" => 24034,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19626,
		"user_id" => 24173,
		"work_status" => "Non European National"
	],
	[
		"id" => 5111,
		"user_id" => 7419,
		"work_status" => "Non European National"
	],
	[
		"id" => 16783,
		"user_id" => 21265,
		"work_status" => "European National"
	],
	[
		"id" => 26445,
		"user_id" => 32841,
		"work_status" => "Non European National"
	],
	[
		"id" => 25823,
		"user_id" => 31942,
		"work_status" => "European National"
	],
	[
		"id" => 5248,
		"user_id" => 7556,
		"work_status" => "European National"
	],
	[
		"id" => 5216,
		"user_id" => 7524,
		"work_status" => "European National"
	],
	[
		"id" => 13690,
		"user_id" => 17494,
		"work_status" => "Non European National"
	],
	[
		"id" => 16747,
		"user_id" => 21229,
		"work_status" => "0"
	],
	[
		"id" => 5171,
		"user_id" => 7479,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14731,
		"user_id" => 18535,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14226,
		"user_id" => 18030,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5136,
		"user_id" => 7444,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14506,
		"user_id" => 18310,
		"work_status" => "Non European National"
	],
	[
		"id" => 5004,
		"user_id" => 7312,
		"work_status" => "European National"
	],
	[
		"id" => 5422,
		"user_id" => 7730,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16784,
		"user_id" => 21266,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5069,
		"user_id" => 7377,
		"work_status" => "European National"
	],
	[
		"id" => 13895,
		"user_id" => 17699,
		"work_status" => "Non European National"
	],
	[
		"id" => 24585,
		"user_id" => 30149,
		"work_status" => "European National"
	],
	[
		"id" => 19033,
		"user_id" => 23580,
		"work_status" => "European National"
	],
	[
		"id" => 5272,
		"user_id" => 7580,
		"work_status" => "European National"
	],
	[
		"id" => 4978,
		"user_id" => 7286,
		"work_status" => "Non European National"
	],
	[
		"id" => 16844,
		"user_id" => 21327,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15057,
		"user_id" => 18861,
		"work_status" => "European National"
	],
	[
		"id" => 5291,
		"user_id" => 7599,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14071,
		"user_id" => 17875,
		"work_status" => "Non European National"
	],
	[
		"id" => 14835,
		"user_id" => 18639,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5057,
		"user_id" => 7365,
		"work_status" => "European National"
	],
	[
		"id" => 14908,
		"user_id" => 18712,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23873,
		"user_id" => 29437,
		"work_status" => "European National"
	],
	[
		"id" => 24703,
		"user_id" => 30267,
		"work_status" => "European National"
	],
	[
		"id" => 13334,
		"user_id" => 17138,
		"work_status" => "Non European National"
	],
	[
		"id" => 16695,
		"user_id" => 21158,
		"work_status" => "0"
	],
	[
		"id" => 19346,
		"user_id" => 23893,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13165,
		"user_id" => 16969,
		"work_status" => "0"
	],
	[
		"id" => 4870,
		"user_id" => 7178,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5153,
		"user_id" => 7461,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16826,
		"user_id" => 21309,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6740,
		"user_id" => 9265,
		"work_status" => "Non European National"
	],
	[
		"id" => 13425,
		"user_id" => 17229,
		"work_status" => "European National"
	],
	[
		"id" => 23474,
		"user_id" => 29038,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19511,
		"user_id" => 24058,
		"work_status" => "European National"
	],
	[
		"id" => 14370,
		"user_id" => 18174,
		"work_status" => "European National"
	],
	[
		"id" => 16800,
		"user_id" => 21282,
		"work_status" => "European National"
	],
	[
		"id" => 15306,
		"user_id" => 19110,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5644,
		"user_id" => 7952,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14549,
		"user_id" => 18353,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5293,
		"user_id" => 7601,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25802,
		"user_id" => 31921,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5465,
		"user_id" => 7773,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19245,
		"user_id" => 23792,
		"work_status" => "European National"
	],
	[
		"id" => 14828,
		"user_id" => 18632,
		"work_status" => "European National"
	],
	[
		"id" => 22469,
		"user_id" => 27995,
		"work_status" => "Non European National"
	],
	[
		"id" => 19482,
		"user_id" => 24029,
		"work_status" => "European National"
	],
	[
		"id" => 4854,
		"user_id" => 7162,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8918,
		"user_id" => 12401,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19572,
		"user_id" => 24119,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19813,
		"user_id" => 24360,
		"work_status" => "Non European National"
	],
	[
		"id" => 16603,
		"user_id" => 21017,
		"work_status" => "0"
	],
	[
		"id" => 19039,
		"user_id" => 23586,
		"work_status" => "Non European National"
	],
	[
		"id" => 4918,
		"user_id" => 7226,
		"work_status" => "European National"
	],
	[
		"id" => 14368,
		"user_id" => 18172,
		"work_status" => "Non European National"
	],
	[
		"id" => 19691,
		"user_id" => 24238,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18940,
		"user_id" => 23487,
		"work_status" => "European National"
	],
	[
		"id" => 4809,
		"user_id" => 7117,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15141,
		"user_id" => 18945,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5035,
		"user_id" => 7343,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20235,
		"user_id" => 24970,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14154,
		"user_id" => 17958,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5039,
		"user_id" => 7347,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13370,
		"user_id" => 17174,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5053,
		"user_id" => 7361,
		"work_status" => "Non European National"
	],
	[
		"id" => 23735,
		"user_id" => 29299,
		"work_status" => "Non European National"
	],
	[
		"id" => 14898,
		"user_id" => 18702,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12472,
		"user_id" => 16112,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14532,
		"user_id" => 18336,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15342,
		"user_id" => 19146,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5228,
		"user_id" => 7536,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13963,
		"user_id" => 17767,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14787,
		"user_id" => 18591,
		"work_status" => "European National"
	],
	[
		"id" => 19801,
		"user_id" => 24348,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5246,
		"user_id" => 7554,
		"work_status" => "Non European National"
	],
	[
		"id" => 5277,
		"user_id" => 7585,
		"work_status" => "European National"
	],
	[
		"id" => 5294,
		"user_id" => 7602,
		"work_status" => "European National"
	],
	[
		"id" => 14014,
		"user_id" => 17818,
		"work_status" => "European National"
	],
	[
		"id" => 14234,
		"user_id" => 18038,
		"work_status" => "Non European National"
	],
	[
		"id" => 4879,
		"user_id" => 7187,
		"work_status" => "Non European National"
	],
	[
		"id" => 22550,
		"user_id" => 28076,
		"work_status" => "European National"
	],
	[
		"id" => 14487,
		"user_id" => 18291,
		"work_status" => "Non European National"
	],
	[
		"id" => 15393,
		"user_id" => 19197,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19268,
		"user_id" => 23815,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14667,
		"user_id" => 18471,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12202,
		"user_id" => 15842,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18784,
		"user_id" => 23331,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13934,
		"user_id" => 17738,
		"work_status" => "Non European National"
	],
	[
		"id" => 13776,
		"user_id" => 17580,
		"work_status" => "Non European National"
	],
	[
		"id" => 23514,
		"user_id" => 29078,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19887,
		"user_id" => 24434,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16762,
		"user_id" => 21244,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19444,
		"user_id" => 23991,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5279,
		"user_id" => 7587,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14343,
		"user_id" => 18147,
		"work_status" => "Non European National"
	],
	[
		"id" => 14618,
		"user_id" => 18422,
		"work_status" => "Non European National"
	],
	[
		"id" => 16845,
		"user_id" => 21328,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4986,
		"user_id" => 7294,
		"work_status" => "Non European National"
	],
	[
		"id" => 13535,
		"user_id" => 17339,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16794,
		"user_id" => 21276,
		"work_status" => "European National"
	],
	[
		"id" => 22857,
		"user_id" => 28383,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4909,
		"user_id" => 7217,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13184,
		"user_id" => 16988,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4920,
		"user_id" => 7228,
		"work_status" => "European National"
	],
	[
		"id" => 15069,
		"user_id" => 18873,
		"work_status" => "Non European National"
	],
	[
		"id" => 14781,
		"user_id" => 18585,
		"work_status" => "European National"
	],
	[
		"id" => 19330,
		"user_id" => 23877,
		"work_status" => "European National"
	],
	[
		"id" => 23191,
		"user_id" => 28717,
		"work_status" => "European National"
	],
	[
		"id" => 16776,
		"user_id" => 21258,
		"work_status" => "Non European National"
	],
	[
		"id" => 14653,
		"user_id" => 18457,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13848,
		"user_id" => 17652,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15169,
		"user_id" => 18973,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13663,
		"user_id" => 17467,
		"work_status" => "European National"
	],
	[
		"id" => 15171,
		"user_id" => 18975,
		"work_status" => "European National"
	],
	[
		"id" => 13287,
		"user_id" => 17091,
		"work_status" => "Non European National"
	],
	[
		"id" => 14670,
		"user_id" => 18474,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16830,
		"user_id" => 21313,
		"work_status" => "European National"
	],
	[
		"id" => 13824,
		"user_id" => 17628,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16862,
		"user_id" => 21345,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15212,
		"user_id" => 19016,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14140,
		"user_id" => 17944,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15180,
		"user_id" => 18984,
		"work_status" => "European National"
	],
	[
		"id" => 5134,
		"user_id" => 7442,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23761,
		"user_id" => 29325,
		"work_status" => "Non European National"
	],
	[
		"id" => 22959,
		"user_id" => 28485,
		"work_status" => "Non European National"
	],
	[
		"id" => 5281,
		"user_id" => 7589,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19018,
		"user_id" => 23565,
		"work_status" => "European National"
	],
	[
		"id" => 13905,
		"user_id" => 17709,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5547,
		"user_id" => 7855,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5282,
		"user_id" => 7590,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5624,
		"user_id" => 7932,
		"work_status" => "European National"
	],
	[
		"id" => 12153,
		"user_id" => 15793,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14808,
		"user_id" => 18612,
		"work_status" => "Non European National"
	],
	[
		"id" => 15074,
		"user_id" => 18878,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13885,
		"user_id" => 17689,
		"work_status" => "0"
	],
	[
		"id" => 13163,
		"user_id" => 16967,
		"work_status" => "European National"
	],
	[
		"id" => 20156,
		"user_id" => 24855,
		"work_status" => "0"
	],
	[
		"id" => 20157,
		"user_id" => 24858,
		"work_status" => "0"
	],
	[
		"id" => 5124,
		"user_id" => 7432,
		"work_status" => "European National"
	],
	[
		"id" => 13484,
		"user_id" => 17288,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5163,
		"user_id" => 7471,
		"work_status" => "European National"
	],
	[
		"id" => 5820,
		"user_id" => 8128,
		"work_status" => "Non European National"
	],
	[
		"id" => 14926,
		"user_id" => 18730,
		"work_status" => "European National"
	],
	[
		"id" => 22843,
		"user_id" => 28369,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14126,
		"user_id" => 17930,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14587,
		"user_id" => 18391,
		"work_status" => "Non European National"
	],
	[
		"id" => 5021,
		"user_id" => 7329,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16833,
		"user_id" => 21316,
		"work_status" => "European National"
	],
	[
		"id" => 15275,
		"user_id" => 19079,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19262,
		"user_id" => 23809,
		"work_status" => "Non European National"
	],
	[
		"id" => 13319,
		"user_id" => 17123,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14576,
		"user_id" => 18380,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4863,
		"user_id" => 7171,
		"work_status" => "Non European National"
	],
	[
		"id" => 5218,
		"user_id" => 7526,
		"work_status" => "Non European National"
	],
	[
		"id" => 16724,
		"user_id" => 21194,
		"work_status" => "0"
	],
	[
		"id" => 24385,
		"user_id" => 29949,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14322,
		"user_id" => 18126,
		"work_status" => "European National"
	],
	[
		"id" => 16852,
		"user_id" => 21335,
		"work_status" => "Non European National"
	],
	[
		"id" => 16883,
		"user_id" => 21368,
		"work_status" => "0"
	],
	[
		"id" => 4813,
		"user_id" => 7121,
		"work_status" => "European National"
	],
	[
		"id" => 13171,
		"user_id" => 16975,
		"work_status" => "Non European National"
	],
	[
		"id" => 14075,
		"user_id" => 17879,
		"work_status" => "European National"
	],
	[
		"id" => 19300,
		"user_id" => 23847,
		"work_status" => "Non European National"
	],
	[
		"id" => 5220,
		"user_id" => 7528,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19822,
		"user_id" => 24369,
		"work_status" => "European National"
	],
	[
		"id" => 16819,
		"user_id" => 21301,
		"work_status" => "Non European National"
	],
	[
		"id" => 14267,
		"user_id" => 18071,
		"work_status" => "Non European National"
	],
	[
		"id" => 23614,
		"user_id" => 29178,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15221,
		"user_id" => 19025,
		"work_status" => "European National"
	],
	[
		"id" => 12056,
		"user_id" => 15696,
		"work_status" => "Non European National"
	],
	[
		"id" => 4989,
		"user_id" => 7297,
		"work_status" => "Non European National"
	],
	[
		"id" => 14336,
		"user_id" => 18140,
		"work_status" => "Non European National"
	],
	[
		"id" => 16817,
		"user_id" => 21299,
		"work_status" => "European National"
	],
	[
		"id" => 16771,
		"user_id" => 21253,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5176,
		"user_id" => 7484,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13867,
		"user_id" => 17671,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5147,
		"user_id" => 7455,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18586,
		"user_id" => 23079,
		"work_status" => "European National"
	],
	[
		"id" => 24739,
		"user_id" => 30303,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20099,
		"user_id" => 24750,
		"work_status" => "0"
	],
	[
		"id" => 20100,
		"user_id" => 24751,
		"work_status" => "0"
	],
	[
		"id" => 14912,
		"user_id" => 18716,
		"work_status" => "European National"
	],
	[
		"id" => 23653,
		"user_id" => 29217,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4945,
		"user_id" => 7253,
		"work_status" => "Non European National"
	],
	[
		"id" => 13255,
		"user_id" => 17059,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16745,
		"user_id" => 21227,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5299,
		"user_id" => 7607,
		"work_status" => "European National"
	],
	[
		"id" => 5300,
		"user_id" => 7608,
		"work_status" => "Non European National"
	],
	[
		"id" => 27028,
		"user_id" => 33644,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13654,
		"user_id" => 17458,
		"work_status" => "Non European National"
	],
	[
		"id" => 5006,
		"user_id" => 7314,
		"work_status" => "European National"
	],
	[
		"id" => 20397,
		"user_id" => 25213,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5020,
		"user_id" => 7328,
		"work_status" => "European National"
	],
	[
		"id" => 14968,
		"user_id" => 18772,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14798,
		"user_id" => 18602,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13630,
		"user_id" => 17434,
		"work_status" => "European National"
	],
	[
		"id" => 15381,
		"user_id" => 19185,
		"work_status" => "Non European National"
	],
	[
		"id" => 16764,
		"user_id" => 21246,
		"work_status" => "European National"
	],
	[
		"id" => 15214,
		"user_id" => 19018,
		"work_status" => "Non European National"
	],
	[
		"id" => 19400,
		"user_id" => 23947,
		"work_status" => "European National"
	],
	[
		"id" => 16775,
		"user_id" => 21257,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4927,
		"user_id" => 7235,
		"work_status" => "0"
	],
	[
		"id" => 16744,
		"user_id" => 21226,
		"work_status" => "European National"
	],
	[
		"id" => 12354,
		"user_id" => 15994,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13517,
		"user_id" => 17321,
		"work_status" => "Non European National"
	],
	[
		"id" => 19277,
		"user_id" => 23824,
		"work_status" => "European National"
	],
	[
		"id" => 5349,
		"user_id" => 7657,
		"work_status" => "Non European National"
	],
	[
		"id" => 8661,
		"user_id" => 11982,
		"work_status" => "0"
	],
	[
		"id" => 23074,
		"user_id" => 28600,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8677,
		"user_id" => 12009,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16834,
		"user_id" => 21317,
		"work_status" => "Non European National"
	],
	[
		"id" => 13438,
		"user_id" => 17242,
		"work_status" => "European National"
	],
	[
		"id" => 19881,
		"user_id" => 24428,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4905,
		"user_id" => 7213,
		"work_status" => "European National"
	],
	[
		"id" => 23665,
		"user_id" => 29229,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5241,
		"user_id" => 7549,
		"work_status" => "European National"
	],
	[
		"id" => 19539,
		"user_id" => 24086,
		"work_status" => "European National"
	],
	[
		"id" => 5347,
		"user_id" => 7655,
		"work_status" => "Non European National"
	],
	[
		"id" => 5303,
		"user_id" => 7611,
		"work_status" => "European National"
	],
	[
		"id" => 5424,
		"user_id" => 7732,
		"work_status" => "European National"
	],
	[
		"id" => 19743,
		"user_id" => 24290,
		"work_status" => "Non European National"
	],
	[
		"id" => 5008,
		"user_id" => 7316,
		"work_status" => "Non European National"
	],
	[
		"id" => 19897,
		"user_id" => 24444,
		"work_status" => "Non European National"
	],
	[
		"id" => 19088,
		"user_id" => 23635,
		"work_status" => "Non European National"
	],
	[
		"id" => 14780,
		"user_id" => 18584,
		"work_status" => "European National"
	],
	[
		"id" => 16818,
		"user_id" => 21300,
		"work_status" => "European National"
	],
	[
		"id" => 14167,
		"user_id" => 17971,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5000,
		"user_id" => 7308,
		"work_status" => "Non European National"
	],
	[
		"id" => 24476,
		"user_id" => 30040,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13243,
		"user_id" => 17047,
		"work_status" => "Non European National"
	],
	[
		"id" => 14911,
		"user_id" => 18715,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16765,
		"user_id" => 21247,
		"work_status" => "European National"
	],
	[
		"id" => 4958,
		"user_id" => 7266,
		"work_status" => "European National"
	],
	[
		"id" => 20114,
		"user_id" => 19919,
		"work_status" => "Non European National"
	],
	[
		"id" => 21655,
		"user_id" => 27107,
		"work_status" => "0"
	],
	[
		"id" => 21656,
		"user_id" => 27108,
		"work_status" => "0"
	],
	[
		"id" => 21657,
		"user_id" => 27109,
		"work_status" => "European National"
	],
	[
		"id" => 16795,
		"user_id" => 21277,
		"work_status" => "European National"
	],
	[
		"id" => 4882,
		"user_id" => 7190,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23065,
		"user_id" => 28591,
		"work_status" => "European National"
	],
	[
		"id" => 23660,
		"user_id" => 29224,
		"work_status" => "Non European National"
	],
	[
		"id" => 5199,
		"user_id" => 7507,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19226,
		"user_id" => 23773,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13160,
		"user_id" => 16964,
		"work_status" => "Non European National"
	],
	[
		"id" => 4965,
		"user_id" => 7273,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5413,
		"user_id" => 7721,
		"work_status" => "Non European National"
	],
	[
		"id" => 13598,
		"user_id" => 17402,
		"work_status" => "European National"
	],
	[
		"id" => 16758,
		"user_id" => 21240,
		"work_status" => "European National"
	],
	[
		"id" => 24400,
		"user_id" => 29964,
		"work_status" => "Non European National"
	],
	[
		"id" => 19156,
		"user_id" => 23703,
		"work_status" => "Non European National"
	],
	[
		"id" => 5466,
		"user_id" => 7774,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18923,
		"user_id" => 23470,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14391,
		"user_id" => 18195,
		"work_status" => "European National"
	],
	[
		"id" => 5444,
		"user_id" => 7752,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18859,
		"user_id" => 23406,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20241,
		"user_id" => 24978,
		"work_status" => "Non European National"
	],
	[
		"id" => 16803,
		"user_id" => 21285,
		"work_status" => "European National"
	],
	[
		"id" => 16809,
		"user_id" => 21291,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12429,
		"user_id" => 16069,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5178,
		"user_id" => 7486,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22398,
		"user_id" => 27924,
		"work_status" => "European National"
	],
	[
		"id" => 19542,
		"user_id" => 24089,
		"work_status" => "European National"
	],
	[
		"id" => 13723,
		"user_id" => 17527,
		"work_status" => "Non European National"
	],
	[
		"id" => 16757,
		"user_id" => 21239,
		"work_status" => "European National"
	],
	[
		"id" => 19446,
		"user_id" => 23993,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13269,
		"user_id" => 17073,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14064,
		"user_id" => 17868,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5318,
		"user_id" => 7626,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14076,
		"user_id" => 17880,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14446,
		"user_id" => 18250,
		"work_status" => "Non European National"
	],
	[
		"id" => 4922,
		"user_id" => 7230,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13499,
		"user_id" => 17303,
		"work_status" => "European National"
	],
	[
		"id" => 5333,
		"user_id" => 7641,
		"work_status" => "Non European National"
	],
	[
		"id" => 15066,
		"user_id" => 18870,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13602,
		"user_id" => 17406,
		"work_status" => "European National"
	],
	[
		"id" => 24569,
		"user_id" => 30133,
		"work_status" => "Non European National"
	],
	[
		"id" => 5467,
		"user_id" => 7775,
		"work_status" => "Non European National"
	],
	[
		"id" => 15311,
		"user_id" => 19115,
		"work_status" => "European National"
	],
	[
		"id" => 23906,
		"user_id" => 29470,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22158,
		"user_id" => 27684,
		"work_status" => "Non European National"
	],
	[
		"id" => 8960,
		"user_id" => 12467,
		"work_status" => "European National"
	],
	[
		"id" => 21829,
		"user_id" => 27355,
		"work_status" => "Non European National"
	],
	[
		"id" => 13358,
		"user_id" => 17162,
		"work_status" => "Non European National"
	],
	[
		"id" => 5843,
		"user_id" => 8151,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16750,
		"user_id" => 21232,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14753,
		"user_id" => 18557,
		"work_status" => "Non European National"
	],
	[
		"id" => 15054,
		"user_id" => 18858,
		"work_status" => "European National"
	],
	[
		"id" => 5236,
		"user_id" => 7544,
		"work_status" => "Non European National"
	],
	[
		"id" => 5322,
		"user_id" => 7630,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19307,
		"user_id" => 23854,
		"work_status" => "European National"
	],
	[
		"id" => 15000,
		"user_id" => 18804,
		"work_status" => "European National"
	],
	[
		"id" => 4947,
		"user_id" => 7255,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19577,
		"user_id" => 24124,
		"work_status" => "European National"
	],
	[
		"id" => 8754,
		"user_id" => 12139,
		"work_status" => "0"
	],
	[
		"id" => 19762,
		"user_id" => 24309,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16807,
		"user_id" => 21289,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19259,
		"user_id" => 23806,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14189,
		"user_id" => 17993,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15379,
		"user_id" => 19183,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24735,
		"user_id" => 30299,
		"work_status" => "Non European National"
	],
	[
		"id" => 13753,
		"user_id" => 17557,
		"work_status" => "European National"
	],
	[
		"id" => 24434,
		"user_id" => 29998,
		"work_status" => "European National"
	],
	[
		"id" => 13315,
		"user_id" => 17119,
		"work_status" => "Non European National"
	],
	[
		"id" => 5323,
		"user_id" => 7631,
		"work_status" => "European National"
	],
	[
		"id" => 13505,
		"user_id" => 17309,
		"work_status" => "Non European National"
	],
	[
		"id" => 13465,
		"user_id" => 17269,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18806,
		"user_id" => 23353,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4875,
		"user_id" => 7183,
		"work_status" => "Non European National"
	],
	[
		"id" => 4872,
		"user_id" => 7180,
		"work_status" => "European National"
	],
	[
		"id" => 14651,
		"user_id" => 18455,
		"work_status" => "Non European National"
	],
	[
		"id" => 15155,
		"user_id" => 18959,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5106,
		"user_id" => 7414,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15351,
		"user_id" => 19155,
		"work_status" => "European National"
	],
	[
		"id" => 19365,
		"user_id" => 23912,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13790,
		"user_id" => 17594,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4833,
		"user_id" => 7141,
		"work_status" => "Non European National"
	],
	[
		"id" => 19227,
		"user_id" => 23774,
		"work_status" => "Non European National"
	],
	[
		"id" => 5101,
		"user_id" => 7409,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23826,
		"user_id" => 29390,
		"work_status" => "Non European National"
	],
	[
		"id" => 21909,
		"user_id" => 27435,
		"work_status" => "Non European National"
	],
	[
		"id" => 14763,
		"user_id" => 18567,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14507,
		"user_id" => 18311,
		"work_status" => "Non European National"
	],
	[
		"id" => 13158,
		"user_id" => 16962,
		"work_status" => "European National"
	],
	[
		"id" => 5351,
		"user_id" => 7659,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14279,
		"user_id" => 18083,
		"work_status" => "Non European National"
	],
	[
		"id" => 14841,
		"user_id" => 18645,
		"work_status" => "European National"
	],
	[
		"id" => 16787,
		"user_id" => 21269,
		"work_status" => "European National"
	],
	[
		"id" => 23518,
		"user_id" => 29082,
		"work_status" => "European National"
	],
	[
		"id" => 14675,
		"user_id" => 18479,
		"work_status" => "Non European National"
	],
	[
		"id" => 8937,
		"user_id" => 12433,
		"work_status" => "European National"
	],
	[
		"id" => 12999,
		"user_id" => 16739,
		"work_status" => "Non European National"
	],
	[
		"id" => 5154,
		"user_id" => 7462,
		"work_status" => "Non European National"
	],
	[
		"id" => 22577,
		"user_id" => 28103,
		"work_status" => "Non European National"
	],
	[
		"id" => 14994,
		"user_id" => 18798,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5386,
		"user_id" => 7694,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13201,
		"user_id" => 17005,
		"work_status" => "European National"
	],
	[
		"id" => 12931,
		"user_id" => 16642,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15110,
		"user_id" => 18914,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19479,
		"user_id" => 24026,
		"work_status" => "European National"
	],
	[
		"id" => 13852,
		"user_id" => 17656,
		"work_status" => "European National"
	],
	[
		"id" => 9085,
		"user_id" => 12663,
		"work_status" => "European National"
	],
	[
		"id" => 18810,
		"user_id" => 23357,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23045,
		"user_id" => 28571,
		"work_status" => "Non European National"
	],
	[
		"id" => 19719,
		"user_id" => 24266,
		"work_status" => "Non European National"
	],
	[
		"id" => 18833,
		"user_id" => 23380,
		"work_status" => "Non European National"
	],
	[
		"id" => 5240,
		"user_id" => 7548,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5001,
		"user_id" => 7309,
		"work_status" => "Non European National"
	],
	[
		"id" => 5214,
		"user_id" => 7522,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5353,
		"user_id" => 7661,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13739,
		"user_id" => 17543,
		"work_status" => "European National"
	],
	[
		"id" => 4836,
		"user_id" => 7144,
		"work_status" => "Non European National"
	],
	[
		"id" => 20239,
		"user_id" => 24973,
		"work_status" => "Non European National"
	],
	[
		"id" => 14715,
		"user_id" => 18519,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4894,
		"user_id" => 7202,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5320,
		"user_id" => 7628,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14821,
		"user_id" => 18625,
		"work_status" => "European National"
	],
	[
		"id" => 5339,
		"user_id" => 7647,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16720,
		"user_id" => 21188,
		"work_status" => "European National"
	],
	[
		"id" => 4993,
		"user_id" => 7301,
		"work_status" => "Non European National"
	],
	[
		"id" => 5202,
		"user_id" => 7510,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22355,
		"user_id" => 27881,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14239,
		"user_id" => 18043,
		"work_status" => "European National"
	],
	[
		"id" => 14176,
		"user_id" => 17980,
		"work_status" => "Non European National"
	],
	[
		"id" => 4815,
		"user_id" => 7123,
		"work_status" => "European National"
	],
	[
		"id" => 18821,
		"user_id" => 23368,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16849,
		"user_id" => 21332,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15047,
		"user_id" => 18851,
		"work_status" => "Non European National"
	],
	[
		"id" => 16793,
		"user_id" => 21275,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18785,
		"user_id" => 23332,
		"work_status" => "European National"
	],
	[
		"id" => 14276,
		"user_id" => 18080,
		"work_status" => "European National"
	],
	[
		"id" => 4840,
		"user_id" => 7148,
		"work_status" => "European National"
	],
	[
		"id" => 14040,
		"user_id" => 17844,
		"work_status" => "Non European National"
	],
	[
		"id" => 5072,
		"user_id" => 7380,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5343,
		"user_id" => 7651,
		"work_status" => "Non European National"
	],
	[
		"id" => 22852,
		"user_id" => 28378,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14674,
		"user_id" => 18478,
		"work_status" => "Non European National"
	],
	[
		"id" => 23266,
		"user_id" => 28792,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5091,
		"user_id" => 7399,
		"work_status" => "European National"
	],
	[
		"id" => 14639,
		"user_id" => 18443,
		"work_status" => "Non European National"
	],
	[
		"id" => 13548,
		"user_id" => 17352,
		"work_status" => "European National"
	],
	[
		"id" => 5025,
		"user_id" => 7333,
		"work_status" => "Non European National"
	],
	[
		"id" => 20169,
		"user_id" => 24871,
		"work_status" => "0"
	],
	[
		"id" => 22300,
		"user_id" => 27826,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5026,
		"user_id" => 7334,
		"work_status" => "European National"
	],
	[
		"id" => 5223,
		"user_id" => 7531,
		"work_status" => "Non European National"
	],
	[
		"id" => 14522,
		"user_id" => 18326,
		"work_status" => "Non European National"
	],
	[
		"id" => 16780,
		"user_id" => 21262,
		"work_status" => "European National"
	],
	[
		"id" => 19096,
		"user_id" => 23643,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14967,
		"user_id" => 18771,
		"work_status" => "European National"
	],
	[
		"id" => 13840,
		"user_id" => 17644,
		"work_status" => "European National"
	],
	[
		"id" => 16804,
		"user_id" => 21286,
		"work_status" => "European National"
	],
	[
		"id" => 22511,
		"user_id" => 28037,
		"work_status" => "Non European National"
	],
	[
		"id" => 14772,
		"user_id" => 18576,
		"work_status" => "European National"
	],
	[
		"id" => 16772,
		"user_id" => 21254,
		"work_status" => "European National"
	],
	[
		"id" => 22504,
		"user_id" => 28030,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5392,
		"user_id" => 7700,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24510,
		"user_id" => 30074,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16816,
		"user_id" => 21298,
		"work_status" => "European National"
	],
	[
		"id" => 5324,
		"user_id" => 7632,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24640,
		"user_id" => 30204,
		"work_status" => "European National"
	],
	[
		"id" => 5093,
		"user_id" => 7401,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5005,
		"user_id" => 7313,
		"work_status" => "European National"
	],
	[
		"id" => 5356,
		"user_id" => 7664,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24549,
		"user_id" => 30113,
		"work_status" => "Non European National"
	],
	[
		"id" => 7412,
		"user_id" => 10138,
		"work_status" => "0"
	],
	[
		"id" => 7413,
		"user_id" => 10140,
		"work_status" => "Non European National"
	],
	[
		"id" => 15156,
		"user_id" => 18960,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18779,
		"user_id" => 23326,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14153,
		"user_id" => 17957,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25807,
		"user_id" => 31926,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14069,
		"user_id" => 17873,
		"work_status" => "Non European National"
	],
	[
		"id" => 19757,
		"user_id" => 24304,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13932,
		"user_id" => 17736,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14164,
		"user_id" => 17968,
		"work_status" => "European National"
	],
	[
		"id" => 16387,
		"user_id" => 20475,
		"work_status" => "0"
	],
	[
		"id" => 16388,
		"user_id" => 20655,
		"work_status" => "Non European National"
	],
	[
		"id" => 15348,
		"user_id" => 19152,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4950,
		"user_id" => 7258,
		"work_status" => "Non European National"
	],
	[
		"id" => 5368,
		"user_id" => 7676,
		"work_status" => "European National"
	],
	[
		"id" => 16743,
		"user_id" => 21225,
		"work_status" => "European National"
	],
	[
		"id" => 15362,
		"user_id" => 19166,
		"work_status" => "European National"
	],
	[
		"id" => 13354,
		"user_id" => 17158,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5345,
		"user_id" => 7653,
		"work_status" => "European National"
	],
	[
		"id" => 13202,
		"user_id" => 17006,
		"work_status" => "European National"
	],
	[
		"id" => 5612,
		"user_id" => 7920,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13140,
		"user_id" => 16944,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23060,
		"user_id" => 28586,
		"work_status" => "Non European National"
	],
	[
		"id" => 14271,
		"user_id" => 18075,
		"work_status" => "European National"
	],
	[
		"id" => 21944,
		"user_id" => 27470,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4962,
		"user_id" => 7270,
		"work_status" => "European National"
	],
	[
		"id" => 23662,
		"user_id" => 29226,
		"work_status" => "Non European National"
	],
	[
		"id" => 13346,
		"user_id" => 17150,
		"work_status" => "Non European National"
	],
	[
		"id" => 12611,
		"user_id" => 16230,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12612,
		"user_id" => 10072,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23479,
		"user_id" => 29043,
		"work_status" => "European National"
	],
	[
		"id" => 14819,
		"user_id" => 18623,
		"work_status" => "European National"
	],
	[
		"id" => 13702,
		"user_id" => 17506,
		"work_status" => "European National"
	],
	[
		"id" => 14816,
		"user_id" => 18620,
		"work_status" => "European National"
	],
	[
		"id" => 19672,
		"user_id" => 24219,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13200,
		"user_id" => 17004,
		"work_status" => "European National"
	],
	[
		"id" => 5387,
		"user_id" => 7695,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19205,
		"user_id" => 23752,
		"work_status" => "Non European National"
	],
	[
		"id" => 16778,
		"user_id" => 21260,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5137,
		"user_id" => 7445,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12236,
		"user_id" => 15876,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14566,
		"user_id" => 18370,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13462,
		"user_id" => 17266,
		"work_status" => "Non European National"
	],
	[
		"id" => 5359,
		"user_id" => 7667,
		"work_status" => "Non European National"
	],
	[
		"id" => 5201,
		"user_id" => 7509,
		"work_status" => "Non European National"
	],
	[
		"id" => 4968,
		"user_id" => 7276,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14518,
		"user_id" => 18322,
		"work_status" => "Non European National"
	],
	[
		"id" => 5371,
		"user_id" => 7679,
		"work_status" => "Non European National"
	],
	[
		"id" => 5361,
		"user_id" => 7669,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16854,
		"user_id" => 21337,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13240,
		"user_id" => 17044,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5156,
		"user_id" => 7464,
		"work_status" => "0"
	],
	[
		"id" => 5388,
		"user_id" => 7696,
		"work_status" => "European National"
	],
	[
		"id" => 16734,
		"user_id" => 21215,
		"work_status" => "0"
	],
	[
		"id" => 23692,
		"user_id" => 29256,
		"work_status" => "Non European National"
	],
	[
		"id" => 16736,
		"user_id" => 21218,
		"work_status" => "Non European National"
	],
	[
		"id" => 13551,
		"user_id" => 17355,
		"work_status" => "0"
	],
	[
		"id" => 13553,
		"user_id" => 17357,
		"work_status" => "Non European National"
	],
	[
		"id" => 13155,
		"user_id" => 16959,
		"work_status" => "Non European National"
	],
	[
		"id" => 12246,
		"user_id" => 15886,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14646,
		"user_id" => 18450,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4807,
		"user_id" => 7115,
		"work_status" => "Non European National"
	],
	[
		"id" => 14057,
		"user_id" => 17861,
		"work_status" => "European National"
	],
	[
		"id" => 14046,
		"user_id" => 17850,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14208,
		"user_id" => 18012,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13568,
		"user_id" => 17372,
		"work_status" => "Non European National"
	],
	[
		"id" => 16838,
		"user_id" => 21321,
		"work_status" => "European National"
	],
	[
		"id" => 20238,
		"user_id" => 24972,
		"work_status" => "Non European National"
	],
	[
		"id" => 19233,
		"user_id" => 23780,
		"work_status" => "Non European National"
	],
	[
		"id" => 14339,
		"user_id" => 18143,
		"work_status" => "European National"
	],
	[
		"id" => 14498,
		"user_id" => 18302,
		"work_status" => "Non European National"
	],
	[
		"id" => 5369,
		"user_id" => 7677,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13276,
		"user_id" => 17080,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14113,
		"user_id" => 17917,
		"work_status" => "European National"
	],
	[
		"id" => 13409,
		"user_id" => 17213,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14825,
		"user_id" => 18629,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15145,
		"user_id" => 18949,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19032,
		"user_id" => 23579,
		"work_status" => "European National"
	],
	[
		"id" => 5054,
		"user_id" => 7362,
		"work_status" => "Non European National"
	],
	[
		"id" => 5011,
		"user_id" => 7319,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19261,
		"user_id" => 23808,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13247,
		"user_id" => 17051,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14441,
		"user_id" => 18245,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13786,
		"user_id" => 17590,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13632,
		"user_id" => 17436,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5390,
		"user_id" => 7698,
		"work_status" => "Non European National"
	],
	[
		"id" => 8844,
		"user_id" => 12283,
		"work_status" => "European National"
	],
	[
		"id" => 5379,
		"user_id" => 7687,
		"work_status" => "Non European National"
	],
	[
		"id" => 10109,
		"user_id" => 13734,
		"work_status" => "European National"
	],
	[
		"id" => 19622,
		"user_id" => 24169,
		"work_status" => "Non European National"
	],
	[
		"id" => 14757,
		"user_id" => 18561,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13918,
		"user_id" => 17722,
		"work_status" => "Non European National"
	],
	[
		"id" => 4995,
		"user_id" => 7303,
		"work_status" => "European National"
	],
	[
		"id" => 13557,
		"user_id" => 17361,
		"work_status" => "Non European National"
	],
	[
		"id" => 15399,
		"user_id" => 19203,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13992,
		"user_id" => 17796,
		"work_status" => "European National"
	],
	[
		"id" => 24655,
		"user_id" => 30219,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22314,
		"user_id" => 27840,
		"work_status" => "Non European National"
	],
	[
		"id" => 5166,
		"user_id" => 7474,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18864,
		"user_id" => 23411,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15134,
		"user_id" => 18938,
		"work_status" => "European National"
	],
	[
		"id" => 14564,
		"user_id" => 18368,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5381,
		"user_id" => 7689,
		"work_status" => "Non European National"
	],
	[
		"id" => 16773,
		"user_id" => 21255,
		"work_status" => "European National"
	],
	[
		"id" => 15127,
		"user_id" => 18931,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15218,
		"user_id" => 19022,
		"work_status" => "Non European National"
	],
	[
		"id" => 5425,
		"user_id" => 7733,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21788,
		"user_id" => 27314,
		"work_status" => "Non European National"
	],
	[
		"id" => 12649,
		"user_id" => 9495,
		"work_status" => "0"
	],
	[
		"id" => 13910,
		"user_id" => 17714,
		"work_status" => "European National"
	],
	[
		"id" => 5433,
		"user_id" => 7741,
		"work_status" => "Non European National"
	],
	[
		"id" => 19485,
		"user_id" => 24032,
		"work_status" => "Non European National"
	],
	[
		"id" => 23817,
		"user_id" => 29381,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19884,
		"user_id" => 24431,
		"work_status" => "European National"
	],
	[
		"id" => 24744,
		"user_id" => 30308,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19187,
		"user_id" => 23734,
		"work_status" => "European National"
	],
	[
		"id" => 19840,
		"user_id" => 24387,
		"work_status" => "Non European National"
	],
	[
		"id" => 14513,
		"user_id" => 18317,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13289,
		"user_id" => 17093,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14312,
		"user_id" => 18116,
		"work_status" => "Non European National"
	],
	[
		"id" => 13940,
		"user_id" => 17744,
		"work_status" => "European National"
	],
	[
		"id" => 12030,
		"user_id" => 15670,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5131,
		"user_id" => 7439,
		"work_status" => "0"
	],
	[
		"id" => 19496,
		"user_id" => 24043,
		"work_status" => "Non European National"
	],
	[
		"id" => 12445,
		"user_id" => 16085,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26285,
		"user_id" => 32643,
		"work_status" => "0"
	],
	[
		"id" => 12458,
		"user_id" => 16098,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22898,
		"user_id" => 28424,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13325,
		"user_id" => 17129,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13897,
		"user_id" => 17701,
		"work_status" => "Non European National"
	],
	[
		"id" => 13153,
		"user_id" => 16957,
		"work_status" => "European National"
	],
	[
		"id" => 14931,
		"user_id" => 18735,
		"work_status" => "European National"
	],
	[
		"id" => 14895,
		"user_id" => 18699,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14610,
		"user_id" => 18414,
		"work_status" => "European National"
	],
	[
		"id" => 4829,
		"user_id" => 7137,
		"work_status" => "Non European National"
	],
	[
		"id" => 18854,
		"user_id" => 23401,
		"work_status" => "European National"
	],
	[
		"id" => 14713,
		"user_id" => 18517,
		"work_status" => "European National"
	],
	[
		"id" => 23701,
		"user_id" => 29265,
		"work_status" => "Non European National"
	],
	[
		"id" => 24543,
		"user_id" => 30107,
		"work_status" => "European National"
	],
	[
		"id" => 5405,
		"user_id" => 7713,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16760,
		"user_id" => 21242,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5085,
		"user_id" => 7393,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15209,
		"user_id" => 19013,
		"work_status" => "0"
	],
	[
		"id" => 23891,
		"user_id" => 29455,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14593,
		"user_id" => 18397,
		"work_status" => "European National"
	],
	[
		"id" => 13277,
		"user_id" => 17081,
		"work_status" => "European National"
	],
	[
		"id" => 19293,
		"user_id" => 23840,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4817,
		"user_id" => 7125,
		"work_status" => "0"
	],
	[
		"id" => 14982,
		"user_id" => 18786,
		"work_status" => "Non European National"
	],
	[
		"id" => 14056,
		"user_id" => 17860,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19170,
		"user_id" => 23717,
		"work_status" => "European National"
	],
	[
		"id" => 13842,
		"user_id" => 17646,
		"work_status" => "Non European National"
	],
	[
		"id" => 5434,
		"user_id" => 7742,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5399,
		"user_id" => 7707,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5398,
		"user_id" => 7706,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5073,
		"user_id" => 7381,
		"work_status" => "European National"
	],
	[
		"id" => 12353,
		"user_id" => 15993,
		"work_status" => "European National"
	],
	[
		"id" => 18882,
		"user_id" => 23429,
		"work_status" => "European National"
	],
	[
		"id" => 14147,
		"user_id" => 17951,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16853,
		"user_id" => 21336,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13983,
		"user_id" => 17787,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5407,
		"user_id" => 7715,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13393,
		"user_id" => 17197,
		"work_status" => "European National"
	],
	[
		"id" => 19325,
		"user_id" => 23872,
		"work_status" => "European National"
	],
	[
		"id" => 24792,
		"user_id" => 30356,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16829,
		"user_id" => 21312,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14117,
		"user_id" => 17921,
		"work_status" => "Non European National"
	],
	[
		"id" => 14812,
		"user_id" => 18616,
		"work_status" => "European National"
	],
	[
		"id" => 19084,
		"user_id" => 23631,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23506,
		"user_id" => 29070,
		"work_status" => "Non European National"
	],
	[
		"id" => 19785,
		"user_id" => 24332,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4946,
		"user_id" => 7254,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14589,
		"user_id" => 18393,
		"work_status" => "Non European National"
	],
	[
		"id" => 22052,
		"user_id" => 27578,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5070,
		"user_id" => 7378,
		"work_status" => "European National"
	],
	[
		"id" => 14636,
		"user_id" => 18440,
		"work_status" => "European National"
	],
	[
		"id" => 15382,
		"user_id" => 19186,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5439,
		"user_id" => 7747,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16788,
		"user_id" => 21270,
		"work_status" => "European National"
	],
	[
		"id" => 15018,
		"user_id" => 18822,
		"work_status" => "Non European National"
	],
	[
		"id" => 20226,
		"user_id" => 24955,
		"work_status" => "0"
	],
	[
		"id" => 4825,
		"user_id" => 7133,
		"work_status" => "European National"
	],
	[
		"id" => 14346,
		"user_id" => 18150,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15135,
		"user_id" => 18939,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14932,
		"user_id" => 18736,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4830,
		"user_id" => 7138,
		"work_status" => "European National"
	],
	[
		"id" => 5125,
		"user_id" => 7433,
		"work_status" => "European National"
	],
	[
		"id" => 5518,
		"user_id" => 7826,
		"work_status" => "European National"
	],
	[
		"id" => 12077,
		"user_id" => 15717,
		"work_status" => "Non European National"
	],
	[
		"id" => 13419,
		"user_id" => 17223,
		"work_status" => "European National"
	],
	[
		"id" => 16767,
		"user_id" => 21249,
		"work_status" => "European National"
	],
	[
		"id" => 15331,
		"user_id" => 19135,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5100,
		"user_id" => 7408,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4999,
		"user_id" => 7307,
		"work_status" => "Non European National"
	],
	[
		"id" => 19292,
		"user_id" => 23839,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24629,
		"user_id" => 30193,
		"work_status" => "European National"
	],
	[
		"id" => 14437,
		"user_id" => 18241,
		"work_status" => "European National"
	],
	[
		"id" => 18970,
		"user_id" => 23517,
		"work_status" => "Non European National"
	],
	[
		"id" => 13181,
		"user_id" => 16985,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13792,
		"user_id" => 17596,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5410,
		"user_id" => 7718,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5807,
		"user_id" => 8115,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4827,
		"user_id" => 7135,
		"work_status" => "European National"
	],
	[
		"id" => 13132,
		"user_id" => 16936,
		"work_status" => "Non European National"
	],
	[
		"id" => 15376,
		"user_id" => 19180,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14946,
		"user_id" => 18750,
		"work_status" => "European National"
	],
	[
		"id" => 16740,
		"user_id" => 21222,
		"work_status" => "Non European National"
	],
	[
		"id" => 5414,
		"user_id" => 7722,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13930,
		"user_id" => 17734,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13470,
		"user_id" => 17274,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5411,
		"user_id" => 7719,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19463,
		"user_id" => 24010,
		"work_status" => "Non European National"
	],
	[
		"id" => 16634,
		"user_id" => 21064,
		"work_status" => "0"
	],
	[
		"id" => 16636,
		"user_id" => 21066,
		"work_status" => "Non European National"
	],
	[
		"id" => 16624,
		"user_id" => 21041,
		"work_status" => "Non European National"
	],
	[
		"id" => 4895,
		"user_id" => 7203,
		"work_status" => "European National"
	],
	[
		"id" => 19074,
		"user_id" => 23621,
		"work_status" => "European National"
	],
	[
		"id" => 23121,
		"user_id" => 28647,
		"work_status" => "Non European National"
	],
	[
		"id" => 14004,
		"user_id" => 17808,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13639,
		"user_id" => 17443,
		"work_status" => "European National"
	],
	[
		"id" => 23850,
		"user_id" => 29414,
		"work_status" => "European National"
	],
	[
		"id" => 20134,
		"user_id" => 24813,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4948,
		"user_id" => 7256,
		"work_status" => "Non European National"
	],
	[
		"id" => 13576,
		"user_id" => 17380,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14163,
		"user_id" => 17967,
		"work_status" => "European National"
	],
	[
		"id" => 5193,
		"user_id" => 7501,
		"work_status" => "European National"
	],
	[
		"id" => 4933,
		"user_id" => 7241,
		"work_status" => "European National"
	],
	[
		"id" => 14562,
		"user_id" => 18366,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4884,
		"user_id" => 7192,
		"work_status" => "Non European National"
	],
	[
		"id" => 13703,
		"user_id" => 17507,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22598,
		"user_id" => 28124,
		"work_status" => "Non European National"
	],
	[
		"id" => 13172,
		"user_id" => 16976,
		"work_status" => "Non European National"
	],
	[
		"id" => 8786,
		"user_id" => 12193,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4888,
		"user_id" => 7196,
		"work_status" => "0"
	],
	[
		"id" => 14929,
		"user_id" => 18733,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5472,
		"user_id" => 7780,
		"work_status" => "Non European National"
	],
	[
		"id" => 13978,
		"user_id" => 17782,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5419,
		"user_id" => 7727,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14685,
		"user_id" => 18489,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13314,
		"user_id" => 17118,
		"work_status" => "Non European National"
	],
	[
		"id" => 5436,
		"user_id" => 7744,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15230,
		"user_id" => 19034,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19902,
		"user_id" => 24449,
		"work_status" => "Non European National"
	],
	[
		"id" => 16442,
		"user_id" => 20733,
		"work_status" => "0"
	],
	[
		"id" => 16865,
		"user_id" => 21348,
		"work_status" => "European National"
	],
	[
		"id" => 16868,
		"user_id" => 21351,
		"work_status" => "Non European National"
	],
	[
		"id" => 16873,
		"user_id" => 21357,
		"work_status" => "0"
	],
	[
		"id" => 16874,
		"user_id" => 21358,
		"work_status" => "European National"
	],
	[
		"id" => 16875,
		"user_id" => 21356,
		"work_status" => "0"
	],
	[
		"id" => 16876,
		"user_id" => 21360,
		"work_status" => "European National"
	],
	[
		"id" => 16877,
		"user_id" => 21362,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14224,
		"user_id" => 18028,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14316,
		"user_id" => 18120,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5104,
		"user_id" => 7412,
		"work_status" => "Non European National"
	],
	[
		"id" => 13365,
		"user_id" => 17169,
		"work_status" => "Non European National"
	],
	[
		"id" => 19412,
		"user_id" => 23959,
		"work_status" => "Non European National"
	],
	[
		"id" => 13596,
		"user_id" => 17400,
		"work_status" => "European National"
	],
	[
		"id" => 5548,
		"user_id" => 7856,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14146,
		"user_id" => 17950,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4831,
		"user_id" => 7139,
		"work_status" => "European National"
	],
	[
		"id" => 14730,
		"user_id" => 18534,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12417,
		"user_id" => 16057,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16739,
		"user_id" => 21221,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14026,
		"user_id" => 17830,
		"work_status" => "European National"
	],
	[
		"id" => 5180,
		"user_id" => 7488,
		"work_status" => "0"
	],
	[
		"id" => 16733,
		"user_id" => 21211,
		"work_status" => "0"
	],
	[
		"id" => 16798,
		"user_id" => 21280,
		"work_status" => "Non European National"
	],
	[
		"id" => 19417,
		"user_id" => 23964,
		"work_status" => "Non European National"
	],
	[
		"id" => 5498,
		"user_id" => 7806,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14854,
		"user_id" => 18658,
		"work_status" => "European National"
	],
	[
		"id" => 13513,
		"user_id" => 17317,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4949,
		"user_id" => 7257,
		"work_status" => "0"
	],
	[
		"id" => 13492,
		"user_id" => 17296,
		"work_status" => "European National"
	],
	[
		"id" => 16770,
		"user_id" => 21252,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13379,
		"user_id" => 17183,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24791,
		"user_id" => 30355,
		"work_status" => "Non European National"
	],
	[
		"id" => 13724,
		"user_id" => 17528,
		"work_status" => "Non European National"
	],
	[
		"id" => 13233,
		"user_id" => 17037,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5186,
		"user_id" => 7494,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14999,
		"user_id" => 18803,
		"work_status" => "Non European National"
	],
	[
		"id" => 18868,
		"user_id" => 23415,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14421,
		"user_id" => 18225,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13984,
		"user_id" => 17788,
		"work_status" => "Non European National"
	],
	[
		"id" => 20096,
		"user_id" => 24747,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14889,
		"user_id" => 18693,
		"work_status" => "Non European National"
	],
	[
		"id" => 14051,
		"user_id" => 17855,
		"work_status" => "European National"
	],
	[
		"id" => 5437,
		"user_id" => 7745,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5850,
		"user_id" => 8158,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19505,
		"user_id" => 24052,
		"work_status" => "European National"
	],
	[
		"id" => 19650,
		"user_id" => 24197,
		"work_status" => "Non European National"
	],
	[
		"id" => 4930,
		"user_id" => 7238,
		"work_status" => "0"
	],
	[
		"id" => 19423,
		"user_id" => 23970,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14547,
		"user_id" => 18351,
		"work_status" => "Non European National"
	],
	[
		"id" => 12066,
		"user_id" => 15706,
		"work_status" => "European National"
	],
	[
		"id" => 19223,
		"user_id" => 23770,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13634,
		"user_id" => 17438,
		"work_status" => "Non European National"
	],
	[
		"id" => 14976,
		"user_id" => 18780,
		"work_status" => "0"
	],
	[
		"id" => 5196,
		"user_id" => 7504,
		"work_status" => "Non European National"
	],
	[
		"id" => 16303,
		"user_id" => 20541,
		"work_status" => "European National"
	],
	[
		"id" => 18748,
		"user_id" => 23295,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13199,
		"user_id" => 17003,
		"work_status" => "European National"
	],
	[
		"id" => 14642,
		"user_id" => 18446,
		"work_status" => "European National"
	],
	[
		"id" => 14884,
		"user_id" => 18688,
		"work_status" => "European National"
	],
	[
		"id" => 5473,
		"user_id" => 7781,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5215,
		"user_id" => 7523,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5451,
		"user_id" => 7759,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5728,
		"user_id" => 8036,
		"work_status" => "Non European National"
	],
	[
		"id" => 16810,
		"user_id" => 21292,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4911,
		"user_id" => 7219,
		"work_status" => "Non European National"
	],
	[
		"id" => 15142,
		"user_id" => 18946,
		"work_status" => "Non European National"
	],
	[
		"id" => 14334,
		"user_id" => 18138,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5234,
		"user_id" => 7542,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22256,
		"user_id" => 27782,
		"work_status" => "Non European National"
	],
	[
		"id" => 14608,
		"user_id" => 18412,
		"work_status" => "Non European National"
	],
	[
		"id" => 5094,
		"user_id" => 7402,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14630,
		"user_id" => 18434,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14365,
		"user_id" => 18169,
		"work_status" => "European National"
	],
	[
		"id" => 13322,
		"user_id" => 17126,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13808,
		"user_id" => 17612,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5475,
		"user_id" => 7783,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13405,
		"user_id" => 17209,
		"work_status" => "Non European National"
	],
	[
		"id" => 23863,
		"user_id" => 29427,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14191,
		"user_id" => 17995,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13773,
		"user_id" => 17577,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12427,
		"user_id" => 16067,
		"work_status" => "Non European National"
	],
	[
		"id" => 14018,
		"user_id" => 17822,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24389,
		"user_id" => 29953,
		"work_status" => "European National"
	],
	[
		"id" => 5441,
		"user_id" => 7749,
		"work_status" => "European National"
	],
	[
		"id" => 6493,
		"user_id" => 8946,
		"work_status" => "Non European National"
	],
	[
		"id" => 5476,
		"user_id" => 7784,
		"work_status" => "Non European National"
	],
	[
		"id" => 15216,
		"user_id" => 19020,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19272,
		"user_id" => 23819,
		"work_status" => "European National"
	],
	[
		"id" => 15170,
		"user_id" => 18974,
		"work_status" => "Non European National"
	],
	[
		"id" => 13176,
		"user_id" => 16980,
		"work_status" => "European National"
	],
	[
		"id" => 22105,
		"user_id" => 27631,
		"work_status" => "Non European National"
	],
	[
		"id" => 14337,
		"user_id" => 18141,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12288,
		"user_id" => 15928,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 10969,
		"user_id" => 14594,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19694,
		"user_id" => 24241,
		"work_status" => "European National"
	],
	[
		"id" => 21942,
		"user_id" => 27468,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19699,
		"user_id" => 24246,
		"work_status" => "Non European National"
	],
	[
		"id" => 14384,
		"user_id" => 18188,
		"work_status" => "European National"
	],
	[
		"id" => 5456,
		"user_id" => 7764,
		"work_status" => "European National"
	],
	[
		"id" => 5455,
		"user_id" => 7763,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14291,
		"user_id" => 18095,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13900,
		"user_id" => 17704,
		"work_status" => "European National"
	],
	[
		"id" => 14097,
		"user_id" => 17901,
		"work_status" => "Non European National"
	],
	[
		"id" => 14672,
		"user_id" => 18476,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5064,
		"user_id" => 7372,
		"work_status" => "Non European National"
	],
	[
		"id" => 20192,
		"user_id" => 24904,
		"work_status" => "European National"
	],
	[
		"id" => 20193,
		"user_id" => 24908,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5821,
		"user_id" => 8129,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13920,
		"user_id" => 17724,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13477,
		"user_id" => 17281,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24683,
		"user_id" => 30247,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5519,
		"user_id" => 7827,
		"work_status" => "European National"
	],
	[
		"id" => 12646,
		"user_id" => 16161,
		"work_status" => "European National"
	],
	[
		"id" => 23682,
		"user_id" => 29246,
		"work_status" => "European National"
	],
	[
		"id" => 16774,
		"user_id" => 21256,
		"work_status" => "European National"
	],
	[
		"id" => 14024,
		"user_id" => 17828,
		"work_status" => "European National"
	],
	[
		"id" => 23687,
		"user_id" => 29251,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13572,
		"user_id" => 17376,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14882,
		"user_id" => 18686,
		"work_status" => "European National"
	],
	[
		"id" => 13421,
		"user_id" => 17225,
		"work_status" => "Non European National"
	],
	[
		"id" => 14640,
		"user_id" => 18444,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8692,
		"user_id" => 12035,
		"work_status" => "European National"
	],
	[
		"id" => 8693,
		"user_id" => 12038,
		"work_status" => "Non European National"
	],
	[
		"id" => 8694,
		"user_id" => 12040,
		"work_status" => "Non European National"
	],
	[
		"id" => 22952,
		"user_id" => 28478,
		"work_status" => "Non European National"
	],
	[
		"id" => 5505,
		"user_id" => 7813,
		"work_status" => "European National"
	],
	[
		"id" => 15341,
		"user_id" => 19145,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16805,
		"user_id" => 21287,
		"work_status" => "Non European National"
	],
	[
		"id" => 5195,
		"user_id" => 7503,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5460,
		"user_id" => 7768,
		"work_status" => "European National"
	],
	[
		"id" => 19194,
		"user_id" => 23741,
		"work_status" => "European National"
	],
	[
		"id" => 12292,
		"user_id" => 15932,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14648,
		"user_id" => 18452,
		"work_status" => "European National"
	],
	[
		"id" => 13524,
		"user_id" => 17328,
		"work_status" => "European National"
	],
	[
		"id" => 12501,
		"user_id" => 12635,
		"work_status" => "0"
	],
	[
		"id" => 19904,
		"user_id" => 24451,
		"work_status" => "Non European National"
	],
	[
		"id" => 14275,
		"user_id" => 18079,
		"work_status" => "European National"
	],
	[
		"id" => 14690,
		"user_id" => 18494,
		"work_status" => "European National"
	],
	[
		"id" => 5459,
		"user_id" => 7767,
		"work_status" => "Non European National"
	],
	[
		"id" => 13594,
		"user_id" => 17398,
		"work_status" => "European National"
	],
	[
		"id" => 14865,
		"user_id" => 18669,
		"work_status" => "Non European National"
	],
	[
		"id" => 18782,
		"user_id" => 23329,
		"work_status" => "Non European National"
	],
	[
		"id" => 14824,
		"user_id" => 18628,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5525,
		"user_id" => 7833,
		"work_status" => "European National"
	],
	[
		"id" => 5461,
		"user_id" => 7769,
		"work_status" => "Non European National"
	],
	[
		"id" => 5594,
		"user_id" => 7902,
		"work_status" => "European National"
	],
	[
		"id" => 5462,
		"user_id" => 7770,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15007,
		"user_id" => 18811,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14373,
		"user_id" => 18177,
		"work_status" => "European National"
	],
	[
		"id" => 5213,
		"user_id" => 7521,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13510,
		"user_id" => 17314,
		"work_status" => "Non European National"
	],
	[
		"id" => 13526,
		"user_id" => 17330,
		"work_status" => "Non European National"
	],
	[
		"id" => 19573,
		"user_id" => 24120,
		"work_status" => "European National"
	],
	[
		"id" => 13660,
		"user_id" => 17464,
		"work_status" => "European National"
	],
	[
		"id" => 13349,
		"user_id" => 17153,
		"work_status" => "European National"
	],
	[
		"id" => 5506,
		"user_id" => 7814,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5463,
		"user_id" => 7771,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13460,
		"user_id" => 17264,
		"work_status" => "European National"
	],
	[
		"id" => 13262,
		"user_id" => 17066,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12391,
		"user_id" => 16031,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13429,
		"user_id" => 17233,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13387,
		"user_id" => 17191,
		"work_status" => "European National"
	],
	[
		"id" => 14249,
		"user_id" => 18053,
		"work_status" => "Non European National"
	],
	[
		"id" => 14089,
		"user_id" => 17893,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16843,
		"user_id" => 21326,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19735,
		"user_id" => 24282,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14922,
		"user_id" => 18726,
		"work_status" => "European National"
	],
	[
		"id" => 14050,
		"user_id" => 17854,
		"work_status" => "European National"
	],
	[
		"id" => 5479,
		"user_id" => 7787,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5595,
		"user_id" => 7903,
		"work_status" => "European National"
	],
	[
		"id" => 19654,
		"user_id" => 24201,
		"work_status" => "Non European National"
	],
	[
		"id" => 5520,
		"user_id" => 7828,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12922,
		"user_id" => 16631,
		"work_status" => "European National"
	],
	[
		"id" => 5481,
		"user_id" => 7789,
		"work_status" => "European National"
	],
	[
		"id" => 13734,
		"user_id" => 17538,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14364,
		"user_id" => 18168,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13143,
		"user_id" => 16947,
		"work_status" => "European National"
	],
	[
		"id" => 5482,
		"user_id" => 7790,
		"work_status" => "European National"
	],
	[
		"id" => 14768,
		"user_id" => 18572,
		"work_status" => "European National"
	],
	[
		"id" => 5483,
		"user_id" => 7791,
		"work_status" => "European National"
	],
	[
		"id" => 13755,
		"user_id" => 17559,
		"work_status" => "European National"
	],
	[
		"id" => 5649,
		"user_id" => 7957,
		"work_status" => "European National"
	],
	[
		"id" => 19005,
		"user_id" => 23552,
		"work_status" => "Non European National"
	],
	[
		"id" => 14185,
		"user_id" => 17989,
		"work_status" => "European National"
	],
	[
		"id" => 13624,
		"user_id" => 17428,
		"work_status" => "European National"
	],
	[
		"id" => 16763,
		"user_id" => 21245,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5650,
		"user_id" => 7958,
		"work_status" => "European National"
	],
	[
		"id" => 14332,
		"user_id" => 18136,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24618,
		"user_id" => 30182,
		"work_status" => "Non European National"
	],
	[
		"id" => 5729,
		"user_id" => 8037,
		"work_status" => "Non European National"
	],
	[
		"id" => 20729,
		"user_id" => 25658,
		"work_status" => "European National"
	],
	[
		"id" => 13961,
		"user_id" => 17765,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15206,
		"user_id" => 19010,
		"work_status" => "European National"
	],
	[
		"id" => 5486,
		"user_id" => 7794,
		"work_status" => "European National"
	],
	[
		"id" => 5487,
		"user_id" => 7795,
		"work_status" => "European National"
	],
	[
		"id" => 5175,
		"user_id" => 7483,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5507,
		"user_id" => 7815,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22209,
		"user_id" => 27735,
		"work_status" => "Non European National"
	],
	[
		"id" => 14464,
		"user_id" => 18268,
		"work_status" => "European National"
	],
	[
		"id" => 19550,
		"user_id" => 24097,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15128,
		"user_id" => 18932,
		"work_status" => "Non European National"
	],
	[
		"id" => 14293,
		"user_id" => 18097,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5614,
		"user_id" => 7922,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16851,
		"user_id" => 21334,
		"work_status" => "European National"
	],
	[
		"id" => 16885,
		"user_id" => 21370,
		"work_status" => "European National"
	],
	[
		"id" => 16813,
		"user_id" => 21295,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13562,
		"user_id" => 17366,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13539,
		"user_id" => 17343,
		"work_status" => "Non European National"
	],
	[
		"id" => 8939,
		"user_id" => 12435,
		"work_status" => "European National"
	],
	[
		"id" => 16653,
		"user_id" => 21097,
		"work_status" => "0"
	],
	[
		"id" => 16860,
		"user_id" => 21343,
		"work_status" => "Non European National"
	],
	[
		"id" => 19009,
		"user_id" => 23556,
		"work_status" => "European National"
	],
	[
		"id" => 24636,
		"user_id" => 30200,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24915,
		"user_id" => 30479,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23840,
		"user_id" => 29404,
		"work_status" => "European National"
	],
	[
		"id" => 14725,
		"user_id" => 18529,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16842,
		"user_id" => 21325,
		"work_status" => "European National"
	],
	[
		"id" => 19152,
		"user_id" => 23699,
		"work_status" => "Non European National"
	],
	[
		"id" => 12140,
		"user_id" => 15780,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5489,
		"user_id" => 7797,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15087,
		"user_id" => 18891,
		"work_status" => "European National"
	],
	[
		"id" => 22603,
		"user_id" => 28129,
		"work_status" => "Non European National"
	],
	[
		"id" => 19073,
		"user_id" => 23620,
		"work_status" => "European National"
	],
	[
		"id" => 13397,
		"user_id" => 17201,
		"work_status" => "Non European National"
	],
	[
		"id" => 5508,
		"user_id" => 7816,
		"work_status" => "Non European National"
	],
	[
		"id" => 5635,
		"user_id" => 7943,
		"work_status" => "Non European National"
	],
	[
		"id" => 14283,
		"user_id" => 18087,
		"work_status" => "Non European National"
	],
	[
		"id" => 13626,
		"user_id" => 17430,
		"work_status" => "Non European National"
	],
	[
		"id" => 5492,
		"user_id" => 7800,
		"work_status" => "European National"
	],
	[
		"id" => 18978,
		"user_id" => 23525,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12250,
		"user_id" => 15890,
		"work_status" => "European National"
	],
	[
		"id" => 13901,
		"user_id" => 17705,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14410,
		"user_id" => 18214,
		"work_status" => "European National"
	],
	[
		"id" => 8936,
		"user_id" => 12432,
		"work_status" => "European National"
	],
	[
		"id" => 19750,
		"user_id" => 24297,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5494,
		"user_id" => 7802,
		"work_status" => "European National"
	],
	[
		"id" => 14776,
		"user_id" => 18580,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13274,
		"user_id" => 17078,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5510,
		"user_id" => 7818,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23841,
		"user_id" => 29405,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12269,
		"user_id" => 15909,
		"work_status" => "Non European National"
	],
	[
		"id" => 5686,
		"user_id" => 7994,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12696,
		"user_id" => 15609,
		"work_status" => "Non European National"
	],
	[
		"id" => 14721,
		"user_id" => 18525,
		"work_status" => "Non European National"
	],
	[
		"id" => 13841,
		"user_id" => 17645,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5500,
		"user_id" => 7808,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15288,
		"user_id" => 19092,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8442,
		"user_id" => 11659,
		"work_status" => "Non European National"
	],
	[
		"id" => 5651,
		"user_id" => 7959,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15314,
		"user_id" => 19118,
		"work_status" => "European National"
	],
	[
		"id" => 26173,
		"user_id" => 27111,
		"work_status" => "Non European National"
	],
	[
		"id" => 14381,
		"user_id" => 18185,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13295,
		"user_id" => 17099,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18957,
		"user_id" => 23504,
		"work_status" => "European National"
	],
	[
		"id" => 15001,
		"user_id" => 18805,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12162,
		"user_id" => 15802,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4794,
		"user_id" => 7105,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19578,
		"user_id" => 24125,
		"work_status" => "European National"
	],
	[
		"id" => 13441,
		"user_id" => 17245,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13986,
		"user_id" => 17790,
		"work_status" => "European National"
	],
	[
		"id" => 22709,
		"user_id" => 28235,
		"work_status" => "European National"
	],
	[
		"id" => 15273,
		"user_id" => 19077,
		"work_status" => "Non European National"
	],
	[
		"id" => 5740,
		"user_id" => 8048,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14375,
		"user_id" => 18179,
		"work_status" => "European National"
	],
	[
		"id" => 12249,
		"user_id" => 15889,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19314,
		"user_id" => 23861,
		"work_status" => "European National"
	],
	[
		"id" => 13942,
		"user_id" => 17746,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14309,
		"user_id" => 18113,
		"work_status" => "Non European National"
	],
	[
		"id" => 5145,
		"user_id" => 7453,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5516,
		"user_id" => 7824,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14751,
		"user_id" => 18555,
		"work_status" => "Non European National"
	],
	[
		"id" => 13997,
		"user_id" => 17801,
		"work_status" => "Non European National"
	],
	[
		"id" => 13850,
		"user_id" => 17654,
		"work_status" => "Non European National"
	],
	[
		"id" => 21777,
		"user_id" => 27303,
		"work_status" => "Non European National"
	],
	[
		"id" => 14606,
		"user_id" => 18410,
		"work_status" => "Non European National"
	],
	[
		"id" => 5200,
		"user_id" => 7508,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19100,
		"user_id" => 23647,
		"work_status" => "Non European National"
	],
	[
		"id" => 5741,
		"user_id" => 8049,
		"work_status" => "European National"
	],
	[
		"id" => 19467,
		"user_id" => 24014,
		"work_status" => "Non European National"
	],
	[
		"id" => 13417,
		"user_id" => 17221,
		"work_status" => "European National"
	],
	[
		"id" => 14706,
		"user_id" => 18510,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19552,
		"user_id" => 24099,
		"work_status" => "Non European National"
	],
	[
		"id" => 14362,
		"user_id" => 18166,
		"work_status" => "European National"
	],
	[
		"id" => 5521,
		"user_id" => 7829,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19630,
		"user_id" => 24177,
		"work_status" => "Non European National"
	],
	[
		"id" => 14222,
		"user_id" => 18026,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13943,
		"user_id" => 17747,
		"work_status" => "European National"
	],
	[
		"id" => 16792,
		"user_id" => 21274,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22953,
		"user_id" => 28479,
		"work_status" => "Non European National"
	],
	[
		"id" => 13887,
		"user_id" => 17691,
		"work_status" => "Non European National"
	],
	[
		"id" => 23055,
		"user_id" => 28581,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5532,
		"user_id" => 7840,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13890,
		"user_id" => 17694,
		"work_status" => "European National"
	],
	[
		"id" => 19493,
		"user_id" => 24040,
		"work_status" => "Non European National"
	],
	[
		"id" => 15323,
		"user_id" => 19127,
		"work_status" => "Non European National"
	],
	[
		"id" => 5058,
		"user_id" => 7366,
		"work_status" => "0"
	],
	[
		"id" => 5770,
		"user_id" => 8078,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5533,
		"user_id" => 7841,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5653,
		"user_id" => 7961,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5527,
		"user_id" => 7835,
		"work_status" => "Non European National"
	],
	[
		"id" => 5534,
		"user_id" => 7842,
		"work_status" => "Non European National"
	],
	[
		"id" => 16859,
		"user_id" => 21342,
		"work_status" => "Non European National"
	],
	[
		"id" => 19199,
		"user_id" => 23746,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13948,
		"user_id" => 17752,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5536,
		"user_id" => 7844,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5597,
		"user_id" => 7905,
		"work_status" => "European National"
	],
	[
		"id" => 5687,
		"user_id" => 7995,
		"work_status" => "European National"
	],
	[
		"id" => 14270,
		"user_id" => 18074,
		"work_status" => "European National"
	],
	[
		"id" => 14122,
		"user_id" => 17926,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23624,
		"user_id" => 29188,
		"work_status" => "Non European National"
	],
	[
		"id" => 16412,
		"user_id" => 20690,
		"work_status" => "Non European National"
	],
	[
		"id" => 5654,
		"user_id" => 7962,
		"work_status" => "European National"
	],
	[
		"id" => 19659,
		"user_id" => 24206,
		"work_status" => "Non European National"
	],
	[
		"id" => 5655,
		"user_id" => 7963,
		"work_status" => "Non European National"
	],
	[
		"id" => 15031,
		"user_id" => 18835,
		"work_status" => "European National"
	],
	[
		"id" => 12308,
		"user_id" => 15948,
		"work_status" => "Non European National"
	],
	[
		"id" => 15080,
		"user_id" => 18884,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22837,
		"user_id" => 28363,
		"work_status" => "European National"
	],
	[
		"id" => 13361,
		"user_id" => 17165,
		"work_status" => "European National"
	],
	[
		"id" => 14476,
		"user_id" => 18280,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15356,
		"user_id" => 19160,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14536,
		"user_id" => 18340,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13953,
		"user_id" => 17757,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23908,
		"user_id" => 29472,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13722,
		"user_id" => 17526,
		"work_status" => "Non European National"
	],
	[
		"id" => 16887,
		"user_id" => 21372,
		"work_status" => "0"
	],
	[
		"id" => 16888,
		"user_id" => 21373,
		"work_status" => "European National"
	],
	[
		"id" => 16889,
		"user_id" => 21374,
		"work_status" => "Non European National"
	],
	[
		"id" => 13971,
		"user_id" => 17775,
		"work_status" => "European National"
	],
	[
		"id" => 14179,
		"user_id" => 17983,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5540,
		"user_id" => 7848,
		"work_status" => "European National"
	],
	[
		"id" => 12463,
		"user_id" => 16103,
		"work_status" => "European National"
	],
	[
		"id" => 13252,
		"user_id" => 17056,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13972,
		"user_id" => 17776,
		"work_status" => "Non European National"
	],
	[
		"id" => 5598,
		"user_id" => 7906,
		"work_status" => "European National"
	],
	[
		"id" => 19731,
		"user_id" => 24278,
		"work_status" => "Non European National"
	],
	[
		"id" => 13290,
		"user_id" => 17094,
		"work_status" => "Non European National"
	],
	[
		"id" => 20180,
		"user_id" => 24887,
		"work_status" => "Non European National"
	],
	[
		"id" => 23409,
		"user_id" => 28963,
		"work_status" => "0"
	],
	[
		"id" => 23410,
		"user_id" => 28964,
		"work_status" => "Non European National"
	],
	[
		"id" => 5541,
		"user_id" => 7849,
		"work_status" => "Non European National"
	],
	[
		"id" => 14559,
		"user_id" => 18363,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13305,
		"user_id" => 17109,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18918,
		"user_id" => 23465,
		"work_status" => "Non European National"
	],
	[
		"id" => 24391,
		"user_id" => 29955,
		"work_status" => "European National"
	],
	[
		"id" => 22954,
		"user_id" => 28480,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5546,
		"user_id" => 7854,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5552,
		"user_id" => 7860,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5554,
		"user_id" => 7862,
		"work_status" => "European National"
	],
	[
		"id" => 19434,
		"user_id" => 23981,
		"work_status" => "Non European National"
	],
	[
		"id" => 12447,
		"user_id" => 16087,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5555,
		"user_id" => 7863,
		"work_status" => "Non European National"
	],
	[
		"id" => 5553,
		"user_id" => 7861,
		"work_status" => "European National"
	],
	[
		"id" => 15335,
		"user_id" => 19139,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19591,
		"user_id" => 24138,
		"work_status" => "Non European National"
	],
	[
		"id" => 15006,
		"user_id" => 18810,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5556,
		"user_id" => 7864,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14456,
		"user_id" => 18260,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24657,
		"user_id" => 30221,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5839,
		"user_id" => 8147,
		"work_status" => "Non European National"
	],
	[
		"id" => 5558,
		"user_id" => 7866,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14059,
		"user_id" => 17863,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12647,
		"user_id" => 16265,
		"work_status" => "0"
	],
	[
		"id" => 14109,
		"user_id" => 17913,
		"work_status" => "European National"
	],
	[
		"id" => 5584,
		"user_id" => 7892,
		"work_status" => "European National"
	],
	[
		"id" => 19715,
		"user_id" => 24262,
		"work_status" => "Non European National"
	],
	[
		"id" => 18747,
		"user_id" => 23294,
		"work_status" => "European National"
	],
	[
		"id" => 23664,
		"user_id" => 29228,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8611,
		"user_id" => 11906,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5560,
		"user_id" => 7868,
		"work_status" => "European National"
	],
	[
		"id" => 5561,
		"user_id" => 7869,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13400,
		"user_id" => 17204,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5562,
		"user_id" => 7870,
		"work_status" => "European National"
	],
	[
		"id" => 5563,
		"user_id" => 7871,
		"work_status" => "European National"
	],
	[
		"id" => 16801,
		"user_id" => 21283,
		"work_status" => "European National"
	],
	[
		"id" => 15277,
		"user_id" => 19081,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5564,
		"user_id" => 7872,
		"work_status" => "Non European National"
	],
	[
		"id" => 16857,
		"user_id" => 21340,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13168,
		"user_id" => 16972,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5566,
		"user_id" => 7874,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5567,
		"user_id" => 7875,
		"work_status" => "European National"
	],
	[
		"id" => 19429,
		"user_id" => 23976,
		"work_status" => "European National"
	],
	[
		"id" => 19787,
		"user_id" => 24334,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5569,
		"user_id" => 7877,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5570,
		"user_id" => 7878,
		"work_status" => "Non European National"
	],
	[
		"id" => 15038,
		"user_id" => 18842,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18792,
		"user_id" => 23339,
		"work_status" => "Non European National"
	],
	[
		"id" => 23691,
		"user_id" => 29255,
		"work_status" => "Non European National"
	],
	[
		"id" => 5656,
		"user_id" => 7964,
		"work_status" => "European National"
	],
	[
		"id" => 13846,
		"user_id" => 17650,
		"work_status" => "Non European National"
	],
	[
		"id" => 15125,
		"user_id" => 18929,
		"work_status" => "Non European National"
	],
	[
		"id" => 13784,
		"user_id" => 17588,
		"work_status" => "Non European National"
	],
	[
		"id" => 5730,
		"user_id" => 8038,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14044,
		"user_id" => 17848,
		"work_status" => "European National"
	],
	[
		"id" => 16537,
		"user_id" => 20890,
		"work_status" => "European National"
	],
	[
		"id" => 14691,
		"user_id" => 18495,
		"work_status" => "Non European National"
	],
	[
		"id" => 14546,
		"user_id" => 18350,
		"work_status" => "European National"
	],
	[
		"id" => 13974,
		"user_id" => 17778,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5629,
		"user_id" => 7937,
		"work_status" => "European National"
	],
	[
		"id" => 14881,
		"user_id" => 18685,
		"work_status" => "Non European National"
	],
	[
		"id" => 5712,
		"user_id" => 8020,
		"work_status" => "Non European National"
	],
	[
		"id" => 11937,
		"user_id" => 15562,
		"work_status" => "Non European National"
	],
	[
		"id" => 14156,
		"user_id" => 17960,
		"work_status" => "European National"
	],
	[
		"id" => 15002,
		"user_id" => 18806,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5578,
		"user_id" => 7886,
		"work_status" => "European National"
	],
	[
		"id" => 18869,
		"user_id" => 23416,
		"work_status" => "Non European National"
	],
	[
		"id" => 19138,
		"user_id" => 23685,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5016,
		"user_id" => 7324,
		"work_status" => "European National"
	],
	[
		"id" => 13566,
		"user_id" => 17370,
		"work_status" => "Non European National"
	],
	[
		"id" => 19900,
		"user_id" => 24447,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19779,
		"user_id" => 24326,
		"work_status" => "Non European National"
	],
	[
		"id" => 14960,
		"user_id" => 18764,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5781,
		"user_id" => 8089,
		"work_status" => "Non European National"
	],
	[
		"id" => 14823,
		"user_id" => 18627,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23143,
		"user_id" => 28669,
		"work_status" => "Non European National"
	],
	[
		"id" => 15102,
		"user_id" => 18906,
		"work_status" => "European National"
	],
	[
		"id" => 5580,
		"user_id" => 7888,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14784,
		"user_id" => 18588,
		"work_status" => "European National"
	],
	[
		"id" => 5209,
		"user_id" => 7517,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13402,
		"user_id" => 17206,
		"work_status" => "Non European National"
	],
	[
		"id" => 16769,
		"user_id" => 21251,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5630,
		"user_id" => 7938,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24581,
		"user_id" => 30145,
		"work_status" => "European National"
	],
	[
		"id" => 5764,
		"user_id" => 8072,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5583,
		"user_id" => 7891,
		"work_status" => "European National"
	],
	[
		"id" => 13797,
		"user_id" => 17601,
		"work_status" => "Non European National"
	],
	[
		"id" => 14102,
		"user_id" => 17906,
		"work_status" => "Non European National"
	],
	[
		"id" => 13404,
		"user_id" => 17208,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14557,
		"user_id" => 18361,
		"work_status" => "European National"
	],
	[
		"id" => 16866,
		"user_id" => 21349,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19301,
		"user_id" => 23848,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5601,
		"user_id" => 7909,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5586,
		"user_id" => 7894,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5602,
		"user_id" => 7910,
		"work_status" => "European National"
	],
	[
		"id" => 5591,
		"user_id" => 7899,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15313,
		"user_id" => 19117,
		"work_status" => "Non European National"
	],
	[
		"id" => 5587,
		"user_id" => 7895,
		"work_status" => "Non European National"
	],
	[
		"id" => 5040,
		"user_id" => 7348,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5604,
		"user_id" => 7912,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8018,
		"user_id" => 11081,
		"work_status" => "European National"
	],
	[
		"id" => 18811,
		"user_id" => 23358,
		"work_status" => "European National"
	],
	[
		"id" => 20079,
		"user_id" => 24717,
		"work_status" => "0"
	],
	[
		"id" => 5600,
		"user_id" => 7908,
		"work_status" => "European National"
	],
	[
		"id" => 13804,
		"user_id" => 17608,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13149,
		"user_id" => 16953,
		"work_status" => "European National"
	],
	[
		"id" => 19741,
		"user_id" => 24288,
		"work_status" => "Non European National"
	],
	[
		"id" => 19853,
		"user_id" => 24400,
		"work_status" => "European National"
	],
	[
		"id" => 13741,
		"user_id" => 17545,
		"work_status" => "Non European National"
	],
	[
		"id" => 22173,
		"user_id" => 27699,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13190,
		"user_id" => 16994,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24753,
		"user_id" => 30317,
		"work_status" => "Non European National"
	],
	[
		"id" => 5658,
		"user_id" => 7966,
		"work_status" => "European National"
	],
	[
		"id" => 13246,
		"user_id" => 17050,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15261,
		"user_id" => 19065,
		"work_status" => "European National"
	],
	[
		"id" => 13623,
		"user_id" => 17427,
		"work_status" => "European National"
	],
	[
		"id" => 13925,
		"user_id" => 17729,
		"work_status" => "European National"
	],
	[
		"id" => 13775,
		"user_id" => 17579,
		"work_status" => "Non European National"
	],
	[
		"id" => 5148,
		"user_id" => 7456,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14750,
		"user_id" => 18554,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15045,
		"user_id" => 18849,
		"work_status" => "Non European National"
	],
	[
		"id" => 16812,
		"user_id" => 21294,
		"work_status" => "European National"
	],
	[
		"id" => 16808,
		"user_id" => 21290,
		"work_status" => "European National"
	],
	[
		"id" => 9066,
		"user_id" => 12632,
		"work_status" => "0"
	],
	[
		"id" => 9067,
		"user_id" => 12634,
		"work_status" => "0"
	],
	[
		"id" => 14317,
		"user_id" => 18121,
		"work_status" => "Non European National"
	],
	[
		"id" => 15199,
		"user_id" => 19003,
		"work_status" => "Non European National"
	],
	[
		"id" => 13712,
		"user_id" => 17516,
		"work_status" => "Non European National"
	],
	[
		"id" => 13145,
		"user_id" => 16949,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18905,
		"user_id" => 23452,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5592,
		"user_id" => 7900,
		"work_status" => "European National"
	],
	[
		"id" => 14716,
		"user_id" => 18520,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13879,
		"user_id" => 17683,
		"work_status" => "European National"
	],
	[
		"id" => 13166,
		"user_id" => 16970,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13384,
		"user_id" => 17188,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5610,
		"user_id" => 7918,
		"work_status" => "Non European National"
	],
	[
		"id" => 15234,
		"user_id" => 19038,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16786,
		"user_id" => 21268,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5782,
		"user_id" => 8090,
		"work_status" => "Non European National"
	],
	[
		"id" => 13426,
		"user_id" => 17230,
		"work_status" => "European National"
	],
	[
		"id" => 15307,
		"user_id" => 19111,
		"work_status" => "Non European National"
	],
	[
		"id" => 24756,
		"user_id" => 30320,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5830,
		"user_id" => 8138,
		"work_status" => "European National"
	],
	[
		"id" => 5713,
		"user_id" => 8021,
		"work_status" => "European National"
	],
	[
		"id" => 23646,
		"user_id" => 29210,
		"work_status" => "European National"
	],
	[
		"id" => 15295,
		"user_id" => 19099,
		"work_status" => "Non European National"
	],
	[
		"id" => 23524,
		"user_id" => 29088,
		"work_status" => "European National"
	],
	[
		"id" => 16411,
		"user_id" => 20688,
		"work_status" => "0"
	],
	[
		"id" => 5617,
		"user_id" => 7925,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19333,
		"user_id" => 23880,
		"work_status" => "European National"
	],
	[
		"id" => 15166,
		"user_id" => 18970,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14759,
		"user_id" => 18563,
		"work_status" => "Non European National"
	],
	[
		"id" => 14009,
		"user_id" => 17813,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14604,
		"user_id" => 18408,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14428,
		"user_id" => 18232,
		"work_status" => "European National"
	],
	[
		"id" => 19017,
		"user_id" => 23564,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19295,
		"user_id" => 23842,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18781,
		"user_id" => 23328,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14748,
		"user_id" => 18552,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14033,
		"user_id" => 17837,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5623,
		"user_id" => 7931,
		"work_status" => "European National"
	],
	[
		"id" => 14740,
		"user_id" => 18544,
		"work_status" => "European National"
	],
	[
		"id" => 13542,
		"user_id" => 17346,
		"work_status" => "European National"
	],
	[
		"id" => 13381,
		"user_id" => 17185,
		"work_status" => "European National"
	],
	[
		"id" => 19264,
		"user_id" => 23811,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19036,
		"user_id" => 23583,
		"work_status" => "European National"
	],
	[
		"id" => 5742,
		"user_id" => 8050,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21787,
		"user_id" => 27313,
		"work_status" => "Non European National"
	],
	[
		"id" => 5765,
		"user_id" => 8073,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12781,
		"user_id" => 16445,
		"work_status" => "European National"
	],
	[
		"id" => 19516,
		"user_id" => 24063,
		"work_status" => "Non European National"
	],
	[
		"id" => 16828,
		"user_id" => 21311,
		"work_status" => "Non European National"
	],
	[
		"id" => 5771,
		"user_id" => 8079,
		"work_status" => "European National"
	],
	[
		"id" => 12041,
		"user_id" => 15681,
		"work_status" => "European National"
	],
	[
		"id" => 5739,
		"user_id" => 8047,
		"work_status" => "European National"
	],
	[
		"id" => 5811,
		"user_id" => 8119,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6515,
		"user_id" => 8964,
		"work_status" => "Non European National"
	],
	[
		"id" => 13299,
		"user_id" => 17103,
		"work_status" => "Non European National"
	],
	[
		"id" => 14093,
		"user_id" => 17897,
		"work_status" => "European National"
	],
	[
		"id" => 14503,
		"user_id" => 18307,
		"work_status" => "Non European National"
	],
	[
		"id" => 5743,
		"user_id" => 8051,
		"work_status" => "Non European National"
	],
	[
		"id" => 5633,
		"user_id" => 7941,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4910,
		"user_id" => 7218,
		"work_status" => "European National"
	],
	[
		"id" => 5628,
		"user_id" => 7936,
		"work_status" => "Non European National"
	],
	[
		"id" => 15309,
		"user_id" => 19113,
		"work_status" => "European National"
	],
	[
		"id" => 5657,
		"user_id" => 7965,
		"work_status" => "European National"
	],
	[
		"id" => 16785,
		"user_id" => 21267,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15299,
		"user_id" => 19103,
		"work_status" => "European National"
	],
	[
		"id" => 19695,
		"user_id" => 24242,
		"work_status" => "European National"
	],
	[
		"id" => 19238,
		"user_id" => 23785,
		"work_status" => "European National"
	],
	[
		"id" => 14078,
		"user_id" => 17882,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19324,
		"user_id" => 23871,
		"work_status" => "Non European National"
	],
	[
		"id" => 16790,
		"user_id" => 21272,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15013,
		"user_id" => 18817,
		"work_status" => "Non European National"
	],
	[
		"id" => 15122,
		"user_id" => 18926,
		"work_status" => "Non European National"
	],
	[
		"id" => 11963,
		"user_id" => 15588,
		"work_status" => "Non European National"
	],
	[
		"id" => 13875,
		"user_id" => 17679,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8459,
		"user_id" => 11685,
		"work_status" => "0"
	],
	[
		"id" => 8460,
		"user_id" => 11686,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19766,
		"user_id" => 24313,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23535,
		"user_id" => 29099,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14031,
		"user_id" => 17835,
		"work_status" => "Non European National"
	],
	[
		"id" => 23882,
		"user_id" => 29446,
		"work_status" => "European National"
	],
	[
		"id" => 14401,
		"user_id" => 18205,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14947,
		"user_id" => 18751,
		"work_status" => "European National"
	],
	[
		"id" => 14779,
		"user_id" => 18583,
		"work_status" => "European National"
	],
	[
		"id" => 24679,
		"user_id" => 30243,
		"work_status" => "European National"
	],
	[
		"id" => 5783,
		"user_id" => 8091,
		"work_status" => "European National"
	],
	[
		"id" => 14404,
		"user_id" => 18208,
		"work_status" => "European National"
	],
	[
		"id" => 13316,
		"user_id" => 17120,
		"work_status" => "Non European National"
	],
	[
		"id" => 5642,
		"user_id" => 7950,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14687,
		"user_id" => 18491,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13682,
		"user_id" => 17486,
		"work_status" => "Non European National"
	],
	[
		"id" => 19352,
		"user_id" => 23899,
		"work_status" => "Non European National"
	],
	[
		"id" => 14511,
		"user_id" => 18315,
		"work_status" => "European National"
	],
	[
		"id" => 13192,
		"user_id" => 16996,
		"work_status" => "Non European National"
	],
	[
		"id" => 15388,
		"user_id" => 19192,
		"work_status" => "Non European National"
	],
	[
		"id" => 14280,
		"user_id" => 18084,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16839,
		"user_id" => 21322,
		"work_status" => "Non European National"
	],
	[
		"id" => 19326,
		"user_id" => 23873,
		"work_status" => "European National"
	],
	[
		"id" => 12167,
		"user_id" => 15807,
		"work_status" => "Non European National"
	],
	[
		"id" => 14918,
		"user_id" => 18722,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24770,
		"user_id" => 30334,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13225,
		"user_id" => 17029,
		"work_status" => "Non European National"
	],
	[
		"id" => 16799,
		"user_id" => 21281,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14733,
		"user_id" => 18537,
		"work_status" => "Non European National"
	],
	[
		"id" => 24461,
		"user_id" => 30025,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16802,
		"user_id" => 21284,
		"work_status" => "European National"
	],
	[
		"id" => 15154,
		"user_id" => 18958,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5666,
		"user_id" => 7974,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13244,
		"user_id" => 17048,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14584,
		"user_id" => 18388,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22902,
		"user_id" => 28428,
		"work_status" => "Non European National"
	],
	[
		"id" => 13747,
		"user_id" => 17551,
		"work_status" => "Non European National"
	],
	[
		"id" => 16761,
		"user_id" => 21243,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5668,
		"user_id" => 7976,
		"work_status" => "European National"
	],
	[
		"id" => 13793,
		"user_id" => 17597,
		"work_status" => "Non European National"
	],
	[
		"id" => 13586,
		"user_id" => 17390,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5693,
		"user_id" => 8001,
		"work_status" => "European National"
	],
	[
		"id" => 22935,
		"user_id" => 28461,
		"work_status" => "Non European National"
	],
	[
		"id" => 24456,
		"user_id" => 30020,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5645,
		"user_id" => 7953,
		"work_status" => "Non European National"
	],
	[
		"id" => 5772,
		"user_id" => 8080,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23845,
		"user_id" => 29409,
		"work_status" => "European National"
	],
	[
		"id" => 13685,
		"user_id" => 17489,
		"work_status" => "Non European National"
	],
	[
		"id" => 25798,
		"user_id" => 31917,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16295,
		"user_id" => 20527,
		"work_status" => "0"
	],
	[
		"id" => 13749,
		"user_id" => 17553,
		"work_status" => "Non European National"
	],
	[
		"id" => 13395,
		"user_id" => 17199,
		"work_status" => "Non European National"
	],
	[
		"id" => 13827,
		"user_id" => 17631,
		"work_status" => "European National"
	],
	[
		"id" => 13791,
		"user_id" => 17595,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16756,
		"user_id" => 21238,
		"work_status" => "European National"
	],
	[
		"id" => 5670,
		"user_id" => 7978,
		"work_status" => "European National"
	],
	[
		"id" => 5671,
		"user_id" => 7979,
		"work_status" => "European National"
	],
	[
		"id" => 14228,
		"user_id" => 18032,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24405,
		"user_id" => 29969,
		"work_status" => "Non European National"
	],
	[
		"id" => 5672,
		"user_id" => 7980,
		"work_status" => "Non European National"
	],
	[
		"id" => 18984,
		"user_id" => 23531,
		"work_status" => "Non European National"
	],
	[
		"id" => 14980,
		"user_id" => 18784,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21377,
		"user_id" => 26651,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15159,
		"user_id" => 18963,
		"work_status" => "Non European National"
	],
	[
		"id" => 15016,
		"user_id" => 18820,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4803,
		"user_id" => 7111,
		"work_status" => "Non European National"
	],
	[
		"id" => 13967,
		"user_id" => 17771,
		"work_status" => "European National"
	],
	[
		"id" => 13806,
		"user_id" => 17610,
		"work_status" => "European National"
	],
	[
		"id" => 20198,
		"user_id" => 24912,
		"work_status" => "0"
	],
	[
		"id" => 20199,
		"user_id" => 24913,
		"work_status" => "0"
	],
	[
		"id" => 19136,
		"user_id" => 23683,
		"work_status" => "European National"
	],
	[
		"id" => 14037,
		"user_id" => 17841,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5648,
		"user_id" => 7956,
		"work_status" => "Non European National"
	],
	[
		"id" => 15310,
		"user_id" => 19114,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12089,
		"user_id" => 15729,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5784,
		"user_id" => 8092,
		"work_status" => "European National"
	],
	[
		"id" => 5676,
		"user_id" => 7984,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12453,
		"user_id" => 16093,
		"work_status" => "European National"
	],
	[
		"id" => 14909,
		"user_id" => 18713,
		"work_status" => "Non European National"
	],
	[
		"id" => 16777,
		"user_id" => 21259,
		"work_status" => "Non European National"
	],
	[
		"id" => 5678,
		"user_id" => 7986,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8928,
		"user_id" => 12420,
		"work_status" => "0"
	],
	[
		"id" => 16835,
		"user_id" => 21318,
		"work_status" => "European National"
	],
	[
		"id" => 5680,
		"user_id" => 7988,
		"work_status" => "European National"
	],
	[
		"id" => 5681,
		"user_id" => 7989,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14084,
		"user_id" => 17888,
		"work_status" => "European National"
	],
	[
		"id" => 13995,
		"user_id" => 17799,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5682,
		"user_id" => 7990,
		"work_status" => "Non European National"
	],
	[
		"id" => 15271,
		"user_id" => 19075,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24374,
		"user_id" => 29938,
		"work_status" => "European National"
	],
	[
		"id" => 5699,
		"user_id" => 8007,
		"work_status" => "European National"
	],
	[
		"id" => 14407,
		"user_id" => 18211,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14632,
		"user_id" => 18436,
		"work_status" => "European National"
	],
	[
		"id" => 5697,
		"user_id" => 8005,
		"work_status" => "Non European National"
	],
	[
		"id" => 13592,
		"user_id" => 17396,
		"work_status" => "Non European National"
	],
	[
		"id" => 16463,
		"user_id" => 20767,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5803,
		"user_id" => 8111,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14289,
		"user_id" => 18093,
		"work_status" => "European National"
	],
	[
		"id" => 15035,
		"user_id" => 18839,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23118,
		"user_id" => 28644,
		"work_status" => "Non European National"
	],
	[
		"id" => 13837,
		"user_id" => 17641,
		"work_status" => "European National"
	],
	[
		"id" => 13473,
		"user_id" => 17277,
		"work_status" => "European National"
	],
	[
		"id" => 12467,
		"user_id" => 16107,
		"work_status" => "European National"
	],
	[
		"id" => 14314,
		"user_id" => 18118,
		"work_status" => "Non European National"
	],
	[
		"id" => 5702,
		"user_id" => 8010,
		"work_status" => "European National"
	],
	[
		"id" => 12544,
		"user_id" => 12107,
		"work_status" => "Non European National"
	],
	[
		"id" => 14079,
		"user_id" => 17883,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12336,
		"user_id" => 15976,
		"work_status" => "European National"
	],
	[
		"id" => 5704,
		"user_id" => 8012,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13817,
		"user_id" => 17621,
		"work_status" => "Non European National"
	],
	[
		"id" => 5707,
		"user_id" => 8015,
		"work_status" => "Non European National"
	],
	[
		"id" => 14526,
		"user_id" => 18330,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12926,
		"user_id" => 12797,
		"work_status" => "Non European National"
	],
	[
		"id" => 23604,
		"user_id" => 29168,
		"work_status" => "European National"
	],
	[
		"id" => 5798,
		"user_id" => 8106,
		"work_status" => "European National"
	],
	[
		"id" => 14406,
		"user_id" => 18210,
		"work_status" => "Non European National"
	],
	[
		"id" => 14300,
		"user_id" => 18104,
		"work_status" => "Non European National"
	],
	[
		"id" => 13671,
		"user_id" => 17475,
		"work_status" => "Non European National"
	],
	[
		"id" => 25801,
		"user_id" => 31920,
		"work_status" => "Non European National"
	],
	[
		"id" => 23097,
		"user_id" => 28623,
		"work_status" => "Non European National"
	],
	[
		"id" => 5689,
		"user_id" => 7997,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16861,
		"user_id" => 21344,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16847,
		"user_id" => 21330,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5746,
		"user_id" => 8054,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5838,
		"user_id" => 8146,
		"work_status" => "European National"
	],
	[
		"id" => 14145,
		"user_id" => 17949,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19202,
		"user_id" => 23749,
		"work_status" => "Non European National"
	],
	[
		"id" => 5718,
		"user_id" => 8026,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14286,
		"user_id" => 18090,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5719,
		"user_id" => 8027,
		"work_status" => "Non European National"
	],
	[
		"id" => 23737,
		"user_id" => 29301,
		"work_status" => "European National"
	],
	[
		"id" => 19667,
		"user_id" => 24214,
		"work_status" => "Non European National"
	],
	[
		"id" => 5720,
		"user_id" => 8028,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19827,
		"user_id" => 24374,
		"work_status" => "European National"
	],
	[
		"id" => 19110,
		"user_id" => 23657,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13372,
		"user_id" => 17176,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15085,
		"user_id" => 18889,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14340,
		"user_id" => 18144,
		"work_status" => "European National"
	],
	[
		"id" => 5840,
		"user_id" => 8148,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13232,
		"user_id" => 17036,
		"work_status" => "European National"
	],
	[
		"id" => 5722,
		"user_id" => 8030,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13488,
		"user_id" => 17292,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5724,
		"user_id" => 8032,
		"work_status" => "Non European National"
	],
	[
		"id" => 16711,
		"user_id" => 21177,
		"work_status" => "0"
	],
	[
		"id" => 16712,
		"user_id" => 21178,
		"work_status" => "Non European National"
	],
	[
		"id" => 14043,
		"user_id" => 17847,
		"work_status" => "European National"
	],
	[
		"id" => 13195,
		"user_id" => 16999,
		"work_status" => "Non European National"
	],
	[
		"id" => 13700,
		"user_id" => 17504,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18981,
		"user_id" => 23528,
		"work_status" => "Non European National"
	],
	[
		"id" => 19639,
		"user_id" => 24186,
		"work_status" => "Non European National"
	],
	[
		"id" => 5725,
		"user_id" => 8033,
		"work_status" => "European National"
	],
	[
		"id" => 13696,
		"user_id" => 17500,
		"work_status" => "European National"
	],
	[
		"id" => 19879,
		"user_id" => 24426,
		"work_status" => "Non European National"
	],
	[
		"id" => 5726,
		"user_id" => 8034,
		"work_status" => "European National"
	],
	[
		"id" => 15392,
		"user_id" => 19196,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5748,
		"user_id" => 8056,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15246,
		"user_id" => 19050,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19725,
		"user_id" => 24272,
		"work_status" => "Non European National"
	],
	[
		"id" => 13669,
		"user_id" => 17473,
		"work_status" => "Non European National"
	],
	[
		"id" => 14434,
		"user_id" => 18238,
		"work_status" => "European National"
	],
	[
		"id" => 16846,
		"user_id" => 21329,
		"work_status" => "European National"
	],
	[
		"id" => 14847,
		"user_id" => 18651,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13310,
		"user_id" => 17114,
		"work_status" => "European National"
	],
	[
		"id" => 5155,
		"user_id" => 7463,
		"work_status" => "0"
	],
	[
		"id" => 18865,
		"user_id" => 23412,
		"work_status" => "Non European National"
	],
	[
		"id" => 13873,
		"user_id" => 17677,
		"work_status" => "European National"
	],
	[
		"id" => 14074,
		"user_id" => 17878,
		"work_status" => "European National"
	],
	[
		"id" => 5735,
		"user_id" => 8043,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5734,
		"user_id" => 8042,
		"work_status" => "European National"
	],
	[
		"id" => 14940,
		"user_id" => 18744,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12326,
		"user_id" => 15966,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14265,
		"user_id" => 18069,
		"work_status" => "Non European National"
	],
	[
		"id" => 5737,
		"user_id" => 8045,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5738,
		"user_id" => 8046,
		"work_status" => "Non European National"
	],
	[
		"id" => 19748,
		"user_id" => 24295,
		"work_status" => "Non European National"
	],
	[
		"id" => 15033,
		"user_id" => 18837,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5767,
		"user_id" => 8075,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5823,
		"user_id" => 8131,
		"work_status" => "Non European National"
	],
	[
		"id" => 5750,
		"user_id" => 8058,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16768,
		"user_id" => 21250,
		"work_status" => "European National"
	],
	[
		"id" => 23709,
		"user_id" => 29273,
		"work_status" => "Non European National"
	],
	[
		"id" => 13743,
		"user_id" => 17547,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5103,
		"user_id" => 7411,
		"work_status" => "Non European National"
	],
	[
		"id" => 12154,
		"user_id" => 15794,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13516,
		"user_id" => 17320,
		"work_status" => "Non European National"
	],
	[
		"id" => 5768,
		"user_id" => 8076,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15332,
		"user_id" => 19136,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5754,
		"user_id" => 8062,
		"work_status" => "European National"
	],
	[
		"id" => 14857,
		"user_id" => 18661,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15294,
		"user_id" => 19098,
		"work_status" => "Non European National"
	],
	[
		"id" => 23888,
		"user_id" => 29452,
		"work_status" => "Non European National"
	],
	[
		"id" => 15363,
		"user_id" => 19167,
		"work_status" => "Non European National"
	],
	[
		"id" => 5760,
		"user_id" => 8068,
		"work_status" => "European National"
	],
	[
		"id" => 5763,
		"user_id" => 8071,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5800,
		"user_id" => 8108,
		"work_status" => "European National"
	],
	[
		"id" => 5762,
		"user_id" => 8070,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13363,
		"user_id" => 17167,
		"work_status" => "Non European National"
	],
	[
		"id" => 14592,
		"user_id" => 18396,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23173,
		"user_id" => 28699,
		"work_status" => "Non European National"
	],
	[
		"id" => 14679,
		"user_id" => 18483,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19003,
		"user_id" => 23550,
		"work_status" => "European National"
	],
	[
		"id" => 15324,
		"user_id" => 19128,
		"work_status" => "European National"
	],
	[
		"id" => 13351,
		"user_id" => 17155,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13180,
		"user_id" => 16984,
		"work_status" => "Non European National"
	],
	[
		"id" => 24797,
		"user_id" => 30361,
		"work_status" => "European National"
	],
	[
		"id" => 19508,
		"user_id" => 24055,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15291,
		"user_id" => 19095,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13678,
		"user_id" => 17482,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15051,
		"user_id" => 18855,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23035,
		"user_id" => 28561,
		"work_status" => "Non European National"
	],
	[
		"id" => 14900,
		"user_id" => 18704,
		"work_status" => "Non European National"
	],
	[
		"id" => 14299,
		"user_id" => 18103,
		"work_status" => "Non European National"
	],
	[
		"id" => 13616,
		"user_id" => 17420,
		"work_status" => "European National"
	],
	[
		"id" => 12173,
		"user_id" => 15813,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5769,
		"user_id" => 8077,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5774,
		"user_id" => 8082,
		"work_status" => "European National"
	],
	[
		"id" => 13811,
		"user_id" => 17615,
		"work_status" => "European National"
	],
	[
		"id" => 15238,
		"user_id" => 19042,
		"work_status" => "European National"
	],
	[
		"id" => 15079,
		"user_id" => 18883,
		"work_status" => "Non European National"
	],
	[
		"id" => 14554,
		"user_id" => 18358,
		"work_status" => "European National"
	],
	[
		"id" => 19648,
		"user_id" => 24195,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12702,
		"user_id" => 16319,
		"work_status" => "0"
	],
	[
		"id" => 19098,
		"user_id" => 23645,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22826,
		"user_id" => 28352,
		"work_status" => "Non European National"
	],
	[
		"id" => 7180,
		"user_id" => 9864,
		"work_status" => "European National"
	],
	[
		"id" => 5787,
		"user_id" => 8095,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14853,
		"user_id" => 18657,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5775,
		"user_id" => 8083,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8682,
		"user_id" => 12017,
		"work_status" => "Non European National"
	],
	[
		"id" => 19035,
		"user_id" => 23582,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5789,
		"user_id" => 8097,
		"work_status" => "European National"
	],
	[
		"id" => 23869,
		"user_id" => 29433,
		"work_status" => "European National"
	],
	[
		"id" => 5777,
		"user_id" => 8085,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14631,
		"user_id" => 18435,
		"work_status" => "Non European National"
	],
	[
		"id" => 13998,
		"user_id" => 17802,
		"work_status" => "European National"
	],
	[
		"id" => 5791,
		"user_id" => 8099,
		"work_status" => "Non European National"
	],
	[
		"id" => 15026,
		"user_id" => 18830,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13785,
		"user_id" => 17589,
		"work_status" => "Non European National"
	],
	[
		"id" => 19886,
		"user_id" => 24433,
		"work_status" => "European National"
	],
	[
		"id" => 13731,
		"user_id" => 17535,
		"work_status" => "European National"
	],
	[
		"id" => 5792,
		"user_id" => 8100,
		"work_status" => "European National"
	],
	[
		"id" => 12692,
		"user_id" => 16307,
		"work_status" => "0"
	],
	[
		"id" => 16858,
		"user_id" => 21341,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14048,
		"user_id" => 17852,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5794,
		"user_id" => 8102,
		"work_status" => "European National"
	],
	[
		"id" => 19232,
		"user_id" => 23779,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5795,
		"user_id" => 8103,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13774,
		"user_id" => 17578,
		"work_status" => "Non European National"
	],
	[
		"id" => 5799,
		"user_id" => 8107,
		"work_status" => "Non European National"
	],
	[
		"id" => 24856,
		"user_id" => 30420,
		"work_status" => "European National"
	],
	[
		"id" => 13829,
		"user_id" => 17633,
		"work_status" => "European National"
	],
	[
		"id" => 13209,
		"user_id" => 17013,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5779,
		"user_id" => 8087,
		"work_status" => "Non European National"
	],
	[
		"id" => 24702,
		"user_id" => 30266,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5778,
		"user_id" => 8086,
		"work_status" => "European National"
	],
	[
		"id" => 14042,
		"user_id" => 17846,
		"work_status" => "European National"
	],
	[
		"id" => 5780,
		"user_id" => 8088,
		"work_status" => "Non European National"
	],
	[
		"id" => 18580,
		"user_id" => 23072,
		"work_status" => "Non European National"
	],
	[
		"id" => 14861,
		"user_id" => 18665,
		"work_status" => "Non European National"
	],
	[
		"id" => 13447,
		"user_id" => 17251,
		"work_status" => "Non European National"
	],
	[
		"id" => 14773,
		"user_id" => 18577,
		"work_status" => "European National"
	],
	[
		"id" => 14121,
		"user_id" => 17925,
		"work_status" => "European National"
	],
	[
		"id" => 5810,
		"user_id" => 8118,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15152,
		"user_id" => 18956,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15091,
		"user_id" => 18895,
		"work_status" => "European National"
	],
	[
		"id" => 17285,
		"user_id" => 21774,
		"work_status" => "Non European National"
	],
	[
		"id" => 24905,
		"user_id" => 30469,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15203,
		"user_id" => 19007,
		"work_status" => "Non European National"
	],
	[
		"id" => 23280,
		"user_id" => 28806,
		"work_status" => "Non European National"
	],
	[
		"id" => 5824,
		"user_id" => 8132,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22136,
		"user_id" => 27662,
		"work_status" => "European National"
	],
	[
		"id" => 14129,
		"user_id" => 17933,
		"work_status" => "Non European National"
	],
	[
		"id" => 19063,
		"user_id" => 23610,
		"work_status" => "European National"
	],
	[
		"id" => 19064,
		"user_id" => 23611,
		"work_status" => "European National"
	],
	[
		"id" => 13481,
		"user_id" => 17285,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5813,
		"user_id" => 8121,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5804,
		"user_id" => 8112,
		"work_status" => "European National"
	],
	[
		"id" => 14533,
		"user_id" => 18337,
		"work_status" => "Non European National"
	],
	[
		"id" => 4873,
		"user_id" => 7181,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14417,
		"user_id" => 18221,
		"work_status" => "Non European National"
	],
	[
		"id" => 23048,
		"user_id" => 28574,
		"work_status" => "Non European National"
	],
	[
		"id" => 13356,
		"user_id" => 17160,
		"work_status" => "Non European National"
	],
	[
		"id" => 13515,
		"user_id" => 17319,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14379,
		"user_id" => 18183,
		"work_status" => "European National"
	],
	[
		"id" => 20578,
		"user_id" => 25439,
		"work_status" => "Non European National"
	],
	[
		"id" => 5801,
		"user_id" => 8109,
		"work_status" => "European National"
	],
	[
		"id" => 16759,
		"user_id" => 21241,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16841,
		"user_id" => 21324,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16891,
		"user_id" => 21376,
		"work_status" => "0"
	],
	[
		"id" => 16892,
		"user_id" => 21378,
		"work_status" => "0"
	],
	[
		"id" => 16893,
		"user_id" => 21379,
		"work_status" => "0"
	],
	[
		"id" => 16894,
		"user_id" => 21381,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15315,
		"user_id" => 19119,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15293,
		"user_id" => 19097,
		"work_status" => "Non European National"
	],
	[
		"id" => 5826,
		"user_id" => 8134,
		"work_status" => "European National"
	],
	[
		"id" => 14019,
		"user_id" => 17823,
		"work_status" => "European National"
	],
	[
		"id" => 14258,
		"user_id" => 18062,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14125,
		"user_id" => 17929,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5853,
		"user_id" => 8161,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24754,
		"user_id" => 30318,
		"work_status" => "Non European National"
	],
	[
		"id" => 20093,
		"user_id" => 24743,
		"work_status" => "European National"
	],
	[
		"id" => 14139,
		"user_id" => 17943,
		"work_status" => "European National"
	],
	[
		"id" => 14934,
		"user_id" => 18738,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23780,
		"user_id" => 29344,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13667,
		"user_id" => 17471,
		"work_status" => "Non European National"
	],
	[
		"id" => 5845,
		"user_id" => 8153,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14459,
		"user_id" => 18263,
		"work_status" => "Non European National"
	],
	[
		"id" => 13390,
		"user_id" => 17194,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15367,
		"user_id" => 19171,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12707,
		"user_id" => 16327,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15061,
		"user_id" => 18865,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14193,
		"user_id" => 17997,
		"work_status" => "European National"
	],
	[
		"id" => 14666,
		"user_id" => 18470,
		"work_status" => "Non European National"
	],
	[
		"id" => 13736,
		"user_id" => 17540,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19838,
		"user_id" => 24385,
		"work_status" => "European National"
	],
	[
		"id" => 5817,
		"user_id" => 8125,
		"work_status" => "European National"
	],
	[
		"id" => 23675,
		"user_id" => 29239,
		"work_status" => "European National"
	],
	[
		"id" => 5812,
		"user_id" => 8120,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6432,
		"user_id" => 8876,
		"work_status" => "European National"
	],
	[
		"id" => 6433,
		"user_id" => 8877,
		"work_status" => "Non European National"
	],
	[
		"id" => 14492,
		"user_id" => 18296,
		"work_status" => "European National"
	],
	[
		"id" => 5818,
		"user_id" => 8126,
		"work_status" => "European National"
	],
	[
		"id" => 19746,
		"user_id" => 24293,
		"work_status" => "Non European National"
	],
	[
		"id" => 14453,
		"user_id" => 18257,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20187,
		"user_id" => 24894,
		"work_status" => "0"
	],
	[
		"id" => 20189,
		"user_id" => 24899,
		"work_status" => "Non European National"
	],
	[
		"id" => 5837,
		"user_id" => 8145,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23528,
		"user_id" => 29092,
		"work_status" => "Non European National"
	],
	[
		"id" => 19249,
		"user_id" => 23796,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19102,
		"user_id" => 23649,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5102,
		"user_id" => 7410,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5844,
		"user_id" => 8152,
		"work_status" => "European National"
	],
	[
		"id" => 14080,
		"user_id" => 17884,
		"work_status" => "Non European National"
	],
	[
		"id" => 14426,
		"user_id" => 18230,
		"work_status" => "Non European National"
	],
	[
		"id" => 14034,
		"user_id" => 17838,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20102,
		"user_id" => 24753,
		"work_status" => "Non European National"
	],
	[
		"id" => 23199,
		"user_id" => 28725,
		"work_status" => "Non European National"
	],
	[
		"id" => 5828,
		"user_id" => 8136,
		"work_status" => "European National"
	],
	[
		"id" => 19305,
		"user_id" => 23852,
		"work_status" => "Non European National"
	],
	[
		"id" => 5829,
		"user_id" => 8137,
		"work_status" => "Non European National"
	],
	[
		"id" => 14157,
		"user_id" => 17961,
		"work_status" => "European National"
	],
	[
		"id" => 20214,
		"user_id" => 24936,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18889,
		"user_id" => 23436,
		"work_status" => "Non European National"
	],
	[
		"id" => 14973,
		"user_id" => 18777,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19114,
		"user_id" => 23661,
		"work_status" => "European National"
	],
	[
		"id" => 14377,
		"user_id" => 18181,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14586,
		"user_id" => 18390,
		"work_status" => "Non European National"
	],
	[
		"id" => 14805,
		"user_id" => 18609,
		"work_status" => "European National"
	],
	[
		"id" => 14663,
		"user_id" => 18467,
		"work_status" => "European National"
	],
	[
		"id" => 13498,
		"user_id" => 17302,
		"work_status" => "Non European National"
	],
	[
		"id" => 13916,
		"user_id" => 17720,
		"work_status" => "Non European National"
	],
	[
		"id" => 14983,
		"user_id" => 18787,
		"work_status" => "Non European National"
	],
	[
		"id" => 15389,
		"user_id" => 19193,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16855,
		"user_id" => 21338,
		"work_status" => "Non European National"
	],
	[
		"id" => 27448,
		"user_id" => 34244,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15008,
		"user_id" => 18812,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13782,
		"user_id" => 17586,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14845,
		"user_id" => 18649,
		"work_status" => "European National"
	],
	[
		"id" => 19269,
		"user_id" => 23816,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13677,
		"user_id" => 17481,
		"work_status" => "European National"
	],
	[
		"id" => 19415,
		"user_id" => 23962,
		"work_status" => "Non European National"
	],
	[
		"id" => 14187,
		"user_id" => 17991,
		"work_status" => "European National"
	],
	[
		"id" => 13204,
		"user_id" => 17008,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13767,
		"user_id" => 17571,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18860,
		"user_id" => 23407,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13169,
		"user_id" => 16973,
		"work_status" => "European National"
	],
	[
		"id" => 5849,
		"user_id" => 8157,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5848,
		"user_id" => 8156,
		"work_status" => "European National"
	],
	[
		"id" => 14735,
		"user_id" => 18539,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14760,
		"user_id" => 18564,
		"work_status" => "European National"
	],
	[
		"id" => 13869,
		"user_id" => 17673,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13610,
		"user_id" => 17414,
		"work_status" => "Non European National"
	],
	[
		"id" => 14924,
		"user_id" => 18728,
		"work_status" => "European National"
	],
	[
		"id" => 13845,
		"user_id" => 17649,
		"work_status" => "Non European National"
	],
	[
		"id" => 23899,
		"user_id" => 29463,
		"work_status" => "Non European National"
	],
	[
		"id" => 14813,
		"user_id" => 18617,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13532,
		"user_id" => 17336,
		"work_status" => "Non European National"
	],
	[
		"id" => 5855,
		"user_id" => 8163,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4793,
		"user_id" => 7104,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13469,
		"user_id" => 17273,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14273,
		"user_id" => 18077,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15373,
		"user_id" => 19177,
		"work_status" => "European National"
	],
	[
		"id" => 13919,
		"user_id" => 17723,
		"work_status" => "Non European National"
	],
	[
		"id" => 15151,
		"user_id" => 18955,
		"work_status" => "Non European National"
	],
	[
		"id" => 13558,
		"user_id" => 17362,
		"work_status" => "Non European National"
	],
	[
		"id" => 14833,
		"user_id" => 18637,
		"work_status" => "Non European National"
	],
	[
		"id" => 14399,
		"user_id" => 18203,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13435,
		"user_id" => 17239,
		"work_status" => "Non European National"
	],
	[
		"id" => 14144,
		"user_id" => 17948,
		"work_status" => "Non European National"
	],
	[
		"id" => 18826,
		"user_id" => 23373,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5857,
		"user_id" => 8165,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14502,
		"user_id" => 18306,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14268,
		"user_id" => 18072,
		"work_status" => "Non European National"
	],
	[
		"id" => 9027,
		"user_id" => 12565,
		"work_status" => "European National"
	],
	[
		"id" => 13926,
		"user_id" => 17730,
		"work_status" => "Non European National"
	],
	[
		"id" => 13772,
		"user_id" => 17576,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14177,
		"user_id" => 17981,
		"work_status" => "European National"
	],
	[
		"id" => 13796,
		"user_id" => 17600,
		"work_status" => "European National"
	],
	[
		"id" => 24563,
		"user_id" => 30127,
		"work_status" => "Non European National"
	],
	[
		"id" => 14457,
		"user_id" => 18261,
		"work_status" => "Non European National"
	],
	[
		"id" => 13294,
		"user_id" => 17098,
		"work_status" => "Non European National"
	],
	[
		"id" => 19454,
		"user_id" => 24001,
		"work_status" => "European National"
	],
	[
		"id" => 23176,
		"user_id" => 28702,
		"work_status" => "Non European National"
	],
	[
		"id" => 19800,
		"user_id" => 24347,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12416,
		"user_id" => 16056,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16753,
		"user_id" => 21235,
		"work_status" => "European National"
	],
	[
		"id" => 5862,
		"user_id" => 8170,
		"work_status" => "European National"
	],
	[
		"id" => 22781,
		"user_id" => 28307,
		"work_status" => "Non European National"
	],
	[
		"id" => 13613,
		"user_id" => 17417,
		"work_status" => "Non European National"
	],
	[
		"id" => 14504,
		"user_id" => 18308,
		"work_status" => "Non European National"
	],
	[
		"id" => 22946,
		"user_id" => 28472,
		"work_status" => "Non European National"
	],
	[
		"id" => 22313,
		"user_id" => 27839,
		"work_status" => "Non European National"
	],
	[
		"id" => 14863,
		"user_id" => 18667,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26508,
		"user_id" => 32921,
		"work_status" => "European National"
	],
	[
		"id" => 15088,
		"user_id" => 18892,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12543,
		"user_id" => 12212,
		"work_status" => "0"
	],
	[
		"id" => 13177,
		"user_id" => 16981,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15188,
		"user_id" => 18992,
		"work_status" => "Non European National"
	],
	[
		"id" => 4792,
		"user_id" => 7103,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13279,
		"user_id" => 17083,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14022,
		"user_id" => 17826,
		"work_status" => "Non European National"
	],
	[
		"id" => 5865,
		"user_id" => 8173,
		"work_status" => "0"
	],
	[
		"id" => 5866,
		"user_id" => 8174,
		"work_status" => "0"
	],
	[
		"id" => 5867,
		"user_id" => 8175,
		"work_status" => "0"
	],
	[
		"id" => 5098,
		"user_id" => 7406,
		"work_status" => "Non European National"
	],
	[
		"id" => 20105,
		"user_id" => 24733,
		"work_status" => "Non European National"
	],
	[
		"id" => 13311,
		"user_id" => 17115,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16806,
		"user_id" => 21288,
		"work_status" => "Non European National"
	],
	[
		"id" => 12128,
		"user_id" => 15768,
		"work_status" => "Non European National"
	],
	[
		"id" => 21991,
		"user_id" => 27517,
		"work_status" => "Non European National"
	],
	[
		"id" => 15280,
		"user_id" => 19084,
		"work_status" => "Non European National"
	],
	[
		"id" => 14843,
		"user_id" => 18647,
		"work_status" => "European National"
	],
	[
		"id" => 14886,
		"user_id" => 18690,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19118,
		"user_id" => 23665,
		"work_status" => "Non European National"
	],
	[
		"id" => 14860,
		"user_id" => 18664,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14198,
		"user_id" => 18002,
		"work_status" => "Non European National"
	],
	[
		"id" => 13801,
		"user_id" => 17605,
		"work_status" => "Non European National"
	],
	[
		"id" => 13185,
		"user_id" => 16989,
		"work_status" => "Non European National"
	],
	[
		"id" => 14949,
		"user_id" => 18753,
		"work_status" => "European National"
	],
	[
		"id" => 14318,
		"user_id" => 18122,
		"work_status" => "Non European National"
	],
	[
		"id" => 14132,
		"user_id" => 17936,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13556,
		"user_id" => 17360,
		"work_status" => "European National"
	],
	[
		"id" => 16669,
		"user_id" => 21118,
		"work_status" => "Non European National"
	],
	[
		"id" => 23792,
		"user_id" => 29356,
		"work_status" => "Non European National"
	],
	[
		"id" => 19828,
		"user_id" => 24375,
		"work_status" => "European National"
	],
	[
		"id" => 24556,
		"user_id" => 30120,
		"work_status" => "Non European National"
	],
	[
		"id" => 13819,
		"user_id" => 17623,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15233,
		"user_id" => 19037,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13757,
		"user_id" => 17561,
		"work_status" => "Non European National"
	],
	[
		"id" => 13657,
		"user_id" => 17461,
		"work_status" => "European National"
	],
	[
		"id" => 20503,
		"user_id" => 25278,
		"work_status" => "0"
	],
	[
		"id" => 20504,
		"user_id" => 12121,
		"work_status" => "Non European National"
	],
	[
		"id" => 18761,
		"user_id" => 23308,
		"work_status" => "Non European National"
	],
	[
		"id" => 16869,
		"user_id" => 21352,
		"work_status" => "Non European National"
	],
	[
		"id" => 22578,
		"user_id" => 28104,
		"work_status" => "Non European National"
	],
	[
		"id" => 16871,
		"user_id" => 21354,
		"work_status" => "0"
	],
	[
		"id" => 19351,
		"user_id" => 23898,
		"work_status" => "European National"
	],
	[
		"id" => 15201,
		"user_id" => 19005,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13520,
		"user_id" => 17324,
		"work_status" => "Non European National"
	],
	[
		"id" => 14006,
		"user_id" => 17810,
		"work_status" => "European National"
	],
	[
		"id" => 20210,
		"user_id" => 24928,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14351,
		"user_id" => 18155,
		"work_status" => "European National"
	],
	[
		"id" => 15060,
		"user_id" => 18864,
		"work_status" => "European National"
	],
	[
		"id" => 13249,
		"user_id" => 17053,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18771,
		"user_id" => 23318,
		"work_status" => "Non European National"
	],
	[
		"id" => 13970,
		"user_id" => 17774,
		"work_status" => "European National"
	],
	[
		"id" => 14186,
		"user_id" => 17990,
		"work_status" => "European National"
	],
	[
		"id" => 14081,
		"user_id" => 17885,
		"work_status" => "European National"
	],
	[
		"id" => 14135,
		"user_id" => 17939,
		"work_status" => "Non European National"
	],
	[
		"id" => 15316,
		"user_id" => 19120,
		"work_status" => "Non European National"
	],
	[
		"id" => 19889,
		"user_id" => 24436,
		"work_status" => "European National"
	],
	[
		"id" => 13891,
		"user_id" => 17695,
		"work_status" => "European National"
	],
	[
		"id" => 13440,
		"user_id" => 17244,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14036,
		"user_id" => 17840,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13307,
		"user_id" => 17111,
		"work_status" => "Non European National"
	],
	[
		"id" => 14837,
		"user_id" => 18641,
		"work_status" => "Non European National"
	],
	[
		"id" => 15263,
		"user_id" => 19067,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24378,
		"user_id" => 29942,
		"work_status" => "European National"
	],
	[
		"id" => 14565,
		"user_id" => 18369,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14788,
		"user_id" => 18592,
		"work_status" => "Non European National"
	],
	[
		"id" => 13672,
		"user_id" => 17476,
		"work_status" => "Non European National"
	],
	[
		"id" => 19197,
		"user_id" => 23744,
		"work_status" => "European National"
	],
	[
		"id" => 20070,
		"user_id" => 23092,
		"work_status" => "Non European National"
	],
	[
		"id" => 15014,
		"user_id" => 18818,
		"work_status" => "European National"
	],
	[
		"id" => 15048,
		"user_id" => 18852,
		"work_status" => "European National"
	],
	[
		"id" => 15361,
		"user_id" => 19165,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13501,
		"user_id" => 17305,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13946,
		"user_id" => 17750,
		"work_status" => "Non European National"
	],
	[
		"id" => 14424,
		"user_id" => 18228,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14458,
		"user_id" => 18262,
		"work_status" => "Non European National"
	],
	[
		"id" => 19270,
		"user_id" => 23817,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13183,
		"user_id" => 16987,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15161,
		"user_id" => 18965,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5184,
		"user_id" => 7492,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15107,
		"user_id" => 18911,
		"work_status" => "Non European National"
	],
	[
		"id" => 14989,
		"user_id" => 18793,
		"work_status" => "European National"
	],
	[
		"id" => 19815,
		"user_id" => 24362,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13960,
		"user_id" => 17764,
		"work_status" => "European National"
	],
	[
		"id" => 24899,
		"user_id" => 30463,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14723,
		"user_id" => 18527,
		"work_status" => "Non European National"
	],
	[
		"id" => 14062,
		"user_id" => 17866,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19224,
		"user_id" => 23771,
		"work_status" => "Non European National"
	],
	[
		"id" => 15093,
		"user_id" => 18897,
		"work_status" => "European National"
	],
	[
		"id" => 13735,
		"user_id" => 17539,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14832,
		"user_id" => 18636,
		"work_status" => "Non European National"
	],
	[
		"id" => 15251,
		"user_id" => 19055,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13434,
		"user_id" => 17238,
		"work_status" => "Non European National"
	],
	[
		"id" => 15059,
		"user_id" => 18863,
		"work_status" => "European National"
	],
	[
		"id" => 15322,
		"user_id" => 19126,
		"work_status" => "Non European National"
	],
	[
		"id" => 13858,
		"user_id" => 17662,
		"work_status" => "Non European National"
	],
	[
		"id" => 19107,
		"user_id" => 23654,
		"work_status" => "European National"
	],
	[
		"id" => 13711,
		"user_id" => 17515,
		"work_status" => "Non European National"
	],
	[
		"id" => 14529,
		"user_id" => 18333,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13242,
		"user_id" => 17046,
		"work_status" => "Non European National"
	],
	[
		"id" => 24701,
		"user_id" => 30265,
		"work_status" => "European National"
	],
	[
		"id" => 19478,
		"user_id" => 24025,
		"work_status" => "Non European National"
	],
	[
		"id" => 13949,
		"user_id" => 17753,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14152,
		"user_id" => 17956,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14439,
		"user_id" => 18243,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18823,
		"user_id" => 23370,
		"work_status" => "Non European National"
	],
	[
		"id" => 14241,
		"user_id" => 18045,
		"work_status" => "European National"
	],
	[
		"id" => 14460,
		"user_id" => 18264,
		"work_status" => "Non European National"
	],
	[
		"id" => 14829,
		"user_id" => 18633,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20097,
		"user_id" => 24748,
		"work_status" => "0"
	],
	[
		"id" => 20098,
		"user_id" => 24749,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15178,
		"user_id" => 18982,
		"work_status" => "European National"
	],
	[
		"id" => 14306,
		"user_id" => 18110,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19053,
		"user_id" => 23600,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13820,
		"user_id" => 17624,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4790,
		"user_id" => 7101,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4795,
		"user_id" => 7106,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4796,
		"user_id" => 7107,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4797,
		"user_id" => 7105,
		"work_status" => "Non European National"
	],
	[
		"id" => 4799,
		"user_id" => 7107,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4800,
		"user_id" => 7108,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12214,
		"user_id" => 15854,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16832,
		"user_id" => 21315,
		"work_status" => "European National"
	],
	[
		"id" => 6609,
		"user_id" => 9078,
		"work_status" => "European National"
	],
	[
		"id" => 13011,
		"user_id" => 16761,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12367,
		"user_id" => 16007,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23582,
		"user_id" => 29146,
		"work_status" => "Non European National"
	],
	[
		"id" => 4826,
		"user_id" => 7134,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 4832,
		"user_id" => 7140,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19492,
		"user_id" => 24039,
		"work_status" => "Non European National"
	],
	[
		"id" => 12086,
		"user_id" => 15726,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19683,
		"user_id" => 24230,
		"work_status" => "European National"
	],
	[
		"id" => 19501,
		"user_id" => 24048,
		"work_status" => "Non European National"
	],
	[
		"id" => 12009,
		"user_id" => 15649,
		"work_status" => "European National"
	],
	[
		"id" => 18757,
		"user_id" => 23304,
		"work_status" => "Non European National"
	],
	[
		"id" => 12119,
		"user_id" => 15759,
		"work_status" => "European National"
	],
	[
		"id" => 12299,
		"user_id" => 15939,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12998,
		"user_id" => 16738,
		"work_status" => "0"
	],
	[
		"id" => 12449,
		"user_id" => 16089,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19673,
		"user_id" => 24220,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14769,
		"user_id" => 18573,
		"work_status" => "European National"
	],
	[
		"id" => 20077,
		"user_id" => 24715,
		"work_status" => "Non European National"
	],
	[
		"id" => 5045,
		"user_id" => 7353,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5046,
		"user_id" => 7354,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5047,
		"user_id" => 7355,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5048,
		"user_id" => 7356,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5049,
		"user_id" => 7357,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5050,
		"user_id" => 7358,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5051,
		"user_id" => 7359,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5052,
		"user_id" => 7360,
		"work_status" => "European National"
	],
	[
		"id" => 18990,
		"user_id" => 23537,
		"work_status" => "Non European National"
	],
	[
		"id" => 5086,
		"user_id" => 7394,
		"work_status" => "Non European National"
	],
	[
		"id" => 5092,
		"user_id" => 7400,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23268,
		"user_id" => 28794,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19703,
		"user_id" => 24250,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24616,
		"user_id" => 30180,
		"work_status" => "European National"
	],
	[
		"id" => 21615,
		"user_id" => 27025,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12124,
		"user_id" => 15764,
		"work_status" => "Non European National"
	],
	[
		"id" => 12224,
		"user_id" => 15864,
		"work_status" => "European National"
	],
	[
		"id" => 5167,
		"user_id" => 7475,
		"work_status" => "Non European National"
	],
	[
		"id" => 8530,
		"user_id" => 11790,
		"work_status" => "European National"
	],
	[
		"id" => 5179,
		"user_id" => 7487,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19253,
		"user_id" => 23800,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24763,
		"user_id" => 30327,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12248,
		"user_id" => 15888,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12040,
		"user_id" => 15680,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8662,
		"user_id" => 11987,
		"work_status" => "0"
	],
	[
		"id" => 23688,
		"user_id" => 29252,
		"work_status" => "Non European National"
	],
	[
		"id" => 12342,
		"user_id" => 15982,
		"work_status" => "European National"
	],
	[
		"id" => 22474,
		"user_id" => 28000,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23040,
		"user_id" => 28566,
		"work_status" => "Non European National"
	],
	[
		"id" => 23531,
		"user_id" => 29095,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20131,
		"user_id" => 24809,
		"work_status" => "European National"
	],
	[
		"id" => 12242,
		"user_id" => 15882,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24734,
		"user_id" => 30298,
		"work_status" => "Non European National"
	],
	[
		"id" => 24633,
		"user_id" => 30197,
		"work_status" => "Non European National"
	],
	[
		"id" => 13709,
		"user_id" => 17513,
		"work_status" => "European National"
	],
	[
		"id" => 18744,
		"user_id" => 23291,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24707,
		"user_id" => 30271,
		"work_status" => "Non European National"
	],
	[
		"id" => 16890,
		"user_id" => 21375,
		"work_status" => "Non European National"
	],
	[
		"id" => 19350,
		"user_id" => 23897,
		"work_status" => "European National"
	],
	[
		"id" => 12919,
		"user_id" => 16622,
		"work_status" => "0"
	],
	[
		"id" => 12382,
		"user_id" => 16022,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22868,
		"user_id" => 28394,
		"work_status" => "Non European National"
	],
	[
		"id" => 16297,
		"user_id" => 20528,
		"work_status" => "Non European National"
	],
	[
		"id" => 12409,
		"user_id" => 16049,
		"work_status" => "Non European National"
	],
	[
		"id" => 19129,
		"user_id" => 23676,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23715,
		"user_id" => 29279,
		"work_status" => "Non European National"
	],
	[
		"id" => 12386,
		"user_id" => 16026,
		"work_status" => "European National"
	],
	[
		"id" => 12011,
		"user_id" => 15651,
		"work_status" => "European National"
	],
	[
		"id" => 12021,
		"user_id" => 15661,
		"work_status" => "European National"
	],
	[
		"id" => 12259,
		"user_id" => 15899,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19615,
		"user_id" => 24162,
		"work_status" => "Non European National"
	],
	[
		"id" => 8496,
		"user_id" => 11733,
		"work_status" => "0"
	],
	[
		"id" => 22626,
		"user_id" => 28152,
		"work_status" => "Non European National"
	],
	[
		"id" => 18831,
		"user_id" => 23378,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23057,
		"user_id" => 28583,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13508,
		"user_id" => 17312,
		"work_status" => "Non European National"
	],
	[
		"id" => 12132,
		"user_id" => 15772,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12017,
		"user_id" => 15657,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16581,
		"user_id" => 20978,
		"work_status" => "Non European National"
	],
	[
		"id" => 18948,
		"user_id" => 23495,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24866,
		"user_id" => 30430,
		"work_status" => "European National"
	],
	[
		"id" => 20195,
		"user_id" => 24910,
		"work_status" => "0"
	],
	[
		"id" => 24727,
		"user_id" => 30291,
		"work_status" => "Non European National"
	],
	[
		"id" => 18479,
		"user_id" => 22968,
		"work_status" => "Non European National"
	],
	[
		"id" => 5868,
		"user_id" => 8176,
		"work_status" => "0"
	],
	[
		"id" => 5869,
		"user_id" => 8177,
		"work_status" => "0"
	],
	[
		"id" => 5870,
		"user_id" => 8178,
		"work_status" => "0"
	],
	[
		"id" => 15096,
		"user_id" => 18900,
		"work_status" => "Non European National"
	],
	[
		"id" => 5873,
		"user_id" => 8181,
		"work_status" => "0"
	],
	[
		"id" => 5874,
		"user_id" => 8182,
		"work_status" => "0"
	],
	[
		"id" => 6636,
		"user_id" => 9114,
		"work_status" => "Non European National"
	],
	[
		"id" => 5876,
		"user_id" => 8184,
		"work_status" => "0"
	],
	[
		"id" => 5877,
		"user_id" => 8185,
		"work_status" => "0"
	],
	[
		"id" => 5878,
		"user_id" => 8186,
		"work_status" => "0"
	],
	[
		"id" => 5879,
		"user_id" => 8187,
		"work_status" => "0"
	],
	[
		"id" => 5880,
		"user_id" => 8188,
		"work_status" => "0"
	],
	[
		"id" => 5881,
		"user_id" => 8189,
		"work_status" => "0"
	],
	[
		"id" => 5882,
		"user_id" => 8190,
		"work_status" => "0"
	],
	[
		"id" => 5883,
		"user_id" => 8191,
		"work_status" => "0"
	],
	[
		"id" => 5884,
		"user_id" => 8192,
		"work_status" => "0"
	],
	[
		"id" => 5885,
		"user_id" => 8193,
		"work_status" => "0"
	],
	[
		"id" => 5886,
		"user_id" => 8194,
		"work_status" => "0"
	],
	[
		"id" => 5887,
		"user_id" => 8195,
		"work_status" => "0"
	],
	[
		"id" => 5888,
		"user_id" => 8196,
		"work_status" => "0"
	],
	[
		"id" => 5889,
		"user_id" => 8197,
		"work_status" => "0"
	],
	[
		"id" => 5890,
		"user_id" => 8198,
		"work_status" => "0"
	],
	[
		"id" => 5891,
		"user_id" => 8199,
		"work_status" => "0"
	],
	[
		"id" => 5892,
		"user_id" => 8200,
		"work_status" => "0"
	],
	[
		"id" => 7101,
		"user_id" => 9762,
		"work_status" => "0"
	],
	[
		"id" => 5894,
		"user_id" => 8202,
		"work_status" => "0"
	],
	[
		"id" => 5895,
		"user_id" => 8203,
		"work_status" => "0"
	],
	[
		"id" => 5896,
		"user_id" => 8204,
		"work_status" => "0"
	],
	[
		"id" => 5897,
		"user_id" => 8205,
		"work_status" => "0"
	],
	[
		"id" => 5898,
		"user_id" => 8206,
		"work_status" => "0"
	],
	[
		"id" => 5899,
		"user_id" => 8207,
		"work_status" => "0"
	],
	[
		"id" => 5900,
		"user_id" => 8208,
		"work_status" => "0"
	],
	[
		"id" => 5902,
		"user_id" => 8210,
		"work_status" => "0"
	],
	[
		"id" => 5903,
		"user_id" => 8211,
		"work_status" => "0"
	],
	[
		"id" => 5904,
		"user_id" => 8212,
		"work_status" => "0"
	],
	[
		"id" => 5905,
		"user_id" => 8213,
		"work_status" => "0"
	],
	[
		"id" => 5906,
		"user_id" => 8214,
		"work_status" => "0"
	],
	[
		"id" => 5907,
		"user_id" => 8215,
		"work_status" => "0"
	],
	[
		"id" => 5908,
		"user_id" => 8216,
		"work_status" => "0"
	],
	[
		"id" => 5909,
		"user_id" => 8217,
		"work_status" => "0"
	],
	[
		"id" => 5910,
		"user_id" => 8218,
		"work_status" => "0"
	],
	[
		"id" => 5911,
		"user_id" => 8219,
		"work_status" => "0"
	],
	[
		"id" => 5912,
		"user_id" => 8220,
		"work_status" => "0"
	],
	[
		"id" => 5913,
		"user_id" => 8221,
		"work_status" => "0"
	],
	[
		"id" => 5914,
		"user_id" => 8222,
		"work_status" => "0"
	],
	[
		"id" => 5915,
		"user_id" => 8223,
		"work_status" => "0"
	],
	[
		"id" => 5916,
		"user_id" => 8224,
		"work_status" => "0"
	],
	[
		"id" => 5917,
		"user_id" => 8225,
		"work_status" => "0"
	],
	[
		"id" => 5918,
		"user_id" => 8226,
		"work_status" => "0"
	],
	[
		"id" => 5919,
		"user_id" => 8227,
		"work_status" => "0"
	],
	[
		"id" => 5920,
		"user_id" => 8228,
		"work_status" => "0"
	],
	[
		"id" => 5921,
		"user_id" => 8229,
		"work_status" => "0"
	],
	[
		"id" => 5922,
		"user_id" => 8230,
		"work_status" => "0"
	],
	[
		"id" => 5923,
		"user_id" => 8231,
		"work_status" => "0"
	],
	[
		"id" => 5924,
		"user_id" => 8232,
		"work_status" => "0"
	],
	[
		"id" => 8737,
		"user_id" => 12114,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 5926,
		"user_id" => 8234,
		"work_status" => "0"
	],
	[
		"id" => 5927,
		"user_id" => 8235,
		"work_status" => "0"
	],
	[
		"id" => 5928,
		"user_id" => 8236,
		"work_status" => "0"
	],
	[
		"id" => 5929,
		"user_id" => 8237,
		"work_status" => "0"
	],
	[
		"id" => 5930,
		"user_id" => 8238,
		"work_status" => "0"
	],
	[
		"id" => 5931,
		"user_id" => 8239,
		"work_status" => "0"
	],
	[
		"id" => 5932,
		"user_id" => 8240,
		"work_status" => "0"
	],
	[
		"id" => 5933,
		"user_id" => 8241,
		"work_status" => "0"
	],
	[
		"id" => 5934,
		"user_id" => 8242,
		"work_status" => "0"
	],
	[
		"id" => 5935,
		"user_id" => 8243,
		"work_status" => "0"
	],
	[
		"id" => 5936,
		"user_id" => 8244,
		"work_status" => "0"
	],
	[
		"id" => 5937,
		"user_id" => 8245,
		"work_status" => "0"
	],
	[
		"id" => 5938,
		"user_id" => 8246,
		"work_status" => "0"
	],
	[
		"id" => 5939,
		"user_id" => 8247,
		"work_status" => "0"
	],
	[
		"id" => 23802,
		"user_id" => 29366,
		"work_status" => "European National"
	],
	[
		"id" => 5941,
		"user_id" => 8249,
		"work_status" => "0"
	],
	[
		"id" => 5942,
		"user_id" => 8250,
		"work_status" => "0"
	],
	[
		"id" => 5945,
		"user_id" => 8253,
		"work_status" => "0"
	],
	[
		"id" => 5946,
		"user_id" => 8254,
		"work_status" => "0"
	],
	[
		"id" => 5947,
		"user_id" => 8255,
		"work_status" => "0"
	],
	[
		"id" => 5948,
		"user_id" => 8256,
		"work_status" => "0"
	],
	[
		"id" => 5949,
		"user_id" => 8257,
		"work_status" => "0"
	],
	[
		"id" => 5950,
		"user_id" => 8258,
		"work_status" => "0"
	],
	[
		"id" => 5951,
		"user_id" => 8259,
		"work_status" => "0"
	],
	[
		"id" => 5952,
		"user_id" => 8260,
		"work_status" => "0"
	],
	[
		"id" => 5953,
		"user_id" => 8261,
		"work_status" => "0"
	],
	[
		"id" => 5955,
		"user_id" => 8263,
		"work_status" => "0"
	],
	[
		"id" => 5956,
		"user_id" => 8264,
		"work_status" => "0"
	],
	[
		"id" => 5957,
		"user_id" => 8265,
		"work_status" => "0"
	],
	[
		"id" => 5958,
		"user_id" => 8266,
		"work_status" => "0"
	],
	[
		"id" => 5959,
		"user_id" => 8267,
		"work_status" => "0"
	],
	[
		"id" => 5960,
		"user_id" => 8268,
		"work_status" => "0"
	],
	[
		"id" => 5961,
		"user_id" => 8269,
		"work_status" => "0"
	],
	[
		"id" => 5962,
		"user_id" => 8270,
		"work_status" => "0"
	],
	[
		"id" => 5963,
		"user_id" => 8271,
		"work_status" => "0"
	],
	[
		"id" => 5964,
		"user_id" => 8272,
		"work_status" => "0"
	],
	[
		"id" => 5965,
		"user_id" => 8273,
		"work_status" => "0"
	],
	[
		"id" => 5966,
		"user_id" => 8274,
		"work_status" => "0"
	],
	[
		"id" => 5967,
		"user_id" => 8275,
		"work_status" => "0"
	],
	[
		"id" => 5968,
		"user_id" => 8276,
		"work_status" => "0"
	],
	[
		"id" => 5969,
		"user_id" => 8277,
		"work_status" => "0"
	],
	[
		"id" => 5970,
		"user_id" => 8278,
		"work_status" => "0"
	],
	[
		"id" => 5972,
		"user_id" => 8280,
		"work_status" => "0"
	],
	[
		"id" => 5973,
		"user_id" => 8281,
		"work_status" => "0"
	],
	[
		"id" => 5974,
		"user_id" => 8282,
		"work_status" => "0"
	],
	[
		"id" => 5975,
		"user_id" => 8283,
		"work_status" => "0"
	],
	[
		"id" => 5976,
		"user_id" => 8284,
		"work_status" => "0"
	],
	[
		"id" => 5977,
		"user_id" => 8285,
		"work_status" => "0"
	],
	[
		"id" => 5978,
		"user_id" => 8286,
		"work_status" => "0"
	],
	[
		"id" => 5979,
		"user_id" => 8287,
		"work_status" => "0"
	],
	[
		"id" => 5980,
		"user_id" => 8288,
		"work_status" => "0"
	],
	[
		"id" => 5981,
		"user_id" => 8289,
		"work_status" => "0"
	],
	[
		"id" => 5982,
		"user_id" => 8290,
		"work_status" => "0"
	],
	[
		"id" => 5984,
		"user_id" => 8292,
		"work_status" => "0"
	],
	[
		"id" => 5985,
		"user_id" => 8293,
		"work_status" => "0"
	],
	[
		"id" => 5986,
		"user_id" => 8294,
		"work_status" => "0"
	],
	[
		"id" => 5987,
		"user_id" => 8295,
		"work_status" => "0"
	],
	[
		"id" => 5988,
		"user_id" => 8296,
		"work_status" => "0"
	],
	[
		"id" => 5989,
		"user_id" => 8297,
		"work_status" => "0"
	],
	[
		"id" => 5990,
		"user_id" => 8298,
		"work_status" => "0"
	],
	[
		"id" => 5991,
		"user_id" => 8299,
		"work_status" => "0"
	],
	[
		"id" => 5992,
		"user_id" => 8300,
		"work_status" => "0"
	],
	[
		"id" => 5993,
		"user_id" => 8301,
		"work_status" => "0"
	],
	[
		"id" => 20071,
		"user_id" => 24708,
		"work_status" => "0"
	],
	[
		"id" => 5995,
		"user_id" => 8303,
		"work_status" => "0"
	],
	[
		"id" => 5996,
		"user_id" => 8304,
		"work_status" => "0"
	],
	[
		"id" => 5997,
		"user_id" => 8305,
		"work_status" => "0"
	],
	[
		"id" => 5998,
		"user_id" => 8306,
		"work_status" => "0"
	],
	[
		"id" => 5999,
		"user_id" => 8307,
		"work_status" => "0"
	],
	[
		"id" => 6000,
		"user_id" => 8308,
		"work_status" => "0"
	],
	[
		"id" => 6001,
		"user_id" => 8309,
		"work_status" => "0"
	],
	[
		"id" => 6002,
		"user_id" => 8310,
		"work_status" => "0"
	],
	[
		"id" => 6003,
		"user_id" => 8311,
		"work_status" => "0"
	],
	[
		"id" => 6004,
		"user_id" => 8312,
		"work_status" => "0"
	],
	[
		"id" => 6005,
		"user_id" => 8313,
		"work_status" => "0"
	],
	[
		"id" => 6007,
		"user_id" => 8315,
		"work_status" => "0"
	],
	[
		"id" => 6008,
		"user_id" => 8316,
		"work_status" => "0"
	],
	[
		"id" => 6009,
		"user_id" => 8317,
		"work_status" => "0"
	],
	[
		"id" => 6010,
		"user_id" => 8318,
		"work_status" => "0"
	],
	[
		"id" => 6011,
		"user_id" => 8319,
		"work_status" => "0"
	],
	[
		"id" => 6012,
		"user_id" => 8320,
		"work_status" => "0"
	],
	[
		"id" => 6013,
		"user_id" => 8321,
		"work_status" => "0"
	],
	[
		"id" => 6014,
		"user_id" => 8322,
		"work_status" => "0"
	],
	[
		"id" => 6015,
		"user_id" => 8323,
		"work_status" => "0"
	],
	[
		"id" => 6016,
		"user_id" => 8324,
		"work_status" => "0"
	],
	[
		"id" => 6017,
		"user_id" => 8325,
		"work_status" => "0"
	],
	[
		"id" => 6018,
		"user_id" => 8326,
		"work_status" => "0"
	],
	[
		"id" => 6019,
		"user_id" => 8327,
		"work_status" => "0"
	],
	[
		"id" => 6020,
		"user_id" => 8328,
		"work_status" => "0"
	],
	[
		"id" => 6021,
		"user_id" => 8329,
		"work_status" => "0"
	],
	[
		"id" => 6022,
		"user_id" => 8330,
		"work_status" => "0"
	],
	[
		"id" => 6023,
		"user_id" => 8331,
		"work_status" => "0"
	],
	[
		"id" => 6024,
		"user_id" => 8332,
		"work_status" => "0"
	],
	[
		"id" => 6025,
		"user_id" => 8333,
		"work_status" => "0"
	],
	[
		"id" => 6026,
		"user_id" => 8334,
		"work_status" => "0"
	],
	[
		"id" => 6027,
		"user_id" => 8335,
		"work_status" => "0"
	],
	[
		"id" => 6029,
		"user_id" => 8337,
		"work_status" => "0"
	],
	[
		"id" => 6030,
		"user_id" => 8338,
		"work_status" => "0"
	],
	[
		"id" => 6031,
		"user_id" => 8339,
		"work_status" => "0"
	],
	[
		"id" => 6032,
		"user_id" => 8340,
		"work_status" => "0"
	],
	[
		"id" => 6034,
		"user_id" => 8342,
		"work_status" => "0"
	],
	[
		"id" => 6035,
		"user_id" => 8343,
		"work_status" => "0"
	],
	[
		"id" => 6037,
		"user_id" => 8345,
		"work_status" => "0"
	],
	[
		"id" => 6038,
		"user_id" => 8346,
		"work_status" => "0"
	],
	[
		"id" => 6039,
		"user_id" => 8347,
		"work_status" => "0"
	],
	[
		"id" => 6040,
		"user_id" => 8348,
		"work_status" => "0"
	],
	[
		"id" => 6041,
		"user_id" => 8349,
		"work_status" => "0"
	],
	[
		"id" => 6042,
		"user_id" => 8350,
		"work_status" => "0"
	],
	[
		"id" => 6043,
		"user_id" => 8351,
		"work_status" => "0"
	],
	[
		"id" => 6044,
		"user_id" => 8352,
		"work_status" => "0"
	],
	[
		"id" => 6045,
		"user_id" => 8353,
		"work_status" => "0"
	],
	[
		"id" => 6046,
		"user_id" => 8354,
		"work_status" => "0"
	],
	[
		"id" => 6047,
		"user_id" => 8355,
		"work_status" => "0"
	],
	[
		"id" => 6048,
		"user_id" => 8356,
		"work_status" => "0"
	],
	[
		"id" => 6049,
		"user_id" => 8357,
		"work_status" => "0"
	],
	[
		"id" => 6050,
		"user_id" => 8358,
		"work_status" => "0"
	],
	[
		"id" => 6051,
		"user_id" => 8359,
		"work_status" => "0"
	],
	[
		"id" => 6052,
		"user_id" => 8360,
		"work_status" => "0"
	],
	[
		"id" => 6053,
		"user_id" => 8361,
		"work_status" => "0"
	],
	[
		"id" => 6054,
		"user_id" => 8362,
		"work_status" => "0"
	],
	[
		"id" => 6055,
		"user_id" => 8363,
		"work_status" => "0"
	],
	[
		"id" => 6056,
		"user_id" => 8364,
		"work_status" => "0"
	],
	[
		"id" => 6057,
		"user_id" => 8365,
		"work_status" => "0"
	],
	[
		"id" => 6058,
		"user_id" => 8366,
		"work_status" => "0"
	],
	[
		"id" => 15320,
		"user_id" => 19124,
		"work_status" => "European National"
	],
	[
		"id" => 19297,
		"user_id" => 23844,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23641,
		"user_id" => 29205,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18787,
		"user_id" => 23334,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22433,
		"user_id" => 27959,
		"work_status" => "European National"
	],
	[
		"id" => 16822,
		"user_id" => 21304,
		"work_status" => "0"
	],
	[
		"id" => 12130,
		"user_id" => 15770,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16886,
		"user_id" => 21371,
		"work_status" => "0"
	],
	[
		"id" => 19296,
		"user_id" => 23843,
		"work_status" => "Non European National"
	],
	[
		"id" => 23043,
		"user_id" => 28569,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19353,
		"user_id" => 23900,
		"work_status" => "European National"
	],
	[
		"id" => 19680,
		"user_id" => 24227,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19087,
		"user_id" => 23634,
		"work_status" => "Non European National"
	],
	[
		"id" => 14902,
		"user_id" => 18706,
		"work_status" => "Non European National"
	],
	[
		"id" => 18867,
		"user_id" => 23414,
		"work_status" => "Non European National"
	],
	[
		"id" => 13416,
		"user_id" => 17220,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15084,
		"user_id" => 18888,
		"work_status" => "Non European National"
	],
	[
		"id" => 13825,
		"user_id" => 17629,
		"work_status" => "Non European National"
	],
	[
		"id" => 15204,
		"user_id" => 19008,
		"work_status" => "European National"
	],
	[
		"id" => 8471,
		"user_id" => 11701,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13728,
		"user_id" => 17532,
		"work_status" => "0"
	],
	[
		"id" => 21914,
		"user_id" => 27440,
		"work_status" => "Non European National"
	],
	[
		"id" => 23893,
		"user_id" => 29457,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15338,
		"user_id" => 19142,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14023,
		"user_id" => 17827,
		"work_status" => "Non European National"
	],
	[
		"id" => 9065,
		"user_id" => 12630,
		"work_status" => "0"
	],
	[
		"id" => 13544,
		"user_id" => 17348,
		"work_status" => "European National"
	],
	[
		"id" => 24767,
		"user_id" => 30331,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13708,
		"user_id" => 17512,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25822,
		"user_id" => 31941,
		"work_status" => "Non European National"
	],
	[
		"id" => 13695,
		"user_id" => 17499,
		"work_status" => "Non European National"
	],
	[
		"id" => 18965,
		"user_id" => 23512,
		"work_status" => "Non European National"
	],
	[
		"id" => 14836,
		"user_id" => 18640,
		"work_status" => "Non European National"
	],
	[
		"id" => 24902,
		"user_id" => 30466,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8678,
		"user_id" => 12010,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14897,
		"user_id" => 18701,
		"work_status" => "Non European National"
	],
	[
		"id" => 8674,
		"user_id" => 12005,
		"work_status" => "Non European National"
	],
	[
		"id" => 16821,
		"user_id" => 21303,
		"work_status" => "Non European National"
	],
	[
		"id" => 13452,
		"user_id" => 17256,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8981,
		"user_id" => 12501,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13403,
		"user_id" => 17207,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22258,
		"user_id" => 27784,
		"work_status" => "Non European National"
	],
	[
		"id" => 24662,
		"user_id" => 30226,
		"work_status" => "European National"
	],
	[
		"id" => 12270,
		"user_id" => 15910,
		"work_status" => "European National"
	],
	[
		"id" => 8428,
		"user_id" => 11641,
		"work_status" => "European National"
	],
	[
		"id" => 24376,
		"user_id" => 29940,
		"work_status" => "Non European National"
	],
	[
		"id" => 12306,
		"user_id" => 15946,
		"work_status" => "European National"
	],
	[
		"id" => 8738,
		"user_id" => 12117,
		"work_status" => "Non European National"
	],
	[
		"id" => 13813,
		"user_id" => 17617,
		"work_status" => "Non European National"
	],
	[
		"id" => 22118,
		"user_id" => 27644,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19298,
		"user_id" => 23845,
		"work_status" => "Non European National"
	],
	[
		"id" => 19002,
		"user_id" => 23549,
		"work_status" => "Non European National"
	],
	[
		"id" => 6473,
		"user_id" => 8918,
		"work_status" => "European National"
	],
	[
		"id" => 8938,
		"user_id" => 12434,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13504,
		"user_id" => 17308,
		"work_status" => "Non European National"
	],
	[
		"id" => 15100,
		"user_id" => 18904,
		"work_status" => "European National"
	],
	[
		"id" => 13407,
		"user_id" => 17211,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15050,
		"user_id" => 18854,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21901,
		"user_id" => 27427,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14242,
		"user_id" => 18046,
		"work_status" => "Non European National"
	],
	[
		"id" => 20108,
		"user_id" => 24759,
		"work_status" => "European National"
	],
	[
		"id" => 19624,
		"user_id" => 24171,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15298,
		"user_id" => 19102,
		"work_status" => "Non European National"
	],
	[
		"id" => 14524,
		"user_id" => 18328,
		"work_status" => "Non European National"
	],
	[
		"id" => 16731,
		"user_id" => 21204,
		"work_status" => "European National"
	],
	[
		"id" => 23470,
		"user_id" => 29034,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14500,
		"user_id" => 18304,
		"work_status" => "Non European National"
	],
	[
		"id" => 23034,
		"user_id" => 28560,
		"work_status" => "Non European National"
	],
	[
		"id" => 14601,
		"user_id" => 18405,
		"work_status" => "Non European National"
	],
	[
		"id" => 16728,
		"user_id" => 21201,
		"work_status" => "European National"
	],
	[
		"id" => 14301,
		"user_id" => 18105,
		"work_status" => "Non European National"
	],
	[
		"id" => 19275,
		"user_id" => 23822,
		"work_status" => "Non European National"
	],
	[
		"id" => 23066,
		"user_id" => 28592,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16727,
		"user_id" => 21199,
		"work_status" => "Non European National"
	],
	[
		"id" => 14418,
		"user_id" => 18222,
		"work_status" => "Non European National"
	],
	[
		"id" => 13979,
		"user_id" => 17783,
		"work_status" => "European National"
	],
	[
		"id" => 19239,
		"user_id" => 23786,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13306,
		"user_id" => 17110,
		"work_status" => "Non European National"
	],
	[
		"id" => 19289,
		"user_id" => 23836,
		"work_status" => "Non European National"
	],
	[
		"id" => 16722,
		"user_id" => 21192,
		"work_status" => "Non European National"
	],
	[
		"id" => 14344,
		"user_id" => 18148,
		"work_status" => "European National"
	],
	[
		"id" => 14382,
		"user_id" => 18186,
		"work_status" => "European National"
	],
	[
		"id" => 6475,
		"user_id" => 8920,
		"work_status" => "0"
	],
	[
		"id" => 24489,
		"user_id" => 30053,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14435,
		"user_id" => 18239,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15195,
		"user_id" => 18999,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14858,
		"user_id" => 18662,
		"work_status" => "European National"
	],
	[
		"id" => 23059,
		"user_id" => 28585,
		"work_status" => "Non European National"
	],
	[
		"id" => 15109,
		"user_id" => 18913,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23231,
		"user_id" => 28757,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14683,
		"user_id" => 18487,
		"work_status" => "European National"
	],
	[
		"id" => 13134,
		"user_id" => 16938,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16715,
		"user_id" => 21181,
		"work_status" => "European National"
	],
	[
		"id" => 13590,
		"user_id" => 17394,
		"work_status" => "European National"
	],
	[
		"id" => 14879,
		"user_id" => 18683,
		"work_status" => "European National"
	],
	[
		"id" => 14237,
		"user_id" => 18041,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19070,
		"user_id" => 23617,
		"work_status" => "European National"
	],
	[
		"id" => 14817,
		"user_id" => 18621,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16824,
		"user_id" => 21307,
		"work_status" => "Non European National"
	],
	[
		"id" => 22342,
		"user_id" => 27868,
		"work_status" => "Non European National"
	],
	[
		"id" => 14906,
		"user_id" => 18710,
		"work_status" => "Non European National"
	],
	[
		"id" => 16709,
		"user_id" => 21174,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16710,
		"user_id" => 21176,
		"work_status" => "0"
	],
	[
		"id" => 16708,
		"user_id" => 21173,
		"work_status" => "0"
	],
	[
		"id" => 18796,
		"user_id" => 23343,
		"work_status" => "Non European National"
	],
	[
		"id" => 16705,
		"user_id" => 21169,
		"work_status" => "0"
	],
	[
		"id" => 16704,
		"user_id" => 21168,
		"work_status" => "0"
	],
	[
		"id" => 12317,
		"user_id" => 15957,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16703,
		"user_id" => 21167,
		"work_status" => "Non European National"
	],
	[
		"id" => 16702,
		"user_id" => 21166,
		"work_status" => "0"
	],
	[
		"id" => 13328,
		"user_id" => 17132,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13870,
		"user_id" => 17674,
		"work_status" => "Non European National"
	],
	[
		"id" => 16701,
		"user_id" => 21163,
		"work_status" => "0"
	],
	[
		"id" => 19182,
		"user_id" => 23729,
		"work_status" => "European National"
	],
	[
		"id" => 8672,
		"user_id" => 12000,
		"work_status" => "European National"
	],
	[
		"id" => 8673,
		"user_id" => 12004,
		"work_status" => "0"
	],
	[
		"id" => 14612,
		"user_id" => 18416,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14013,
		"user_id" => 17817,
		"work_status" => "European National"
	],
	[
		"id" => 13748,
		"user_id" => 17552,
		"work_status" => "Non European National"
	],
	[
		"id" => 16700,
		"user_id" => 21162,
		"work_status" => "Non European National"
	],
	[
		"id" => 14180,
		"user_id" => 17984,
		"work_status" => "Non European National"
	],
	[
		"id" => 13835,
		"user_id" => 17639,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14400,
		"user_id" => 18204,
		"work_status" => "0"
	],
	[
		"id" => 13147,
		"user_id" => 16951,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13658,
		"user_id" => 17462,
		"work_status" => "Non European National"
	],
	[
		"id" => 18887,
		"user_id" => 23434,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14197,
		"user_id" => 18001,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14371,
		"user_id" => 18175,
		"work_status" => "European National"
	],
	[
		"id" => 15225,
		"user_id" => 19029,
		"work_status" => "Non European National"
	],
	[
		"id" => 24690,
		"user_id" => 30254,
		"work_status" => "Non European National"
	],
	[
		"id" => 16686,
		"user_id" => 21144,
		"work_status" => "Non European National"
	],
	[
		"id" => 13157,
		"user_id" => 16961,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19414,
		"user_id" => 23961,
		"work_status" => "Non European National"
	],
	[
		"id" => 16683,
		"user_id" => 21139,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25809,
		"user_id" => 31928,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16682,
		"user_id" => 21138,
		"work_status" => "Non European National"
	],
	[
		"id" => 13326,
		"user_id" => 17130,
		"work_status" => "European National"
	],
	[
		"id" => 13446,
		"user_id" => 17250,
		"work_status" => "Non European National"
	],
	[
		"id" => 16681,
		"user_id" => 21130,
		"work_status" => "Non European National"
	],
	[
		"id" => 6738,
		"user_id" => 9263,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14739,
		"user_id" => 18543,
		"work_status" => "European National"
	],
	[
		"id" => 19208,
		"user_id" => 23755,
		"work_status" => "Non European National"
	],
	[
		"id" => 23827,
		"user_id" => 29391,
		"work_status" => "European National"
	],
	[
		"id" => 12171,
		"user_id" => 15811,
		"work_status" => "Non European National"
	],
	[
		"id" => 13580,
		"user_id" => 17384,
		"work_status" => "0"
	],
	[
		"id" => 13378,
		"user_id" => 17182,
		"work_status" => "European National"
	],
	[
		"id" => 18850,
		"user_id" => 23397,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16677,
		"user_id" => 21127,
		"work_status" => "Non European National"
	],
	[
		"id" => 14054,
		"user_id" => 17858,
		"work_status" => "European National"
	],
	[
		"id" => 13320,
		"user_id" => 17124,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16676,
		"user_id" => 21126,
		"work_status" => "0"
	],
	[
		"id" => 6270,
		"user_id" => 8657,
		"work_status" => "0"
	],
	[
		"id" => 6271,
		"user_id" => 8659,
		"work_status" => "0"
	],
	[
		"id" => 6275,
		"user_id" => 8663,
		"work_status" => "0"
	],
	[
		"id" => 14962,
		"user_id" => 18766,
		"work_status" => "European National"
	],
	[
		"id" => 15130,
		"user_id" => 18934,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18915,
		"user_id" => 23462,
		"work_status" => "European National"
	],
	[
		"id" => 6278,
		"user_id" => 8667,
		"work_status" => "0"
	],
	[
		"id" => 14571,
		"user_id" => 18375,
		"work_status" => "Non European National"
	],
	[
		"id" => 19784,
		"user_id" => 24331,
		"work_status" => "European National"
	],
	[
		"id" => 16687,
		"user_id" => 21146,
		"work_status" => "0"
	],
	[
		"id" => 22026,
		"user_id" => 27552,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6281,
		"user_id" => 8670,
		"work_status" => "0"
	],
	[
		"id" => 6282,
		"user_id" => 8668,
		"work_status" => "0"
	],
	[
		"id" => 6283,
		"user_id" => 8672,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6284,
		"user_id" => 8671,
		"work_status" => "Non European National"
	],
	[
		"id" => 6285,
		"user_id" => 8674,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6286,
		"user_id" => 8676,
		"work_status" => "European National"
	],
	[
		"id" => 6287,
		"user_id" => 8677,
		"work_status" => "European National"
	],
	[
		"id" => 15160,
		"user_id" => 18964,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6289,
		"user_id" => 8679,
		"work_status" => "0"
	],
	[
		"id" => 6290,
		"user_id" => 8681,
		"work_status" => "Non European National"
	],
	[
		"id" => 6291,
		"user_id" => 8683,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19488,
		"user_id" => 24035,
		"work_status" => "Non European National"
	],
	[
		"id" => 6293,
		"user_id" => 8686,
		"work_status" => "Non European National"
	],
	[
		"id" => 6294,
		"user_id" => 8689,
		"work_status" => "Non European National"
	],
	[
		"id" => 14359,
		"user_id" => 18163,
		"work_status" => "Non European National"
	],
	[
		"id" => 6296,
		"user_id" => 8691,
		"work_status" => "European National"
	],
	[
		"id" => 6297,
		"user_id" => 8692,
		"work_status" => "0"
	],
	[
		"id" => 6298,
		"user_id" => 8693,
		"work_status" => "European National"
	],
	[
		"id" => 6299,
		"user_id" => 8699,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6301,
		"user_id" => 8702,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6302,
		"user_id" => 8700,
		"work_status" => "Non European National"
	],
	[
		"id" => 13945,
		"user_id" => 17749,
		"work_status" => "European National"
	],
	[
		"id" => 6304,
		"user_id" => 8705,
		"work_status" => "0"
	],
	[
		"id" => 14702,
		"user_id" => 18506,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6306,
		"user_id" => 8708,
		"work_status" => "0"
	],
	[
		"id" => 23820,
		"user_id" => 29384,
		"work_status" => "Non European National"
	],
	[
		"id" => 24384,
		"user_id" => 29948,
		"work_status" => "Non European National"
	],
	[
		"id" => 6310,
		"user_id" => 8712,
		"work_status" => "0"
	],
	[
		"id" => 16721,
		"user_id" => 21190,
		"work_status" => "Non European National"
	],
	[
		"id" => 6312,
		"user_id" => 8714,
		"work_status" => "0"
	],
	[
		"id" => 20092,
		"user_id" => 24739,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14767,
		"user_id" => 18571,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15098,
		"user_id" => 18902,
		"work_status" => "European National"
	],
	[
		"id" => 18930,
		"user_id" => 23477,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23843,
		"user_id" => 29407,
		"work_status" => "Non European National"
	],
	[
		"id" => 13432,
		"user_id" => 17236,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6322,
		"user_id" => 8728,
		"work_status" => "European National"
	],
	[
		"id" => 6323,
		"user_id" => 8729,
		"work_status" => "0"
	],
	[
		"id" => 14493,
		"user_id" => 18297,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6325,
		"user_id" => 8731,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15196,
		"user_id" => 19000,
		"work_status" => "European National"
	],
	[
		"id" => 13872,
		"user_id" => 17676,
		"work_status" => "Non European National"
	],
	[
		"id" => 14596,
		"user_id" => 18400,
		"work_status" => "European National"
	],
	[
		"id" => 6331,
		"user_id" => 8735,
		"work_status" => "0"
	],
	[
		"id" => 6332,
		"user_id" => 8737,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6333,
		"user_id" => 8741,
		"work_status" => "0"
	],
	[
		"id" => 6334,
		"user_id" => 8740,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6335,
		"user_id" => 8742,
		"work_status" => "0"
	],
	[
		"id" => 6337,
		"user_id" => 8743,
		"work_status" => "Non European National"
	],
	[
		"id" => 6338,
		"user_id" => 8746,
		"work_status" => "European National"
	],
	[
		"id" => 6339,
		"user_id" => 8745,
		"work_status" => "European National"
	],
	[
		"id" => 24439,
		"user_id" => 30003,
		"work_status" => "European National"
	],
	[
		"id" => 6341,
		"user_id" => 8749,
		"work_status" => "European National"
	],
	[
		"id" => 14461,
		"user_id" => 18265,
		"work_status" => "Non European National"
	],
	[
		"id" => 6344,
		"user_id" => 8754,
		"work_status" => "0"
	],
	[
		"id" => 6345,
		"user_id" => 8755,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6346,
		"user_id" => 8756,
		"work_status" => "European National"
	],
	[
		"id" => 6347,
		"user_id" => 8719,
		"work_status" => "0"
	],
	[
		"id" => 13385,
		"user_id" => 17189,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6349,
		"user_id" => 8758,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23643,
		"user_id" => 29207,
		"work_status" => "Non European National"
	],
	[
		"id" => 6351,
		"user_id" => 8760,
		"work_status" => "Non European National"
	],
	[
		"id" => 6353,
		"user_id" => 8764,
		"work_status" => "0"
	],
	[
		"id" => 6354,
		"user_id" => 8765,
		"work_status" => "0"
	],
	[
		"id" => 6356,
		"user_id" => 8767,
		"work_status" => "0"
	],
	[
		"id" => 12109,
		"user_id" => 15749,
		"work_status" => "Non European National"
	],
	[
		"id" => 6358,
		"user_id" => 8775,
		"work_status" => "0"
	],
	[
		"id" => 6359,
		"user_id" => 8776,
		"work_status" => "0"
	],
	[
		"id" => 19599,
		"user_id" => 24146,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6361,
		"user_id" => 8778,
		"work_status" => "European National"
	],
	[
		"id" => 6362,
		"user_id" => 8779,
		"work_status" => "Non European National"
	],
	[
		"id" => 13220,
		"user_id" => 17024,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13664,
		"user_id" => 17468,
		"work_status" => "European National"
	],
	[
		"id" => 16693,
		"user_id" => 21154,
		"work_status" => "Non European National"
	],
	[
		"id" => 13327,
		"user_id" => 17131,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6366,
		"user_id" => 8784,
		"work_status" => "Non European National"
	],
	[
		"id" => 6367,
		"user_id" => 8785,
		"work_status" => "0"
	],
	[
		"id" => 6368,
		"user_id" => 8786,
		"work_status" => "Non European National"
	],
	[
		"id" => 19534,
		"user_id" => 24081,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13500,
		"user_id" => 17304,
		"work_status" => "Non European National"
	],
	[
		"id" => 13288,
		"user_id" => 17092,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13139,
		"user_id" => 16943,
		"work_status" => "Non European National"
	],
	[
		"id" => 23590,
		"user_id" => 29154,
		"work_status" => "Non European National"
	],
	[
		"id" => 6374,
		"user_id" => 8799,
		"work_status" => "0"
	],
	[
		"id" => 6375,
		"user_id" => 8802,
		"work_status" => "0"
	],
	[
		"id" => 6376,
		"user_id" => 8804,
		"work_status" => "European National"
	],
	[
		"id" => 6377,
		"user_id" => 8806,
		"work_status" => "European National"
	],
	[
		"id" => 6378,
		"user_id" => 8807,
		"work_status" => "0"
	],
	[
		"id" => 6379,
		"user_id" => 8808,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13458,
		"user_id" => 17262,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6382,
		"user_id" => 8800,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15400,
		"user_id" => 19204,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6386,
		"user_id" => 8820,
		"work_status" => "European National"
	],
	[
		"id" => 6387,
		"user_id" => 8821,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6389,
		"user_id" => 8822,
		"work_status" => "0"
	],
	[
		"id" => 12708,
		"user_id" => 16329,
		"work_status" => "0"
	],
	[
		"id" => 12709,
		"user_id" => 16331,
		"work_status" => "0"
	],
	[
		"id" => 6391,
		"user_id" => 8826,
		"work_status" => "0"
	],
	[
		"id" => 6392,
		"user_id" => 8827,
		"work_status" => "Non European National"
	],
	[
		"id" => 6396,
		"user_id" => 8831,
		"work_status" => "European National"
	],
	[
		"id" => 15063,
		"user_id" => 18867,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13884,
		"user_id" => 17688,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22229,
		"user_id" => 27755,
		"work_status" => "Non European National"
	],
	[
		"id" => 14703,
		"user_id" => 18507,
		"work_status" => "European National"
	],
	[
		"id" => 6402,
		"user_id" => 8838,
		"work_status" => "Non European National"
	],
	[
		"id" => 13537,
		"user_id" => 17341,
		"work_status" => "Non European National"
	],
	[
		"id" => 6404,
		"user_id" => 8840,
		"work_status" => "0"
	],
	[
		"id" => 13418,
		"user_id" => 17222,
		"work_status" => "Non European National"
	],
	[
		"id" => 6407,
		"user_id" => 8474,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19286,
		"user_id" => 23833,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6409,
		"user_id" => 8844,
		"work_status" => "Non European National"
	],
	[
		"id" => 6410,
		"user_id" => 8845,
		"work_status" => "European National"
	],
	[
		"id" => 14244,
		"user_id" => 18048,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6413,
		"user_id" => 8848,
		"work_status" => "0"
	],
	[
		"id" => 6414,
		"user_id" => 8850,
		"work_status" => "0"
	],
	[
		"id" => 6415,
		"user_id" => 8851,
		"work_status" => "European National"
	],
	[
		"id" => 23054,
		"user_id" => 28580,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6417,
		"user_id" => 8856,
		"work_status" => "European National"
	],
	[
		"id" => 6420,
		"user_id" => 8863,
		"work_status" => "European National"
	],
	[
		"id" => 13131,
		"user_id" => 16935,
		"work_status" => "Non European National"
	],
	[
		"id" => 13136,
		"user_id" => 16940,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13142,
		"user_id" => 16946,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13144,
		"user_id" => 16948,
		"work_status" => "European National"
	],
	[
		"id" => 23818,
		"user_id" => 29382,
		"work_status" => "European National"
	],
	[
		"id" => 23889,
		"user_id" => 29453,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6436,
		"user_id" => 8673,
		"work_status" => "0"
	],
	[
		"id" => 6437,
		"user_id" => 8813,
		"work_status" => "0"
	],
	[
		"id" => 6438,
		"user_id" => 8878,
		"work_status" => "European National"
	],
	[
		"id" => 15374,
		"user_id" => 19178,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19697,
		"user_id" => 24244,
		"work_status" => "Non European National"
	],
	[
		"id" => 13803,
		"user_id" => 17607,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6443,
		"user_id" => 8883,
		"work_status" => "0"
	],
	[
		"id" => 13593,
		"user_id" => 17397,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6448,
		"user_id" => 8886,
		"work_status" => "0"
	],
	[
		"id" => 8771,
		"user_id" => 12170,
		"work_status" => "0"
	],
	[
		"id" => 14743,
		"user_id" => 18547,
		"work_status" => "European National"
	],
	[
		"id" => 6451,
		"user_id" => 8890,
		"work_status" => "Non European National"
	],
	[
		"id" => 6452,
		"user_id" => 8892,
		"work_status" => "0"
	],
	[
		"id" => 6453,
		"user_id" => 8893,
		"work_status" => "Non European National"
	],
	[
		"id" => 13261,
		"user_id" => 17065,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6455,
		"user_id" => 8895,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6456,
		"user_id" => 8897,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13151,
		"user_id" => 16955,
		"work_status" => "European National"
	],
	[
		"id" => 6458,
		"user_id" => 8900,
		"work_status" => "Non European National"
	],
	[
		"id" => 14583,
		"user_id" => 18387,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13339,
		"user_id" => 17143,
		"work_status" => "Non European National"
	],
	[
		"id" => 6462,
		"user_id" => 8905,
		"work_status" => "Non European National"
	],
	[
		"id" => 6463,
		"user_id" => 8906,
		"work_status" => "0"
	],
	[
		"id" => 6464,
		"user_id" => 8907,
		"work_status" => "European National"
	],
	[
		"id" => 19219,
		"user_id" => 23766,
		"work_status" => "Non European National"
	],
	[
		"id" => 19056,
		"user_id" => 23603,
		"work_status" => "European National"
	],
	[
		"id" => 6466,
		"user_id" => 8909,
		"work_status" => "0"
	],
	[
		"id" => 15071,
		"user_id" => 18875,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6468,
		"user_id" => 8891,
		"work_status" => "Non European National"
	],
	[
		"id" => 6472,
		"user_id" => 8917,
		"work_status" => "European National"
	],
	[
		"id" => 6474,
		"user_id" => 8919,
		"work_status" => "Non European National"
	],
	[
		"id" => 6477,
		"user_id" => 8922,
		"work_status" => "Non European National"
	],
	[
		"id" => 6478,
		"user_id" => 8924,
		"work_status" => "Non European National"
	],
	[
		"id" => 6480,
		"user_id" => 8928,
		"work_status" => "Non European National"
	],
	[
		"id" => 14616,
		"user_id" => 18420,
		"work_status" => "Non European National"
	],
	[
		"id" => 22761,
		"user_id" => 28287,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6482,
		"user_id" => 8930,
		"work_status" => "Non European National"
	],
	[
		"id" => 6484,
		"user_id" => 8935,
		"work_status" => "Non European National"
	],
	[
		"id" => 6485,
		"user_id" => 8936,
		"work_status" => "0"
	],
	[
		"id" => 8501,
		"user_id" => 11745,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13952,
		"user_id" => 17756,
		"work_status" => "European National"
	],
	[
		"id" => 6490,
		"user_id" => 8938,
		"work_status" => "European National"
	],
	[
		"id" => 13235,
		"user_id" => 17039,
		"work_status" => "Non European National"
	],
	[
		"id" => 15265,
		"user_id" => 19069,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6496,
		"user_id" => 8948,
		"work_status" => "0"
	],
	[
		"id" => 6497,
		"user_id" => 8815,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6500,
		"user_id" => 8950,
		"work_status" => "0"
	],
	[
		"id" => 6501,
		"user_id" => 8952,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6502,
		"user_id" => 8951,
		"work_status" => "0"
	],
	[
		"id" => 14574,
		"user_id" => 18378,
		"work_status" => "European National"
	],
	[
		"id" => 6505,
		"user_id" => 8908,
		"work_status" => "European National"
	],
	[
		"id" => 6506,
		"user_id" => 8720,
		"work_status" => "0"
	],
	[
		"id" => 6830,
		"user_id" => 9395,
		"work_status" => "Non European National"
	],
	[
		"id" => 6509,
		"user_id" => 8956,
		"work_status" => "0"
	],
	[
		"id" => 6510,
		"user_id" => 8959,
		"work_status" => "0"
	],
	[
		"id" => 24610,
		"user_id" => 30174,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6513,
		"user_id" => 8960,
		"work_status" => "European National"
	],
	[
		"id" => 6514,
		"user_id" => 8961,
		"work_status" => "Non European National"
	],
	[
		"id" => 22019,
		"user_id" => 27545,
		"work_status" => "European National"
	],
	[
		"id" => 6518,
		"user_id" => 8971,
		"work_status" => "0"
	],
	[
		"id" => 6519,
		"user_id" => 8970,
		"work_status" => "Non European National"
	],
	[
		"id" => 14981,
		"user_id" => 18785,
		"work_status" => "Non European National"
	],
	[
		"id" => 14791,
		"user_id" => 18595,
		"work_status" => "European National"
	],
	[
		"id" => 6526,
		"user_id" => 8980,
		"work_status" => "Non European National"
	],
	[
		"id" => 6527,
		"user_id" => 8981,
		"work_status" => "Non European National"
	],
	[
		"id" => 16679,
		"user_id" => 21132,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6532,
		"user_id" => 8986,
		"work_status" => "Non European National"
	],
	[
		"id" => 6533,
		"user_id" => 8987,
		"work_status" => "Non European National"
	],
	[
		"id" => 6534,
		"user_id" => 8988,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19120,
		"user_id" => 23667,
		"work_status" => "European National"
	],
	[
		"id" => 14541,
		"user_id" => 18345,
		"work_status" => "European National"
	],
	[
		"id" => 12069,
		"user_id" => 15709,
		"work_status" => "Non European National"
	],
	[
		"id" => 14603,
		"user_id" => 18407,
		"work_status" => "European National"
	],
	[
		"id" => 15312,
		"user_id" => 19116,
		"work_status" => "European National"
	],
	[
		"id" => 13493,
		"user_id" => 17297,
		"work_status" => "European National"
	],
	[
		"id" => 15390,
		"user_id" => 19194,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14872,
		"user_id" => 18676,
		"work_status" => "Non European National"
	],
	[
		"id" => 19668,
		"user_id" => 24215,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6542,
		"user_id" => 8994,
		"work_status" => "0"
	],
	[
		"id" => 12079,
		"user_id" => 15719,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6543,
		"user_id" => 8995,
		"work_status" => "Non European National"
	],
	[
		"id" => 6545,
		"user_id" => 8789,
		"work_status" => "0"
	],
	[
		"id" => 16539,
		"user_id" => 20892,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19235,
		"user_id" => 23782,
		"work_status" => "Non European National"
	],
	[
		"id" => 14262,
		"user_id" => 18066,
		"work_status" => "Non European National"
	],
	[
		"id" => 6550,
		"user_id" => 9003,
		"work_status" => "Non European National"
	],
	[
		"id" => 15049,
		"user_id" => 18853,
		"work_status" => "Non European National"
	],
	[
		"id" => 6555,
		"user_id" => 9007,
		"work_status" => "Non European National"
	],
	[
		"id" => 19775,
		"user_id" => 24322,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14830,
		"user_id" => 18634,
		"work_status" => "European National"
	],
	[
		"id" => 6558,
		"user_id" => 9010,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14206,
		"user_id" => 18010,
		"work_status" => "European National"
	],
	[
		"id" => 6560,
		"user_id" => 8955,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6561,
		"user_id" => 9012,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13826,
		"user_id" => 17630,
		"work_status" => "European National"
	],
	[
		"id" => 6563,
		"user_id" => 9016,
		"work_status" => "0"
	],
	[
		"id" => 6564,
		"user_id" => 9017,
		"work_status" => "0"
	],
	[
		"id" => 6565,
		"user_id" => 9018,
		"work_status" => "European National"
	],
	[
		"id" => 6566,
		"user_id" => 9019,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6567,
		"user_id" => 9020,
		"work_status" => "0"
	],
	[
		"id" => 6568,
		"user_id" => 9021,
		"work_status" => "European National"
	],
	[
		"id" => 6570,
		"user_id" => 9024,
		"work_status" => "European National"
	],
	[
		"id" => 6571,
		"user_id" => 9026,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6572,
		"user_id" => 9027,
		"work_status" => "Non European National"
	],
	[
		"id" => 21882,
		"user_id" => 27408,
		"work_status" => "Non European National"
	],
	[
		"id" => 6574,
		"user_id" => 8898,
		"work_status" => "European National"
	],
	[
		"id" => 14943,
		"user_id" => 18747,
		"work_status" => "Non European National"
	],
	[
		"id" => 14303,
		"user_id" => 18107,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6577,
		"user_id" => 9031,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16631,
		"user_id" => 21056,
		"work_status" => "0"
	],
	[
		"id" => 6579,
		"user_id" => 9034,
		"work_status" => "0"
	],
	[
		"id" => 13959,
		"user_id" => 17763,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13720,
		"user_id" => 17524,
		"work_status" => "European National"
	],
	[
		"id" => 6584,
		"user_id" => 9041,
		"work_status" => "European National"
	],
	[
		"id" => 15187,
		"user_id" => 18991,
		"work_status" => "Non European National"
	],
	[
		"id" => 12090,
		"user_id" => 15730,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6587,
		"user_id" => 9044,
		"work_status" => "Non European National"
	],
	[
		"id" => 15304,
		"user_id" => 19108,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19402,
		"user_id" => 23949,
		"work_status" => "Non European National"
	],
	[
		"id" => 15129,
		"user_id" => 18933,
		"work_status" => "European National"
	],
	[
		"id" => 6593,
		"user_id" => 9050,
		"work_status" => "0"
	],
	[
		"id" => 13138,
		"user_id" => 16942,
		"work_status" => "Non European National"
	],
	[
		"id" => 23513,
		"user_id" => 29077,
		"work_status" => "Non European National"
	],
	[
		"id" => 14220,
		"user_id" => 18024,
		"work_status" => "Non European National"
	],
	[
		"id" => 14218,
		"user_id" => 18022,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8679,
		"user_id" => 12013,
		"work_status" => "European National"
	],
	[
		"id" => 12294,
		"user_id" => 15934,
		"work_status" => "Non European National"
	],
	[
		"id" => 6600,
		"user_id" => 9058,
		"work_status" => "0"
	],
	[
		"id" => 23674,
		"user_id" => 29238,
		"work_status" => "Non European National"
	],
	[
		"id" => 13309,
		"user_id" => 17113,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6603,
		"user_id" => 9053,
		"work_status" => "Non European National"
	],
	[
		"id" => 6604,
		"user_id" => 9064,
		"work_status" => "European National"
	],
	[
		"id" => 6605,
		"user_id" => 9065,
		"work_status" => "Non European National"
	],
	[
		"id" => 14986,
		"user_id" => 18790,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6607,
		"user_id" => 9072,
		"work_status" => "0"
	],
	[
		"id" => 6608,
		"user_id" => 9073,
		"work_status" => "Non European National"
	],
	[
		"id" => 19661,
		"user_id" => 24208,
		"work_status" => "European National"
	],
	[
		"id" => 14210,
		"user_id" => 18014,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14883,
		"user_id" => 18687,
		"work_status" => "Non European National"
	],
	[
		"id" => 13597,
		"user_id" => 17401,
		"work_status" => "European National"
	],
	[
		"id" => 6616,
		"user_id" => 9091,
		"work_status" => "0"
	],
	[
		"id" => 6617,
		"user_id" => 9087,
		"work_status" => "Non European National"
	],
	[
		"id" => 6618,
		"user_id" => 9092,
		"work_status" => "Non European National"
	],
	[
		"id" => 13433,
		"user_id" => 17237,
		"work_status" => "Non European National"
	],
	[
		"id" => 6620,
		"user_id" => 9089,
		"work_status" => "0"
	],
	[
		"id" => 6621,
		"user_id" => 9094,
		"work_status" => "Non European National"
	],
	[
		"id" => 14431,
		"user_id" => 18235,
		"work_status" => "Non European National"
	],
	[
		"id" => 6623,
		"user_id" => 9096,
		"work_status" => "Non European National"
	],
	[
		"id" => 6624,
		"user_id" => 9098,
		"work_status" => "0"
	],
	[
		"id" => 6626,
		"user_id" => 9100,
		"work_status" => "0"
	],
	[
		"id" => 6627,
		"user_id" => 9102,
		"work_status" => "European National"
	],
	[
		"id" => 6628,
		"user_id" => 9104,
		"work_status" => "Non European National"
	],
	[
		"id" => 6629,
		"user_id" => 9105,
		"work_status" => "0"
	],
	[
		"id" => 6631,
		"user_id" => 9107,
		"work_status" => "0"
	],
	[
		"id" => 6632,
		"user_id" => 9108,
		"work_status" => "0"
	],
	[
		"id" => 6633,
		"user_id" => 9109,
		"work_status" => "0"
	],
	[
		"id" => 15115,
		"user_id" => 18919,
		"work_status" => "Non European National"
	],
	[
		"id" => 20581,
		"user_id" => 21010,
		"work_status" => "European National"
	],
	[
		"id" => 6637,
		"user_id" => 9116,
		"work_status" => "European National"
	],
	[
		"id" => 6639,
		"user_id" => 9120,
		"work_status" => "European National"
	],
	[
		"id" => 6640,
		"user_id" => 9122,
		"work_status" => "0"
	],
	[
		"id" => 6641,
		"user_id" => 9123,
		"work_status" => "European National"
	],
	[
		"id" => 6642,
		"user_id" => 9119,
		"work_status" => "European National"
	],
	[
		"id" => 14352,
		"user_id" => 18156,
		"work_status" => "European National"
	],
	[
		"id" => 6644,
		"user_id" => 9130,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6645,
		"user_id" => 9131,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13188,
		"user_id" => 16992,
		"work_status" => "Non European National"
	],
	[
		"id" => 6648,
		"user_id" => 9137,
		"work_status" => "European National"
	],
	[
		"id" => 6649,
		"user_id" => 9138,
		"work_status" => "Non European National"
	],
	[
		"id" => 6650,
		"user_id" => 9141,
		"work_status" => "Non European National"
	],
	[
		"id" => 16567,
		"user_id" => 19971,
		"work_status" => "European National"
	],
	[
		"id" => 6652,
		"user_id" => 9144,
		"work_status" => "Non European National"
	],
	[
		"id" => 6653,
		"user_id" => 9121,
		"work_status" => "Non European National"
	],
	[
		"id" => 14315,
		"user_id" => 18119,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13581,
		"user_id" => 17385,
		"work_status" => "Non European National"
	],
	[
		"id" => 6656,
		"user_id" => 9148,
		"work_status" => "0"
	],
	[
		"id" => 6658,
		"user_id" => 9152,
		"work_status" => "0"
	],
	[
		"id" => 14570,
		"user_id" => 18374,
		"work_status" => "Non European National"
	],
	[
		"id" => 6660,
		"user_id" => 9155,
		"work_status" => "0"
	],
	[
		"id" => 6661,
		"user_id" => 9157,
		"work_status" => "European National"
	],
	[
		"id" => 19674,
		"user_id" => 24221,
		"work_status" => "Non European National"
	],
	[
		"id" => 6663,
		"user_id" => 9160,
		"work_status" => "0"
	],
	[
		"id" => 6664,
		"user_id" => 9162,
		"work_status" => "Non European National"
	],
	[
		"id" => 14098,
		"user_id" => 17902,
		"work_status" => "Non European National"
	],
	[
		"id" => 13564,
		"user_id" => 17368,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6667,
		"user_id" => 9163,
		"work_status" => "Non European National"
	],
	[
		"id" => 6668,
		"user_id" => 9165,
		"work_status" => "European National"
	],
	[
		"id" => 14542,
		"user_id" => 18346,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14955,
		"user_id" => 18759,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6672,
		"user_id" => 9172,
		"work_status" => "Non European National"
	],
	[
		"id" => 6673,
		"user_id" => 9171,
		"work_status" => "0"
	],
	[
		"id" => 6674,
		"user_id" => 9175,
		"work_status" => "Non European National"
	],
	[
		"id" => 6675,
		"user_id" => 9176,
		"work_status" => "European National"
	],
	[
		"id" => 6677,
		"user_id" => 9177,
		"work_status" => "0"
	],
	[
		"id" => 6679,
		"user_id" => 9179,
		"work_status" => "0"
	],
	[
		"id" => 19322,
		"user_id" => 23869,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6681,
		"user_id" => 9181,
		"work_status" => "European National"
	],
	[
		"id" => 6682,
		"user_id" => 9182,
		"work_status" => "0"
	],
	[
		"id" => 6683,
		"user_id" => 9183,
		"work_status" => "0"
	],
	[
		"id" => 22440,
		"user_id" => 27966,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13208,
		"user_id" => 17012,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6687,
		"user_id" => 9189,
		"work_status" => "0"
	],
	[
		"id" => 19824,
		"user_id" => 24371,
		"work_status" => "Non European National"
	],
	[
		"id" => 13833,
		"user_id" => 17637,
		"work_status" => "European National"
	],
	[
		"id" => 14550,
		"user_id" => 18354,
		"work_status" => "Non European National"
	],
	[
		"id" => 6692,
		"user_id" => 9195,
		"work_status" => "0"
	],
	[
		"id" => 6693,
		"user_id" => 9196,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6694,
		"user_id" => 9198,
		"work_status" => "0"
	],
	[
		"id" => 14411,
		"user_id" => 18215,
		"work_status" => "Non European National"
	],
	[
		"id" => 6696,
		"user_id" => 9203,
		"work_status" => "0"
	],
	[
		"id" => 21689,
		"user_id" => 27164,
		"work_status" => "European National"
	],
	[
		"id" => 21690,
		"user_id" => 27167,
		"work_status" => "European National"
	],
	[
		"id" => 6698,
		"user_id" => 9205,
		"work_status" => "European National"
	],
	[
		"id" => 6700,
		"user_id" => 9207,
		"work_status" => "Non European National"
	],
	[
		"id" => 6701,
		"user_id" => 9209,
		"work_status" => "0"
	],
	[
		"id" => 6704,
		"user_id" => 9216,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14134,
		"user_id" => 17938,
		"work_status" => "European National"
	],
	[
		"id" => 6707,
		"user_id" => 9221,
		"work_status" => "Non European National"
	],
	[
		"id" => 15328,
		"user_id" => 19132,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6709,
		"user_id" => 9222,
		"work_status" => "European National"
	],
	[
		"id" => 6710,
		"user_id" => 9224,
		"work_status" => "European National"
	],
	[
		"id" => 6711,
		"user_id" => 9223,
		"work_status" => "European National"
	],
	[
		"id" => 6712,
		"user_id" => 9227,
		"work_status" => "0"
	],
	[
		"id" => 6713,
		"user_id" => 9228,
		"work_status" => "European National"
	],
	[
		"id" => 22506,
		"user_id" => 28032,
		"work_status" => "Non European National"
	],
	[
		"id" => 19519,
		"user_id" => 24066,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14087,
		"user_id" => 17891,
		"work_status" => "Non European National"
	],
	[
		"id" => 6716,
		"user_id" => 9232,
		"work_status" => "European National"
	],
	[
		"id" => 19335,
		"user_id" => 23882,
		"work_status" => "Non European National"
	],
	[
		"id" => 6719,
		"user_id" => 9235,
		"work_status" => "Non European National"
	],
	[
		"id" => 13941,
		"user_id" => 17745,
		"work_status" => "Non European National"
	],
	[
		"id" => 15245,
		"user_id" => 19049,
		"work_status" => "Non European National"
	],
	[
		"id" => 6722,
		"user_id" => 9240,
		"work_status" => "0"
	],
	[
		"id" => 6723,
		"user_id" => 9241,
		"work_status" => "0"
	],
	[
		"id" => 6724,
		"user_id" => 9242,
		"work_status" => "Non European National"
	],
	[
		"id" => 19382,
		"user_id" => 23929,
		"work_status" => "European National"
	],
	[
		"id" => 6727,
		"user_id" => 9246,
		"work_status" => "0"
	],
	[
		"id" => 6728,
		"user_id" => 9230,
		"work_status" => "European National"
	],
	[
		"id" => 23082,
		"user_id" => 28608,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14326,
		"user_id" => 18130,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6731,
		"user_id" => 9251,
		"work_status" => "0"
	],
	[
		"id" => 6732,
		"user_id" => 9213,
		"work_status" => "European National"
	],
	[
		"id" => 6733,
		"user_id" => 9250,
		"work_status" => "European National"
	],
	[
		"id" => 6734,
		"user_id" => 9070,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6735,
		"user_id" => 9252,
		"work_status" => "European National"
	],
	[
		"id" => 6736,
		"user_id" => 9258,
		"work_status" => "0"
	],
	[
		"id" => 6742,
		"user_id" => 8773,
		"work_status" => "0"
	],
	[
		"id" => 6743,
		"user_id" => 9267,
		"work_status" => "Non European National"
	],
	[
		"id" => 6744,
		"user_id" => 9268,
		"work_status" => "0"
	],
	[
		"id" => 14758,
		"user_id" => 18562,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6746,
		"user_id" => 9277,
		"work_status" => "Non European National"
	],
	[
		"id" => 6747,
		"user_id" => 9279,
		"work_status" => "0"
	],
	[
		"id" => 14000,
		"user_id" => 17804,
		"work_status" => "Non European National"
	],
	[
		"id" => 6749,
		"user_id" => 9282,
		"work_status" => "0"
	],
	[
		"id" => 6750,
		"user_id" => 9281,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6751,
		"user_id" => 9283,
		"work_status" => "0"
	],
	[
		"id" => 14330,
		"user_id" => 18134,
		"work_status" => "Non European National"
	],
	[
		"id" => 13898,
		"user_id" => 17702,
		"work_status" => "European National"
	],
	[
		"id" => 6755,
		"user_id" => 9287,
		"work_status" => "0"
	],
	[
		"id" => 6756,
		"user_id" => 9288,
		"work_status" => "Non European National"
	],
	[
		"id" => 6757,
		"user_id" => 9290,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6758,
		"user_id" => 9291,
		"work_status" => "0"
	],
	[
		"id" => 6759,
		"user_id" => 9292,
		"work_status" => "0"
	],
	[
		"id" => 6760,
		"user_id" => 9295,
		"work_status" => "0"
	],
	[
		"id" => 6761,
		"user_id" => 9296,
		"work_status" => "0"
	],
	[
		"id" => 6762,
		"user_id" => 9298,
		"work_status" => "0"
	],
	[
		"id" => 6763,
		"user_id" => 9301,
		"work_status" => "0"
	],
	[
		"id" => 6764,
		"user_id" => 9302,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6766,
		"user_id" => 9305,
		"work_status" => "European National"
	],
	[
		"id" => 19524,
		"user_id" => 24071,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14535,
		"user_id" => 18339,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13348,
		"user_id" => 17152,
		"work_status" => "European National"
	],
	[
		"id" => 13518,
		"user_id" => 17322,
		"work_status" => "Non European National"
	],
	[
		"id" => 6772,
		"user_id" => 9315,
		"work_status" => "Non European National"
	],
	[
		"id" => 6773,
		"user_id" => 9317,
		"work_status" => "0"
	],
	[
		"id" => 14035,
		"user_id" => 17839,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6775,
		"user_id" => 9320,
		"work_status" => "0"
	],
	[
		"id" => 6776,
		"user_id" => 9319,
		"work_status" => "0"
	],
	[
		"id" => 6777,
		"user_id" => 9322,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6778,
		"user_id" => 9323,
		"work_status" => "0"
	],
	[
		"id" => 6779,
		"user_id" => 9313,
		"work_status" => "European National"
	],
	[
		"id" => 6780,
		"user_id" => 9327,
		"work_status" => "Non European National"
	],
	[
		"id" => 6781,
		"user_id" => 9316,
		"work_status" => "Non European National"
	],
	[
		"id" => 6782,
		"user_id" => 9333,
		"work_status" => "European National"
	],
	[
		"id" => 6783,
		"user_id" => 9334,
		"work_status" => "European National"
	],
	[
		"id" => 6784,
		"user_id" => 9335,
		"work_status" => "European National"
	],
	[
		"id" => 6785,
		"user_id" => 9337,
		"work_status" => "European National"
	],
	[
		"id" => 6789,
		"user_id" => 9341,
		"work_status" => "0"
	],
	[
		"id" => 14003,
		"user_id" => 17807,
		"work_status" => "Non European National"
	],
	[
		"id" => 6791,
		"user_id" => 9345,
		"work_status" => "0"
	],
	[
		"id" => 6792,
		"user_id" => 9347,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6793,
		"user_id" => 9350,
		"work_status" => "Non European National"
	],
	[
		"id" => 6794,
		"user_id" => 9353,
		"work_status" => "European National"
	],
	[
		"id" => 6795,
		"user_id" => 9355,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6796,
		"user_id" => 9357,
		"work_status" => "0"
	],
	[
		"id" => 6797,
		"user_id" => 9358,
		"work_status" => "0"
	],
	[
		"id" => 14643,
		"user_id" => 18447,
		"work_status" => "Non European National"
	],
	[
		"id" => 6799,
		"user_id" => 9361,
		"work_status" => "0"
	],
	[
		"id" => 6800,
		"user_id" => 9362,
		"work_status" => "Non European National"
	],
	[
		"id" => 21921,
		"user_id" => 27447,
		"work_status" => "Non European National"
	],
	[
		"id" => 15062,
		"user_id" => 18866,
		"work_status" => "Non European National"
	],
	[
		"id" => 13740,
		"user_id" => 17544,
		"work_status" => "European National"
	],
	[
		"id" => 13329,
		"user_id" => 17133,
		"work_status" => "Non European National"
	],
	[
		"id" => 6804,
		"user_id" => 9367,
		"work_status" => "0"
	],
	[
		"id" => 6805,
		"user_id" => 9363,
		"work_status" => "0"
	],
	[
		"id" => 6806,
		"user_id" => 9369,
		"work_status" => "0"
	],
	[
		"id" => 6807,
		"user_id" => 9370,
		"work_status" => "Non European National"
	],
	[
		"id" => 6808,
		"user_id" => 9371,
		"work_status" => "Non European National"
	],
	[
		"id" => 15255,
		"user_id" => 19059,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6812,
		"user_id" => 9375,
		"work_status" => "0"
	],
	[
		"id" => 6813,
		"user_id" => 9376,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6814,
		"user_id" => 9377,
		"work_status" => "0"
	],
	[
		"id" => 7897,
		"user_id" => 10897,
		"work_status" => "Non European National"
	],
	[
		"id" => 6817,
		"user_id" => 9382,
		"work_status" => "Non European National"
	],
	[
		"id" => 6818,
		"user_id" => 9384,
		"work_status" => "European National"
	],
	[
		"id" => 6819,
		"user_id" => 9385,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23516,
		"user_id" => 29080,
		"work_status" => "Non European National"
	],
	[
		"id" => 6820,
		"user_id" => 9386,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13272,
		"user_id" => 17076,
		"work_status" => "European National"
	],
	[
		"id" => 24892,
		"user_id" => 30456,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8502,
		"user_id" => 11746,
		"work_status" => "Non European National"
	],
	[
		"id" => 6825,
		"user_id" => 9374,
		"work_status" => "0"
	],
	[
		"id" => 6826,
		"user_id" => 9392,
		"work_status" => "0"
	],
	[
		"id" => 6827,
		"user_id" => 9393,
		"work_status" => "0"
	],
	[
		"id" => 6828,
		"user_id" => 9394,
		"work_status" => "Non European National"
	],
	[
		"id" => 18925,
		"user_id" => 23472,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24558,
		"user_id" => 30122,
		"work_status" => "Non European National"
	],
	[
		"id" => 11929,
		"user_id" => 15554,
		"work_status" => "Non European National"
	],
	[
		"id" => 6834,
		"user_id" => 9401,
		"work_status" => "0"
	],
	[
		"id" => 13148,
		"user_id" => 16952,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6836,
		"user_id" => 9402,
		"work_status" => "European National"
	],
	[
		"id" => 13335,
		"user_id" => 17139,
		"work_status" => "Non European National"
	],
	[
		"id" => 14250,
		"user_id" => 18054,
		"work_status" => "European National"
	],
	[
		"id" => 24898,
		"user_id" => 30462,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6841,
		"user_id" => 9408,
		"work_status" => "European National"
	],
	[
		"id" => 14174,
		"user_id" => 17978,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14575,
		"user_id" => 18379,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14223,
		"user_id" => 18027,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18857,
		"user_id" => 23404,
		"work_status" => "Non European National"
	],
	[
		"id" => 26434,
		"user_id" => 32821,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6848,
		"user_id" => 9421,
		"work_status" => "Non European National"
	],
	[
		"id" => 6849,
		"user_id" => 9424,
		"work_status" => "0"
	],
	[
		"id" => 6850,
		"user_id" => 9427,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14230,
		"user_id" => 18034,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14422,
		"user_id" => 18226,
		"work_status" => "European National"
	],
	[
		"id" => 6854,
		"user_id" => 9434,
		"work_status" => "0"
	],
	[
		"id" => 22937,
		"user_id" => 28463,
		"work_status" => "Non European National"
	],
	[
		"id" => 13836,
		"user_id" => 17640,
		"work_status" => "Non European National"
	],
	[
		"id" => 6857,
		"user_id" => 9437,
		"work_status" => "0"
	],
	[
		"id" => 14915,
		"user_id" => 18719,
		"work_status" => "Non European National"
	],
	[
		"id" => 6859,
		"user_id" => 9440,
		"work_status" => "0"
	],
	[
		"id" => 6860,
		"user_id" => 9442,
		"work_status" => "Non European National"
	],
	[
		"id" => 13205,
		"user_id" => 17009,
		"work_status" => "European National"
	],
	[
		"id" => 6863,
		"user_id" => 9445,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6864,
		"user_id" => 9447,
		"work_status" => "Non European National"
	],
	[
		"id" => 6865,
		"user_id" => 9448,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6867,
		"user_id" => 9454,
		"work_status" => "European National"
	],
	[
		"id" => 6868,
		"user_id" => 9456,
		"work_status" => "Non European National"
	],
	[
		"id" => 6869,
		"user_id" => 9458,
		"work_status" => "Non European National"
	],
	[
		"id" => 6870,
		"user_id" => 9459,
		"work_status" => "0"
	],
	[
		"id" => 6872,
		"user_id" => 9461,
		"work_status" => "Non European National"
	],
	[
		"id" => 14859,
		"user_id" => 18663,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14942,
		"user_id" => 18746,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12984,
		"user_id" => 16719,
		"work_status" => "0"
	],
	[
		"id" => 6877,
		"user_id" => 9467,
		"work_status" => "0"
	],
	[
		"id" => 6878,
		"user_id" => 9469,
		"work_status" => "Non European National"
	],
	[
		"id" => 6879,
		"user_id" => 9470,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13308,
		"user_id" => 17112,
		"work_status" => "Non European National"
	],
	[
		"id" => 6882,
		"user_id" => 9474,
		"work_status" => "Non European National"
	],
	[
		"id" => 6884,
		"user_id" => 9476,
		"work_status" => "European National"
	],
	[
		"id" => 6885,
		"user_id" => 9477,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6886,
		"user_id" => 9478,
		"work_status" => "Non European National"
	],
	[
		"id" => 13519,
		"user_id" => 17323,
		"work_status" => "Non European National"
	],
	[
		"id" => 6888,
		"user_id" => 9481,
		"work_status" => "Non European National"
	],
	[
		"id" => 6889,
		"user_id" => 9482,
		"work_status" => "0"
	],
	[
		"id" => 14412,
		"user_id" => 18216,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6894,
		"user_id" => 9485,
		"work_status" => "Non European National"
	],
	[
		"id" => 13266,
		"user_id" => 17070,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13281,
		"user_id" => 17085,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23101,
		"user_id" => 28627,
		"work_status" => "European National"
	],
	[
		"id" => 6898,
		"user_id" => 9490,
		"work_status" => "European National"
	],
	[
		"id" => 6899,
		"user_id" => 9491,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13719,
		"user_id" => 17523,
		"work_status" => "European National"
	],
	[
		"id" => 14801,
		"user_id" => 18605,
		"work_status" => "Non European National"
	],
	[
		"id" => 14232,
		"user_id" => 18036,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13398,
		"user_id" => 17202,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6905,
		"user_id" => 9498,
		"work_status" => "0"
	],
	[
		"id" => 6906,
		"user_id" => 9499,
		"work_status" => "0"
	],
	[
		"id" => 6907,
		"user_id" => 9500,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14736,
		"user_id" => 18540,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6909,
		"user_id" => 9504,
		"work_status" => "Non European National"
	],
	[
		"id" => 6911,
		"user_id" => 9505,
		"work_status" => "0"
	],
	[
		"id" => 6912,
		"user_id" => 9508,
		"work_status" => "Non European National"
	],
	[
		"id" => 13347,
		"user_id" => 17151,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15226,
		"user_id" => 19030,
		"work_status" => "Non European National"
	],
	[
		"id" => 15083,
		"user_id" => 18887,
		"work_status" => "European National"
	],
	[
		"id" => 13822,
		"user_id" => 17626,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15260,
		"user_id" => 19064,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6920,
		"user_id" => 9516,
		"work_status" => "0"
	],
	[
		"id" => 6921,
		"user_id" => 9517,
		"work_status" => "0"
	],
	[
		"id" => 6922,
		"user_id" => 9518,
		"work_status" => "0"
	],
	[
		"id" => 6923,
		"user_id" => 9519,
		"work_status" => "0"
	],
	[
		"id" => 6925,
		"user_id" => 9521,
		"work_status" => "Non European National"
	],
	[
		"id" => 13525,
		"user_id" => 17329,
		"work_status" => "European National"
	],
	[
		"id" => 18947,
		"user_id" => 23494,
		"work_status" => "Non European National"
	],
	[
		"id" => 6929,
		"user_id" => 9527,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6930,
		"user_id" => 9530,
		"work_status" => "0"
	],
	[
		"id" => 6932,
		"user_id" => 9532,
		"work_status" => "0"
	],
	[
		"id" => 19339,
		"user_id" => 23886,
		"work_status" => "Non European National"
	],
	[
		"id" => 6934,
		"user_id" => 9534,
		"work_status" => "0"
	],
	[
		"id" => 6935,
		"user_id" => 9535,
		"work_status" => "Non European National"
	],
	[
		"id" => 6936,
		"user_id" => 9536,
		"work_status" => "Non European National"
	],
	[
		"id" => 6937,
		"user_id" => 9538,
		"work_status" => "Non European National"
	],
	[
		"id" => 6938,
		"user_id" => 9539,
		"work_status" => "0"
	],
	[
		"id" => 6939,
		"user_id" => 9540,
		"work_status" => "Non European National"
	],
	[
		"id" => 6940,
		"user_id" => 9541,
		"work_status" => "European National"
	],
	[
		"id" => 19707,
		"user_id" => 24254,
		"work_status" => "European National"
	],
	[
		"id" => 6942,
		"user_id" => 9544,
		"work_status" => "European National"
	],
	[
		"id" => 14204,
		"user_id" => 18008,
		"work_status" => "European National"
	],
	[
		"id" => 6944,
		"user_id" => 9547,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6945,
		"user_id" => 9548,
		"work_status" => "0"
	],
	[
		"id" => 6947,
		"user_id" => 9549,
		"work_status" => "0"
	],
	[
		"id" => 6948,
		"user_id" => 9550,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6952,
		"user_id" => 9556,
		"work_status" => "Non European National"
	],
	[
		"id" => 14617,
		"user_id" => 18421,
		"work_status" => "Non European National"
	],
	[
		"id" => 6954,
		"user_id" => 9558,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19755,
		"user_id" => 24302,
		"work_status" => "Non European National"
	],
	[
		"id" => 20584,
		"user_id" => 25445,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6958,
		"user_id" => 9563,
		"work_status" => "0"
	],
	[
		"id" => 18955,
		"user_id" => 23502,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8785,
		"user_id" => 12192,
		"work_status" => "0"
	],
	[
		"id" => 19342,
		"user_id" => 23889,
		"work_status" => "Non European National"
	],
	[
		"id" => 6961,
		"user_id" => 9570,
		"work_status" => "0"
	],
	[
		"id" => 14874,
		"user_id" => 18678,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14581,
		"user_id" => 18385,
		"work_status" => "Non European National"
	],
	[
		"id" => 14987,
		"user_id" => 18791,
		"work_status" => "European National"
	],
	[
		"id" => 6965,
		"user_id" => 9577,
		"work_status" => "0"
	],
	[
		"id" => 13874,
		"user_id" => 17678,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14761,
		"user_id" => 18565,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6968,
		"user_id" => 9579,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13217,
		"user_id" => 17021,
		"work_status" => "European National"
	],
	[
		"id" => 15064,
		"user_id" => 18868,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6972,
		"user_id" => 9587,
		"work_status" => "European National"
	],
	[
		"id" => 6973,
		"user_id" => 9588,
		"work_status" => "European National"
	],
	[
		"id" => 6974,
		"user_id" => 9593,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6975,
		"user_id" => 9591,
		"work_status" => "European National"
	],
	[
		"id" => 6976,
		"user_id" => 9594,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6977,
		"user_id" => 9597,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8669,
		"user_id" => 11996,
		"work_status" => "0"
	],
	[
		"id" => 14585,
		"user_id" => 18389,
		"work_status" => "Non European National"
	],
	[
		"id" => 6980,
		"user_id" => 9600,
		"work_status" => "Non European National"
	],
	[
		"id" => 14737,
		"user_id" => 18541,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6982,
		"user_id" => 9604,
		"work_status" => "0"
	],
	[
		"id" => 6985,
		"user_id" => 9609,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6986,
		"user_id" => 9610,
		"work_status" => "0"
	],
	[
		"id" => 6987,
		"user_id" => 9611,
		"work_status" => "0"
	],
	[
		"id" => 6988,
		"user_id" => 9612,
		"work_status" => "0"
	],
	[
		"id" => 15266,
		"user_id" => 19070,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6990,
		"user_id" => 9613,
		"work_status" => "Non European National"
	],
	[
		"id" => 14066,
		"user_id" => 17870,
		"work_status" => "European National"
	],
	[
		"id" => 6992,
		"user_id" => 9619,
		"work_status" => "European National"
	],
	[
		"id" => 15043,
		"user_id" => 18847,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14717,
		"user_id" => 18521,
		"work_status" => "Non European National"
	],
	[
		"id" => 22218,
		"user_id" => 27744,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 6996,
		"user_id" => 9625,
		"work_status" => "0"
	],
	[
		"id" => 6997,
		"user_id" => 9626,
		"work_status" => "European National"
	],
	[
		"id" => 18996,
		"user_id" => 23543,
		"work_status" => "European National"
	],
	[
		"id" => 6998,
		"user_id" => 9627,
		"work_status" => "0"
	],
	[
		"id" => 6999,
		"user_id" => 9628,
		"work_status" => "0"
	],
	[
		"id" => 24705,
		"user_id" => 30269,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22800,
		"user_id" => 28326,
		"work_status" => "European National"
	],
	[
		"id" => 18950,
		"user_id" => 23497,
		"work_status" => "Non European National"
	],
	[
		"id" => 14850,
		"user_id" => 18654,
		"work_status" => "European National"
	],
	[
		"id" => 7003,
		"user_id" => 9634,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14202,
		"user_id" => 18006,
		"work_status" => "Non European National"
	],
	[
		"id" => 13442,
		"user_id" => 17246,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7006,
		"user_id" => 9637,
		"work_status" => "Non European National"
	],
	[
		"id" => 7007,
		"user_id" => 8927,
		"work_status" => "Non European National"
	],
	[
		"id" => 19471,
		"user_id" => 24018,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19628,
		"user_id" => 24175,
		"work_status" => "European National"
	],
	[
		"id" => 7010,
		"user_id" => 9640,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14355,
		"user_id" => 18159,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15224,
		"user_id" => 19028,
		"work_status" => "Non European National"
	],
	[
		"id" => 7014,
		"user_id" => 9647,
		"work_status" => "European National"
	],
	[
		"id" => 7016,
		"user_id" => 9651,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7017,
		"user_id" => 9652,
		"work_status" => "Non European National"
	],
	[
		"id" => 7018,
		"user_id" => 9649,
		"work_status" => "0"
	],
	[
		"id" => 13375,
		"user_id" => 17179,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7020,
		"user_id" => 9632,
		"work_status" => "0"
	],
	[
		"id" => 7021,
		"user_id" => 9656,
		"work_status" => "0"
	],
	[
		"id" => 13964,
		"user_id" => 17768,
		"work_status" => "Non European National"
	],
	[
		"id" => 7023,
		"user_id" => 9658,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13437,
		"user_id" => 17241,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7025,
		"user_id" => 9661,
		"work_status" => "0"
	],
	[
		"id" => 14445,
		"user_id" => 18249,
		"work_status" => "Non European National"
	],
	[
		"id" => 7027,
		"user_id" => 9663,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7028,
		"user_id" => 9664,
		"work_status" => "0"
	],
	[
		"id" => 13761,
		"user_id" => 17565,
		"work_status" => "Non European National"
	],
	[
		"id" => 14676,
		"user_id" => 18480,
		"work_status" => "Non European National"
	],
	[
		"id" => 14842,
		"user_id" => 18646,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15336,
		"user_id" => 19140,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7036,
		"user_id" => 9678,
		"work_status" => "European National"
	],
	[
		"id" => 7038,
		"user_id" => 9679,
		"work_status" => "0"
	],
	[
		"id" => 7042,
		"user_id" => 9685,
		"work_status" => "0"
	],
	[
		"id" => 7043,
		"user_id" => 9686,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14864,
		"user_id" => 18668,
		"work_status" => "Non European National"
	],
	[
		"id" => 7045,
		"user_id" => 9689,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7046,
		"user_id" => 9691,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7047,
		"user_id" => 9690,
		"work_status" => "European National"
	],
	[
		"id" => 14644,
		"user_id" => 18448,
		"work_status" => "Non European National"
	],
	[
		"id" => 7050,
		"user_id" => 9697,
		"work_status" => "0"
	],
	[
		"id" => 14209,
		"user_id" => 18013,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13670,
		"user_id" => 17474,
		"work_status" => "Non European National"
	],
	[
		"id" => 13644,
		"user_id" => 17448,
		"work_status" => "European National"
	],
	[
		"id" => 7056,
		"user_id" => 8761,
		"work_status" => "0"
	],
	[
		"id" => 7058,
		"user_id" => 9704,
		"work_status" => "0"
	],
	[
		"id" => 7059,
		"user_id" => 9706,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15137,
		"user_id" => 18941,
		"work_status" => "0"
	],
	[
		"id" => 25799,
		"user_id" => 31918,
		"work_status" => "Non European National"
	],
	[
		"id" => 7060,
		"user_id" => 9423,
		"work_status" => "European National"
	],
	[
		"id" => 7061,
		"user_id" => 9709,
		"work_status" => "0"
	],
	[
		"id" => 26436,
		"user_id" => 32829,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26437,
		"user_id" => 32830,
		"work_status" => "Non European National"
	],
	[
		"id" => 26438,
		"user_id" => 32697,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7063,
		"user_id" => 9713,
		"work_status" => "0"
	],
	[
		"id" => 7064,
		"user_id" => 9714,
		"work_status" => "Non European National"
	],
	[
		"id" => 7066,
		"user_id" => 9413,
		"work_status" => "Non European National"
	],
	[
		"id" => 7067,
		"user_id" => 9719,
		"work_status" => "European National"
	],
	[
		"id" => 7068,
		"user_id" => 9720,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7069,
		"user_id" => 9721,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7070,
		"user_id" => 9722,
		"work_status" => "0"
	],
	[
		"id" => 22640,
		"user_id" => 28166,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7073,
		"user_id" => 9725,
		"work_status" => "0"
	],
	[
		"id" => 7074,
		"user_id" => 9727,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7075,
		"user_id" => 9603,
		"work_status" => "0"
	],
	[
		"id" => 7077,
		"user_id" => 9733,
		"work_status" => "0"
	],
	[
		"id" => 14304,
		"user_id" => 18108,
		"work_status" => "Non European National"
	],
	[
		"id" => 18895,
		"user_id" => 23442,
		"work_status" => "European National"
	],
	[
		"id" => 7080,
		"user_id" => 9737,
		"work_status" => "Non European National"
	],
	[
		"id" => 7081,
		"user_id" => 9738,
		"work_status" => "0"
	],
	[
		"id" => 7082,
		"user_id" => 9739,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7084,
		"user_id" => 9741,
		"work_status" => "0"
	],
	[
		"id" => 14148,
		"user_id" => 17952,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7086,
		"user_id" => 9744,
		"work_status" => "0"
	],
	[
		"id" => 14887,
		"user_id" => 18691,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8667,
		"user_id" => 11993,
		"work_status" => "European National"
	],
	[
		"id" => 7089,
		"user_id" => 9750,
		"work_status" => "0"
	],
	[
		"id" => 7090,
		"user_id" => 9752,
		"work_status" => "European National"
	],
	[
		"id" => 19848,
		"user_id" => 24395,
		"work_status" => "European National"
	],
	[
		"id" => 7092,
		"user_id" => 9753,
		"work_status" => "Non European National"
	],
	[
		"id" => 7093,
		"user_id" => 9754,
		"work_status" => "0"
	],
	[
		"id" => 13223,
		"user_id" => 17027,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19427,
		"user_id" => 23974,
		"work_status" => "Non European National"
	],
	[
		"id" => 13455,
		"user_id" => 17259,
		"work_status" => "Non European National"
	],
	[
		"id" => 18890,
		"user_id" => 23437,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7100,
		"user_id" => 9761,
		"work_status" => "European National"
	],
	[
		"id" => 7102,
		"user_id" => 9763,
		"work_status" => "European National"
	],
	[
		"id" => 7103,
		"user_id" => 9764,
		"work_status" => "0"
	],
	[
		"id" => 13881,
		"user_id" => 17685,
		"work_status" => "European National"
	],
	[
		"id" => 7105,
		"user_id" => 9766,
		"work_status" => "European National"
	],
	[
		"id" => 7107,
		"user_id" => 9769,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7108,
		"user_id" => 9770,
		"work_status" => "0"
	],
	[
		"id" => 13611,
		"user_id" => 17415,
		"work_status" => "Non European National"
	],
	[
		"id" => 12749,
		"user_id" => 16397,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15302,
		"user_id" => 19106,
		"work_status" => "European National"
	],
	[
		"id" => 13771,
		"user_id" => 17575,
		"work_status" => "European National"
	],
	[
		"id" => 7113,
		"user_id" => 9776,
		"work_status" => "European National"
	],
	[
		"id" => 13336,
		"user_id" => 17140,
		"work_status" => "European National"
	],
	[
		"id" => 7115,
		"user_id" => 9781,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7116,
		"user_id" => 9782,
		"work_status" => "0"
	],
	[
		"id" => 24536,
		"user_id" => 30100,
		"work_status" => "European National"
	],
	[
		"id" => 7118,
		"user_id" => 9785,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19633,
		"user_id" => 24180,
		"work_status" => "European National"
	],
	[
		"id" => 7120,
		"user_id" => 9778,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7122,
		"user_id" => 9790,
		"work_status" => "Non European National"
	],
	[
		"id" => 7124,
		"user_id" => 9792,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14060,
		"user_id" => 17864,
		"work_status" => "Non European National"
	],
	[
		"id" => 13762,
		"user_id" => 17566,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15114,
		"user_id" => 18918,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7130,
		"user_id" => 9801,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7131,
		"user_id" => 9802,
		"work_status" => "Non European National"
	],
	[
		"id" => 22091,
		"user_id" => 27617,
		"work_status" => "Non European National"
	],
	[
		"id" => 7133,
		"user_id" => 9805,
		"work_status" => "0"
	],
	[
		"id" => 7134,
		"user_id" => 9806,
		"work_status" => "0"
	],
	[
		"id" => 7135,
		"user_id" => 9449,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14711,
		"user_id" => 18515,
		"work_status" => "European National"
	],
	[
		"id" => 14577,
		"user_id" => 18381,
		"work_status" => "European National"
	],
	[
		"id" => 7139,
		"user_id" => 9811,
		"work_status" => "Non European National"
	],
	[
		"id" => 14814,
		"user_id" => 18618,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13612,
		"user_id" => 17416,
		"work_status" => "0"
	],
	[
		"id" => 7142,
		"user_id" => 9813,
		"work_status" => "0"
	],
	[
		"id" => 7143,
		"user_id" => 9815,
		"work_status" => "0"
	],
	[
		"id" => 7145,
		"user_id" => 9817,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23673,
		"user_id" => 29237,
		"work_status" => "Non European National"
	],
	[
		"id" => 13903,
		"user_id" => 17707,
		"work_status" => "European National"
	],
	[
		"id" => 20486,
		"user_id" => 25344,
		"work_status" => "0"
	],
	[
		"id" => 7149,
		"user_id" => 9826,
		"work_status" => "Non European National"
	],
	[
		"id" => 7152,
		"user_id" => 9830,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7153,
		"user_id" => 9833,
		"work_status" => "Non European National"
	],
	[
		"id" => 7154,
		"user_id" => 9834,
		"work_status" => "0"
	],
	[
		"id" => 7155,
		"user_id" => 9836,
		"work_status" => "0"
	],
	[
		"id" => 18766,
		"user_id" => 23313,
		"work_status" => "Non European National"
	],
	[
		"id" => 7159,
		"user_id" => 9422,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7160,
		"user_id" => 9841,
		"work_status" => "0"
	],
	[
		"id" => 7163,
		"user_id" => 9844,
		"work_status" => "0"
	],
	[
		"id" => 7164,
		"user_id" => 9845,
		"work_status" => "European National"
	],
	[
		"id" => 18871,
		"user_id" => 23418,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7166,
		"user_id" => 9847,
		"work_status" => "Non European National"
	],
	[
		"id" => 24481,
		"user_id" => 30045,
		"work_status" => "Non European National"
	],
	[
		"id" => 7168,
		"user_id" => 9849,
		"work_status" => "0"
	],
	[
		"id" => 13411,
		"user_id" => 17215,
		"work_status" => "Non European National"
	],
	[
		"id" => 7171,
		"user_id" => 9853,
		"work_status" => "0"
	],
	[
		"id" => 7173,
		"user_id" => 9855,
		"work_status" => "0"
	],
	[
		"id" => 7175,
		"user_id" => 9859,
		"work_status" => "Non European National"
	],
	[
		"id" => 14444,
		"user_id" => 18248,
		"work_status" => "Non European National"
	],
	[
		"id" => 7177,
		"user_id" => 9862,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7181,
		"user_id" => 9865,
		"work_status" => "0"
	],
	[
		"id" => 7183,
		"user_id" => 9866,
		"work_status" => "Non European National"
	],
	[
		"id" => 13482,
		"user_id" => 17286,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13815,
		"user_id" => 17619,
		"work_status" => "Non European National"
	],
	[
		"id" => 7186,
		"user_id" => 9858,
		"work_status" => "European National"
	],
	[
		"id" => 7187,
		"user_id" => 9870,
		"work_status" => "0"
	],
	[
		"id" => 13710,
		"user_id" => 17514,
		"work_status" => "European National"
	],
	[
		"id" => 7189,
		"user_id" => 9872,
		"work_status" => "0"
	],
	[
		"id" => 19829,
		"user_id" => 24376,
		"work_status" => "Non European National"
	],
	[
		"id" => 7191,
		"user_id" => 9874,
		"work_status" => "0"
	],
	[
		"id" => 13805,
		"user_id" => 17609,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14486,
		"user_id" => 18290,
		"work_status" => "European National"
	],
	[
		"id" => 13408,
		"user_id" => 17212,
		"work_status" => "Non European National"
	],
	[
		"id" => 23189,
		"user_id" => 28715,
		"work_status" => "European National"
	],
	[
		"id" => 19677,
		"user_id" => 24224,
		"work_status" => "European National"
	],
	[
		"id" => 7199,
		"user_id" => 9881,
		"work_status" => "Non European National"
	],
	[
		"id" => 7200,
		"user_id" => 9883,
		"work_status" => "0"
	],
	[
		"id" => 22769,
		"user_id" => 28295,
		"work_status" => "European National"
	],
	[
		"id" => 7202,
		"user_id" => 9884,
		"work_status" => "0"
	],
	[
		"id" => 20159,
		"user_id" => 24863,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7205,
		"user_id" => 9887,
		"work_status" => "European National"
	],
	[
		"id" => 7207,
		"user_id" => 9888,
		"work_status" => "0"
	],
	[
		"id" => 7210,
		"user_id" => 9891,
		"work_status" => "0"
	],
	[
		"id" => 7211,
		"user_id" => 9890,
		"work_status" => "Non European National"
	],
	[
		"id" => 7212,
		"user_id" => 9892,
		"work_status" => "European National"
	],
	[
		"id" => 7214,
		"user_id" => 9893,
		"work_status" => "0"
	],
	[
		"id" => 7216,
		"user_id" => 9894,
		"work_status" => "0"
	],
	[
		"id" => 20216,
		"user_id" => 24940,
		"work_status" => "European National"
	],
	[
		"id" => 7218,
		"user_id" => 9895,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13628,
		"user_id" => 17432,
		"work_status" => "Non European National"
	],
	[
		"id" => 7220,
		"user_id" => 9898,
		"work_status" => "European National"
	],
	[
		"id" => 7221,
		"user_id" => 9899,
		"work_status" => "0"
	],
	[
		"id" => 13744,
		"user_id" => 17548,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19561,
		"user_id" => 24108,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7224,
		"user_id" => 9902,
		"work_status" => "0"
	],
	[
		"id" => 7227,
		"user_id" => 9506,
		"work_status" => "European National"
	],
	[
		"id" => 22874,
		"user_id" => 28400,
		"work_status" => "Non European National"
	],
	[
		"id" => 7229,
		"user_id" => 9904,
		"work_status" => "0"
	],
	[
		"id" => 7230,
		"user_id" => 9905,
		"work_status" => "European National"
	],
	[
		"id" => 7231,
		"user_id" => 9906,
		"work_status" => "0"
	],
	[
		"id" => 23579,
		"user_id" => 29143,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15167,
		"user_id" => 18971,
		"work_status" => "European National"
	],
	[
		"id" => 7233,
		"user_id" => 8943,
		"work_status" => "0"
	],
	[
		"id" => 13752,
		"user_id" => 17556,
		"work_status" => "Non European National"
	],
	[
		"id" => 7235,
		"user_id" => 9908,
		"work_status" => "0"
	],
	[
		"id" => 7236,
		"user_id" => 9910,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7238,
		"user_id" => 9912,
		"work_status" => "Non European National"
	],
	[
		"id" => 7239,
		"user_id" => 9916,
		"work_status" => "0"
	],
	[
		"id" => 7241,
		"user_id" => 9918,
		"work_status" => "European National"
	],
	[
		"id" => 13889,
		"user_id" => 17693,
		"work_status" => "Non European National"
	],
	[
		"id" => 13489,
		"user_id" => 17293,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7245,
		"user_id" => 9921,
		"work_status" => "Non European National"
	],
	[
		"id" => 7246,
		"user_id" => 9433,
		"work_status" => "0"
	],
	[
		"id" => 7247,
		"user_id" => 9923,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22464,
		"user_id" => 27990,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20086,
		"user_id" => 24728,
		"work_status" => "Non European National"
	],
	[
		"id" => 14708,
		"user_id" => 18512,
		"work_status" => "Non European National"
	],
	[
		"id" => 7252,
		"user_id" => 9927,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7253,
		"user_id" => 8945,
		"work_status" => "0"
	],
	[
		"id" => 7254,
		"user_id" => 9929,
		"work_status" => "0"
	],
	[
		"id" => 7256,
		"user_id" => 9931,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14827,
		"user_id" => 18631,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7258,
		"user_id" => 9935,
		"work_status" => "0"
	],
	[
		"id" => 7259,
		"user_id" => 9936,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7260,
		"user_id" => 9567,
		"work_status" => "Non European National"
	],
	[
		"id" => 23836,
		"user_id" => 29400,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16738,
		"user_id" => 21220,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7266,
		"user_id" => 9945,
		"work_status" => "0"
	],
	[
		"id" => 7267,
		"user_id" => 9946,
		"work_status" => "Non European National"
	],
	[
		"id" => 19428,
		"user_id" => 23975,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7269,
		"user_id" => 9949,
		"work_status" => "0"
	],
	[
		"id" => 19303,
		"user_id" => 23850,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13615,
		"user_id" => 17419,
		"work_status" => "Non European National"
	],
	[
		"id" => 7273,
		"user_id" => 9953,
		"work_status" => "European National"
	],
	[
		"id" => 7274,
		"user_id" => 9954,
		"work_status" => "Non European National"
	],
	[
		"id" => 7276,
		"user_id" => 9958,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7277,
		"user_id" => 9957,
		"work_status" => "0"
	],
	[
		"id" => 15403,
		"user_id" => 19207,
		"work_status" => "European National"
	],
	[
		"id" => 7279,
		"user_id" => 9960,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14749,
		"user_id" => 18553,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7281,
		"user_id" => 9964,
		"work_status" => "Non European National"
	],
	[
		"id" => 7282,
		"user_id" => 9965,
		"work_status" => "Non European National"
	],
	[
		"id" => 7283,
		"user_id" => 9963,
		"work_status" => "Non European National"
	],
	[
		"id" => 7284,
		"user_id" => 9968,
		"work_status" => "Non European National"
	],
	[
		"id" => 13809,
		"user_id" => 17613,
		"work_status" => "Non European National"
	],
	[
		"id" => 23536,
		"user_id" => 29100,
		"work_status" => "European National"
	],
	[
		"id" => 7287,
		"user_id" => 9973,
		"work_status" => "Non European National"
	],
	[
		"id" => 13648,
		"user_id" => 17452,
		"work_status" => "European National"
	],
	[
		"id" => 7290,
		"user_id" => 9975,
		"work_status" => "European National"
	],
	[
		"id" => 24796,
		"user_id" => 30360,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7292,
		"user_id" => 9850,
		"work_status" => "Non European National"
	],
	[
		"id" => 7294,
		"user_id" => 9982,
		"work_status" => "Non European National"
	],
	[
		"id" => 7296,
		"user_id" => 9983,
		"work_status" => "0"
	],
	[
		"id" => 7297,
		"user_id" => 9985,
		"work_status" => "0"
	],
	[
		"id" => 7298,
		"user_id" => 9987,
		"work_status" => "0"
	],
	[
		"id" => 7299,
		"user_id" => 9988,
		"work_status" => "0"
	],
	[
		"id" => 13207,
		"user_id" => 17011,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7301,
		"user_id" => 9990,
		"work_status" => "Non European National"
	],
	[
		"id" => 7302,
		"user_id" => 9742,
		"work_status" => "European National"
	],
	[
		"id" => 7303,
		"user_id" => 9991,
		"work_status" => "0"
	],
	[
		"id" => 7304,
		"user_id" => 9976,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7305,
		"user_id" => 9992,
		"work_status" => "Non European National"
	],
	[
		"id" => 7306,
		"user_id" => 9994,
		"work_status" => "0"
	],
	[
		"id" => 7308,
		"user_id" => 9993,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7309,
		"user_id" => 9995,
		"work_status" => "0"
	],
	[
		"id" => 7311,
		"user_id" => 9997,
		"work_status" => "Non European National"
	],
	[
		"id" => 7312,
		"user_id" => 9998,
		"work_status" => "Non European National"
	],
	[
		"id" => 7313,
		"user_id" => 9999,
		"work_status" => "Non European National"
	],
	[
		"id" => 7804,
		"user_id" => 10763,
		"work_status" => "0"
	],
	[
		"id" => 7805,
		"user_id" => 10766,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14094,
		"user_id" => 17898,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18924,
		"user_id" => 23471,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7321,
		"user_id" => 10010,
		"work_status" => "0"
	],
	[
		"id" => 13944,
		"user_id" => 17748,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13198,
		"user_id" => 17002,
		"work_status" => "Non European National"
	],
	[
		"id" => 7324,
		"user_id" => 10020,
		"work_status" => "European National"
	],
	[
		"id" => 7325,
		"user_id" => 10021,
		"work_status" => "0"
	],
	[
		"id" => 7326,
		"user_id" => 10022,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13838,
		"user_id" => 17642,
		"work_status" => "Non European National"
	],
	[
		"id" => 7330,
		"user_id" => 10026,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19852,
		"user_id" => 24399,
		"work_status" => "European National"
	],
	[
		"id" => 7332,
		"user_id" => 10029,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7333,
		"user_id" => 10030,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7334,
		"user_id" => 10035,
		"work_status" => "0"
	],
	[
		"id" => 15150,
		"user_id" => 18954,
		"work_status" => "European National"
	],
	[
		"id" => 7336,
		"user_id" => 10031,
		"work_status" => "0"
	],
	[
		"id" => 7339,
		"user_id" => 10038,
		"work_status" => "0"
	],
	[
		"id" => 14063,
		"user_id" => 17867,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7342,
		"user_id" => 10040,
		"work_status" => "European National"
	],
	[
		"id" => 7343,
		"user_id" => 10042,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13635,
		"user_id" => 17439,
		"work_status" => "European National"
	],
	[
		"id" => 7346,
		"user_id" => 10047,
		"work_status" => "Non European National"
	],
	[
		"id" => 7347,
		"user_id" => 10049,
		"work_status" => "Non European National"
	],
	[
		"id" => 7349,
		"user_id" => 10051,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14945,
		"user_id" => 18749,
		"work_status" => "European National"
	],
	[
		"id" => 7352,
		"user_id" => 10057,
		"work_status" => "Non European National"
	],
	[
		"id" => 20127,
		"user_id" => 24797,
		"work_status" => "0"
	],
	[
		"id" => 20128,
		"user_id" => 24798,
		"work_status" => "Non European National"
	],
	[
		"id" => 8666,
		"user_id" => 11992,
		"work_status" => "0"
	],
	[
		"id" => 7355,
		"user_id" => 9581,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7356,
		"user_id" => 9911,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7357,
		"user_id" => 10064,
		"work_status" => "European National"
	],
	[
		"id" => 13917,
		"user_id" => 17721,
		"work_status" => "European National"
	],
	[
		"id" => 13880,
		"user_id" => 17684,
		"work_status" => "European National"
	],
	[
		"id" => 7362,
		"user_id" => 10068,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7365,
		"user_id" => 10017,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7366,
		"user_id" => 10070,
		"work_status" => "European National"
	],
	[
		"id" => 7367,
		"user_id" => 10071,
		"work_status" => "European National"
	],
	[
		"id" => 7368,
		"user_id" => 10073,
		"work_status" => "European National"
	],
	[
		"id" => 7369,
		"user_id" => 10074,
		"work_status" => "Non European National"
	],
	[
		"id" => 7370,
		"user_id" => 10075,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19560,
		"user_id" => 24107,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14106,
		"user_id" => 17910,
		"work_status" => "Non European National"
	],
	[
		"id" => 19486,
		"user_id" => 24033,
		"work_status" => "European National"
	],
	[
		"id" => 7373,
		"user_id" => 10081,
		"work_status" => "0"
	],
	[
		"id" => 7374,
		"user_id" => 9589,
		"work_status" => "European National"
	],
	[
		"id" => 7375,
		"user_id" => 10082,
		"work_status" => "Non European National"
	],
	[
		"id" => 14626,
		"user_id" => 18430,
		"work_status" => "Non European National"
	],
	[
		"id" => 7377,
		"user_id" => 10083,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7378,
		"user_id" => 10085,
		"work_status" => "Non European National"
	],
	[
		"id" => 14463,
		"user_id" => 18267,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7379,
		"user_id" => 10086,
		"work_status" => "Non European National"
	],
	[
		"id" => 14277,
		"user_id" => 18081,
		"work_status" => "Non European National"
	],
	[
		"id" => 7381,
		"user_id" => 10088,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14058,
		"user_id" => 17862,
		"work_status" => "European National"
	],
	[
		"id" => 7383,
		"user_id" => 10090,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19675,
		"user_id" => 24222,
		"work_status" => "European National"
	],
	[
		"id" => 7384,
		"user_id" => 10094,
		"work_status" => "0"
	],
	[
		"id" => 7385,
		"user_id" => 10096,
		"work_status" => "0"
	],
	[
		"id" => 7386,
		"user_id" => 10098,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7387,
		"user_id" => 10100,
		"work_status" => "0"
	],
	[
		"id" => 13186,
		"user_id" => 16990,
		"work_status" => "Non European National"
	],
	[
		"id" => 7390,
		"user_id" => 10102,
		"work_status" => "European National"
	],
	[
		"id" => 7391,
		"user_id" => 10103,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15112,
		"user_id" => 18916,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7393,
		"user_id" => 10105,
		"work_status" => "Non European National"
	],
	[
		"id" => 7395,
		"user_id" => 10108,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24486,
		"user_id" => 30050,
		"work_status" => "Non European National"
	],
	[
		"id" => 22164,
		"user_id" => 27690,
		"work_status" => "Non European National"
	],
	[
		"id" => 7398,
		"user_id" => 10112,
		"work_status" => "0"
	],
	[
		"id" => 13338,
		"user_id" => 17142,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19204,
		"user_id" => 23751,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13853,
		"user_id" => 17657,
		"work_status" => "European National"
	],
	[
		"id" => 7403,
		"user_id" => 10119,
		"work_status" => "0"
	],
	[
		"id" => 22043,
		"user_id" => 27569,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14726,
		"user_id" => 18530,
		"work_status" => "European National"
	],
	[
		"id" => 7406,
		"user_id" => 10124,
		"work_status" => "European National"
	],
	[
		"id" => 7408,
		"user_id" => 10127,
		"work_status" => "0"
	],
	[
		"id" => 18964,
		"user_id" => 23511,
		"work_status" => "European National"
	],
	[
		"id" => 7411,
		"user_id" => 10132,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7414,
		"user_id" => 10141,
		"work_status" => "0"
	],
	[
		"id" => 7416,
		"user_id" => 10144,
		"work_status" => "Non European National"
	],
	[
		"id" => 7418,
		"user_id" => 10148,
		"work_status" => "European National"
	],
	[
		"id" => 7419,
		"user_id" => 10149,
		"work_status" => "European National"
	],
	[
		"id" => 7420,
		"user_id" => 10150,
		"work_status" => "European National"
	],
	[
		"id" => 13578,
		"user_id" => 17382,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7422,
		"user_id" => 10152,
		"work_status" => "0"
	],
	[
		"id" => 7424,
		"user_id" => 10154,
		"work_status" => "Non European National"
	],
	[
		"id" => 7426,
		"user_id" => 10157,
		"work_status" => "European National"
	],
	[
		"id" => 19468,
		"user_id" => 24015,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7427,
		"user_id" => 10158,
		"work_status" => "0"
	],
	[
		"id" => 7428,
		"user_id" => 10159,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7429,
		"user_id" => 10161,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7430,
		"user_id" => 10162,
		"work_status" => "0"
	],
	[
		"id" => 7431,
		"user_id" => 10164,
		"work_status" => "0"
	],
	[
		"id" => 14634,
		"user_id" => 18438,
		"work_status" => "European National"
	],
	[
		"id" => 14633,
		"user_id" => 18437,
		"work_status" => "European National"
	],
	[
		"id" => 7434,
		"user_id" => 10171,
		"work_status" => "0"
	],
	[
		"id" => 14484,
		"user_id" => 18288,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7436,
		"user_id" => 10174,
		"work_status" => "Non European National"
	],
	[
		"id" => 23760,
		"user_id" => 29324,
		"work_status" => "Non European National"
	],
	[
		"id" => 7438,
		"user_id" => 10172,
		"work_status" => "Non European National"
	],
	[
		"id" => 14096,
		"user_id" => 17900,
		"work_status" => "Non European National"
	],
	[
		"id" => 7441,
		"user_id" => 10180,
		"work_status" => "0"
	],
	[
		"id" => 7442,
		"user_id" => 10181,
		"work_status" => "0"
	],
	[
		"id" => 20203,
		"user_id" => 24919,
		"work_status" => "Non European National"
	],
	[
		"id" => 20204,
		"user_id" => 24920,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7444,
		"user_id" => 10184,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7445,
		"user_id" => 10186,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7446,
		"user_id" => 10190,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7447,
		"user_id" => 10193,
		"work_status" => "Non European National"
	],
	[
		"id" => 7448,
		"user_id" => 10194,
		"work_status" => "Non European National"
	],
	[
		"id" => 7450,
		"user_id" => 10197,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7451,
		"user_id" => 10226,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15243,
		"user_id" => 19047,
		"work_status" => "Non European National"
	],
	[
		"id" => 14530,
		"user_id" => 18334,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13245,
		"user_id" => 17049,
		"work_status" => "European National"
	],
	[
		"id" => 7455,
		"user_id" => 10232,
		"work_status" => "0"
	],
	[
		"id" => 13769,
		"user_id" => 17573,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7457,
		"user_id" => 10239,
		"work_status" => "0"
	],
	[
		"id" => 7458,
		"user_id" => 10242,
		"work_status" => "0"
	],
	[
		"id" => 7459,
		"user_id" => 10240,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7461,
		"user_id" => 10245,
		"work_status" => "0"
	],
	[
		"id" => 7462,
		"user_id" => 10248,
		"work_status" => "0"
	],
	[
		"id" => 7463,
		"user_id" => 10250,
		"work_status" => "0"
	],
	[
		"id" => 20124,
		"user_id" => 24794,
		"work_status" => "European National"
	],
	[
		"id" => 7465,
		"user_id" => 10257,
		"work_status" => "0"
	],
	[
		"id" => 18770,
		"user_id" => 23317,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7467,
		"user_id" => 10258,
		"work_status" => "Non European National"
	],
	[
		"id" => 7469,
		"user_id" => 10260,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7471,
		"user_id" => 10130,
		"work_status" => "0"
	],
	[
		"id" => 7473,
		"user_id" => 10265,
		"work_status" => "0"
	],
	[
		"id" => 7474,
		"user_id" => 10269,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7475,
		"user_id" => 10270,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7476,
		"user_id" => 10256,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7477,
		"user_id" => 10272,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7478,
		"user_id" => 10274,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7479,
		"user_id" => 10276,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7480,
		"user_id" => 10279,
		"work_status" => "0"
	],
	[
		"id" => 14664,
		"user_id" => 18468,
		"work_status" => "European National"
	],
	[
		"id" => 24723,
		"user_id" => 30287,
		"work_status" => "Non European National"
	],
	[
		"id" => 7484,
		"user_id" => 10280,
		"work_status" => "Non European National"
	],
	[
		"id" => 13280,
		"user_id" => 17084,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7486,
		"user_id" => 10285,
		"work_status" => "0"
	],
	[
		"id" => 7487,
		"user_id" => 10289,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8916,
		"user_id" => 12399,
		"work_status" => "Non European National"
	],
	[
		"id" => 7489,
		"user_id" => 10292,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13541,
		"user_id" => 17345,
		"work_status" => "European National"
	],
	[
		"id" => 24775,
		"user_id" => 30339,
		"work_status" => "European National"
	],
	[
		"id" => 7497,
		"user_id" => 10307,
		"work_status" => "European National"
	],
	[
		"id" => 19882,
		"user_id" => 24429,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7495,
		"user_id" => 10293,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7496,
		"user_id" => 10305,
		"work_status" => "0"
	],
	[
		"id" => 7498,
		"user_id" => 10264,
		"work_status" => "0"
	],
	[
		"id" => 7499,
		"user_id" => 10309,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7500,
		"user_id" => 10312,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23496,
		"user_id" => 29060,
		"work_status" => "Non European National"
	],
	[
		"id" => 7503,
		"user_id" => 10314,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7505,
		"user_id" => 10319,
		"work_status" => "0"
	],
	[
		"id" => 7506,
		"user_id" => 10317,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7507,
		"user_id" => 10322,
		"work_status" => "0"
	],
	[
		"id" => 13684,
		"user_id" => 17488,
		"work_status" => "Non European National"
	],
	[
		"id" => 7510,
		"user_id" => 10323,
		"work_status" => "0"
	],
	[
		"id" => 7511,
		"user_id" => 10320,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7512,
		"user_id" => 10327,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14349,
		"user_id" => 18153,
		"work_status" => "Non European National"
	],
	[
		"id" => 7514,
		"user_id" => 10332,
		"work_status" => "Non European National"
	],
	[
		"id" => 7515,
		"user_id" => 10335,
		"work_status" => "0"
	],
	[
		"id" => 15009,
		"user_id" => 18813,
		"work_status" => "European National"
	],
	[
		"id" => 7518,
		"user_id" => 10341,
		"work_status" => "European National"
	],
	[
		"id" => 14138,
		"user_id" => 17942,
		"work_status" => "European National"
	],
	[
		"id" => 14483,
		"user_id" => 18287,
		"work_status" => "European National"
	],
	[
		"id" => 7522,
		"user_id" => 10347,
		"work_status" => "European National"
	],
	[
		"id" => 7523,
		"user_id" => 10346,
		"work_status" => "0"
	],
	[
		"id" => 14998,
		"user_id" => 18802,
		"work_status" => "Non European National"
	],
	[
		"id" => 14938,
		"user_id" => 18742,
		"work_status" => "European National"
	],
	[
		"id" => 14124,
		"user_id" => 17928,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7528,
		"user_id" => 10356,
		"work_status" => "0"
	],
	[
		"id" => 7529,
		"user_id" => 10355,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7530,
		"user_id" => 10359,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7531,
		"user_id" => 10358,
		"work_status" => "European National"
	],
	[
		"id" => 7532,
		"user_id" => 10361,
		"work_status" => "Non European National"
	],
	[
		"id" => 7534,
		"user_id" => 10369,
		"work_status" => "European National"
	],
	[
		"id" => 24903,
		"user_id" => 30467,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7537,
		"user_id" => 10375,
		"work_status" => "Non European National"
	],
	[
		"id" => 7538,
		"user_id" => 10376,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7539,
		"user_id" => 10377,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7540,
		"user_id" => 10353,
		"work_status" => "0"
	],
	[
		"id" => 26427,
		"user_id" => 32815,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7542,
		"user_id" => 10382,
		"work_status" => "0"
	],
	[
		"id" => 13260,
		"user_id" => 17064,
		"work_status" => "Non European National"
	],
	[
		"id" => 7545,
		"user_id" => 10388,
		"work_status" => "0"
	],
	[
		"id" => 7546,
		"user_id" => 10389,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14073,
		"user_id" => 17877,
		"work_status" => "European National"
	],
	[
		"id" => 7549,
		"user_id" => 10393,
		"work_status" => "0"
	],
	[
		"id" => 7550,
		"user_id" => 10394,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7551,
		"user_id" => 10396,
		"work_status" => "European National"
	],
	[
		"id" => 15020,
		"user_id" => 18824,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13976,
		"user_id" => 17780,
		"work_status" => "Non European National"
	],
	[
		"id" => 7555,
		"user_id" => 10401,
		"work_status" => "0"
	],
	[
		"id" => 14844,
		"user_id" => 18648,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19732,
		"user_id" => 24279,
		"work_status" => "Non European National"
	],
	[
		"id" => 7558,
		"user_id" => 10406,
		"work_status" => "European National"
	],
	[
		"id" => 7559,
		"user_id" => 10408,
		"work_status" => "Non European National"
	],
	[
		"id" => 7560,
		"user_id" => 10409,
		"work_status" => "European National"
	],
	[
		"id" => 19682,
		"user_id" => 24229,
		"work_status" => "Non European National"
	],
	[
		"id" => 7562,
		"user_id" => 10417,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7564,
		"user_id" => 10420,
		"work_status" => "European National"
	],
	[
		"id" => 13494,
		"user_id" => 17298,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19387,
		"user_id" => 23934,
		"work_status" => "European National"
	],
	[
		"id" => 7568,
		"user_id" => 10425,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19108,
		"user_id" => 23655,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7571,
		"user_id" => 10430,
		"work_status" => "Non European National"
	],
	[
		"id" => 7573,
		"user_id" => 10426,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7575,
		"user_id" => 10435,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19663,
		"user_id" => 24210,
		"work_status" => "Non European National"
	],
	[
		"id" => 19147,
		"user_id" => 23694,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7578,
		"user_id" => 10440,
		"work_status" => "European National"
	],
	[
		"id" => 7579,
		"user_id" => 10018,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7580,
		"user_id" => 10441,
		"work_status" => "0"
	],
	[
		"id" => 13391,
		"user_id" => 17195,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19466,
		"user_id" => 24013,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7583,
		"user_id" => 10446,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7585,
		"user_id" => 10450,
		"work_status" => "European National"
	],
	[
		"id" => 13312,
		"user_id" => 17116,
		"work_status" => "Non European National"
	],
	[
		"id" => 7588,
		"user_id" => 9940,
		"work_status" => "0"
	],
	[
		"id" => 7589,
		"user_id" => 10453,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14820,
		"user_id" => 18624,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19728,
		"user_id" => 24275,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7592,
		"user_id" => 10459,
		"work_status" => "European National"
	],
	[
		"id" => 7593,
		"user_id" => 10458,
		"work_status" => "European National"
	],
	[
		"id" => 7594,
		"user_id" => 10462,
		"work_status" => "European National"
	],
	[
		"id" => 7595,
		"user_id" => 9173,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7596,
		"user_id" => 10464,
		"work_status" => "Non European National"
	],
	[
		"id" => 7597,
		"user_id" => 10469,
		"work_status" => "0"
	],
	[
		"id" => 7598,
		"user_id" => 10470,
		"work_status" => "Non European National"
	],
	[
		"id" => 24482,
		"user_id" => 30046,
		"work_status" => "Non European National"
	],
	[
		"id" => 7600,
		"user_id" => 10473,
		"work_status" => "Non European National"
	],
	[
		"id" => 7601,
		"user_id" => 10475,
		"work_status" => "Non European National"
	],
	[
		"id" => 7602,
		"user_id" => 10477,
		"work_status" => "European National"
	],
	[
		"id" => 7603,
		"user_id" => 10478,
		"work_status" => "European National"
	],
	[
		"id" => 7604,
		"user_id" => 10479,
		"work_status" => "Non European National"
	],
	[
		"id" => 13888,
		"user_id" => 17692,
		"work_status" => "Non European National"
	],
	[
		"id" => 22148,
		"user_id" => 27674,
		"work_status" => "Non European National"
	],
	[
		"id" => 7607,
		"user_id" => 10484,
		"work_status" => "Non European National"
	],
	[
		"id" => 7608,
		"user_id" => 10485,
		"work_status" => "Non European National"
	],
	[
		"id" => 7609,
		"user_id" => 10486,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7610,
		"user_id" => 9545,
		"work_status" => "0"
	],
	[
		"id" => 7611,
		"user_id" => 10488,
		"work_status" => "European National"
	],
	[
		"id" => 7612,
		"user_id" => 10489,
		"work_status" => "0"
	],
	[
		"id" => 13876,
		"user_id" => 17680,
		"work_status" => "Non European National"
	],
	[
		"id" => 7614,
		"user_id" => 10492,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15004,
		"user_id" => 18808,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14166,
		"user_id" => 17970,
		"work_status" => "Non European National"
	],
	[
		"id" => 7617,
		"user_id" => 10495,
		"work_status" => "European National"
	],
	[
		"id" => 7619,
		"user_id" => 10498,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14199,
		"user_id" => 18003,
		"work_status" => "Non European National"
	],
	[
		"id" => 14714,
		"user_id" => 18518,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19385,
		"user_id" => 23932,
		"work_status" => "Non European National"
	],
	[
		"id" => 14959,
		"user_id" => 18763,
		"work_status" => "European National"
	],
	[
		"id" => 13607,
		"user_id" => 17411,
		"work_status" => "European National"
	],
	[
		"id" => 14722,
		"user_id" => 18526,
		"work_status" => "European National"
	],
	[
		"id" => 7944,
		"user_id" => 10969,
		"work_status" => "Non European National"
	],
	[
		"id" => 15097,
		"user_id" => 18901,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13595,
		"user_id" => 17399,
		"work_status" => "European National"
	],
	[
		"id" => 7630,
		"user_id" => 10517,
		"work_status" => "0"
	],
	[
		"id" => 7632,
		"user_id" => 10518,
		"work_status" => "Non European National"
	],
	[
		"id" => 7633,
		"user_id" => 10519,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13267,
		"user_id" => 17071,
		"work_status" => "European National"
	],
	[
		"id" => 13954,
		"user_id" => 17758,
		"work_status" => "Non European National"
	],
	[
		"id" => 7637,
		"user_id" => 10525,
		"work_status" => "0"
	],
	[
		"id" => 13318,
		"user_id" => 17122,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19532,
		"user_id" => 24079,
		"work_status" => "European National"
	],
	[
		"id" => 7639,
		"user_id" => 10528,
		"work_status" => "0"
	],
	[
		"id" => 13821,
		"user_id" => 17625,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7641,
		"user_id" => 10530,
		"work_status" => "0"
	],
	[
		"id" => 7642,
		"user_id" => 10533,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7643,
		"user_id" => 10531,
		"work_status" => "European National"
	],
	[
		"id" => 7644,
		"user_id" => 10535,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7646,
		"user_id" => 10537,
		"work_status" => "0"
	],
	[
		"id" => 7647,
		"user_id" => 10536,
		"work_status" => "0"
	],
	[
		"id" => 7648,
		"user_id" => 10538,
		"work_status" => "0"
	],
	[
		"id" => 7649,
		"user_id" => 10539,
		"work_status" => "0"
	],
	[
		"id" => 14873,
		"user_id" => 18677,
		"work_status" => "European National"
	],
	[
		"id" => 7651,
		"user_id" => 10544,
		"work_status" => "0"
	],
	[
		"id" => 19480,
		"user_id" => 24027,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7653,
		"user_id" => 10540,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13224,
		"user_id" => 17028,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14290,
		"user_id" => 18094,
		"work_status" => "European National"
	],
	[
		"id" => 14822,
		"user_id" => 18626,
		"work_status" => "European National"
	],
	[
		"id" => 7657,
		"user_id" => 10550,
		"work_status" => "0"
	],
	[
		"id" => 7658,
		"user_id" => 10552,
		"work_status" => "European National"
	],
	[
		"id" => 7659,
		"user_id" => 10551,
		"work_status" => "0"
	],
	[
		"id" => 7660,
		"user_id" => 10553,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7662,
		"user_id" => 10556,
		"work_status" => "0"
	],
	[
		"id" => 7664,
		"user_id" => 10561,
		"work_status" => "0"
	],
	[
		"id" => 14709,
		"user_id" => 18513,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7667,
		"user_id" => 10577,
		"work_status" => "Non European National"
	],
	[
		"id" => 8665,
		"user_id" => 11991,
		"work_status" => "0"
	],
	[
		"id" => 7669,
		"user_id" => 10581,
		"work_status" => "0"
	],
	[
		"id" => 15247,
		"user_id" => 19051,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7671,
		"user_id" => 10582,
		"work_status" => "0"
	],
	[
		"id" => 7672,
		"user_id" => 10574,
		"work_status" => "0"
	],
	[
		"id" => 7673,
		"user_id" => 10583,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13522,
		"user_id" => 17326,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14903,
		"user_id" => 18707,
		"work_status" => "Non European National"
	],
	[
		"id" => 7677,
		"user_id" => 10586,
		"work_status" => "0"
	],
	[
		"id" => 7678,
		"user_id" => 10589,
		"work_status" => "0"
	],
	[
		"id" => 7679,
		"user_id" => 10590,
		"work_status" => "European National"
	],
	[
		"id" => 7680,
		"user_id" => 10591,
		"work_status" => "Non European National"
	],
	[
		"id" => 7682,
		"user_id" => 10593,
		"work_status" => "European National"
	],
	[
		"id" => 24393,
		"user_id" => 29957,
		"work_status" => "Non European National"
	],
	[
		"id" => 13966,
		"user_id" => 17770,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7686,
		"user_id" => 10599,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13362,
		"user_id" => 17166,
		"work_status" => "European National"
	],
	[
		"id" => 19733,
		"user_id" => 24280,
		"work_status" => "Non European National"
	],
	[
		"id" => 7689,
		"user_id" => 10571,
		"work_status" => "0"
	],
	[
		"id" => 14656,
		"user_id" => 18460,
		"work_status" => "European National"
	],
	[
		"id" => 7691,
		"user_id" => 10607,
		"work_status" => "0"
	],
	[
		"id" => 15173,
		"user_id" => 18977,
		"work_status" => "European National"
	],
	[
		"id" => 7693,
		"user_id" => 10611,
		"work_status" => "0"
	],
	[
		"id" => 7694,
		"user_id" => 10612,
		"work_status" => "0"
	],
	[
		"id" => 7695,
		"user_id" => 10613,
		"work_status" => "European National"
	],
	[
		"id" => 7696,
		"user_id" => 10615,
		"work_status" => "0"
	],
	[
		"id" => 7697,
		"user_id" => 10617,
		"work_status" => "0"
	],
	[
		"id" => 13472,
		"user_id" => 17276,
		"work_status" => "European National"
	],
	[
		"id" => 19744,
		"user_id" => 24291,
		"work_status" => "Non European National"
	],
	[
		"id" => 7700,
		"user_id" => 10619,
		"work_status" => "0"
	],
	[
		"id" => 14433,
		"user_id" => 18237,
		"work_status" => "European National"
	],
	[
		"id" => 13543,
		"user_id" => 17347,
		"work_status" => "European National"
	],
	[
		"id" => 7703,
		"user_id" => 10623,
		"work_status" => "Non European National"
	],
	[
		"id" => 13906,
		"user_id" => 17710,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7705,
		"user_id" => 10626,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14957,
		"user_id" => 18761,
		"work_status" => "European National"
	],
	[
		"id" => 7707,
		"user_id" => 10627,
		"work_status" => "0"
	],
	[
		"id" => 23621,
		"user_id" => 29185,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19582,
		"user_id" => 24129,
		"work_status" => "European National"
	],
	[
		"id" => 15386,
		"user_id" => 19190,
		"work_status" => "European National"
	],
	[
		"id" => 7711,
		"user_id" => 10632,
		"work_status" => "0"
	],
	[
		"id" => 7712,
		"user_id" => 10546,
		"work_status" => "Non European National"
	],
	[
		"id" => 7714,
		"user_id" => 10634,
		"work_status" => "0"
	],
	[
		"id" => 14467,
		"user_id" => 18271,
		"work_status" => "European National"
	],
	[
		"id" => 7717,
		"user_id" => 10637,
		"work_status" => "Non European National"
	],
	[
		"id" => 14367,
		"user_id" => 18171,
		"work_status" => "Non European National"
	],
	[
		"id" => 7719,
		"user_id" => 10640,
		"work_status" => "0"
	],
	[
		"id" => 7720,
		"user_id" => 10641,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13304,
		"user_id" => 17108,
		"work_status" => "Non European National"
	],
	[
		"id" => 7722,
		"user_id" => 10644,
		"work_status" => "0"
	],
	[
		"id" => 7724,
		"user_id" => 10647,
		"work_status" => "Non European National"
	],
	[
		"id" => 7725,
		"user_id" => 10648,
		"work_status" => "European National"
	],
	[
		"id" => 14030,
		"user_id" => 17834,
		"work_status" => "Non European National"
	],
	[
		"id" => 7727,
		"user_id" => 10651,
		"work_status" => "0"
	],
	[
		"id" => 7728,
		"user_id" => 10653,
		"work_status" => "Non European National"
	],
	[
		"id" => 7729,
		"user_id" => 10188,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15146,
		"user_id" => 18950,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7731,
		"user_id" => 10655,
		"work_status" => "0"
	],
	[
		"id" => 7732,
		"user_id" => 10656,
		"work_status" => "0"
	],
	[
		"id" => 7735,
		"user_id" => 10662,
		"work_status" => "0"
	],
	[
		"id" => 19246,
		"user_id" => 23793,
		"work_status" => "European National"
	],
	[
		"id" => 23546,
		"user_id" => 29110,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7738,
		"user_id" => 10665,
		"work_status" => "European National"
	],
	[
		"id" => 7739,
		"user_id" => 10666,
		"work_status" => "0"
	],
	[
		"id" => 19046,
		"user_id" => 23593,
		"work_status" => "Non European National"
	],
	[
		"id" => 7742,
		"user_id" => 10672,
		"work_status" => "European National"
	],
	[
		"id" => 14796,
		"user_id" => 18600,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7744,
		"user_id" => 10677,
		"work_status" => "0"
	],
	[
		"id" => 7745,
		"user_id" => 10678,
		"work_status" => "Non European National"
	],
	[
		"id" => 18902,
		"user_id" => 23449,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25800,
		"user_id" => 31919,
		"work_status" => "Non European National"
	],
	[
		"id" => 7749,
		"user_id" => 10682,
		"work_status" => "0"
	],
	[
		"id" => 7750,
		"user_id" => 10683,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7751,
		"user_id" => 10687,
		"work_status" => "0"
	],
	[
		"id" => 7752,
		"user_id" => 10690,
		"work_status" => "0"
	],
	[
		"id" => 14017,
		"user_id" => 17821,
		"work_status" => "Non European National"
	],
	[
		"id" => 14376,
		"user_id" => 18180,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7755,
		"user_id" => 10692,
		"work_status" => "0"
	],
	[
		"id" => 7756,
		"user_id" => 10694,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7757,
		"user_id" => 10696,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7758,
		"user_id" => 10699,
		"work_status" => "0"
	],
	[
		"id" => 13608,
		"user_id" => 17412,
		"work_status" => "Non European National"
	],
	[
		"id" => 14697,
		"user_id" => 18501,
		"work_status" => "Non European National"
	],
	[
		"id" => 7761,
		"user_id" => 10705,
		"work_status" => "0"
	],
	[
		"id" => 12698,
		"user_id" => 16119,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14160,
		"user_id" => 17964,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7764,
		"user_id" => 10708,
		"work_status" => "Non European National"
	],
	[
		"id" => 7765,
		"user_id" => 10710,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14287,
		"user_id" => 18091,
		"work_status" => "Non European National"
	],
	[
		"id" => 7768,
		"user_id" => 10712,
		"work_status" => "European National"
	],
	[
		"id" => 7769,
		"user_id" => 10714,
		"work_status" => "0"
	],
	[
		"id" => 15391,
		"user_id" => 19195,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18830,
		"user_id" => 23377,
		"work_status" => "European National"
	],
	[
		"id" => 13583,
		"user_id" => 17387,
		"work_status" => "European National"
	],
	[
		"id" => 7773,
		"user_id" => 10715,
		"work_status" => "European National"
	],
	[
		"id" => 19384,
		"user_id" => 23931,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7775,
		"user_id" => 10721,
		"work_status" => "Non European National"
	],
	[
		"id" => 7776,
		"user_id" => 10724,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7778,
		"user_id" => 10726,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7779,
		"user_id" => 10728,
		"work_status" => "0"
	],
	[
		"id" => 13716,
		"user_id" => 17520,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7781,
		"user_id" => 10731,
		"work_status" => "Non European National"
	],
	[
		"id" => 7782,
		"user_id" => 10732,
		"work_status" => "Non European National"
	],
	[
		"id" => 7783,
		"user_id" => 10465,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7784,
		"user_id" => 10733,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7785,
		"user_id" => 10737,
		"work_status" => "0"
	],
	[
		"id" => 7786,
		"user_id" => 10739,
		"work_status" => "European National"
	],
	[
		"id" => 7787,
		"user_id" => 10740,
		"work_status" => "European National"
	],
	[
		"id" => 7788,
		"user_id" => 10741,
		"work_status" => "0"
	],
	[
		"id" => 7789,
		"user_id" => 10742,
		"work_status" => "Non European National"
	],
	[
		"id" => 14996,
		"user_id" => 18800,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13766,
		"user_id" => 17570,
		"work_status" => "0"
	],
	[
		"id" => 7792,
		"user_id" => 10749,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7793,
		"user_id" => 10751,
		"work_status" => "European National"
	],
	[
		"id" => 15346,
		"user_id" => 19150,
		"work_status" => "Non European National"
	],
	[
		"id" => 7795,
		"user_id" => 10754,
		"work_status" => "0"
	],
	[
		"id" => 23714,
		"user_id" => 29278,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14852,
		"user_id" => 18656,
		"work_status" => "European National"
	],
	[
		"id" => 7798,
		"user_id" => 10759,
		"work_status" => "0"
	],
	[
		"id" => 7799,
		"user_id" => 10760,
		"work_status" => "European National"
	],
	[
		"id" => 14582,
		"user_id" => 18386,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14442,
		"user_id" => 18246,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7803,
		"user_id" => 10765,
		"work_status" => "European National"
	],
	[
		"id" => 7807,
		"user_id" => 10770,
		"work_status" => "Non European National"
	],
	[
		"id" => 7810,
		"user_id" => 10774,
		"work_status" => "Non European National"
	],
	[
		"id" => 7811,
		"user_id" => 10775,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7812,
		"user_id" => 10776,
		"work_status" => "0"
	],
	[
		"id" => 13981,
		"user_id" => 17785,
		"work_status" => "European National"
	],
	[
		"id" => 14971,
		"user_id" => 18775,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 11978,
		"user_id" => 15604,
		"work_status" => "0"
	],
	[
		"id" => 7815,
		"user_id" => 10781,
		"work_status" => "Non European National"
	],
	[
		"id" => 7816,
		"user_id" => 10782,
		"work_status" => "0"
	],
	[
		"id" => 7817,
		"user_id" => 10783,
		"work_status" => "0"
	],
	[
		"id" => 19318,
		"user_id" => 23865,
		"work_status" => "Non European National"
	],
	[
		"id" => 7819,
		"user_id" => 10785,
		"work_status" => "Non European National"
	],
	[
		"id" => 16684,
		"user_id" => 21135,
		"work_status" => "Non European National"
	],
	[
		"id" => 16685,
		"user_id" => 21141,
		"work_status" => "Non European National"
	],
	[
		"id" => 14161,
		"user_id" => 17965,
		"work_status" => "Non European National"
	],
	[
		"id" => 7822,
		"user_id" => 10790,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23806,
		"user_id" => 29370,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7824,
		"user_id" => 10792,
		"work_status" => "Non European National"
	],
	[
		"id" => 14622,
		"user_id" => 18426,
		"work_status" => "European National"
	],
	[
		"id" => 7826,
		"user_id" => 10795,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14756,
		"user_id" => 18560,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7829,
		"user_id" => 10797,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7830,
		"user_id" => 10798,
		"work_status" => "Non European National"
	],
	[
		"id" => 7832,
		"user_id" => 10800,
		"work_status" => "0"
	],
	[
		"id" => 7833,
		"user_id" => 10801,
		"work_status" => "0"
	],
	[
		"id" => 7834,
		"user_id" => 10802,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7835,
		"user_id" => 10803,
		"work_status" => "European National"
	],
	[
		"id" => 7836,
		"user_id" => 10804,
		"work_status" => "European National"
	],
	[
		"id" => 20171,
		"user_id" => 24874,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7838,
		"user_id" => 10806,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7839,
		"user_id" => 10807,
		"work_status" => "0"
	],
	[
		"id" => 14168,
		"user_id" => 17972,
		"work_status" => "European National"
	],
	[
		"id" => 14002,
		"user_id" => 17806,
		"work_status" => "Non European National"
	],
	[
		"id" => 20144,
		"user_id" => 24834,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7843,
		"user_id" => 10819,
		"work_status" => "0"
	],
	[
		"id" => 14478,
		"user_id" => 18282,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14260,
		"user_id" => 18064,
		"work_status" => "European National"
	],
	[
		"id" => 7846,
		"user_id" => 10823,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7847,
		"user_id" => 10824,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13681,
		"user_id" => 17485,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7849,
		"user_id" => 10750,
		"work_status" => "Non European National"
	],
	[
		"id" => 7851,
		"user_id" => 10828,
		"work_status" => "0"
	],
	[
		"id" => 7852,
		"user_id" => 10830,
		"work_status" => "0"
	],
	[
		"id" => 7853,
		"user_id" => 10829,
		"work_status" => "European National"
	],
	[
		"id" => 7854,
		"user_id" => 10831,
		"work_status" => "Non European National"
	],
	[
		"id" => 7855,
		"user_id" => 10832,
		"work_status" => "0"
	],
	[
		"id" => 7856,
		"user_id" => 10834,
		"work_status" => "0"
	],
	[
		"id" => 7858,
		"user_id" => 10839,
		"work_status" => "European National"
	],
	[
		"id" => 7859,
		"user_id" => 10827,
		"work_status" => "European National"
	],
	[
		"id" => 7860,
		"user_id" => 10840,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7861,
		"user_id" => 10842,
		"work_status" => "0"
	],
	[
		"id" => 7862,
		"user_id" => 10844,
		"work_status" => "0"
	],
	[
		"id" => 7864,
		"user_id" => 10847,
		"work_status" => "0"
	],
	[
		"id" => 14669,
		"user_id" => 18473,
		"work_status" => "European National"
	],
	[
		"id" => 7866,
		"user_id" => 10848,
		"work_status" => "0"
	],
	[
		"id" => 7867,
		"user_id" => 10850,
		"work_status" => "0"
	],
	[
		"id" => 7868,
		"user_id" => 10851,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7869,
		"user_id" => 10852,
		"work_status" => "0"
	],
	[
		"id" => 13227,
		"user_id" => 17031,
		"work_status" => "Non European National"
	],
	[
		"id" => 13651,
		"user_id" => 17455,
		"work_status" => "Non European National"
	],
	[
		"id" => 15355,
		"user_id" => 19159,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13479,
		"user_id" => 17283,
		"work_status" => "European National"
	],
	[
		"id" => 19535,
		"user_id" => 24082,
		"work_status" => "European National"
	],
	[
		"id" => 14869,
		"user_id" => 18673,
		"work_status" => "Non European National"
	],
	[
		"id" => 7877,
		"user_id" => 10849,
		"work_status" => "Non European National"
	],
	[
		"id" => 19737,
		"user_id" => 24284,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22053,
		"user_id" => 27579,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7880,
		"user_id" => 10869,
		"work_status" => "0"
	],
	[
		"id" => 19527,
		"user_id" => 24074,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7883,
		"user_id" => 10873,
		"work_status" => "Non European National"
	],
	[
		"id" => 7884,
		"user_id" => 10874,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19812,
		"user_id" => 24359,
		"work_status" => "European National"
	],
	[
		"id" => 15053,
		"user_id" => 18857,
		"work_status" => "Non European National"
	],
	[
		"id" => 19763,
		"user_id" => 24310,
		"work_status" => "Non European National"
	],
	[
		"id" => 7888,
		"user_id" => 10881,
		"work_status" => "Non European National"
	],
	[
		"id" => 14774,
		"user_id" => 18578,
		"work_status" => "European National"
	],
	[
		"id" => 19398,
		"user_id" => 23945,
		"work_status" => "Non European National"
	],
	[
		"id" => 7892,
		"user_id" => 10886,
		"work_status" => "0"
	],
	[
		"id" => 14937,
		"user_id" => 18741,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7895,
		"user_id" => 10889,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7896,
		"user_id" => 10894,
		"work_status" => "0"
	],
	[
		"id" => 7899,
		"user_id" => 10902,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7900,
		"user_id" => 10908,
		"work_status" => "Non European National"
	],
	[
		"id" => 7902,
		"user_id" => 10912,
		"work_status" => "0"
	],
	[
		"id" => 7903,
		"user_id" => 10916,
		"work_status" => "Non European National"
	],
	[
		"id" => 7904,
		"user_id" => 10919,
		"work_status" => "0"
	],
	[
		"id" => 19756,
		"user_id" => 24303,
		"work_status" => "Non European National"
	],
	[
		"id" => 7906,
		"user_id" => 10920,
		"work_status" => "0"
	],
	[
		"id" => 14809,
		"user_id" => 18613,
		"work_status" => "European National"
	],
	[
		"id" => 24865,
		"user_id" => 30429,
		"work_status" => "European National"
	],
	[
		"id" => 7909,
		"user_id" => 10923,
		"work_status" => "0"
	],
	[
		"id" => 7911,
		"user_id" => 10927,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7912,
		"user_id" => 10929,
		"work_status" => "0"
	],
	[
		"id" => 12590,
		"user_id" => 16216,
		"work_status" => "0"
	],
	[
		"id" => 7914,
		"user_id" => 10935,
		"work_status" => "European National"
	],
	[
		"id" => 19494,
		"user_id" => 24041,
		"work_status" => "Non European National"
	],
	[
		"id" => 7916,
		"user_id" => 10937,
		"work_status" => "0"
	],
	[
		"id" => 14194,
		"user_id" => 17998,
		"work_status" => "European National"
	],
	[
		"id" => 7918,
		"user_id" => 10940,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7919,
		"user_id" => 10941,
		"work_status" => "European National"
	],
	[
		"id" => 7920,
		"user_id" => 10943,
		"work_status" => "Non European National"
	],
	[
		"id" => 7921,
		"user_id" => 10944,
		"work_status" => "0"
	],
	[
		"id" => 7922,
		"user_id" => 10942,
		"work_status" => "0"
	],
	[
		"id" => 23671,
		"user_id" => 29235,
		"work_status" => "Non European National"
	],
	[
		"id" => 14741,
		"user_id" => 18545,
		"work_status" => "European National"
	],
	[
		"id" => 23460,
		"user_id" => 29024,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7927,
		"user_id" => 10951,
		"work_status" => "Non European National"
	],
	[
		"id" => 13987,
		"user_id" => 17791,
		"work_status" => "European National"
	],
	[
		"id" => 7929,
		"user_id" => 10954,
		"work_status" => "Non European National"
	],
	[
		"id" => 13788,
		"user_id" => 17592,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14793,
		"user_id" => 18597,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7933,
		"user_id" => 10959,
		"work_status" => "0"
	],
	[
		"id" => 7934,
		"user_id" => 10961,
		"work_status" => "0"
	],
	[
		"id" => 14764,
		"user_id" => 18568,
		"work_status" => "European National"
	],
	[
		"id" => 15281,
		"user_id" => 19085,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15208,
		"user_id" => 19012,
		"work_status" => "0"
	],
	[
		"id" => 15210,
		"user_id" => 19014,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7938,
		"user_id" => 10964,
		"work_status" => "European National"
	],
	[
		"id" => 18898,
		"user_id" => 23445,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7941,
		"user_id" => 10967,
		"work_status" => "0"
	],
	[
		"id" => 7942,
		"user_id" => 10833,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7943,
		"user_id" => 10968,
		"work_status" => "0"
	],
	[
		"id" => 19392,
		"user_id" => 23939,
		"work_status" => "Non European National"
	],
	[
		"id" => 7945,
		"user_id" => 10972,
		"work_status" => "0"
	],
	[
		"id" => 7946,
		"user_id" => 10973,
		"work_status" => "0"
	],
	[
		"id" => 7947,
		"user_id" => 10974,
		"work_status" => "Non European National"
	],
	[
		"id" => 7948,
		"user_id" => 10048,
		"work_status" => "European National"
	],
	[
		"id" => 7949,
		"user_id" => 10977,
		"work_status" => "Non European National"
	],
	[
		"id" => 18928,
		"user_id" => 23475,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13383,
		"user_id" => 17187,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7954,
		"user_id" => 10982,
		"work_status" => "0"
	],
	[
		"id" => 13951,
		"user_id" => 17755,
		"work_status" => "Non European National"
	],
	[
		"id" => 7956,
		"user_id" => 10988,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7957,
		"user_id" => 10990,
		"work_status" => "European National"
	],
	[
		"id" => 7958,
		"user_id" => 10991,
		"work_status" => "Non European National"
	],
	[
		"id" => 7959,
		"user_id" => 10992,
		"work_status" => "0"
	],
	[
		"id" => 19151,
		"user_id" => 23698,
		"work_status" => "Non European National"
	],
	[
		"id" => 7961,
		"user_id" => 10996,
		"work_status" => "0"
	],
	[
		"id" => 7962,
		"user_id" => 10997,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14281,
		"user_id" => 18085,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 10915,
		"user_id" => 14540,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7966,
		"user_id" => 11001,
		"work_status" => "0"
	],
	[
		"id" => 7968,
		"user_id" => 11003,
		"work_status" => "0"
	],
	[
		"id" => 14875,
		"user_id" => 18679,
		"work_status" => "Non European National"
	],
	[
		"id" => 7970,
		"user_id" => 11006,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7971,
		"user_id" => 11007,
		"work_status" => "0"
	],
	[
		"id" => 7972,
		"user_id" => 11008,
		"work_status" => "Non European National"
	],
	[
		"id" => 7973,
		"user_id" => 11009,
		"work_status" => "Non European National"
	],
	[
		"id" => 7974,
		"user_id" => 11010,
		"work_status" => "0"
	],
	[
		"id" => 15220,
		"user_id" => 19024,
		"work_status" => "European National"
	],
	[
		"id" => 25796,
		"user_id" => 31915,
		"work_status" => "European National"
	],
	[
		"id" => 7977,
		"user_id" => 11013,
		"work_status" => "European National"
	],
	[
		"id" => 7979,
		"user_id" => 11019,
		"work_status" => "Non European National"
	],
	[
		"id" => 7980,
		"user_id" => 11022,
		"work_status" => "0"
	],
	[
		"id" => 14227,
		"user_id" => 18031,
		"work_status" => "Non European National"
	],
	[
		"id" => 13239,
		"user_id" => 17043,
		"work_status" => "European National"
	],
	[
		"id" => 7983,
		"user_id" => 11029,
		"work_status" => "0"
	],
	[
		"id" => 7984,
		"user_id" => 11028,
		"work_status" => "0"
	],
	[
		"id" => 7985,
		"user_id" => 11031,
		"work_status" => "Non European National"
	],
	[
		"id" => 7986,
		"user_id" => 11037,
		"work_status" => "0"
	],
	[
		"id" => 7987,
		"user_id" => 11038,
		"work_status" => "0"
	],
	[
		"id" => 15015,
		"user_id" => 18819,
		"work_status" => "European National"
	],
	[
		"id" => 22445,
		"user_id" => 27971,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7990,
		"user_id" => 11043,
		"work_status" => "0"
	],
	[
		"id" => 7991,
		"user_id" => 11044,
		"work_status" => "0"
	],
	[
		"id" => 19338,
		"user_id" => 23885,
		"work_status" => "Non European National"
	],
	[
		"id" => 8917,
		"user_id" => 12400,
		"work_status" => "European National"
	],
	[
		"id" => 7996,
		"user_id" => 11052,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7997,
		"user_id" => 11048,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14659,
		"user_id" => 18463,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 7999,
		"user_id" => 11054,
		"work_status" => "0"
	],
	[
		"id" => 8000,
		"user_id" => 11055,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22805,
		"user_id" => 28331,
		"work_status" => "European National"
	],
	[
		"id" => 19530,
		"user_id" => 24077,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8005,
		"user_id" => 11061,
		"work_status" => "0"
	],
	[
		"id" => 8006,
		"user_id" => 11063,
		"work_status" => "European National"
	],
	[
		"id" => 19258,
		"user_id" => 23805,
		"work_status" => "European National"
	],
	[
		"id" => 8009,
		"user_id" => 11069,
		"work_status" => "0"
	],
	[
		"id" => 15326,
		"user_id" => 19130,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14471,
		"user_id" => 18275,
		"work_status" => "Non European National"
	],
	[
		"id" => 24746,
		"user_id" => 30310,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8015,
		"user_id" => 11075,
		"work_status" => "European National"
	],
	[
		"id" => 8016,
		"user_id" => 11077,
		"work_status" => "Non European National"
	],
	[
		"id" => 15118,
		"user_id" => 18922,
		"work_status" => "Non European National"
	],
	[
		"id" => 8019,
		"user_id" => 11084,
		"work_status" => "0"
	],
	[
		"id" => 19531,
		"user_id" => 24078,
		"work_status" => "European National"
	],
	[
		"id" => 8021,
		"user_id" => 11086,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8022,
		"user_id" => 11076,
		"work_status" => "0"
	],
	[
		"id" => 8023,
		"user_id" => 11083,
		"work_status" => "0"
	],
	[
		"id" => 8024,
		"user_id" => 11089,
		"work_status" => "0"
	],
	[
		"id" => 15003,
		"user_id" => 18807,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8026,
		"user_id" => 11088,
		"work_status" => "European National"
	],
	[
		"id" => 14469,
		"user_id" => 18273,
		"work_status" => "European National"
	],
	[
		"id" => 14531,
		"user_id" => 18335,
		"work_status" => "European National"
	],
	[
		"id" => 21949,
		"user_id" => 27475,
		"work_status" => "European National"
	],
	[
		"id" => 8032,
		"user_id" => 11097,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8033,
		"user_id" => 11099,
		"work_status" => "Non European National"
	],
	[
		"id" => 8034,
		"user_id" => 11100,
		"work_status" => "European National"
	],
	[
		"id" => 8035,
		"user_id" => 11101,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8036,
		"user_id" => 11102,
		"work_status" => "Non European National"
	],
	[
		"id" => 13475,
		"user_id" => 17279,
		"work_status" => "European National"
	],
	[
		"id" => 8038,
		"user_id" => 11103,
		"work_status" => "European National"
	],
	[
		"id" => 8039,
		"user_id" => 11106,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14501,
		"user_id" => 18305,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8041,
		"user_id" => 11109,
		"work_status" => "Non European National"
	],
	[
		"id" => 8042,
		"user_id" => 11112,
		"work_status" => "Non European National"
	],
	[
		"id" => 8043,
		"user_id" => 11114,
		"work_status" => "Non European National"
	],
	[
		"id" => 8044,
		"user_id" => 11115,
		"work_status" => "Non European National"
	],
	[
		"id" => 13135,
		"user_id" => 16939,
		"work_status" => "European National"
	],
	[
		"id" => 8046,
		"user_id" => 11117,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8047,
		"user_id" => 11119,
		"work_status" => "European National"
	],
	[
		"id" => 8048,
		"user_id" => 11121,
		"work_status" => "0"
	],
	[
		"id" => 8049,
		"user_id" => 11124,
		"work_status" => "0"
	],
	[
		"id" => 8050,
		"user_id" => 11125,
		"work_status" => "Non European National"
	],
	[
		"id" => 8051,
		"user_id" => 11122,
		"work_status" => "Non European National"
	],
	[
		"id" => 24906,
		"user_id" => 30470,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8053,
		"user_id" => 11130,
		"work_status" => "Non European National"
	],
	[
		"id" => 13422,
		"user_id" => 17226,
		"work_status" => "Non European National"
	],
	[
		"id" => 8055,
		"user_id" => 11132,
		"work_status" => "0"
	],
	[
		"id" => 8056,
		"user_id" => 11134,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14259,
		"user_id" => 18063,
		"work_status" => "Non European National"
	],
	[
		"id" => 14543,
		"user_id" => 18347,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8058,
		"user_id" => 11136,
		"work_status" => "Non European National"
	],
	[
		"id" => 8059,
		"user_id" => 11139,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19590,
		"user_id" => 24137,
		"work_status" => "Non European National"
	],
	[
		"id" => 8061,
		"user_id" => 11143,
		"work_status" => "Non European National"
	],
	[
		"id" => 8062,
		"user_id" => 11145,
		"work_status" => "0"
	],
	[
		"id" => 18772,
		"user_id" => 23319,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19901,
		"user_id" => 24448,
		"work_status" => "Non European National"
	],
	[
		"id" => 13707,
		"user_id" => 17511,
		"work_status" => "Non European National"
	],
	[
		"id" => 8066,
		"user_id" => 11150,
		"work_status" => "0"
	],
	[
		"id" => 19907,
		"user_id" => 24454,
		"work_status" => "European National"
	],
	[
		"id" => 15223,
		"user_id" => 19027,
		"work_status" => "Non European National"
	],
	[
		"id" => 14701,
		"user_id" => 18505,
		"work_status" => "Non European National"
	],
	[
		"id" => 8071,
		"user_id" => 11161,
		"work_status" => "0"
	],
	[
		"id" => 8073,
		"user_id" => 11165,
		"work_status" => "0"
	],
	[
		"id" => 19323,
		"user_id" => 23870,
		"work_status" => "European National"
	],
	[
		"id" => 14361,
		"user_id" => 18165,
		"work_status" => "European National"
	],
	[
		"id" => 8078,
		"user_id" => 11172,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22493,
		"user_id" => 28019,
		"work_status" => "Non European National"
	],
	[
		"id" => 8080,
		"user_id" => 11174,
		"work_status" => "0"
	],
	[
		"id" => 19583,
		"user_id" => 24130,
		"work_status" => "European National"
	],
	[
		"id" => 13547,
		"user_id" => 17351,
		"work_status" => "European National"
	],
	[
		"id" => 8082,
		"user_id" => 11177,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15375,
		"user_id" => 19179,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13859,
		"user_id" => 17663,
		"work_status" => "Non European National"
	],
	[
		"id" => 8085,
		"user_id" => 11180,
		"work_status" => "Non European National"
	],
	[
		"id" => 15121,
		"user_id" => 18925,
		"work_status" => "Non European National"
	],
	[
		"id" => 14694,
		"user_id" => 18498,
		"work_status" => "Non European National"
	],
	[
		"id" => 8088,
		"user_id" => 11182,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8089,
		"user_id" => 11183,
		"work_status" => "European National"
	],
	[
		"id" => 24779,
		"user_id" => 30343,
		"work_status" => "European National"
	],
	[
		"id" => 13729,
		"user_id" => 17533,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22896,
		"user_id" => 28422,
		"work_status" => "European National"
	],
	[
		"id" => 8093,
		"user_id" => 11190,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8094,
		"user_id" => 11191,
		"work_status" => "0"
	],
	[
		"id" => 8095,
		"user_id" => 11192,
		"work_status" => "0"
	],
	[
		"id" => 14416,
		"user_id" => 18220,
		"work_status" => "Non European National"
	],
	[
		"id" => 8098,
		"user_id" => 11197,
		"work_status" => "Non European National"
	],
	[
		"id" => 8099,
		"user_id" => 11198,
		"work_status" => "0"
	],
	[
		"id" => 8100,
		"user_id" => 11201,
		"work_status" => "Non European National"
	],
	[
		"id" => 11423,
		"user_id" => 15048,
		"work_status" => "Non European National"
	],
	[
		"id" => 8102,
		"user_id" => 11202,
		"work_status" => "0"
	],
	[
		"id" => 8103,
		"user_id" => 11171,
		"work_status" => "0"
	],
	[
		"id" => 21522,
		"user_id" => 26868,
		"work_status" => "0"
	],
	[
		"id" => 21523,
		"user_id" => 26870,
		"work_status" => "Non European National"
	],
	[
		"id" => 13955,
		"user_id" => 17759,
		"work_status" => "Non European National"
	],
	[
		"id" => 8106,
		"user_id" => 11206,
		"work_status" => "Non European National"
	],
	[
		"id" => 14195,
		"user_id" => 17999,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8108,
		"user_id" => 11207,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8109,
		"user_id" => 11209,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8110,
		"user_id" => 11210,
		"work_status" => "0"
	],
	[
		"id" => 13584,
		"user_id" => 17388,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 10655,
		"user_id" => 14280,
		"work_status" => "European National"
	],
	[
		"id" => 8115,
		"user_id" => 11214,
		"work_status" => "0"
	],
	[
		"id" => 8116,
		"user_id" => 11216,
		"work_status" => "0"
	],
	[
		"id" => 8117,
		"user_id" => 11217,
		"work_status" => "0"
	],
	[
		"id" => 8118,
		"user_id" => 11219,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14997,
		"user_id" => 18801,
		"work_status" => "Non European National"
	],
	[
		"id" => 8120,
		"user_id" => 11224,
		"work_status" => "European National"
	],
	[
		"id" => 14264,
		"user_id" => 18068,
		"work_status" => "European National"
	],
	[
		"id" => 8122,
		"user_id" => 11226,
		"work_status" => "European National"
	],
	[
		"id" => 8123,
		"user_id" => 11227,
		"work_status" => "0"
	],
	[
		"id" => 22192,
		"user_id" => 27718,
		"work_status" => "Non European National"
	],
	[
		"id" => 8125,
		"user_id" => 11229,
		"work_status" => "0"
	],
	[
		"id" => 8126,
		"user_id" => 11231,
		"work_status" => "0"
	],
	[
		"id" => 8127,
		"user_id" => 11232,
		"work_status" => "Non European National"
	],
	[
		"id" => 8128,
		"user_id" => 11233,
		"work_status" => "Non European National"
	],
	[
		"id" => 14443,
		"user_id" => 18247,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13732,
		"user_id" => 17536,
		"work_status" => "0"
	],
	[
		"id" => 8131,
		"user_id" => 11196,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8132,
		"user_id" => 11237,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14103,
		"user_id" => 17907,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14347,
		"user_id" => 18151,
		"work_status" => "Non European National"
	],
	[
		"id" => 8135,
		"user_id" => 11240,
		"work_status" => "0"
	],
	[
		"id" => 14100,
		"user_id" => 17904,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8138,
		"user_id" => 11247,
		"work_status" => "Non European National"
	],
	[
		"id" => 8139,
		"user_id" => 11246,
		"work_status" => "European National"
	],
	[
		"id" => 15385,
		"user_id" => 19189,
		"work_status" => "0"
	],
	[
		"id" => 8141,
		"user_id" => 11249,
		"work_status" => "Non European National"
	],
	[
		"id" => 8142,
		"user_id" => 11251,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12591,
		"user_id" => 8984,
		"work_status" => "0"
	],
	[
		"id" => 24515,
		"user_id" => 30079,
		"work_status" => "European National"
	],
	[
		"id" => 8144,
		"user_id" => 11254,
		"work_status" => "0"
	],
	[
		"id" => 8145,
		"user_id" => 11258,
		"work_status" => "Non European National"
	],
	[
		"id" => 15162,
		"user_id" => 18966,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8147,
		"user_id" => 11262,
		"work_status" => "European National"
	],
	[
		"id" => 8149,
		"user_id" => 11270,
		"work_status" => "European National"
	],
	[
		"id" => 8150,
		"user_id" => 11271,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13254,
		"user_id" => 17058,
		"work_status" => "European National"
	],
	[
		"id" => 19161,
		"user_id" => 23708,
		"work_status" => "Non European National"
	],
	[
		"id" => 14296,
		"user_id" => 18100,
		"work_status" => "European National"
	],
	[
		"id" => 8155,
		"user_id" => 10956,
		"work_status" => "European National"
	],
	[
		"id" => 8156,
		"user_id" => 11280,
		"work_status" => "0"
	],
	[
		"id" => 14348,
		"user_id" => 18152,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19122,
		"user_id" => 23669,
		"work_status" => "Non European National"
	],
	[
		"id" => 14661,
		"user_id" => 18465,
		"work_status" => "Non European National"
	],
	[
		"id" => 8160,
		"user_id" => 11286,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8161,
		"user_id" => 11289,
		"work_status" => "0"
	],
	[
		"id" => 8163,
		"user_id" => 11291,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8164,
		"user_id" => 11292,
		"work_status" => "European National"
	],
	[
		"id" => 13154,
		"user_id" => 16958,
		"work_status" => "European National"
	],
	[
		"id" => 24611,
		"user_id" => 30175,
		"work_status" => "Non European National"
	],
	[
		"id" => 8166,
		"user_id" => 11296,
		"work_status" => "0"
	],
	[
		"id" => 22811,
		"user_id" => 28337,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8168,
		"user_id" => 11298,
		"work_status" => "0"
	],
	[
		"id" => 19839,
		"user_id" => 24386,
		"work_status" => "Non European National"
	],
	[
		"id" => 14473,
		"user_id" => 18277,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19910,
		"user_id" => 24457,
		"work_status" => "Non European National"
	],
	[
		"id" => 19619,
		"user_id" => 24166,
		"work_status" => "Non European National"
	],
	[
		"id" => 8174,
		"user_id" => 11306,
		"work_status" => "European National"
	],
	[
		"id" => 8175,
		"user_id" => 11307,
		"work_status" => "0"
	],
	[
		"id" => 24789,
		"user_id" => 30353,
		"work_status" => "Non European National"
	],
	[
		"id" => 8177,
		"user_id" => 11310,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8178,
		"user_id" => 11312,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22680,
		"user_id" => 28206,
		"work_status" => "Non European National"
	],
	[
		"id" => 8179,
		"user_id" => 11314,
		"work_status" => "0"
	],
	[
		"id" => 19037,
		"user_id" => 23584,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8181,
		"user_id" => 11308,
		"work_status" => "European National"
	],
	[
		"id" => 8182,
		"user_id" => 11316,
		"work_status" => "European National"
	],
	[
		"id" => 8183,
		"user_id" => 11318,
		"work_status" => "Non European National"
	],
	[
		"id" => 8184,
		"user_id" => 11321,
		"work_status" => "Non European National"
	],
	[
		"id" => 8185,
		"user_id" => 11324,
		"work_status" => "0"
	],
	[
		"id" => 8186,
		"user_id" => 11325,
		"work_status" => "0"
	],
	[
		"id" => 8187,
		"user_id" => 11073,
		"work_status" => "Non European National"
	],
	[
		"id" => 8190,
		"user_id" => 11330,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8191,
		"user_id" => 11329,
		"work_status" => "European National"
	],
	[
		"id" => 22363,
		"user_id" => 27889,
		"work_status" => "Non European National"
	],
	[
		"id" => 20089,
		"user_id" => 24731,
		"work_status" => "0"
	],
	[
		"id" => 23183,
		"user_id" => 28709,
		"work_status" => "Non European National"
	],
	[
		"id" => 8194,
		"user_id" => 11334,
		"work_status" => "0"
	],
	[
		"id" => 8195,
		"user_id" => 11331,
		"work_status" => "Non European National"
	],
	[
		"id" => 8197,
		"user_id" => 11336,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14519,
		"user_id" => 18323,
		"work_status" => "Non European National"
	],
	[
		"id" => 8199,
		"user_id" => 11340,
		"work_status" => "Non European National"
	],
	[
		"id" => 14838,
		"user_id" => 18642,
		"work_status" => "European National"
	],
	[
		"id" => 15353,
		"user_id" => 19157,
		"work_status" => "Non European National"
	],
	[
		"id" => 14028,
		"user_id" => 17832,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14015,
		"user_id" => 17819,
		"work_status" => "Non European National"
	],
	[
		"id" => 19432,
		"user_id" => 23979,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8206,
		"user_id" => 11347,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14038,
		"user_id" => 17842,
		"work_status" => "Non European National"
	],
	[
		"id" => 23222,
		"user_id" => 28748,
		"work_status" => "Non European National"
	],
	[
		"id" => 8211,
		"user_id" => 11351,
		"work_status" => "European National"
	],
	[
		"id" => 25151,
		"user_id" => 30846,
		"work_status" => "0"
	],
	[
		"id" => 8213,
		"user_id" => 11357,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8214,
		"user_id" => 11359,
		"work_status" => "0"
	],
	[
		"id" => 13673,
		"user_id" => 17477,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8216,
		"user_id" => 11361,
		"work_status" => "0"
	],
	[
		"id" => 19603,
		"user_id" => 24150,
		"work_status" => "European National"
	],
	[
		"id" => 8219,
		"user_id" => 11366,
		"work_status" => "0"
	],
	[
		"id" => 8220,
		"user_id" => 11367,
		"work_status" => "0"
	],
	[
		"id" => 8221,
		"user_id" => 11368,
		"work_status" => "0"
	],
	[
		"id" => 22668,
		"user_id" => 28194,
		"work_status" => "Non European National"
	],
	[
		"id" => 8224,
		"user_id" => 11371,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8225,
		"user_id" => 11372,
		"work_status" => "European National"
	],
	[
		"id" => 8226,
		"user_id" => 11373,
		"work_status" => "0"
	],
	[
		"id" => 8227,
		"user_id" => 11374,
		"work_status" => "European National"
	],
	[
		"id" => 8228,
		"user_id" => 11375,
		"work_status" => "European National"
	],
	[
		"id" => 14358,
		"user_id" => 18162,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8230,
		"user_id" => 11376,
		"work_status" => "European National"
	],
	[
		"id" => 10038,
		"user_id" => 13663,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8277,
		"user_id" => 11442,
		"work_status" => "0"
	],
	[
		"id" => 8232,
		"user_id" => 11378,
		"work_status" => "European National"
	],
	[
		"id" => 14913,
		"user_id" => 18717,
		"work_status" => "European National"
	],
	[
		"id" => 8234,
		"user_id" => 11380,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8235,
		"user_id" => 11381,
		"work_status" => "European National"
	],
	[
		"id" => 27030,
		"user_id" => 33646,
		"work_status" => "0"
	],
	[
		"id" => 8237,
		"user_id" => 11384,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8238,
		"user_id" => 11385,
		"work_status" => "Non European National"
	],
	[
		"id" => 8239,
		"user_id" => 11386,
		"work_status" => "0"
	],
	[
		"id" => 8240,
		"user_id" => 11388,
		"work_status" => "0"
	],
	[
		"id" => 8241,
		"user_id" => 11390,
		"work_status" => "Non European National"
	],
	[
		"id" => 8242,
		"user_id" => 11391,
		"work_status" => "0"
	],
	[
		"id" => 15072,
		"user_id" => 18876,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8245,
		"user_id" => 11395,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8248,
		"user_id" => 11403,
		"work_status" => "0"
	],
	[
		"id" => 14629,
		"user_id" => 18433,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13923,
		"user_id" => 17727,
		"work_status" => "European National"
	],
	[
		"id" => 8252,
		"user_id" => 11295,
		"work_status" => "European National"
	],
	[
		"id" => 8254,
		"user_id" => 11355,
		"work_status" => "European National"
	],
	[
		"id" => 8255,
		"user_id" => 11407,
		"work_status" => "0"
	],
	[
		"id" => 14008,
		"user_id" => 17812,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8257,
		"user_id" => 11410,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8260,
		"user_id" => 11414,
		"work_status" => "0"
	],
	[
		"id" => 13619,
		"user_id" => 17423,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14055,
		"user_id" => 17859,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8265,
		"user_id" => 11422,
		"work_status" => "0"
	],
	[
		"id" => 23301,
		"user_id" => 28827,
		"work_status" => "Non European National"
	],
	[
		"id" => 15095,
		"user_id" => 18899,
		"work_status" => "Non European National"
	],
	[
		"id" => 8269,
		"user_id" => 11430,
		"work_status" => "0"
	],
	[
		"id" => 8270,
		"user_id" => 11432,
		"work_status" => "0"
	],
	[
		"id" => 8271,
		"user_id" => 11433,
		"work_status" => "0"
	],
	[
		"id" => 8273,
		"user_id" => 11435,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8275,
		"user_id" => 11434,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8276,
		"user_id" => 11437,
		"work_status" => "0"
	],
	[
		"id" => 8278,
		"user_id" => 11444,
		"work_status" => "Non European National"
	],
	[
		"id" => 8279,
		"user_id" => 11445,
		"work_status" => "Non European National"
	],
	[
		"id" => 12190,
		"user_id" => 15830,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13871,
		"user_id" => 17675,
		"work_status" => "Non European National"
	],
	[
		"id" => 13146,
		"user_id" => 16950,
		"work_status" => "Non European National"
	],
	[
		"id" => 8282,
		"user_id" => 11449,
		"work_status" => "Non European National"
	],
	[
		"id" => 8283,
		"user_id" => 11450,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8284,
		"user_id" => 11452,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8285,
		"user_id" => 11454,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8286,
		"user_id" => 11456,
		"work_status" => "Non European National"
	],
	[
		"id" => 14350,
		"user_id" => 18154,
		"work_status" => "European National"
	],
	[
		"id" => 19459,
		"user_id" => 24006,
		"work_status" => "European National"
	],
	[
		"id" => 13286,
		"user_id" => 17090,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8290,
		"user_id" => 11461,
		"work_status" => "European National"
	],
	[
		"id" => 13577,
		"user_id" => 17381,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8292,
		"user_id" => 11463,
		"work_status" => "European National"
	],
	[
		"id" => 8293,
		"user_id" => 11464,
		"work_status" => "European National"
	],
	[
		"id" => 14029,
		"user_id" => 17833,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25153,
		"user_id" => 19624,
		"work_status" => "0"
	],
	[
		"id" => 25154,
		"user_id" => 30847,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8297,
		"user_id" => 11470,
		"work_status" => "0"
	],
	[
		"id" => 8298,
		"user_id" => 11471,
		"work_status" => "European National"
	],
	[
		"id" => 8300,
		"user_id" => 11472,
		"work_status" => "European National"
	],
	[
		"id" => 13478,
		"user_id" => 17282,
		"work_status" => "European National"
	],
	[
		"id" => 8302,
		"user_id" => 11473,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13480,
		"user_id" => 17284,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8304,
		"user_id" => 9432,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8305,
		"user_id" => 11476,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8306,
		"user_id" => 11477,
		"work_status" => "European National"
	],
	[
		"id" => 23182,
		"user_id" => 28708,
		"work_status" => "Non European National"
	],
	[
		"id" => 8308,
		"user_id" => 11480,
		"work_status" => "Non European National"
	],
	[
		"id" => 8309,
		"user_id" => 11481,
		"work_status" => "Non European National"
	],
	[
		"id" => 8310,
		"user_id" => 11483,
		"work_status" => "Non European National"
	],
	[
		"id" => 19788,
		"user_id" => 24335,
		"work_status" => "European National"
	],
	[
		"id" => 22310,
		"user_id" => 27836,
		"work_status" => "Non European National"
	],
	[
		"id" => 8313,
		"user_id" => 11487,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12694,
		"user_id" => 16309,
		"work_status" => "European National"
	],
	[
		"id" => 8315,
		"user_id" => 11489,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8318,
		"user_id" => 11493,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8320,
		"user_id" => 11496,
		"work_status" => "Non European National"
	],
	[
		"id" => 8321,
		"user_id" => 11497,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8322,
		"user_id" => 11499,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15106,
		"user_id" => 18910,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15065,
		"user_id" => 18869,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13780,
		"user_id" => 17584,
		"work_status" => "European National"
	],
	[
		"id" => 8326,
		"user_id" => 11504,
		"work_status" => "Non European National"
	],
	[
		"id" => 8327,
		"user_id" => 8763,
		"work_status" => "0"
	],
	[
		"id" => 13559,
		"user_id" => 17363,
		"work_status" => "Non European National"
	],
	[
		"id" => 13345,
		"user_id" => 17149,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24780,
		"user_id" => 30344,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 11521,
		"user_id" => 15146,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8331,
		"user_id" => 11510,
		"work_status" => "Non European National"
	],
	[
		"id" => 13585,
		"user_id" => 17389,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8333,
		"user_id" => 11511,
		"work_status" => "0"
	],
	[
		"id" => 8334,
		"user_id" => 11512,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12545,
		"user_id" => 12233,
		"work_status" => "0"
	],
	[
		"id" => 14067,
		"user_id" => 17871,
		"work_status" => "Non European National"
	],
	[
		"id" => 8338,
		"user_id" => 11517,
		"work_status" => "0"
	],
	[
		"id" => 14598,
		"user_id" => 18402,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20172,
		"user_id" => 24875,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8341,
		"user_id" => 11522,
		"work_status" => "0"
	],
	[
		"id" => 13606,
		"user_id" => 17410,
		"work_status" => "Non European National"
	],
	[
		"id" => 13570,
		"user_id" => 17374,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19363,
		"user_id" => 23910,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13213,
		"user_id" => 17017,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15040,
		"user_id" => 18844,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14092,
		"user_id" => 17896,
		"work_status" => "European National"
	],
	[
		"id" => 8350,
		"user_id" => 11535,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15153,
		"user_id" => 18957,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14621,
		"user_id" => 18425,
		"work_status" => "Non European National"
	],
	[
		"id" => 8354,
		"user_id" => 11542,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8355,
		"user_id" => 11541,
		"work_status" => "Non European National"
	],
	[
		"id" => 8356,
		"user_id" => 11543,
		"work_status" => "European National"
	],
	[
		"id" => 8357,
		"user_id" => 11544,
		"work_status" => "0"
	],
	[
		"id" => 8358,
		"user_id" => 11546,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8359,
		"user_id" => 11548,
		"work_status" => "European National"
	],
	[
		"id" => 8360,
		"user_id" => 11550,
		"work_status" => "0"
	],
	[
		"id" => 8361,
		"user_id" => 11539,
		"work_status" => "Non European National"
	],
	[
		"id" => 14323,
		"user_id" => 18127,
		"work_status" => "European National"
	],
	[
		"id" => 8364,
		"user_id" => 11553,
		"work_status" => "European National"
	],
	[
		"id" => 8365,
		"user_id" => 11533,
		"work_status" => "0"
	],
	[
		"id" => 8366,
		"user_id" => 11556,
		"work_status" => "0"
	],
	[
		"id" => 8368,
		"user_id" => 11557,
		"work_status" => "0"
	],
	[
		"id" => 8369,
		"user_id" => 11561,
		"work_status" => "Non European National"
	],
	[
		"id" => 8370,
		"user_id" => 11563,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8371,
		"user_id" => 11564,
		"work_status" => "Non European National"
	],
	[
		"id" => 13687,
		"user_id" => 17491,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8374,
		"user_id" => 11567,
		"work_status" => "European National"
	],
	[
		"id" => 8375,
		"user_id" => 11568,
		"work_status" => "0"
	],
	[
		"id" => 14251,
		"user_id" => 18055,
		"work_status" => "European National"
	],
	[
		"id" => 13292,
		"user_id" => 17096,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8378,
		"user_id" => 11570,
		"work_status" => "European National"
	],
	[
		"id" => 19862,
		"user_id" => 24409,
		"work_status" => "European National"
	],
	[
		"id" => 8379,
		"user_id" => 11571,
		"work_status" => "0"
	],
	[
		"id" => 14261,
		"user_id" => 18065,
		"work_status" => "European National"
	],
	[
		"id" => 13401,
		"user_id" => 17205,
		"work_status" => "Non European National"
	],
	[
		"id" => 8383,
		"user_id" => 11577,
		"work_status" => "Non European National"
	],
	[
		"id" => 8385,
		"user_id" => 11581,
		"work_status" => "European National"
	],
	[
		"id" => 8387,
		"user_id" => 11582,
		"work_status" => "0"
	],
	[
		"id" => 8388,
		"user_id" => 11583,
		"work_status" => "0"
	],
	[
		"id" => 8389,
		"user_id" => 11584,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8390,
		"user_id" => 11585,
		"work_status" => "Non European National"
	],
	[
		"id" => 8391,
		"user_id" => 11586,
		"work_status" => "Non European National"
	],
	[
		"id" => 8392,
		"user_id" => 11587,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14499,
		"user_id" => 18303,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8394,
		"user_id" => 11590,
		"work_status" => "0"
	],
	[
		"id" => 8395,
		"user_id" => 11591,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8396,
		"user_id" => 11592,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19708,
		"user_id" => 24255,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8398,
		"user_id" => 11593,
		"work_status" => "0"
	],
	[
		"id" => 8399,
		"user_id" => 11594,
		"work_status" => "0"
	],
	[
		"id" => 8400,
		"user_id" => 11595,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19311,
		"user_id" => 23858,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8402,
		"user_id" => 11598,
		"work_status" => "Non European National"
	],
	[
		"id" => 20566,
		"user_id" => 25425,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8404,
		"user_id" => 11602,
		"work_status" => "0"
	],
	[
		"id" => 8405,
		"user_id" => 11605,
		"work_status" => "0"
	],
	[
		"id" => 19200,
		"user_id" => 23747,
		"work_status" => "European National"
	],
	[
		"id" => 15365,
		"user_id" => 19169,
		"work_status" => "Non European National"
	],
	[
		"id" => 8409,
		"user_id" => 11608,
		"work_status" => "Non European National"
	],
	[
		"id" => 26428,
		"user_id" => 32816,
		"work_status" => "0"
	],
	[
		"id" => 19441,
		"user_id" => 23988,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8412,
		"user_id" => 11613,
		"work_status" => "0"
	],
	[
		"id" => 24658,
		"user_id" => 30222,
		"work_status" => "Non European National"
	],
	[
		"id" => 8414,
		"user_id" => 11618,
		"work_status" => "0"
	],
	[
		"id" => 8415,
		"user_id" => 11620,
		"work_status" => "0"
	],
	[
		"id" => 20500,
		"user_id" => 25323,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8417,
		"user_id" => 11622,
		"work_status" => "European National"
	],
	[
		"id" => 15044,
		"user_id" => 18848,
		"work_status" => "Non European National"
	],
	[
		"id" => 26424,
		"user_id" => 32810,
		"work_status" => "European National"
	],
	[
		"id" => 8420,
		"user_id" => 11629,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8421,
		"user_id" => 11630,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13285,
		"user_id" => 17089,
		"work_status" => "Non European National"
	],
	[
		"id" => 8424,
		"user_id" => 11635,
		"work_status" => "Non European National"
	],
	[
		"id" => 14394,
		"user_id" => 18198,
		"work_status" => "European National"
	],
	[
		"id" => 13958,
		"user_id" => 17762,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8429,
		"user_id" => 11642,
		"work_status" => "0"
	],
	[
		"id" => 19241,
		"user_id" => 23788,
		"work_status" => "European National"
	],
	[
		"id" => 8431,
		"user_id" => 11645,
		"work_status" => "Non European National"
	],
	[
		"id" => 8435,
		"user_id" => 11651,
		"work_status" => "Non European National"
	],
	[
		"id" => 20508,
		"user_id" => 25363,
		"work_status" => "0"
	],
	[
		"id" => 24465,
		"user_id" => 30029,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24472,
		"user_id" => 30036,
		"work_status" => "European National"
	],
	[
		"id" => 19181,
		"user_id" => 23728,
		"work_status" => "European National"
	],
	[
		"id" => 14041,
		"user_id" => 17845,
		"work_status" => "Non European National"
	],
	[
		"id" => 8436,
		"user_id" => 11654,
		"work_status" => "Non European National"
	],
	[
		"id" => 22182,
		"user_id" => 27708,
		"work_status" => "Non European National"
	],
	[
		"id" => 8438,
		"user_id" => 11655,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8439,
		"user_id" => 11657,
		"work_status" => "European National"
	],
	[
		"id" => 13222,
		"user_id" => 17026,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8443,
		"user_id" => 11660,
		"work_status" => "0"
	],
	[
		"id" => 8445,
		"user_id" => 11664,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8446,
		"user_id" => 11665,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14866,
		"user_id" => 18670,
		"work_status" => "Non European National"
	],
	[
		"id" => 8448,
		"user_id" => 11668,
		"work_status" => "European National"
	],
	[
		"id" => 8449,
		"user_id" => 11669,
		"work_status" => "European National"
	],
	[
		"id" => 8450,
		"user_id" => 11671,
		"work_status" => "0"
	],
	[
		"id" => 8451,
		"user_id" => 11670,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8453,
		"user_id" => 11674,
		"work_status" => "0"
	],
	[
		"id" => 8454,
		"user_id" => 11675,
		"work_status" => "0"
	],
	[
		"id" => 8455,
		"user_id" => 11215,
		"work_status" => "0"
	],
	[
		"id" => 8456,
		"user_id" => 11678,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23785,
		"user_id" => 29349,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19792,
		"user_id" => 24339,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13717,
		"user_id" => 17521,
		"work_status" => "Non European National"
	],
	[
		"id" => 13795,
		"user_id" => 17599,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8464,
		"user_id" => 11692,
		"work_status" => "Non European National"
	],
	[
		"id" => 8465,
		"user_id" => 11693,
		"work_status" => "European National"
	],
	[
		"id" => 24548,
		"user_id" => 30112,
		"work_status" => "European National"
	],
	[
		"id" => 8469,
		"user_id" => 11700,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27485,
		"user_id" => 34308,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27486,
		"user_id" => 34309,
		"work_status" => "0"
	],
	[
		"id" => 27487,
		"user_id" => 34310,
		"work_status" => "Non European National"
	],
	[
		"id" => 15032,
		"user_id" => 18836,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15254,
		"user_id" => 19058,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8474,
		"user_id" => 10986,
		"work_status" => "Non European National"
	],
	[
		"id" => 8475,
		"user_id" => 10308,
		"work_status" => "Non European National"
	],
	[
		"id" => 8476,
		"user_id" => 11707,
		"work_status" => "Non European National"
	],
	[
		"id" => 15094,
		"user_id" => 18898,
		"work_status" => "Non European National"
	],
	[
		"id" => 8478,
		"user_id" => 11710,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8479,
		"user_id" => 11712,
		"work_status" => "0"
	],
	[
		"id" => 19558,
		"user_id" => 24105,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8481,
		"user_id" => 11714,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14107,
		"user_id" => 17911,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8484,
		"user_id" => 11718,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8485,
		"user_id" => 10169,
		"work_status" => "Non European National"
	],
	[
		"id" => 14680,
		"user_id" => 18484,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23128,
		"user_id" => 28654,
		"work_status" => "Non European National"
	],
	[
		"id" => 8488,
		"user_id" => 11721,
		"work_status" => "0"
	],
	[
		"id" => 8489,
		"user_id" => 11722,
		"work_status" => "0"
	],
	[
		"id" => 13915,
		"user_id" => 17719,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8491,
		"user_id" => 11725,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8492,
		"user_id" => 11726,
		"work_status" => "0"
	],
	[
		"id" => 8493,
		"user_id" => 11727,
		"work_status" => "Non European National"
	],
	[
		"id" => 8494,
		"user_id" => 11730,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18803,
		"user_id" => 23350,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14744,
		"user_id" => 18548,
		"work_status" => "Non European National"
	],
	[
		"id" => 8500,
		"user_id" => 11744,
		"work_status" => "0"
	],
	[
		"id" => 8504,
		"user_id" => 11749,
		"work_status" => "European National"
	],
	[
		"id" => 8506,
		"user_id" => 11753,
		"work_status" => "0"
	],
	[
		"id" => 13486,
		"user_id" => 17290,
		"work_status" => "Non European National"
	],
	[
		"id" => 14785,
		"user_id" => 18589,
		"work_status" => "European National"
	],
	[
		"id" => 21779,
		"user_id" => 27305,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8511,
		"user_id" => 11757,
		"work_status" => "Non European National"
	],
	[
		"id" => 15242,
		"user_id" => 19046,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8513,
		"user_id" => 11762,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8515,
		"user_id" => 11758,
		"work_status" => "European National"
	],
	[
		"id" => 13812,
		"user_id" => 17616,
		"work_status" => "Non European National"
	],
	[
		"id" => 8517,
		"user_id" => 11765,
		"work_status" => "0"
	],
	[
		"id" => 8518,
		"user_id" => 11766,
		"work_status" => "Non European National"
	],
	[
		"id" => 19424,
		"user_id" => 23971,
		"work_status" => "European National"
	],
	[
		"id" => 8520,
		"user_id" => 11770,
		"work_status" => "Non European National"
	],
	[
		"id" => 22770,
		"user_id" => 28296,
		"work_status" => "Non European National"
	],
	[
		"id" => 13410,
		"user_id" => 17214,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8523,
		"user_id" => 11777,
		"work_status" => "Non European National"
	],
	[
		"id" => 8525,
		"user_id" => 11780,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8526,
		"user_id" => 11782,
		"work_status" => "0"
	],
	[
		"id" => 8527,
		"user_id" => 11784,
		"work_status" => "0"
	],
	[
		"id" => 8529,
		"user_id" => 11788,
		"work_status" => "Non European National"
	],
	[
		"id" => 13904,
		"user_id" => 17708,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8532,
		"user_id" => 11792,
		"work_status" => "European National"
	],
	[
		"id" => 14190,
		"user_id" => 17994,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8535,
		"user_id" => 11798,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14020,
		"user_id" => 17824,
		"work_status" => "European National"
	],
	[
		"id" => 19115,
		"user_id" => 23662,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15303,
		"user_id" => 19107,
		"work_status" => "European National"
	],
	[
		"id" => 24930,
		"user_id" => 30491,
		"work_status" => "Non European National"
	],
	[
		"id" => 15262,
		"user_id" => 19066,
		"work_status" => "European National"
	],
	[
		"id" => 8542,
		"user_id" => 11804,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8543,
		"user_id" => 11805,
		"work_status" => "0"
	],
	[
		"id" => 8544,
		"user_id" => 11806,
		"work_status" => "European National"
	],
	[
		"id" => 14479,
		"user_id" => 18283,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18808,
		"user_id" => 23355,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8548,
		"user_id" => 11813,
		"work_status" => "European National"
	],
	[
		"id" => 8549,
		"user_id" => 11815,
		"work_status" => "0"
	],
	[
		"id" => 8550,
		"user_id" => 11816,
		"work_status" => "0"
	],
	[
		"id" => 8551,
		"user_id" => 11817,
		"work_status" => "0"
	],
	[
		"id" => 8554,
		"user_id" => 11819,
		"work_status" => "0"
	],
	[
		"id" => 8555,
		"user_id" => 11820,
		"work_status" => "0"
	],
	[
		"id" => 8556,
		"user_id" => 11821,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8557,
		"user_id" => 11822,
		"work_status" => "Non European National"
	],
	[
		"id" => 8558,
		"user_id" => 11823,
		"work_status" => "0"
	],
	[
		"id" => 13512,
		"user_id" => 17316,
		"work_status" => "Non European National"
	],
	[
		"id" => 8560,
		"user_id" => 11825,
		"work_status" => "0"
	],
	[
		"id" => 8561,
		"user_id" => 11826,
		"work_status" => "0"
	],
	[
		"id" => 14573,
		"user_id" => 18377,
		"work_status" => "Non European National"
	],
	[
		"id" => 8563,
		"user_id" => 11830,
		"work_status" => "0"
	],
	[
		"id" => 8564,
		"user_id" => 11831,
		"work_status" => "0"
	],
	[
		"id" => 19608,
		"user_id" => 24155,
		"work_status" => "Non European National"
	],
	[
		"id" => 22292,
		"user_id" => 27818,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20573,
		"user_id" => 25436,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24564,
		"user_id" => 30128,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22114,
		"user_id" => 27640,
		"work_status" => "Non European National"
	],
	[
		"id" => 8568,
		"user_id" => 11836,
		"work_status" => "0"
	],
	[
		"id" => 8569,
		"user_id" => 10523,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8571,
		"user_id" => 11840,
		"work_status" => "0"
	],
	[
		"id" => 8572,
		"user_id" => 11842,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8573,
		"user_id" => 11843,
		"work_status" => "Non European National"
	],
	[
		"id" => 8574,
		"user_id" => 11832,
		"work_status" => "Non European National"
	],
	[
		"id" => 15219,
		"user_id" => 19023,
		"work_status" => "European National"
	],
	[
		"id" => 8576,
		"user_id" => 11847,
		"work_status" => "0"
	],
	[
		"id" => 8577,
		"user_id" => 11850,
		"work_status" => "European National"
	],
	[
		"id" => 8578,
		"user_id" => 11852,
		"work_status" => "0"
	],
	[
		"id" => 8579,
		"user_id" => 11853,
		"work_status" => "Non European National"
	],
	[
		"id" => 8580,
		"user_id" => 11859,
		"work_status" => "0"
	],
	[
		"id" => 8582,
		"user_id" => 11861,
		"work_status" => "0"
	],
	[
		"id" => 13448,
		"user_id" => 17252,
		"work_status" => "European National"
	],
	[
		"id" => 8584,
		"user_id" => 11862,
		"work_status" => "0"
	],
	[
		"id" => 24752,
		"user_id" => 30316,
		"work_status" => "European National"
	],
	[
		"id" => 25242,
		"user_id" => 30953,
		"work_status" => "Non European National"
	],
	[
		"id" => 19771,
		"user_id" => 24318,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8589,
		"user_id" => 11866,
		"work_status" => "0"
	],
	[
		"id" => 14876,
		"user_id" => 18680,
		"work_status" => "European National"
	],
	[
		"id" => 15081,
		"user_id" => 18885,
		"work_status" => "Non European National"
	],
	[
		"id" => 8592,
		"user_id" => 11871,
		"work_status" => "European National"
	],
	[
		"id" => 8593,
		"user_id" => 11874,
		"work_status" => "0"
	],
	[
		"id" => 20567,
		"user_id" => 25325,
		"work_status" => "0"
	],
	[
		"id" => 8596,
		"user_id" => 11883,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8597,
		"user_id" => 11886,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19613,
		"user_id" => 24160,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19288,
		"user_id" => 23835,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8600,
		"user_id" => 11892,
		"work_status" => "0"
	],
	[
		"id" => 8601,
		"user_id" => 11893,
		"work_status" => "Non European National"
	],
	[
		"id" => 19740,
		"user_id" => 24287,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8603,
		"user_id" => 11896,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8604,
		"user_id" => 11897,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8605,
		"user_id" => 11899,
		"work_status" => "0"
	],
	[
		"id" => 24887,
		"user_id" => 30451,
		"work_status" => "European National"
	],
	[
		"id" => 19606,
		"user_id" => 24153,
		"work_status" => "European National"
	],
	[
		"id" => 13647,
		"user_id" => 17451,
		"work_status" => "Non European National"
	],
	[
		"id" => 8613,
		"user_id" => 11908,
		"work_status" => "Non European National"
	],
	[
		"id" => 8614,
		"user_id" => 11910,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8615,
		"user_id" => 11911,
		"work_status" => "Non European National"
	],
	[
		"id" => 8616,
		"user_id" => 11915,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14803,
		"user_id" => 18607,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8619,
		"user_id" => 11917,
		"work_status" => "Non European National"
	],
	[
		"id" => 8680,
		"user_id" => 12011,
		"work_status" => "0"
	],
	[
		"id" => 25148,
		"user_id" => 25899,
		"work_status" => "Non European National"
	],
	[
		"id" => 25149,
		"user_id" => 20817,
		"work_status" => "Non European National"
	],
	[
		"id" => 25150,
		"user_id" => 20670,
		"work_status" => "0"
	],
	[
		"id" => 8621,
		"user_id" => 11919,
		"work_status" => "0"
	],
	[
		"id" => 8622,
		"user_id" => 11920,
		"work_status" => "0"
	],
	[
		"id" => 24870,
		"user_id" => 30434,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13646,
		"user_id" => 17450,
		"work_status" => "Non European National"
	],
	[
		"id" => 8624,
		"user_id" => 11921,
		"work_status" => "0"
	],
	[
		"id" => 8625,
		"user_id" => 11922,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8626,
		"user_id" => 11925,
		"work_status" => "Non European National"
	],
	[
		"id" => 8628,
		"user_id" => 11927,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8630,
		"user_id" => 11929,
		"work_status" => "European National"
	],
	[
		"id" => 24877,
		"user_id" => 30441,
		"work_status" => "Non European National"
	],
	[
		"id" => 8632,
		"user_id" => 11931,
		"work_status" => "0"
	],
	[
		"id" => 19696,
		"user_id" => 24243,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8634,
		"user_id" => 11933,
		"work_status" => "0"
	],
	[
		"id" => 8635,
		"user_id" => 11936,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23293,
		"user_id" => 28819,
		"work_status" => "Non European National"
	],
	[
		"id" => 8637,
		"user_id" => 11938,
		"work_status" => "European National"
	],
	[
		"id" => 22389,
		"user_id" => 27915,
		"work_status" => "Non European National"
	],
	[
		"id" => 8639,
		"user_id" => 11941,
		"work_status" => "0"
	],
	[
		"id" => 8640,
		"user_id" => 11943,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18900,
		"user_id" => 23447,
		"work_status" => "European National"
	],
	[
		"id" => 23502,
		"user_id" => 29066,
		"work_status" => "European National"
	],
	[
		"id" => 8757,
		"user_id" => 12144,
		"work_status" => "European National"
	],
	[
		"id" => 8642,
		"user_id" => 11946,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8643,
		"user_id" => 11948,
		"work_status" => "Non European National"
	],
	[
		"id" => 15236,
		"user_id" => 19040,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19408,
		"user_id" => 23955,
		"work_status" => "European National"
	],
	[
		"id" => 22844,
		"user_id" => 28370,
		"work_status" => "Non European National"
	],
	[
		"id" => 8648,
		"user_id" => 11955,
		"work_status" => "0"
	],
	[
		"id" => 24598,
		"user_id" => 30162,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8652,
		"user_id" => 11963,
		"work_status" => "Non European National"
	],
	[
		"id" => 8653,
		"user_id" => 11965,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8654,
		"user_id" => 11969,
		"work_status" => "European National"
	],
	[
		"id" => 8655,
		"user_id" => 11970,
		"work_status" => "Non European National"
	],
	[
		"id" => 14477,
		"user_id" => 18281,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15250,
		"user_id" => 19054,
		"work_status" => "European National"
	],
	[
		"id" => 8658,
		"user_id" => 11980,
		"work_status" => "0"
	],
	[
		"id" => 8660,
		"user_id" => 11985,
		"work_status" => "Non European National"
	],
	[
		"id" => 8683,
		"user_id" => 12020,
		"work_status" => "0"
	],
	[
		"id" => 8684,
		"user_id" => 12021,
		"work_status" => "Non European National"
	],
	[
		"id" => 8685,
		"user_id" => 11990,
		"work_status" => "European National"
	],
	[
		"id" => 8686,
		"user_id" => 12027,
		"work_status" => "Non European National"
	],
	[
		"id" => 13738,
		"user_id" => 17542,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8688,
		"user_id" => 12031,
		"work_status" => "European National"
	],
	[
		"id" => 19780,
		"user_id" => 24327,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8690,
		"user_id" => 12033,
		"work_status" => "0"
	],
	[
		"id" => 12321,
		"user_id" => 15961,
		"work_status" => "European National"
	],
	[
		"id" => 8695,
		"user_id" => 12043,
		"work_status" => "Non European National"
	],
	[
		"id" => 15021,
		"user_id" => 18825,
		"work_status" => "European National"
	],
	[
		"id" => 26430,
		"user_id" => 0,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8698,
		"user_id" => 12052,
		"work_status" => "Non European National"
	],
	[
		"id" => 8699,
		"user_id" => 12053,
		"work_status" => "0"
	],
	[
		"id" => 8700,
		"user_id" => 12054,
		"work_status" => "Non European National"
	],
	[
		"id" => 8702,
		"user_id" => 12058,
		"work_status" => "0"
	],
	[
		"id" => 8703,
		"user_id" => 12063,
		"work_status" => "0"
	],
	[
		"id" => 8704,
		"user_id" => 12062,
		"work_status" => "Non European National"
	],
	[
		"id" => 8705,
		"user_id" => 12064,
		"work_status" => "0"
	],
	[
		"id" => 8707,
		"user_id" => 12068,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12470,
		"user_id" => 16110,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23208,
		"user_id" => 28734,
		"work_status" => "Non European National"
	],
	[
		"id" => 13692,
		"user_id" => 17496,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8710,
		"user_id" => 12074,
		"work_status" => "0"
	],
	[
		"id" => 8711,
		"user_id" => 12075,
		"work_status" => "0"
	],
	[
		"id" => 8712,
		"user_id" => 12076,
		"work_status" => "0"
	],
	[
		"id" => 8713,
		"user_id" => 12077,
		"work_status" => "European National"
	],
	[
		"id" => 8714,
		"user_id" => 12078,
		"work_status" => "European National"
	],
	[
		"id" => 18932,
		"user_id" => 23479,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24497,
		"user_id" => 30061,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8717,
		"user_id" => 12069,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8718,
		"user_id" => 12082,
		"work_status" => "0"
	],
	[
		"id" => 8719,
		"user_id" => 12083,
		"work_status" => "0"
	],
	[
		"id" => 15037,
		"user_id" => 18841,
		"work_status" => "Non European National"
	],
	[
		"id" => 19867,
		"user_id" => 24414,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8722,
		"user_id" => 12086,
		"work_status" => "0"
	],
	[
		"id" => 8723,
		"user_id" => 12087,
		"work_status" => "Non European National"
	],
	[
		"id" => 8725,
		"user_id" => 12092,
		"work_status" => "Non European National"
	],
	[
		"id" => 8726,
		"user_id" => 12095,
		"work_status" => "0"
	],
	[
		"id" => 8727,
		"user_id" => 12098,
		"work_status" => "European National"
	],
	[
		"id" => 8728,
		"user_id" => 12099,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8729,
		"user_id" => 12101,
		"work_status" => "0"
	],
	[
		"id" => 8730,
		"user_id" => 12103,
		"work_status" => "0"
	],
	[
		"id" => 24592,
		"user_id" => 30156,
		"work_status" => "Non European National"
	],
	[
		"id" => 8732,
		"user_id" => 12096,
		"work_status" => "0"
	],
	[
		"id" => 14729,
		"user_id" => 18533,
		"work_status" => "European National"
	],
	[
		"id" => 23408,
		"user_id" => 28962,
		"work_status" => "European National"
	],
	[
		"id" => 8734,
		"user_id" => 12109,
		"work_status" => "0"
	],
	[
		"id" => 8735,
		"user_id" => 12112,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8736,
		"user_id" => 12113,
		"work_status" => "0"
	],
	[
		"id" => 8739,
		"user_id" => 12120,
		"work_status" => "European National"
	],
	[
		"id" => 8742,
		"user_id" => 12124,
		"work_status" => "Non European National"
	],
	[
		"id" => 13301,
		"user_id" => 17105,
		"work_status" => "European National"
	],
	[
		"id" => 19222,
		"user_id" => 23769,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8745,
		"user_id" => 12125,
		"work_status" => "Non European National"
	],
	[
		"id" => 8746,
		"user_id" => 12126,
		"work_status" => "Non European National"
	],
	[
		"id" => 13991,
		"user_id" => 17795,
		"work_status" => "European National"
	],
	[
		"id" => 8748,
		"user_id" => 12128,
		"work_status" => "0"
	],
	[
		"id" => 19754,
		"user_id" => 24301,
		"work_status" => "European National"
	],
	[
		"id" => 25199,
		"user_id" => 20943,
		"work_status" => "Non European National"
	],
	[
		"id" => 22558,
		"user_id" => 28084,
		"work_status" => "Non European National"
	],
	[
		"id" => 8758,
		"user_id" => 12147,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14387,
		"user_id" => 18191,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24469,
		"user_id" => 30033,
		"work_status" => "European National"
	],
	[
		"id" => 8761,
		"user_id" => 12157,
		"work_status" => "European National"
	],
	[
		"id" => 8763,
		"user_id" => 12159,
		"work_status" => "Non European National"
	],
	[
		"id" => 14658,
		"user_id" => 18462,
		"work_status" => "Non European National"
	],
	[
		"id" => 8765,
		"user_id" => 12164,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8766,
		"user_id" => 12165,
		"work_status" => "0"
	],
	[
		"id" => 8767,
		"user_id" => 12166,
		"work_status" => "0"
	],
	[
		"id" => 8768,
		"user_id" => 12167,
		"work_status" => "Non European National"
	],
	[
		"id" => 8769,
		"user_id" => 12168,
		"work_status" => "0"
	],
	[
		"id" => 8770,
		"user_id" => 12169,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8773,
		"user_id" => 12172,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8774,
		"user_id" => 12175,
		"work_status" => "0"
	],
	[
		"id" => 8776,
		"user_id" => 12177,
		"work_status" => "0"
	],
	[
		"id" => 8777,
		"user_id" => 12178,
		"work_status" => "Non European National"
	],
	[
		"id" => 27300,
		"user_id" => 34019,
		"work_status" => "0"
	],
	[
		"id" => 27301,
		"user_id" => 34020,
		"work_status" => "Non European National"
	],
	[
		"id" => 8779,
		"user_id" => 12180,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8780,
		"user_id" => 12183,
		"work_status" => "0"
	],
	[
		"id" => 8781,
		"user_id" => 12185,
		"work_status" => "0"
	],
	[
		"id" => 8782,
		"user_id" => 12187,
		"work_status" => "Non European National"
	],
	[
		"id" => 8784,
		"user_id" => 12191,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14520,
		"user_id" => 18324,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19072,
		"user_id" => 23619,
		"work_status" => "European National"
	],
	[
		"id" => 22100,
		"user_id" => 27626,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8792,
		"user_id" => 12200,
		"work_status" => "European National"
	],
	[
		"id" => 8793,
		"user_id" => 12201,
		"work_status" => "0"
	],
	[
		"id" => 8795,
		"user_id" => 12203,
		"work_status" => "Non European National"
	],
	[
		"id" => 24572,
		"user_id" => 30136,
		"work_status" => "European National"
	],
	[
		"id" => 8797,
		"user_id" => 12115,
		"work_status" => "Non European National"
	],
	[
		"id" => 8798,
		"user_id" => 12205,
		"work_status" => "European National"
	],
	[
		"id" => 8799,
		"user_id" => 12206,
		"work_status" => "0"
	],
	[
		"id" => 8800,
		"user_id" => 12207,
		"work_status" => "0"
	],
	[
		"id" => 8801,
		"user_id" => 12210,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8802,
		"user_id" => 12213,
		"work_status" => "Non European National"
	],
	[
		"id" => 8803,
		"user_id" => 12214,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8804,
		"user_id" => 12217,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8806,
		"user_id" => 12219,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8807,
		"user_id" => 12220,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8808,
		"user_id" => 12221,
		"work_status" => "0"
	],
	[
		"id" => 19085,
		"user_id" => 23632,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8810,
		"user_id" => 12224,
		"work_status" => "Non European National"
	],
	[
		"id" => 8811,
		"user_id" => 12225,
		"work_status" => "European National"
	],
	[
		"id" => 8812,
		"user_id" => 12226,
		"work_status" => "Non European National"
	],
	[
		"id" => 8813,
		"user_id" => 12227,
		"work_status" => "0"
	],
	[
		"id" => 8814,
		"user_id" => 12228,
		"work_status" => "0"
	],
	[
		"id" => 8816,
		"user_id" => 12231,
		"work_status" => "European National"
	],
	[
		"id" => 8818,
		"user_id" => 12236,
		"work_status" => "0"
	],
	[
		"id" => 8819,
		"user_id" => 12237,
		"work_status" => "0"
	],
	[
		"id" => 8820,
		"user_id" => 12238,
		"work_status" => "0"
	],
	[
		"id" => 14552,
		"user_id" => 18356,
		"work_status" => "European National"
	],
	[
		"id" => 8822,
		"user_id" => 12241,
		"work_status" => "Non European National"
	],
	[
		"id" => 15612,
		"user_id" => 19521,
		"work_status" => "0"
	],
	[
		"id" => 15613,
		"user_id" => 19523,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8824,
		"user_id" => 12243,
		"work_status" => "0"
	],
	[
		"id" => 8825,
		"user_id" => 12244,
		"work_status" => "0"
	],
	[
		"id" => 22513,
		"user_id" => 28039,
		"work_status" => "Non European National"
	],
	[
		"id" => 8826,
		"user_id" => 12248,
		"work_status" => "0"
	],
	[
		"id" => 8827,
		"user_id" => 12250,
		"work_status" => "0"
	],
	[
		"id" => 8828,
		"user_id" => 12252,
		"work_status" => "0"
	],
	[
		"id" => 8830,
		"user_id" => 12254,
		"work_status" => "European National"
	],
	[
		"id" => 14236,
		"user_id" => 18040,
		"work_status" => "European National"
	],
	[
		"id" => 8832,
		"user_id" => 12261,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8833,
		"user_id" => 12262,
		"work_status" => "0"
	],
	[
		"id" => 19250,
		"user_id" => 23797,
		"work_status" => "European National"
	],
	[
		"id" => 8835,
		"user_id" => 12264,
		"work_status" => "Non European National"
	],
	[
		"id" => 18931,
		"user_id" => 23478,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8838,
		"user_id" => 12271,
		"work_status" => "0"
	],
	[
		"id" => 15194,
		"user_id" => 18998,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13485,
		"user_id" => 17289,
		"work_status" => "European National"
	],
	[
		"id" => 8842,
		"user_id" => 12280,
		"work_status" => "European National"
	],
	[
		"id" => 23837,
		"user_id" => 29401,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24453,
		"user_id" => 30017,
		"work_status" => "European National"
	],
	[
		"id" => 8847,
		"user_id" => 12291,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8848,
		"user_id" => 12293,
		"work_status" => "Non European National"
	],
	[
		"id" => 19356,
		"user_id" => 23903,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19343,
		"user_id" => 23890,
		"work_status" => "European National"
	],
	[
		"id" => 19464,
		"user_id" => 24011,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14984,
		"user_id" => 18788,
		"work_status" => "European National"
	],
	[
		"id" => 8852,
		"user_id" => 12298,
		"work_status" => "0"
	],
	[
		"id" => 8853,
		"user_id" => 12300,
		"work_status" => "European National"
	],
	[
		"id" => 8855,
		"user_id" => 12303,
		"work_status" => "European National"
	],
	[
		"id" => 8857,
		"user_id" => 12307,
		"work_status" => "European National"
	],
	[
		"id" => 14360,
		"user_id" => 18164,
		"work_status" => "European National"
	],
	[
		"id" => 19150,
		"user_id" => 23697,
		"work_status" => "European National"
	],
	[
		"id" => 8859,
		"user_id" => 12312,
		"work_status" => "0"
	],
	[
		"id" => 8860,
		"user_id" => 12314,
		"work_status" => "0"
	],
	[
		"id" => 8862,
		"user_id" => 12317,
		"work_status" => "0"
	],
	[
		"id" => 8863,
		"user_id" => 12320,
		"work_status" => "0"
	],
	[
		"id" => 23503,
		"user_id" => 29067,
		"work_status" => "Non European National"
	],
	[
		"id" => 8865,
		"user_id" => 12323,
		"work_status" => "European National"
	],
	[
		"id" => 8866,
		"user_id" => 12326,
		"work_status" => "0"
	],
	[
		"id" => 8867,
		"user_id" => 12327,
		"work_status" => "0"
	],
	[
		"id" => 8872,
		"user_id" => 11914,
		"work_status" => "Non European National"
	],
	[
		"id" => 8868,
		"user_id" => 12329,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14110,
		"user_id" => 17914,
		"work_status" => "European National"
	],
	[
		"id" => 8871,
		"user_id" => 12336,
		"work_status" => "European National"
	],
	[
		"id" => 8873,
		"user_id" => 12337,
		"work_status" => "European National"
	],
	[
		"id" => 8874,
		"user_id" => 12343,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8876,
		"user_id" => 12348,
		"work_status" => "0"
	],
	[
		"id" => 8877,
		"user_id" => 12350,
		"work_status" => "0"
	],
	[
		"id" => 8878,
		"user_id" => 12351,
		"work_status" => "European National"
	],
	[
		"id" => 13589,
		"user_id" => 17393,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14789,
		"user_id" => 18593,
		"work_status" => "Non European National"
	],
	[
		"id" => 8882,
		"user_id" => 12359,
		"work_status" => "European National"
	],
	[
		"id" => 8884,
		"user_id" => 12363,
		"work_status" => "0"
	],
	[
		"id" => 8885,
		"user_id" => 12364,
		"work_status" => "0"
	],
	[
		"id" => 8887,
		"user_id" => 12365,
		"work_status" => "European National"
	],
	[
		"id" => 19263,
		"user_id" => 23810,
		"work_status" => "Non European National"
	],
	[
		"id" => 8889,
		"user_id" => 12368,
		"work_status" => "European National"
	],
	[
		"id" => 8890,
		"user_id" => 12370,
		"work_status" => "0"
	],
	[
		"id" => 14488,
		"user_id" => 18292,
		"work_status" => "Non European National"
	],
	[
		"id" => 24399,
		"user_id" => 29963,
		"work_status" => "Non European National"
	],
	[
		"id" => 8893,
		"user_id" => 12372,
		"work_status" => "European National"
	],
	[
		"id" => 8898,
		"user_id" => 12378,
		"work_status" => "0"
	],
	[
		"id" => 19833,
		"user_id" => 24380,
		"work_status" => "European National"
	],
	[
		"id" => 8900,
		"user_id" => 12381,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19903,
		"user_id" => 24450,
		"work_status" => "European National"
	],
	[
		"id" => 15339,
		"user_id" => 19143,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8903,
		"user_id" => 12384,
		"work_status" => "Non European National"
	],
	[
		"id" => 8904,
		"user_id" => 12385,
		"work_status" => "European National"
	],
	[
		"id" => 22593,
		"user_id" => 28119,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13789,
		"user_id" => 17593,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8906,
		"user_id" => 12390,
		"work_status" => "0"
	],
	[
		"id" => 13969,
		"user_id" => 17773,
		"work_status" => "European National"
	],
	[
		"id" => 8909,
		"user_id" => 12392,
		"work_status" => "European National"
	],
	[
		"id" => 13799,
		"user_id" => 17603,
		"work_status" => "European National"
	],
	[
		"id" => 24749,
		"user_id" => 30313,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14508,
		"user_id" => 18312,
		"work_status" => "Non European National"
	],
	[
		"id" => 8913,
		"user_id" => 12396,
		"work_status" => "0"
	],
	[
		"id" => 23495,
		"user_id" => 29059,
		"work_status" => "Non European National"
	],
	[
		"id" => 8915,
		"user_id" => 12398,
		"work_status" => "European National"
	],
	[
		"id" => 8919,
		"user_id" => 12402,
		"work_status" => "European National"
	],
	[
		"id" => 8920,
		"user_id" => 12405,
		"work_status" => "0"
	],
	[
		"id" => 8921,
		"user_id" => 12407,
		"work_status" => "0"
	],
	[
		"id" => 8922,
		"user_id" => 12408,
		"work_status" => "European National"
	],
	[
		"id" => 8923,
		"user_id" => 12409,
		"work_status" => "0"
	],
	[
		"id" => 8926,
		"user_id" => 12414,
		"work_status" => "0"
	],
	[
		"id" => 8927,
		"user_id" => 12417,
		"work_status" => "0"
	],
	[
		"id" => 19320,
		"user_id" => 23867,
		"work_status" => "European National"
	],
	[
		"id" => 8930,
		"user_id" => 12423,
		"work_status" => "0"
	],
	[
		"id" => 8931,
		"user_id" => 12424,
		"work_status" => "0"
	],
	[
		"id" => 8932,
		"user_id" => 12426,
		"work_status" => "0"
	],
	[
		"id" => 13330,
		"user_id" => 17134,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8934,
		"user_id" => 12430,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8943,
		"user_id" => 12441,
		"work_status" => "0"
	],
	[
		"id" => 13928,
		"user_id" => 17732,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8946,
		"user_id" => 12448,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8947,
		"user_id" => 12449,
		"work_status" => "Non European National"
	],
	[
		"id" => 24559,
		"user_id" => 30123,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8949,
		"user_id" => 12451,
		"work_status" => "Non European National"
	],
	[
		"id" => 23823,
		"user_id" => 29387,
		"work_status" => "Non European National"
	],
	[
		"id" => 19425,
		"user_id" => 23972,
		"work_status" => "Non European National"
	],
	[
		"id" => 13691,
		"user_id" => 17495,
		"work_status" => "European National"
	],
	[
		"id" => 18843,
		"user_id" => 23390,
		"work_status" => "European National"
	],
	[
		"id" => 24447,
		"user_id" => 30011,
		"work_status" => "European National"
	],
	[
		"id" => 14778,
		"user_id" => 18582,
		"work_status" => "European National"
	],
	[
		"id" => 8957,
		"user_id" => 12464,
		"work_status" => "Non European National"
	],
	[
		"id" => 8961,
		"user_id" => 11771,
		"work_status" => "Non European National"
	],
	[
		"id" => 8962,
		"user_id" => 12469,
		"work_status" => "European National"
	],
	[
		"id" => 8963,
		"user_id" => 12471,
		"work_status" => "Non European National"
	],
	[
		"id" => 8964,
		"user_id" => 12472,
		"work_status" => "European National"
	],
	[
		"id" => 8965,
		"user_id" => 12473,
		"work_status" => "European National"
	],
	[
		"id" => 14995,
		"user_id" => 18799,
		"work_status" => "European National"
	],
	[
		"id" => 23613,
		"user_id" => 29177,
		"work_status" => "Non European National"
	],
	[
		"id" => 13264,
		"user_id" => 17068,
		"work_status" => "Non European National"
	],
	[
		"id" => 14878,
		"user_id" => 18682,
		"work_status" => "Non European National"
	],
	[
		"id" => 14393,
		"user_id" => 18197,
		"work_status" => "European National"
	],
	[
		"id" => 8972,
		"user_id" => 12483,
		"work_status" => "0"
	],
	[
		"id" => 8973,
		"user_id" => 12485,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12930,
		"user_id" => 16640,
		"work_status" => "Non European National"
	],
	[
		"id" => 8975,
		"user_id" => 12488,
		"work_status" => "0"
	],
	[
		"id" => 14171,
		"user_id" => 17975,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8977,
		"user_id" => 12492,
		"work_status" => "Non European National"
	],
	[
		"id" => 18963,
		"user_id" => 23510,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8979,
		"user_id" => 12495,
		"work_status" => "Non European National"
	],
	[
		"id" => 18798,
		"user_id" => 23345,
		"work_status" => "European National"
	],
	[
		"id" => 8983,
		"user_id" => 12506,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24402,
		"user_id" => 29966,
		"work_status" => "Non European National"
	],
	[
		"id" => 14131,
		"user_id" => 17935,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14880,
		"user_id" => 18684,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8988,
		"user_id" => 12509,
		"work_status" => "European National"
	],
	[
		"id" => 8989,
		"user_id" => 12512,
		"work_status" => "Non European National"
	],
	[
		"id" => 8991,
		"user_id" => 12514,
		"work_status" => "0"
	],
	[
		"id" => 8993,
		"user_id" => 12522,
		"work_status" => "European National"
	],
	[
		"id" => 14699,
		"user_id" => 18503,
		"work_status" => "Non European National"
	],
	[
		"id" => 8995,
		"user_id" => 12524,
		"work_status" => "0"
	],
	[
		"id" => 8996,
		"user_id" => 12521,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 8998,
		"user_id" => 12526,
		"work_status" => "0"
	],
	[
		"id" => 24936,
		"user_id" => 30497,
		"work_status" => "European National"
	],
	[
		"id" => 9000,
		"user_id" => 12529,
		"work_status" => "Non European National"
	],
	[
		"id" => 9001,
		"user_id" => 12530,
		"work_status" => "0"
	],
	[
		"id" => 9003,
		"user_id" => 12532,
		"work_status" => "European National"
	],
	[
		"id" => 13860,
		"user_id" => 17664,
		"work_status" => "Non European National"
	],
	[
		"id" => 14183,
		"user_id" => 17987,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9006,
		"user_id" => 12534,
		"work_status" => "Non European National"
	],
	[
		"id" => 22753,
		"user_id" => 28279,
		"work_status" => "Non European National"
	],
	[
		"id" => 9009,
		"user_id" => 12538,
		"work_status" => "0"
	],
	[
		"id" => 9010,
		"user_id" => 12539,
		"work_status" => "0"
	],
	[
		"id" => 9011,
		"user_id" => 12499,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9012,
		"user_id" => 12542,
		"work_status" => "0"
	],
	[
		"id" => 9013,
		"user_id" => 12543,
		"work_status" => "0"
	],
	[
		"id" => 9014,
		"user_id" => 12545,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14496,
		"user_id" => 18300,
		"work_status" => "Non European National"
	],
	[
		"id" => 9017,
		"user_id" => 12548,
		"work_status" => "Non European National"
	],
	[
		"id" => 9018,
		"user_id" => 12549,
		"work_status" => "0"
	],
	[
		"id" => 25784,
		"user_id" => 31903,
		"work_status" => "Non European National"
	],
	[
		"id" => 9021,
		"user_id" => 12554,
		"work_status" => "0"
	],
	[
		"id" => 9022,
		"user_id" => 12558,
		"work_status" => "0"
	],
	[
		"id" => 9023,
		"user_id" => 12559,
		"work_status" => "0"
	],
	[
		"id" => 23437,
		"user_id" => 28996,
		"work_status" => "European National"
	],
	[
		"id" => 15364,
		"user_id" => 19168,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13450,
		"user_id" => 17254,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9026,
		"user_id" => 12562,
		"work_status" => "European National"
	],
	[
		"id" => 19379,
		"user_id" => 23926,
		"work_status" => "European National"
	],
	[
		"id" => 9029,
		"user_id" => 12567,
		"work_status" => "0"
	],
	[
		"id" => 9030,
		"user_id" => 12574,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9031,
		"user_id" => 12575,
		"work_status" => "0"
	],
	[
		"id" => 9032,
		"user_id" => 12576,
		"work_status" => "European National"
	],
	[
		"id" => 9033,
		"user_id" => 12577,
		"work_status" => "0"
	],
	[
		"id" => 20175,
		"user_id" => 24880,
		"work_status" => "0"
	],
	[
		"id" => 9035,
		"user_id" => 12273,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9036,
		"user_id" => 12580,
		"work_status" => "Non European National"
	],
	[
		"id" => 9037,
		"user_id" => 12581,
		"work_status" => "European National"
	],
	[
		"id" => 9038,
		"user_id" => 12582,
		"work_status" => "0"
	],
	[
		"id" => 9039,
		"user_id" => 12583,
		"work_status" => "0"
	],
	[
		"id" => 19169,
		"user_id" => 23716,
		"work_status" => "Non European National"
	],
	[
		"id" => 14755,
		"user_id" => 18559,
		"work_status" => "European National"
	],
	[
		"id" => 9046,
		"user_id" => 12599,
		"work_status" => "European National"
	],
	[
		"id" => 9047,
		"user_id" => 12600,
		"work_status" => "0"
	],
	[
		"id" => 9048,
		"user_id" => 12601,
		"work_status" => "European National"
	],
	[
		"id" => 9049,
		"user_id" => 12605,
		"work_status" => "0"
	],
	[
		"id" => 13575,
		"user_id" => 17379,
		"work_status" => "Non European National"
	],
	[
		"id" => 9052,
		"user_id" => 12611,
		"work_status" => "0"
	],
	[
		"id" => 9053,
		"user_id" => 12612,
		"work_status" => "European National"
	],
	[
		"id" => 18799,
		"user_id" => 23346,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14137,
		"user_id" => 17941,
		"work_status" => "Non European National"
	],
	[
		"id" => 9056,
		"user_id" => 12619,
		"work_status" => "0"
	],
	[
		"id" => 22853,
		"user_id" => 28379,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15099,
		"user_id" => 18903,
		"work_status" => "Non European National"
	],
	[
		"id" => 9060,
		"user_id" => 12622,
		"work_status" => "0"
	],
	[
		"id" => 9061,
		"user_id" => 12623,
		"work_status" => "Non European National"
	],
	[
		"id" => 19875,
		"user_id" => 24422,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20165,
		"user_id" => 24868,
		"work_status" => "0"
	],
	[
		"id" => 23740,
		"user_id" => 29304,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9064,
		"user_id" => 12629,
		"work_status" => "Non European National"
	],
	[
		"id" => 24382,
		"user_id" => 29946,
		"work_status" => "European National"
	],
	[
		"id" => 9070,
		"user_id" => 12638,
		"work_status" => "0"
	],
	[
		"id" => 13770,
		"user_id" => 17574,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13721,
		"user_id" => 17525,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9076,
		"user_id" => 12647,
		"work_status" => "Non European National"
	],
	[
		"id" => 9078,
		"user_id" => 12649,
		"work_status" => "European National"
	],
	[
		"id" => 19267,
		"user_id" => 23814,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9079,
		"user_id" => 12651,
		"work_status" => "0"
	],
	[
		"id" => 15239,
		"user_id" => 19043,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9081,
		"user_id" => 12656,
		"work_status" => "0"
	],
	[
		"id" => 9082,
		"user_id" => 12657,
		"work_status" => "European National"
	],
	[
		"id" => 9083,
		"user_id" => 12659,
		"work_status" => "European National"
	],
	[
		"id" => 9084,
		"user_id" => 12662,
		"work_status" => "Non European National"
	],
	[
		"id" => 22502,
		"user_id" => 28028,
		"work_status" => "Non European National"
	],
	[
		"id" => 9088,
		"user_id" => 12668,
		"work_status" => "0"
	],
	[
		"id" => 22356,
		"user_id" => 27882,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19210,
		"user_id" => 23757,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23842,
		"user_id" => 29406,
		"work_status" => "European National"
	],
	[
		"id" => 9092,
		"user_id" => 12673,
		"work_status" => "0"
	],
	[
		"id" => 16646,
		"user_id" => 21083,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16647,
		"user_id" => 21085,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16648,
		"user_id" => 21068,
		"work_status" => "0"
	],
	[
		"id" => 9096,
		"user_id" => 12680,
		"work_status" => "0"
	],
	[
		"id" => 13714,
		"user_id" => 17518,
		"work_status" => "Non European National"
	],
	[
		"id" => 9098,
		"user_id" => 12684,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9099,
		"user_id" => 12685,
		"work_status" => "0"
	],
	[
		"id" => 9100,
		"user_id" => 12686,
		"work_status" => "Non European National"
	],
	[
		"id" => 9101,
		"user_id" => 12687,
		"work_status" => "European National"
	],
	[
		"id" => 9102,
		"user_id" => 12677,
		"work_status" => "Non European National"
	],
	[
		"id" => 9104,
		"user_id" => 12691,
		"work_status" => "Non European National"
	],
	[
		"id" => 9105,
		"user_id" => 12692,
		"work_status" => "0"
	],
	[
		"id" => 23681,
		"user_id" => 29245,
		"work_status" => "European National"
	],
	[
		"id" => 9107,
		"user_id" => 12695,
		"work_status" => "European National"
	],
	[
		"id" => 9108,
		"user_id" => 12696,
		"work_status" => "Non European National"
	],
	[
		"id" => 26423,
		"user_id" => 32812,
		"work_status" => "European National"
	],
	[
		"id" => 9111,
		"user_id" => 12699,
		"work_status" => "European National"
	],
	[
		"id" => 9112,
		"user_id" => 12701,
		"work_status" => "0"
	],
	[
		"id" => 9113,
		"user_id" => 12702,
		"work_status" => "European National"
	],
	[
		"id" => 9115,
		"user_id" => 12704,
		"work_status" => "Non European National"
	],
	[
		"id" => 9116,
		"user_id" => 12705,
		"work_status" => "Non European National"
	],
	[
		"id" => 23706,
		"user_id" => 29270,
		"work_status" => "European National"
	],
	[
		"id" => 9118,
		"user_id" => 12706,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9120,
		"user_id" => 12709,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14170,
		"user_id" => 17974,
		"work_status" => "European National"
	],
	[
		"id" => 19774,
		"user_id" => 24321,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13587,
		"user_id" => 17391,
		"work_status" => "Non European National"
	],
	[
		"id" => 14308,
		"user_id" => 18112,
		"work_status" => "European National"
	],
	[
		"id" => 9125,
		"user_id" => 12714,
		"work_status" => "0"
	],
	[
		"id" => 9126,
		"user_id" => 12716,
		"work_status" => "0"
	],
	[
		"id" => 9127,
		"user_id" => 12718,
		"work_status" => "Non European National"
	],
	[
		"id" => 23466,
		"user_id" => 29030,
		"work_status" => "European National"
	],
	[
		"id" => 9128,
		"user_id" => 12719,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13694,
		"user_id" => 17498,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9131,
		"user_id" => 12722,
		"work_status" => "0"
	],
	[
		"id" => 18804,
		"user_id" => 23351,
		"work_status" => "Non European National"
	],
	[
		"id" => 14765,
		"user_id" => 18569,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9134,
		"user_id" => 12726,
		"work_status" => "0"
	],
	[
		"id" => 9135,
		"user_id" => 12727,
		"work_status" => "Non European National"
	],
	[
		"id" => 9136,
		"user_id" => 12728,
		"work_status" => "0"
	],
	[
		"id" => 9137,
		"user_id" => 12729,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9138,
		"user_id" => 12731,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9139,
		"user_id" => 12733,
		"work_status" => "Non European National"
	],
	[
		"id" => 14795,
		"user_id" => 18599,
		"work_status" => "European National"
	],
	[
		"id" => 19308,
		"user_id" => 23855,
		"work_status" => "European National"
	],
	[
		"id" => 9142,
		"user_id" => 12740,
		"work_status" => "0"
	],
	[
		"id" => 9143,
		"user_id" => 12741,
		"work_status" => "European National"
	],
	[
		"id" => 9144,
		"user_id" => 12742,
		"work_status" => "0"
	],
	[
		"id" => 9145,
		"user_id" => 12743,
		"work_status" => "Non European National"
	],
	[
		"id" => 9146,
		"user_id" => 12744,
		"work_status" => "0"
	],
	[
		"id" => 9147,
		"user_id" => 12745,
		"work_status" => "Non European National"
	],
	[
		"id" => 9149,
		"user_id" => 12748,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15269,
		"user_id" => 19073,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19186,
		"user_id" => 23733,
		"work_status" => "European National"
	],
	[
		"id" => 9153,
		"user_id" => 12755,
		"work_status" => "Non European National"
	],
	[
		"id" => 14181,
		"user_id" => 17985,
		"work_status" => "Non European National"
	],
	[
		"id" => 9155,
		"user_id" => 12763,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9156,
		"user_id" => 12764,
		"work_status" => "0"
	],
	[
		"id" => 9157,
		"user_id" => 12765,
		"work_status" => "European National"
	],
	[
		"id" => 14077,
		"user_id" => 17881,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18974,
		"user_id" => 23521,
		"work_status" => "Non European National"
	],
	[
		"id" => 9160,
		"user_id" => 12770,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13886,
		"user_id" => 17690,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9162,
		"user_id" => 12773,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19681,
		"user_id" => 24228,
		"work_status" => "Non European National"
	],
	[
		"id" => 9164,
		"user_id" => 12776,
		"work_status" => "European National"
	],
	[
		"id" => 19458,
		"user_id" => 24005,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9166,
		"user_id" => 12778,
		"work_status" => "European National"
	],
	[
		"id" => 9168,
		"user_id" => 12779,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9169,
		"user_id" => 12780,
		"work_status" => "European National"
	],
	[
		"id" => 9171,
		"user_id" => 12768,
		"work_status" => "Non European National"
	],
	[
		"id" => 9173,
		"user_id" => 12783,
		"work_status" => "0"
	],
	[
		"id" => 9174,
		"user_id" => 12784,
		"work_status" => "0"
	],
	[
		"id" => 9175,
		"user_id" => 10481,
		"work_status" => "0"
	],
	[
		"id" => 18834,
		"user_id" => 23381,
		"work_status" => "Non European National"
	],
	[
		"id" => 9177,
		"user_id" => 12786,
		"work_status" => "0"
	],
	[
		"id" => 9178,
		"user_id" => 12787,
		"work_status" => "European National"
	],
	[
		"id" => 9179,
		"user_id" => 12790,
		"work_status" => "Non European National"
	],
	[
		"id" => 9180,
		"user_id" => 12791,
		"work_status" => "0"
	],
	[
		"id" => 14928,
		"user_id" => 18732,
		"work_status" => "Non European National"
	],
	[
		"id" => 9182,
		"user_id" => 12793,
		"work_status" => "Non European National"
	],
	[
		"id" => 13530,
		"user_id" => 17334,
		"work_status" => "European National"
	],
	[
		"id" => 9184,
		"user_id" => 12795,
		"work_status" => "Non European National"
	],
	[
		"id" => 16718,
		"user_id" => 21184,
		"work_status" => "European National"
	],
	[
		"id" => 23743,
		"user_id" => 29307,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9190,
		"user_id" => 12804,
		"work_status" => "European National"
	],
	[
		"id" => 14319,
		"user_id" => 18123,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9192,
		"user_id" => 12808,
		"work_status" => "0"
	],
	[
		"id" => 9448,
		"user_id" => 13073,
		"work_status" => "Non European National"
	],
	[
		"id" => 9193,
		"user_id" => 12809,
		"work_status" => "Non European National"
	],
	[
		"id" => 9195,
		"user_id" => 12813,
		"work_status" => "European National"
	],
	[
		"id" => 9196,
		"user_id" => 12814,
		"work_status" => "European National"
	],
	[
		"id" => 9197,
		"user_id" => 12816,
		"work_status" => "0"
	],
	[
		"id" => 19378,
		"user_id" => 23925,
		"work_status" => "European National"
	],
	[
		"id" => 21910,
		"user_id" => 27436,
		"work_status" => "European National"
	],
	[
		"id" => 19025,
		"user_id" => 23572,
		"work_status" => "European National"
	],
	[
		"id" => 9202,
		"user_id" => 12822,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19069,
		"user_id" => 23616,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15372,
		"user_id" => 19176,
		"work_status" => "Non European National"
	],
	[
		"id" => 9206,
		"user_id" => 12830,
		"work_status" => "0"
	],
	[
		"id" => 25791,
		"user_id" => 31910,
		"work_status" => "European National"
	],
	[
		"id" => 9208,
		"user_id" => 12788,
		"work_status" => "Non European National"
	],
	[
		"id" => 22142,
		"user_id" => 27668,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9211,
		"user_id" => 12835,
		"work_status" => "Non European National"
	],
	[
		"id" => 18856,
		"user_id" => 23403,
		"work_status" => "Non European National"
	],
	[
		"id" => 18938,
		"user_id" => 23485,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 9215,
		"user_id" => 12837,
		"work_status" => "European National"
	],
	[
		"id" => 13989,
		"user_id" => 17793,
		"work_status" => "Non European National"
	],
	[
		"id" => 14143,
		"user_id" => 17947,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16856,
		"user_id" => 21339,
		"work_status" => "European National"
	],
	[
		"id" => 13133,
		"user_id" => 16937,
		"work_status" => "Non European National"
	],
	[
		"id" => 13141,
		"user_id" => 16945,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13150,
		"user_id" => 16954,
		"work_status" => "European National"
	],
	[
		"id" => 13152,
		"user_id" => 16956,
		"work_status" => "European National"
	],
	[
		"id" => 13156,
		"user_id" => 16960,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13159,
		"user_id" => 16963,
		"work_status" => "European National"
	],
	[
		"id" => 13164,
		"user_id" => 16968,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13167,
		"user_id" => 16971,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13170,
		"user_id" => 16974,
		"work_status" => "Non European National"
	],
	[
		"id" => 13173,
		"user_id" => 16977,
		"work_status" => "Non European National"
	],
	[
		"id" => 13174,
		"user_id" => 16978,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13175,
		"user_id" => 16979,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16867,
		"user_id" => 21350,
		"work_status" => "Non European National"
	],
	[
		"id" => 13182,
		"user_id" => 16986,
		"work_status" => "Non European National"
	],
	[
		"id" => 13187,
		"user_id" => 16991,
		"work_status" => "Non European National"
	],
	[
		"id" => 13189,
		"user_id" => 16993,
		"work_status" => "Non European National"
	],
	[
		"id" => 13191,
		"user_id" => 16995,
		"work_status" => "Non European National"
	],
	[
		"id" => 13193,
		"user_id" => 16997,
		"work_status" => "Non European National"
	],
	[
		"id" => 13196,
		"user_id" => 17000,
		"work_status" => "Non European National"
	],
	[
		"id" => 13197,
		"user_id" => 17001,
		"work_status" => "European National"
	],
	[
		"id" => 13203,
		"user_id" => 17007,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13210,
		"user_id" => 17014,
		"work_status" => "European National"
	],
	[
		"id" => 13212,
		"user_id" => 17016,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13215,
		"user_id" => 17019,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13218,
		"user_id" => 17022,
		"work_status" => "European National"
	],
	[
		"id" => 13219,
		"user_id" => 17023,
		"work_status" => "Non European National"
	],
	[
		"id" => 13221,
		"user_id" => 17025,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13226,
		"user_id" => 17030,
		"work_status" => "Non European National"
	],
	[
		"id" => 13228,
		"user_id" => 17032,
		"work_status" => "Non European National"
	],
	[
		"id" => 13229,
		"user_id" => 17033,
		"work_status" => "Non European National"
	],
	[
		"id" => 13230,
		"user_id" => 17034,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13231,
		"user_id" => 17035,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13236,
		"user_id" => 17040,
		"work_status" => "Non European National"
	],
	[
		"id" => 13237,
		"user_id" => 17041,
		"work_status" => "European National"
	],
	[
		"id" => 13241,
		"user_id" => 17045,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13251,
		"user_id" => 17055,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13253,
		"user_id" => 17057,
		"work_status" => "European National"
	],
	[
		"id" => 21857,
		"user_id" => 27383,
		"work_status" => "European National"
	],
	[
		"id" => 13256,
		"user_id" => 17060,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13258,
		"user_id" => 17062,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13259,
		"user_id" => 17063,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23491,
		"user_id" => 29055,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20231,
		"user_id" => 24965,
		"work_status" => "0"
	],
	[
		"id" => 20232,
		"user_id" => 24966,
		"work_status" => "Non European National"
	],
	[
		"id" => 13265,
		"user_id" => 17069,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13268,
		"user_id" => 17072,
		"work_status" => "European National"
	],
	[
		"id" => 23499,
		"user_id" => 29063,
		"work_status" => "Non European National"
	],
	[
		"id" => 13271,
		"user_id" => 17075,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13273,
		"user_id" => 17077,
		"work_status" => "Non European National"
	],
	[
		"id" => 13275,
		"user_id" => 17079,
		"work_status" => "European National"
	],
	[
		"id" => 13278,
		"user_id" => 17082,
		"work_status" => "European National"
	],
	[
		"id" => 13282,
		"user_id" => 17086,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13283,
		"user_id" => 17087,
		"work_status" => "European National"
	],
	[
		"id" => 13284,
		"user_id" => 17088,
		"work_status" => "European National"
	],
	[
		"id" => 13291,
		"user_id" => 17095,
		"work_status" => "European National"
	],
	[
		"id" => 13293,
		"user_id" => 17097,
		"work_status" => "Non European National"
	],
	[
		"id" => 13296,
		"user_id" => 17100,
		"work_status" => "Non European National"
	],
	[
		"id" => 13297,
		"user_id" => 17101,
		"work_status" => "Non European National"
	],
	[
		"id" => 13298,
		"user_id" => 17102,
		"work_status" => "Non European National"
	],
	[
		"id" => 13300,
		"user_id" => 17104,
		"work_status" => "Non European National"
	],
	[
		"id" => 21895,
		"user_id" => 27421,
		"work_status" => "Non European National"
	],
	[
		"id" => 13302,
		"user_id" => 17106,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13303,
		"user_id" => 17107,
		"work_status" => "European National"
	],
	[
		"id" => 13313,
		"user_id" => 17117,
		"work_status" => "Non European National"
	],
	[
		"id" => 23519,
		"user_id" => 29083,
		"work_status" => "Non European National"
	],
	[
		"id" => 18827,
		"user_id" => 23374,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13321,
		"user_id" => 17125,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13323,
		"user_id" => 17127,
		"work_status" => "Non European National"
	],
	[
		"id" => 13331,
		"user_id" => 17135,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13333,
		"user_id" => 17137,
		"work_status" => "Non European National"
	],
	[
		"id" => 13337,
		"user_id" => 17141,
		"work_status" => "Non European National"
	],
	[
		"id" => 13340,
		"user_id" => 17144,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13343,
		"user_id" => 17147,
		"work_status" => "European National"
	],
	[
		"id" => 13344,
		"user_id" => 17148,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13350,
		"user_id" => 17154,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13353,
		"user_id" => 17157,
		"work_status" => "Non European National"
	],
	[
		"id" => 13355,
		"user_id" => 17159,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13357,
		"user_id" => 17161,
		"work_status" => "Non European National"
	],
	[
		"id" => 13360,
		"user_id" => 17164,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13364,
		"user_id" => 17168,
		"work_status" => "European National"
	],
	[
		"id" => 13366,
		"user_id" => 17170,
		"work_status" => "Non European National"
	],
	[
		"id" => 13368,
		"user_id" => 17172,
		"work_status" => "Non European National"
	],
	[
		"id" => 13369,
		"user_id" => 17173,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13371,
		"user_id" => 17175,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13373,
		"user_id" => 17177,
		"work_status" => "Non European National"
	],
	[
		"id" => 13374,
		"user_id" => 17178,
		"work_status" => "Non European National"
	],
	[
		"id" => 13376,
		"user_id" => 17180,
		"work_status" => "Non European National"
	],
	[
		"id" => 13377,
		"user_id" => 17181,
		"work_status" => "European National"
	],
	[
		"id" => 13380,
		"user_id" => 17184,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13382,
		"user_id" => 17186,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13388,
		"user_id" => 17192,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13392,
		"user_id" => 17196,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23556,
		"user_id" => 29120,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13396,
		"user_id" => 17200,
		"work_status" => "European National"
	],
	[
		"id" => 21975,
		"user_id" => 27501,
		"work_status" => "Non European National"
	],
	[
		"id" => 18879,
		"user_id" => 23426,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13406,
		"user_id" => 17210,
		"work_status" => "European National"
	],
	[
		"id" => 13412,
		"user_id" => 17216,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13413,
		"user_id" => 17217,
		"work_status" => "Non European National"
	],
	[
		"id" => 13415,
		"user_id" => 17219,
		"work_status" => "Non European National"
	],
	[
		"id" => 18881,
		"user_id" => 23428,
		"work_status" => "Non European National"
	],
	[
		"id" => 13420,
		"user_id" => 17224,
		"work_status" => "Non European National"
	],
	[
		"id" => 13423,
		"user_id" => 17227,
		"work_status" => "Non European National"
	],
	[
		"id" => 13424,
		"user_id" => 17228,
		"work_status" => "European National"
	],
	[
		"id" => 13427,
		"user_id" => 17231,
		"work_status" => "European National"
	],
	[
		"id" => 13428,
		"user_id" => 17232,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23588,
		"user_id" => 29152,
		"work_status" => "Non European National"
	],
	[
		"id" => 13430,
		"user_id" => 17234,
		"work_status" => "Non European National"
	],
	[
		"id" => 13436,
		"user_id" => 17240,
		"work_status" => "Non European National"
	],
	[
		"id" => 13439,
		"user_id" => 17243,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13443,
		"user_id" => 17247,
		"work_status" => "Non European National"
	],
	[
		"id" => 21992,
		"user_id" => 27518,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13451,
		"user_id" => 17255,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13453,
		"user_id" => 17257,
		"work_status" => "Non European National"
	],
	[
		"id" => 13456,
		"user_id" => 17260,
		"work_status" => "Non European National"
	],
	[
		"id" => 13457,
		"user_id" => 17261,
		"work_status" => "0"
	],
	[
		"id" => 13459,
		"user_id" => 17263,
		"work_status" => "European National"
	],
	[
		"id" => 13463,
		"user_id" => 17267,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13464,
		"user_id" => 17268,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13466,
		"user_id" => 17270,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13467,
		"user_id" => 17271,
		"work_status" => "European National"
	],
	[
		"id" => 13468,
		"user_id" => 17272,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13471,
		"user_id" => 17275,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13474,
		"user_id" => 17278,
		"work_status" => "European National"
	],
	[
		"id" => 13476,
		"user_id" => 17280,
		"work_status" => "Non European National"
	],
	[
		"id" => 13483,
		"user_id" => 17287,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13487,
		"user_id" => 17291,
		"work_status" => "Non European National"
	],
	[
		"id" => 13490,
		"user_id" => 17294,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13491,
		"user_id" => 17295,
		"work_status" => "Non European National"
	],
	[
		"id" => 13496,
		"user_id" => 17300,
		"work_status" => "European National"
	],
	[
		"id" => 13497,
		"user_id" => 17301,
		"work_status" => "Non European National"
	],
	[
		"id" => 13506,
		"user_id" => 17310,
		"work_status" => "European National"
	],
	[
		"id" => 18942,
		"user_id" => 23489,
		"work_status" => "Non European National"
	],
	[
		"id" => 13507,
		"user_id" => 17311,
		"work_status" => "European National"
	],
	[
		"id" => 13509,
		"user_id" => 17313,
		"work_status" => "Non European National"
	],
	[
		"id" => 13511,
		"user_id" => 17315,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13514,
		"user_id" => 17318,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13523,
		"user_id" => 17327,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13527,
		"user_id" => 17331,
		"work_status" => "European National"
	],
	[
		"id" => 13529,
		"user_id" => 17333,
		"work_status" => "European National"
	],
	[
		"id" => 13531,
		"user_id" => 17335,
		"work_status" => "Non European National"
	],
	[
		"id" => 13533,
		"user_id" => 17337,
		"work_status" => "Non European National"
	],
	[
		"id" => 13534,
		"user_id" => 17338,
		"work_status" => "Non European National"
	],
	[
		"id" => 13536,
		"user_id" => 17340,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13538,
		"user_id" => 17342,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13540,
		"user_id" => 17344,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13545,
		"user_id" => 17349,
		"work_status" => "Non European National"
	],
	[
		"id" => 13549,
		"user_id" => 17353,
		"work_status" => "Non European National"
	],
	[
		"id" => 13550,
		"user_id" => 17354,
		"work_status" => "0"
	],
	[
		"id" => 13554,
		"user_id" => 17358,
		"work_status" => "Non European National"
	],
	[
		"id" => 13555,
		"user_id" => 17359,
		"work_status" => "Non European National"
	],
	[
		"id" => 13560,
		"user_id" => 17364,
		"work_status" => "Non European National"
	],
	[
		"id" => 13561,
		"user_id" => 17365,
		"work_status" => "Non European National"
	],
	[
		"id" => 13563,
		"user_id" => 17367,
		"work_status" => "Non European National"
	],
	[
		"id" => 13565,
		"user_id" => 17369,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13567,
		"user_id" => 17371,
		"work_status" => "Non European National"
	],
	[
		"id" => 13569,
		"user_id" => 17373,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13571,
		"user_id" => 17375,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13573,
		"user_id" => 17377,
		"work_status" => "Non European National"
	],
	[
		"id" => 13574,
		"user_id" => 17378,
		"work_status" => "European National"
	],
	[
		"id" => 13582,
		"user_id" => 17386,
		"work_status" => "Non European National"
	],
	[
		"id" => 18986,
		"user_id" => 23533,
		"work_status" => "Non European National"
	],
	[
		"id" => 13588,
		"user_id" => 17392,
		"work_status" => "Non European National"
	],
	[
		"id" => 13600,
		"user_id" => 17404,
		"work_status" => "European National"
	],
	[
		"id" => 13601,
		"user_id" => 17405,
		"work_status" => "European National"
	],
	[
		"id" => 18999,
		"user_id" => 23546,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13603,
		"user_id" => 17407,
		"work_status" => "European National"
	],
	[
		"id" => 13605,
		"user_id" => 17409,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13609,
		"user_id" => 17413,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13614,
		"user_id" => 17418,
		"work_status" => "Non European National"
	],
	[
		"id" => 13618,
		"user_id" => 17422,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13620,
		"user_id" => 17424,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13621,
		"user_id" => 17425,
		"work_status" => "European National"
	],
	[
		"id" => 22152,
		"user_id" => 27678,
		"work_status" => "Non European National"
	],
	[
		"id" => 13622,
		"user_id" => 17426,
		"work_status" => "European National"
	],
	[
		"id" => 13625,
		"user_id" => 17429,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24653,
		"user_id" => 30217,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13629,
		"user_id" => 17433,
		"work_status" => "European National"
	],
	[
		"id" => 13631,
		"user_id" => 17435,
		"work_status" => "European National"
	],
	[
		"id" => 13633,
		"user_id" => 17437,
		"work_status" => "European National"
	],
	[
		"id" => 20217,
		"user_id" => 24941,
		"work_status" => "European National"
	],
	[
		"id" => 13638,
		"user_id" => 17442,
		"work_status" => "European National"
	],
	[
		"id" => 23831,
		"user_id" => 29395,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13642,
		"user_id" => 17446,
		"work_status" => "European National"
	],
	[
		"id" => 13643,
		"user_id" => 17447,
		"work_status" => "European National"
	],
	[
		"id" => 13645,
		"user_id" => 17449,
		"work_status" => "Non European National"
	],
	[
		"id" => 13649,
		"user_id" => 17453,
		"work_status" => "European National"
	],
	[
		"id" => 13650,
		"user_id" => 17454,
		"work_status" => "Non European National"
	],
	[
		"id" => 13652,
		"user_id" => 17456,
		"work_status" => "Non European National"
	],
	[
		"id" => 13653,
		"user_id" => 17457,
		"work_status" => "Non European National"
	],
	[
		"id" => 19023,
		"user_id" => 23570,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13656,
		"user_id" => 17460,
		"work_status" => "European National"
	],
	[
		"id" => 13659,
		"user_id" => 17463,
		"work_status" => "Non European National"
	],
	[
		"id" => 13661,
		"user_id" => 17465,
		"work_status" => "European National"
	],
	[
		"id" => 13662,
		"user_id" => 17466,
		"work_status" => "European National"
	],
	[
		"id" => 13666,
		"user_id" => 17470,
		"work_status" => "Non European National"
	],
	[
		"id" => 13668,
		"user_id" => 17472,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13674,
		"user_id" => 17478,
		"work_status" => "European National"
	],
	[
		"id" => 13675,
		"user_id" => 17479,
		"work_status" => "Non European National"
	],
	[
		"id" => 13676,
		"user_id" => 17480,
		"work_status" => "European National"
	],
	[
		"id" => 13679,
		"user_id" => 17483,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13680,
		"user_id" => 17484,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13686,
		"user_id" => 17490,
		"work_status" => "European National"
	],
	[
		"id" => 13688,
		"user_id" => 17492,
		"work_status" => "Non European National"
	],
	[
		"id" => 13693,
		"user_id" => 17497,
		"work_status" => "Non European National"
	],
	[
		"id" => 13697,
		"user_id" => 17501,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13699,
		"user_id" => 17503,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13701,
		"user_id" => 17505,
		"work_status" => "European National"
	],
	[
		"id" => 13704,
		"user_id" => 17508,
		"work_status" => "Non European National"
	],
	[
		"id" => 13706,
		"user_id" => 17510,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12920,
		"user_id" => 16629,
		"work_status" => "0"
	],
	[
		"id" => 19065,
		"user_id" => 23612,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13715,
		"user_id" => 17519,
		"work_status" => "Non European National"
	],
	[
		"id" => 13718,
		"user_id" => 17522,
		"work_status" => "Non European National"
	],
	[
		"id" => 19068,
		"user_id" => 23615,
		"work_status" => "European National"
	],
	[
		"id" => 22238,
		"user_id" => 27764,
		"work_status" => "Non European National"
	],
	[
		"id" => 13725,
		"user_id" => 17529,
		"work_status" => "Non European National"
	],
	[
		"id" => 13730,
		"user_id" => 17534,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13742,
		"user_id" => 17546,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13745,
		"user_id" => 17549,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13746,
		"user_id" => 17550,
		"work_status" => "European National"
	],
	[
		"id" => 13750,
		"user_id" => 17554,
		"work_status" => "Non European National"
	],
	[
		"id" => 13751,
		"user_id" => 17555,
		"work_status" => "Non European National"
	],
	[
		"id" => 19095,
		"user_id" => 23642,
		"work_status" => "European National"
	],
	[
		"id" => 13754,
		"user_id" => 17558,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13756,
		"user_id" => 17560,
		"work_status" => "Non European National"
	],
	[
		"id" => 13758,
		"user_id" => 17562,
		"work_status" => "Non European National"
	],
	[
		"id" => 13759,
		"user_id" => 17563,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13760,
		"user_id" => 17564,
		"work_status" => "Non European National"
	],
	[
		"id" => 13763,
		"user_id" => 17567,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13765,
		"user_id" => 17569,
		"work_status" => "Non European National"
	],
	[
		"id" => 13768,
		"user_id" => 17572,
		"work_status" => "0"
	],
	[
		"id" => 19106,
		"user_id" => 23653,
		"work_status" => "European National"
	],
	[
		"id" => 13777,
		"user_id" => 17581,
		"work_status" => "European National"
	],
	[
		"id" => 23775,
		"user_id" => 29339,
		"work_status" => "European National"
	],
	[
		"id" => 13779,
		"user_id" => 17583,
		"work_status" => "European National"
	],
	[
		"id" => 13781,
		"user_id" => 17585,
		"work_status" => "European National"
	],
	[
		"id" => 13783,
		"user_id" => 17587,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13787,
		"user_id" => 17591,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13794,
		"user_id" => 17598,
		"work_status" => "European National"
	],
	[
		"id" => 13798,
		"user_id" => 17602,
		"work_status" => "European National"
	],
	[
		"id" => 13800,
		"user_id" => 17604,
		"work_status" => "European National"
	],
	[
		"id" => 13802,
		"user_id" => 17606,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13807,
		"user_id" => 17611,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13810,
		"user_id" => 17614,
		"work_status" => "European National"
	],
	[
		"id" => 25165,
		"user_id" => 30788,
		"work_status" => "0"
	],
	[
		"id" => 25166,
		"user_id" => 19380,
		"work_status" => "European National"
	],
	[
		"id" => 25167,
		"user_id" => 26120,
		"work_status" => "0"
	],
	[
		"id" => 13814,
		"user_id" => 17618,
		"work_status" => "European National"
	],
	[
		"id" => 13816,
		"user_id" => 17620,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13818,
		"user_id" => 17622,
		"work_status" => "Non European National"
	],
	[
		"id" => 24664,
		"user_id" => 30228,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13828,
		"user_id" => 17632,
		"work_status" => "European National"
	],
	[
		"id" => 13830,
		"user_id" => 17634,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13831,
		"user_id" => 17635,
		"work_status" => "Non European National"
	],
	[
		"id" => 13832,
		"user_id" => 17636,
		"work_status" => "Non European National"
	],
	[
		"id" => 13834,
		"user_id" => 17638,
		"work_status" => "Non European National"
	],
	[
		"id" => 13839,
		"user_id" => 17643,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13844,
		"user_id" => 17648,
		"work_status" => "European National"
	],
	[
		"id" => 13847,
		"user_id" => 17651,
		"work_status" => "Non European National"
	],
	[
		"id" => 13849,
		"user_id" => 17653,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13851,
		"user_id" => 17655,
		"work_status" => "European National"
	],
	[
		"id" => 13854,
		"user_id" => 17658,
		"work_status" => "European National"
	],
	[
		"id" => 13855,
		"user_id" => 17659,
		"work_status" => "European National"
	],
	[
		"id" => 13856,
		"user_id" => 17660,
		"work_status" => "Non European National"
	],
	[
		"id" => 13857,
		"user_id" => 17661,
		"work_status" => "Non European National"
	],
	[
		"id" => 19193,
		"user_id" => 23740,
		"work_status" => "European National"
	],
	[
		"id" => 13861,
		"user_id" => 17665,
		"work_status" => "Non European National"
	],
	[
		"id" => 13862,
		"user_id" => 17666,
		"work_status" => "Non European National"
	],
	[
		"id" => 13863,
		"user_id" => 17667,
		"work_status" => "Non European National"
	],
	[
		"id" => 13864,
		"user_id" => 17668,
		"work_status" => "Non European National"
	],
	[
		"id" => 13865,
		"user_id" => 17669,
		"work_status" => "Non European National"
	],
	[
		"id" => 13866,
		"user_id" => 17670,
		"work_status" => "Non European National"
	],
	[
		"id" => 13868,
		"user_id" => 17672,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13878,
		"user_id" => 17682,
		"work_status" => "European National"
	],
	[
		"id" => 13882,
		"user_id" => 17686,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13883,
		"user_id" => 17687,
		"work_status" => "Non European National"
	],
	[
		"id" => 23819,
		"user_id" => 29383,
		"work_status" => "Non European National"
	],
	[
		"id" => 13892,
		"user_id" => 17696,
		"work_status" => "Non European National"
	],
	[
		"id" => 13893,
		"user_id" => 17697,
		"work_status" => "European National"
	],
	[
		"id" => 13894,
		"user_id" => 17698,
		"work_status" => "European National"
	],
	[
		"id" => 13896,
		"user_id" => 17700,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13899,
		"user_id" => 17703,
		"work_status" => "European National"
	],
	[
		"id" => 23452,
		"user_id" => 29016,
		"work_status" => "Non European National"
	],
	[
		"id" => 13907,
		"user_id" => 17711,
		"work_status" => "Non European National"
	],
	[
		"id" => 13908,
		"user_id" => 17712,
		"work_status" => "European National"
	],
	[
		"id" => 13911,
		"user_id" => 17715,
		"work_status" => "Non European National"
	],
	[
		"id" => 13913,
		"user_id" => 17717,
		"work_status" => "European National"
	],
	[
		"id" => 13914,
		"user_id" => 17718,
		"work_status" => "European National"
	],
	[
		"id" => 13921,
		"user_id" => 17725,
		"work_status" => "Non European National"
	],
	[
		"id" => 13922,
		"user_id" => 17726,
		"work_status" => "Non European National"
	],
	[
		"id" => 13924,
		"user_id" => 17728,
		"work_status" => "European National"
	],
	[
		"id" => 16255,
		"user_id" => 19540,
		"work_status" => "European National"
	],
	[
		"id" => 13927,
		"user_id" => 17731,
		"work_status" => "Non European National"
	],
	[
		"id" => 13929,
		"user_id" => 17733,
		"work_status" => "European National"
	],
	[
		"id" => 13931,
		"user_id" => 17735,
		"work_status" => "Non European National"
	],
	[
		"id" => 13933,
		"user_id" => 17737,
		"work_status" => "European National"
	],
	[
		"id" => 13936,
		"user_id" => 17740,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13938,
		"user_id" => 17742,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13950,
		"user_id" => 17754,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16538,
		"user_id" => 20891,
		"work_status" => "Non European National"
	],
	[
		"id" => 13956,
		"user_id" => 17760,
		"work_status" => "European National"
	],
	[
		"id" => 22370,
		"user_id" => 27896,
		"work_status" => "European National"
	],
	[
		"id" => 13965,
		"user_id" => 17769,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13973,
		"user_id" => 17777,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19206,
		"user_id" => 23753,
		"work_status" => "European National"
	],
	[
		"id" => 13977,
		"user_id" => 17781,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19211,
		"user_id" => 23758,
		"work_status" => "European National"
	],
	[
		"id" => 13982,
		"user_id" => 17786,
		"work_status" => "European National"
	],
	[
		"id" => 19215,
		"user_id" => 23762,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13990,
		"user_id" => 17794,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13993,
		"user_id" => 17797,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13994,
		"user_id" => 17798,
		"work_status" => "European National"
	],
	[
		"id" => 13996,
		"user_id" => 17800,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13999,
		"user_id" => 17803,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14001,
		"user_id" => 17805,
		"work_status" => "European National"
	],
	[
		"id" => 14005,
		"user_id" => 17809,
		"work_status" => "European National"
	],
	[
		"id" => 20173,
		"user_id" => 24878,
		"work_status" => "Non European National"
	],
	[
		"id" => 14010,
		"user_id" => 17814,
		"work_status" => "European National"
	],
	[
		"id" => 19230,
		"user_id" => 23777,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14016,
		"user_id" => 17820,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14021,
		"user_id" => 17825,
		"work_status" => "Non European National"
	],
	[
		"id" => 14025,
		"user_id" => 17829,
		"work_status" => "European National"
	],
	[
		"id" => 19240,
		"user_id" => 23787,
		"work_status" => "Non European National"
	],
	[
		"id" => 14032,
		"user_id" => 17836,
		"work_status" => "European National"
	],
	[
		"id" => 22434,
		"user_id" => 27960,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14039,
		"user_id" => 17843,
		"work_status" => "Non European National"
	],
	[
		"id" => 14045,
		"user_id" => 17849,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14047,
		"user_id" => 17851,
		"work_status" => "European National"
	],
	[
		"id" => 14052,
		"user_id" => 17856,
		"work_status" => "European National"
	],
	[
		"id" => 14053,
		"user_id" => 17857,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22452,
		"user_id" => 27978,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14065,
		"user_id" => 17869,
		"work_status" => "Non European National"
	],
	[
		"id" => 14068,
		"user_id" => 17872,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14070,
		"user_id" => 17874,
		"work_status" => "Non European National"
	],
	[
		"id" => 19265,
		"user_id" => 23812,
		"work_status" => "Non European National"
	],
	[
		"id" => 19273,
		"user_id" => 23820,
		"work_status" => "European National"
	],
	[
		"id" => 14085,
		"user_id" => 17889,
		"work_status" => "Non European National"
	],
	[
		"id" => 14088,
		"user_id" => 17892,
		"work_status" => "European National"
	],
	[
		"id" => 14091,
		"user_id" => 17895,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19283,
		"user_id" => 23830,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14099,
		"user_id" => 17903,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14101,
		"user_id" => 17905,
		"work_status" => "European National"
	],
	[
		"id" => 14105,
		"user_id" => 17909,
		"work_status" => "Non European National"
	],
	[
		"id" => 14108,
		"user_id" => 17912,
		"work_status" => "European National"
	],
	[
		"id" => 14111,
		"user_id" => 17915,
		"work_status" => "European National"
	],
	[
		"id" => 14114,
		"user_id" => 17918,
		"work_status" => "European National"
	],
	[
		"id" => 14115,
		"user_id" => 17919,
		"work_status" => "Non European National"
	],
	[
		"id" => 14116,
		"user_id" => 17920,
		"work_status" => "Non European National"
	],
	[
		"id" => 14118,
		"user_id" => 17922,
		"work_status" => "Non European National"
	],
	[
		"id" => 14119,
		"user_id" => 17923,
		"work_status" => "European National"
	],
	[
		"id" => 14120,
		"user_id" => 17924,
		"work_status" => "European National"
	],
	[
		"id" => 14123,
		"user_id" => 17927,
		"work_status" => "European National"
	],
	[
		"id" => 14127,
		"user_id" => 17931,
		"work_status" => "European National"
	],
	[
		"id" => 14128,
		"user_id" => 17932,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14130,
		"user_id" => 17934,
		"work_status" => "European National"
	],
	[
		"id" => 14133,
		"user_id" => 17937,
		"work_status" => "European National"
	],
	[
		"id" => 14136,
		"user_id" => 17940,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24552,
		"user_id" => 30116,
		"work_status" => "Non European National"
	],
	[
		"id" => 14149,
		"user_id" => 17953,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14150,
		"user_id" => 17954,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14151,
		"user_id" => 17955,
		"work_status" => "European National"
	],
	[
		"id" => 14155,
		"user_id" => 17959,
		"work_status" => "European National"
	],
	[
		"id" => 14158,
		"user_id" => 17962,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14159,
		"user_id" => 17963,
		"work_status" => "Non European National"
	],
	[
		"id" => 14162,
		"user_id" => 17966,
		"work_status" => "European National"
	],
	[
		"id" => 14165,
		"user_id" => 17969,
		"work_status" => "Non European National"
	],
	[
		"id" => 14169,
		"user_id" => 17973,
		"work_status" => "Non European National"
	],
	[
		"id" => 14172,
		"user_id" => 17976,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14173,
		"user_id" => 17977,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14175,
		"user_id" => 17979,
		"work_status" => "Non European National"
	],
	[
		"id" => 14178,
		"user_id" => 17982,
		"work_status" => "Non European National"
	],
	[
		"id" => 14182,
		"user_id" => 17986,
		"work_status" => "European National"
	],
	[
		"id" => 14184,
		"user_id" => 17988,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24414,
		"user_id" => 29978,
		"work_status" => "European National"
	],
	[
		"id" => 14188,
		"user_id" => 17992,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14192,
		"user_id" => 17996,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14196,
		"user_id" => 18000,
		"work_status" => "European National"
	],
	[
		"id" => 14200,
		"user_id" => 18004,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14201,
		"user_id" => 18005,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14203,
		"user_id" => 18007,
		"work_status" => "Non European National"
	],
	[
		"id" => 14205,
		"user_id" => 18009,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14211,
		"user_id" => 18015,
		"work_status" => "Non European National"
	],
	[
		"id" => 14215,
		"user_id" => 18019,
		"work_status" => "Non European National"
	],
	[
		"id" => 14217,
		"user_id" => 18021,
		"work_status" => "European National"
	],
	[
		"id" => 14219,
		"user_id" => 18023,
		"work_status" => "Non European National"
	],
	[
		"id" => 14221,
		"user_id" => 18025,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14225,
		"user_id" => 18029,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14229,
		"user_id" => 18033,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14231,
		"user_id" => 18035,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20162,
		"user_id" => 24866,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14240,
		"user_id" => 18044,
		"work_status" => "European National"
	],
	[
		"id" => 14243,
		"user_id" => 18047,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14245,
		"user_id" => 18049,
		"work_status" => "Non European National"
	],
	[
		"id" => 14246,
		"user_id" => 18050,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14248,
		"user_id" => 18052,
		"work_status" => "Non European National"
	],
	[
		"id" => 24452,
		"user_id" => 30016,
		"work_status" => "Non European National"
	],
	[
		"id" => 14252,
		"user_id" => 18056,
		"work_status" => "European National"
	],
	[
		"id" => 14253,
		"user_id" => 18057,
		"work_status" => "European National"
	],
	[
		"id" => 14254,
		"user_id" => 18058,
		"work_status" => "European National"
	],
	[
		"id" => 14255,
		"user_id" => 18059,
		"work_status" => "European National"
	],
	[
		"id" => 14256,
		"user_id" => 18060,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14257,
		"user_id" => 18061,
		"work_status" => "Non European National"
	],
	[
		"id" => 14263,
		"user_id" => 18067,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14266,
		"user_id" => 18070,
		"work_status" => "European National"
	],
	[
		"id" => 14269,
		"user_id" => 18073,
		"work_status" => "Non European National"
	],
	[
		"id" => 14272,
		"user_id" => 18076,
		"work_status" => "Non European National"
	],
	[
		"id" => 14274,
		"user_id" => 18078,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14278,
		"user_id" => 18082,
		"work_status" => "European National"
	],
	[
		"id" => 14282,
		"user_id" => 18086,
		"work_status" => "European National"
	],
	[
		"id" => 14284,
		"user_id" => 18088,
		"work_status" => "European National"
	],
	[
		"id" => 14285,
		"user_id" => 18089,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14288,
		"user_id" => 18092,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14292,
		"user_id" => 18096,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23596,
		"user_id" => 29160,
		"work_status" => "European National"
	],
	[
		"id" => 22501,
		"user_id" => 28027,
		"work_status" => "Non European National"
	],
	[
		"id" => 14295,
		"user_id" => 18099,
		"work_status" => "European National"
	],
	[
		"id" => 14297,
		"user_id" => 18101,
		"work_status" => "European National"
	],
	[
		"id" => 14298,
		"user_id" => 18102,
		"work_status" => "Non European National"
	],
	[
		"id" => 14307,
		"user_id" => 18111,
		"work_status" => "European National"
	],
	[
		"id" => 14310,
		"user_id" => 18114,
		"work_status" => "Non European National"
	],
	[
		"id" => 14311,
		"user_id" => 18115,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14320,
		"user_id" => 18124,
		"work_status" => "European National"
	],
	[
		"id" => 14321,
		"user_id" => 18125,
		"work_status" => "European National"
	],
	[
		"id" => 14324,
		"user_id" => 18128,
		"work_status" => "Non European National"
	],
	[
		"id" => 14325,
		"user_id" => 18129,
		"work_status" => "Non European National"
	],
	[
		"id" => 14327,
		"user_id" => 18131,
		"work_status" => "European National"
	],
	[
		"id" => 19399,
		"user_id" => 23946,
		"work_status" => "Non European National"
	],
	[
		"id" => 14331,
		"user_id" => 18135,
		"work_status" => "Non European National"
	],
	[
		"id" => 22641,
		"user_id" => 28167,
		"work_status" => "Non European National"
	],
	[
		"id" => 14333,
		"user_id" => 18137,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14335,
		"user_id" => 18139,
		"work_status" => "European National"
	],
	[
		"id" => 14338,
		"user_id" => 18142,
		"work_status" => "European National"
	],
	[
		"id" => 14341,
		"user_id" => 18145,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14342,
		"user_id" => 18146,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14345,
		"user_id" => 18149,
		"work_status" => "European National"
	],
	[
		"id" => 14353,
		"user_id" => 18157,
		"work_status" => "Non European National"
	],
	[
		"id" => 14354,
		"user_id" => 18158,
		"work_status" => "Non European National"
	],
	[
		"id" => 14356,
		"user_id" => 18160,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14357,
		"user_id" => 18161,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24505,
		"user_id" => 30069,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14363,
		"user_id" => 18167,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14366,
		"user_id" => 18170,
		"work_status" => "Non European National"
	],
	[
		"id" => 14369,
		"user_id" => 18173,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14374,
		"user_id" => 18178,
		"work_status" => "Non European National"
	],
	[
		"id" => 19431,
		"user_id" => 23978,
		"work_status" => "Non European National"
	],
	[
		"id" => 14380,
		"user_id" => 18184,
		"work_status" => "Non European National"
	],
	[
		"id" => 14383,
		"user_id" => 18187,
		"work_status" => "European National"
	],
	[
		"id" => 14385,
		"user_id" => 18189,
		"work_status" => "European National"
	],
	[
		"id" => 14386,
		"user_id" => 18190,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14388,
		"user_id" => 18192,
		"work_status" => "Non European National"
	],
	[
		"id" => 14389,
		"user_id" => 18193,
		"work_status" => "Non European National"
	],
	[
		"id" => 14390,
		"user_id" => 18194,
		"work_status" => "European National"
	],
	[
		"id" => 14392,
		"user_id" => 18196,
		"work_status" => "European National"
	],
	[
		"id" => 14395,
		"user_id" => 18199,
		"work_status" => "European National"
	],
	[
		"id" => 14396,
		"user_id" => 18200,
		"work_status" => "European National"
	],
	[
		"id" => 14397,
		"user_id" => 18201,
		"work_status" => "Non European National"
	],
	[
		"id" => 24519,
		"user_id" => 30083,
		"work_status" => "Non European National"
	],
	[
		"id" => 14398,
		"user_id" => 18202,
		"work_status" => "Non European National"
	],
	[
		"id" => 14402,
		"user_id" => 18206,
		"work_status" => "European National"
	],
	[
		"id" => 14403,
		"user_id" => 18207,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14408,
		"user_id" => 18212,
		"work_status" => "Non European National"
	],
	[
		"id" => 14409,
		"user_id" => 18213,
		"work_status" => "European National"
	],
	[
		"id" => 14413,
		"user_id" => 18217,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14415,
		"user_id" => 18219,
		"work_status" => "European National"
	],
	[
		"id" => 19443,
		"user_id" => 23990,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14419,
		"user_id" => 18223,
		"work_status" => "European National"
	],
	[
		"id" => 22697,
		"user_id" => 28223,
		"work_status" => "Non European National"
	],
	[
		"id" => 14423,
		"user_id" => 18227,
		"work_status" => "European National"
	],
	[
		"id" => 14425,
		"user_id" => 18229,
		"work_status" => "Non European National"
	],
	[
		"id" => 19453,
		"user_id" => 24000,
		"work_status" => "Non European National"
	],
	[
		"id" => 14429,
		"user_id" => 18233,
		"work_status" => "Non European National"
	],
	[
		"id" => 14430,
		"user_id" => 18234,
		"work_status" => "Non European National"
	],
	[
		"id" => 14432,
		"user_id" => 18236,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14436,
		"user_id" => 18240,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14438,
		"user_id" => 18242,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14440,
		"user_id" => 18244,
		"work_status" => "European National"
	],
	[
		"id" => 25790,
		"user_id" => 31909,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14447,
		"user_id" => 18251,
		"work_status" => "Non European National"
	],
	[
		"id" => 14448,
		"user_id" => 18252,
		"work_status" => "Non European National"
	],
	[
		"id" => 14449,
		"user_id" => 18253,
		"work_status" => "European National"
	],
	[
		"id" => 14454,
		"user_id" => 18258,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14455,
		"user_id" => 18259,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14462,
		"user_id" => 18266,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14465,
		"user_id" => 18269,
		"work_status" => "Non European National"
	],
	[
		"id" => 14466,
		"user_id" => 18270,
		"work_status" => "Non European National"
	],
	[
		"id" => 19475,
		"user_id" => 24022,
		"work_status" => "Non European National"
	],
	[
		"id" => 14468,
		"user_id" => 18272,
		"work_status" => "European National"
	],
	[
		"id" => 14470,
		"user_id" => 18274,
		"work_status" => "European National"
	],
	[
		"id" => 14474,
		"user_id" => 18278,
		"work_status" => "European National"
	],
	[
		"id" => 14475,
		"user_id" => 18279,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14482,
		"user_id" => 18286,
		"work_status" => "European National"
	],
	[
		"id" => 14485,
		"user_id" => 18289,
		"work_status" => "Non European National"
	],
	[
		"id" => 14489,
		"user_id" => 18293,
		"work_status" => "Non European National"
	],
	[
		"id" => 14490,
		"user_id" => 18294,
		"work_status" => "Non European National"
	],
	[
		"id" => 16737,
		"user_id" => 21219,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14497,
		"user_id" => 18301,
		"work_status" => "Non European National"
	],
	[
		"id" => 14509,
		"user_id" => 18313,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14510,
		"user_id" => 18314,
		"work_status" => "Non European National"
	],
	[
		"id" => 14512,
		"user_id" => 18316,
		"work_status" => "European National"
	],
	[
		"id" => 14514,
		"user_id" => 18318,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20137,
		"user_id" => 24816,
		"work_status" => "0"
	],
	[
		"id" => 23030,
		"user_id" => 28556,
		"work_status" => "European National"
	],
	[
		"id" => 14517,
		"user_id" => 18321,
		"work_status" => "European National"
	],
	[
		"id" => 14521,
		"user_id" => 18325,
		"work_status" => "Non European National"
	],
	[
		"id" => 14523,
		"user_id" => 18327,
		"work_status" => "Non European National"
	],
	[
		"id" => 14525,
		"user_id" => 18329,
		"work_status" => "Non European National"
	],
	[
		"id" => 14527,
		"user_id" => 18331,
		"work_status" => "Non European National"
	],
	[
		"id" => 14528,
		"user_id" => 18332,
		"work_status" => "European National"
	],
	[
		"id" => 10908,
		"user_id" => 14533,
		"work_status" => "0"
	],
	[
		"id" => 10909,
		"user_id" => 14534,
		"work_status" => "European National"
	],
	[
		"id" => 22771,
		"user_id" => 28297,
		"work_status" => "Non European National"
	],
	[
		"id" => 14534,
		"user_id" => 18338,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14537,
		"user_id" => 18341,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14538,
		"user_id" => 18342,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19512,
		"user_id" => 24059,
		"work_status" => "European National"
	],
	[
		"id" => 14544,
		"user_id" => 18348,
		"work_status" => "Non European National"
	],
	[
		"id" => 14545,
		"user_id" => 18349,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14551,
		"user_id" => 18355,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14555,
		"user_id" => 18359,
		"work_status" => "Non European National"
	],
	[
		"id" => 14556,
		"user_id" => 18360,
		"work_status" => "European National"
	],
	[
		"id" => 15903,
		"user_id" => 19957,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14558,
		"user_id" => 18362,
		"work_status" => "European National"
	],
	[
		"id" => 14560,
		"user_id" => 18364,
		"work_status" => "Non European National"
	],
	[
		"id" => 14561,
		"user_id" => 18365,
		"work_status" => "European National"
	],
	[
		"id" => 14563,
		"user_id" => 18367,
		"work_status" => "Non European National"
	],
	[
		"id" => 14567,
		"user_id" => 18371,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14568,
		"user_id" => 18372,
		"work_status" => "Non European National"
	],
	[
		"id" => 14569,
		"user_id" => 18373,
		"work_status" => "European National"
	],
	[
		"id" => 14572,
		"user_id" => 18376,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22806,
		"user_id" => 28332,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14588,
		"user_id" => 18392,
		"work_status" => "Non European National"
	],
	[
		"id" => 14590,
		"user_id" => 18394,
		"work_status" => "European National"
	],
	[
		"id" => 14591,
		"user_id" => 18395,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14594,
		"user_id" => 18398,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14595,
		"user_id" => 18399,
		"work_status" => "Non European National"
	],
	[
		"id" => 20132,
		"user_id" => 24811,
		"work_status" => "Non European National"
	],
	[
		"id" => 14602,
		"user_id" => 18406,
		"work_status" => "Non European National"
	],
	[
		"id" => 14605,
		"user_id" => 18409,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24607,
		"user_id" => 30171,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14609,
		"user_id" => 18413,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14613,
		"user_id" => 18417,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14614,
		"user_id" => 18418,
		"work_status" => "European National"
	],
	[
		"id" => 14619,
		"user_id" => 18423,
		"work_status" => "European National"
	],
	[
		"id" => 14620,
		"user_id" => 18424,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14623,
		"user_id" => 18427,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14625,
		"user_id" => 18429,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24613,
		"user_id" => 30177,
		"work_status" => "Non European National"
	],
	[
		"id" => 14635,
		"user_id" => 18439,
		"work_status" => "European National"
	],
	[
		"id" => 14637,
		"user_id" => 18441,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14638,
		"user_id" => 18442,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14645,
		"user_id" => 18449,
		"work_status" => "Non European National"
	],
	[
		"id" => 14647,
		"user_id" => 18451,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14649,
		"user_id" => 18453,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14650,
		"user_id" => 18454,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14652,
		"user_id" => 18456,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14654,
		"user_id" => 18458,
		"work_status" => "Non European National"
	],
	[
		"id" => 14657,
		"user_id" => 18461,
		"work_status" => "European National"
	],
	[
		"id" => 14660,
		"user_id" => 18464,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12929,
		"user_id" => 16639,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 11076,
		"user_id" => 14701,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14665,
		"user_id" => 18469,
		"work_status" => "Non European National"
	],
	[
		"id" => 24637,
		"user_id" => 30201,
		"work_status" => "Non European National"
	],
	[
		"id" => 14668,
		"user_id" => 18472,
		"work_status" => "European National"
	],
	[
		"id" => 14671,
		"user_id" => 18475,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14673,
		"user_id" => 18477,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14678,
		"user_id" => 18482,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14681,
		"user_id" => 18485,
		"work_status" => "Non European National"
	],
	[
		"id" => 14682,
		"user_id" => 18486,
		"work_status" => "Non European National"
	],
	[
		"id" => 14684,
		"user_id" => 18488,
		"work_status" => "Non European National"
	],
	[
		"id" => 24554,
		"user_id" => 30118,
		"work_status" => "European National"
	],
	[
		"id" => 20120,
		"user_id" => 24787,
		"work_status" => "Non European National"
	],
	[
		"id" => 23720,
		"user_id" => 29284,
		"work_status" => "Non European National"
	],
	[
		"id" => 14688,
		"user_id" => 18492,
		"work_status" => "Non European National"
	],
	[
		"id" => 14689,
		"user_id" => 18493,
		"work_status" => "European National"
	],
	[
		"id" => 14692,
		"user_id" => 18496,
		"work_status" => "European National"
	],
	[
		"id" => 14693,
		"user_id" => 18497,
		"work_status" => "European National"
	],
	[
		"id" => 14696,
		"user_id" => 18500,
		"work_status" => "Non European National"
	],
	[
		"id" => 14698,
		"user_id" => 18502,
		"work_status" => "Non European National"
	],
	[
		"id" => 14700,
		"user_id" => 18504,
		"work_status" => "Non European National"
	],
	[
		"id" => 14704,
		"user_id" => 18508,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14705,
		"user_id" => 18509,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14707,
		"user_id" => 18511,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22903,
		"user_id" => 28429,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14710,
		"user_id" => 18514,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14712,
		"user_id" => 18516,
		"work_status" => "European National"
	],
	[
		"id" => 14718,
		"user_id" => 18522,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14719,
		"user_id" => 18523,
		"work_status" => "European National"
	],
	[
		"id" => 14720,
		"user_id" => 18524,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14724,
		"user_id" => 18528,
		"work_status" => "Non European National"
	],
	[
		"id" => 14727,
		"user_id" => 18531,
		"work_status" => "European National"
	],
	[
		"id" => 19612,
		"user_id" => 24159,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14732,
		"user_id" => 18536,
		"work_status" => "Non European National"
	],
	[
		"id" => 14738,
		"user_id" => 18542,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20117,
		"user_id" => 24783,
		"work_status" => "Non European National"
	],
	[
		"id" => 20118,
		"user_id" => 24784,
		"work_status" => "0"
	],
	[
		"id" => 14745,
		"user_id" => 18549,
		"work_status" => "Non European National"
	],
	[
		"id" => 19625,
		"user_id" => 24172,
		"work_status" => "Non European National"
	],
	[
		"id" => 24680,
		"user_id" => 30244,
		"work_status" => "European National"
	],
	[
		"id" => 14762,
		"user_id" => 18566,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14766,
		"user_id" => 18570,
		"work_status" => "European National"
	],
	[
		"id" => 14770,
		"user_id" => 18574,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14771,
		"user_id" => 18575,
		"work_status" => "European National"
	],
	[
		"id" => 14775,
		"user_id" => 18579,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14782,
		"user_id" => 18586,
		"work_status" => "European National"
	],
	[
		"id" => 14783,
		"user_id" => 18587,
		"work_status" => "European National"
	],
	[
		"id" => 19642,
		"user_id" => 24189,
		"work_status" => "Non European National"
	],
	[
		"id" => 24695,
		"user_id" => 30259,
		"work_status" => "Non European National"
	],
	[
		"id" => 14790,
		"user_id" => 18594,
		"work_status" => "Non European National"
	],
	[
		"id" => 14792,
		"user_id" => 18596,
		"work_status" => "European National"
	],
	[
		"id" => 14794,
		"user_id" => 18598,
		"work_status" => "European National"
	],
	[
		"id" => 14797,
		"user_id" => 18601,
		"work_status" => "European National"
	],
	[
		"id" => 14799,
		"user_id" => 18603,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14802,
		"user_id" => 18606,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14804,
		"user_id" => 18608,
		"work_status" => "0"
	],
	[
		"id" => 14806,
		"user_id" => 18610,
		"work_status" => "Non European National"
	],
	[
		"id" => 14810,
		"user_id" => 18614,
		"work_status" => "Non European National"
	],
	[
		"id" => 14811,
		"user_id" => 18615,
		"work_status" => "European National"
	],
	[
		"id" => 19660,
		"user_id" => 24207,
		"work_status" => "Non European National"
	],
	[
		"id" => 14818,
		"user_id" => 18622,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14826,
		"user_id" => 18630,
		"work_status" => "Non European National"
	],
	[
		"id" => 14831,
		"user_id" => 18635,
		"work_status" => "Non European National"
	],
	[
		"id" => 14834,
		"user_id" => 18638,
		"work_status" => "Non European National"
	],
	[
		"id" => 14839,
		"user_id" => 18643,
		"work_status" => "Non European National"
	],
	[
		"id" => 14840,
		"user_id" => 18644,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14846,
		"user_id" => 18650,
		"work_status" => "0"
	],
	[
		"id" => 14848,
		"user_id" => 18652,
		"work_status" => "European National"
	],
	[
		"id" => 14849,
		"user_id" => 18653,
		"work_status" => "European National"
	],
	[
		"id" => 14851,
		"user_id" => 18655,
		"work_status" => "Non European National"
	],
	[
		"id" => 14855,
		"user_id" => 18659,
		"work_status" => "Non European National"
	],
	[
		"id" => 14856,
		"user_id" => 18660,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14862,
		"user_id" => 18666,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14867,
		"user_id" => 18671,
		"work_status" => "Non European National"
	],
	[
		"id" => 14868,
		"user_id" => 18672,
		"work_status" => "Non European National"
	],
	[
		"id" => 14870,
		"user_id" => 18674,
		"work_status" => "Non European National"
	],
	[
		"id" => 14871,
		"user_id" => 18675,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19685,
		"user_id" => 24232,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19693,
		"user_id" => 24240,
		"work_status" => "Non European National"
	],
	[
		"id" => 16723,
		"user_id" => 21193,
		"work_status" => "0"
	],
	[
		"id" => 14885,
		"user_id" => 18689,
		"work_status" => "European National"
	],
	[
		"id" => 14888,
		"user_id" => 18692,
		"work_status" => "European National"
	],
	[
		"id" => 14891,
		"user_id" => 18695,
		"work_status" => "Non European National"
	],
	[
		"id" => 14894,
		"user_id" => 18698,
		"work_status" => "Non European National"
	],
	[
		"id" => 19710,
		"user_id" => 24257,
		"work_status" => "Non European National"
	],
	[
		"id" => 14899,
		"user_id" => 18703,
		"work_status" => "European National"
	],
	[
		"id" => 14901,
		"user_id" => 18705,
		"work_status" => "European National"
	],
	[
		"id" => 14904,
		"user_id" => 18708,
		"work_status" => "Non European National"
	],
	[
		"id" => 14905,
		"user_id" => 18709,
		"work_status" => "Non European National"
	],
	[
		"id" => 14907,
		"user_id" => 18711,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14910,
		"user_id" => 18714,
		"work_status" => "European National"
	],
	[
		"id" => 14914,
		"user_id" => 18718,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14916,
		"user_id" => 18720,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14917,
		"user_id" => 18721,
		"work_status" => "Non European National"
	],
	[
		"id" => 14919,
		"user_id" => 18723,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14921,
		"user_id" => 18725,
		"work_status" => "Non European National"
	],
	[
		"id" => 14923,
		"user_id" => 18727,
		"work_status" => "European National"
	],
	[
		"id" => 14925,
		"user_id" => 18729,
		"work_status" => "European National"
	],
	[
		"id" => 14927,
		"user_id" => 18731,
		"work_status" => "European National"
	],
	[
		"id" => 14930,
		"user_id" => 18734,
		"work_status" => "Non European National"
	],
	[
		"id" => 14933,
		"user_id" => 18737,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14936,
		"user_id" => 18740,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14939,
		"user_id" => 18743,
		"work_status" => "Non European National"
	],
	[
		"id" => 14941,
		"user_id" => 18745,
		"work_status" => "Non European National"
	],
	[
		"id" => 14944,
		"user_id" => 18748,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14948,
		"user_id" => 18752,
		"work_status" => "European National"
	],
	[
		"id" => 14950,
		"user_id" => 18754,
		"work_status" => "European National"
	],
	[
		"id" => 14951,
		"user_id" => 18755,
		"work_status" => "European National"
	],
	[
		"id" => 14952,
		"user_id" => 18756,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14954,
		"user_id" => 18758,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14956,
		"user_id" => 18760,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14958,
		"user_id" => 18762,
		"work_status" => "European National"
	],
	[
		"id" => 14961,
		"user_id" => 18765,
		"work_status" => "European National"
	],
	[
		"id" => 14963,
		"user_id" => 18767,
		"work_status" => "Non European National"
	],
	[
		"id" => 14964,
		"user_id" => 18768,
		"work_status" => "Non European National"
	],
	[
		"id" => 14966,
		"user_id" => 18770,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14969,
		"user_id" => 18773,
		"work_status" => "Non European National"
	],
	[
		"id" => 14974,
		"user_id" => 18778,
		"work_status" => "0"
	],
	[
		"id" => 14975,
		"user_id" => 18779,
		"work_status" => "0"
	],
	[
		"id" => 14977,
		"user_id" => 18781,
		"work_status" => "0"
	],
	[
		"id" => 14978,
		"user_id" => 18782,
		"work_status" => "European National"
	],
	[
		"id" => 14979,
		"user_id" => 18783,
		"work_status" => "Non European National"
	],
	[
		"id" => 19736,
		"user_id" => 24283,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14985,
		"user_id" => 18789,
		"work_status" => "Non European National"
	],
	[
		"id" => 14988,
		"user_id" => 18792,
		"work_status" => "European National"
	],
	[
		"id" => 14990,
		"user_id" => 18794,
		"work_status" => "0"
	],
	[
		"id" => 14991,
		"user_id" => 18795,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14993,
		"user_id" => 18797,
		"work_status" => "Non European National"
	],
	[
		"id" => 15005,
		"user_id" => 18809,
		"work_status" => "Non European National"
	],
	[
		"id" => 15010,
		"user_id" => 18814,
		"work_status" => "Non European National"
	],
	[
		"id" => 15012,
		"user_id" => 18816,
		"work_status" => "European National"
	],
	[
		"id" => 15017,
		"user_id" => 18821,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15019,
		"user_id" => 18823,
		"work_status" => "Non European National"
	],
	[
		"id" => 23104,
		"user_id" => 28630,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15025,
		"user_id" => 18829,
		"work_status" => "European National"
	],
	[
		"id" => 15029,
		"user_id" => 18833,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24786,
		"user_id" => 30350,
		"work_status" => "European National"
	],
	[
		"id" => 15036,
		"user_id" => 18840,
		"work_status" => "European National"
	],
	[
		"id" => 15039,
		"user_id" => 18843,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15041,
		"user_id" => 18845,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15042,
		"user_id" => 18846,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20094,
		"user_id" => 24744,
		"work_status" => "European National"
	],
	[
		"id" => 15052,
		"user_id" => 18856,
		"work_status" => "Non European National"
	],
	[
		"id" => 15055,
		"user_id" => 18859,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15056,
		"user_id" => 18860,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15058,
		"user_id" => 18862,
		"work_status" => "Non European National"
	],
	[
		"id" => 15067,
		"user_id" => 18871,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15068,
		"user_id" => 18872,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15070,
		"user_id" => 18874,
		"work_status" => "Non European National"
	],
	[
		"id" => 15073,
		"user_id" => 18877,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15075,
		"user_id" => 18879,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15076,
		"user_id" => 18880,
		"work_status" => "European National"
	],
	[
		"id" => 15077,
		"user_id" => 18881,
		"work_status" => "European National"
	],
	[
		"id" => 15078,
		"user_id" => 18882,
		"work_status" => "Non European National"
	],
	[
		"id" => 15082,
		"user_id" => 18886,
		"work_status" => "European National"
	],
	[
		"id" => 15086,
		"user_id" => 18890,
		"work_status" => "European National"
	],
	[
		"id" => 15089,
		"user_id" => 18893,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15090,
		"user_id" => 18894,
		"work_status" => "European National"
	],
	[
		"id" => 15101,
		"user_id" => 18905,
		"work_status" => "European National"
	],
	[
		"id" => 15104,
		"user_id" => 18908,
		"work_status" => "European National"
	],
	[
		"id" => 15105,
		"user_id" => 18909,
		"work_status" => "Non European National"
	],
	[
		"id" => 15108,
		"user_id" => 18912,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15111,
		"user_id" => 18915,
		"work_status" => "Non European National"
	],
	[
		"id" => 15113,
		"user_id" => 18917,
		"work_status" => "0"
	],
	[
		"id" => 15116,
		"user_id" => 18920,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15117,
		"user_id" => 18921,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15120,
		"user_id" => 18924,
		"work_status" => "Non European National"
	],
	[
		"id" => 15123,
		"user_id" => 18927,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15124,
		"user_id" => 18928,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23164,
		"user_id" => 28690,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15131,
		"user_id" => 18935,
		"work_status" => "Non European National"
	],
	[
		"id" => 20194,
		"user_id" => 24909,
		"work_status" => "0"
	],
	[
		"id" => 15136,
		"user_id" => 18940,
		"work_status" => "0"
	],
	[
		"id" => 15140,
		"user_id" => 18944,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15143,
		"user_id" => 18947,
		"work_status" => "European National"
	],
	[
		"id" => 15147,
		"user_id" => 18951,
		"work_status" => "Non European National"
	],
	[
		"id" => 15148,
		"user_id" => 18952,
		"work_status" => "Non European National"
	],
	[
		"id" => 15157,
		"user_id" => 18961,
		"work_status" => "Non European National"
	],
	[
		"id" => 19816,
		"user_id" => 24363,
		"work_status" => "European National"
	],
	[
		"id" => 15163,
		"user_id" => 18967,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22567,
		"user_id" => 28093,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15172,
		"user_id" => 18976,
		"work_status" => "European National"
	],
	[
		"id" => 15174,
		"user_id" => 18978,
		"work_status" => "Non European National"
	],
	[
		"id" => 15175,
		"user_id" => 18979,
		"work_status" => "Non European National"
	],
	[
		"id" => 20081,
		"user_id" => 24719,
		"work_status" => "0"
	],
	[
		"id" => 23185,
		"user_id" => 28711,
		"work_status" => "European National"
	],
	[
		"id" => 15179,
		"user_id" => 18983,
		"work_status" => "European National"
	],
	[
		"id" => 15181,
		"user_id" => 18985,
		"work_status" => "European National"
	],
	[
		"id" => 15182,
		"user_id" => 18986,
		"work_status" => "European National"
	],
	[
		"id" => 15183,
		"user_id" => 18987,
		"work_status" => "European National"
	],
	[
		"id" => 15184,
		"user_id" => 18988,
		"work_status" => "Non European National"
	],
	[
		"id" => 15185,
		"user_id" => 18989,
		"work_status" => "Non European National"
	],
	[
		"id" => 15186,
		"user_id" => 18990,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15189,
		"user_id" => 18993,
		"work_status" => "Non European National"
	],
	[
		"id" => 15190,
		"user_id" => 18994,
		"work_status" => "Non European National"
	],
	[
		"id" => 15192,
		"user_id" => 18996,
		"work_status" => "Non European National"
	],
	[
		"id" => 15193,
		"user_id" => 18997,
		"work_status" => "European National"
	],
	[
		"id" => 15198,
		"user_id" => 19002,
		"work_status" => "Non European National"
	],
	[
		"id" => 25824,
		"user_id" => 31943,
		"work_status" => "Non European National"
	],
	[
		"id" => 15205,
		"user_id" => 19009,
		"work_status" => "European National"
	],
	[
		"id" => 15207,
		"user_id" => 19011,
		"work_status" => "0"
	],
	[
		"id" => 15211,
		"user_id" => 19015,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15213,
		"user_id" => 19017,
		"work_status" => "European National"
	],
	[
		"id" => 25810,
		"user_id" => 31929,
		"work_status" => "Non European National"
	],
	[
		"id" => 15215,
		"user_id" => 19019,
		"work_status" => "Non European National"
	],
	[
		"id" => 15217,
		"user_id" => 19021,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19831,
		"user_id" => 24378,
		"work_status" => "Non European National"
	],
	[
		"id" => 15222,
		"user_id" => 19026,
		"work_status" => "Non European National"
	],
	[
		"id" => 23207,
		"user_id" => 28733,
		"work_status" => "Non European National"
	],
	[
		"id" => 15227,
		"user_id" => 19031,
		"work_status" => "Non European National"
	],
	[
		"id" => 15228,
		"user_id" => 19032,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15231,
		"user_id" => 19035,
		"work_status" => "Non European National"
	],
	[
		"id" => 15232,
		"user_id" => 19036,
		"work_status" => "European National"
	],
	[
		"id" => 15237,
		"user_id" => 19041,
		"work_status" => "European National"
	],
	[
		"id" => 19843,
		"user_id" => 24390,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15240,
		"user_id" => 19044,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15241,
		"user_id" => 19045,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15244,
		"user_id" => 19048,
		"work_status" => "European National"
	],
	[
		"id" => 23229,
		"user_id" => 28755,
		"work_status" => "European National"
	],
	[
		"id" => 19857,
		"user_id" => 24404,
		"work_status" => "Non European National"
	],
	[
		"id" => 15259,
		"user_id" => 19063,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19860,
		"user_id" => 24407,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15264,
		"user_id" => 19068,
		"work_status" => "European National"
	],
	[
		"id" => 15267,
		"user_id" => 19071,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15270,
		"user_id" => 19074,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15272,
		"user_id" => 19076,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15274,
		"user_id" => 19078,
		"work_status" => "Non European National"
	],
	[
		"id" => 15276,
		"user_id" => 19080,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15278,
		"user_id" => 19082,
		"work_status" => "European National"
	],
	[
		"id" => 20078,
		"user_id" => 24716,
		"work_status" => "Non European National"
	],
	[
		"id" => 15284,
		"user_id" => 19088,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15285,
		"user_id" => 19089,
		"work_status" => "European National"
	],
	[
		"id" => 15287,
		"user_id" => 19091,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15289,
		"user_id" => 19093,
		"work_status" => "European National"
	],
	[
		"id" => 15290,
		"user_id" => 19094,
		"work_status" => "European National"
	],
	[
		"id" => 15292,
		"user_id" => 19096,
		"work_status" => "European National"
	],
	[
		"id" => 15296,
		"user_id" => 19100,
		"work_status" => "Non European National"
	],
	[
		"id" => 15297,
		"user_id" => 19101,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19869,
		"user_id" => 24416,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15300,
		"user_id" => 19104,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15554,
		"user_id" => 19425,
		"work_status" => "European National"
	],
	[
		"id" => 15305,
		"user_id" => 19109,
		"work_status" => "Non European National"
	],
	[
		"id" => 15308,
		"user_id" => 19112,
		"work_status" => "Non European National"
	],
	[
		"id" => 15318,
		"user_id" => 19122,
		"work_status" => "Non European National"
	],
	[
		"id" => 15319,
		"user_id" => 19123,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15321,
		"user_id" => 19125,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15325,
		"user_id" => 19129,
		"work_status" => "European National"
	],
	[
		"id" => 15327,
		"user_id" => 19131,
		"work_status" => "Non European National"
	],
	[
		"id" => 15329,
		"user_id" => 19133,
		"work_status" => "Non European National"
	],
	[
		"id" => 15334,
		"user_id" => 19138,
		"work_status" => "Non European National"
	],
	[
		"id" => 15337,
		"user_id" => 19141,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15340,
		"user_id" => 19144,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15349,
		"user_id" => 19153,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15350,
		"user_id" => 19154,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20074,
		"user_id" => 24712,
		"work_status" => "0"
	],
	[
		"id" => 20371,
		"user_id" => 25164,
		"work_status" => "0"
	],
	[
		"id" => 15354,
		"user_id" => 19158,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15357,
		"user_id" => 19161,
		"work_status" => "Non European National"
	],
	[
		"id" => 15358,
		"user_id" => 19162,
		"work_status" => "Non European National"
	],
	[
		"id" => 15360,
		"user_id" => 19164,
		"work_status" => "Non European National"
	],
	[
		"id" => 15366,
		"user_id" => 19170,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15368,
		"user_id" => 19172,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19899,
		"user_id" => 24446,
		"work_status" => "European National"
	],
	[
		"id" => 15377,
		"user_id" => 19181,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15378,
		"user_id" => 19182,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15380,
		"user_id" => 19184,
		"work_status" => "European National"
	],
	[
		"id" => 24910,
		"user_id" => 30474,
		"work_status" => "Non European National"
	],
	[
		"id" => 15384,
		"user_id" => 19188,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15387,
		"user_id" => 19191,
		"work_status" => "Non European National"
	],
	[
		"id" => 24911,
		"user_id" => 30475,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15394,
		"user_id" => 19198,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15397,
		"user_id" => 19201,
		"work_status" => "Non European National"
	],
	[
		"id" => 15398,
		"user_id" => 19202,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15401,
		"user_id" => 19205,
		"work_status" => "European National"
	],
	[
		"id" => 15402,
		"user_id" => 19206,
		"work_status" => "European National"
	],
	[
		"id" => 15404,
		"user_id" => 19208,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 11980,
		"user_id" => 12615,
		"work_status" => "Non European National"
	],
	[
		"id" => 11981,
		"user_id" => 15607,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19806,
		"user_id" => 24353,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 11983,
		"user_id" => 15610,
		"work_status" => "0"
	],
	[
		"id" => 14481,
		"user_id" => 18285,
		"work_status" => "European National"
	],
	[
		"id" => 11984,
		"user_id" => 15613,
		"work_status" => "Non European National"
	],
	[
		"id" => 13503,
		"user_id" => 17307,
		"work_status" => "Non European National"
	],
	[
		"id" => 11985,
		"user_id" => 12675,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24609,
		"user_id" => 30173,
		"work_status" => "Non European National"
	],
	[
		"id" => 14893,
		"user_id" => 18697,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15257,
		"user_id" => 19061,
		"work_status" => "European National"
	],
	[
		"id" => 14012,
		"user_id" => 17816,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 11988,
		"user_id" => 15622,
		"work_status" => "0"
	],
	[
		"id" => 19030,
		"user_id" => 23577,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23783,
		"user_id" => 29347,
		"work_status" => "Non European National"
	],
	[
		"id" => 19765,
		"user_id" => 24312,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 11992,
		"user_id" => 15624,
		"work_status" => "Non European National"
	],
	[
		"id" => 13877,
		"user_id" => 17681,
		"work_status" => "European National"
	],
	[
		"id" => 11994,
		"user_id" => 15625,
		"work_status" => "0"
	],
	[
		"id" => 15268,
		"user_id" => 19072,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 11996,
		"user_id" => 15629,
		"work_status" => "0"
	],
	[
		"id" => 14877,
		"user_id" => 18681,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 14611,
		"user_id" => 18415,
		"work_status" => "European National"
	],
	[
		"id" => 18738,
		"user_id" => 23285,
		"work_status" => "Non European National"
	],
	[
		"id" => 16864,
		"user_id" => 21347,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16850,
		"user_id" => 21333,
		"work_status" => "European National"
	],
	[
		"id" => 16580,
		"user_id" => 20979,
		"work_status" => "Non European National"
	],
	[
		"id" => 16840,
		"user_id" => 21323,
		"work_status" => "European National"
	],
	[
		"id" => 16815,
		"user_id" => 21297,
		"work_status" => "Non European National"
	],
	[
		"id" => 16836,
		"user_id" => 21319,
		"work_status" => "Non European National"
	],
	[
		"id" => 16831,
		"user_id" => 21314,
		"work_status" => "Non European National"
	],
	[
		"id" => 16827,
		"user_id" => 21310,
		"work_status" => "European National"
	],
	[
		"id" => 16755,
		"user_id" => 21237,
		"work_status" => "Non European National"
	],
	[
		"id" => 16751,
		"user_id" => 21233,
		"work_status" => "Non European National"
	],
	[
		"id" => 16746,
		"user_id" => 21228,
		"work_status" => "Non European National"
	],
	[
		"id" => 16741,
		"user_id" => 21223,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16789,
		"user_id" => 21271,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16782,
		"user_id" => 21264,
		"work_status" => "European National"
	],
	[
		"id" => 16796,
		"user_id" => 21278,
		"work_status" => "Non European National"
	],
	[
		"id" => 19410,
		"user_id" => 23957,
		"work_status" => "Non European National"
	],
	[
		"id" => 12475,
		"user_id" => 16120,
		"work_status" => "European National"
	],
	[
		"id" => 21783,
		"user_id" => 27309,
		"work_status" => "Non European National"
	],
	[
		"id" => 12478,
		"user_id" => 16121,
		"work_status" => "European National"
	],
	[
		"id" => 20569,
		"user_id" => 25429,
		"work_status" => "0"
	],
	[
		"id" => 25811,
		"user_id" => 31930,
		"work_status" => "Non European National"
	],
	[
		"id" => 19217,
		"user_id" => 23764,
		"work_status" => "Non European National"
	],
	[
		"id" => 19243,
		"user_id" => 23790,
		"work_status" => "European National"
	],
	[
		"id" => 12485,
		"user_id" => 16130,
		"work_status" => "0"
	],
	[
		"id" => 12486,
		"user_id" => 16131,
		"work_status" => "0"
	],
	[
		"id" => 12487,
		"user_id" => 16135,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19080,
		"user_id" => 23627,
		"work_status" => "Non European National"
	],
	[
		"id" => 12489,
		"user_id" => 16137,
		"work_status" => "Non European National"
	],
	[
		"id" => 19061,
		"user_id" => 23608,
		"work_status" => "European National"
	],
	[
		"id" => 22964,
		"user_id" => 28490,
		"work_status" => "Non European National"
	],
	[
		"id" => 22572,
		"user_id" => 28098,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12493,
		"user_id" => 16132,
		"work_status" => "Non European National"
	],
	[
		"id" => 23568,
		"user_id" => 29132,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12495,
		"user_id" => 16143,
		"work_status" => "0"
	],
	[
		"id" => 18870,
		"user_id" => 23417,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22878,
		"user_id" => 28404,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23115,
		"user_id" => 28641,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12498,
		"user_id" => 16148,
		"work_status" => "Non European National"
	],
	[
		"id" => 12499,
		"user_id" => 16150,
		"work_status" => "0"
	],
	[
		"id" => 12500,
		"user_id" => 16151,
		"work_status" => "Non European National"
	],
	[
		"id" => 16299,
		"user_id" => 20536,
		"work_status" => "0"
	],
	[
		"id" => 12503,
		"user_id" => 12080,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21903,
		"user_id" => 27429,
		"work_status" => "European National"
	],
	[
		"id" => 12505,
		"user_id" => 16155,
		"work_status" => "Non European National"
	],
	[
		"id" => 12509,
		"user_id" => 9005,
		"work_status" => "0"
	],
	[
		"id" => 16111,
		"user_id" => 20258,
		"work_status" => "Non European National"
	],
	[
		"id" => 12511,
		"user_id" => 15617,
		"work_status" => "0"
	],
	[
		"id" => 20151,
		"user_id" => 24846,
		"work_status" => "Non European National"
	],
	[
		"id" => 12515,
		"user_id" => 12286,
		"work_status" => "0"
	],
	[
		"id" => 24620,
		"user_id" => 30184,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24778,
		"user_id" => 30342,
		"work_status" => "European National"
	],
	[
		"id" => 12520,
		"user_id" => 16165,
		"work_status" => "European National"
	],
	[
		"id" => 19148,
		"user_id" => 23695,
		"work_status" => "Non European National"
	],
	[
		"id" => 19407,
		"user_id" => 23954,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12525,
		"user_id" => 9247,
		"work_status" => "Non European National"
	],
	[
		"id" => 24804,
		"user_id" => 30368,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12527,
		"user_id" => 16170,
		"work_status" => "0"
	],
	[
		"id" => 12528,
		"user_id" => 16169,
		"work_status" => "Non European National"
	],
	[
		"id" => 12529,
		"user_id" => 16172,
		"work_status" => "European National"
	],
	[
		"id" => 12530,
		"user_id" => 12568,
		"work_status" => "0"
	],
	[
		"id" => 19847,
		"user_id" => 24394,
		"work_status" => "European National"
	],
	[
		"id" => 12534,
		"user_id" => 16175,
		"work_status" => "0"
	],
	[
		"id" => 19044,
		"user_id" => 23591,
		"work_status" => "European National"
	],
	[
		"id" => 12536,
		"user_id" => 12239,
		"work_status" => "Non European National"
	],
	[
		"id" => 12537,
		"user_id" => 12345,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23680,
		"user_id" => 29244,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18945,
		"user_id" => 23492,
		"work_status" => "Non European National"
	],
	[
		"id" => 12546,
		"user_id" => 16180,
		"work_status" => "European National"
	],
	[
		"id" => 19104,
		"user_id" => 23651,
		"work_status" => "Non European National"
	],
	[
		"id" => 12548,
		"user_id" => 12572,
		"work_status" => "0"
	],
	[
		"id" => 12549,
		"user_id" => 16187,
		"work_status" => "0"
	],
	[
		"id" => 18841,
		"user_id" => 23388,
		"work_status" => "Non European National"
	],
	[
		"id" => 12551,
		"user_id" => 16186,
		"work_status" => "0"
	],
	[
		"id" => 12552,
		"user_id" => 16184,
		"work_status" => "0"
	],
	[
		"id" => 12553,
		"user_id" => 15630,
		"work_status" => "0"
	],
	[
		"id" => 12554,
		"user_id" => 12256,
		"work_status" => "0"
	],
	[
		"id" => 12555,
		"user_id" => 16190,
		"work_status" => "Non European National"
	],
	[
		"id" => 19076,
		"user_id" => 23623,
		"work_status" => "Non European National"
	],
	[
		"id" => 12558,
		"user_id" => 11952,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12559,
		"user_id" => 16192,
		"work_status" => "European National"
	],
	[
		"id" => 12560,
		"user_id" => 12382,
		"work_status" => "European National"
	],
	[
		"id" => 23851,
		"user_id" => 29415,
		"work_status" => "European National"
	],
	[
		"id" => 18891,
		"user_id" => 23438,
		"work_status" => "European National"
	],
	[
		"id" => 12566,
		"user_id" => 16196,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23909,
		"user_id" => 29473,
		"work_status" => "0"
	],
	[
		"id" => 23911,
		"user_id" => 29475,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23475,
		"user_id" => 29039,
		"work_status" => "European National"
	],
	[
		"id" => 12568,
		"user_id" => 11596,
		"work_status" => "0"
	],
	[
		"id" => 23297,
		"user_id" => 28823,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24540,
		"user_id" => 30104,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12571,
		"user_id" => 16202,
		"work_status" => "0"
	],
	[
		"id" => 12573,
		"user_id" => 16204,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12574,
		"user_id" => 16206,
		"work_status" => "0"
	],
	[
		"id" => 24394,
		"user_id" => 29958,
		"work_status" => "Non European National"
	],
	[
		"id" => 12576,
		"user_id" => 11643,
		"work_status" => "Non European National"
	],
	[
		"id" => 19498,
		"user_id" => 24045,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24787,
		"user_id" => 30351,
		"work_status" => "Non European National"
	],
	[
		"id" => 12580,
		"user_id" => 16209,
		"work_status" => "Non European National"
	],
	[
		"id" => 12581,
		"user_id" => 8817,
		"work_status" => "Non European National"
	],
	[
		"id" => 19290,
		"user_id" => 23837,
		"work_status" => "European National"
	],
	[
		"id" => 12583,
		"user_id" => 10432,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12588,
		"user_id" => 16215,
		"work_status" => "Non European National"
	],
	[
		"id" => 12589,
		"user_id" => 10777,
		"work_status" => "0"
	],
	[
		"id" => 12594,
		"user_id" => 16218,
		"work_status" => "European National"
	],
	[
		"id" => 12595,
		"user_id" => 16221,
		"work_status" => "European National"
	],
	[
		"id" => 12598,
		"user_id" => 10252,
		"work_status" => "0"
	],
	[
		"id" => 21885,
		"user_id" => 27411,
		"work_status" => "European National"
	],
	[
		"id" => 12602,
		"user_id" => 9943,
		"work_status" => "0"
	],
	[
		"id" => 12603,
		"user_id" => 16224,
		"work_status" => "Non European National"
	],
	[
		"id" => 12604,
		"user_id" => 16225,
		"work_status" => "0"
	],
	[
		"id" => 19896,
		"user_id" => 24443,
		"work_status" => "Non European National"
	],
	[
		"id" => 12607,
		"user_id" => 16227,
		"work_status" => "0"
	],
	[
		"id" => 12608,
		"user_id" => 16226,
		"work_status" => "0"
	],
	[
		"id" => 12643,
		"user_id" => 10559,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12609,
		"user_id" => 16229,
		"work_status" => "0"
	],
	[
		"id" => 23832,
		"user_id" => 29396,
		"work_status" => "Non European National"
	],
	[
		"id" => 12613,
		"user_id" => 16231,
		"work_status" => "European National"
	],
	[
		"id" => 12614,
		"user_id" => 11898,
		"work_status" => "European National"
	],
	[
		"id" => 19679,
		"user_id" => 24226,
		"work_status" => "Non European National"
	],
	[
		"id" => 21957,
		"user_id" => 27483,
		"work_status" => "European National"
	],
	[
		"id" => 12617,
		"user_id" => 16237,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12618,
		"user_id" => 16238,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12619,
		"user_id" => 16168,
		"work_status" => "European National"
	],
	[
		"id" => 12620,
		"user_id" => 16239,
		"work_status" => "Non European National"
	],
	[
		"id" => 12621,
		"user_id" => 16242,
		"work_status" => "European National"
	],
	[
		"id" => 12622,
		"user_id" => 12339,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23686,
		"user_id" => 29250,
		"work_status" => "Non European National"
	],
	[
		"id" => 12624,
		"user_id" => 11652,
		"work_status" => "0"
	],
	[
		"id" => 16748,
		"user_id" => 21230,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12626,
		"user_id" => 16246,
		"work_status" => "Non European National"
	],
	[
		"id" => 12627,
		"user_id" => 16247,
		"work_status" => "European National"
	],
	[
		"id" => 12629,
		"user_id" => 16245,
		"work_status" => "Non European National"
	],
	[
		"id" => 12630,
		"user_id" => 16248,
		"work_status" => "0"
	],
	[
		"id" => 12631,
		"user_id" => 16249,
		"work_status" => "0"
	],
	[
		"id" => 20370,
		"user_id" => 25163,
		"work_status" => "Non European National"
	],
	[
		"id" => 24712,
		"user_id" => 30276,
		"work_status" => "Non European National"
	],
	[
		"id" => 19439,
		"user_id" => 23986,
		"work_status" => "Non European National"
	],
	[
		"id" => 12635,
		"user_id" => 16256,
		"work_status" => "European National"
	],
	[
		"id" => 19520,
		"user_id" => 24067,
		"work_status" => "Non European National"
	],
	[
		"id" => 12637,
		"user_id" => 16211,
		"work_status" => "Non European National"
	],
	[
		"id" => 12771,
		"user_id" => 16436,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19836,
		"user_id" => 24383,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22279,
		"user_id" => 27805,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24395,
		"user_id" => 29959,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12642,
		"user_id" => 12725,
		"work_status" => "European National"
	],
	[
		"id" => 12651,
		"user_id" => 10565,
		"work_status" => "0"
	],
	[
		"id" => 12652,
		"user_id" => 9071,
		"work_status" => "Non European National"
	],
	[
		"id" => 16732,
		"user_id" => 12025,
		"work_status" => "Non European National"
	],
	[
		"id" => 12653,
		"user_id" => 16269,
		"work_status" => "0"
	],
	[
		"id" => 12654,
		"user_id" => 16270,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12655,
		"user_id" => 16272,
		"work_status" => "0"
	],
	[
		"id" => 12656,
		"user_id" => 12362,
		"work_status" => "Non European National"
	],
	[
		"id" => 12657,
		"user_id" => 9276,
		"work_status" => "European National"
	],
	[
		"id" => 12658,
		"user_id" => 16274,
		"work_status" => "0"
	],
	[
		"id" => 12659,
		"user_id" => 8852,
		"work_status" => "Non European National"
	],
	[
		"id" => 12660,
		"user_id" => 11724,
		"work_status" => "0"
	],
	[
		"id" => 12661,
		"user_id" => 11854,
		"work_status" => "0"
	],
	[
		"id" => 12662,
		"user_id" => 16277,
		"work_status" => "European National"
	],
	[
		"id" => 12663,
		"user_id" => 9951,
		"work_status" => "European National"
	],
	[
		"id" => 12664,
		"user_id" => 12425,
		"work_status" => "0"
	],
	[
		"id" => 19228,
		"user_id" => 23775,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12666,
		"user_id" => 16279,
		"work_status" => "Non European National"
	],
	[
		"id" => 24663,
		"user_id" => 30227,
		"work_status" => "European National"
	],
	[
		"id" => 19397,
		"user_id" => 23944,
		"work_status" => "Non European National"
	],
	[
		"id" => 12671,
		"user_id" => 16285,
		"work_status" => "0"
	],
	[
		"id" => 12672,
		"user_id" => 16286,
		"work_status" => "Non European National"
	],
	[
		"id" => 12674,
		"user_id" => 11311,
		"work_status" => "European National"
	],
	[
		"id" => 19140,
		"user_id" => 23687,
		"work_status" => "European National"
	],
	[
		"id" => 12678,
		"user_id" => 12340,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16640,
		"user_id" => 21074,
		"work_status" => "Non European National"
	],
	[
		"id" => 23677,
		"user_id" => 29241,
		"work_status" => "Non European National"
	],
	[
		"id" => 18937,
		"user_id" => 23484,
		"work_status" => "European National"
	],
	[
		"id" => 18910,
		"user_id" => 23457,
		"work_status" => "European National"
	],
	[
		"id" => 12683,
		"user_id" => 16298,
		"work_status" => "Non European National"
	],
	[
		"id" => 12684,
		"user_id" => 16299,
		"work_status" => "0"
	],
	[
		"id" => 12685,
		"user_id" => 10681,
		"work_status" => "0"
	],
	[
		"id" => 12686,
		"user_id" => 12346,
		"work_status" => "0"
	],
	[
		"id" => 12687,
		"user_id" => 16300,
		"work_status" => "European National"
	],
	[
		"id" => 12688,
		"user_id" => 16182,
		"work_status" => "Non European National"
	],
	[
		"id" => 12689,
		"user_id" => 16302,
		"work_status" => "Non European National"
	],
	[
		"id" => 19842,
		"user_id" => 24389,
		"work_status" => "Non European National"
	],
	[
		"id" => 12691,
		"user_id" => 11187,
		"work_status" => "0"
	],
	[
		"id" => 12712,
		"user_id" => 12060,
		"work_status" => "0"
	],
	[
		"id" => 24428,
		"user_id" => 29992,
		"work_status" => "Non European National"
	],
	[
		"id" => 19328,
		"user_id" => 23875,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24473,
		"user_id" => 30037,
		"work_status" => "European National"
	],
	[
		"id" => 12716,
		"user_id" => 16342,
		"work_status" => "0"
	],
	[
		"id" => 12717,
		"user_id" => 16343,
		"work_status" => "0"
	],
	[
		"id" => 22110,
		"user_id" => 27636,
		"work_status" => "Non European National"
	],
	[
		"id" => 12719,
		"user_id" => 16344,
		"work_status" => "Non European National"
	],
	[
		"id" => 12720,
		"user_id" => 16345,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12722,
		"user_id" => 15626,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12724,
		"user_id" => 16349,
		"work_status" => "European National"
	],
	[
		"id" => 23188,
		"user_id" => 28714,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12726,
		"user_id" => 16117,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12727,
		"user_id" => 16354,
		"work_status" => "0"
	],
	[
		"id" => 12729,
		"user_id" => 16356,
		"work_status" => "0"
	],
	[
		"id" => 12730,
		"user_id" => 16357,
		"work_status" => "Non European National"
	],
	[
		"id" => 12731,
		"user_id" => 16358,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12732,
		"user_id" => 16365,
		"work_status" => "0"
	],
	[
		"id" => 19585,
		"user_id" => 24132,
		"work_status" => "European National"
	],
	[
		"id" => 12735,
		"user_id" => 16374,
		"work_status" => "0"
	],
	[
		"id" => 19518,
		"user_id" => 24065,
		"work_status" => "Non European National"
	],
	[
		"id" => 12737,
		"user_id" => 16376,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12738,
		"user_id" => 16380,
		"work_status" => "Non European National"
	],
	[
		"id" => 12741,
		"user_id" => 16381,
		"work_status" => "0"
	],
	[
		"id" => 12742,
		"user_id" => 16382,
		"work_status" => "0"
	],
	[
		"id" => 12744,
		"user_id" => 16386,
		"work_status" => "European National"
	],
	[
		"id" => 12745,
		"user_id" => 16387,
		"work_status" => "European National"
	],
	[
		"id" => 19375,
		"user_id" => 23922,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12747,
		"user_id" => 16395,
		"work_status" => "European National"
	],
	[
		"id" => 12748,
		"user_id" => 16396,
		"work_status" => "Non European National"
	],
	[
		"id" => 23895,
		"user_id" => 29459,
		"work_status" => "European National"
	],
	[
		"id" => 25794,
		"user_id" => 31913,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12752,
		"user_id" => 16408,
		"work_status" => "European National"
	],
	[
		"id" => 24869,
		"user_id" => 30433,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12754,
		"user_id" => 16411,
		"work_status" => "Non European National"
	],
	[
		"id" => 12755,
		"user_id" => 16413,
		"work_status" => "0"
	],
	[
		"id" => 12756,
		"user_id" => 16416,
		"work_status" => "0"
	],
	[
		"id" => 21833,
		"user_id" => 27359,
		"work_status" => "European National"
	],
	[
		"id" => 12759,
		"user_id" => 16420,
		"work_status" => "European National"
	],
	[
		"id" => 19366,
		"user_id" => 23913,
		"work_status" => "European National"
	],
	[
		"id" => 12761,
		"user_id" => 16423,
		"work_status" => "0"
	],
	[
		"id" => 19688,
		"user_id" => 24235,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19506,
		"user_id" => 24053,
		"work_status" => "Non European National"
	],
	[
		"id" => 19231,
		"user_id" => 23778,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12765,
		"user_id" => 16430,
		"work_status" => "0"
	],
	[
		"id" => 24643,
		"user_id" => 30207,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23190,
		"user_id" => 28716,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18822,
		"user_id" => 23369,
		"work_status" => "Non European National"
	],
	[
		"id" => 18837,
		"user_id" => 23384,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12775,
		"user_id" => 16440,
		"work_status" => "0"
	],
	[
		"id" => 12776,
		"user_id" => 16159,
		"work_status" => "0"
	],
	[
		"id" => 23008,
		"user_id" => 28534,
		"work_status" => "Non European National"
	],
	[
		"id" => 12778,
		"user_id" => 16441,
		"work_status" => "European National"
	],
	[
		"id" => 12779,
		"user_id" => 16443,
		"work_status" => "European National"
	],
	[
		"id" => 24435,
		"user_id" => 29999,
		"work_status" => "European National"
	],
	[
		"id" => 12783,
		"user_id" => 16450,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24721,
		"user_id" => 30285,
		"work_status" => "Non European National"
	],
	[
		"id" => 19155,
		"user_id" => 23702,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12786,
		"user_id" => 16452,
		"work_status" => "0"
	],
	[
		"id" => 12787,
		"user_id" => 16454,
		"work_status" => "0"
	],
	[
		"id" => 12788,
		"user_id" => 16455,
		"work_status" => "0"
	],
	[
		"id" => 12789,
		"user_id" => 16427,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12790,
		"user_id" => 16457,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20146,
		"user_id" => 24838,
		"work_status" => "Non European National"
	],
	[
		"id" => 12792,
		"user_id" => 16460,
		"work_status" => "0"
	],
	[
		"id" => 22554,
		"user_id" => 28080,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18817,
		"user_id" => 23364,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12795,
		"user_id" => 16252,
		"work_status" => "Non European National"
	],
	[
		"id" => 22872,
		"user_id" => 28398,
		"work_status" => "Non European National"
	],
	[
		"id" => 19461,
		"user_id" => 24008,
		"work_status" => "European National"
	],
	[
		"id" => 12799,
		"user_id" => 16466,
		"work_status" => "Non European National"
	],
	[
		"id" => 12800,
		"user_id" => 16462,
		"work_status" => "0"
	],
	[
		"id" => 12803,
		"user_id" => 16469,
		"work_status" => "European National"
	],
	[
		"id" => 18921,
		"user_id" => 23468,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12805,
		"user_id" => 16472,
		"work_status" => "European National"
	],
	[
		"id" => 12806,
		"user_id" => 16470,
		"work_status" => "0"
	],
	[
		"id" => 12808,
		"user_id" => 16476,
		"work_status" => "0"
	],
	[
		"id" => 19569,
		"user_id" => 24116,
		"work_status" => "European National"
	],
	[
		"id" => 12810,
		"user_id" => 16475,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12811,
		"user_id" => 12762,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12812,
		"user_id" => 16480,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19438,
		"user_id" => 23985,
		"work_status" => "Non European National"
	],
	[
		"id" => 19336,
		"user_id" => 23883,
		"work_status" => "European National"
	],
	[
		"id" => 12815,
		"user_id" => 16478,
		"work_status" => "Non European National"
	],
	[
		"id" => 18998,
		"user_id" => 23545,
		"work_status" => "European National"
	],
	[
		"id" => 12818,
		"user_id" => 16486,
		"work_status" => "Non European National"
	],
	[
		"id" => 26286,
		"user_id" => 32645,
		"work_status" => "European National"
	],
	[
		"id" => 12820,
		"user_id" => 16488,
		"work_status" => "Non European National"
	],
	[
		"id" => 22220,
		"user_id" => 27746,
		"work_status" => "Non European National"
	],
	[
		"id" => 12822,
		"user_id" => 16493,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12823,
		"user_id" => 16492,
		"work_status" => "Non European National"
	],
	[
		"id" => 12824,
		"user_id" => 16495,
		"work_status" => "0"
	],
	[
		"id" => 12825,
		"user_id" => 16499,
		"work_status" => "0"
	],
	[
		"id" => 19133,
		"user_id" => 23680,
		"work_status" => "Non European National"
	],
	[
		"id" => 12827,
		"user_id" => 16502,
		"work_status" => "0"
	],
	[
		"id" => 12828,
		"user_id" => 16503,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12829,
		"user_id" => 16504,
		"work_status" => "0"
	],
	[
		"id" => 19038,
		"user_id" => 23585,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12831,
		"user_id" => 16506,
		"work_status" => "0"
	],
	[
		"id" => 12833,
		"user_id" => 16511,
		"work_status" => "0"
	],
	[
		"id" => 23879,
		"user_id" => 29443,
		"work_status" => "Non European National"
	],
	[
		"id" => 12835,
		"user_id" => 16516,
		"work_status" => "European National"
	],
	[
		"id" => 12836,
		"user_id" => 16517,
		"work_status" => "0"
	],
	[
		"id" => 12837,
		"user_id" => 16518,
		"work_status" => "Non European National"
	],
	[
		"id" => 12838,
		"user_id" => 16519,
		"work_status" => "0"
	],
	[
		"id" => 24537,
		"user_id" => 30101,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12841,
		"user_id" => 16524,
		"work_status" => "Non European National"
	],
	[
		"id" => 19126,
		"user_id" => 23673,
		"work_status" => "Non European National"
	],
	[
		"id" => 12844,
		"user_id" => 16526,
		"work_status" => "Non European National"
	],
	[
		"id" => 12845,
		"user_id" => 9354,
		"work_status" => "0"
	],
	[
		"id" => 19716,
		"user_id" => 24263,
		"work_status" => "European National"
	],
	[
		"id" => 12849,
		"user_id" => 16531,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12850,
		"user_id" => 16532,
		"work_status" => "0"
	],
	[
		"id" => 12851,
		"user_id" => 16533,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12852,
		"user_id" => 16535,
		"work_status" => "Non European National"
	],
	[
		"id" => 12853,
		"user_id" => 16536,
		"work_status" => "0"
	],
	[
		"id" => 12854,
		"user_id" => 16537,
		"work_status" => "0"
	],
	[
		"id" => 19066,
		"user_id" => 23613,
		"work_status" => "European National"
	],
	[
		"id" => 12927,
		"user_id" => 16637,
		"work_status" => "Non European National"
	],
	[
		"id" => 12857,
		"user_id" => 16538,
		"work_status" => "0"
	],
	[
		"id" => 12858,
		"user_id" => 16540,
		"work_status" => "Non European National"
	],
	[
		"id" => 19909,
		"user_id" => 24456,
		"work_status" => "European National"
	],
	[
		"id" => 18901,
		"user_id" => 23448,
		"work_status" => "European National"
	],
	[
		"id" => 12863,
		"user_id" => 12598,
		"work_status" => "European National"
	],
	[
		"id" => 19109,
		"user_id" => 23656,
		"work_status" => "Non European National"
	],
	[
		"id" => 18861,
		"user_id" => 23408,
		"work_status" => "European National"
	],
	[
		"id" => 12866,
		"user_id" => 16548,
		"work_status" => "0"
	],
	[
		"id" => 12867,
		"user_id" => 16549,
		"work_status" => "European National"
	],
	[
		"id" => 12868,
		"user_id" => 16554,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12869,
		"user_id" => 16555,
		"work_status" => "0"
	],
	[
		"id" => 22824,
		"user_id" => 28350,
		"work_status" => "Non European National"
	],
	[
		"id" => 22957,
		"user_id" => 28483,
		"work_status" => "Non European National"
	],
	[
		"id" => 26435,
		"user_id" => 32182,
		"work_status" => "Non European National"
	],
	[
		"id" => 19260,
		"user_id" => 23807,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24794,
		"user_id" => 30358,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12878,
		"user_id" => 16565,
		"work_status" => "0"
	],
	[
		"id" => 23037,
		"user_id" => 28563,
		"work_status" => "European National"
	],
	[
		"id" => 12880,
		"user_id" => 16567,
		"work_status" => "0"
	],
	[
		"id" => 19448,
		"user_id" => 23995,
		"work_status" => "European National"
	],
	[
		"id" => 12882,
		"user_id" => 16570,
		"work_status" => "0"
	],
	[
		"id" => 12883,
		"user_id" => 16572,
		"work_status" => "0"
	],
	[
		"id" => 12885,
		"user_id" => 16573,
		"work_status" => "0"
	],
	[
		"id" => 22873,
		"user_id" => 28399,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12889,
		"user_id" => 16579,
		"work_status" => "Non European National"
	],
	[
		"id" => 12890,
		"user_id" => 16580,
		"work_status" => "Non European National"
	],
	[
		"id" => 19198,
		"user_id" => 23745,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19671,
		"user_id" => 24218,
		"work_status" => "Non European National"
	],
	[
		"id" => 12893,
		"user_id" => 16583,
		"work_status" => "Non European National"
	],
	[
		"id" => 12894,
		"user_id" => 16584,
		"work_status" => "Non European National"
	],
	[
		"id" => 12895,
		"user_id" => 16585,
		"work_status" => "0"
	],
	[
		"id" => 19010,
		"user_id" => 23557,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12898,
		"user_id" => 16590,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12899,
		"user_id" => 16591,
		"work_status" => "0"
	],
	[
		"id" => 12900,
		"user_id" => 16592,
		"work_status" => "0"
	],
	[
		"id" => 12901,
		"user_id" => 16594,
		"work_status" => "Non European National"
	],
	[
		"id" => 12902,
		"user_id" => 16595,
		"work_status" => "European National"
	],
	[
		"id" => 19832,
		"user_id" => 24379,
		"work_status" => "Non European National"
	],
	[
		"id" => 12904,
		"user_id" => 16597,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12906,
		"user_id" => 16601,
		"work_status" => "0"
	],
	[
		"id" => 19022,
		"user_id" => 23569,
		"work_status" => "Non European National"
	],
	[
		"id" => 12908,
		"user_id" => 16608,
		"work_status" => "0"
	],
	[
		"id" => 12909,
		"user_id" => 16266,
		"work_status" => "Non European National"
	],
	[
		"id" => 12911,
		"user_id" => 16609,
		"work_status" => "0"
	],
	[
		"id" => 12912,
		"user_id" => 12215,
		"work_status" => "European National"
	],
	[
		"id" => 12913,
		"user_id" => 16512,
		"work_status" => "0"
	],
	[
		"id" => 19234,
		"user_id" => 23781,
		"work_status" => "Non European National"
	],
	[
		"id" => 18855,
		"user_id" => 23402,
		"work_status" => "European National"
	],
	[
		"id" => 19657,
		"user_id" => 24204,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12918,
		"user_id" => 16619,
		"work_status" => "European National"
	],
	[
		"id" => 12923,
		"user_id" => 16428,
		"work_status" => "0"
	],
	[
		"id" => 12924,
		"user_id" => 16633,
		"work_status" => "0"
	],
	[
		"id" => 22960,
		"user_id" => 28486,
		"work_status" => "Non European National"
	],
	[
		"id" => 16626,
		"user_id" => 21048,
		"work_status" => "European National"
	],
	[
		"id" => 12928,
		"user_id" => 16638,
		"work_status" => "Non European National"
	],
	[
		"id" => 12932,
		"user_id" => 16644,
		"work_status" => "Non European National"
	],
	[
		"id" => 12933,
		"user_id" => 16643,
		"work_status" => "Non European National"
	],
	[
		"id" => 12934,
		"user_id" => 16647,
		"work_status" => "0"
	],
	[
		"id" => 12935,
		"user_id" => 16648,
		"work_status" => "Non European National"
	],
	[
		"id" => 12937,
		"user_id" => 16650,
		"work_status" => "0"
	],
	[
		"id" => 12938,
		"user_id" => 16653,
		"work_status" => "0"
	],
	[
		"id" => 12939,
		"user_id" => 16656,
		"work_status" => "0"
	],
	[
		"id" => 20113,
		"user_id" => 24777,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12942,
		"user_id" => 16658,
		"work_status" => "European National"
	],
	[
		"id" => 23629,
		"user_id" => 29193,
		"work_status" => "European National"
	],
	[
		"id" => 12944,
		"user_id" => 16663,
		"work_status" => "Non European National"
	],
	[
		"id" => 27495,
		"user_id" => 34325,
		"work_status" => "Non European National"
	],
	[
		"id" => 12946,
		"user_id" => 16390,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19611,
		"user_id" => 24158,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12948,
		"user_id" => 16670,
		"work_status" => "European National"
	],
	[
		"id" => 20404,
		"user_id" => 25223,
		"work_status" => "Non European National"
	],
	[
		"id" => 12950,
		"user_id" => 16674,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12951,
		"user_id" => 16676,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12952,
		"user_id" => 16675,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24622,
		"user_id" => 30186,
		"work_status" => "Non European National"
	],
	[
		"id" => 16692,
		"user_id" => 21153,
		"work_status" => "Non European National"
	],
	[
		"id" => 19745,
		"user_id" => 24292,
		"work_status" => "European National"
	],
	[
		"id" => 12956,
		"user_id" => 16681,
		"work_status" => "Non European National"
	],
	[
		"id" => 12957,
		"user_id" => 16680,
		"work_status" => "Non European National"
	],
	[
		"id" => 12959,
		"user_id" => 16683,
		"work_status" => "Non European National"
	],
	[
		"id" => 12960,
		"user_id" => 16684,
		"work_status" => "European National"
	],
	[
		"id" => 12962,
		"user_id" => 16688,
		"work_status" => "0"
	],
	[
		"id" => 12963,
		"user_id" => 16687,
		"work_status" => "Non European National"
	],
	[
		"id" => 13947,
		"user_id" => 17751,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12964,
		"user_id" => 16691,
		"work_status" => "0"
	],
	[
		"id" => 12967,
		"user_id" => 16697,
		"work_status" => "Non European National"
	],
	[
		"id" => 12968,
		"user_id" => 16698,
		"work_status" => "0"
	],
	[
		"id" => 12969,
		"user_id" => 16699,
		"work_status" => "0"
	],
	[
		"id" => 19008,
		"user_id" => 23555,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12971,
		"user_id" => 16701,
		"work_status" => "Non European National"
	],
	[
		"id" => 23658,
		"user_id" => 29222,
		"work_status" => "Non European National"
	],
	[
		"id" => 12973,
		"user_id" => 16704,
		"work_status" => "0"
	],
	[
		"id" => 12974,
		"user_id" => 16705,
		"work_status" => "0"
	],
	[
		"id" => 12975,
		"user_id" => 16703,
		"work_status" => "Non European National"
	],
	[
		"id" => 12976,
		"user_id" => 16706,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12977,
		"user_id" => 16707,
		"work_status" => "0"
	],
	[
		"id" => 12978,
		"user_id" => 16689,
		"work_status" => "0"
	],
	[
		"id" => 23473,
		"user_id" => 29037,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12980,
		"user_id" => 16711,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19528,
		"user_id" => 24075,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12982,
		"user_id" => 16715,
		"work_status" => "0"
	],
	[
		"id" => 24386,
		"user_id" => 29950,
		"work_status" => "European National"
	],
	[
		"id" => 19196,
		"user_id" => 23743,
		"work_status" => "Non European National"
	],
	[
		"id" => 12986,
		"user_id" => 16720,
		"work_status" => "European National"
	],
	[
		"id" => 27458,
		"user_id" => 34258,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 12988,
		"user_id" => 16694,
		"work_status" => "Non European National"
	],
	[
		"id" => 12989,
		"user_id" => 16726,
		"work_status" => "Non European National"
	],
	[
		"id" => 22890,
		"user_id" => 28416,
		"work_status" => "European National"
	],
	[
		"id" => 24525,
		"user_id" => 30089,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27031,
		"user_id" => 33647,
		"work_status" => "European National"
	],
	[
		"id" => 12994,
		"user_id" => 16735,
		"work_status" => "Non European National"
	],
	[
		"id" => 12995,
		"user_id" => 16736,
		"work_status" => "European National"
	],
	[
		"id" => 12996,
		"user_id" => 16716,
		"work_status" => "0"
	],
	[
		"id" => 12997,
		"user_id" => 16737,
		"work_status" => "European National"
	],
	[
		"id" => 20234,
		"user_id" => 24968,
		"work_status" => "European National"
	],
	[
		"id" => 19810,
		"user_id" => 24357,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13002,
		"user_id" => 16744,
		"work_status" => "0"
	],
	[
		"id" => 13004,
		"user_id" => 16749,
		"work_status" => "European National"
	],
	[
		"id" => 13006,
		"user_id" => 16752,
		"work_status" => "0"
	],
	[
		"id" => 13007,
		"user_id" => 16753,
		"work_status" => "0"
	],
	[
		"id" => 13008,
		"user_id" => 16754,
		"work_status" => "0"
	],
	[
		"id" => 18739,
		"user_id" => 23286,
		"work_status" => "European National"
	],
	[
		"id" => 13010,
		"user_id" => 16759,
		"work_status" => "European National"
	],
	[
		"id" => 13013,
		"user_id" => 16763,
		"work_status" => "0"
	],
	[
		"id" => 19773,
		"user_id" => 24320,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13015,
		"user_id" => 16767,
		"work_status" => "0"
	],
	[
		"id" => 13017,
		"user_id" => 16770,
		"work_status" => "0"
	],
	[
		"id" => 13018,
		"user_id" => 16771,
		"work_status" => "Non European National"
	],
	[
		"id" => 19001,
		"user_id" => 23548,
		"work_status" => "Non European National"
	],
	[
		"id" => 13020,
		"user_id" => 16773,
		"work_status" => "0"
	],
	[
		"id" => 13021,
		"user_id" => 16774,
		"work_status" => "European National"
	],
	[
		"id" => 13023,
		"user_id" => 16779,
		"work_status" => "European National"
	],
	[
		"id" => 13024,
		"user_id" => 16780,
		"work_status" => "0"
	],
	[
		"id" => 13025,
		"user_id" => 16781,
		"work_status" => "European National"
	],
	[
		"id" => 24513,
		"user_id" => 30077,
		"work_status" => "European National"
	],
	[
		"id" => 13028,
		"user_id" => 16785,
		"work_status" => "0"
	],
	[
		"id" => 20135,
		"user_id" => 24808,
		"work_status" => "0"
	],
	[
		"id" => 24377,
		"user_id" => 29941,
		"work_status" => "Non European National"
	],
	[
		"id" => 21968,
		"user_id" => 27494,
		"work_status" => "Non European National"
	],
	[
		"id" => 13033,
		"user_id" => 16795,
		"work_status" => "0"
	],
	[
		"id" => 13034,
		"user_id" => 16797,
		"work_status" => "European National"
	],
	[
		"id" => 16689,
		"user_id" => 21148,
		"work_status" => "Non European National"
	],
	[
		"id" => 13036,
		"user_id" => 16800,
		"work_status" => "0"
	],
	[
		"id" => 13038,
		"user_id" => 16804,
		"work_status" => "0"
	],
	[
		"id" => 13040,
		"user_id" => 16807,
		"work_status" => "Non European National"
	],
	[
		"id" => 13041,
		"user_id" => 16809,
		"work_status" => "0"
	],
	[
		"id" => 24530,
		"user_id" => 30094,
		"work_status" => "Non European National"
	],
	[
		"id" => 23592,
		"user_id" => 29156,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20034,
		"user_id" => 24513,
		"work_status" => "European National"
	],
	[
		"id" => 13045,
		"user_id" => 16815,
		"work_status" => "0"
	],
	[
		"id" => 13047,
		"user_id" => 16814,
		"work_status" => "European National"
	],
	[
		"id" => 13048,
		"user_id" => 16816,
		"work_status" => "0"
	],
	[
		"id" => 13049,
		"user_id" => 16821,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16375,
		"user_id" => 20639,
		"work_status" => "0"
	],
	[
		"id" => 16376,
		"user_id" => 20642,
		"work_status" => "Non European National"
	],
	[
		"id" => 24861,
		"user_id" => 30425,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19450,
		"user_id" => 23997,
		"work_status" => "Non European National"
	],
	[
		"id" => 19185,
		"user_id" => 23732,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13058,
		"user_id" => 16364,
		"work_status" => "European National"
	],
	[
		"id" => 13059,
		"user_id" => 16837,
		"work_status" => "Non European National"
	],
	[
		"id" => 13060,
		"user_id" => 16838,
		"work_status" => "0"
	],
	[
		"id" => 19031,
		"user_id" => 23578,
		"work_status" => "Non European National"
	],
	[
		"id" => 16680,
		"user_id" => 21133,
		"work_status" => "European National"
	],
	[
		"id" => 13064,
		"user_id" => 16843,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19834,
		"user_id" => 24381,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13066,
		"user_id" => 16847,
		"work_status" => "Non European National"
	],
	[
		"id" => 18776,
		"user_id" => 23323,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19166,
		"user_id" => 23713,
		"work_status" => "Non European National"
	],
	[
		"id" => 19178,
		"user_id" => 23725,
		"work_status" => "Non European National"
	],
	[
		"id" => 13071,
		"user_id" => 16855,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20129,
		"user_id" => 24805,
		"work_status" => "0"
	],
	[
		"id" => 20130,
		"user_id" => 24806,
		"work_status" => "0"
	],
	[
		"id" => 13073,
		"user_id" => 16857,
		"work_status" => "0"
	],
	[
		"id" => 13075,
		"user_id" => 16861,
		"work_status" => "0"
	],
	[
		"id" => 24632,
		"user_id" => 30196,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13077,
		"user_id" => 16864,
		"work_status" => "Non European National"
	],
	[
		"id" => 13078,
		"user_id" => 16865,
		"work_status" => "Non European National"
	],
	[
		"id" => 13079,
		"user_id" => 16867,
		"work_status" => "European National"
	],
	[
		"id" => 13080,
		"user_id" => 16872,
		"work_status" => "Non European National"
	],
	[
		"id" => 22670,
		"user_id" => 28196,
		"work_status" => "Non European National"
	],
	[
		"id" => 13083,
		"user_id" => 16874,
		"work_status" => "0"
	],
	[
		"id" => 13084,
		"user_id" => 16877,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23478,
		"user_id" => 29042,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13086,
		"user_id" => 16879,
		"work_status" => "0"
	],
	[
		"id" => 13087,
		"user_id" => 16868,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13090,
		"user_id" => 16883,
		"work_status" => "European National"
	],
	[
		"id" => 13091,
		"user_id" => 16870,
		"work_status" => "European National"
	],
	[
		"id" => 13092,
		"user_id" => 16884,
		"work_status" => "0"
	],
	[
		"id" => 13093,
		"user_id" => 16888,
		"work_status" => "0"
	],
	[
		"id" => 13094,
		"user_id" => 16892,
		"work_status" => "0"
	],
	[
		"id" => 13095,
		"user_id" => 16893,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13096,
		"user_id" => 16896,
		"work_status" => "0"
	],
	[
		"id" => 13097,
		"user_id" => 16895,
		"work_status" => "0"
	],
	[
		"id" => 22126,
		"user_id" => 27652,
		"work_status" => "Non European National"
	],
	[
		"id" => 13099,
		"user_id" => 16898,
		"work_status" => "0"
	],
	[
		"id" => 24678,
		"user_id" => 30242,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13101,
		"user_id" => 16900,
		"work_status" => "European National"
	],
	[
		"id" => 13102,
		"user_id" => 16901,
		"work_status" => "0"
	],
	[
		"id" => 13103,
		"user_id" => 16902,
		"work_status" => "Non European National"
	],
	[
		"id" => 13104,
		"user_id" => 16904,
		"work_status" => "European National"
	],
	[
		"id" => 23718,
		"user_id" => 29282,
		"work_status" => "European National"
	],
	[
		"id" => 24573,
		"user_id" => 30137,
		"work_status" => "European National"
	],
	[
		"id" => 13107,
		"user_id" => 16907,
		"work_status" => "0"
	],
	[
		"id" => 13108,
		"user_id" => 16908,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24426,
		"user_id" => 29990,
		"work_status" => "European National"
	],
	[
		"id" => 19883,
		"user_id" => 24430,
		"work_status" => "Non European National"
	],
	[
		"id" => 13111,
		"user_id" => 16911,
		"work_status" => "0"
	],
	[
		"id" => 13112,
		"user_id" => 16915,
		"work_status" => "0"
	],
	[
		"id" => 13113,
		"user_id" => 16916,
		"work_status" => "European National"
	],
	[
		"id" => 22562,
		"user_id" => 28088,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24524,
		"user_id" => 30088,
		"work_status" => "Non European National"
	],
	[
		"id" => 13117,
		"user_id" => 16918,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 13118,
		"user_id" => 16919,
		"work_status" => "0"
	],
	[
		"id" => 13119,
		"user_id" => 16921,
		"work_status" => "0"
	],
	[
		"id" => 19764,
		"user_id" => 24311,
		"work_status" => "Non European National"
	],
	[
		"id" => 13121,
		"user_id" => 16924,
		"work_status" => "0"
	],
	[
		"id" => 13123,
		"user_id" => 16927,
		"work_status" => "0"
	],
	[
		"id" => 24504,
		"user_id" => 30068,
		"work_status" => "Non European National"
	],
	[
		"id" => 13125,
		"user_id" => 16928,
		"work_status" => "Non European National"
	],
	[
		"id" => 13126,
		"user_id" => 16930,
		"work_status" => "European National"
	],
	[
		"id" => 23477,
		"user_id" => 29041,
		"work_status" => "Non European National"
	],
	[
		"id" => 13129,
		"user_id" => 16933,
		"work_status" => "Non European National"
	],
	[
		"id" => 26421,
		"user_id" => 32807,
		"work_status" => "European National"
	],
	[
		"id" => 15492,
		"user_id" => 19355,
		"work_status" => "Non European National"
	],
	[
		"id" => 24759,
		"user_id" => 30323,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15406,
		"user_id" => 16850,
		"work_status" => "0"
	],
	[
		"id" => 15407,
		"user_id" => 19212,
		"work_status" => "0"
	],
	[
		"id" => 15410,
		"user_id" => 19218,
		"work_status" => "Non European National"
	],
	[
		"id" => 15411,
		"user_id" => 19220,
		"work_status" => "0"
	],
	[
		"id" => 15528,
		"user_id" => 19407,
		"work_status" => "Non European National"
	],
	[
		"id" => 15529,
		"user_id" => 19408,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22330,
		"user_id" => 27856,
		"work_status" => "Non European National"
	],
	[
		"id" => 15414,
		"user_id" => 19226,
		"work_status" => "European National"
	],
	[
		"id" => 15415,
		"user_id" => 19227,
		"work_status" => "0"
	],
	[
		"id" => 22421,
		"user_id" => 27947,
		"work_status" => "Non European National"
	],
	[
		"id" => 19885,
		"user_id" => 24432,
		"work_status" => "Non European National"
	],
	[
		"id" => 22340,
		"user_id" => 27866,
		"work_status" => "Non European National"
	],
	[
		"id" => 15419,
		"user_id" => 19233,
		"work_status" => "Non European National"
	],
	[
		"id" => 19452,
		"user_id" => 23999,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15421,
		"user_id" => 19235,
		"work_status" => "European National"
	],
	[
		"id" => 15422,
		"user_id" => 19230,
		"work_status" => "0"
	],
	[
		"id" => 15423,
		"user_id" => 19242,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15424,
		"user_id" => 19243,
		"work_status" => "0"
	],
	[
		"id" => 23778,
		"user_id" => 29342,
		"work_status" => "Non European National"
	],
	[
		"id" => 23867,
		"user_id" => 29431,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26441,
		"user_id" => 32834,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15428,
		"user_id" => 19246,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15429,
		"user_id" => 19247,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15430,
		"user_id" => 19248,
		"work_status" => "Non European National"
	],
	[
		"id" => 15431,
		"user_id" => 19249,
		"work_status" => "European National"
	],
	[
		"id" => 15432,
		"user_id" => 19250,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15433,
		"user_id" => 19251,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15434,
		"user_id" => 19254,
		"work_status" => "0"
	],
	[
		"id" => 15435,
		"user_id" => 19255,
		"work_status" => "Non European National"
	],
	[
		"id" => 23722,
		"user_id" => 29286,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24623,
		"user_id" => 30187,
		"work_status" => "European National"
	],
	[
		"id" => 15438,
		"user_id" => 19261,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15440,
		"user_id" => 19265,
		"work_status" => "0"
	],
	[
		"id" => 15442,
		"user_id" => 16560,
		"work_status" => "0"
	],
	[
		"id" => 15443,
		"user_id" => 19267,
		"work_status" => "European National"
	],
	[
		"id" => 22966,
		"user_id" => 28492,
		"work_status" => "Non European National"
	],
	[
		"id" => 15445,
		"user_id" => 19269,
		"work_status" => "0"
	],
	[
		"id" => 15446,
		"user_id" => 19271,
		"work_status" => "0"
	],
	[
		"id" => 22419,
		"user_id" => 27945,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22689,
		"user_id" => 28215,
		"work_status" => "European National"
	],
	[
		"id" => 15449,
		"user_id" => 19274,
		"work_status" => "Non European National"
	],
	[
		"id" => 15450,
		"user_id" => 19275,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15451,
		"user_id" => 19279,
		"work_status" => "0"
	],
	[
		"id" => 15452,
		"user_id" => 19281,
		"work_status" => "0"
	],
	[
		"id" => 15453,
		"user_id" => 19282,
		"work_status" => "0"
	],
	[
		"id" => 24855,
		"user_id" => 30419,
		"work_status" => "Non European National"
	],
	[
		"id" => 15456,
		"user_id" => 19286,
		"work_status" => "0"
	],
	[
		"id" => 15457,
		"user_id" => 19293,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19389,
		"user_id" => 23936,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19474,
		"user_id" => 24021,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15460,
		"user_id" => 12024,
		"work_status" => "Non European National"
	],
	[
		"id" => 15461,
		"user_id" => 19296,
		"work_status" => "European National"
	],
	[
		"id" => 15462,
		"user_id" => 19297,
		"work_status" => "0"
	],
	[
		"id" => 15463,
		"user_id" => 19298,
		"work_status" => "0"
	],
	[
		"id" => 15464,
		"user_id" => 19299,
		"work_status" => "Non European National"
	],
	[
		"id" => 15465,
		"user_id" => 19301,
		"work_status" => "Non European National"
	],
	[
		"id" => 15466,
		"user_id" => 19303,
		"work_status" => "Non European National"
	],
	[
		"id" => 15467,
		"user_id" => 19229,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19864,
		"user_id" => 24411,
		"work_status" => "Non European National"
	],
	[
		"id" => 19257,
		"user_id" => 23804,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15470,
		"user_id" => 19307,
		"work_status" => "0"
	],
	[
		"id" => 15471,
		"user_id" => 19308,
		"work_status" => "European National"
	],
	[
		"id" => 15474,
		"user_id" => 19314,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15475,
		"user_id" => 19316,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15476,
		"user_id" => 19318,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19143,
		"user_id" => 23690,
		"work_status" => "Non European National"
	],
	[
		"id" => 15478,
		"user_id" => 19327,
		"work_status" => "0"
	],
	[
		"id" => 24777,
		"user_id" => 30341,
		"work_status" => "Non European National"
	],
	[
		"id" => 15480,
		"user_id" => 19337,
		"work_status" => "European National"
	],
	[
		"id" => 24500,
		"user_id" => 30064,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15483,
		"user_id" => 19340,
		"work_status" => "Non European National"
	],
	[
		"id" => 15484,
		"user_id" => 19342,
		"work_status" => "0"
	],
	[
		"id" => 24383,
		"user_id" => 29947,
		"work_status" => "Non European National"
	],
	[
		"id" => 15486,
		"user_id" => 19343,
		"work_status" => "0"
	],
	[
		"id" => 15487,
		"user_id" => 19344,
		"work_status" => "0"
	],
	[
		"id" => 15488,
		"user_id" => 19346,
		"work_status" => "0"
	],
	[
		"id" => 18750,
		"user_id" => 23297,
		"work_status" => "Non European National"
	],
	[
		"id" => 20379,
		"user_id" => 25183,
		"work_status" => "0"
	],
	[
		"id" => 20380,
		"user_id" => 25184,
		"work_status" => "0"
	],
	[
		"id" => 24451,
		"user_id" => 30015,
		"work_status" => "European National"
	],
	[
		"id" => 19649,
		"user_id" => 24196,
		"work_status" => "European National"
	],
	[
		"id" => 15495,
		"user_id" => 19345,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15496,
		"user_id" => 19363,
		"work_status" => "0"
	],
	[
		"id" => 15497,
		"user_id" => 19365,
		"work_status" => "0"
	],
	[
		"id" => 15498,
		"user_id" => 19367,
		"work_status" => "Non European National"
	],
	[
		"id" => 15499,
		"user_id" => 19369,
		"work_status" => "0"
	],
	[
		"id" => 15500,
		"user_id" => 19371,
		"work_status" => "0"
	],
	[
		"id" => 15501,
		"user_id" => 19373,
		"work_status" => "0"
	],
	[
		"id" => 15502,
		"user_id" => 19372,
		"work_status" => "Non European National"
	],
	[
		"id" => 15503,
		"user_id" => 19375,
		"work_status" => "0"
	],
	[
		"id" => 15504,
		"user_id" => 19376,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15505,
		"user_id" => 19378,
		"work_status" => "0"
	],
	[
		"id" => 15506,
		"user_id" => 19377,
		"work_status" => "European National"
	],
	[
		"id" => 15507,
		"user_id" => 19381,
		"work_status" => "0"
	],
	[
		"id" => 19595,
		"user_id" => 24142,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15510,
		"user_id" => 19382,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19082,
		"user_id" => 23629,
		"work_status" => "European National"
	],
	[
		"id" => 19799,
		"user_id" => 24346,
		"work_status" => "European National"
	],
	[
		"id" => 19373,
		"user_id" => 23920,
		"work_status" => "Non European National"
	],
	[
		"id" => 19635,
		"user_id" => 24182,
		"work_status" => "Non European National"
	],
	[
		"id" => 19871,
		"user_id" => 24418,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15517,
		"user_id" => 19398,
		"work_status" => "Non European National"
	],
	[
		"id" => 15518,
		"user_id" => 19399,
		"work_status" => "Non European National"
	],
	[
		"id" => 24612,
		"user_id" => 30176,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23679,
		"user_id" => 29243,
		"work_status" => "Non European National"
	],
	[
		"id" => 15521,
		"user_id" => 19401,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23401,
		"user_id" => 28953,
		"work_status" => "Non European National"
	],
	[
		"id" => 15523,
		"user_id" => 19402,
		"work_status" => "European National"
	],
	[
		"id" => 15524,
		"user_id" => 19403,
		"work_status" => "0"
	],
	[
		"id" => 15525,
		"user_id" => 19405,
		"work_status" => "0"
	],
	[
		"id" => 15526,
		"user_id" => 19336,
		"work_status" => "0"
	],
	[
		"id" => 15531,
		"user_id" => 19410,
		"work_status" => "0"
	],
	[
		"id" => 15533,
		"user_id" => 19412,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15534,
		"user_id" => 19413,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15535,
		"user_id" => 19414,
		"work_status" => "European National"
	],
	[
		"id" => 15536,
		"user_id" => 19415,
		"work_status" => "0"
	],
	[
		"id" => 22185,
		"user_id" => 27711,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15538,
		"user_id" => 19417,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15539,
		"user_id" => 19418,
		"work_status" => "Non European National"
	],
	[
		"id" => 15540,
		"user_id" => 19352,
		"work_status" => "Non European National"
	],
	[
		"id" => 22288,
		"user_id" => 27814,
		"work_status" => "Non European National"
	],
	[
		"id" => 15542,
		"user_id" => 16903,
		"work_status" => "0"
	],
	[
		"id" => 18818,
		"user_id" => 23365,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15544,
		"user_id" => 19421,
		"work_status" => "Non European National"
	],
	[
		"id" => 23517,
		"user_id" => 29081,
		"work_status" => "European National"
	],
	[
		"id" => 19760,
		"user_id" => 24307,
		"work_status" => "Non European National"
	],
	[
		"id" => 18961,
		"user_id" => 23508,
		"work_status" => "European National"
	],
	[
		"id" => 15548,
		"user_id" => 19426,
		"work_status" => "Non European National"
	],
	[
		"id" => 19776,
		"user_id" => 24323,
		"work_status" => "Non European National"
	],
	[
		"id" => 15550,
		"user_id" => 19429,
		"work_status" => "0"
	],
	[
		"id" => 20454,
		"user_id" => 25302,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15552,
		"user_id" => 19431,
		"work_status" => "0"
	],
	[
		"id" => 23847,
		"user_id" => 29411,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23501,
		"user_id" => 29065,
		"work_status" => "European National"
	],
	[
		"id" => 15556,
		"user_id" => 19436,
		"work_status" => "0"
	],
	[
		"id" => 18836,
		"user_id" => 23383,
		"work_status" => "Non European National"
	],
	[
		"id" => 15560,
		"user_id" => 19441,
		"work_status" => "0"
	],
	[
		"id" => 15561,
		"user_id" => 19445,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23663,
		"user_id" => 29227,
		"work_status" => "European National"
	],
	[
		"id" => 15563,
		"user_id" => 19449,
		"work_status" => "0"
	],
	[
		"id" => 24858,
		"user_id" => 30422,
		"work_status" => "Non European National"
	],
	[
		"id" => 24885,
		"user_id" => 30449,
		"work_status" => "European National"
	],
	[
		"id" => 15565,
		"user_id" => 19451,
		"work_status" => "0"
	],
	[
		"id" => 15566,
		"user_id" => 19452,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25403,
		"user_id" => 31217,
		"work_status" => "0"
	],
	[
		"id" => 25404,
		"user_id" => 31221,
		"work_status" => "0"
	],
	[
		"id" => 25405,
		"user_id" => 31222,
		"work_status" => "0"
	],
	[
		"id" => 19252,
		"user_id" => 23799,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15569,
		"user_id" => 19457,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15570,
		"user_id" => 19459,
		"work_status" => "Non European National"
	],
	[
		"id" => 15571,
		"user_id" => 19460,
		"work_status" => "0"
	],
	[
		"id" => 15573,
		"user_id" => 19465,
		"work_status" => "0"
	],
	[
		"id" => 15574,
		"user_id" => 19464,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15575,
		"user_id" => 19466,
		"work_status" => "0"
	],
	[
		"id" => 15577,
		"user_id" => 19469,
		"work_status" => "0"
	],
	[
		"id" => 15578,
		"user_id" => 19470,
		"work_status" => "0"
	],
	[
		"id" => 15579,
		"user_id" => 19472,
		"work_status" => "0"
	],
	[
		"id" => 15582,
		"user_id" => 19475,
		"work_status" => "European National"
	],
	[
		"id" => 15583,
		"user_id" => 19476,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19809,
		"user_id" => 24356,
		"work_status" => "European National"
	],
	[
		"id" => 23816,
		"user_id" => 29380,
		"work_status" => "European National"
	],
	[
		"id" => 19123,
		"user_id" => 23670,
		"work_status" => "European National"
	],
	[
		"id" => 19880,
		"user_id" => 24427,
		"work_status" => "European National"
	],
	[
		"id" => 15589,
		"user_id" => 19487,
		"work_status" => "0"
	],
	[
		"id" => 18742,
		"user_id" => 23289,
		"work_status" => "European National"
	],
	[
		"id" => 15591,
		"user_id" => 19489,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15592,
		"user_id" => 19490,
		"work_status" => "0"
	],
	[
		"id" => 15593,
		"user_id" => 19491,
		"work_status" => "Non European National"
	],
	[
		"id" => 15594,
		"user_id" => 19492,
		"work_status" => "0"
	],
	[
		"id" => 15596,
		"user_id" => 19494,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27299,
		"user_id" => 34018,
		"work_status" => "0"
	],
	[
		"id" => 26426,
		"user_id" => 32814,
		"work_status" => "Non European National"
	],
	[
		"id" => 15599,
		"user_id" => 19501,
		"work_status" => "0"
	],
	[
		"id" => 19855,
		"user_id" => 24402,
		"work_status" => "European National"
	],
	[
		"id" => 23835,
		"user_id" => 29399,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21435,
		"user_id" => 26735,
		"work_status" => "0"
	],
	[
		"id" => 15603,
		"user_id" => 19507,
		"work_status" => "European National"
	],
	[
		"id" => 15604,
		"user_id" => 19508,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15605,
		"user_id" => 19511,
		"work_status" => "Non European National"
	],
	[
		"id" => 20106,
		"user_id" => 24757,
		"work_status" => "0"
	],
	[
		"id" => 20107,
		"user_id" => 24758,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25808,
		"user_id" => 31927,
		"work_status" => "Non European National"
	],
	[
		"id" => 15609,
		"user_id" => 19516,
		"work_status" => "Non European National"
	],
	[
		"id" => 18758,
		"user_id" => 23305,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19576,
		"user_id" => 24123,
		"work_status" => "Non European National"
	],
	[
		"id" => 15614,
		"user_id" => 19525,
		"work_status" => "Non European National"
	],
	[
		"id" => 15615,
		"user_id" => 19526,
		"work_status" => "European National"
	],
	[
		"id" => 15618,
		"user_id" => 19530,
		"work_status" => "European National"
	],
	[
		"id" => 15619,
		"user_id" => 19537,
		"work_status" => "Non European National"
	],
	[
		"id" => 23538,
		"user_id" => 29102,
		"work_status" => "Non European National"
	],
	[
		"id" => 15623,
		"user_id" => 19543,
		"work_status" => "European National"
	],
	[
		"id" => 23770,
		"user_id" => 29334,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19361,
		"user_id" => 23908,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15626,
		"user_id" => 19515,
		"work_status" => "Non European National"
	],
	[
		"id" => 15627,
		"user_id" => 19545,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15628,
		"user_id" => 19546,
		"work_status" => "0"
	],
	[
		"id" => 15630,
		"user_id" => 19548,
		"work_status" => "Non European National"
	],
	[
		"id" => 15631,
		"user_id" => 19532,
		"work_status" => "Non European National"
	],
	[
		"id" => 23704,
		"user_id" => 29268,
		"work_status" => "Non European National"
	],
	[
		"id" => 19142,
		"user_id" => 23689,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15635,
		"user_id" => 19556,
		"work_status" => "European National"
	],
	[
		"id" => 15636,
		"user_id" => 19558,
		"work_status" => "0"
	],
	[
		"id" => 15637,
		"user_id" => 19557,
		"work_status" => "Non European National"
	],
	[
		"id" => 15638,
		"user_id" => 19562,
		"work_status" => "Non European National"
	],
	[
		"id" => 15639,
		"user_id" => 19570,
		"work_status" => "0"
	],
	[
		"id" => 15641,
		"user_id" => 19573,
		"work_status" => "0"
	],
	[
		"id" => 15642,
		"user_id" => 19572,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15643,
		"user_id" => 19575,
		"work_status" => "Non European National"
	],
	[
		"id" => 19769,
		"user_id" => 24316,
		"work_status" => "European National"
	],
	[
		"id" => 15645,
		"user_id" => 19577,
		"work_status" => "0"
	],
	[
		"id" => 15647,
		"user_id" => 19579,
		"work_status" => "0"
	],
	[
		"id" => 15648,
		"user_id" => 19581,
		"work_status" => "European National"
	],
	[
		"id" => 15866,
		"user_id" => 19914,
		"work_status" => "0"
	],
	[
		"id" => 15867,
		"user_id" => 19915,
		"work_status" => "0"
	],
	[
		"id" => 15650,
		"user_id" => 19584,
		"work_status" => "Non European National"
	],
	[
		"id" => 19281,
		"user_id" => 23828,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15652,
		"user_id" => 10363,
		"work_status" => "0"
	],
	[
		"id" => 15654,
		"user_id" => 19587,
		"work_status" => "Non European National"
	],
	[
		"id" => 15655,
		"user_id" => 19588,
		"work_status" => "European National"
	],
	[
		"id" => 20155,
		"user_id" => 24853,
		"work_status" => "0"
	],
	[
		"id" => 15657,
		"user_id" => 19591,
		"work_status" => "European National"
	],
	[
		"id" => 15658,
		"user_id" => 19592,
		"work_status" => "0"
	],
	[
		"id" => 15660,
		"user_id" => 19594,
		"work_status" => "0"
	],
	[
		"id" => 24880,
		"user_id" => 30444,
		"work_status" => "Non European National"
	],
	[
		"id" => 15663,
		"user_id" => 19596,
		"work_status" => "0"
	],
	[
		"id" => 15664,
		"user_id" => 19598,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15666,
		"user_id" => 19601,
		"work_status" => "European National"
	],
	[
		"id" => 15667,
		"user_id" => 19605,
		"work_status" => "0"
	],
	[
		"id" => 15668,
		"user_id" => 19606,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19537,
		"user_id" => 24084,
		"work_status" => "European National"
	],
	[
		"id" => 15670,
		"user_id" => 19609,
		"work_status" => "European National"
	],
	[
		"id" => 15671,
		"user_id" => 19610,
		"work_status" => "0"
	],
	[
		"id" => 15672,
		"user_id" => 19611,
		"work_status" => "European National"
	],
	[
		"id" => 20289,
		"user_id" => 25043,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23148,
		"user_id" => 28674,
		"work_status" => "Non European National"
	],
	[
		"id" => 15676,
		"user_id" => 19620,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15677,
		"user_id" => 19621,
		"work_status" => "0"
	],
	[
		"id" => 15678,
		"user_id" => 16257,
		"work_status" => "Non European National"
	],
	[
		"id" => 20119,
		"user_id" => 24785,
		"work_status" => "Non European National"
	],
	[
		"id" => 19083,
		"user_id" => 23630,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21710,
		"user_id" => 27209,
		"work_status" => "0"
	],
	[
		"id" => 21711,
		"user_id" => 27210,
		"work_status" => "0"
	],
	[
		"id" => 21712,
		"user_id" => 27211,
		"work_status" => "Non European National"
	],
	[
		"id" => 15683,
		"user_id" => 19629,
		"work_status" => "0"
	],
	[
		"id" => 15684,
		"user_id" => 19630,
		"work_status" => "0"
	],
	[
		"id" => 15685,
		"user_id" => 19633,
		"work_status" => "0"
	],
	[
		"id" => 15686,
		"user_id" => 19634,
		"work_status" => "European National"
	],
	[
		"id" => 15687,
		"user_id" => 19635,
		"work_status" => "European National"
	],
	[
		"id" => 15688,
		"user_id" => 10616,
		"work_status" => "0"
	],
	[
		"id" => 24526,
		"user_id" => 30090,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15690,
		"user_id" => 19646,
		"work_status" => "European National"
	],
	[
		"id" => 15691,
		"user_id" => 19647,
		"work_status" => "European National"
	],
	[
		"id" => 24545,
		"user_id" => 30109,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15693,
		"user_id" => 11113,
		"work_status" => "0"
	],
	[
		"id" => 19690,
		"user_id" => 24237,
		"work_status" => "European National"
	],
	[
		"id" => 15695,
		"user_id" => 19657,
		"work_status" => "Non European National"
	],
	[
		"id" => 19049,
		"user_id" => 23596,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15698,
		"user_id" => 19659,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18904,
		"user_id" => 23451,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15700,
		"user_id" => 19661,
		"work_status" => "European National"
	],
	[
		"id" => 22018,
		"user_id" => 27544,
		"work_status" => "European National"
	],
	[
		"id" => 15702,
		"user_id" => 19664,
		"work_status" => "0"
	],
	[
		"id" => 19094,
		"user_id" => 23641,
		"work_status" => "Non European National"
	],
	[
		"id" => 19163,
		"user_id" => 23710,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15705,
		"user_id" => 19669,
		"work_status" => "Non European National"
	],
	[
		"id" => 19568,
		"user_id" => 24115,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15707,
		"user_id" => 19672,
		"work_status" => "0"
	],
	[
		"id" => 15709,
		"user_id" => 19673,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15710,
		"user_id" => 19674,
		"work_status" => "Non European National"
	],
	[
		"id" => 22505,
		"user_id" => 28031,
		"work_status" => "Non European National"
	],
	[
		"id" => 24379,
		"user_id" => 29943,
		"work_status" => "Non European National"
	],
	[
		"id" => 15713,
		"user_id" => 19682,
		"work_status" => "0"
	],
	[
		"id" => 23016,
		"user_id" => 28542,
		"work_status" => "Non European National"
	],
	[
		"id" => 15715,
		"user_id" => 11958,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15716,
		"user_id" => 19568,
		"work_status" => "Non European National"
	],
	[
		"id" => 15718,
		"user_id" => 19690,
		"work_status" => "0"
	],
	[
		"id" => 20152,
		"user_id" => 24848,
		"work_status" => "European National"
	],
	[
		"id" => 19077,
		"user_id" => 23624,
		"work_status" => "European National"
	],
	[
		"id" => 15722,
		"user_id" => 19696,
		"work_status" => "European National"
	],
	[
		"id" => 24665,
		"user_id" => 30229,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15724,
		"user_id" => 19698,
		"work_status" => "Non European National"
	],
	[
		"id" => 19876,
		"user_id" => 24423,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19209,
		"user_id" => 23756,
		"work_status" => "Non European National"
	],
	[
		"id" => 15727,
		"user_id" => 19706,
		"work_status" => "0"
	],
	[
		"id" => 15728,
		"user_id" => 19707,
		"work_status" => "0"
	],
	[
		"id" => 21771,
		"user_id" => 27297,
		"work_status" => "Non European National"
	],
	[
		"id" => 19823,
		"user_id" => 24370,
		"work_status" => "Non European National"
	],
	[
		"id" => 15731,
		"user_id" => 19717,
		"work_status" => "0"
	],
	[
		"id" => 18774,
		"user_id" => 23321,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15734,
		"user_id" => 19622,
		"work_status" => "0"
	],
	[
		"id" => 15735,
		"user_id" => 19721,
		"work_status" => "0"
	],
	[
		"id" => 15736,
		"user_id" => 19722,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21658,
		"user_id" => 27112,
		"work_status" => "0"
	],
	[
		"id" => 21659,
		"user_id" => 27113,
		"work_status" => "Non European National"
	],
	[
		"id" => 23741,
		"user_id" => 29305,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15739,
		"user_id" => 19725,
		"work_status" => "Non European National"
	],
	[
		"id" => 19457,
		"user_id" => 24004,
		"work_status" => "European National"
	],
	[
		"id" => 15741,
		"user_id" => 19727,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15742,
		"user_id" => 19728,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15743,
		"user_id" => 19729,
		"work_status" => "Non European National"
	],
	[
		"id" => 15856,
		"user_id" => 19893,
		"work_status" => "0"
	],
	[
		"id" => 22217,
		"user_id" => 27743,
		"work_status" => "European National"
	],
	[
		"id" => 19416,
		"user_id" => 23963,
		"work_status" => "European National"
	],
	[
		"id" => 15747,
		"user_id" => 19739,
		"work_status" => "0"
	],
	[
		"id" => 19316,
		"user_id" => 23863,
		"work_status" => "Non European National"
	],
	[
		"id" => 15749,
		"user_id" => 19700,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18819,
		"user_id" => 23366,
		"work_status" => "Non European National"
	],
	[
		"id" => 19698,
		"user_id" => 24245,
		"work_status" => "Non European National"
	],
	[
		"id" => 19607,
		"user_id" => 24154,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15753,
		"user_id" => 19748,
		"work_status" => "0"
	],
	[
		"id" => 15754,
		"user_id" => 19751,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15755,
		"user_id" => 11478,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16475,
		"user_id" => 20785,
		"work_status" => "0"
	],
	[
		"id" => 15757,
		"user_id" => 19757,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24784,
		"user_id" => 30348,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16474,
		"user_id" => 20783,
		"work_status" => "Non European National"
	],
	[
		"id" => 19574,
		"user_id" => 24121,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15760,
		"user_id" => 19762,
		"work_status" => "Non European National"
	],
	[
		"id" => 15763,
		"user_id" => 19766,
		"work_status" => "0"
	],
	[
		"id" => 19598,
		"user_id" => 24145,
		"work_status" => "European National"
	],
	[
		"id" => 16330,
		"user_id" => 20591,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15766,
		"user_id" => 19769,
		"work_status" => "Non European National"
	],
	[
		"id" => 15767,
		"user_id" => 19771,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15768,
		"user_id" => 19774,
		"work_status" => "European National"
	],
	[
		"id" => 15769,
		"user_id" => 19777,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15770,
		"user_id" => 19779,
		"work_status" => "0"
	],
	[
		"id" => 19618,
		"user_id" => 24165,
		"work_status" => "European National"
	],
	[
		"id" => 15772,
		"user_id" => 19781,
		"work_status" => "European National"
	],
	[
		"id" => 18745,
		"user_id" => 23292,
		"work_status" => "Non European National"
	],
	[
		"id" => 18840,
		"user_id" => 23387,
		"work_status" => "European National"
	],
	[
		"id" => 15775,
		"user_id" => 19733,
		"work_status" => "Non European National"
	],
	[
		"id" => 15776,
		"user_id" => 19784,
		"work_status" => "0"
	],
	[
		"id" => 15777,
		"user_id" => 19787,
		"work_status" => "0"
	],
	[
		"id" => 19195,
		"user_id" => 23742,
		"work_status" => "European National"
	],
	[
		"id" => 15780,
		"user_id" => 19790,
		"work_status" => "0"
	],
	[
		"id" => 19652,
		"user_id" => 24199,
		"work_status" => "European National"
	],
	[
		"id" => 24490,
		"user_id" => 30054,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15783,
		"user_id" => 19793,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23719,
		"user_id" => 29283,
		"work_status" => "Non European National"
	],
	[
		"id" => 18849,
		"user_id" => 23396,
		"work_status" => "European National"
	],
	[
		"id" => 24764,
		"user_id" => 30328,
		"work_status" => "European National"
	],
	[
		"id" => 15788,
		"user_id" => 19497,
		"work_status" => "0"
	],
	[
		"id" => 19173,
		"user_id" => 23720,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15790,
		"user_id" => 19800,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19451,
		"user_id" => 23998,
		"work_status" => "European National"
	],
	[
		"id" => 15793,
		"user_id" => 19803,
		"work_status" => "Non European National"
	],
	[
		"id" => 15794,
		"user_id" => 19807,
		"work_status" => "0"
	],
	[
		"id" => 18874,
		"user_id" => 23421,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15797,
		"user_id" => 19810,
		"work_status" => "0"
	],
	[
		"id" => 15798,
		"user_id" => 19811,
		"work_status" => "Non European National"
	],
	[
		"id" => 22275,
		"user_id" => 27801,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15800,
		"user_id" => 19813,
		"work_status" => "Non European National"
	],
	[
		"id" => 19287,
		"user_id" => 23834,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19285,
		"user_id" => 23832,
		"work_status" => "European National"
	],
	[
		"id" => 15805,
		"user_id" => 19668,
		"work_status" => "European National"
	],
	[
		"id" => 15806,
		"user_id" => 19820,
		"work_status" => "0"
	],
	[
		"id" => 15808,
		"user_id" => 19822,
		"work_status" => "0"
	],
	[
		"id" => 15809,
		"user_id" => 19823,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15810,
		"user_id" => 19826,
		"work_status" => "0"
	],
	[
		"id" => 15811,
		"user_id" => 19824,
		"work_status" => "Non European National"
	],
	[
		"id" => 15812,
		"user_id" => 10808,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15813,
		"user_id" => 19829,
		"work_status" => "0"
	],
	[
		"id" => 19502,
		"user_id" => 24049,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15816,
		"user_id" => 19833,
		"work_status" => "0"
	],
	[
		"id" => 15817,
		"user_id" => 19834,
		"work_status" => "0"
	],
	[
		"id" => 23904,
		"user_id" => 29468,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19401,
		"user_id" => 23948,
		"work_status" => "European National"
	],
	[
		"id" => 15820,
		"user_id" => 19844,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15821,
		"user_id" => 19847,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15822,
		"user_id" => 19849,
		"work_status" => "0"
	],
	[
		"id" => 15823,
		"user_id" => 19848,
		"work_status" => "0"
	],
	[
		"id" => 15824,
		"user_id" => 19850,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15825,
		"user_id" => 19851,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15826,
		"user_id" => 19852,
		"work_status" => "Non European National"
	],
	[
		"id" => 15827,
		"user_id" => 19853,
		"work_status" => "0"
	],
	[
		"id" => 15828,
		"user_id" => 19854,
		"work_status" => "0"
	],
	[
		"id" => 23856,
		"user_id" => 29420,
		"work_status" => "Non European National"
	],
	[
		"id" => 15831,
		"user_id" => 19856,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22613,
		"user_id" => 28139,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15835,
		"user_id" => 19863,
		"work_status" => "European National"
	],
	[
		"id" => 15836,
		"user_id" => 19864,
		"work_status" => "0"
	],
	[
		"id" => 15837,
		"user_id" => 19867,
		"work_status" => "European National"
	],
	[
		"id" => 15838,
		"user_id" => 19870,
		"work_status" => "0"
	],
	[
		"id" => 20571,
		"user_id" => 25432,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23769,
		"user_id" => 29333,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15843,
		"user_id" => 19876,
		"work_status" => "European National"
	],
	[
		"id" => 15844,
		"user_id" => 19874,
		"work_status" => "0"
	],
	[
		"id" => 25795,
		"user_id" => 31914,
		"work_status" => "Non European National"
	],
	[
		"id" => 15847,
		"user_id" => 19882,
		"work_status" => "Non European National"
	],
	[
		"id" => 15848,
		"user_id" => 19883,
		"work_status" => "Non European National"
	],
	[
		"id" => 25812,
		"user_id" => 31931,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25826,
		"user_id" => 31945,
		"work_status" => "Non European National"
	],
	[
		"id" => 15851,
		"user_id" => 19887,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15852,
		"user_id" => 19888,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22884,
		"user_id" => 28410,
		"work_status" => "Non European National"
	],
	[
		"id" => 15854,
		"user_id" => 19891,
		"work_status" => "0"
	],
	[
		"id" => 18939,
		"user_id" => 23486,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18751,
		"user_id" => 23298,
		"work_status" => "Non European National"
	],
	[
		"id" => 15859,
		"user_id" => 19897,
		"work_status" => "Non European National"
	],
	[
		"id" => 15860,
		"user_id" => 19898,
		"work_status" => "0"
	],
	[
		"id" => 15861,
		"user_id" => 19899,
		"work_status" => "0"
	],
	[
		"id" => 19101,
		"user_id" => 23648,
		"work_status" => "Non European National"
	],
	[
		"id" => 15863,
		"user_id" => 19903,
		"work_status" => "0"
	],
	[
		"id" => 24608,
		"user_id" => 30172,
		"work_status" => "European National"
	],
	[
		"id" => 22064,
		"user_id" => 27590,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24805,
		"user_id" => 30369,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15869,
		"user_id" => 19916,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23733,
		"user_id" => 29297,
		"work_status" => "European National"
	],
	[
		"id" => 19145,
		"user_id" => 23692,
		"work_status" => "Non European National"
	],
	[
		"id" => 15872,
		"user_id" => 19920,
		"work_status" => "Non European National"
	],
	[
		"id" => 15873,
		"user_id" => 19923,
		"work_status" => "0"
	],
	[
		"id" => 15874,
		"user_id" => 19925,
		"work_status" => "European National"
	],
	[
		"id" => 15875,
		"user_id" => 19927,
		"work_status" => "0"
	],
	[
		"id" => 15876,
		"user_id" => 19928,
		"work_status" => "0"
	],
	[
		"id" => 15877,
		"user_id" => 19930,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24541,
		"user_id" => 30105,
		"work_status" => "European National"
	],
	[
		"id" => 23162,
		"user_id" => 28688,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15880,
		"user_id" => 19926,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15881,
		"user_id" => 19932,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24577,
		"user_id" => 30141,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15883,
		"user_id" => 19934,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15885,
		"user_id" => 19937,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20225,
		"user_id" => 24954,
		"work_status" => "0"
	],
	[
		"id" => 15887,
		"user_id" => 19940,
		"work_status" => "Non European National"
	],
	[
		"id" => 23153,
		"user_id" => 28679,
		"work_status" => "Non European National"
	],
	[
		"id" => 23632,
		"user_id" => 29196,
		"work_status" => "European National"
	],
	[
		"id" => 15891,
		"user_id" => 19946,
		"work_status" => "Non European National"
	],
	[
		"id" => 15894,
		"user_id" => 19924,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24638,
		"user_id" => 30202,
		"work_status" => "European National"
	],
	[
		"id" => 16424,
		"user_id" => 20709,
		"work_status" => "Non European National"
	],
	[
		"id" => 15897,
		"user_id" => 19950,
		"work_status" => "0"
	],
	[
		"id" => 15898,
		"user_id" => 19952,
		"work_status" => "0"
	],
	[
		"id" => 19714,
		"user_id" => 24261,
		"work_status" => "Non European National"
	],
	[
		"id" => 24589,
		"user_id" => 30153,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15904,
		"user_id" => 19939,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15905,
		"user_id" => 19959,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15906,
		"user_id" => 19961,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15907,
		"user_id" => 19962,
		"work_status" => "0"
	],
	[
		"id" => 15908,
		"user_id" => 19965,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15909,
		"user_id" => 19967,
		"work_status" => "Non European National"
	],
	[
		"id" => 15911,
		"user_id" => 19644,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22337,
		"user_id" => 27863,
		"work_status" => "Non European National"
	],
	[
		"id" => 18872,
		"user_id" => 23419,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15914,
		"user_id" => 19970,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18166,
		"user_id" => 22655,
		"work_status" => "European National"
	],
	[
		"id" => 19019,
		"user_id" => 23566,
		"work_status" => "Non European National"
	],
	[
		"id" => 19189,
		"user_id" => 23736,
		"work_status" => "European National"
	],
	[
		"id" => 15918,
		"user_id" => 19980,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24692,
		"user_id" => 30256,
		"work_status" => "Non European National"
	],
	[
		"id" => 21884,
		"user_id" => 27410,
		"work_status" => "European National"
	],
	[
		"id" => 23454,
		"user_id" => 29018,
		"work_status" => "European National"
	],
	[
		"id" => 15922,
		"user_id" => 19985,
		"work_status" => "0"
	],
	[
		"id" => 23746,
		"user_id" => 29310,
		"work_status" => "Non European National"
	],
	[
		"id" => 19782,
		"user_id" => 24329,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24562,
		"user_id" => 30126,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23872,
		"user_id" => 29436,
		"work_status" => "European National"
	],
	[
		"id" => 15927,
		"user_id" => 19989,
		"work_status" => "0"
	],
	[
		"id" => 15928,
		"user_id" => 19990,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15929,
		"user_id" => 19991,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15930,
		"user_id" => 19992,
		"work_status" => "Non European National"
	],
	[
		"id" => 22759,
		"user_id" => 28285,
		"work_status" => "European National"
	],
	[
		"id" => 15932,
		"user_id" => 19994,
		"work_status" => "Non European National"
	],
	[
		"id" => 26416,
		"user_id" => 32804,
		"work_status" => "European National"
	],
	[
		"id" => 24478,
		"user_id" => 30042,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15935,
		"user_id" => 19998,
		"work_status" => "European National"
	],
	[
		"id" => 15936,
		"user_id" => 19999,
		"work_status" => "European National"
	],
	[
		"id" => 15937,
		"user_id" => 20000,
		"work_status" => "Non European National"
	],
	[
		"id" => 15939,
		"user_id" => 20001,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15941,
		"user_id" => 20006,
		"work_status" => "European National"
	],
	[
		"id" => 15942,
		"user_id" => 19978,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15943,
		"user_id" => 20007,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15944,
		"user_id" => 20009,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15945,
		"user_id" => 20010,
		"work_status" => "European National"
	],
	[
		"id" => 15946,
		"user_id" => 20011,
		"work_status" => "0"
	],
	[
		"id" => 15947,
		"user_id" => 20012,
		"work_status" => "Non European National"
	],
	[
		"id" => 15948,
		"user_id" => 20015,
		"work_status" => "European National"
	],
	[
		"id" => 21586,
		"user_id" => 26982,
		"work_status" => "Non European National"
	],
	[
		"id" => 15950,
		"user_id" => 20018,
		"work_status" => "0"
	],
	[
		"id" => 19837,
		"user_id" => 24384,
		"work_status" => "European National"
	],
	[
		"id" => 15952,
		"user_id" => 20021,
		"work_status" => "0"
	],
	[
		"id" => 15953,
		"user_id" => 20023,
		"work_status" => "0"
	],
	[
		"id" => 15954,
		"user_id" => 20024,
		"work_status" => "0"
	],
	[
		"id" => 15955,
		"user_id" => 20028,
		"work_status" => "0"
	],
	[
		"id" => 15956,
		"user_id" => 16253,
		"work_status" => "0"
	],
	[
		"id" => 19117,
		"user_id" => 23664,
		"work_status" => "Non European National"
	],
	[
		"id" => 15959,
		"user_id" => 20033,
		"work_status" => "0"
	],
	[
		"id" => 15961,
		"user_id" => 20034,
		"work_status" => "0"
	],
	[
		"id" => 24687,
		"user_id" => 30251,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23892,
		"user_id" => 29456,
		"work_status" => "Non European National"
	],
	[
		"id" => 15964,
		"user_id" => 20039,
		"work_status" => "Non European National"
	],
	[
		"id" => 15965,
		"user_id" => 20037,
		"work_status" => "0"
	],
	[
		"id" => 15966,
		"user_id" => 20029,
		"work_status" => "Non European National"
	],
	[
		"id" => 23772,
		"user_id" => 29336,
		"work_status" => "European National"
	],
	[
		"id" => 19500,
		"user_id" => 24047,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15969,
		"user_id" => 20052,
		"work_status" => "0"
	],
	[
		"id" => 24711,
		"user_id" => 30275,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15972,
		"user_id" => 20060,
		"work_status" => "Non European National"
	],
	[
		"id" => 15973,
		"user_id" => 20061,
		"work_status" => "0"
	],
	[
		"id" => 15975,
		"user_id" => 20064,
		"work_status" => "Non European National"
	],
	[
		"id" => 15976,
		"user_id" => 20065,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18959,
		"user_id" => 23506,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20149,
		"user_id" => 24841,
		"work_status" => "0"
	],
	[
		"id" => 20150,
		"user_id" => 24845,
		"work_status" => "0"
	],
	[
		"id" => 18848,
		"user_id" => 23395,
		"work_status" => "European National"
	],
	[
		"id" => 15980,
		"user_id" => 20072,
		"work_status" => "0"
	],
	[
		"id" => 19344,
		"user_id" => 23891,
		"work_status" => "European National"
	],
	[
		"id" => 15983,
		"user_id" => 20076,
		"work_status" => "European National"
	],
	[
		"id" => 15984,
		"user_id" => 20081,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15985,
		"user_id" => 20083,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15986,
		"user_id" => 20084,
		"work_status" => "0"
	],
	[
		"id" => 15987,
		"user_id" => 20045,
		"work_status" => "Non European National"
	],
	[
		"id" => 15988,
		"user_id" => 20085,
		"work_status" => "Non European National"
	],
	[
		"id" => 15989,
		"user_id" => 20086,
		"work_status" => "0"
	],
	[
		"id" => 15990,
		"user_id" => 20087,
		"work_status" => "Non European National"
	],
	[
		"id" => 15991,
		"user_id" => 20088,
		"work_status" => "0"
	],
	[
		"id" => 19617,
		"user_id" => 24164,
		"work_status" => "Non European National"
	],
	[
		"id" => 23334,
		"user_id" => 28863,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19701,
		"user_id" => 24248,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15995,
		"user_id" => 20092,
		"work_status" => "European National"
	],
	[
		"id" => 15996,
		"user_id" => 20094,
		"work_status" => "0"
	],
	[
		"id" => 15997,
		"user_id" => 20077,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15998,
		"user_id" => 20096,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 15999,
		"user_id" => 20097,
		"work_status" => "0"
	],
	[
		"id" => 16001,
		"user_id" => 19315,
		"work_status" => "Non European National"
	],
	[
		"id" => 16002,
		"user_id" => 20104,
		"work_status" => "0"
	],
	[
		"id" => 16005,
		"user_id" => 20105,
		"work_status" => "Non European National"
	],
	[
		"id" => 16006,
		"user_id" => 20109,
		"work_status" => "0"
	],
	[
		"id" => 21836,
		"user_id" => 27362,
		"work_status" => "Non European National"
	],
	[
		"id" => 16008,
		"user_id" => 20110,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16009,
		"user_id" => 20111,
		"work_status" => "0"
	],
	[
		"id" => 16010,
		"user_id" => 20112,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16011,
		"user_id" => 20113,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16012,
		"user_id" => 20118,
		"work_status" => "European National"
	],
	[
		"id" => 16013,
		"user_id" => 20120,
		"work_status" => "0"
	],
	[
		"id" => 16014,
		"user_id" => 20121,
		"work_status" => "European National"
	],
	[
		"id" => 16015,
		"user_id" => 20122,
		"work_status" => "0"
	],
	[
		"id" => 16017,
		"user_id" => 20123,
		"work_status" => "0"
	],
	[
		"id" => 16019,
		"user_id" => 20126,
		"work_status" => "European National"
	],
	[
		"id" => 18906,
		"user_id" => 23453,
		"work_status" => "Non European National"
	],
	[
		"id" => 16022,
		"user_id" => 20133,
		"work_status" => "0"
	],
	[
		"id" => 16023,
		"user_id" => 20134,
		"work_status" => "European National"
	],
	[
		"id" => 16025,
		"user_id" => 20136,
		"work_status" => "0"
	],
	[
		"id" => 16026,
		"user_id" => 20138,
		"work_status" => "Non European National"
	],
	[
		"id" => 16027,
		"user_id" => 20139,
		"work_status" => "Non European National"
	],
	[
		"id" => 16028,
		"user_id" => 20140,
		"work_status" => "0"
	],
	[
		"id" => 16029,
		"user_id" => 20142,
		"work_status" => "Non European National"
	],
	[
		"id" => 16030,
		"user_id" => 20143,
		"work_status" => "0"
	],
	[
		"id" => 16032,
		"user_id" => 20144,
		"work_status" => "European National"
	],
	[
		"id" => 16033,
		"user_id" => 20145,
		"work_status" => "Non European National"
	],
	[
		"id" => 16034,
		"user_id" => 20146,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23628,
		"user_id" => 29192,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16036,
		"user_id" => 20151,
		"work_status" => "European National"
	],
	[
		"id" => 16037,
		"user_id" => 20152,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27274,
		"user_id" => 33981,
		"work_status" => "Non European National"
	],
	[
		"id" => 22410,
		"user_id" => 27936,
		"work_status" => "Non European National"
	],
	[
		"id" => 24684,
		"user_id" => 30248,
		"work_status" => "European National"
	],
	[
		"id" => 16045,
		"user_id" => 20166,
		"work_status" => "0"
	],
	[
		"id" => 18954,
		"user_id" => 23501,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19042,
		"user_id" => 23589,
		"work_status" => "Non European National"
	],
	[
		"id" => 23865,
		"user_id" => 29429,
		"work_status" => "Non European National"
	],
	[
		"id" => 16049,
		"user_id" => 20172,
		"work_status" => "Non European National"
	],
	[
		"id" => 16050,
		"user_id" => 20173,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16051,
		"user_id" => 20174,
		"work_status" => "0"
	],
	[
		"id" => 16052,
		"user_id" => 20175,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26886,
		"user_id" => 33478,
		"work_status" => "0"
	],
	[
		"id" => 26887,
		"user_id" => 25617,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19866,
		"user_id" => 24413,
		"work_status" => "European National"
	],
	[
		"id" => 16055,
		"user_id" => 20179,
		"work_status" => "0"
	],
	[
		"id" => 16056,
		"user_id" => 20181,
		"work_status" => "Non European National"
	],
	[
		"id" => 24480,
		"user_id" => 30044,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16058,
		"user_id" => 20184,
		"work_status" => "0"
	],
	[
		"id" => 16059,
		"user_id" => 20186,
		"work_status" => "0"
	],
	[
		"id" => 16060,
		"user_id" => 20185,
		"work_status" => "Non European National"
	],
	[
		"id" => 23572,
		"user_id" => 29136,
		"work_status" => "Non European National"
	],
	[
		"id" => 20587,
		"user_id" => 25453,
		"work_status" => "0"
	],
	[
		"id" => 19180,
		"user_id" => 23727,
		"work_status" => "Non European National"
	],
	[
		"id" => 16063,
		"user_id" => 20194,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18853,
		"user_id" => 23400,
		"work_status" => "Non European National"
	],
	[
		"id" => 16066,
		"user_id" => 20196,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27145,
		"user_id" => 33797,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27146,
		"user_id" => 33789,
		"work_status" => "Non European National"
	],
	[
		"id" => 24627,
		"user_id" => 30191,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18985,
		"user_id" => 23532,
		"work_status" => "European National"
	],
	[
		"id" => 16070,
		"user_id" => 20203,
		"work_status" => "Non European National"
	],
	[
		"id" => 16071,
		"user_id" => 20206,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16246,
		"user_id" => 20447,
		"work_status" => "Non European National"
	],
	[
		"id" => 16074,
		"user_id" => 20209,
		"work_status" => "0"
	],
	[
		"id" => 23532,
		"user_id" => 29096,
		"work_status" => "European National"
	],
	[
		"id" => 19091,
		"user_id" => 23638,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24757,
		"user_id" => 30321,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25793,
		"user_id" => 31912,
		"work_status" => "European National"
	],
	[
		"id" => 16079,
		"user_id" => 20208,
		"work_status" => "European National"
	],
	[
		"id" => 18944,
		"user_id" => 23491,
		"work_status" => "European National"
	],
	[
		"id" => 18825,
		"user_id" => 23372,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16082,
		"user_id" => 9300,
		"work_status" => "0"
	],
	[
		"id" => 16083,
		"user_id" => 20220,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19176,
		"user_id" => 23723,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16690,
		"user_id" => 21150,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24740,
		"user_id" => 30304,
		"work_status" => "European National"
	],
	[
		"id" => 16086,
		"user_id" => 20224,
		"work_status" => "Non European National"
	],
	[
		"id" => 16087,
		"user_id" => 20226,
		"work_status" => "0"
	],
	[
		"id" => 16088,
		"user_id" => 20227,
		"work_status" => "0"
	],
	[
		"id" => 21709,
		"user_id" => 27207,
		"work_status" => "Non European National"
	],
	[
		"id" => 24660,
		"user_id" => 30224,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19164,
		"user_id" => 23711,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16092,
		"user_id" => 20232,
		"work_status" => "0"
	],
	[
		"id" => 16093,
		"user_id" => 20231,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24795,
		"user_id" => 30359,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16095,
		"user_id" => 20239,
		"work_status" => "Non European National"
	],
	[
		"id" => 22438,
		"user_id" => 27964,
		"work_status" => "Non European National"
	],
	[
		"id" => 22975,
		"user_id" => 28501,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16098,
		"user_id" => 20243,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16100,
		"user_id" => 20245,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16103,
		"user_id" => 20250,
		"work_status" => "0"
	],
	[
		"id" => 23265,
		"user_id" => 28791,
		"work_status" => "Non European National"
	],
	[
		"id" => 19304,
		"user_id" => 23851,
		"work_status" => "European National"
	],
	[
		"id" => 16107,
		"user_id" => 20256,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23784,
		"user_id" => 29348,
		"work_status" => "European National"
	],
	[
		"id" => 21962,
		"user_id" => 27488,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16110,
		"user_id" => 20259,
		"work_status" => "European National"
	],
	[
		"id" => 20410,
		"user_id" => 25239,
		"work_status" => "0"
	],
	[
		"id" => 18888,
		"user_id" => 23435,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18916,
		"user_id" => 23463,
		"work_status" => "European National"
	],
	[
		"id" => 16117,
		"user_id" => 20270,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16118,
		"user_id" => 20272,
		"work_status" => "Non European National"
	],
	[
		"id" => 20190,
		"user_id" => 24900,
		"work_status" => "Non European National"
	],
	[
		"id" => 16121,
		"user_id" => 20160,
		"work_status" => "0"
	],
	[
		"id" => 19575,
		"user_id" => 24122,
		"work_status" => "Non European National"
	],
	[
		"id" => 18775,
		"user_id" => 23322,
		"work_status" => "European National"
	],
	[
		"id" => 25819,
		"user_id" => 31938,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16126,
		"user_id" => 20282,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16127,
		"user_id" => 20277,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16128,
		"user_id" => 20283,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16129,
		"user_id" => 20285,
		"work_status" => "European National"
	],
	[
		"id" => 19761,
		"user_id" => 24308,
		"work_status" => "European National"
	],
	[
		"id" => 25804,
		"user_id" => 31923,
		"work_status" => "European National"
	],
	[
		"id" => 24917,
		"user_id" => 30481,
		"work_status" => "European National"
	],
	[
		"id" => 16132,
		"user_id" => 20289,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16133,
		"user_id" => 20291,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16134,
		"user_id" => 20292,
		"work_status" => "0"
	],
	[
		"id" => 16135,
		"user_id" => 20294,
		"work_status" => "European National"
	],
	[
		"id" => 16136,
		"user_id" => 20293,
		"work_status" => "European National"
	],
	[
		"id" => 16137,
		"user_id" => 20295,
		"work_status" => "0"
	],
	[
		"id" => 19131,
		"user_id" => 23678,
		"work_status" => "European National"
	],
	[
		"id" => 20122,
		"user_id" => 24790,
		"work_status" => "European National"
	],
	[
		"id" => 19549,
		"user_id" => 24096,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23563,
		"user_id" => 29127,
		"work_status" => "European National"
	],
	[
		"id" => 16142,
		"user_id" => 20300,
		"work_status" => "0"
	],
	[
		"id" => 24762,
		"user_id" => 30326,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18749,
		"user_id" => 23296,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19947,
		"user_id" => 24511,
		"work_status" => "0"
	],
	[
		"id" => 19948,
		"user_id" => 24510,
		"work_status" => "0"
	],
	[
		"id" => 24904,
		"user_id" => 30468,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16148,
		"user_id" => 19996,
		"work_status" => "0"
	],
	[
		"id" => 19798,
		"user_id" => 24345,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16151,
		"user_id" => 19866,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16153,
		"user_id" => 20313,
		"work_status" => "European National"
	],
	[
		"id" => 25821,
		"user_id" => 31940,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24442,
		"user_id" => 30006,
		"work_status" => "Non European National"
	],
	[
		"id" => 19153,
		"user_id" => 23700,
		"work_status" => "Non European National"
	],
	[
		"id" => 19586,
		"user_id" => 24133,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16159,
		"user_id" => 20288,
		"work_status" => "Non European National"
	],
	[
		"id" => 19271,
		"user_id" => 23818,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16161,
		"user_id" => 20322,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16162,
		"user_id" => 20323,
		"work_status" => "0"
	],
	[
		"id" => 16163,
		"user_id" => 20324,
		"work_status" => "0"
	],
	[
		"id" => 16164,
		"user_id" => 20325,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16165,
		"user_id" => 20331,
		"work_status" => "0"
	],
	[
		"id" => 16166,
		"user_id" => 20332,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16167,
		"user_id" => 20333,
		"work_status" => "0"
	],
	[
		"id" => 16169,
		"user_id" => 20336,
		"work_status" => "0"
	],
	[
		"id" => 16170,
		"user_id" => 20335,
		"work_status" => "0"
	],
	[
		"id" => 16173,
		"user_id" => 20342,
		"work_status" => "0"
	],
	[
		"id" => 19221,
		"user_id" => 23768,
		"work_status" => "European National"
	],
	[
		"id" => 16176,
		"user_id" => 20344,
		"work_status" => "0"
	],
	[
		"id" => 16177,
		"user_id" => 20346,
		"work_status" => "Non European National"
	],
	[
		"id" => 16178,
		"user_id" => 20347,
		"work_status" => "Non European National"
	],
	[
		"id" => 16179,
		"user_id" => 20352,
		"work_status" => "0"
	],
	[
		"id" => 16180,
		"user_id" => 20354,
		"work_status" => "Non European National"
	],
	[
		"id" => 16181,
		"user_id" => 20356,
		"work_status" => "Non European National"
	],
	[
		"id" => 19383,
		"user_id" => 23930,
		"work_status" => "European National"
	],
	[
		"id" => 16184,
		"user_id" => 20359,
		"work_status" => "Non European National"
	],
	[
		"id" => 16185,
		"user_id" => 20362,
		"work_status" => "Non European National"
	],
	[
		"id" => 24514,
		"user_id" => 30078,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19027,
		"user_id" => 23574,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16188,
		"user_id" => 20366,
		"work_status" => "0"
	],
	[
		"id" => 16189,
		"user_id" => 20368,
		"work_status" => "European National"
	],
	[
		"id" => 19130,
		"user_id" => 23677,
		"work_status" => "European National"
	],
	[
		"id" => 19162,
		"user_id" => 23709,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16192,
		"user_id" => 20374,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16193,
		"user_id" => 20378,
		"work_status" => "European National"
	],
	[
		"id" => 19179,
		"user_id" => 23726,
		"work_status" => "European National"
	],
	[
		"id" => 19777,
		"user_id" => 24324,
		"work_status" => "European National"
	],
	[
		"id" => 23542,
		"user_id" => 29106,
		"work_status" => "European National"
	],
	[
		"id" => 16197,
		"user_id" => 20385,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16198,
		"user_id" => 20387,
		"work_status" => "0"
	],
	[
		"id" => 16199,
		"user_id" => 20388,
		"work_status" => "European National"
	],
	[
		"id" => 16200,
		"user_id" => 20213,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16202,
		"user_id" => 20389,
		"work_status" => "0"
	],
	[
		"id" => 16203,
		"user_id" => 20390,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23461,
		"user_id" => 29025,
		"work_status" => "Non European National"
	],
	[
		"id" => 23509,
		"user_id" => 29073,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16207,
		"user_id" => 20393,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16208,
		"user_id" => 20394,
		"work_status" => "Non European National"
	],
	[
		"id" => 16209,
		"user_id" => 20382,
		"work_status" => "0"
	],
	[
		"id" => 16210,
		"user_id" => 20395,
		"work_status" => "0"
	],
	[
		"id" => 16211,
		"user_id" => 20397,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23639,
		"user_id" => 29203,
		"work_status" => "Non European National"
	],
	[
		"id" => 16214,
		"user_id" => 20401,
		"work_status" => "0"
	],
	[
		"id" => 16215,
		"user_id" => 20404,
		"work_status" => "0"
	],
	[
		"id" => 22727,
		"user_id" => 28253,
		"work_status" => "Non European National"
	],
	[
		"id" => 16217,
		"user_id" => 20407,
		"work_status" => "European National"
	],
	[
		"id" => 16219,
		"user_id" => 20409,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16220,
		"user_id" => 20411,
		"work_status" => "0"
	],
	[
		"id" => 16221,
		"user_id" => 20412,
		"work_status" => "0"
	],
	[
		"id" => 19348,
		"user_id" => 23895,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16224,
		"user_id" => 20402,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19752,
		"user_id" => 24299,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16226,
		"user_id" => 20418,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19789,
		"user_id" => 24336,
		"work_status" => "Non European National"
	],
	[
		"id" => 16228,
		"user_id" => 20419,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23027,
		"user_id" => 28553,
		"work_status" => "European National"
	],
	[
		"id" => 16230,
		"user_id" => 20423,
		"work_status" => "0"
	],
	[
		"id" => 16231,
		"user_id" => 20427,
		"work_status" => "0"
	],
	[
		"id" => 22775,
		"user_id" => 28301,
		"work_status" => "European National"
	],
	[
		"id" => 19551,
		"user_id" => 24098,
		"work_status" => "Non European National"
	],
	[
		"id" => 19116,
		"user_id" => 23663,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21868,
		"user_id" => 27394,
		"work_status" => "Non European National"
	],
	[
		"id" => 18960,
		"user_id" => 23507,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16237,
		"user_id" => 20436,
		"work_status" => "Non European National"
	],
	[
		"id" => 16238,
		"user_id" => 20437,
		"work_status" => "Non European National"
	],
	[
		"id" => 16239,
		"user_id" => 20438,
		"work_status" => "0"
	],
	[
		"id" => 16240,
		"user_id" => 20439,
		"work_status" => "0"
	],
	[
		"id" => 16241,
		"user_id" => 20441,
		"work_status" => "0"
	],
	[
		"id" => 16242,
		"user_id" => 20442,
		"work_status" => "0"
	],
	[
		"id" => 19045,
		"user_id" => 23592,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19372,
		"user_id" => 23919,
		"work_status" => "Non European National"
	],
	[
		"id" => 20295,
		"user_id" => 20345,
		"work_status" => "0"
	],
	[
		"id" => 24769,
		"user_id" => 30333,
		"work_status" => "European National"
	],
	[
		"id" => 16249,
		"user_id" => 20455,
		"work_status" => "Non European National"
	],
	[
		"id" => 19418,
		"user_id" => 23965,
		"work_status" => "Non European National"
	],
	[
		"id" => 16461,
		"user_id" => 20760,
		"work_status" => "Non European National"
	],
	[
		"id" => 25787,
		"user_id" => 31906,
		"work_status" => "Non European National"
	],
	[
		"id" => 19851,
		"user_id" => 24398,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23549,
		"user_id" => 29113,
		"work_status" => "Non European National"
	],
	[
		"id" => 24750,
		"user_id" => 30314,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16259,
		"user_id" => 20440,
		"work_status" => "0"
	],
	[
		"id" => 16260,
		"user_id" => 20466,
		"work_status" => "0"
	],
	[
		"id" => 16261,
		"user_id" => 20469,
		"work_status" => "0"
	],
	[
		"id" => 16262,
		"user_id" => 20468,
		"work_status" => "0"
	],
	[
		"id" => 23042,
		"user_id" => 28568,
		"work_status" => "Non European National"
	],
	[
		"id" => 18813,
		"user_id" => 23360,
		"work_status" => "European National"
	],
	[
		"id" => 16267,
		"user_id" => 20476,
		"work_status" => "Non European National"
	],
	[
		"id" => 16269,
		"user_id" => 20479,
		"work_status" => "European National"
	],
	[
		"id" => 16270,
		"user_id" => 20480,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26439,
		"user_id" => 32831,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16272,
		"user_id" => 20483,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16273,
		"user_id" => 20482,
		"work_status" => "0"
	],
	[
		"id" => 24438,
		"user_id" => 30002,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24758,
		"user_id" => 30322,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24450,
		"user_id" => 30014,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19347,
		"user_id" => 23894,
		"work_status" => "Non European National"
	],
	[
		"id" => 16279,
		"user_id" => 20494,
		"work_status" => "0"
	],
	[
		"id" => 18783,
		"user_id" => 23330,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24561,
		"user_id" => 30125,
		"work_status" => "European National"
	],
	[
		"id" => 19158,
		"user_id" => 23705,
		"work_status" => "Non European National"
	],
	[
		"id" => 16283,
		"user_id" => 20501,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16284,
		"user_id" => 20503,
		"work_status" => "0"
	],
	[
		"id" => 24506,
		"user_id" => 30070,
		"work_status" => "European National"
	],
	[
		"id" => 16288,
		"user_id" => 20511,
		"work_status" => "0"
	],
	[
		"id" => 18788,
		"user_id" => 23335,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16290,
		"user_id" => 20516,
		"work_status" => "0"
	],
	[
		"id" => 23605,
		"user_id" => 29169,
		"work_status" => "Non European National"
	],
	[
		"id" => 16308,
		"user_id" => 20547,
		"work_status" => "0"
	],
	[
		"id" => 16309,
		"user_id" => 20549,
		"work_status" => "0"
	],
	[
		"id" => 18755,
		"user_id" => 23302,
		"work_status" => "Non European National"
	],
	[
		"id" => 23455,
		"user_id" => 29019,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19873,
		"user_id" => 24420,
		"work_status" => "European National"
	],
	[
		"id" => 16316,
		"user_id" => 20565,
		"work_status" => "0"
	],
	[
		"id" => 16317,
		"user_id" => 20566,
		"work_status" => "Non European National"
	],
	[
		"id" => 16318,
		"user_id" => 20567,
		"work_status" => "0"
	],
	[
		"id" => 18585,
		"user_id" => 23078,
		"work_status" => "Non European National"
	],
	[
		"id" => 16321,
		"user_id" => 20574,
		"work_status" => "Non European National"
	],
	[
		"id" => 19820,
		"user_id" => 24367,
		"work_status" => "Non European National"
	],
	[
		"id" => 23601,
		"user_id" => 29165,
		"work_status" => "Non European National"
	],
	[
		"id" => 16324,
		"user_id" => 20581,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16325,
		"user_id" => 20582,
		"work_status" => "European National"
	],
	[
		"id" => 19616,
		"user_id" => 24163,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18765,
		"user_id" => 23312,
		"work_status" => "Non European National"
	],
	[
		"id" => 21776,
		"user_id" => 27302,
		"work_status" => "Non European National"
	],
	[
		"id" => 19734,
		"user_id" => 24281,
		"work_status" => "European National"
	],
	[
		"id" => 19795,
		"user_id" => 24342,
		"work_status" => "Non European National"
	],
	[
		"id" => 16333,
		"user_id" => 20595,
		"work_status" => "0"
	],
	[
		"id" => 23881,
		"user_id" => 29445,
		"work_status" => "Non European National"
	],
	[
		"id" => 24445,
		"user_id" => 30009,
		"work_status" => "Non European National"
	],
	[
		"id" => 16477,
		"user_id" => 20790,
		"work_status" => "Non European National"
	],
	[
		"id" => 25200,
		"user_id" => 30898,
		"work_status" => "Non European National"
	],
	[
		"id" => 22133,
		"user_id" => 27659,
		"work_status" => "Non European National"
	],
	[
		"id" => 16340,
		"user_id" => 20602,
		"work_status" => "0"
	],
	[
		"id" => 19692,
		"user_id" => 24239,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16342,
		"user_id" => 20606,
		"work_status" => "Non European National"
	],
	[
		"id" => 19043,
		"user_id" => 23590,
		"work_status" => "European National"
	],
	[
		"id" => 21684,
		"user_id" => 27154,
		"work_status" => "0"
	],
	[
		"id" => 21685,
		"user_id" => 27157,
		"work_status" => "European National"
	],
	[
		"id" => 16345,
		"user_id" => 20608,
		"work_status" => "0"
	],
	[
		"id" => 16346,
		"user_id" => 20609,
		"work_status" => "0"
	],
	[
		"id" => 16347,
		"user_id" => 20610,
		"work_status" => "0"
	],
	[
		"id" => 16349,
		"user_id" => 20612,
		"work_status" => "0"
	],
	[
		"id" => 16350,
		"user_id" => 20613,
		"work_status" => "European National"
	],
	[
		"id" => 16351,
		"user_id" => 20614,
		"work_status" => "European National"
	],
	[
		"id" => 18768,
		"user_id" => 23315,
		"work_status" => "Non European National"
	],
	[
		"id" => 16353,
		"user_id" => 20616,
		"work_status" => "0"
	],
	[
		"id" => 23550,
		"user_id" => 29114,
		"work_status" => "European National"
	],
	[
		"id" => 19620,
		"user_id" => 24167,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22163,
		"user_id" => 27689,
		"work_status" => "Non European National"
	],
	[
		"id" => 16359,
		"user_id" => 20621,
		"work_status" => "European National"
	],
	[
		"id" => 16360,
		"user_id" => 20622,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19849,
		"user_id" => 24396,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18844,
		"user_id" => 23391,
		"work_status" => "Non European National"
	],
	[
		"id" => 19460,
		"user_id" => 24007,
		"work_status" => "European National"
	],
	[
		"id" => 23247,
		"user_id" => 28773,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24475,
		"user_id" => 30039,
		"work_status" => "Non European National"
	],
	[
		"id" => 16366,
		"user_id" => 20515,
		"work_status" => "European National"
	],
	[
		"id" => 16368,
		"user_id" => 20634,
		"work_status" => "Non European National"
	],
	[
		"id" => 16369,
		"user_id" => 20592,
		"work_status" => "0"
	],
	[
		"id" => 22442,
		"user_id" => 27968,
		"work_status" => "Non European National"
	],
	[
		"id" => 16371,
		"user_id" => 20637,
		"work_status" => "Non European National"
	],
	[
		"id" => 16373,
		"user_id" => 20564,
		"work_status" => "0"
	],
	[
		"id" => 16374,
		"user_id" => 20640,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16378,
		"user_id" => 20643,
		"work_status" => "0"
	],
	[
		"id" => 16379,
		"user_id" => 20644,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16386,
		"user_id" => 20654,
		"work_status" => "Non European National"
	],
	[
		"id" => 23071,
		"user_id" => 28597,
		"work_status" => "Non European National"
	],
	[
		"id" => 19426,
		"user_id" => 23973,
		"work_status" => "Non European National"
	],
	[
		"id" => 18920,
		"user_id" => 23467,
		"work_status" => "Non European National"
	],
	[
		"id" => 16385,
		"user_id" => 20652,
		"work_status" => "Non European National"
	],
	[
		"id" => 24669,
		"user_id" => 30233,
		"work_status" => "European National"
	],
	[
		"id" => 16390,
		"user_id" => 20658,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24466,
		"user_id" => 30030,
		"work_status" => "European National"
	],
	[
		"id" => 19778,
		"user_id" => 24325,
		"work_status" => "Non European National"
	],
	[
		"id" => 16394,
		"user_id" => 20661,
		"work_status" => "0"
	],
	[
		"id" => 24741,
		"user_id" => 30305,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19420,
		"user_id" => 23967,
		"work_status" => "European National"
	],
	[
		"id" => 22967,
		"user_id" => 28493,
		"work_status" => "Non European National"
	],
	[
		"id" => 16398,
		"user_id" => 20669,
		"work_status" => "European National"
	],
	[
		"id" => 22203,
		"user_id" => 27729,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21459,
		"user_id" => 26753,
		"work_status" => "European National"
	],
	[
		"id" => 23710,
		"user_id" => 29274,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16402,
		"user_id" => 20675,
		"work_status" => "0"
	],
	[
		"id" => 18801,
		"user_id" => 23348,
		"work_status" => "Non European National"
	],
	[
		"id" => 16405,
		"user_id" => 20679,
		"work_status" => "0"
	],
	[
		"id" => 22239,
		"user_id" => 27765,
		"work_status" => "European National"
	],
	[
		"id" => 16407,
		"user_id" => 20684,
		"work_status" => "European National"
	],
	[
		"id" => 22219,
		"user_id" => 27745,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16409,
		"user_id" => 20686,
		"work_status" => "Non European National"
	],
	[
		"id" => 16410,
		"user_id" => 20687,
		"work_status" => "Non European National"
	],
	[
		"id" => 19906,
		"user_id" => 24453,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22312,
		"user_id" => 27838,
		"work_status" => "Non European National"
	],
	[
		"id" => 16415,
		"user_id" => 20693,
		"work_status" => "European National"
	],
	[
		"id" => 18876,
		"user_id" => 23423,
		"work_status" => "European National"
	],
	[
		"id" => 19132,
		"user_id" => 23679,
		"work_status" => "European National"
	],
	[
		"id" => 19477,
		"user_id" => 24024,
		"work_status" => "Non European National"
	],
	[
		"id" => 16419,
		"user_id" => 20701,
		"work_status" => "European National"
	],
	[
		"id" => 16420,
		"user_id" => 20699,
		"work_status" => "0"
	],
	[
		"id" => 16422,
		"user_id" => 20704,
		"work_status" => "0"
	],
	[
		"id" => 16423,
		"user_id" => 20707,
		"work_status" => "Non European National"
	],
	[
		"id" => 24893,
		"user_id" => 30457,
		"work_status" => "European National"
	],
	[
		"id" => 22343,
		"user_id" => 27869,
		"work_status" => "Non European National"
	],
	[
		"id" => 16428,
		"user_id" => 20714,
		"work_status" => "Non European National"
	],
	[
		"id" => 22380,
		"user_id" => 27906,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24862,
		"user_id" => 30426,
		"work_status" => "Non European National"
	],
	[
		"id" => 16432,
		"user_id" => 20718,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16433,
		"user_id" => 20723,
		"work_status" => "0"
	],
	[
		"id" => 16434,
		"user_id" => 20724,
		"work_status" => "Non European National"
	],
	[
		"id" => 19874,
		"user_id" => 24421,
		"work_status" => "Non European National"
	],
	[
		"id" => 16436,
		"user_id" => 20726,
		"work_status" => "0"
	],
	[
		"id" => 16437,
		"user_id" => 20729,
		"work_status" => "0"
	],
	[
		"id" => 16438,
		"user_id" => 20728,
		"work_status" => "Non European National"
	],
	[
		"id" => 19637,
		"user_id" => 24184,
		"work_status" => "European National"
	],
	[
		"id" => 16441,
		"user_id" => 16351,
		"work_status" => "0"
	],
	[
		"id" => 16443,
		"user_id" => 20689,
		"work_status" => "Non European National"
	],
	[
		"id" => 16444,
		"user_id" => 20738,
		"work_status" => "0"
	],
	[
		"id" => 18934,
		"user_id" => 23481,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23651,
		"user_id" => 29215,
		"work_status" => "Non European National"
	],
	[
		"id" => 16447,
		"user_id" => 20741,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24900,
		"user_id" => 30464,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22943,
		"user_id" => 28469,
		"work_status" => "Non European National"
	],
	[
		"id" => 19157,
		"user_id" => 23704,
		"work_status" => "European National"
	],
	[
		"id" => 16452,
		"user_id" => 20747,
		"work_status" => "0"
	],
	[
		"id" => 16453,
		"user_id" => 20749,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16454,
		"user_id" => 20752,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19805,
		"user_id" => 24352,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16456,
		"user_id" => 20755,
		"work_status" => "0"
	],
	[
		"id" => 22197,
		"user_id" => 27723,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16458,
		"user_id" => 20758,
		"work_status" => "0"
	],
	[
		"id" => 24710,
		"user_id" => 30274,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16460,
		"user_id" => 20761,
		"work_status" => "European National"
	],
	[
		"id" => 16462,
		"user_id" => 20764,
		"work_status" => "0"
	],
	[
		"id" => 16466,
		"user_id" => 20771,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19546,
		"user_id" => 24093,
		"work_status" => "Non European National"
	],
	[
		"id" => 16468,
		"user_id" => 20774,
		"work_status" => "0"
	],
	[
		"id" => 16469,
		"user_id" => 20775,
		"work_status" => "Non European National"
	],
	[
		"id" => 16470,
		"user_id" => 20776,
		"work_status" => "0"
	],
	[
		"id" => 16471,
		"user_id" => 20779,
		"work_status" => "European National"
	],
	[
		"id" => 19079,
		"user_id" => 23626,
		"work_status" => "Non European National"
	],
	[
		"id" => 16480,
		"user_id" => 20793,
		"work_status" => "European National"
	],
	[
		"id" => 16481,
		"user_id" => 20794,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19877,
		"user_id" => 24424,
		"work_status" => "European National"
	],
	[
		"id" => 16483,
		"user_id" => 20802,
		"work_status" => "Non European National"
	],
	[
		"id" => 16484,
		"user_id" => 20805,
		"work_status" => "European National"
	],
	[
		"id" => 24800,
		"user_id" => 30364,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16489,
		"user_id" => 20813,
		"work_status" => "European National"
	],
	[
		"id" => 24672,
		"user_id" => 30236,
		"work_status" => "Non European National"
	],
	[
		"id" => 16491,
		"user_id" => 20819,
		"work_status" => "0"
	],
	[
		"id" => 16492,
		"user_id" => 20820,
		"work_status" => "Non European National"
	],
	[
		"id" => 16494,
		"user_id" => 20825,
		"work_status" => "0"
	],
	[
		"id" => 19645,
		"user_id" => 24192,
		"work_status" => "European National"
	],
	[
		"id" => 16498,
		"user_id" => 20834,
		"work_status" => "Non European National"
	],
	[
		"id" => 23133,
		"user_id" => 28659,
		"work_status" => "Non European National"
	],
	[
		"id" => 16501,
		"user_id" => 20839,
		"work_status" => "0"
	],
	[
		"id" => 16503,
		"user_id" => 20828,
		"work_status" => "European National"
	],
	[
		"id" => 19040,
		"user_id" => 23587,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16506,
		"user_id" => 20844,
		"work_status" => "0"
	],
	[
		"id" => 16508,
		"user_id" => 20847,
		"work_status" => "0"
	],
	[
		"id" => 16509,
		"user_id" => 20846,
		"work_status" => "0"
	],
	[
		"id" => 16510,
		"user_id" => 20848,
		"work_status" => "European National"
	],
	[
		"id" => 16512,
		"user_id" => 20849,
		"work_status" => "European National"
	],
	[
		"id" => 16513,
		"user_id" => 20851,
		"work_status" => "0"
	],
	[
		"id" => 16515,
		"user_id" => 20853,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22688,
		"user_id" => 28214,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16518,
		"user_id" => 20850,
		"work_status" => "0"
	],
	[
		"id" => 16519,
		"user_id" => 20859,
		"work_status" => "0"
	],
	[
		"id" => 16520,
		"user_id" => 20861,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16521,
		"user_id" => 20862,
		"work_status" => "0"
	],
	[
		"id" => 16522,
		"user_id" => 20865,
		"work_status" => "European National"
	],
	[
		"id" => 16524,
		"user_id" => 20870,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16525,
		"user_id" => 20873,
		"work_status" => "Non European National"
	],
	[
		"id" => 16527,
		"user_id" => 20877,
		"work_status" => "0"
	],
	[
		"id" => 16528,
		"user_id" => 20878,
		"work_status" => "0"
	],
	[
		"id" => 16529,
		"user_id" => 20880,
		"work_status" => "0"
	],
	[
		"id" => 16530,
		"user_id" => 20872,
		"work_status" => "0"
	],
	[
		"id" => 23181,
		"user_id" => 28707,
		"work_status" => "European National"
	],
	[
		"id" => 18912,
		"user_id" => 23459,
		"work_status" => "Non European National"
	],
	[
		"id" => 16533,
		"user_id" => 20882,
		"work_status" => "European National"
	],
	[
		"id" => 20579,
		"user_id" => 25440,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16535,
		"user_id" => 20886,
		"work_status" => "Non European National"
	],
	[
		"id" => 23058,
		"user_id" => 28584,
		"work_status" => "Non European National"
	],
	[
		"id" => 16540,
		"user_id" => 20897,
		"work_status" => "Non European National"
	],
	[
		"id" => 16541,
		"user_id" => 20898,
		"work_status" => "Non European National"
	],
	[
		"id" => 16542,
		"user_id" => 20902,
		"work_status" => "0"
	],
	[
		"id" => 19473,
		"user_id" => 24020,
		"work_status" => "European National"
	],
	[
		"id" => 16544,
		"user_id" => 20904,
		"work_status" => "0"
	],
	[
		"id" => 19727,
		"user_id" => 24274,
		"work_status" => "Non European National"
	],
	[
		"id" => 16546,
		"user_id" => 20914,
		"work_status" => "European National"
	],
	[
		"id" => 22976,
		"user_id" => 28502,
		"work_status" => "European National"
	],
	[
		"id" => 23018,
		"user_id" => 28544,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16550,
		"user_id" => 20927,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16551,
		"user_id" => 20928,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16552,
		"user_id" => 20893,
		"work_status" => "Non European National"
	],
	[
		"id" => 16553,
		"user_id" => 20929,
		"work_status" => "Non European National"
	],
	[
		"id" => 16554,
		"user_id" => 20908,
		"work_status" => "Non European National"
	],
	[
		"id" => 16555,
		"user_id" => 20940,
		"work_status" => "0"
	],
	[
		"id" => 16556,
		"user_id" => 20941,
		"work_status" => "Non European National"
	],
	[
		"id" => 16557,
		"user_id" => 20942,
		"work_status" => "0"
	],
	[
		"id" => 16558,
		"user_id" => 20945,
		"work_status" => "0"
	],
	[
		"id" => 16559,
		"user_id" => 20946,
		"work_status" => "Non European National"
	],
	[
		"id" => 16560,
		"user_id" => 20949,
		"work_status" => "Non European National"
	],
	[
		"id" => 16561,
		"user_id" => 20947,
		"work_status" => "0"
	],
	[
		"id" => 16562,
		"user_id" => 20958,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16563,
		"user_id" => 20957,
		"work_status" => "0"
	],
	[
		"id" => 16564,
		"user_id" => 20888,
		"work_status" => "European National"
	],
	[
		"id" => 16565,
		"user_id" => 19353,
		"work_status" => "Non European National"
	],
	[
		"id" => 16568,
		"user_id" => 20959,
		"work_status" => "European National"
	],
	[
		"id" => 16570,
		"user_id" => 20962,
		"work_status" => "0"
	],
	[
		"id" => 16571,
		"user_id" => 20963,
		"work_status" => "0"
	],
	[
		"id" => 16572,
		"user_id" => 20965,
		"work_status" => "0"
	],
	[
		"id" => 19891,
		"user_id" => 24438,
		"work_status" => "Non European National"
	],
	[
		"id" => 16574,
		"user_id" => 20968,
		"work_status" => "0"
	],
	[
		"id" => 16575,
		"user_id" => 20970,
		"work_status" => "Non European National"
	],
	[
		"id" => 19597,
		"user_id" => 24144,
		"work_status" => "Non European National"
	],
	[
		"id" => 16577,
		"user_id" => 20971,
		"work_status" => "0"
	],
	[
		"id" => 16582,
		"user_id" => 20969,
		"work_status" => "Non European National"
	],
	[
		"id" => 23804,
		"user_id" => 29368,
		"work_status" => "Non European National"
	],
	[
		"id" => 16584,
		"user_id" => 20983,
		"work_status" => "0"
	],
	[
		"id" => 16585,
		"user_id" => 20984,
		"work_status" => "0"
	],
	[
		"id" => 24628,
		"user_id" => 30192,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22600,
		"user_id" => 28126,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23594,
		"user_id" => 29158,
		"work_status" => "Non European National"
	],
	[
		"id" => 21566,
		"user_id" => 26944,
		"work_status" => "European National"
	],
	[
		"id" => 16590,
		"user_id" => 20993,
		"work_status" => "Non European National"
	],
	[
		"id" => 21988,
		"user_id" => 27514,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19678,
		"user_id" => 24225,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16594,
		"user_id" => 20997,
		"work_status" => "0"
	],
	[
		"id" => 16595,
		"user_id" => 20998,
		"work_status" => "0"
	],
	[
		"id" => 16596,
		"user_id" => 21000,
		"work_status" => "0"
	],
	[
		"id" => 16597,
		"user_id" => 21001,
		"work_status" => "0"
	],
	[
		"id" => 16598,
		"user_id" => 21006,
		"work_status" => "European National"
	],
	[
		"id" => 16600,
		"user_id" => 21009,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23689,
		"user_id" => 29253,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16602,
		"user_id" => 21014,
		"work_status" => "Non European National"
	],
	[
		"id" => 16605,
		"user_id" => 20858,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16606,
		"user_id" => 21019,
		"work_status" => "0"
	],
	[
		"id" => 16607,
		"user_id" => 21020,
		"work_status" => "Non European National"
	],
	[
		"id" => 16608,
		"user_id" => 21021,
		"work_status" => "0"
	],
	[
		"id" => 16609,
		"user_id" => 21022,
		"work_status" => "0"
	],
	[
		"id" => 16610,
		"user_id" => 21024,
		"work_status" => "Non European National"
	],
	[
		"id" => 26429,
		"user_id" => 32817,
		"work_status" => "Non European National"
	],
	[
		"id" => 20069,
		"user_id" => 24707,
		"work_status" => "0"
	],
	[
		"id" => 20242,
		"user_id" => 24981,
		"work_status" => "0"
	],
	[
		"id" => 23038,
		"user_id" => 28564,
		"work_status" => "Non European National"
	],
	[
		"id" => 16613,
		"user_id" => 21028,
		"work_status" => "0"
	],
	[
		"id" => 16614,
		"user_id" => 21029,
		"work_status" => "0"
	],
	[
		"id" => 16616,
		"user_id" => 21031,
		"work_status" => "Non European National"
	],
	[
		"id" => 16617,
		"user_id" => 21032,
		"work_status" => "Non European National"
	],
	[
		"id" => 23500,
		"user_id" => 29064,
		"work_status" => "Non European National"
	],
	[
		"id" => 22143,
		"user_id" => 27669,
		"work_status" => "European National"
	],
	[
		"id" => 16620,
		"user_id" => 21036,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19028,
		"user_id" => 23575,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20487,
		"user_id" => 24976,
		"work_status" => "Non European National"
	],
	[
		"id" => 16627,
		"user_id" => 21050,
		"work_status" => "0"
	],
	[
		"id" => 16628,
		"user_id" => 12746,
		"work_status" => "0"
	],
	[
		"id" => 16629,
		"user_id" => 21051,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16632,
		"user_id" => 21058,
		"work_status" => "Non European National"
	],
	[
		"id" => 16633,
		"user_id" => 21060,
		"work_status" => "European National"
	],
	[
		"id" => 23068,
		"user_id" => 28594,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16638,
		"user_id" => 21071,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16639,
		"user_id" => 21072,
		"work_status" => "Non European National"
	],
	[
		"id" => 24722,
		"user_id" => 30286,
		"work_status" => "Non European National"
	],
	[
		"id" => 16643,
		"user_id" => 21078,
		"work_status" => "Non European National"
	],
	[
		"id" => 16644,
		"user_id" => 21081,
		"work_status" => "European National"
	],
	[
		"id" => 16645,
		"user_id" => 21082,
		"work_status" => "European National"
	],
	[
		"id" => 16650,
		"user_id" => 21089,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16651,
		"user_id" => 21092,
		"work_status" => "Non European National"
	],
	[
		"id" => 16652,
		"user_id" => 21094,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16655,
		"user_id" => 21100,
		"work_status" => "Non European National"
	],
	[
		"id" => 16656,
		"user_id" => 21101,
		"work_status" => "0"
	],
	[
		"id" => 16657,
		"user_id" => 21105,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 16658,
		"user_id" => 21104,
		"work_status" => "European National"
	],
	[
		"id" => 18892,
		"user_id" => 23439,
		"work_status" => "Non European National"
	],
	[
		"id" => 16660,
		"user_id" => 21109,
		"work_status" => "Non European National"
	],
	[
		"id" => 16661,
		"user_id" => 21110,
		"work_status" => "Non European National"
	],
	[
		"id" => 16662,
		"user_id" => 21111,
		"work_status" => "0"
	],
	[
		"id" => 16663,
		"user_id" => 21113,
		"work_status" => "0"
	],
	[
		"id" => 23788,
		"user_id" => 29352,
		"work_status" => "European National"
	],
	[
		"id" => 16667,
		"user_id" => 21117,
		"work_status" => "Non European National"
	],
	[
		"id" => 24809,
		"user_id" => 30373,
		"work_status" => "Non European National"
	],
	[
		"id" => 16670,
		"user_id" => 21119,
		"work_status" => "Non European National"
	],
	[
		"id" => 22036,
		"user_id" => 27562,
		"work_status" => "Non European National"
	],
	[
		"id" => 16672,
		"user_id" => 21122,
		"work_status" => "European National"
	],
	[
		"id" => 16673,
		"user_id" => 20935,
		"work_status" => "Non European National"
	],
	[
		"id" => 24448,
		"user_id" => 30012,
		"work_status" => "European National"
	],
	[
		"id" => 21758,
		"user_id" => 27284,
		"work_status" => "Non European National"
	],
	[
		"id" => 18740,
		"user_id" => 23287,
		"work_status" => "European National"
	],
	[
		"id" => 18741,
		"user_id" => 23288,
		"work_status" => "Non European National"
	],
	[
		"id" => 18743,
		"user_id" => 23290,
		"work_status" => "European National"
	],
	[
		"id" => 18746,
		"user_id" => 23293,
		"work_status" => "Non European National"
	],
	[
		"id" => 18754,
		"user_id" => 23301,
		"work_status" => "Non European National"
	],
	[
		"id" => 18756,
		"user_id" => 23303,
		"work_status" => "European National"
	],
	[
		"id" => 18762,
		"user_id" => 23309,
		"work_status" => "European National"
	],
	[
		"id" => 18763,
		"user_id" => 23310,
		"work_status" => "European National"
	],
	[
		"id" => 18764,
		"user_id" => 23311,
		"work_status" => "European National"
	],
	[
		"id" => 18767,
		"user_id" => 23314,
		"work_status" => "Non European National"
	],
	[
		"id" => 18769,
		"user_id" => 23316,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18773,
		"user_id" => 23320,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18777,
		"user_id" => 23324,
		"work_status" => "Non European National"
	],
	[
		"id" => 18778,
		"user_id" => 23325,
		"work_status" => "European National"
	],
	[
		"id" => 18786,
		"user_id" => 23333,
		"work_status" => "European National"
	],
	[
		"id" => 20236,
		"user_id" => 24969,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18795,
		"user_id" => 23342,
		"work_status" => "European National"
	],
	[
		"id" => 23494,
		"user_id" => 29058,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18802,
		"user_id" => 23349,
		"work_status" => "European National"
	],
	[
		"id" => 18812,
		"user_id" => 23359,
		"work_status" => "Non European National"
	],
	[
		"id" => 18820,
		"user_id" => 23367,
		"work_status" => "Non European National"
	],
	[
		"id" => 18824,
		"user_id" => 23371,
		"work_status" => "European National"
	],
	[
		"id" => 18829,
		"user_id" => 23376,
		"work_status" => "European National"
	],
	[
		"id" => 18832,
		"user_id" => 23379,
		"work_status" => "Non European National"
	],
	[
		"id" => 18835,
		"user_id" => 23382,
		"work_status" => "Non European National"
	],
	[
		"id" => 18839,
		"user_id" => 23386,
		"work_status" => "European National"
	],
	[
		"id" => 18845,
		"user_id" => 23392,
		"work_status" => "European National"
	],
	[
		"id" => 18846,
		"user_id" => 23393,
		"work_status" => "European National"
	],
	[
		"id" => 18858,
		"user_id" => 23405,
		"work_status" => "Non European National"
	],
	[
		"id" => 18862,
		"user_id" => 23409,
		"work_status" => "Non European National"
	],
	[
		"id" => 18875,
		"user_id" => 23422,
		"work_status" => "Non European National"
	],
	[
		"id" => 18884,
		"user_id" => 23431,
		"work_status" => "Non European National"
	],
	[
		"id" => 18886,
		"user_id" => 23433,
		"work_status" => "Non European National"
	],
	[
		"id" => 18894,
		"user_id" => 23441,
		"work_status" => "European National"
	],
	[
		"id" => 18897,
		"user_id" => 23444,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18899,
		"user_id" => 23446,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18908,
		"user_id" => 23455,
		"work_status" => "European National"
	],
	[
		"id" => 18911,
		"user_id" => 23458,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18914,
		"user_id" => 23461,
		"work_status" => "Non European National"
	],
	[
		"id" => 18917,
		"user_id" => 23464,
		"work_status" => "Non European National"
	],
	[
		"id" => 18919,
		"user_id" => 23466,
		"work_status" => "Non European National"
	],
	[
		"id" => 18922,
		"user_id" => 23469,
		"work_status" => "European National"
	],
	[
		"id" => 26446,
		"user_id" => 32843,
		"work_status" => "0"
	],
	[
		"id" => 26447,
		"user_id" => 32844,
		"work_status" => "0"
	],
	[
		"id" => 18929,
		"user_id" => 23476,
		"work_status" => "European National"
	],
	[
		"id" => 18935,
		"user_id" => 23482,
		"work_status" => "Non European National"
	],
	[
		"id" => 18936,
		"user_id" => 23483,
		"work_status" => "Non European National"
	],
	[
		"id" => 22069,
		"user_id" => 27595,
		"work_status" => "Non European National"
	],
	[
		"id" => 18943,
		"user_id" => 23490,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18949,
		"user_id" => 23496,
		"work_status" => "European National"
	],
	[
		"id" => 18951,
		"user_id" => 23498,
		"work_status" => "European National"
	],
	[
		"id" => 18953,
		"user_id" => 23500,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18956,
		"user_id" => 23503,
		"work_status" => "Non European National"
	],
	[
		"id" => 22089,
		"user_id" => 27615,
		"work_status" => "Non European National"
	],
	[
		"id" => 18967,
		"user_id" => 23514,
		"work_status" => "European National"
	],
	[
		"id" => 18972,
		"user_id" => 23519,
		"work_status" => "Non European National"
	],
	[
		"id" => 18973,
		"user_id" => 23520,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18975,
		"user_id" => 23522,
		"work_status" => "Non European National"
	],
	[
		"id" => 22107,
		"user_id" => 27633,
		"work_status" => "Non European National"
	],
	[
		"id" => 18979,
		"user_id" => 23526,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18991,
		"user_id" => 23538,
		"work_status" => "European National"
	],
	[
		"id" => 18993,
		"user_id" => 23540,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18995,
		"user_id" => 23542,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18997,
		"user_id" => 23544,
		"work_status" => "Non European National"
	],
	[
		"id" => 19000,
		"user_id" => 23547,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19004,
		"user_id" => 23551,
		"work_status" => "European National"
	],
	[
		"id" => 22144,
		"user_id" => 27670,
		"work_status" => "Non European National"
	],
	[
		"id" => 19011,
		"user_id" => 23558,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19014,
		"user_id" => 23561,
		"work_status" => "European National"
	],
	[
		"id" => 19016,
		"user_id" => 23563,
		"work_status" => "Non European National"
	],
	[
		"id" => 19024,
		"user_id" => 23571,
		"work_status" => "European National"
	],
	[
		"id" => 19026,
		"user_id" => 23573,
		"work_status" => "European National"
	],
	[
		"id" => 19034,
		"user_id" => 23581,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19041,
		"user_id" => 23588,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19047,
		"user_id" => 23594,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19052,
		"user_id" => 23599,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19054,
		"user_id" => 23601,
		"work_status" => "Non European National"
	],
	[
		"id" => 19059,
		"user_id" => 23606,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19062,
		"user_id" => 23609,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19067,
		"user_id" => 23614,
		"work_status" => "Non European National"
	],
	[
		"id" => 23736,
		"user_id" => 29300,
		"work_status" => "Non European National"
	],
	[
		"id" => 19078,
		"user_id" => 23625,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19081,
		"user_id" => 23628,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19089,
		"user_id" => 23636,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19090,
		"user_id" => 23637,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19103,
		"user_id" => 23650,
		"work_status" => "European National"
	],
	[
		"id" => 19111,
		"user_id" => 23658,
		"work_status" => "European National"
	],
	[
		"id" => 19112,
		"user_id" => 23659,
		"work_status" => "Non European National"
	],
	[
		"id" => 19119,
		"user_id" => 23666,
		"work_status" => "Non European National"
	],
	[
		"id" => 19121,
		"user_id" => 23668,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19124,
		"user_id" => 23671,
		"work_status" => "European National"
	],
	[
		"id" => 23797,
		"user_id" => 29361,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19128,
		"user_id" => 23675,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19134,
		"user_id" => 23681,
		"work_status" => "European National"
	],
	[
		"id" => 19139,
		"user_id" => 23686,
		"work_status" => "European National"
	],
	[
		"id" => 23810,
		"user_id" => 29374,
		"work_status" => "European National"
	],
	[
		"id" => 19146,
		"user_id" => 23693,
		"work_status" => "Non European National"
	],
	[
		"id" => 23815,
		"user_id" => 29379,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19160,
		"user_id" => 23707,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19165,
		"user_id" => 23712,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19168,
		"user_id" => 23715,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19172,
		"user_id" => 23719,
		"work_status" => "European National"
	],
	[
		"id" => 19174,
		"user_id" => 23721,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25781,
		"user_id" => 31900,
		"work_status" => "European National"
	],
	[
		"id" => 19188,
		"user_id" => 23735,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19190,
		"user_id" => 23737,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19192,
		"user_id" => 23739,
		"work_status" => "European National"
	],
	[
		"id" => 19203,
		"user_id" => 23750,
		"work_status" => "Non European National"
	],
	[
		"id" => 19207,
		"user_id" => 23754,
		"work_status" => "European National"
	],
	[
		"id" => 19212,
		"user_id" => 23759,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19213,
		"user_id" => 23760,
		"work_status" => "European National"
	],
	[
		"id" => 19216,
		"user_id" => 23763,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20176,
		"user_id" => 24881,
		"work_status" => "0"
	],
	[
		"id" => 22411,
		"user_id" => 27937,
		"work_status" => "Non European National"
	],
	[
		"id" => 19229,
		"user_id" => 23776,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19237,
		"user_id" => 23784,
		"work_status" => "European National"
	],
	[
		"id" => 19242,
		"user_id" => 23789,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19244,
		"user_id" => 23791,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19247,
		"user_id" => 23794,
		"work_status" => "European National"
	],
	[
		"id" => 19254,
		"user_id" => 23801,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19266,
		"user_id" => 23813,
		"work_status" => "European National"
	],
	[
		"id" => 19274,
		"user_id" => 23821,
		"work_status" => "Non European National"
	],
	[
		"id" => 19278,
		"user_id" => 23825,
		"work_status" => "European National"
	],
	[
		"id" => 19284,
		"user_id" => 23831,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19291,
		"user_id" => 23838,
		"work_status" => "Non European National"
	],
	[
		"id" => 19294,
		"user_id" => 23841,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19299,
		"user_id" => 23846,
		"work_status" => "Non European National"
	],
	[
		"id" => 19309,
		"user_id" => 23856,
		"work_status" => "Non European National"
	],
	[
		"id" => 19310,
		"user_id" => 23857,
		"work_status" => "Non European National"
	],
	[
		"id" => 19315,
		"user_id" => 23862,
		"work_status" => "Non European National"
	],
	[
		"id" => 19319,
		"user_id" => 23866,
		"work_status" => "Non European National"
	],
	[
		"id" => 19321,
		"user_id" => 23868,
		"work_status" => "European National"
	],
	[
		"id" => 19331,
		"user_id" => 23878,
		"work_status" => "European National"
	],
	[
		"id" => 19332,
		"user_id" => 23879,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19337,
		"user_id" => 23884,
		"work_status" => "European National"
	],
	[
		"id" => 19341,
		"user_id" => 23888,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20158,
		"user_id" => 24860,
		"work_status" => "Non European National"
	],
	[
		"id" => 19358,
		"user_id" => 23905,
		"work_status" => "Non European National"
	],
	[
		"id" => 19360,
		"user_id" => 23907,
		"work_status" => "Non European National"
	],
	[
		"id" => 19362,
		"user_id" => 23909,
		"work_status" => "European National"
	],
	[
		"id" => 19364,
		"user_id" => 23911,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19368,
		"user_id" => 23915,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19371,
		"user_id" => 23918,
		"work_status" => "Non European National"
	],
	[
		"id" => 19374,
		"user_id" => 23921,
		"work_status" => "European National"
	],
	[
		"id" => 19376,
		"user_id" => 23923,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19380,
		"user_id" => 23927,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25232,
		"user_id" => 30940,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19391,
		"user_id" => 23938,
		"work_status" => "European National"
	],
	[
		"id" => 19394,
		"user_id" => 23941,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19396,
		"user_id" => 23943,
		"work_status" => "European National"
	],
	[
		"id" => 19403,
		"user_id" => 23950,
		"work_status" => "Non European National"
	],
	[
		"id" => 19405,
		"user_id" => 23952,
		"work_status" => "European National"
	],
	[
		"id" => 19406,
		"user_id" => 23953,
		"work_status" => "Non European National"
	],
	[
		"id" => 22653,
		"user_id" => 28179,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19413,
		"user_id" => 23960,
		"work_status" => "European National"
	],
	[
		"id" => 19419,
		"user_id" => 23966,
		"work_status" => "Non European National"
	],
	[
		"id" => 19433,
		"user_id" => 23980,
		"work_status" => "European National"
	],
	[
		"id" => 19437,
		"user_id" => 23984,
		"work_status" => "European National"
	],
	[
		"id" => 19442,
		"user_id" => 23989,
		"work_status" => "Non European National"
	],
	[
		"id" => 19445,
		"user_id" => 23992,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19447,
		"user_id" => 23994,
		"work_status" => "European National"
	],
	[
		"id" => 19449,
		"user_id" => 23996,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19456,
		"user_id" => 24003,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19462,
		"user_id" => 24009,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19465,
		"user_id" => 24012,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19469,
		"user_id" => 24016,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19472,
		"user_id" => 24019,
		"work_status" => "Non European National"
	],
	[
		"id" => 19476,
		"user_id" => 24023,
		"work_status" => "Non European National"
	],
	[
		"id" => 19481,
		"user_id" => 24028,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19484,
		"user_id" => 24031,
		"work_status" => "Non European National"
	],
	[
		"id" => 19491,
		"user_id" => 24038,
		"work_status" => "European National"
	],
	[
		"id" => 19497,
		"user_id" => 24044,
		"work_status" => "European National"
	],
	[
		"id" => 19499,
		"user_id" => 24046,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19503,
		"user_id" => 24050,
		"work_status" => "Non European National"
	],
	[
		"id" => 19509,
		"user_id" => 24056,
		"work_status" => "Non European National"
	],
	[
		"id" => 22776,
		"user_id" => 28302,
		"work_status" => "European National"
	],
	[
		"id" => 19513,
		"user_id" => 24060,
		"work_status" => "European National"
	],
	[
		"id" => 24591,
		"user_id" => 30155,
		"work_status" => "European National"
	],
	[
		"id" => 19521,
		"user_id" => 24068,
		"work_status" => "Non European National"
	],
	[
		"id" => 19522,
		"user_id" => 24069,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19533,
		"user_id" => 24080,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19536,
		"user_id" => 24083,
		"work_status" => "European National"
	],
	[
		"id" => 19540,
		"user_id" => 24087,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19541,
		"user_id" => 24088,
		"work_status" => "European National"
	],
	[
		"id" => 19544,
		"user_id" => 24091,
		"work_status" => "European National"
	],
	[
		"id" => 19547,
		"user_id" => 24094,
		"work_status" => "European National"
	],
	[
		"id" => 19553,
		"user_id" => 24100,
		"work_status" => "Non European National"
	],
	[
		"id" => 18647,
		"user_id" => 23171,
		"work_status" => "0"
	],
	[
		"id" => 19554,
		"user_id" => 24101,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19557,
		"user_id" => 24104,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19562,
		"user_id" => 24109,
		"work_status" => "Non European National"
	],
	[
		"id" => 19563,
		"user_id" => 24110,
		"work_status" => "European National"
	],
	[
		"id" => 19579,
		"user_id" => 24126,
		"work_status" => "European National"
	],
	[
		"id" => 19580,
		"user_id" => 24127,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19587,
		"user_id" => 24134,
		"work_status" => "Non European National"
	],
	[
		"id" => 19589,
		"user_id" => 24136,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19592,
		"user_id" => 24139,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19602,
		"user_id" => 24149,
		"work_status" => "European National"
	],
	[
		"id" => 22897,
		"user_id" => 28423,
		"work_status" => "Non European National"
	],
	[
		"id" => 19605,
		"user_id" => 24152,
		"work_status" => "Non European National"
	],
	[
		"id" => 19610,
		"user_id" => 24157,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19623,
		"user_id" => 24170,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24676,
		"user_id" => 30240,
		"work_status" => "European National"
	],
	[
		"id" => 19631,
		"user_id" => 24178,
		"work_status" => "European National"
	],
	[
		"id" => 19634,
		"user_id" => 24181,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19636,
		"user_id" => 24183,
		"work_status" => "Non European National"
	],
	[
		"id" => 19638,
		"user_id" => 24185,
		"work_status" => "Non European National"
	],
	[
		"id" => 19641,
		"user_id" => 24188,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19643,
		"user_id" => 24190,
		"work_status" => "European National"
	],
	[
		"id" => 19647,
		"user_id" => 24194,
		"work_status" => "Non European National"
	],
	[
		"id" => 19655,
		"user_id" => 24202,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19656,
		"user_id" => 24203,
		"work_status" => "Non European National"
	],
	[
		"id" => 19658,
		"user_id" => 24205,
		"work_status" => "Non European National"
	],
	[
		"id" => 19662,
		"user_id" => 24209,
		"work_status" => "Non European National"
	],
	[
		"id" => 19664,
		"user_id" => 24211,
		"work_status" => "European National"
	],
	[
		"id" => 19666,
		"user_id" => 24213,
		"work_status" => "Non European National"
	],
	[
		"id" => 19670,
		"user_id" => 24217,
		"work_status" => "Non European National"
	],
	[
		"id" => 19684,
		"user_id" => 24231,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19686,
		"user_id" => 24233,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23022,
		"user_id" => 28548,
		"work_status" => "Non European National"
	],
	[
		"id" => 19700,
		"user_id" => 24247,
		"work_status" => "European National"
	],
	[
		"id" => 19702,
		"user_id" => 24249,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19706,
		"user_id" => 24253,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19709,
		"user_id" => 24256,
		"work_status" => "Non European National"
	],
	[
		"id" => 19712,
		"user_id" => 24259,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19717,
		"user_id" => 24264,
		"work_status" => "European National"
	],
	[
		"id" => 19718,
		"user_id" => 24265,
		"work_status" => "European National"
	],
	[
		"id" => 19721,
		"user_id" => 24268,
		"work_status" => "Non European National"
	],
	[
		"id" => 19723,
		"user_id" => 24270,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19724,
		"user_id" => 24271,
		"work_status" => "European National"
	],
	[
		"id" => 19726,
		"user_id" => 24273,
		"work_status" => "European National"
	],
	[
		"id" => 19729,
		"user_id" => 24276,
		"work_status" => "Non European National"
	],
	[
		"id" => 23093,
		"user_id" => 28619,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19747,
		"user_id" => 24294,
		"work_status" => "European National"
	],
	[
		"id" => 24890,
		"user_id" => 30454,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19758,
		"user_id" => 24305,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19759,
		"user_id" => 24306,
		"work_status" => "Non European National"
	],
	[
		"id" => 19767,
		"user_id" => 24314,
		"work_status" => "European National"
	],
	[
		"id" => 19781,
		"user_id" => 24328,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19783,
		"user_id" => 24330,
		"work_status" => "European National"
	],
	[
		"id" => 19790,
		"user_id" => 24337,
		"work_status" => "European National"
	],
	[
		"id" => 19791,
		"user_id" => 24338,
		"work_status" => "European National"
	],
	[
		"id" => 19793,
		"user_id" => 24340,
		"work_status" => "Non European National"
	],
	[
		"id" => 19794,
		"user_id" => 24341,
		"work_status" => "Non European National"
	],
	[
		"id" => 19796,
		"user_id" => 24343,
		"work_status" => "Non European National"
	],
	[
		"id" => 19797,
		"user_id" => 24344,
		"work_status" => "European National"
	],
	[
		"id" => 23160,
		"user_id" => 28686,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19807,
		"user_id" => 24354,
		"work_status" => "European National"
	],
	[
		"id" => 19811,
		"user_id" => 24358,
		"work_status" => "European National"
	],
	[
		"id" => 19814,
		"user_id" => 24361,
		"work_status" => "European National"
	],
	[
		"id" => 19819,
		"user_id" => 24366,
		"work_status" => "Non European National"
	],
	[
		"id" => 19825,
		"user_id" => 24372,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19830,
		"user_id" => 24377,
		"work_status" => "Non European National"
	],
	[
		"id" => 19835,
		"user_id" => 24382,
		"work_status" => "Non European National"
	],
	[
		"id" => 19841,
		"user_id" => 24388,
		"work_status" => "European National"
	],
	[
		"id" => 19844,
		"user_id" => 24391,
		"work_status" => "Non European National"
	],
	[
		"id" => 19845,
		"user_id" => 24392,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25797,
		"user_id" => 31916,
		"work_status" => "European National"
	],
	[
		"id" => 19854,
		"user_id" => 24401,
		"work_status" => "Non European National"
	],
	[
		"id" => 19856,
		"user_id" => 24403,
		"work_status" => "Non European National"
	],
	[
		"id" => 19861,
		"user_id" => 24408,
		"work_status" => "European National"
	],
	[
		"id" => 19863,
		"user_id" => 24410,
		"work_status" => "European National"
	],
	[
		"id" => 23249,
		"user_id" => 28775,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24875,
		"user_id" => 30439,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19870,
		"user_id" => 24417,
		"work_status" => "European National"
	],
	[
		"id" => 19888,
		"user_id" => 24435,
		"work_status" => "Non European National"
	],
	[
		"id" => 19894,
		"user_id" => 24441,
		"work_status" => "Non European National"
	],
	[
		"id" => 19895,
		"user_id" => 24442,
		"work_status" => "Non European National"
	],
	[
		"id" => 19898,
		"user_id" => 24445,
		"work_status" => "Non European National"
	],
	[
		"id" => 19908,
		"user_id" => 24455,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18581,
		"user_id" => 23073,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18582,
		"user_id" => 23074,
		"work_status" => "European National"
	],
	[
		"id" => 18583,
		"user_id" => 23075,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19313,
		"user_id" => 23860,
		"work_status" => "Non European National"
	],
	[
		"id" => 21633,
		"user_id" => 27054,
		"work_status" => "0"
	],
	[
		"id" => 21634,
		"user_id" => 27057,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24896,
		"user_id" => 30460,
		"work_status" => "Non European National"
	],
	[
		"id" => 25827,
		"user_id" => 31946,
		"work_status" => "0"
	],
	[
		"id" => 25828,
		"user_id" => 31947,
		"work_status" => "European National"
	],
	[
		"id" => 23791,
		"user_id" => 29355,
		"work_status" => "European National"
	],
	[
		"id" => 23759,
		"user_id" => 29323,
		"work_status" => "Non European National"
	],
	[
		"id" => 18591,
		"user_id" => 23088,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19770,
		"user_id" => 24317,
		"work_status" => "Non European National"
	],
	[
		"id" => 18595,
		"user_id" => 23076,
		"work_status" => "0"
	],
	[
		"id" => 18596,
		"user_id" => 23095,
		"work_status" => "Non European National"
	],
	[
		"id" => 18598,
		"user_id" => 23099,
		"work_status" => "Non European National"
	],
	[
		"id" => 27512,
		"user_id" => 34353,
		"work_status" => "European National"
	],
	[
		"id" => 18602,
		"user_id" => 23104,
		"work_status" => "0"
	],
	[
		"id" => 18753,
		"user_id" => 23300,
		"work_status" => "European National"
	],
	[
		"id" => 21990,
		"user_id" => 27516,
		"work_status" => "Non European National"
	],
	[
		"id" => 22243,
		"user_id" => 27769,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24423,
		"user_id" => 29987,
		"work_status" => "Non European National"
	],
	[
		"id" => 18606,
		"user_id" => 23114,
		"work_status" => "European National"
	],
	[
		"id" => 18607,
		"user_id" => 23121,
		"work_status" => "Non European National"
	],
	[
		"id" => 22561,
		"user_id" => 28087,
		"work_status" => "European National"
	],
	[
		"id" => 18609,
		"user_id" => 23119,
		"work_status" => "European National"
	],
	[
		"id" => 24470,
		"user_id" => 30034,
		"work_status" => "European National"
	],
	[
		"id" => 18611,
		"user_id" => 23125,
		"work_status" => "0"
	],
	[
		"id" => 18612,
		"user_id" => 23098,
		"work_status" => "0"
	],
	[
		"id" => 22395,
		"user_id" => 27921,
		"work_status" => "European National"
	],
	[
		"id" => 18614,
		"user_id" => 23127,
		"work_status" => "0"
	],
	[
		"id" => 23801,
		"user_id" => 29365,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18615,
		"user_id" => 20705,
		"work_status" => "0"
	],
	[
		"id" => 18616,
		"user_id" => 20491,
		"work_status" => "0"
	],
	[
		"id" => 18617,
		"user_id" => 23131,
		"work_status" => "0"
	],
	[
		"id" => 23456,
		"user_id" => 29020,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24802,
		"user_id" => 30366,
		"work_status" => "European National"
	],
	[
		"id" => 18620,
		"user_id" => 23135,
		"work_status" => "Non European National"
	],
	[
		"id" => 22344,
		"user_id" => 27870,
		"work_status" => "Non European National"
	],
	[
		"id" => 18622,
		"user_id" => 23137,
		"work_status" => "European National"
	],
	[
		"id" => 25786,
		"user_id" => 31905,
		"work_status" => "European National"
	],
	[
		"id" => 18624,
		"user_id" => 23140,
		"work_status" => "Non European National"
	],
	[
		"id" => 18625,
		"user_id" => 23142,
		"work_status" => "0"
	],
	[
		"id" => 18626,
		"user_id" => 23141,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22938,
		"user_id" => 28464,
		"work_status" => "Non European National"
	],
	[
		"id" => 18629,
		"user_id" => 23147,
		"work_status" => "Non European National"
	],
	[
		"id" => 18630,
		"user_id" => 23148,
		"work_status" => "Non European National"
	],
	[
		"id" => 18631,
		"user_id" => 23146,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18632,
		"user_id" => 23150,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18633,
		"user_id" => 23151,
		"work_status" => "0"
	],
	[
		"id" => 25814,
		"user_id" => 31933,
		"work_status" => "Non European National"
	],
	[
		"id" => 18635,
		"user_id" => 23153,
		"work_status" => "European National"
	],
	[
		"id" => 24867,
		"user_id" => 30431,
		"work_status" => "Non European National"
	],
	[
		"id" => 23644,
		"user_id" => 29208,
		"work_status" => "Non European National"
	],
	[
		"id" => 24768,
		"user_id" => 30332,
		"work_status" => "European National"
	],
	[
		"id" => 23464,
		"user_id" => 29028,
		"work_status" => "Non European National"
	],
	[
		"id" => 21842,
		"user_id" => 27368,
		"work_status" => "Non European National"
	],
	[
		"id" => 18641,
		"user_id" => 23161,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18643,
		"user_id" => 23163,
		"work_status" => "European National"
	],
	[
		"id" => 18644,
		"user_id" => 23167,
		"work_status" => "Non European National"
	],
	[
		"id" => 18645,
		"user_id" => 23169,
		"work_status" => "0"
	],
	[
		"id" => 22827,
		"user_id" => 28353,
		"work_status" => "European National"
	],
	[
		"id" => 23472,
		"user_id" => 29036,
		"work_status" => "Non European National"
	],
	[
		"id" => 18650,
		"user_id" => 23174,
		"work_status" => "0"
	],
	[
		"id" => 19893,
		"user_id" => 24440,
		"work_status" => "Non European National"
	],
	[
		"id" => 25542,
		"user_id" => 31479,
		"work_status" => "Non European National"
	],
	[
		"id" => 25543,
		"user_id" => 31483,
		"work_status" => "Non European National"
	],
	[
		"id" => 24502,
		"user_id" => 30066,
		"work_status" => "Non European National"
	],
	[
		"id" => 18654,
		"user_id" => 23179,
		"work_status" => "European National"
	],
	[
		"id" => 18655,
		"user_id" => 23180,
		"work_status" => "0"
	],
	[
		"id" => 18656,
		"user_id" => 23182,
		"work_status" => "0"
	],
	[
		"id" => 18657,
		"user_id" => 23183,
		"work_status" => "European National"
	],
	[
		"id" => 22226,
		"user_id" => 27752,
		"work_status" => "Non European National"
	],
	[
		"id" => 18659,
		"user_id" => 23184,
		"work_status" => "European National"
	],
	[
		"id" => 22552,
		"user_id" => 28078,
		"work_status" => "Non European National"
	],
	[
		"id" => 18661,
		"user_id" => 23187,
		"work_status" => "0"
	],
	[
		"id" => 18662,
		"user_id" => 23189,
		"work_status" => "European National"
	],
	[
		"id" => 18663,
		"user_id" => 23191,
		"work_status" => "European National"
	],
	[
		"id" => 24682,
		"user_id" => 30246,
		"work_status" => "Non European National"
	],
	[
		"id" => 22063,
		"user_id" => 27589,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18667,
		"user_id" => 23196,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18668,
		"user_id" => 23197,
		"work_status" => "0"
	],
	[
		"id" => 18669,
		"user_id" => 23192,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26418,
		"user_id" => 32806,
		"work_status" => "European National"
	],
	[
		"id" => 18671,
		"user_id" => 23200,
		"work_status" => "European National"
	],
	[
		"id" => 18672,
		"user_id" => 23201,
		"work_status" => "Non European National"
	],
	[
		"id" => 18673,
		"user_id" => 23202,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18674,
		"user_id" => 23203,
		"work_status" => "Non European National"
	],
	[
		"id" => 18675,
		"user_id" => 23204,
		"work_status" => "0"
	],
	[
		"id" => 24626,
		"user_id" => 30190,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18678,
		"user_id" => 23208,
		"work_status" => "Non European National"
	],
	[
		"id" => 18679,
		"user_id" => 23207,
		"work_status" => "Non European National"
	],
	[
		"id" => 18680,
		"user_id" => 23209,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21828,
		"user_id" => 27354,
		"work_status" => "Non European National"
	],
	[
		"id" => 18683,
		"user_id" => 23216,
		"work_status" => "0"
	],
	[
		"id" => 18684,
		"user_id" => 23217,
		"work_status" => "0"
	],
	[
		"id" => 23457,
		"user_id" => 29021,
		"work_status" => "European National"
	],
	[
		"id" => 18687,
		"user_id" => 23220,
		"work_status" => "0"
	],
	[
		"id" => 18688,
		"user_id" => 23221,
		"work_status" => "European National"
	],
	[
		"id" => 18690,
		"user_id" => 23226,
		"work_status" => "Non European National"
	],
	[
		"id" => 18692,
		"user_id" => 23227,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18693,
		"user_id" => 23229,
		"work_status" => "European National"
	],
	[
		"id" => 18694,
		"user_id" => 12655,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18695,
		"user_id" => 23231,
		"work_status" => "Non European National"
	],
	[
		"id" => 23482,
		"user_id" => 29046,
		"work_status" => "European National"
	],
	[
		"id" => 22496,
		"user_id" => 28022,
		"work_status" => "Non European National"
	],
	[
		"id" => 18699,
		"user_id" => 23236,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24706,
		"user_id" => 30270,
		"work_status" => "Non European National"
	],
	[
		"id" => 18701,
		"user_id" => 23239,
		"work_status" => "0"
	],
	[
		"id" => 23214,
		"user_id" => 28740,
		"work_status" => "European National"
	],
	[
		"id" => 18703,
		"user_id" => 23240,
		"work_status" => "0"
	],
	[
		"id" => 18704,
		"user_id" => 23241,
		"work_status" => "European National"
	],
	[
		"id" => 20110,
		"user_id" => 24769,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20111,
		"user_id" => 24771,
		"work_status" => "Non European National"
	],
	[
		"id" => 24747,
		"user_id" => 30311,
		"work_status" => "European National"
	],
	[
		"id" => 19711,
		"user_id" => 24258,
		"work_status" => "Non European National"
	],
	[
		"id" => 18707,
		"user_id" => 23246,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18708,
		"user_id" => 23245,
		"work_status" => "0"
	],
	[
		"id" => 23486,
		"user_id" => 29050,
		"work_status" => "Non European National"
	],
	[
		"id" => 24708,
		"user_id" => 30272,
		"work_status" => "European National"
	],
	[
		"id" => 18711,
		"user_id" => 23250,
		"work_status" => "0"
	],
	[
		"id" => 23809,
		"user_id" => 29373,
		"work_status" => "European National"
	],
	[
		"id" => 23573,
		"user_id" => 29137,
		"work_status" => "Non European National"
	],
	[
		"id" => 23067,
		"user_id" => 28593,
		"work_status" => "Non European National"
	],
	[
		"id" => 24398,
		"user_id" => 29962,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23029,
		"user_id" => 28555,
		"work_status" => "European National"
	],
	[
		"id" => 23508,
		"user_id" => 29072,
		"work_status" => "European National"
	],
	[
		"id" => 21920,
		"user_id" => 27446,
		"work_status" => "Non European National"
	],
	[
		"id" => 18720,
		"user_id" => 23265,
		"work_status" => "European National"
	],
	[
		"id" => 18721,
		"user_id" => 23267,
		"work_status" => "Non European National"
	],
	[
		"id" => 23288,
		"user_id" => 28814,
		"work_status" => "Non European National"
	],
	[
		"id" => 18723,
		"user_id" => 23269,
		"work_status" => "0"
	],
	[
		"id" => 21847,
		"user_id" => 27373,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 18726,
		"user_id" => 23272,
		"work_status" => "European National"
	],
	[
		"id" => 18727,
		"user_id" => 23273,
		"work_status" => "European National"
	],
	[
		"id" => 22879,
		"user_id" => 28405,
		"work_status" => "Non European National"
	],
	[
		"id" => 18730,
		"user_id" => 23223,
		"work_status" => "0"
	],
	[
		"id" => 18731,
		"user_id" => 23276,
		"work_status" => "0"
	],
	[
		"id" => 18733,
		"user_id" => 23230,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24645,
		"user_id" => 30209,
		"work_status" => "Non European National"
	],
	[
		"id" => 18736,
		"user_id" => 23283,
		"work_status" => "Non European National"
	],
	[
		"id" => 20201,
		"user_id" => 24917,
		"work_status" => "Non European National"
	],
	[
		"id" => 20191,
		"user_id" => 24901,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19912,
		"user_id" => 24459,
		"work_status" => "European National"
	],
	[
		"id" => 24474,
		"user_id" => 30038,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19914,
		"user_id" => 24462,
		"work_status" => "European National"
	],
	[
		"id" => 20336,
		"user_id" => 25106,
		"work_status" => "0"
	],
	[
		"id" => 19917,
		"user_id" => 24467,
		"work_status" => "Non European National"
	],
	[
		"id" => 27290,
		"user_id" => 34003,
		"work_status" => "Non European National"
	],
	[
		"id" => 27291,
		"user_id" => 34004,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24603,
		"user_id" => 30167,
		"work_status" => "Non European National"
	],
	[
		"id" => 19920,
		"user_id" => 24472,
		"work_status" => "European National"
	],
	[
		"id" => 22764,
		"user_id" => 28290,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19923,
		"user_id" => 24476,
		"work_status" => "European National"
	],
	[
		"id" => 19924,
		"user_id" => 24479,
		"work_status" => "European National"
	],
	[
		"id" => 23781,
		"user_id" => 29345,
		"work_status" => "Non European National"
	],
	[
		"id" => 19926,
		"user_id" => 23256,
		"work_status" => "0"
	],
	[
		"id" => 19927,
		"user_id" => 24482,
		"work_status" => "0"
	],
	[
		"id" => 19928,
		"user_id" => 24483,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19929,
		"user_id" => 24485,
		"work_status" => "0"
	],
	[
		"id" => 19930,
		"user_id" => 24486,
		"work_status" => "0"
	],
	[
		"id" => 25813,
		"user_id" => 31932,
		"work_status" => "Non European National"
	],
	[
		"id" => 21871,
		"user_id" => 27397,
		"work_status" => "European National"
	],
	[
		"id" => 22818,
		"user_id" => 28344,
		"work_status" => "Non European National"
	],
	[
		"id" => 26422,
		"user_id" => 32809,
		"work_status" => "0"
	],
	[
		"id" => 19936,
		"user_id" => 24493,
		"work_status" => "0"
	],
	[
		"id" => 24605,
		"user_id" => 30169,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23750,
		"user_id" => 29314,
		"work_status" => "European National"
	],
	[
		"id" => 23252,
		"user_id" => 28778,
		"work_status" => "Non European National"
	],
	[
		"id" => 24593,
		"user_id" => 30157,
		"work_status" => "Non European National"
	],
	[
		"id" => 23023,
		"user_id" => 28549,
		"work_status" => "Non European National"
	],
	[
		"id" => 23829,
		"user_id" => 29393,
		"work_status" => "European National"
	],
	[
		"id" => 23120,
		"user_id" => 28646,
		"work_status" => "European National"
	],
	[
		"id" => 19942,
		"user_id" => 24502,
		"work_status" => "Non European National"
	],
	[
		"id" => 19943,
		"user_id" => 24505,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23147,
		"user_id" => 28673,
		"work_status" => "European National"
	],
	[
		"id" => 19945,
		"user_id" => 24503,
		"work_status" => "European National"
	],
	[
		"id" => 20570,
		"user_id" => 25044,
		"work_status" => "Non European National"
	],
	[
		"id" => 19951,
		"user_id" => 24516,
		"work_status" => "0"
	],
	[
		"id" => 23114,
		"user_id" => 28640,
		"work_status" => "Non European National"
	],
	[
		"id" => 22601,
		"user_id" => 28127,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19955,
		"user_id" => 24522,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24601,
		"user_id" => 30165,
		"work_status" => "European National"
	],
	[
		"id" => 19957,
		"user_id" => 24520,
		"work_status" => "0"
	],
	[
		"id" => 24738,
		"user_id" => 30302,
		"work_status" => "Non European National"
	],
	[
		"id" => 19959,
		"user_id" => 24530,
		"work_status" => "Non European National"
	],
	[
		"id" => 19960,
		"user_id" => 24531,
		"work_status" => "0"
	],
	[
		"id" => 19962,
		"user_id" => 21124,
		"work_status" => "European National"
	],
	[
		"id" => 19963,
		"user_id" => 24534,
		"work_status" => "Non European National"
	],
	[
		"id" => 22179,
		"user_id" => 27705,
		"work_status" => "Non European National"
	],
	[
		"id" => 19965,
		"user_id" => 24537,
		"work_status" => "Non European National"
	],
	[
		"id" => 22528,
		"user_id" => 28054,
		"work_status" => "Non European National"
	],
	[
		"id" => 19967,
		"user_id" => 24539,
		"work_status" => "Non European National"
	],
	[
		"id" => 25806,
		"user_id" => 31925,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22807,
		"user_id" => 28333,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19970,
		"user_id" => 24543,
		"work_status" => "Non European National"
	],
	[
		"id" => 19971,
		"user_id" => 24546,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19972,
		"user_id" => 24548,
		"work_status" => "0"
	],
	[
		"id" => 25161,
		"user_id" => 27174,
		"work_status" => "Non European National"
	],
	[
		"id" => 24724,
		"user_id" => 30288,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19975,
		"user_id" => 24551,
		"work_status" => "0"
	],
	[
		"id" => 19976,
		"user_id" => 24552,
		"work_status" => "Non European National"
	],
	[
		"id" => 19977,
		"user_id" => 24553,
		"work_status" => "0"
	],
	[
		"id" => 19978,
		"user_id" => 24554,
		"work_status" => "0"
	],
	[
		"id" => 19979,
		"user_id" => 24555,
		"work_status" => "0"
	],
	[
		"id" => 19980,
		"user_id" => 24556,
		"work_status" => "European National"
	],
	[
		"id" => 19981,
		"user_id" => 24557,
		"work_status" => "0"
	],
	[
		"id" => 19982,
		"user_id" => 24559,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19983,
		"user_id" => 24561,
		"work_status" => "0"
	],
	[
		"id" => 19984,
		"user_id" => 24562,
		"work_status" => "Non European National"
	],
	[
		"id" => 19986,
		"user_id" => 24526,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23533,
		"user_id" => 29097,
		"work_status" => "Non European National"
	],
	[
		"id" => 19988,
		"user_id" => 24568,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19989,
		"user_id" => 24569,
		"work_status" => "Non European National"
	],
	[
		"id" => 19990,
		"user_id" => 24570,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23631,
		"user_id" => 29195,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22816,
		"user_id" => 28342,
		"work_status" => "European National"
	],
	[
		"id" => 19993,
		"user_id" => 24576,
		"work_status" => "Non European National"
	],
	[
		"id" => 19994,
		"user_id" => 24577,
		"work_status" => "Non European National"
	],
	[
		"id" => 23745,
		"user_id" => 29309,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24432,
		"user_id" => 29996,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22489,
		"user_id" => 28015,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 19998,
		"user_id" => 24581,
		"work_status" => "Non European National"
	],
	[
		"id" => 19999,
		"user_id" => 24582,
		"work_status" => "Non European National"
	],
	[
		"id" => 24634,
		"user_id" => 30198,
		"work_status" => "Non European National"
	],
	[
		"id" => 20001,
		"user_id" => 24585,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20002,
		"user_id" => 24586,
		"work_status" => "0"
	],
	[
		"id" => 20003,
		"user_id" => 24588,
		"work_status" => "0"
	],
	[
		"id" => 20004,
		"user_id" => 24593,
		"work_status" => "Non European National"
	],
	[
		"id" => 20005,
		"user_id" => 24533,
		"work_status" => "Non European National"
	],
	[
		"id" => 23221,
		"user_id" => 28747,
		"work_status" => "Non European National"
	],
	[
		"id" => 20007,
		"user_id" => 24599,
		"work_status" => "0"
	],
	[
		"id" => 23694,
		"user_id" => 29258,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23567,
		"user_id" => 29131,
		"work_status" => "Non European National"
	],
	[
		"id" => 20010,
		"user_id" => 24603,
		"work_status" => "Non European National"
	],
	[
		"id" => 20011,
		"user_id" => 24604,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20012,
		"user_id" => 24606,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20013,
		"user_id" => 24609,
		"work_status" => "0"
	],
	[
		"id" => 22865,
		"user_id" => 28391,
		"work_status" => "Non European National"
	],
	[
		"id" => 22620,
		"user_id" => 28146,
		"work_status" => "Non European National"
	],
	[
		"id" => 22484,
		"user_id" => 28010,
		"work_status" => "European National"
	],
	[
		"id" => 20020,
		"user_id" => 24627,
		"work_status" => "Non European National"
	],
	[
		"id" => 24788,
		"user_id" => 30352,
		"work_status" => "Non European National"
	],
	[
		"id" => 20022,
		"user_id" => 24629,
		"work_status" => "Non European National"
	],
	[
		"id" => 20023,
		"user_id" => 24631,
		"work_status" => "European National"
	],
	[
		"id" => 20025,
		"user_id" => 24633,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20026,
		"user_id" => 24594,
		"work_status" => "European National"
	],
	[
		"id" => 20027,
		"user_id" => 24635,
		"work_status" => "0"
	],
	[
		"id" => 20028,
		"user_id" => 24636,
		"work_status" => "0"
	],
	[
		"id" => 20029,
		"user_id" => 24638,
		"work_status" => "0"
	],
	[
		"id" => 24495,
		"user_id" => 30059,
		"work_status" => "European National"
	],
	[
		"id" => 20033,
		"user_id" => 24646,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23659,
		"user_id" => 29223,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24392,
		"user_id" => 29956,
		"work_status" => "Non European National"
	],
	[
		"id" => 20037,
		"user_id" => 24648,
		"work_status" => "Non European National"
	],
	[
		"id" => 20038,
		"user_id" => 24649,
		"work_status" => "0"
	],
	[
		"id" => 20039,
		"user_id" => 24653,
		"work_status" => "European National"
	],
	[
		"id" => 20040,
		"user_id" => 24656,
		"work_status" => "Non European National"
	],
	[
		"id" => 20041,
		"user_id" => 24659,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20042,
		"user_id" => 24658,
		"work_status" => "Non European National"
	],
	[
		"id" => 22092,
		"user_id" => 27618,
		"work_status" => "Non European National"
	],
	[
		"id" => 20044,
		"user_id" => 24661,
		"work_status" => "0"
	],
	[
		"id" => 23616,
		"user_id" => 29180,
		"work_status" => "European National"
	],
	[
		"id" => 20575,
		"user_id" => 25437,
		"work_status" => "0"
	],
	[
		"id" => 20047,
		"user_id" => 24666,
		"work_status" => "0"
	],
	[
		"id" => 20048,
		"user_id" => 24669,
		"work_status" => "European National"
	],
	[
		"id" => 20049,
		"user_id" => 24672,
		"work_status" => "0"
	],
	[
		"id" => 20050,
		"user_id" => 24674,
		"work_status" => "0"
	],
	[
		"id" => 21679,
		"user_id" => 27141,
		"work_status" => "European National"
	],
	[
		"id" => 23597,
		"user_id" => 29161,
		"work_status" => "Non European National"
	],
	[
		"id" => 24755,
		"user_id" => 30319,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24574,
		"user_id" => 30138,
		"work_status" => "Non European National"
	],
	[
		"id" => 20054,
		"user_id" => 24683,
		"work_status" => "Non European National"
	],
	[
		"id" => 22470,
		"user_id" => 27996,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20056,
		"user_id" => 24690,
		"work_status" => "0"
	],
	[
		"id" => 23902,
		"user_id" => 29466,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20058,
		"user_id" => 24693,
		"work_status" => "Non European National"
	],
	[
		"id" => 20059,
		"user_id" => 24694,
		"work_status" => "0"
	],
	[
		"id" => 21900,
		"user_id" => 27426,
		"work_status" => "Non European National"
	],
	[
		"id" => 20061,
		"user_id" => 24696,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20062,
		"user_id" => 24697,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20064,
		"user_id" => 24700,
		"work_status" => "0"
	],
	[
		"id" => 24521,
		"user_id" => 30085,
		"work_status" => "Non European National"
	],
	[
		"id" => 24857,
		"user_id" => 30421,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20067,
		"user_id" => 24687,
		"work_status" => "European National"
	],
	[
		"id" => 22786,
		"user_id" => 28312,
		"work_status" => "Non European National"
	],
	[
		"id" => 20245,
		"user_id" => 24986,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20246,
		"user_id" => 24985,
		"work_status" => "0"
	],
	[
		"id" => 23764,
		"user_id" => 29328,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22315,
		"user_id" => 27841,
		"work_status" => "European National"
	],
	[
		"id" => 20249,
		"user_id" => 24989,
		"work_status" => "0"
	],
	[
		"id" => 20250,
		"user_id" => 24990,
		"work_status" => "European National"
	],
	[
		"id" => 22979,
		"user_id" => 28505,
		"work_status" => "Non European National"
	],
	[
		"id" => 23204,
		"user_id" => 28730,
		"work_status" => "Non European National"
	],
	[
		"id" => 21922,
		"user_id" => 27448,
		"work_status" => "Non European National"
	],
	[
		"id" => 22586,
		"user_id" => 28112,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24388,
		"user_id" => 29952,
		"work_status" => "Non European National"
	],
	[
		"id" => 24544,
		"user_id" => 30108,
		"work_status" => "Non European National"
	],
	[
		"id" => 23901,
		"user_id" => 29465,
		"work_status" => "Non European National"
	],
	[
		"id" => 20259,
		"user_id" => 25001,
		"work_status" => "0"
	],
	[
		"id" => 20260,
		"user_id" => 25002,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23748,
		"user_id" => 29312,
		"work_status" => "European National"
	],
	[
		"id" => 20262,
		"user_id" => 25005,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24644,
		"user_id" => 30208,
		"work_status" => "Non European National"
	],
	[
		"id" => 20266,
		"user_id" => 25012,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23610,
		"user_id" => 29174,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20269,
		"user_id" => 25017,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22965,
		"user_id" => 28491,
		"work_status" => "Non European National"
	],
	[
		"id" => 22317,
		"user_id" => 27843,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24387,
		"user_id" => 29951,
		"work_status" => "Non European National"
	],
	[
		"id" => 20273,
		"user_id" => 25021,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20274,
		"user_id" => 25022,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23561,
		"user_id" => 29125,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20276,
		"user_id" => 25026,
		"work_status" => "Non European National"
	],
	[
		"id" => 22130,
		"user_id" => 27656,
		"work_status" => "Non European National"
	],
	[
		"id" => 22901,
		"user_id" => 28427,
		"work_status" => "European National"
	],
	[
		"id" => 20279,
		"user_id" => 24801,
		"work_status" => "0"
	],
	[
		"id" => 20281,
		"user_id" => 25032,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20488,
		"user_id" => 25322,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20282,
		"user_id" => 25035,
		"work_status" => "European National"
	],
	[
		"id" => 20283,
		"user_id" => 25036,
		"work_status" => "0"
	],
	[
		"id" => 20284,
		"user_id" => 25037,
		"work_status" => "0"
	],
	[
		"id" => 20285,
		"user_id" => 25038,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20286,
		"user_id" => 24655,
		"work_status" => "0"
	],
	[
		"id" => 27406,
		"user_id" => 34188,
		"work_status" => "0"
	],
	[
		"id" => 27407,
		"user_id" => 34185,
		"work_status" => "0"
	],
	[
		"id" => 20290,
		"user_id" => 25045,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22851,
		"user_id" => 28377,
		"work_status" => "Non European National"
	],
	[
		"id" => 24418,
		"user_id" => 29982,
		"work_status" => "European National"
	],
	[
		"id" => 20293,
		"user_id" => 25048,
		"work_status" => "0"
	],
	[
		"id" => 23766,
		"user_id" => 29330,
		"work_status" => "European National"
	],
	[
		"id" => 20296,
		"user_id" => 25054,
		"work_status" => "0"
	],
	[
		"id" => 20297,
		"user_id" => 24938,
		"work_status" => "European National"
	],
	[
		"id" => 20298,
		"user_id" => 25056,
		"work_status" => "0"
	],
	[
		"id" => 20299,
		"user_id" => 25059,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22790,
		"user_id" => 28316,
		"work_status" => "European National"
	],
	[
		"id" => 22024,
		"user_id" => 27550,
		"work_status" => "European National"
	],
	[
		"id" => 24463,
		"user_id" => 30027,
		"work_status" => "European National"
	],
	[
		"id" => 20303,
		"user_id" => 25069,
		"work_status" => "Non European National"
	],
	[
		"id" => 20304,
		"user_id" => 25067,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20305,
		"user_id" => 25063,
		"work_status" => "0"
	],
	[
		"id" => 20306,
		"user_id" => 25070,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23577,
		"user_id" => 29141,
		"work_status" => "Non European National"
	],
	[
		"id" => 23877,
		"user_id" => 29441,
		"work_status" => "Non European National"
	],
	[
		"id" => 20309,
		"user_id" => 25074,
		"work_status" => "Non European National"
	],
	[
		"id" => 20310,
		"user_id" => 25076,
		"work_status" => "0"
	],
	[
		"id" => 23755,
		"user_id" => 29319,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20312,
		"user_id" => 25078,
		"work_status" => "European National"
	],
	[
		"id" => 20313,
		"user_id" => 25079,
		"work_status" => "0"
	],
	[
		"id" => 20314,
		"user_id" => 25081,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24462,
		"user_id" => 30026,
		"work_status" => "Non European National"
	],
	[
		"id" => 21907,
		"user_id" => 27433,
		"work_status" => "Non European National"
	],
	[
		"id" => 20317,
		"user_id" => 25087,
		"work_status" => "Non European National"
	],
	[
		"id" => 23050,
		"user_id" => 28576,
		"work_status" => "European National"
	],
	[
		"id" => 23796,
		"user_id" => 29360,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22277,
		"user_id" => 27803,
		"work_status" => "Non European National"
	],
	[
		"id" => 24397,
		"user_id" => 29961,
		"work_status" => "Non European National"
	],
	[
		"id" => 24935,
		"user_id" => 30496,
		"work_status" => "European National"
	],
	[
		"id" => 24646,
		"user_id" => 30210,
		"work_status" => "European National"
	],
	[
		"id" => 22982,
		"user_id" => 28508,
		"work_status" => "Non European National"
	],
	[
		"id" => 20326,
		"user_id" => 25097,
		"work_status" => "European National"
	],
	[
		"id" => 20327,
		"user_id" => 25084,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22926,
		"user_id" => 28452,
		"work_status" => "Non European National"
	],
	[
		"id" => 23289,
		"user_id" => 28815,
		"work_status" => "European National"
	],
	[
		"id" => 24518,
		"user_id" => 30082,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23670,
		"user_id" => 29234,
		"work_status" => "Non European National"
	],
	[
		"id" => 22078,
		"user_id" => 27604,
		"work_status" => "European National"
	],
	[
		"id" => 23274,
		"user_id" => 28800,
		"work_status" => "European National"
	],
	[
		"id" => 20339,
		"user_id" => 25113,
		"work_status" => "0"
	],
	[
		"id" => 21761,
		"user_id" => 27287,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23290,
		"user_id" => 28816,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20342,
		"user_id" => 21057,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20343,
		"user_id" => 25119,
		"work_status" => "0"
	],
	[
		"id" => 23305,
		"user_id" => 28831,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20347,
		"user_id" => 25124,
		"work_status" => "0"
	],
	[
		"id" => 24808,
		"user_id" => 30372,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24433,
		"user_id" => 29997,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20350,
		"user_id" => 25128,
		"work_status" => "0"
	],
	[
		"id" => 20351,
		"user_id" => 25130,
		"work_status" => "0"
	],
	[
		"id" => 24681,
		"user_id" => 30245,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21955,
		"user_id" => 27481,
		"work_status" => "Non European National"
	],
	[
		"id" => 26707,
		"user_id" => 33225,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23106,
		"user_id" => 28632,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24843,
		"user_id" => 30407,
		"work_status" => "Non European National"
	],
	[
		"id" => 20357,
		"user_id" => 25133,
		"work_status" => "0"
	],
	[
		"id" => 20358,
		"user_id" => 25142,
		"work_status" => "0"
	],
	[
		"id" => 22708,
		"user_id" => 28234,
		"work_status" => "Non European National"
	],
	[
		"id" => 20361,
		"user_id" => 25146,
		"work_status" => "0"
	],
	[
		"id" => 22366,
		"user_id" => 27892,
		"work_status" => "Non European National"
	],
	[
		"id" => 20363,
		"user_id" => 25151,
		"work_status" => "0"
	],
	[
		"id" => 20366,
		"user_id" => 25156,
		"work_status" => "European National"
	],
	[
		"id" => 21876,
		"user_id" => 27402,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20368,
		"user_id" => 25158,
		"work_status" => "0"
	],
	[
		"id" => 20369,
		"user_id" => 25160,
		"work_status" => "0"
	],
	[
		"id" => 20373,
		"user_id" => 25170,
		"work_status" => "Non European National"
	],
	[
		"id" => 24614,
		"user_id" => 30178,
		"work_status" => "European National"
	],
	[
		"id" => 23111,
		"user_id" => 28637,
		"work_status" => "Non European National"
	],
	[
		"id" => 20376,
		"user_id" => 25141,
		"work_status" => "0"
	],
	[
		"id" => 24587,
		"user_id" => 30151,
		"work_status" => "Non European National"
	],
	[
		"id" => 23403,
		"user_id" => 28931,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23404,
		"user_id" => 28956,
		"work_status" => "0"
	],
	[
		"id" => 25195,
		"user_id" => 30893,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25820,
		"user_id" => 31939,
		"work_status" => "Non European National"
	],
	[
		"id" => 20385,
		"user_id" => 25191,
		"work_status" => "European National"
	],
	[
		"id" => 20386,
		"user_id" => 25192,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23747,
		"user_id" => 29311,
		"work_status" => "Non European National"
	],
	[
		"id" => 20388,
		"user_id" => 25200,
		"work_status" => "0"
	],
	[
		"id" => 24571,
		"user_id" => 30135,
		"work_status" => "European National"
	],
	[
		"id" => 20390,
		"user_id" => 25204,
		"work_status" => "0"
	],
	[
		"id" => 20391,
		"user_id" => 25205,
		"work_status" => "Non European National"
	],
	[
		"id" => 20392,
		"user_id" => 25206,
		"work_status" => "Non European National"
	],
	[
		"id" => 20393,
		"user_id" => 25209,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20394,
		"user_id" => 20573,
		"work_status" => "Non European National"
	],
	[
		"id" => 20396,
		"user_id" => 25212,
		"work_status" => "European National"
	],
	[
		"id" => 23838,
		"user_id" => 29402,
		"work_status" => "European National"
	],
	[
		"id" => 24650,
		"user_id" => 30214,
		"work_status" => "Non European National"
	],
	[
		"id" => 23619,
		"user_id" => 29183,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22766,
		"user_id" => 28292,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23603,
		"user_id" => 29167,
		"work_status" => "Non European National"
	],
	[
		"id" => 22724,
		"user_id" => 28250,
		"work_status" => "European National"
	],
	[
		"id" => 20407,
		"user_id" => 25162,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24631,
		"user_id" => 30195,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20409,
		"user_id" => 25237,
		"work_status" => "Non European National"
	],
	[
		"id" => 20411,
		"user_id" => 25240,
		"work_status" => "Non European National"
	],
	[
		"id" => 24584,
		"user_id" => 30148,
		"work_status" => "Non European National"
	],
	[
		"id" => 20413,
		"user_id" => 25247,
		"work_status" => "Non European National"
	],
	[
		"id" => 24560,
		"user_id" => 30124,
		"work_status" => "Non European National"
	],
	[
		"id" => 20415,
		"user_id" => 25251,
		"work_status" => "0"
	],
	[
		"id" => 20417,
		"user_id" => 25255,
		"work_status" => "Non European National"
	],
	[
		"id" => 20418,
		"user_id" => 25254,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20419,
		"user_id" => 25256,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20420,
		"user_id" => 25257,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20421,
		"user_id" => 25260,
		"work_status" => "Non European National"
	],
	[
		"id" => 20422,
		"user_id" => 25262,
		"work_status" => "0"
	],
	[
		"id" => 20423,
		"user_id" => 25263,
		"work_status" => "Non European National"
	],
	[
		"id" => 20424,
		"user_id" => 25265,
		"work_status" => "0"
	],
	[
		"id" => 26284,
		"user_id" => 32642,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20426,
		"user_id" => 25267,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20428,
		"user_id" => 25268,
		"work_status" => "European National"
	],
	[
		"id" => 20429,
		"user_id" => 25269,
		"work_status" => "European National"
	],
	[
		"id" => 20430,
		"user_id" => 25271,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20431,
		"user_id" => 25272,
		"work_status" => "0"
	],
	[
		"id" => 24503,
		"user_id" => 30067,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20433,
		"user_id" => 25242,
		"work_status" => "Non European National"
	],
	[
		"id" => 20434,
		"user_id" => 25277,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20435,
		"user_id" => 25279,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20436,
		"user_id" => 25280,
		"work_status" => "0"
	],
	[
		"id" => 24594,
		"user_id" => 30158,
		"work_status" => "Non European National"
	],
	[
		"id" => 20438,
		"user_id" => 25281,
		"work_status" => "0"
	],
	[
		"id" => 20439,
		"user_id" => 25283,
		"work_status" => "0"
	],
	[
		"id" => 24675,
		"user_id" => 30239,
		"work_status" => "Non European National"
	],
	[
		"id" => 20441,
		"user_id" => 25287,
		"work_status" => "0"
	],
	[
		"id" => 20443,
		"user_id" => 25288,
		"work_status" => "European National"
	],
	[
		"id" => 22517,
		"user_id" => 28043,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20445,
		"user_id" => 25286,
		"work_status" => "0"
	],
	[
		"id" => 20446,
		"user_id" => 25290,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20447,
		"user_id" => 25291,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20448,
		"user_id" => 25292,
		"work_status" => "0"
	],
	[
		"id" => 20449,
		"user_id" => 25294,
		"work_status" => "Non European National"
	],
	[
		"id" => 20450,
		"user_id" => 25297,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21859,
		"user_id" => 27385,
		"work_status" => "European National"
	],
	[
		"id" => 22257,
		"user_id" => 27783,
		"work_status" => "European National"
	],
	[
		"id" => 20453,
		"user_id" => 25301,
		"work_status" => "Non European National"
	],
	[
		"id" => 20455,
		"user_id" => 25303,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20456,
		"user_id" => 25304,
		"work_status" => "0"
	],
	[
		"id" => 22867,
		"user_id" => 28393,
		"work_status" => "Non European National"
	],
	[
		"id" => 23887,
		"user_id" => 29451,
		"work_status" => "Non European National"
	],
	[
		"id" => 20459,
		"user_id" => 25307,
		"work_status" => "0"
	],
	[
		"id" => 20460,
		"user_id" => 25308,
		"work_status" => "Non European National"
	],
	[
		"id" => 21567,
		"user_id" => 26945,
		"work_status" => "Non European National"
	],
	[
		"id" => 20462,
		"user_id" => 25310,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20463,
		"user_id" => 25311,
		"work_status" => "0"
	],
	[
		"id" => 20464,
		"user_id" => 25312,
		"work_status" => "0"
	],
	[
		"id" => 23525,
		"user_id" => 29089,
		"work_status" => "European National"
	],
	[
		"id" => 20466,
		"user_id" => 25314,
		"work_status" => "0"
	],
	[
		"id" => 22555,
		"user_id" => 28081,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23907,
		"user_id" => 29471,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23076,
		"user_id" => 28602,
		"work_status" => "Non European National"
	],
	[
		"id" => 20471,
		"user_id" => 25324,
		"work_status" => "0"
	],
	[
		"id" => 24937,
		"user_id" => 30499,
		"work_status" => "European National"
	],
	[
		"id" => 21651,
		"user_id" => 27098,
		"work_status" => "Non European National"
	],
	[
		"id" => 20476,
		"user_id" => 20716,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20477,
		"user_id" => 25313,
		"work_status" => "0"
	],
	[
		"id" => 21630,
		"user_id" => 27044,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20479,
		"user_id" => 25332,
		"work_status" => "Non European National"
	],
	[
		"id" => 20480,
		"user_id" => 25334,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23724,
		"user_id" => 29288,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20482,
		"user_id" => 25338,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20484,
		"user_id" => 25340,
		"work_status" => "European National"
	],
	[
		"id" => 20489,
		"user_id" => 25173,
		"work_status" => "0"
	],
	[
		"id" => 20490,
		"user_id" => 20815,
		"work_status" => "0"
	],
	[
		"id" => 20491,
		"user_id" => 10419,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20492,
		"user_id" => 20823,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24912,
		"user_id" => 30476,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23833,
		"user_id" => 29397,
		"work_status" => "European National"
	],
	[
		"id" => 20495,
		"user_id" => 25346,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20496,
		"user_id" => 10500,
		"work_status" => "0"
	],
	[
		"id" => 20497,
		"user_id" => 25348,
		"work_status" => "European National"
	],
	[
		"id" => 20498,
		"user_id" => 25350,
		"work_status" => "Non European National"
	],
	[
		"id" => 20499,
		"user_id" => 20980,
		"work_status" => "0"
	],
	[
		"id" => 20501,
		"user_id" => 10995,
		"work_status" => "0"
	],
	[
		"id" => 20502,
		"user_id" => 25354,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20505,
		"user_id" => 16333,
		"work_status" => "0"
	],
	[
		"id" => 20506,
		"user_id" => 24778,
		"work_status" => "Non European National"
	],
	[
		"id" => 20507,
		"user_id" => 9085,
		"work_status" => "Non European National"
	],
	[
		"id" => 20511,
		"user_id" => 25364,
		"work_status" => "Non European National"
	],
	[
		"id" => 20512,
		"user_id" => 25365,
		"work_status" => "0"
	],
	[
		"id" => 23480,
		"user_id" => 29044,
		"work_status" => "Non European National"
	],
	[
		"id" => 20514,
		"user_id" => 25366,
		"work_status" => "0"
	],
	[
		"id" => 23642,
		"user_id" => 29206,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24429,
		"user_id" => 29993,
		"work_status" => "Non European National"
	],
	[
		"id" => 20519,
		"user_id" => 25369,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20520,
		"user_id" => 25249,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25562,
		"user_id" => 31532,
		"work_status" => "European National"
	],
	[
		"id" => 20522,
		"user_id" => 25371,
		"work_status" => "Non European National"
	],
	[
		"id" => 20523,
		"user_id" => 20170,
		"work_status" => "0"
	],
	[
		"id" => 23107,
		"user_id" => 28633,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20525,
		"user_id" => 25373,
		"work_status" => "0"
	],
	[
		"id" => 23210,
		"user_id" => 28736,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22726,
		"user_id" => 28252,
		"work_status" => "Non European National"
	],
	[
		"id" => 20528,
		"user_id" => 10901,
		"work_status" => "0"
	],
	[
		"id" => 20531,
		"user_id" => 25381,
		"work_status" => "Non European National"
	],
	[
		"id" => 20532,
		"user_id" => 25385,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20533,
		"user_id" => 25386,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23648,
		"user_id" => 29212,
		"work_status" => "European National"
	],
	[
		"id" => 20535,
		"user_id" => 25387,
		"work_status" => "0"
	],
	[
		"id" => 24761,
		"user_id" => 30325,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24864,
		"user_id" => 30428,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23883,
		"user_id" => 29447,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20540,
		"user_id" => 25393,
		"work_status" => "Non European National"
	],
	[
		"id" => 20541,
		"user_id" => 25394,
		"work_status" => "Non European National"
	],
	[
		"id" => 20543,
		"user_id" => 25399,
		"work_status" => "Non European National"
	],
	[
		"id" => 20545,
		"user_id" => 25403,
		"work_status" => "Non European National"
	],
	[
		"id" => 21958,
		"user_id" => 27484,
		"work_status" => "Non European National"
	],
	[
		"id" => 22262,
		"user_id" => 27788,
		"work_status" => "European National"
	],
	[
		"id" => 20548,
		"user_id" => 25407,
		"work_status" => "European National"
	],
	[
		"id" => 24699,
		"user_id" => 30263,
		"work_status" => "Non European National"
	],
	[
		"id" => 23555,
		"user_id" => 29119,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20551,
		"user_id" => 25412,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24419,
		"user_id" => 29983,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23543,
		"user_id" => 29107,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23723,
		"user_id" => 29287,
		"work_status" => "European National"
	],
	[
		"id" => 22671,
		"user_id" => 28197,
		"work_status" => "Non European National"
	],
	[
		"id" => 23756,
		"user_id" => 29320,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23777,
		"user_id" => 29341,
		"work_status" => "Non European National"
	],
	[
		"id" => 20559,
		"user_id" => 23270,
		"work_status" => "0"
	],
	[
		"id" => 20560,
		"user_id" => 25420,
		"work_status" => "European National"
	],
	[
		"id" => 20561,
		"user_id" => 25421,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20562,
		"user_id" => 25422,
		"work_status" => "European National"
	],
	[
		"id" => 24477,
		"user_id" => 30041,
		"work_status" => "European National"
	],
	[
		"id" => 20564,
		"user_id" => 25423,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20565,
		"user_id" => 25424,
		"work_status" => "0"
	],
	[
		"id" => 25779,
		"user_id" => 31898,
		"work_status" => "Non European National"
	],
	[
		"id" => 20589,
		"user_id" => 25454,
		"work_status" => "0"
	],
	[
		"id" => 20590,
		"user_id" => 19565,
		"work_status" => "European National"
	],
	[
		"id" => 20591,
		"user_id" => 25457,
		"work_status" => "European National"
	],
	[
		"id" => 22037,
		"user_id" => 27563,
		"work_status" => "Non European National"
	],
	[
		"id" => 20593,
		"user_id" => 25461,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20594,
		"user_id" => 25462,
		"work_status" => "0"
	],
	[
		"id" => 24688,
		"user_id" => 30252,
		"work_status" => "Non European National"
	],
	[
		"id" => 20597,
		"user_id" => 25466,
		"work_status" => "0"
	],
	[
		"id" => 20598,
		"user_id" => 25468,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20599,
		"user_id" => 25475,
		"work_status" => "0"
	],
	[
		"id" => 23130,
		"user_id" => 28656,
		"work_status" => "Non European National"
	],
	[
		"id" => 20601,
		"user_id" => 19448,
		"work_status" => "Non European National"
	],
	[
		"id" => 23672,
		"user_id" => 29236,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21778,
		"user_id" => 27304,
		"work_status" => "European National"
	],
	[
		"id" => 20605,
		"user_id" => 25479,
		"work_status" => "0"
	],
	[
		"id" => 20606,
		"user_id" => 25482,
		"work_status" => "European National"
	],
	[
		"id" => 23859,
		"user_id" => 29423,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23552,
		"user_id" => 29116,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20609,
		"user_id" => 25489,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20610,
		"user_id" => 25491,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22072,
		"user_id" => 27598,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20612,
		"user_id" => 25493,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20613,
		"user_id" => 25495,
		"work_status" => "Non European National"
	],
	[
		"id" => 20614,
		"user_id" => 24709,
		"work_status" => "Non European National"
	],
	[
		"id" => 20615,
		"user_id" => 25496,
		"work_status" => "Non European National"
	],
	[
		"id" => 20616,
		"user_id" => 25497,
		"work_status" => "0"
	],
	[
		"id" => 20617,
		"user_id" => 25498,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20618,
		"user_id" => 24488,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23903,
		"user_id" => 29467,
		"work_status" => "European National"
	],
	[
		"id" => 23351,
		"user_id" => 27192,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20621,
		"user_id" => 25222,
		"work_status" => "0"
	],
	[
		"id" => 20622,
		"user_id" => 25506,
		"work_status" => "Non European National"
	],
	[
		"id" => 23608,
		"user_id" => 29172,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20624,
		"user_id" => 25510,
		"work_status" => "Non European National"
	],
	[
		"id" => 24729,
		"user_id" => 30293,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20626,
		"user_id" => 25514,
		"work_status" => "0"
	],
	[
		"id" => 20627,
		"user_id" => 25512,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24765,
		"user_id" => 30329,
		"work_status" => "European National"
	],
	[
		"id" => 20629,
		"user_id" => 25516,
		"work_status" => "Non European National"
	],
	[
		"id" => 20630,
		"user_id" => 25518,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20631,
		"user_id" => 25519,
		"work_status" => "0"
	],
	[
		"id" => 23564,
		"user_id" => 29128,
		"work_status" => "Non European National"
	],
	[
		"id" => 24878,
		"user_id" => 30442,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20634,
		"user_id" => 25524,
		"work_status" => "0"
	],
	[
		"id" => 20635,
		"user_id" => 25525,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24412,
		"user_id" => 29976,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20825,
		"user_id" => 25794,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20638,
		"user_id" => 25529,
		"work_status" => "European National"
	],
	[
		"id" => 20639,
		"user_id" => 25530,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23860,
		"user_id" => 29424,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20641,
		"user_id" => 25532,
		"work_status" => "European National"
	],
	[
		"id" => 20642,
		"user_id" => 25533,
		"work_status" => "Non European National"
	],
	[
		"id" => 20643,
		"user_id" => 25193,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20644,
		"user_id" => 25534,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20645,
		"user_id" => 25536,
		"work_status" => "0"
	],
	[
		"id" => 20646,
		"user_id" => 25537,
		"work_status" => "Non European National"
	],
	[
		"id" => 20649,
		"user_id" => 25544,
		"work_status" => "European National"
	],
	[
		"id" => 23880,
		"user_id" => 29444,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20651,
		"user_id" => 25483,
		"work_status" => "European National"
	],
	[
		"id" => 20652,
		"user_id" => 25548,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20653,
		"user_id" => 25549,
		"work_status" => "Non European National"
	],
	[
		"id" => 24557,
		"user_id" => 30121,
		"work_status" => "European National"
	],
	[
		"id" => 20655,
		"user_id" => 25552,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24483,
		"user_id" => 30047,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24776,
		"user_id" => 30340,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20658,
		"user_id" => 25562,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24528,
		"user_id" => 30092,
		"work_status" => "Non European National"
	],
	[
		"id" => 23537,
		"user_id" => 29101,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24853,
		"user_id" => 30417,
		"work_status" => "European National"
	],
	[
		"id" => 23795,
		"user_id" => 29359,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23374,
		"user_id" => 28914,
		"work_status" => "European National"
	],
	[
		"id" => 20664,
		"user_id" => 25574,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20665,
		"user_id" => 25576,
		"work_status" => "0"
	],
	[
		"id" => 20666,
		"user_id" => 25575,
		"work_status" => "Non European National"
	],
	[
		"id" => 20667,
		"user_id" => 25573,
		"work_status" => "0"
	],
	[
		"id" => 20668,
		"user_id" => 25577,
		"work_status" => "0"
	],
	[
		"id" => 20670,
		"user_id" => 25582,
		"work_status" => "Non European National"
	],
	[
		"id" => 24783,
		"user_id" => 30347,
		"work_status" => "European National"
	],
	[
		"id" => 22631,
		"user_id" => 28157,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23136,
		"user_id" => 28662,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20675,
		"user_id" => 20351,
		"work_status" => "Non European National"
	],
	[
		"id" => 20676,
		"user_id" => 25591,
		"work_status" => "Non European National"
	],
	[
		"id" => 21851,
		"user_id" => 27377,
		"work_status" => "European National"
	],
	[
		"id" => 20678,
		"user_id" => 25592,
		"work_status" => "European National"
	],
	[
		"id" => 20679,
		"user_id" => 20330,
		"work_status" => "0"
	],
	[
		"id" => 20680,
		"user_id" => 25593,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23607,
		"user_id" => 29171,
		"work_status" => "European National"
	],
	[
		"id" => 20682,
		"user_id" => 25566,
		"work_status" => "European National"
	],
	[
		"id" => 23636,
		"user_id" => 29200,
		"work_status" => "Non European National"
	],
	[
		"id" => 20684,
		"user_id" => 25598,
		"work_status" => "European National"
	],
	[
		"id" => 20685,
		"user_id" => 25599,
		"work_status" => "0"
	],
	[
		"id" => 20686,
		"user_id" => 25601,
		"work_status" => "European National"
	],
	[
		"id" => 23064,
		"user_id" => 28590,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20689,
		"user_id" => 25606,
		"work_status" => "European National"
	],
	[
		"id" => 20690,
		"user_id" => 25608,
		"work_status" => "European National"
	],
	[
		"id" => 23782,
		"user_id" => 29346,
		"work_status" => "European National"
	],
	[
		"id" => 20692,
		"user_id" => 25611,
		"work_status" => "0"
	],
	[
		"id" => 20693,
		"user_id" => 25613,
		"work_status" => "Non European National"
	],
	[
		"id" => 24736,
		"user_id" => 30300,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25789,
		"user_id" => 31908,
		"work_status" => "Non European National"
	],
	[
		"id" => 23763,
		"user_id" => 29327,
		"work_status" => "European National"
	],
	[
		"id" => 24396,
		"user_id" => 29960,
		"work_status" => "Non European National"
	],
	[
		"id" => 20698,
		"user_id" => 25619,
		"work_status" => "0"
	],
	[
		"id" => 20699,
		"user_id" => 25621,
		"work_status" => "Non European National"
	],
	[
		"id" => 20700,
		"user_id" => 25622,
		"work_status" => "Non European National"
	],
	[
		"id" => 20701,
		"user_id" => 25623,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20702,
		"user_id" => 25624,
		"work_status" => "European National"
	],
	[
		"id" => 20703,
		"user_id" => 25625,
		"work_status" => "0"
	],
	[
		"id" => 22813,
		"user_id" => 28339,
		"work_status" => "European National"
	],
	[
		"id" => 24773,
		"user_id" => 30337,
		"work_status" => "European National"
	],
	[
		"id" => 20706,
		"user_id" => 25628,
		"work_status" => "0"
	],
	[
		"id" => 20707,
		"user_id" => 25629,
		"work_status" => "0"
	],
	[
		"id" => 24667,
		"user_id" => 30231,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20709,
		"user_id" => 25632,
		"work_status" => "European National"
	],
	[
		"id" => 24390,
		"user_id" => 29954,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22254,
		"user_id" => 27780,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24487,
		"user_id" => 30051,
		"work_status" => "Non European National"
	],
	[
		"id" => 22062,
		"user_id" => 27588,
		"work_status" => "Non European National"
	],
	[
		"id" => 22255,
		"user_id" => 27781,
		"work_status" => "Non European National"
	],
	[
		"id" => 23678,
		"user_id" => 29242,
		"work_status" => "Non European National"
	],
	[
		"id" => 22306,
		"user_id" => 27832,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20717,
		"user_id" => 25640,
		"work_status" => "European National"
	],
	[
		"id" => 20718,
		"user_id" => 25641,
		"work_status" => "0"
	],
	[
		"id" => 20719,
		"user_id" => 25642,
		"work_status" => "Non European National"
	],
	[
		"id" => 20721,
		"user_id" => 25648,
		"work_status" => "0"
	],
	[
		"id" => 20722,
		"user_id" => 25546,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20749,
		"user_id" => 25680,
		"work_status" => "0"
	],
	[
		"id" => 20724,
		"user_id" => 25653,
		"work_status" => "0"
	],
	[
		"id" => 23753,
		"user_id" => 29317,
		"work_status" => "Non European National"
	],
	[
		"id" => 21837,
		"user_id" => 27363,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21548,
		"user_id" => 26910,
		"work_status" => "0"
	],
	[
		"id" => 21549,
		"user_id" => 26919,
		"work_status" => "0"
	],
	[
		"id" => 21550,
		"user_id" => 26921,
		"work_status" => "Non European National"
	],
	[
		"id" => 20728,
		"user_id" => 25656,
		"work_status" => "Non European National"
	],
	[
		"id" => 23580,
		"user_id" => 29144,
		"work_status" => "European National"
	],
	[
		"id" => 24771,
		"user_id" => 30335,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20734,
		"user_id" => 25341,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24508,
		"user_id" => 30072,
		"work_status" => "Non European National"
	],
	[
		"id" => 21414,
		"user_id" => 26701,
		"work_status" => "0"
	],
	[
		"id" => 21415,
		"user_id" => 26703,
		"work_status" => "0"
	],
	[
		"id" => 20737,
		"user_id" => 25665,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20738,
		"user_id" => 25670,
		"work_status" => "0"
	],
	[
		"id" => 20739,
		"user_id" => 25667,
		"work_status" => "0"
	],
	[
		"id" => 23335,
		"user_id" => 28864,
		"work_status" => "Non European National"
	],
	[
		"id" => 24760,
		"user_id" => 30324,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20743,
		"user_id" => 25675,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20744,
		"user_id" => 25676,
		"work_status" => "0"
	],
	[
		"id" => 20745,
		"user_id" => 25677,
		"work_status" => "0"
	],
	[
		"id" => 21865,
		"user_id" => 27391,
		"work_status" => "European National"
	],
	[
		"id" => 20747,
		"user_id" => 25678,
		"work_status" => "0"
	],
	[
		"id" => 25817,
		"user_id" => 31936,
		"work_status" => "European National"
	],
	[
		"id" => 20750,
		"user_id" => 25681,
		"work_status" => "Non European National"
	],
	[
		"id" => 20751,
		"user_id" => 25682,
		"work_status" => "Non European National"
	],
	[
		"id" => 20752,
		"user_id" => 25333,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23744,
		"user_id" => 29308,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21786,
		"user_id" => 27312,
		"work_status" => "Non European National"
	],
	[
		"id" => 20758,
		"user_id" => 25697,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23039,
		"user_id" => 28565,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25147,
		"user_id" => 30843,
		"work_status" => "0"
	],
	[
		"id" => 24807,
		"user_id" => 30371,
		"work_status" => "Non European National"
	],
	[
		"id" => 23623,
		"user_id" => 29187,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22001,
		"user_id" => 27527,
		"work_status" => "Non European National"
	],
	[
		"id" => 20764,
		"user_id" => 25704,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20765,
		"user_id" => 25705,
		"work_status" => "European National"
	],
	[
		"id" => 20766,
		"user_id" => 25707,
		"work_status" => "Non European National"
	],
	[
		"id" => 23574,
		"user_id" => 29138,
		"work_status" => "Non European National"
	],
	[
		"id" => 24883,
		"user_id" => 30447,
		"work_status" => "European National"
	],
	[
		"id" => 23587,
		"user_id" => 29151,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22178,
		"user_id" => 27704,
		"work_status" => "European National"
	],
	[
		"id" => 23551,
		"user_id" => 29115,
		"work_status" => "European National"
	],
	[
		"id" => 20772,
		"user_id" => 25715,
		"work_status" => "0"
	],
	[
		"id" => 23751,
		"user_id" => 29315,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23787,
		"user_id" => 29351,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23095,
		"user_id" => 28621,
		"work_status" => "European National"
	],
	[
		"id" => 20776,
		"user_id" => 25718,
		"work_status" => "Non European National"
	],
	[
		"id" => 24413,
		"user_id" => 29977,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23303,
		"user_id" => 28829,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20780,
		"user_id" => 25726,
		"work_status" => "0"
	],
	[
		"id" => 20781,
		"user_id" => 25727,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20782,
		"user_id" => 25728,
		"work_status" => "0"
	],
	[
		"id" => 24743,
		"user_id" => 30307,
		"work_status" => "Non European National"
	],
	[
		"id" => 22189,
		"user_id" => 27715,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20785,
		"user_id" => 25729,
		"work_status" => "Non European National"
	],
	[
		"id" => 24907,
		"user_id" => 30471,
		"work_status" => "Non European National"
	],
	[
		"id" => 20787,
		"user_id" => 25734,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23177,
		"user_id" => 28703,
		"work_status" => "Non European National"
	],
	[
		"id" => 20789,
		"user_id" => 25737,
		"work_status" => "0"
	],
	[
		"id" => 22765,
		"user_id" => 28291,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24908,
		"user_id" => 30472,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23645,
		"user_id" => 29209,
		"work_status" => "Non European National"
	],
	[
		"id" => 24731,
		"user_id" => 30295,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22729,
		"user_id" => 28255,
		"work_status" => "Non European National"
	],
	[
		"id" => 23458,
		"user_id" => 29022,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24647,
		"user_id" => 30211,
		"work_status" => "European National"
	],
	[
		"id" => 20797,
		"user_id" => 25744,
		"work_status" => "0"
	],
	[
		"id" => 22643,
		"user_id" => 28169,
		"work_status" => "Non European National"
	],
	[
		"id" => 24704,
		"user_id" => 30268,
		"work_status" => "Non European National"
	],
	[
		"id" => 23451,
		"user_id" => 29015,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24579,
		"user_id" => 30143,
		"work_status" => "European National"
	],
	[
		"id" => 20802,
		"user_id" => 25755,
		"work_status" => "European National"
	],
	[
		"id" => 25144,
		"user_id" => 11059,
		"work_status" => "European National"
	],
	[
		"id" => 20805,
		"user_id" => 25759,
		"work_status" => "0"
	],
	[
		"id" => 20806,
		"user_id" => 25760,
		"work_status" => "0"
	],
	[
		"id" => 20807,
		"user_id" => 25763,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20808,
		"user_id" => 25766,
		"work_status" => "Non European National"
	],
	[
		"id" => 21524,
		"user_id" => 26869,
		"work_status" => "European National"
	],
	[
		"id" => 21677,
		"user_id" => 27139,
		"work_status" => "Non European National"
	],
	[
		"id" => 20811,
		"user_id" => 25771,
		"work_status" => "European National"
	],
	[
		"id" => 20812,
		"user_id" => 25772,
		"work_status" => "0"
	],
	[
		"id" => 20813,
		"user_id" => 25775,
		"work_status" => "0"
	],
	[
		"id" => 24806,
		"user_id" => 30370,
		"work_status" => "European National"
	],
	[
		"id" => 24659,
		"user_id" => 30223,
		"work_status" => "European National"
	],
	[
		"id" => 20818,
		"user_id" => 25783,
		"work_status" => "Non European National"
	],
	[
		"id" => 23874,
		"user_id" => 29438,
		"work_status" => "Non European National"
	],
	[
		"id" => 24873,
		"user_id" => 30437,
		"work_status" => "Non European National"
	],
	[
		"id" => 20821,
		"user_id" => 25787,
		"work_status" => "0"
	],
	[
		"id" => 24868,
		"user_id" => 30432,
		"work_status" => "European National"
	],
	[
		"id" => 20823,
		"user_id" => 25790,
		"work_status" => "Non European National"
	],
	[
		"id" => 20824,
		"user_id" => 25791,
		"work_status" => "0"
	],
	[
		"id" => 20826,
		"user_id" => 25459,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22081,
		"user_id" => 27607,
		"work_status" => "European National"
	],
	[
		"id" => 24714,
		"user_id" => 30278,
		"work_status" => "Non European National"
	],
	[
		"id" => 20829,
		"user_id" => 25799,
		"work_status" => "0"
	],
	[
		"id" => 23291,
		"user_id" => 28817,
		"work_status" => "European National"
	],
	[
		"id" => 22780,
		"user_id" => 28306,
		"work_status" => "Non European National"
	],
	[
		"id" => 20832,
		"user_id" => 25802,
		"work_status" => "Non European National"
	],
	[
		"id" => 20834,
		"user_id" => 25805,
		"work_status" => "0"
	],
	[
		"id" => 20835,
		"user_id" => 25563,
		"work_status" => "Non European National"
	],
	[
		"id" => 23044,
		"user_id" => 28570,
		"work_status" => "Non European National"
	],
	[
		"id" => 20837,
		"user_id" => 25808,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20838,
		"user_id" => 25811,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20839,
		"user_id" => 25812,
		"work_status" => "0"
	],
	[
		"id" => 20840,
		"user_id" => 25813,
		"work_status" => "0"
	],
	[
		"id" => 20841,
		"user_id" => 20739,
		"work_status" => "0"
	],
	[
		"id" => 20842,
		"user_id" => 25817,
		"work_status" => "Non European National"
	],
	[
		"id" => 22720,
		"user_id" => 28246,
		"work_status" => "Non European National"
	],
	[
		"id" => 20845,
		"user_id" => 25822,
		"work_status" => "European National"
	],
	[
		"id" => 20846,
		"user_id" => 25823,
		"work_status" => "0"
	],
	[
		"id" => 20847,
		"user_id" => 24843,
		"work_status" => "0"
	],
	[
		"id" => 20848,
		"user_id" => 25826,
		"work_status" => "0"
	],
	[
		"id" => 20849,
		"user_id" => 25833,
		"work_status" => "0"
	],
	[
		"id" => 20850,
		"user_id" => 25834,
		"work_status" => "European National"
	],
	[
		"id" => 20851,
		"user_id" => 25835,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24547,
		"user_id" => 30111,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20853,
		"user_id" => 25838,
		"work_status" => "Non European National"
	],
	[
		"id" => 20854,
		"user_id" => 25840,
		"work_status" => "Non European National"
	],
	[
		"id" => 22377,
		"user_id" => 27903,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20856,
		"user_id" => 25842,
		"work_status" => "European National"
	],
	[
		"id" => 24494,
		"user_id" => 30058,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20858,
		"user_id" => 25848,
		"work_status" => "Non European National"
	],
	[
		"id" => 20859,
		"user_id" => 25849,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20860,
		"user_id" => 25852,
		"work_status" => "Non European National"
	],
	[
		"id" => 20862,
		"user_id" => 25855,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20863,
		"user_id" => 25856,
		"work_status" => "0"
	],
	[
		"id" => 20864,
		"user_id" => 25846,
		"work_status" => "European National"
	],
	[
		"id" => 20865,
		"user_id" => 25858,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21998,
		"user_id" => 27524,
		"work_status" => "European National"
	],
	[
		"id" => 20867,
		"user_id" => 25859,
		"work_status" => "Non European National"
	],
	[
		"id" => 20868,
		"user_id" => 25861,
		"work_status" => "0"
	],
	[
		"id" => 20869,
		"user_id" => 25862,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20872,
		"user_id" => 9979,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22247,
		"user_id" => 27773,
		"work_status" => "European National"
	],
	[
		"id" => 20910,
		"user_id" => 25920,
		"work_status" => "0"
	],
	[
		"id" => 23897,
		"user_id" => 29461,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20876,
		"user_id" => 25870,
		"work_status" => "0"
	],
	[
		"id" => 24716,
		"user_id" => 30280,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24913,
		"user_id" => 30477,
		"work_status" => "European National"
	],
	[
		"id" => 20939,
		"user_id" => 25894,
		"work_status" => "0"
	],
	[
		"id" => 23547,
		"user_id" => 29111,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23716,
		"user_id" => 29280,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22188,
		"user_id" => 27714,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20882,
		"user_id" => 25880,
		"work_status" => "European National"
	],
	[
		"id" => 24648,
		"user_id" => 30212,
		"work_status" => "Non European National"
	],
	[
		"id" => 22266,
		"user_id" => 27792,
		"work_status" => "Non European National"
	],
	[
		"id" => 22112,
		"user_id" => 27638,
		"work_status" => "Non European National"
	],
	[
		"id" => 22661,
		"user_id" => 28187,
		"work_status" => "Non European National"
	],
	[
		"id" => 23498,
		"user_id" => 29062,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22379,
		"user_id" => 27905,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20891,
		"user_id" => 20605,
		"work_status" => "Non European National"
	],
	[
		"id" => 23484,
		"user_id" => 29048,
		"work_status" => "European National"
	],
	[
		"id" => 20893,
		"user_id" => 25893,
		"work_status" => "European National"
	],
	[
		"id" => 20894,
		"user_id" => 25897,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22714,
		"user_id" => 28240,
		"work_status" => "Non European National"
	],
	[
		"id" => 20897,
		"user_id" => 25901,
		"work_status" => "0"
	],
	[
		"id" => 23167,
		"user_id" => 28693,
		"work_status" => "Non European National"
	],
	[
		"id" => 20899,
		"user_id" => 25906,
		"work_status" => "European National"
	],
	[
		"id" => 24568,
		"user_id" => 30132,
		"work_status" => "Non European National"
	],
	[
		"id" => 23589,
		"user_id" => 29153,
		"work_status" => "Non European National"
	],
	[
		"id" => 22652,
		"user_id" => 28178,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20904,
		"user_id" => 25910,
		"work_status" => "European National"
	],
	[
		"id" => 23848,
		"user_id" => 29412,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24677,
		"user_id" => 30241,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20907,
		"user_id" => 25915,
		"work_status" => "0"
	],
	[
		"id" => 20908,
		"user_id" => 25917,
		"work_status" => "0"
	],
	[
		"id" => 23559,
		"user_id" => 29123,
		"work_status" => "Non European National"
	],
	[
		"id" => 21569,
		"user_id" => 20784,
		"work_status" => "Non European National"
	],
	[
		"id" => 22828,
		"user_id" => 28354,
		"work_status" => "Non European National"
	],
	[
		"id" => 23595,
		"user_id" => 29159,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20914,
		"user_id" => 25924,
		"work_status" => "0"
	],
	[
		"id" => 20915,
		"user_id" => 25881,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23002,
		"user_id" => 28528,
		"work_status" => "Non European National"
	],
	[
		"id" => 22762,
		"user_id" => 28288,
		"work_status" => "European National"
	],
	[
		"id" => 22823,
		"user_id" => 28349,
		"work_status" => "Non European National"
	],
	[
		"id" => 22538,
		"user_id" => 28064,
		"work_status" => "European National"
	],
	[
		"id" => 20920,
		"user_id" => 25929,
		"work_status" => "Non European National"
	],
	[
		"id" => 24889,
		"user_id" => 30453,
		"work_status" => "Non European National"
	],
	[
		"id" => 20923,
		"user_id" => 25935,
		"work_status" => "European National"
	],
	[
		"id" => 20924,
		"user_id" => 25936,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22547,
		"user_id" => 28073,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21331,
		"user_id" => 26585,
		"work_status" => "Non European National"
	],
	[
		"id" => 20927,
		"user_id" => 25938,
		"work_status" => "European National"
	],
	[
		"id" => 24527,
		"user_id" => 30091,
		"work_status" => "European National"
	],
	[
		"id" => 20929,
		"user_id" => 25939,
		"work_status" => "Non European National"
	],
	[
		"id" => 20930,
		"user_id" => 25940,
		"work_status" => "0"
	],
	[
		"id" => 20931,
		"user_id" => 25941,
		"work_status" => "Non European National"
	],
	[
		"id" => 20932,
		"user_id" => 25933,
		"work_status" => "0"
	],
	[
		"id" => 20933,
		"user_id" => 25945,
		"work_status" => "0"
	],
	[
		"id" => 20934,
		"user_id" => 25947,
		"work_status" => "0"
	],
	[
		"id" => 20935,
		"user_id" => 25948,
		"work_status" => "0"
	],
	[
		"id" => 20936,
		"user_id" => 25949,
		"work_status" => "0"
	],
	[
		"id" => 24698,
		"user_id" => 30262,
		"work_status" => "European National"
	],
	[
		"id" => 23713,
		"user_id" => 29277,
		"work_status" => "Non European National"
	],
	[
		"id" => 23612,
		"user_id" => 29176,
		"work_status" => "European National"
	],
	[
		"id" => 22742,
		"user_id" => 28268,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23898,
		"user_id" => 29462,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22590,
		"user_id" => 28116,
		"work_status" => "European National"
	],
	[
		"id" => 20947,
		"user_id" => 25959,
		"work_status" => "Non European National"
	],
	[
		"id" => 20948,
		"user_id" => 25960,
		"work_status" => "Non European National"
	],
	[
		"id" => 24625,
		"user_id" => 30189,
		"work_status" => "European National"
	],
	[
		"id" => 20950,
		"user_id" => 25966,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23690,
		"user_id" => 29254,
		"work_status" => "Non European National"
	],
	[
		"id" => 20952,
		"user_id" => 25970,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20953,
		"user_id" => 25974,
		"work_status" => "Non European National"
	],
	[
		"id" => 20955,
		"user_id" => 25975,
		"work_status" => "0"
	],
	[
		"id" => 20956,
		"user_id" => 25979,
		"work_status" => "Non European National"
	],
	[
		"id" => 22737,
		"user_id" => 28263,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20958,
		"user_id" => 25981,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23520,
		"user_id" => 29084,
		"work_status" => "Non European National"
	],
	[
		"id" => 20960,
		"user_id" => 25983,
		"work_status" => "Non European National"
	],
	[
		"id" => 24485,
		"user_id" => 30049,
		"work_status" => "European National"
	],
	[
		"id" => 22201,
		"user_id" => 27727,
		"work_status" => "Non European National"
	],
	[
		"id" => 22373,
		"user_id" => 27899,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20965,
		"user_id" => 25988,
		"work_status" => "0"
	],
	[
		"id" => 20966,
		"user_id" => 25989,
		"work_status" => "Non European National"
	],
	[
		"id" => 23336,
		"user_id" => 28865,
		"work_status" => "Non European National"
	],
	[
		"id" => 20968,
		"user_id" => 25992,
		"work_status" => "0"
	],
	[
		"id" => 25196,
		"user_id" => 30896,
		"work_status" => "0"
	],
	[
		"id" => 25197,
		"user_id" => 30894,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20970,
		"user_id" => 26001,
		"work_status" => "0"
	],
	[
		"id" => 20971,
		"user_id" => 25999,
		"work_status" => "European National"
	],
	[
		"id" => 20972,
		"user_id" => 26002,
		"work_status" => "Non European National"
	],
	[
		"id" => 20973,
		"user_id" => 26003,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20974,
		"user_id" => 26005,
		"work_status" => "European National"
	],
	[
		"id" => 20975,
		"user_id" => 26004,
		"work_status" => "European National"
	],
	[
		"id" => 20976,
		"user_id" => 26006,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24457,
		"user_id" => 30021,
		"work_status" => "Non European National"
	],
	[
		"id" => 20979,
		"user_id" => 26019,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20980,
		"user_id" => 26020,
		"work_status" => "0"
	],
	[
		"id" => 20981,
		"user_id" => 26023,
		"work_status" => "Non European National"
	],
	[
		"id" => 20982,
		"user_id" => 26024,
		"work_status" => "Non European National"
	],
	[
		"id" => 23299,
		"user_id" => 28825,
		"work_status" => "Non European National"
	],
	[
		"id" => 23684,
		"user_id" => 29248,
		"work_status" => "Non European National"
	],
	[
		"id" => 23767,
		"user_id" => 29331,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21938,
		"user_id" => 27464,
		"work_status" => "Non European National"
	],
	[
		"id" => 20987,
		"user_id" => 26029,
		"work_status" => "European National"
	],
	[
		"id" => 22854,
		"user_id" => 28380,
		"work_status" => "Non European National"
	],
	[
		"id" => 20989,
		"user_id" => 26032,
		"work_status" => "0"
	],
	[
		"id" => 24718,
		"user_id" => 30282,
		"work_status" => "European National"
	],
	[
		"id" => 23649,
		"user_id" => 29213,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 20992,
		"user_id" => 25998,
		"work_status" => "Non European National"
	],
	[
		"id" => 20994,
		"user_id" => 26037,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23225,
		"user_id" => 28751,
		"work_status" => "Non European National"
	],
	[
		"id" => 20996,
		"user_id" => 26041,
		"work_status" => "Non European National"
	],
	[
		"id" => 20998,
		"user_id" => 26052,
		"work_status" => "European National"
	],
	[
		"id" => 20999,
		"user_id" => 26055,
		"work_status" => "European National"
	],
	[
		"id" => 21000,
		"user_id" => 26056,
		"work_status" => "0"
	],
	[
		"id" => 21001,
		"user_id" => 26057,
		"work_status" => "0"
	],
	[
		"id" => 24493,
		"user_id" => 30057,
		"work_status" => "European National"
	],
	[
		"id" => 21003,
		"user_id" => 26059,
		"work_status" => "0"
	],
	[
		"id" => 23497,
		"user_id" => 29061,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25792,
		"user_id" => 31911,
		"work_status" => "European National"
	],
	[
		"id" => 21007,
		"user_id" => 26067,
		"work_status" => "European National"
	],
	[
		"id" => 23540,
		"user_id" => 29104,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21009,
		"user_id" => 26071,
		"work_status" => "Non European National"
	],
	[
		"id" => 21010,
		"user_id" => 26065,
		"work_status" => "Non European National"
	],
	[
		"id" => 21011,
		"user_id" => 26075,
		"work_status" => "0"
	],
	[
		"id" => 21012,
		"user_id" => 26076,
		"work_status" => "0"
	],
	[
		"id" => 21013,
		"user_id" => 26072,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21014,
		"user_id" => 26080,
		"work_status" => "Non European National"
	],
	[
		"id" => 21015,
		"user_id" => 26079,
		"work_status" => "Non European National"
	],
	[
		"id" => 22167,
		"user_id" => 27693,
		"work_status" => "European National"
	],
	[
		"id" => 21017,
		"user_id" => 26083,
		"work_status" => "0"
	],
	[
		"id" => 21018,
		"user_id" => 26084,
		"work_status" => "0"
	],
	[
		"id" => 21019,
		"user_id" => 26087,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23468,
		"user_id" => 29032,
		"work_status" => "European National"
	],
	[
		"id" => 21021,
		"user_id" => 26086,
		"work_status" => "Non European National"
	],
	[
		"id" => 23699,
		"user_id" => 29263,
		"work_status" => "Non European National"
	],
	[
		"id" => 21023,
		"user_id" => 26093,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21024,
		"user_id" => 26095,
		"work_status" => "0"
	],
	[
		"id" => 23152,
		"user_id" => 28678,
		"work_status" => "European National"
	],
	[
		"id" => 21026,
		"user_id" => 26096,
		"work_status" => "0"
	],
	[
		"id" => 21027,
		"user_id" => 26097,
		"work_status" => "0"
	],
	[
		"id" => 23216,
		"user_id" => 28742,
		"work_status" => "European National"
	],
	[
		"id" => 24381,
		"user_id" => 29945,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23511,
		"user_id" => 29075,
		"work_status" => "Non European National"
	],
	[
		"id" => 21031,
		"user_id" => 26103,
		"work_status" => "European National"
	],
	[
		"id" => 23492,
		"user_id" => 29056,
		"work_status" => "Non European National"
	],
	[
		"id" => 21033,
		"user_id" => 26107,
		"work_status" => "0"
	],
	[
		"id" => 21035,
		"user_id" => 26108,
		"work_status" => "Non European National"
	],
	[
		"id" => 22478,
		"user_id" => 28004,
		"work_status" => "Non European National"
	],
	[
		"id" => 21037,
		"user_id" => 26115,
		"work_status" => "Non European National"
	],
	[
		"id" => 21038,
		"user_id" => 26116,
		"work_status" => "0"
	],
	[
		"id" => 21039,
		"user_id" => 26117,
		"work_status" => "0"
	],
	[
		"id" => 21040,
		"user_id" => 26118,
		"work_status" => "Non European National"
	],
	[
		"id" => 23638,
		"user_id" => 29202,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21840,
		"user_id" => 27366,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23554,
		"user_id" => 29118,
		"work_status" => "European National"
	],
	[
		"id" => 21044,
		"user_id" => 26126,
		"work_status" => "0"
	],
	[
		"id" => 21045,
		"user_id" => 26127,
		"work_status" => "0"
	],
	[
		"id" => 21046,
		"user_id" => 26128,
		"work_status" => "European National"
	],
	[
		"id" => 21047,
		"user_id" => 26091,
		"work_status" => "0"
	],
	[
		"id" => 21048,
		"user_id" => 26130,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22095,
		"user_id" => 27621,
		"work_status" => "European National"
	],
	[
		"id" => 22899,
		"user_id" => 28425,
		"work_status" => "Non European National"
	],
	[
		"id" => 21051,
		"user_id" => 26112,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21790,
		"user_id" => 27316,
		"work_status" => "Non European National"
	],
	[
		"id" => 21053,
		"user_id" => 26137,
		"work_status" => "European National"
	],
	[
		"id" => 23126,
		"user_id" => 28652,
		"work_status" => "Non European National"
	],
	[
		"id" => 23047,
		"user_id" => 28573,
		"work_status" => "Non European National"
	],
	[
		"id" => 24801,
		"user_id" => 30365,
		"work_status" => "Non European National"
	],
	[
		"id" => 21057,
		"user_id" => 26145,
		"work_status" => "European National"
	],
	[
		"id" => 21058,
		"user_id" => 26146,
		"work_status" => "Non European National"
	],
	[
		"id" => 21059,
		"user_id" => 26149,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21061,
		"user_id" => 26125,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21062,
		"user_id" => 26150,
		"work_status" => "European National"
	],
	[
		"id" => 21063,
		"user_id" => 26135,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22096,
		"user_id" => 27622,
		"work_status" => "Non European National"
	],
	[
		"id" => 21065,
		"user_id" => 26151,
		"work_status" => "Non European National"
	],
	[
		"id" => 23725,
		"user_id" => 29289,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24624,
		"user_id" => 30188,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21068,
		"user_id" => 26157,
		"work_status" => "European National"
	],
	[
		"id" => 23676,
		"user_id" => 29240,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21918,
		"user_id" => 27444,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21495,
		"user_id" => 24789,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21073,
		"user_id" => 26167,
		"work_status" => "Non European National"
	],
	[
		"id" => 24565,
		"user_id" => 30129,
		"work_status" => "European National"
	],
	[
		"id" => 21075,
		"user_id" => 26168,
		"work_status" => "European National"
	],
	[
		"id" => 21076,
		"user_id" => 26171,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23267,
		"user_id" => 28793,
		"work_status" => "Non European National"
	],
	[
		"id" => 21078,
		"user_id" => 26175,
		"work_status" => "European National"
	],
	[
		"id" => 21079,
		"user_id" => 26136,
		"work_status" => "European National"
	],
	[
		"id" => 21081,
		"user_id" => 26179,
		"work_status" => "Non European National"
	],
	[
		"id" => 24424,
		"user_id" => 29988,
		"work_status" => "European National"
	],
	[
		"id" => 21083,
		"user_id" => 26180,
		"work_status" => "Non European National"
	],
	[
		"id" => 21084,
		"user_id" => 26184,
		"work_status" => "0"
	],
	[
		"id" => 21086,
		"user_id" => 26185,
		"work_status" => "European National"
	],
	[
		"id" => 21087,
		"user_id" => 26187,
		"work_status" => "Non European National"
	],
	[
		"id" => 21088,
		"user_id" => 26189,
		"work_status" => "Non European National"
	],
	[
		"id" => 21089,
		"user_id" => 26190,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21090,
		"user_id" => 26188,
		"work_status" => "Non European National"
	],
	[
		"id" => 21091,
		"user_id" => 26192,
		"work_status" => "0"
	],
	[
		"id" => 23870,
		"user_id" => 29434,
		"work_status" => "Non European National"
	],
	[
		"id" => 21093,
		"user_id" => 26195,
		"work_status" => "0"
	],
	[
		"id" => 21168,
		"user_id" => 26319,
		"work_status" => "0"
	],
	[
		"id" => 21095,
		"user_id" => 26199,
		"work_status" => "Non European National"
	],
	[
		"id" => 21096,
		"user_id" => 26202,
		"work_status" => "Non European National"
	],
	[
		"id" => 21098,
		"user_id" => 26203,
		"work_status" => "European National"
	],
	[
		"id" => 21099,
		"user_id" => 26170,
		"work_status" => "Non European National"
	],
	[
		"id" => 22833,
		"user_id" => 28359,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21101,
		"user_id" => 26207,
		"work_status" => "0"
	],
	[
		"id" => 21102,
		"user_id" => 26204,
		"work_status" => "Non European National"
	],
	[
		"id" => 24416,
		"user_id" => 29980,
		"work_status" => "Non European National"
	],
	[
		"id" => 21104,
		"user_id" => 26211,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21105,
		"user_id" => 26214,
		"work_status" => "0"
	],
	[
		"id" => 21106,
		"user_id" => 26219,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21850,
		"user_id" => 27376,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21108,
		"user_id" => 26224,
		"work_status" => "European National"
	],
	[
		"id" => 21109,
		"user_id" => 26223,
		"work_status" => "Non European National"
	],
	[
		"id" => 21110,
		"user_id" => 26226,
		"work_status" => "0"
	],
	[
		"id" => 21111,
		"user_id" => 26221,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24782,
		"user_id" => 30346,
		"work_status" => "European National"
	],
	[
		"id" => 21113,
		"user_id" => 26230,
		"work_status" => "0"
	],
	[
		"id" => 21114,
		"user_id" => 26231,
		"work_status" => "0"
	],
	[
		"id" => 21115,
		"user_id" => 26229,
		"work_status" => "Non European National"
	],
	[
		"id" => 21116,
		"user_id" => 26232,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21117,
		"user_id" => 26233,
		"work_status" => "Non European National"
	],
	[
		"id" => 21118,
		"user_id" => 26235,
		"work_status" => "0"
	],
	[
		"id" => 21119,
		"user_id" => 26236,
		"work_status" => "0"
	],
	[
		"id" => 21120,
		"user_id" => 26239,
		"work_status" => "0"
	],
	[
		"id" => 21121,
		"user_id" => 26238,
		"work_status" => "European National"
	],
	[
		"id" => 21122,
		"user_id" => 26243,
		"work_status" => "0"
	],
	[
		"id" => 24697,
		"user_id" => 30261,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21124,
		"user_id" => 26246,
		"work_status" => "European National"
	],
	[
		"id" => 21125,
		"user_id" => 26248,
		"work_status" => "Non European National"
	],
	[
		"id" => 22477,
		"user_id" => 28003,
		"work_status" => "Non European National"
	],
	[
		"id" => 21127,
		"user_id" => 26250,
		"work_status" => "0"
	],
	[
		"id" => 21128,
		"user_id" => 26252,
		"work_status" => "0"
	],
	[
		"id" => 21129,
		"user_id" => 26251,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21130,
		"user_id" => 26253,
		"work_status" => "Non European National"
	],
	[
		"id" => 21131,
		"user_id" => 26257,
		"work_status" => "Non European National"
	],
	[
		"id" => 21133,
		"user_id" => 26242,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22150,
		"user_id" => 27676,
		"work_status" => "Non European National"
	],
	[
		"id" => 24538,
		"user_id" => 30102,
		"work_status" => "Non European National"
	],
	[
		"id" => 21136,
		"user_id" => 26260,
		"work_status" => "0"
	],
	[
		"id" => 21137,
		"user_id" => 26261,
		"work_status" => "0"
	],
	[
		"id" => 21139,
		"user_id" => 26266,
		"work_status" => "0"
	],
	[
		"id" => 24597,
		"user_id" => 30161,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21141,
		"user_id" => 26268,
		"work_status" => "Non European National"
	],
	[
		"id" => 21142,
		"user_id" => 26271,
		"work_status" => "0"
	],
	[
		"id" => 22886,
		"user_id" => 28412,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21144,
		"user_id" => 26276,
		"work_status" => "European National"
	],
	[
		"id" => 21145,
		"user_id" => 26277,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21146,
		"user_id" => 26281,
		"work_status" => "0"
	],
	[
		"id" => 21525,
		"user_id" => 26871,
		"work_status" => "0"
	],
	[
		"id" => 22378,
		"user_id" => 27904,
		"work_status" => "European National"
	],
	[
		"id" => 21527,
		"user_id" => 26875,
		"work_status" => "0"
	],
	[
		"id" => 24496,
		"user_id" => 30060,
		"work_status" => "Non European National"
	],
	[
		"id" => 21149,
		"user_id" => 26289,
		"work_status" => "Non European National"
	],
	[
		"id" => 21150,
		"user_id" => 26288,
		"work_status" => "Non European National"
	],
	[
		"id" => 21151,
		"user_id" => 26254,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24404,
		"user_id" => 29968,
		"work_status" => "Non European National"
	],
	[
		"id" => 21153,
		"user_id" => 26270,
		"work_status" => "European National"
	],
	[
		"id" => 21154,
		"user_id" => 26293,
		"work_status" => "European National"
	],
	[
		"id" => 23655,
		"user_id" => 29219,
		"work_status" => "Non European National"
	],
	[
		"id" => 22757,
		"user_id" => 28283,
		"work_status" => "European National"
	],
	[
		"id" => 23539,
		"user_id" => 29103,
		"work_status" => "European National"
	],
	[
		"id" => 21157,
		"user_id" => 26299,
		"work_status" => "0"
	],
	[
		"id" => 21158,
		"user_id" => 26304,
		"work_status" => "0"
	],
	[
		"id" => 21763,
		"user_id" => 27289,
		"work_status" => "Non European National"
	],
	[
		"id" => 23698,
		"user_id" => 29262,
		"work_status" => "European National"
	],
	[
		"id" => 21162,
		"user_id" => 26307,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21163,
		"user_id" => 26308,
		"work_status" => "Non European National"
	],
	[
		"id" => 24468,
		"user_id" => 30032,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21165,
		"user_id" => 26311,
		"work_status" => "European National"
	],
	[
		"id" => 21169,
		"user_id" => 26322,
		"work_status" => "0"
	],
	[
		"id" => 21170,
		"user_id" => 26321,
		"work_status" => "European National"
	],
	[
		"id" => 23085,
		"user_id" => 28611,
		"work_status" => "Non European National"
	],
	[
		"id" => 21172,
		"user_id" => 26318,
		"work_status" => "European National"
	],
	[
		"id" => 21174,
		"user_id" => 26330,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23635,
		"user_id" => 29199,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21774,
		"user_id" => 27300,
		"work_status" => "European National"
	],
	[
		"id" => 21177,
		"user_id" => 26337,
		"work_status" => "0"
	],
	[
		"id" => 22007,
		"user_id" => 27533,
		"work_status" => "European National"
	],
	[
		"id" => 21179,
		"user_id" => 26208,
		"work_status" => "0"
	],
	[
		"id" => 21181,
		"user_id" => 26343,
		"work_status" => "0"
	],
	[
		"id" => 21182,
		"user_id" => 26344,
		"work_status" => "0"
	],
	[
		"id" => 21184,
		"user_id" => 26346,
		"work_status" => "0"
	],
	[
		"id" => 24871,
		"user_id" => 30435,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22463,
		"user_id" => 27989,
		"work_status" => "Non European National"
	],
	[
		"id" => 21187,
		"user_id" => 26350,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21188,
		"user_id" => 26349,
		"work_status" => "0"
	],
	[
		"id" => 21189,
		"user_id" => 26351,
		"work_status" => "Non European National"
	],
	[
		"id" => 23277,
		"user_id" => 28803,
		"work_status" => "Non European National"
	],
	[
		"id" => 23634,
		"user_id" => 29198,
		"work_status" => "Non European National"
	],
	[
		"id" => 21192,
		"user_id" => 26353,
		"work_status" => "European National"
	],
	[
		"id" => 23824,
		"user_id" => 29388,
		"work_status" => "Non European National"
	],
	[
		"id" => 22972,
		"user_id" => 28498,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23794,
		"user_id" => 29358,
		"work_status" => "Non European National"
	],
	[
		"id" => 21196,
		"user_id" => 26362,
		"work_status" => "Non European National"
	],
	[
		"id" => 22333,
		"user_id" => 27859,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21198,
		"user_id" => 26363,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21199,
		"user_id" => 26367,
		"work_status" => "0"
	],
	[
		"id" => 22499,
		"user_id" => 28025,
		"work_status" => "Non European National"
	],
	[
		"id" => 21201,
		"user_id" => 26375,
		"work_status" => "Non European National"
	],
	[
		"id" => 21203,
		"user_id" => 26377,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21204,
		"user_id" => 26380,
		"work_status" => "Non European National"
	],
	[
		"id" => 21205,
		"user_id" => 26382,
		"work_status" => "0"
	],
	[
		"id" => 21206,
		"user_id" => 26381,
		"work_status" => "European National"
	],
	[
		"id" => 21207,
		"user_id" => 26274,
		"work_status" => "Non European National"
	],
	[
		"id" => 24533,
		"user_id" => 30097,
		"work_status" => "European National"
	],
	[
		"id" => 24520,
		"user_id" => 30084,
		"work_status" => "European National"
	],
	[
		"id" => 22970,
		"user_id" => 28496,
		"work_status" => "Non European National"
	],
	[
		"id" => 21211,
		"user_id" => 26388,
		"work_status" => "0"
	],
	[
		"id" => 21212,
		"user_id" => 26390,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21213,
		"user_id" => 26392,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21214,
		"user_id" => 26391,
		"work_status" => "Non European National"
	],
	[
		"id" => 24535,
		"user_id" => 30099,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21217,
		"user_id" => 26398,
		"work_status" => "0"
	],
	[
		"id" => 21218,
		"user_id" => 26400,
		"work_status" => "European National"
	],
	[
		"id" => 21219,
		"user_id" => 26402,
		"work_status" => "0"
	],
	[
		"id" => 21220,
		"user_id" => 26074,
		"work_status" => "0"
	],
	[
		"id" => 21221,
		"user_id" => 26404,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21222,
		"user_id" => 26406,
		"work_status" => "0"
	],
	[
		"id" => 21223,
		"user_id" => 26405,
		"work_status" => "European National"
	],
	[
		"id" => 21224,
		"user_id" => 26407,
		"work_status" => "0"
	],
	[
		"id" => 23727,
		"user_id" => 29291,
		"work_status" => "Non European National"
	],
	[
		"id" => 21226,
		"user_id" => 26408,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24517,
		"user_id" => 30081,
		"work_status" => "Non European National"
	],
	[
		"id" => 22568,
		"user_id" => 28094,
		"work_status" => "European National"
	],
	[
		"id" => 24441,
		"user_id" => 30005,
		"work_status" => "European National"
	],
	[
		"id" => 24895,
		"user_id" => 30459,
		"work_status" => "European National"
	],
	[
		"id" => 21231,
		"user_id" => 26415,
		"work_status" => "European National"
	],
	[
		"id" => 21232,
		"user_id" => 26422,
		"work_status" => "0"
	],
	[
		"id" => 23728,
		"user_id" => 29292,
		"work_status" => "Non European National"
	],
	[
		"id" => 21234,
		"user_id" => 26426,
		"work_status" => "0"
	],
	[
		"id" => 22628,
		"user_id" => 28154,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24467,
		"user_id" => 30031,
		"work_status" => "Non European National"
	],
	[
		"id" => 21238,
		"user_id" => 26433,
		"work_status" => "0"
	],
	[
		"id" => 24420,
		"user_id" => 29984,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23862,
		"user_id" => 29426,
		"work_status" => "Non European National"
	],
	[
		"id" => 24567,
		"user_id" => 30131,
		"work_status" => "Non European National"
	],
	[
		"id" => 22054,
		"user_id" => 27580,
		"work_status" => "Non European National"
	],
	[
		"id" => 22754,
		"user_id" => 28280,
		"work_status" => "Non European National"
	],
	[
		"id" => 23808,
		"user_id" => 29372,
		"work_status" => "European National"
	],
	[
		"id" => 21245,
		"user_id" => 26446,
		"work_status" => "0"
	],
	[
		"id" => 21246,
		"user_id" => 26449,
		"work_status" => "0"
	],
	[
		"id" => 24772,
		"user_id" => 30336,
		"work_status" => "European National"
	],
	[
		"id" => 21248,
		"user_id" => 26453,
		"work_status" => "0"
	],
	[
		"id" => 21249,
		"user_id" => 26454,
		"work_status" => "European National"
	],
	[
		"id" => 24694,
		"user_id" => 30258,
		"work_status" => "European National"
	],
	[
		"id" => 21252,
		"user_id" => 26457,
		"work_status" => "European National"
	],
	[
		"id" => 21253,
		"user_id" => 26458,
		"work_status" => "0"
	],
	[
		"id" => 21255,
		"user_id" => 26462,
		"work_status" => "Non European National"
	],
	[
		"id" => 21256,
		"user_id" => 26463,
		"work_status" => "0"
	],
	[
		"id" => 21257,
		"user_id" => 26471,
		"work_status" => "0"
	],
	[
		"id" => 21259,
		"user_id" => 26476,
		"work_status" => "Non European National"
	],
	[
		"id" => 21260,
		"user_id" => 26477,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21262,
		"user_id" => 26451,
		"work_status" => "Non European National"
	],
	[
		"id" => 22472,
		"user_id" => 27998,
		"work_status" => "Non European National"
	],
	[
		"id" => 21264,
		"user_id" => 26479,
		"work_status" => "Non European National"
	],
	[
		"id" => 21265,
		"user_id" => 26482,
		"work_status" => "0"
	],
	[
		"id" => 23861,
		"user_id" => 29425,
		"work_status" => "European National"
	],
	[
		"id" => 21267,
		"user_id" => 26484,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21268,
		"user_id" => 26486,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21269,
		"user_id" => 26488,
		"work_status" => "European National"
	],
	[
		"id" => 21270,
		"user_id" => 26489,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21271,
		"user_id" => 26490,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23771,
		"user_id" => 29335,
		"work_status" => "European National"
	],
	[
		"id" => 23798,
		"user_id" => 29362,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21274,
		"user_id" => 26494,
		"work_status" => "0"
	],
	[
		"id" => 24958,
		"user_id" => 30530,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24959,
		"user_id" => 30531,
		"work_status" => "0"
	],
	[
		"id" => 24960,
		"user_id" => 30533,
		"work_status" => "European National"
	],
	[
		"id" => 21277,
		"user_id" => 26498,
		"work_status" => "European National"
	],
	[
		"id" => 22520,
		"user_id" => 28046,
		"work_status" => "Non European National"
	],
	[
		"id" => 21279,
		"user_id" => 26502,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22920,
		"user_id" => 28446,
		"work_status" => "Non European National"
	],
	[
		"id" => 21281,
		"user_id" => 26504,
		"work_status" => "0"
	],
	[
		"id" => 21282,
		"user_id" => 26509,
		"work_status" => "Non European National"
	],
	[
		"id" => 22420,
		"user_id" => 27946,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21285,
		"user_id" => 26513,
		"work_status" => "Non European National"
	],
	[
		"id" => 21286,
		"user_id" => 26515,
		"work_status" => "0"
	],
	[
		"id" => 21287,
		"user_id" => 26516,
		"work_status" => "0"
	],
	[
		"id" => 23752,
		"user_id" => 29316,
		"work_status" => "European National"
	],
	[
		"id" => 25803,
		"user_id" => 31922,
		"work_status" => "Non European National"
	],
	[
		"id" => 21290,
		"user_id" => 26518,
		"work_status" => "0"
	],
	[
		"id" => 21291,
		"user_id" => 26521,
		"work_status" => "European National"
	],
	[
		"id" => 21863,
		"user_id" => 27389,
		"work_status" => "European National"
	],
	[
		"id" => 21966,
		"user_id" => 27492,
		"work_status" => "Non European National"
	],
	[
		"id" => 24798,
		"user_id" => 30362,
		"work_status" => "Non European National"
	],
	[
		"id" => 21295,
		"user_id" => 26526,
		"work_status" => "0"
	],
	[
		"id" => 23625,
		"user_id" => 29189,
		"work_status" => "European National"
	],
	[
		"id" => 21297,
		"user_id" => 26529,
		"work_status" => "Non European National"
	],
	[
		"id" => 24498,
		"user_id" => 30062,
		"work_status" => "Non European National"
	],
	[
		"id" => 21299,
		"user_id" => 26531,
		"work_status" => "Non European National"
	],
	[
		"id" => 21300,
		"user_id" => 26534,
		"work_status" => "Non European National"
	],
	[
		"id" => 21301,
		"user_id" => 26536,
		"work_status" => "0"
	],
	[
		"id" => 21302,
		"user_id" => 26539,
		"work_status" => "Non European National"
	],
	[
		"id" => 21303,
		"user_id" => 26540,
		"work_status" => "European National"
	],
	[
		"id" => 24891,
		"user_id" => 30455,
		"work_status" => "Non European National"
	],
	[
		"id" => 21305,
		"user_id" => 26547,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21306,
		"user_id" => 26550,
		"work_status" => "0"
	],
	[
		"id" => 24454,
		"user_id" => 30018,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21308,
		"user_id" => 26553,
		"work_status" => "0"
	],
	[
		"id" => 21309,
		"user_id" => 26557,
		"work_status" => "Non European National"
	],
	[
		"id" => 21310,
		"user_id" => 26559,
		"work_status" => "0"
	],
	[
		"id" => 21311,
		"user_id" => 26561,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24670,
		"user_id" => 30234,
		"work_status" => "European National"
	],
	[
		"id" => 21635,
		"user_id" => 27058,
		"work_status" => "Non European National"
	],
	[
		"id" => 21314,
		"user_id" => 26566,
		"work_status" => "Non European National"
	],
	[
		"id" => 22011,
		"user_id" => 27537,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21316,
		"user_id" => 26564,
		"work_status" => "Non European National"
	],
	[
		"id" => 23693,
		"user_id" => 29257,
		"work_status" => "Non European National"
	],
	[
		"id" => 21319,
		"user_id" => 26569,
		"work_status" => "European National"
	],
	[
		"id" => 21320,
		"user_id" => 26571,
		"work_status" => "European National"
	],
	[
		"id" => 21322,
		"user_id" => 26573,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21323,
		"user_id" => 26574,
		"work_status" => "0"
	],
	[
		"id" => 23117,
		"user_id" => 28643,
		"work_status" => "Non European National"
	],
	[
		"id" => 21325,
		"user_id" => 26576,
		"work_status" => "0"
	],
	[
		"id" => 21326,
		"user_id" => 26579,
		"work_status" => "0"
	],
	[
		"id" => 21328,
		"user_id" => 26582,
		"work_status" => "European National"
	],
	[
		"id" => 22848,
		"user_id" => 28374,
		"work_status" => "Non European National"
	],
	[
		"id" => 21332,
		"user_id" => 26586,
		"work_status" => "0"
	],
	[
		"id" => 21333,
		"user_id" => 26587,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21334,
		"user_id" => 26588,
		"work_status" => "Non European National"
	],
	[
		"id" => 21335,
		"user_id" => 26589,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21337,
		"user_id" => 26591,
		"work_status" => "European National"
	],
	[
		"id" => 21338,
		"user_id" => 26592,
		"work_status" => "Non European National"
	],
	[
		"id" => 22237,
		"user_id" => 27763,
		"work_status" => "Non European National"
	],
	[
		"id" => 23606,
		"user_id" => 29170,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21770,
		"user_id" => 27296,
		"work_status" => "Non European National"
	],
	[
		"id" => 21344,
		"user_id" => 26603,
		"work_status" => "Non European National"
	],
	[
		"id" => 21346,
		"user_id" => 26608,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21347,
		"user_id" => 26610,
		"work_status" => "0"
	],
	[
		"id" => 21766,
		"user_id" => 27292,
		"work_status" => "Non European National"
	],
	[
		"id" => 24464,
		"user_id" => 30028,
		"work_status" => "European National"
	],
	[
		"id" => 21351,
		"user_id" => 26614,
		"work_status" => "Non European National"
	],
	[
		"id" => 21352,
		"user_id" => 26616,
		"work_status" => "Non European National"
	],
	[
		"id" => 24410,
		"user_id" => 29974,
		"work_status" => "European National"
	],
	[
		"id" => 21354,
		"user_id" => 26619,
		"work_status" => "Non European National"
	],
	[
		"id" => 21355,
		"user_id" => 26620,
		"work_status" => "European National"
	],
	[
		"id" => 23773,
		"user_id" => 29337,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21359,
		"user_id" => 26623,
		"work_status" => "Non European National"
	],
	[
		"id" => 21360,
		"user_id" => 26625,
		"work_status" => "European National"
	],
	[
		"id" => 22325,
		"user_id" => 27851,
		"work_status" => "European National"
	],
	[
		"id" => 23732,
		"user_id" => 29296,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21363,
		"user_id" => 26630,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21364,
		"user_id" => 26631,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24459,
		"user_id" => 30023,
		"work_status" => "Non European National"
	],
	[
		"id" => 23376,
		"user_id" => 28917,
		"work_status" => "European National"
	],
	[
		"id" => 21367,
		"user_id" => 26633,
		"work_status" => "0"
	],
	[
		"id" => 21368,
		"user_id" => 26635,
		"work_status" => "Non European National"
	],
	[
		"id" => 22705,
		"user_id" => 28231,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21370,
		"user_id" => 26640,
		"work_status" => "Non European National"
	],
	[
		"id" => 23510,
		"user_id" => 29074,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22560,
		"user_id" => 28086,
		"work_status" => "European National"
	],
	[
		"id" => 21373,
		"user_id" => 26646,
		"work_status" => "0"
	],
	[
		"id" => 24720,
		"user_id" => 30284,
		"work_status" => "European National"
	],
	[
		"id" => 21375,
		"user_id" => 26648,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21376,
		"user_id" => 26649,
		"work_status" => "European National"
	],
	[
		"id" => 22029,
		"user_id" => 27555,
		"work_status" => "Non European National"
	],
	[
		"id" => 23812,
		"user_id" => 29376,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25785,
		"user_id" => 31904,
		"work_status" => "Non European National"
	],
	[
		"id" => 24551,
		"user_id" => 30115,
		"work_status" => "European National"
	],
	[
		"id" => 21383,
		"user_id" => 26660,
		"work_status" => "0"
	],
	[
		"id" => 21384,
		"user_id" => 26662,
		"work_status" => "Non European National"
	],
	[
		"id" => 21385,
		"user_id" => 26663,
		"work_status" => "European National"
	],
	[
		"id" => 21386,
		"user_id" => 26664,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23565,
		"user_id" => 29129,
		"work_status" => "Non European National"
	],
	[
		"id" => 21388,
		"user_id" => 26666,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27365,
		"user_id" => 34118,
		"work_status" => "Non European National"
	],
	[
		"id" => 21541,
		"user_id" => 26905,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21391,
		"user_id" => 26669,
		"work_status" => "0"
	],
	[
		"id" => 21392,
		"user_id" => 26670,
		"work_status" => "0"
	],
	[
		"id" => 23800,
		"user_id" => 29364,
		"work_status" => "Non European National"
	],
	[
		"id" => 23026,
		"user_id" => 28552,
		"work_status" => "Non European National"
	],
	[
		"id" => 21395,
		"user_id" => 26674,
		"work_status" => "0"
	],
	[
		"id" => 21396,
		"user_id" => 26675,
		"work_status" => "0"
	],
	[
		"id" => 21397,
		"user_id" => 26676,
		"work_status" => "European National"
	],
	[
		"id" => 23905,
		"user_id" => 29469,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24534,
		"user_id" => 30098,
		"work_status" => "European National"
	],
	[
		"id" => 23578,
		"user_id" => 29142,
		"work_status" => "Non European National"
	],
	[
		"id" => 27029,
		"user_id" => 33645,
		"work_status" => "0"
	],
	[
		"id" => 21402,
		"user_id" => 26421,
		"work_status" => "0"
	],
	[
		"id" => 23598,
		"user_id" => 29162,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26481,
		"user_id" => 32887,
		"work_status" => "Non European National"
	],
	[
		"id" => 21405,
		"user_id" => 26688,
		"work_status" => "0"
	],
	[
		"id" => 21406,
		"user_id" => 26689,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21407,
		"user_id" => 26691,
		"work_status" => "0"
	],
	[
		"id" => 24901,
		"user_id" => 30465,
		"work_status" => "Non European National"
	],
	[
		"id" => 22604,
		"user_id" => 28130,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21411,
		"user_id" => 26697,
		"work_status" => "Non European National"
	],
	[
		"id" => 21412,
		"user_id" => 26698,
		"work_status" => "0"
	],
	[
		"id" => 21413,
		"user_id" => 26700,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21417,
		"user_id" => 26704,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21419,
		"user_id" => 26707,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21420,
		"user_id" => 26710,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21421,
		"user_id" => 26712,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24484,
		"user_id" => 30048,
		"work_status" => "Non European National"
	],
	[
		"id" => 21423,
		"user_id" => 26709,
		"work_status" => "Non European National"
	],
	[
		"id" => 21424,
		"user_id" => 26718,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21425,
		"user_id" => 26719,
		"work_status" => "European National"
	],
	[
		"id" => 23123,
		"user_id" => 28649,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21427,
		"user_id" => 26724,
		"work_status" => "0"
	],
	[
		"id" => 22789,
		"user_id" => 28315,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23626,
		"user_id" => 29190,
		"work_status" => "Non European National"
	],
	[
		"id" => 23206,
		"user_id" => 28732,
		"work_status" => "Non European National"
	],
	[
		"id" => 21431,
		"user_id" => 26728,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21432,
		"user_id" => 26729,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21433,
		"user_id" => 26730,
		"work_status" => "0"
	],
	[
		"id" => 21434,
		"user_id" => 26731,
		"work_status" => "European National"
	],
	[
		"id" => 21437,
		"user_id" => 26738,
		"work_status" => "European National"
	],
	[
		"id" => 23017,
		"user_id" => 28543,
		"work_status" => "Non European National"
	],
	[
		"id" => 21440,
		"user_id" => 26739,
		"work_status" => "Non European National"
	],
	[
		"id" => 22892,
		"user_id" => 28418,
		"work_status" => "European National"
	],
	[
		"id" => 23172,
		"user_id" => 28698,
		"work_status" => "European National"
	],
	[
		"id" => 21443,
		"user_id" => 26747,
		"work_status" => "0"
	],
	[
		"id" => 24602,
		"user_id" => 30166,
		"work_status" => "European National"
	],
	[
		"id" => 21445,
		"user_id" => 26749,
		"work_status" => "Non European National"
	],
	[
		"id" => 22545,
		"user_id" => 28071,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24654,
		"user_id" => 30218,
		"work_status" => "Non European National"
	],
	[
		"id" => 21453,
		"user_id" => 26760,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22592,
		"user_id" => 28118,
		"work_status" => "Non European National"
	],
	[
		"id" => 21452,
		"user_id" => 26758,
		"work_status" => "European National"
	],
	[
		"id" => 22675,
		"user_id" => 28201,
		"work_status" => "Non European National"
	],
	[
		"id" => 21456,
		"user_id" => 25946,
		"work_status" => "European National"
	],
	[
		"id" => 21457,
		"user_id" => 26765,
		"work_status" => "Non European National"
	],
	[
		"id" => 21458,
		"user_id" => 26766,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22821,
		"user_id" => 28347,
		"work_status" => "Non European National"
	],
	[
		"id" => 23637,
		"user_id" => 29201,
		"work_status" => "European National"
	],
	[
		"id" => 21462,
		"user_id" => 26768,
		"work_status" => "0"
	],
	[
		"id" => 24651,
		"user_id" => 30215,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21464,
		"user_id" => 26771,
		"work_status" => "European National"
	],
	[
		"id" => 21467,
		"user_id" => 26774,
		"work_status" => "Non European National"
	],
	[
		"id" => 21469,
		"user_id" => 26777,
		"work_status" => "European National"
	],
	[
		"id" => 21470,
		"user_id" => 26776,
		"work_status" => "Non European National"
	],
	[
		"id" => 21471,
		"user_id" => 26780,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24542,
		"user_id" => 30106,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23669,
		"user_id" => 29233,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21476,
		"user_id" => 26787,
		"work_status" => "Non European National"
	],
	[
		"id" => 21477,
		"user_id" => 26789,
		"work_status" => "European National"
	],
	[
		"id" => 21478,
		"user_id" => 26788,
		"work_status" => "Non European National"
	],
	[
		"id" => 21480,
		"user_id" => 26792,
		"work_status" => "Non European National"
	],
	[
		"id" => 22475,
		"user_id" => 28001,
		"work_status" => "European National"
	],
	[
		"id" => 21483,
		"user_id" => 26799,
		"work_status" => "European National"
	],
	[
		"id" => 21484,
		"user_id" => 26801,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21486,
		"user_id" => 26803,
		"work_status" => "Non European National"
	],
	[
		"id" => 21487,
		"user_id" => 26798,
		"work_status" => "Non European National"
	],
	[
		"id" => 21488,
		"user_id" => 26808,
		"work_status" => "European National"
	],
	[
		"id" => 21489,
		"user_id" => 26810,
		"work_status" => "European National"
	],
	[
		"id" => 21490,
		"user_id" => 26812,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23813,
		"user_id" => 29377,
		"work_status" => "European National"
	],
	[
		"id" => 27085,
		"user_id" => 33718,
		"work_status" => "0"
	],
	[
		"id" => 27086,
		"user_id" => 33714,
		"work_status" => "European National"
	],
	[
		"id" => 27087,
		"user_id" => 33720,
		"work_status" => "European National"
	],
	[
		"id" => 21494,
		"user_id" => 26820,
		"work_status" => "Non European National"
	],
	[
		"id" => 21496,
		"user_id" => 26823,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21497,
		"user_id" => 26828,
		"work_status" => "0"
	],
	[
		"id" => 22667,
		"user_id" => 28193,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22617,
		"user_id" => 28143,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22274,
		"user_id" => 27800,
		"work_status" => "Non European National"
	],
	[
		"id" => 21501,
		"user_id" => 26832,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21502,
		"user_id" => 26834,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21503,
		"user_id" => 26836,
		"work_status" => "Non European National"
	],
	[
		"id" => 21505,
		"user_id" => 26843,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21506,
		"user_id" => 26844,
		"work_status" => "Non European National"
	],
	[
		"id" => 25816,
		"user_id" => 31935,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21508,
		"user_id" => 26570,
		"work_status" => "0"
	],
	[
		"id" => 21510,
		"user_id" => 26850,
		"work_status" => "European National"
	],
	[
		"id" => 21511,
		"user_id" => 26851,
		"work_status" => "Non European National"
	],
	[
		"id" => 23707,
		"user_id" => 29271,
		"work_status" => "European National"
	],
	[
		"id" => 21513,
		"user_id" => 26856,
		"work_status" => "Non European National"
	],
	[
		"id" => 21514,
		"user_id" => 26857,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21515,
		"user_id" => 26859,
		"work_status" => "Non European National"
	],
	[
		"id" => 21516,
		"user_id" => 26860,
		"work_status" => "0"
	],
	[
		"id" => 21517,
		"user_id" => 26862,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21518,
		"user_id" => 26863,
		"work_status" => "Non European National"
	],
	[
		"id" => 21519,
		"user_id" => 26864,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21520,
		"user_id" => 26865,
		"work_status" => "0"
	],
	[
		"id" => 21521,
		"user_id" => 26866,
		"work_status" => "Non European National"
	],
	[
		"id" => 23757,
		"user_id" => 29321,
		"work_status" => "Non European National"
	],
	[
		"id" => 21529,
		"user_id" => 26877,
		"work_status" => "European National"
	],
	[
		"id" => 21530,
		"user_id" => 26883,
		"work_status" => "European National"
	],
	[
		"id" => 21531,
		"user_id" => 26886,
		"work_status" => "Non European National"
	],
	[
		"id" => 21532,
		"user_id" => 26887,
		"work_status" => "Non European National"
	],
	[
		"id" => 23463,
		"user_id" => 29027,
		"work_status" => "European National"
	],
	[
		"id" => 21534,
		"user_id" => 26893,
		"work_status" => "0"
	],
	[
		"id" => 21535,
		"user_id" => 26895,
		"work_status" => "0"
	],
	[
		"id" => 21536,
		"user_id" => 26841,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21537,
		"user_id" => 26897,
		"work_status" => "0"
	],
	[
		"id" => 22799,
		"user_id" => 28325,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21539,
		"user_id" => 26901,
		"work_status" => "European National"
	],
	[
		"id" => 23571,
		"user_id" => 29135,
		"work_status" => "Non European National"
	],
	[
		"id" => 21757,
		"user_id" => 27283,
		"work_status" => "Non European National"
	],
	[
		"id" => 21543,
		"user_id" => 26900,
		"work_status" => "0"
	],
	[
		"id" => 23611,
		"user_id" => 29175,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21545,
		"user_id" => 26913,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21546,
		"user_id" => 26915,
		"work_status" => "Non European National"
	],
	[
		"id" => 25815,
		"user_id" => 31934,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26347,
		"user_id" => 32711,
		"work_status" => "Non European National"
	],
	[
		"id" => 24730,
		"user_id" => 30294,
		"work_status" => "Non European National"
	],
	[
		"id" => 21555,
		"user_id" => 26926,
		"work_status" => "0"
	],
	[
		"id" => 21556,
		"user_id" => 26928,
		"work_status" => "0"
	],
	[
		"id" => 21557,
		"user_id" => 26929,
		"work_status" => "Non European National"
	],
	[
		"id" => 21559,
		"user_id" => 26931,
		"work_status" => "Non European National"
	],
	[
		"id" => 21560,
		"user_id" => 26932,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21561,
		"user_id" => 26933,
		"work_status" => "0"
	],
	[
		"id" => 21562,
		"user_id" => 26934,
		"work_status" => "0"
	],
	[
		"id" => 21563,
		"user_id" => 26935,
		"work_status" => "0"
	],
	[
		"id" => 21564,
		"user_id" => 26936,
		"work_status" => "Non European National"
	],
	[
		"id" => 21565,
		"user_id" => 26937,
		"work_status" => "0"
	],
	[
		"id" => 21570,
		"user_id" => 26950,
		"work_status" => "0"
	],
	[
		"id" => 21571,
		"user_id" => 26952,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21572,
		"user_id" => 26953,
		"work_status" => "European National"
	],
	[
		"id" => 21573,
		"user_id" => 26954,
		"work_status" => "European National"
	],
	[
		"id" => 24709,
		"user_id" => 30273,
		"work_status" => "Non European National"
	],
	[
		"id" => 22576,
		"user_id" => 28102,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21576,
		"user_id" => 26963,
		"work_status" => "0"
	],
	[
		"id" => 21577,
		"user_id" => 26969,
		"work_status" => "Non European National"
	],
	[
		"id" => 22678,
		"user_id" => 28204,
		"work_status" => "Non European National"
	],
	[
		"id" => 21579,
		"user_id" => 26508,
		"work_status" => "0"
	],
	[
		"id" => 23338,
		"user_id" => 28867,
		"work_status" => "0"
	],
	[
		"id" => 23339,
		"user_id" => 28869,
		"work_status" => "Non European National"
	],
	[
		"id" => 23187,
		"user_id" => 28713,
		"work_status" => "Non European National"
	],
	[
		"id" => 21583,
		"user_id" => 26977,
		"work_status" => "0"
	],
	[
		"id" => 21584,
		"user_id" => 26978,
		"work_status" => "Non European National"
	],
	[
		"id" => 24455,
		"user_id" => 30019,
		"work_status" => "Non European National"
	],
	[
		"id" => 21587,
		"user_id" => 26983,
		"work_status" => "0"
	],
	[
		"id" => 21588,
		"user_id" => 26984,
		"work_status" => "Non European National"
	],
	[
		"id" => 21590,
		"user_id" => 26961,
		"work_status" => "Non European National"
	],
	[
		"id" => 27467,
		"user_id" => 34280,
		"work_status" => "0"
	],
	[
		"id" => 21592,
		"user_id" => 26967,
		"work_status" => "0"
	],
	[
		"id" => 21594,
		"user_id" => 26995,
		"work_status" => "European National"
	],
	[
		"id" => 21596,
		"user_id" => 26996,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21597,
		"user_id" => 27003,
		"work_status" => "0"
	],
	[
		"id" => 21598,
		"user_id" => 27005,
		"work_status" => "Non European National"
	],
	[
		"id" => 21600,
		"user_id" => 26957,
		"work_status" => "0"
	],
	[
		"id" => 21601,
		"user_id" => 26737,
		"work_status" => "European National"
	],
	[
		"id" => 22388,
		"user_id" => 27914,
		"work_status" => "European National"
	],
	[
		"id" => 21603,
		"user_id" => 27009,
		"work_status" => "Non European National"
	],
	[
		"id" => 21604,
		"user_id" => 27011,
		"work_status" => "0"
	],
	[
		"id" => 21605,
		"user_id" => 27013,
		"work_status" => "0"
	],
	[
		"id" => 23668,
		"user_id" => 29232,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24790,
		"user_id" => 30354,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21609,
		"user_id" => 27018,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21610,
		"user_id" => 27020,
		"work_status" => "European National"
	],
	[
		"id" => 21612,
		"user_id" => 27023,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21614,
		"user_id" => 27026,
		"work_status" => "Non European National"
	],
	[
		"id" => 21616,
		"user_id" => 27028,
		"work_status" => "0"
	],
	[
		"id" => 21617,
		"user_id" => 27029,
		"work_status" => "0"
	],
	[
		"id" => 21618,
		"user_id" => 27031,
		"work_status" => "0"
	],
	[
		"id" => 23789,
		"user_id" => 29353,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21621,
		"user_id" => 27034,
		"work_status" => "European National"
	],
	[
		"id" => 24479,
		"user_id" => 30043,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21625,
		"user_id" => 27040,
		"work_status" => "Non European National"
	],
	[
		"id" => 21627,
		"user_id" => 20855,
		"work_status" => "0"
	],
	[
		"id" => 24417,
		"user_id" => 29981,
		"work_status" => "Non European National"
	],
	[
		"id" => 21629,
		"user_id" => 27043,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21631,
		"user_id" => 27046,
		"work_status" => "0"
	],
	[
		"id" => 27460,
		"user_id" => 34261,
		"work_status" => "European National"
	],
	[
		"id" => 21637,
		"user_id" => 27065,
		"work_status" => "0"
	],
	[
		"id" => 24932,
		"user_id" => 30493,
		"work_status" => "European National"
	],
	[
		"id" => 21639,
		"user_id" => 27069,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21640,
		"user_id" => 27073,
		"work_status" => "0"
	],
	[
		"id" => 21641,
		"user_id" => 27076,
		"work_status" => "Non European National"
	],
	[
		"id" => 21642,
		"user_id" => 27077,
		"work_status" => "0"
	],
	[
		"id" => 21643,
		"user_id" => 27078,
		"work_status" => "European National"
	],
	[
		"id" => 21644,
		"user_id" => 27079,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23489,
		"user_id" => 29053,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21646,
		"user_id" => 27082,
		"work_status" => "European National"
	],
	[
		"id" => 21648,
		"user_id" => 27092,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21649,
		"user_id" => 27074,
		"work_status" => "European National"
	],
	[
		"id" => 21650,
		"user_id" => 27096,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21652,
		"user_id" => 27101,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21653,
		"user_id" => 27103,
		"work_status" => "0"
	],
	[
		"id" => 21654,
		"user_id" => 27106,
		"work_status" => "Non European National"
	],
	[
		"id" => 21660,
		"user_id" => 27114,
		"work_status" => "European National"
	],
	[
		"id" => 21661,
		"user_id" => 27115,
		"work_status" => "0"
	],
	[
		"id" => 24491,
		"user_id" => 30055,
		"work_status" => "Non European National"
	],
	[
		"id" => 26440,
		"user_id" => 32833,
		"work_status" => "Non European National"
	],
	[
		"id" => 21664,
		"user_id" => 27121,
		"work_status" => "0"
	],
	[
		"id" => 21665,
		"user_id" => 27123,
		"work_status" => "0"
	],
	[
		"id" => 21666,
		"user_id" => 27124,
		"work_status" => "0"
	],
	[
		"id" => 21667,
		"user_id" => 27126,
		"work_status" => "0"
	],
	[
		"id" => 21668,
		"user_id" => 27128,
		"work_status" => "0"
	],
	[
		"id" => 21669,
		"user_id" => 27130,
		"work_status" => "Non European National"
	],
	[
		"id" => 24553,
		"user_id" => 30117,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21671,
		"user_id" => 27133,
		"work_status" => "0"
	],
	[
		"id" => 21672,
		"user_id" => 27134,
		"work_status" => "Non European National"
	],
	[
		"id" => 21673,
		"user_id" => 27061,
		"work_status" => "Non European National"
	],
	[
		"id" => 21675,
		"user_id" => 27132,
		"work_status" => "Non European National"
	],
	[
		"id" => 25152,
		"user_id" => 30849,
		"work_status" => "Non European National"
	],
	[
		"id" => 21678,
		"user_id" => 27140,
		"work_status" => "European National"
	],
	[
		"id" => 21681,
		"user_id" => 27145,
		"work_status" => "0"
	],
	[
		"id" => 21682,
		"user_id" => 27148,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21683,
		"user_id" => 27152,
		"work_status" => "Non European National"
	],
	[
		"id" => 21686,
		"user_id" => 27158,
		"work_status" => "European National"
	],
	[
		"id" => 21687,
		"user_id" => 27162,
		"work_status" => "0"
	],
	[
		"id" => 21688,
		"user_id" => 27163,
		"work_status" => "Non European National"
	],
	[
		"id" => 21691,
		"user_id" => 27170,
		"work_status" => "European National"
	],
	[
		"id" => 21692,
		"user_id" => 26604,
		"work_status" => "European National"
	],
	[
		"id" => 21693,
		"user_id" => 27172,
		"work_status" => "Non European National"
	],
	[
		"id" => 21694,
		"user_id" => 27175,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21695,
		"user_id" => 27129,
		"work_status" => "0"
	],
	[
		"id" => 21696,
		"user_id" => 27176,
		"work_status" => "European National"
	],
	[
		"id" => 23020,
		"user_id" => 28546,
		"work_status" => "Non European National"
	],
	[
		"id" => 21699,
		"user_id" => 27181,
		"work_status" => "European National"
	],
	[
		"id" => 24748,
		"user_id" => 30312,
		"work_status" => "Non European National"
	],
	[
		"id" => 21702,
		"user_id" => 27187,
		"work_status" => "0"
	],
	[
		"id" => 21703,
		"user_id" => 27191,
		"work_status" => "0"
	],
	[
		"id" => 21979,
		"user_id" => 27505,
		"work_status" => "Non European National"
	],
	[
		"id" => 21705,
		"user_id" => 27195,
		"work_status" => "0"
	],
	[
		"id" => 21706,
		"user_id" => 27201,
		"work_status" => "European National"
	],
	[
		"id" => 21707,
		"user_id" => 27205,
		"work_status" => "0"
	],
	[
		"id" => 21708,
		"user_id" => 27206,
		"work_status" => "European National"
	],
	[
		"id" => 21713,
		"user_id" => 27212,
		"work_status" => "0"
	],
	[
		"id" => 23900,
		"user_id" => 29464,
		"work_status" => "Non European National"
	],
	[
		"id" => 21715,
		"user_id" => 27190,
		"work_status" => "European National"
	],
	[
		"id" => 21716,
		"user_id" => 27216,
		"work_status" => "European National"
	],
	[
		"id" => 21717,
		"user_id" => 27217,
		"work_status" => "European National"
	],
	[
		"id" => 21718,
		"user_id" => 19319,
		"work_status" => "Non European National"
	],
	[
		"id" => 21719,
		"user_id" => 27219,
		"work_status" => "0"
	],
	[
		"id" => 21923,
		"user_id" => 27449,
		"work_status" => "Non European National"
	],
	[
		"id" => 21721,
		"user_id" => 27223,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23569,
		"user_id" => 29133,
		"work_status" => "Non European National"
	],
	[
		"id" => 21723,
		"user_id" => 27225,
		"work_status" => "Non European National"
	],
	[
		"id" => 21724,
		"user_id" => 27226,
		"work_status" => "Non European National"
	],
	[
		"id" => 21725,
		"user_id" => 27230,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24606,
		"user_id" => 30170,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21727,
		"user_id" => 27236,
		"work_status" => "0"
	],
	[
		"id" => 21728,
		"user_id" => 27238,
		"work_status" => "European National"
	],
	[
		"id" => 21730,
		"user_id" => 27240,
		"work_status" => "Non European National"
	],
	[
		"id" => 26901,
		"user_id" => 33500,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23446,
		"user_id" => 29010,
		"work_status" => "Non European National"
	],
	[
		"id" => 23447,
		"user_id" => 29011,
		"work_status" => "Non European National"
	],
	[
		"id" => 21734,
		"user_id" => 27247,
		"work_status" => "Non European National"
	],
	[
		"id" => 21735,
		"user_id" => 27248,
		"work_status" => "European National"
	],
	[
		"id" => 24884,
		"user_id" => 30448,
		"work_status" => "Non European National"
	],
	[
		"id" => 22891,
		"user_id" => 28417,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21792,
		"user_id" => 27318,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21738,
		"user_id" => 27252,
		"work_status" => "0"
	],
	[
		"id" => 23712,
		"user_id" => 29276,
		"work_status" => "Non European National"
	],
	[
		"id" => 21740,
		"user_id" => 27257,
		"work_status" => "Non European National"
	],
	[
		"id" => 21741,
		"user_id" => 27260,
		"work_status" => "0"
	],
	[
		"id" => 21742,
		"user_id" => 27261,
		"work_status" => "0"
	],
	[
		"id" => 21743,
		"user_id" => 27254,
		"work_status" => "Non European National"
	],
	[
		"id" => 21744,
		"user_id" => 27266,
		"work_status" => "European National"
	],
	[
		"id" => 21745,
		"user_id" => 27267,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 22207,
		"user_id" => 27733,
		"work_status" => "Non European National"
	],
	[
		"id" => 23481,
		"user_id" => 29045,
		"work_status" => "Non European National"
	],
	[
		"id" => 21747,
		"user_id" => 27272,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21748,
		"user_id" => 27273,
		"work_status" => "European National"
	],
	[
		"id" => 21749,
		"user_id" => 27274,
		"work_status" => "0"
	],
	[
		"id" => 23876,
		"user_id" => 29440,
		"work_status" => "European National"
	],
	[
		"id" => 21751,
		"user_id" => 27264,
		"work_status" => "European National"
	],
	[
		"id" => 23052,
		"user_id" => 28578,
		"work_status" => "Non European National"
	],
	[
		"id" => 21754,
		"user_id" => 27278,
		"work_status" => "0"
	],
	[
		"id" => 23448,
		"user_id" => 29012,
		"work_status" => "Non European National"
	],
	[
		"id" => 23449,
		"user_id" => 29013,
		"work_status" => "Non European National"
	],
	[
		"id" => 23453,
		"user_id" => 29017,
		"work_status" => "Non European National"
	],
	[
		"id" => 23459,
		"user_id" => 29023,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23462,
		"user_id" => 29026,
		"work_status" => "Non European National"
	],
	[
		"id" => 23465,
		"user_id" => 29029,
		"work_status" => "Non European National"
	],
	[
		"id" => 21794,
		"user_id" => 27320,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21795,
		"user_id" => 27321,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21796,
		"user_id" => 27322,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21797,
		"user_id" => 27323,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21798,
		"user_id" => 27324,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21799,
		"user_id" => 27325,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21800,
		"user_id" => 27326,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21801,
		"user_id" => 27327,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21802,
		"user_id" => 27328,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21803,
		"user_id" => 27329,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21804,
		"user_id" => 27330,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21805,
		"user_id" => 27331,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21806,
		"user_id" => 27332,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21807,
		"user_id" => 27333,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21808,
		"user_id" => 27334,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21809,
		"user_id" => 27335,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21810,
		"user_id" => 27336,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21811,
		"user_id" => 27337,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21812,
		"user_id" => 27338,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21813,
		"user_id" => 27339,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21814,
		"user_id" => 27340,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21815,
		"user_id" => 27341,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21816,
		"user_id" => 27342,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21817,
		"user_id" => 27343,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21818,
		"user_id" => 27344,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21819,
		"user_id" => 27345,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21820,
		"user_id" => 27346,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21821,
		"user_id" => 27347,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21822,
		"user_id" => 27348,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21823,
		"user_id" => 27349,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21824,
		"user_id" => 27350,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21825,
		"user_id" => 27351,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 21826,
		"user_id" => 27352,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23467,
		"user_id" => 29031,
		"work_status" => "Non European National"
	],
	[
		"id" => 23469,
		"user_id" => 29033,
		"work_status" => "Non European National"
	],
	[
		"id" => 23471,
		"user_id" => 29035,
		"work_status" => "European National"
	],
	[
		"id" => 23476,
		"user_id" => 29040,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26832,
		"user_id" => 33402,
		"work_status" => "Non European National"
	],
	[
		"id" => 23483,
		"user_id" => 29047,
		"work_status" => "Non European National"
	],
	[
		"id" => 23485,
		"user_id" => 29049,
		"work_status" => "Non European National"
	],
	[
		"id" => 23488,
		"user_id" => 29052,
		"work_status" => "European National"
	],
	[
		"id" => 23490,
		"user_id" => 29054,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23493,
		"user_id" => 29057,
		"work_status" => "European National"
	],
	[
		"id" => 23504,
		"user_id" => 29068,
		"work_status" => "Non European National"
	],
	[
		"id" => 23505,
		"user_id" => 29069,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23507,
		"user_id" => 29071,
		"work_status" => "European National"
	],
	[
		"id" => 23512,
		"user_id" => 29076,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23515,
		"user_id" => 29079,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23521,
		"user_id" => 29085,
		"work_status" => "European National"
	],
	[
		"id" => 23522,
		"user_id" => 29086,
		"work_status" => "European National"
	],
	[
		"id" => 23523,
		"user_id" => 29087,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23526,
		"user_id" => 29090,
		"work_status" => "European National"
	],
	[
		"id" => 23529,
		"user_id" => 29093,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23530,
		"user_id" => 29094,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23534,
		"user_id" => 29098,
		"work_status" => "Non European National"
	],
	[
		"id" => 23541,
		"user_id" => 29105,
		"work_status" => "Non European National"
	],
	[
		"id" => 23544,
		"user_id" => 29108,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23548,
		"user_id" => 29112,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23553,
		"user_id" => 29117,
		"work_status" => "Non European National"
	],
	[
		"id" => 23557,
		"user_id" => 29121,
		"work_status" => "Non European National"
	],
	[
		"id" => 23560,
		"user_id" => 29124,
		"work_status" => "European National"
	],
	[
		"id" => 23562,
		"user_id" => 29126,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23566,
		"user_id" => 29130,
		"work_status" => "European National"
	],
	[
		"id" => 23570,
		"user_id" => 29134,
		"work_status" => "European National"
	],
	[
		"id" => 23575,
		"user_id" => 29139,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23576,
		"user_id" => 29140,
		"work_status" => "European National"
	],
	[
		"id" => 23583,
		"user_id" => 29147,
		"work_status" => "European National"
	],
	[
		"id" => 23585,
		"user_id" => 29149,
		"work_status" => "European National"
	],
	[
		"id" => 23586,
		"user_id" => 29150,
		"work_status" => "Non European National"
	],
	[
		"id" => 23591,
		"user_id" => 29155,
		"work_status" => "European National"
	],
	[
		"id" => 23593,
		"user_id" => 29157,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23599,
		"user_id" => 29163,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23600,
		"user_id" => 29164,
		"work_status" => "Non European National"
	],
	[
		"id" => 23602,
		"user_id" => 29166,
		"work_status" => "Non European National"
	],
	[
		"id" => 23609,
		"user_id" => 29173,
		"work_status" => "Non European National"
	],
	[
		"id" => 23615,
		"user_id" => 29179,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23617,
		"user_id" => 29181,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23618,
		"user_id" => 29182,
		"work_status" => "European National"
	],
	[
		"id" => 23620,
		"user_id" => 29184,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26448,
		"user_id" => 32847,
		"work_status" => "Non European National"
	],
	[
		"id" => 23630,
		"user_id" => 29194,
		"work_status" => "Non European National"
	],
	[
		"id" => 23633,
		"user_id" => 29197,
		"work_status" => "Non European National"
	],
	[
		"id" => 23640,
		"user_id" => 29204,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23647,
		"user_id" => 29211,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23650,
		"user_id" => 29214,
		"work_status" => "European National"
	],
	[
		"id" => 23652,
		"user_id" => 29216,
		"work_status" => "European National"
	],
	[
		"id" => 23654,
		"user_id" => 29218,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23656,
		"user_id" => 29220,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23661,
		"user_id" => 29225,
		"work_status" => "Non European National"
	],
	[
		"id" => 23666,
		"user_id" => 29230,
		"work_status" => "European National"
	],
	[
		"id" => 23667,
		"user_id" => 29231,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23683,
		"user_id" => 29247,
		"work_status" => "European National"
	],
	[
		"id" => 23685,
		"user_id" => 29249,
		"work_status" => "European National"
	],
	[
		"id" => 23695,
		"user_id" => 29259,
		"work_status" => "European National"
	],
	[
		"id" => 23697,
		"user_id" => 29261,
		"work_status" => "European National"
	],
	[
		"id" => 23700,
		"user_id" => 29264,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23702,
		"user_id" => 29266,
		"work_status" => "Non European National"
	],
	[
		"id" => 23703,
		"user_id" => 29267,
		"work_status" => "European National"
	],
	[
		"id" => 23705,
		"user_id" => 29269,
		"work_status" => "Non European National"
	],
	[
		"id" => 23711,
		"user_id" => 29275,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23717,
		"user_id" => 29281,
		"work_status" => "Non European National"
	],
	[
		"id" => 23721,
		"user_id" => 29285,
		"work_status" => "Non European National"
	],
	[
		"id" => 23726,
		"user_id" => 29290,
		"work_status" => "European National"
	],
	[
		"id" => 23730,
		"user_id" => 29294,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23731,
		"user_id" => 29295,
		"work_status" => "Non European National"
	],
	[
		"id" => 23734,
		"user_id" => 29298,
		"work_status" => "European National"
	],
	[
		"id" => 23738,
		"user_id" => 29302,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23739,
		"user_id" => 29303,
		"work_status" => "Non European National"
	],
	[
		"id" => 23742,
		"user_id" => 29306,
		"work_status" => "Non European National"
	],
	[
		"id" => 23749,
		"user_id" => 29313,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23754,
		"user_id" => 29318,
		"work_status" => "European National"
	],
	[
		"id" => 23758,
		"user_id" => 29322,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23762,
		"user_id" => 29326,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23765,
		"user_id" => 29329,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23768,
		"user_id" => 29332,
		"work_status" => "European National"
	],
	[
		"id" => 23774,
		"user_id" => 29338,
		"work_status" => "Non European National"
	],
	[
		"id" => 23776,
		"user_id" => 29340,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23779,
		"user_id" => 29343,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23786,
		"user_id" => 29350,
		"work_status" => "Non European National"
	],
	[
		"id" => 23790,
		"user_id" => 29354,
		"work_status" => "European National"
	],
	[
		"id" => 23793,
		"user_id" => 29357,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23799,
		"user_id" => 29363,
		"work_status" => "Non European National"
	],
	[
		"id" => 23805,
		"user_id" => 29369,
		"work_status" => "European National"
	],
	[
		"id" => 23807,
		"user_id" => 29371,
		"work_status" => "European National"
	],
	[
		"id" => 23811,
		"user_id" => 29375,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23814,
		"user_id" => 29378,
		"work_status" => "Non European National"
	],
	[
		"id" => 23821,
		"user_id" => 29385,
		"work_status" => "European National"
	],
	[
		"id" => 23822,
		"user_id" => 29386,
		"work_status" => "European National"
	],
	[
		"id" => 26420,
		"user_id" => 26085,
		"work_status" => "0"
	],
	[
		"id" => 23828,
		"user_id" => 29392,
		"work_status" => "Non European National"
	],
	[
		"id" => 23834,
		"user_id" => 29398,
		"work_status" => "European National"
	],
	[
		"id" => 23839,
		"user_id" => 29403,
		"work_status" => "European National"
	],
	[
		"id" => 23844,
		"user_id" => 29408,
		"work_status" => "European National"
	],
	[
		"id" => 23852,
		"user_id" => 29416,
		"work_status" => "Non European National"
	],
	[
		"id" => 23855,
		"user_id" => 29419,
		"work_status" => "European National"
	],
	[
		"id" => 23857,
		"user_id" => 29421,
		"work_status" => "European National"
	],
	[
		"id" => 23866,
		"user_id" => 29430,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23868,
		"user_id" => 29432,
		"work_status" => "Non European National"
	],
	[
		"id" => 23871,
		"user_id" => 29435,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23402,
		"user_id" => 28954,
		"work_status" => "Non European National"
	],
	[
		"id" => 23878,
		"user_id" => 29442,
		"work_status" => "European National"
	],
	[
		"id" => 23884,
		"user_id" => 29448,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23885,
		"user_id" => 29449,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23886,
		"user_id" => 29450,
		"work_status" => "European National"
	],
	[
		"id" => 23890,
		"user_id" => 29454,
		"work_status" => "Non European National"
	],
	[
		"id" => 23894,
		"user_id" => 29458,
		"work_status" => "European National"
	],
	[
		"id" => 23896,
		"user_id" => 29460,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26833,
		"user_id" => 33405,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24375,
		"user_id" => 29939,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24380,
		"user_id" => 29944,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24401,
		"user_id" => 29965,
		"work_status" => "Non European National"
	],
	[
		"id" => 24403,
		"user_id" => 29967,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24406,
		"user_id" => 29970,
		"work_status" => "Non European National"
	],
	[
		"id" => 24407,
		"user_id" => 29971,
		"work_status" => "European National"
	],
	[
		"id" => 24409,
		"user_id" => 29973,
		"work_status" => "Non European National"
	],
	[
		"id" => 24411,
		"user_id" => 29975,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24415,
		"user_id" => 29979,
		"work_status" => "European National"
	],
	[
		"id" => 24421,
		"user_id" => 29985,
		"work_status" => "Non European National"
	],
	[
		"id" => 24422,
		"user_id" => 29986,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24425,
		"user_id" => 29989,
		"work_status" => "Non European National"
	],
	[
		"id" => 24430,
		"user_id" => 29994,
		"work_status" => "European National"
	],
	[
		"id" => 24431,
		"user_id" => 29995,
		"work_status" => "Non European National"
	],
	[
		"id" => 24437,
		"user_id" => 30001,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24446,
		"user_id" => 30010,
		"work_status" => "Non European National"
	],
	[
		"id" => 24449,
		"user_id" => 30013,
		"work_status" => "European National"
	],
	[
		"id" => 24458,
		"user_id" => 30022,
		"work_status" => "Non European National"
	],
	[
		"id" => 24460,
		"user_id" => 30024,
		"work_status" => "Non European National"
	],
	[
		"id" => 24471,
		"user_id" => 30035,
		"work_status" => "European National"
	],
	[
		"id" => 24488,
		"user_id" => 30052,
		"work_status" => "Non European National"
	],
	[
		"id" => 24492,
		"user_id" => 30056,
		"work_status" => "European National"
	],
	[
		"id" => 24499,
		"user_id" => 30063,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24501,
		"user_id" => 30065,
		"work_status" => "European National"
	],
	[
		"id" => 24507,
		"user_id" => 30071,
		"work_status" => "Non European National"
	],
	[
		"id" => 24509,
		"user_id" => 30073,
		"work_status" => "Non European National"
	],
	[
		"id" => 24511,
		"user_id" => 30075,
		"work_status" => "European National"
	],
	[
		"id" => 24512,
		"user_id" => 30076,
		"work_status" => "European National"
	],
	[
		"id" => 24516,
		"user_id" => 30080,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24522,
		"user_id" => 30086,
		"work_status" => "European National"
	],
	[
		"id" => 24529,
		"user_id" => 30093,
		"work_status" => "European National"
	],
	[
		"id" => 24531,
		"user_id" => 30095,
		"work_status" => "European National"
	],
	[
		"id" => 24532,
		"user_id" => 30096,
		"work_status" => "Non European National"
	],
	[
		"id" => 24539,
		"user_id" => 30103,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24546,
		"user_id" => 30110,
		"work_status" => "European National"
	],
	[
		"id" => 24550,
		"user_id" => 30114,
		"work_status" => "Non European National"
	],
	[
		"id" => 24555,
		"user_id" => 30119,
		"work_status" => "Non European National"
	],
	[
		"id" => 24566,
		"user_id" => 30130,
		"work_status" => "Non European National"
	],
	[
		"id" => 24570,
		"user_id" => 30134,
		"work_status" => "Non European National"
	],
	[
		"id" => 24575,
		"user_id" => 30139,
		"work_status" => "European National"
	],
	[
		"id" => 24576,
		"user_id" => 30140,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24578,
		"user_id" => 30142,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23337,
		"user_id" => 28866,
		"work_status" => "0"
	],
	[
		"id" => 24580,
		"user_id" => 30144,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24582,
		"user_id" => 30146,
		"work_status" => "Non European National"
	],
	[
		"id" => 26884,
		"user_id" => 33476,
		"work_status" => "European National"
	],
	[
		"id" => 24586,
		"user_id" => 30150,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24588,
		"user_id" => 30152,
		"work_status" => "European National"
	],
	[
		"id" => 24590,
		"user_id" => 30154,
		"work_status" => "Non European National"
	],
	[
		"id" => 24595,
		"user_id" => 30159,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24596,
		"user_id" => 30160,
		"work_status" => "Non European National"
	],
	[
		"id" => 24599,
		"user_id" => 30163,
		"work_status" => "Non European National"
	],
	[
		"id" => 24604,
		"user_id" => 30168,
		"work_status" => "Non European National"
	],
	[
		"id" => 24615,
		"user_id" => 30179,
		"work_status" => "Non European National"
	],
	[
		"id" => 24617,
		"user_id" => 30181,
		"work_status" => "European National"
	],
	[
		"id" => 24956,
		"user_id" => 30528,
		"work_status" => "European National"
	],
	[
		"id" => 24619,
		"user_id" => 30183,
		"work_status" => "European National"
	],
	[
		"id" => 24621,
		"user_id" => 30185,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24635,
		"user_id" => 30199,
		"work_status" => "European National"
	],
	[
		"id" => 24639,
		"user_id" => 30203,
		"work_status" => "Non European National"
	],
	[
		"id" => 24641,
		"user_id" => 30205,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24642,
		"user_id" => 30206,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24649,
		"user_id" => 30213,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24652,
		"user_id" => 30216,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24656,
		"user_id" => 30220,
		"work_status" => "European National"
	],
	[
		"id" => 24661,
		"user_id" => 30225,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24666,
		"user_id" => 30230,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24668,
		"user_id" => 30232,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24671,
		"user_id" => 30235,
		"work_status" => "Non European National"
	],
	[
		"id" => 24673,
		"user_id" => 30237,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24674,
		"user_id" => 30238,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24685,
		"user_id" => 30249,
		"work_status" => "European National"
	],
	[
		"id" => 24686,
		"user_id" => 30250,
		"work_status" => "European National"
	],
	[
		"id" => 24691,
		"user_id" => 30255,
		"work_status" => "European National"
	],
	[
		"id" => 24693,
		"user_id" => 30257,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24696,
		"user_id" => 30260,
		"work_status" => "Non European National"
	],
	[
		"id" => 24713,
		"user_id" => 30277,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24715,
		"user_id" => 30279,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24717,
		"user_id" => 30281,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24719,
		"user_id" => 30283,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24726,
		"user_id" => 30290,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24728,
		"user_id" => 30292,
		"work_status" => "Non European National"
	],
	[
		"id" => 24732,
		"user_id" => 30296,
		"work_status" => "European National"
	],
	[
		"id" => 24733,
		"user_id" => 30297,
		"work_status" => "European National"
	],
	[
		"id" => 24737,
		"user_id" => 30301,
		"work_status" => "European National"
	],
	[
		"id" => 24742,
		"user_id" => 30306,
		"work_status" => "Non European National"
	],
	[
		"id" => 24745,
		"user_id" => 30309,
		"work_status" => "Non European National"
	],
	[
		"id" => 24751,
		"user_id" => 30315,
		"work_status" => "Non European National"
	],
	[
		"id" => 24766,
		"user_id" => 30330,
		"work_status" => "European National"
	],
	[
		"id" => 24774,
		"user_id" => 30338,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24781,
		"user_id" => 30345,
		"work_status" => "Non European National"
	],
	[
		"id" => 24785,
		"user_id" => 30349,
		"work_status" => "Non European National"
	],
	[
		"id" => 24793,
		"user_id" => 30357,
		"work_status" => "Non European National"
	],
	[
		"id" => 24799,
		"user_id" => 30363,
		"work_status" => "European National"
	],
	[
		"id" => 24803,
		"user_id" => 30367,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24854,
		"user_id" => 30418,
		"work_status" => "Non European National"
	],
	[
		"id" => 24859,
		"user_id" => 30423,
		"work_status" => "Non European National"
	],
	[
		"id" => 24860,
		"user_id" => 30424,
		"work_status" => "European National"
	],
	[
		"id" => 24863,
		"user_id" => 30427,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24872,
		"user_id" => 30436,
		"work_status" => "Non European National"
	],
	[
		"id" => 24874,
		"user_id" => 30438,
		"work_status" => "European National"
	],
	[
		"id" => 24876,
		"user_id" => 30440,
		"work_status" => "Non European National"
	],
	[
		"id" => 24879,
		"user_id" => 30443,
		"work_status" => "Non European National"
	],
	[
		"id" => 24881,
		"user_id" => 30445,
		"work_status" => "Non European National"
	],
	[
		"id" => 24882,
		"user_id" => 30446,
		"work_status" => "European National"
	],
	[
		"id" => 24886,
		"user_id" => 30450,
		"work_status" => "European National"
	],
	[
		"id" => 24888,
		"user_id" => 30452,
		"work_status" => "European National"
	],
	[
		"id" => 24894,
		"user_id" => 30458,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24897,
		"user_id" => 30461,
		"work_status" => "European National"
	],
	[
		"id" => 24909,
		"user_id" => 30473,
		"work_status" => "Non European National"
	],
	[
		"id" => 24914,
		"user_id" => 30478,
		"work_status" => "Non European National"
	],
	[
		"id" => 24916,
		"user_id" => 30480,
		"work_status" => "Non European National"
	],
	[
		"id" => 23317,
		"user_id" => 28845,
		"work_status" => "Non European National"
	],
	[
		"id" => 23318,
		"user_id" => 28844,
		"work_status" => "Non European National"
	],
	[
		"id" => 23319,
		"user_id" => 27269,
		"work_status" => "European National"
	],
	[
		"id" => 23321,
		"user_id" => 27228,
		"work_status" => "European National"
	],
	[
		"id" => 23322,
		"user_id" => 28848,
		"work_status" => "Non European National"
	],
	[
		"id" => 23323,
		"user_id" => 28849,
		"work_status" => "Non European National"
	],
	[
		"id" => 23324,
		"user_id" => 28850,
		"work_status" => "Non European National"
	],
	[
		"id" => 23910,
		"user_id" => 29474,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23325,
		"user_id" => 28851,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23326,
		"user_id" => 28852,
		"work_status" => "0"
	],
	[
		"id" => 23327,
		"user_id" => 28853,
		"work_status" => "Non European National"
	],
	[
		"id" => 23328,
		"user_id" => 28854,
		"work_status" => "Non European National"
	],
	[
		"id" => 27033,
		"user_id" => 33649,
		"work_status" => "Non European National"
	],
	[
		"id" => 23330,
		"user_id" => 28856,
		"work_status" => "Non European National"
	],
	[
		"id" => 23331,
		"user_id" => 28857,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23332,
		"user_id" => 28861,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23333,
		"user_id" => 28862,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23340,
		"user_id" => 28871,
		"work_status" => "Non European National"
	],
	[
		"id" => 23341,
		"user_id" => 28872,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23342,
		"user_id" => 28873,
		"work_status" => "European National"
	],
	[
		"id" => 23343,
		"user_id" => 28874,
		"work_status" => "Non European National"
	],
	[
		"id" => 23344,
		"user_id" => 28875,
		"work_status" => "0"
	],
	[
		"id" => 23345,
		"user_id" => 28876,
		"work_status" => "Non European National"
	],
	[
		"id" => 23346,
		"user_id" => 28877,
		"work_status" => "0"
	],
	[
		"id" => 23347,
		"user_id" => 28878,
		"work_status" => "Non European National"
	],
	[
		"id" => 23348,
		"user_id" => 28879,
		"work_status" => "Non European National"
	],
	[
		"id" => 23349,
		"user_id" => 28880,
		"work_status" => "European National"
	],
	[
		"id" => 23350,
		"user_id" => 28882,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23352,
		"user_id" => 26853,
		"work_status" => "0"
	],
	[
		"id" => 23353,
		"user_id" => 28883,
		"work_status" => "European National"
	],
	[
		"id" => 23354,
		"user_id" => 28886,
		"work_status" => "European National"
	],
	[
		"id" => 23355,
		"user_id" => 28888,
		"work_status" => "0"
	],
	[
		"id" => 23356,
		"user_id" => 27097,
		"work_status" => "Non European National"
	],
	[
		"id" => 23357,
		"user_id" => 28889,
		"work_status" => "European National"
	],
	[
		"id" => 26770,
		"user_id" => 33301,
		"work_status" => "Non European National"
	],
	[
		"id" => 23358,
		"user_id" => 28890,
		"work_status" => "European National"
	],
	[
		"id" => 23359,
		"user_id" => 28891,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23360,
		"user_id" => 28892,
		"work_status" => "Non European National"
	],
	[
		"id" => 23361,
		"user_id" => 28895,
		"work_status" => "European National"
	],
	[
		"id" => 25647,
		"user_id" => 31681,
		"work_status" => "0"
	],
	[
		"id" => 25648,
		"user_id" => 31683,
		"work_status" => "Non European National"
	],
	[
		"id" => 25649,
		"user_id" => 27021,
		"work_status" => "0"
	],
	[
		"id" => 23363,
		"user_id" => 28898,
		"work_status" => "European National"
	],
	[
		"id" => 23364,
		"user_id" => 28899,
		"work_status" => "Non European National"
	],
	[
		"id" => 23365,
		"user_id" => 28900,
		"work_status" => "Non European National"
	],
	[
		"id" => 23366,
		"user_id" => 28903,
		"work_status" => "0"
	],
	[
		"id" => 23367,
		"user_id" => 28905,
		"work_status" => "Non European National"
	],
	[
		"id" => 23368,
		"user_id" => 28906,
		"work_status" => "Non European National"
	],
	[
		"id" => 23369,
		"user_id" => 28904,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23370,
		"user_id" => 28907,
		"work_status" => "European National"
	],
	[
		"id" => 23371,
		"user_id" => 28908,
		"work_status" => "0"
	],
	[
		"id" => 23372,
		"user_id" => 28912,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25780,
		"user_id" => 31899,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23377,
		"user_id" => 28846,
		"work_status" => "Non European National"
	],
	[
		"id" => 25171,
		"user_id" => 30866,
		"work_status" => "European National"
	],
	[
		"id" => 23378,
		"user_id" => 28920,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23379,
		"user_id" => 28922,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23380,
		"user_id" => 28923,
		"work_status" => "0"
	],
	[
		"id" => 23875,
		"user_id" => 29439,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23381,
		"user_id" => 28919,
		"work_status" => "European National"
	],
	[
		"id" => 23382,
		"user_id" => 28924,
		"work_status" => "Non European National"
	],
	[
		"id" => 23450,
		"user_id" => 29014,
		"work_status" => "Non European National"
	],
	[
		"id" => 23383,
		"user_id" => 27165,
		"work_status" => "Non European National"
	],
	[
		"id" => 23384,
		"user_id" => 28928,
		"work_status" => "European National"
	],
	[
		"id" => 23385,
		"user_id" => 28929,
		"work_status" => "Non European National"
	],
	[
		"id" => 23386,
		"user_id" => 28932,
		"work_status" => "Non European National"
	],
	[
		"id" => 23387,
		"user_id" => 28934,
		"work_status" => "Non European National"
	],
	[
		"id" => 23388,
		"user_id" => 28936,
		"work_status" => "Non European National"
	],
	[
		"id" => 23389,
		"user_id" => 28939,
		"work_status" => "Non European National"
	],
	[
		"id" => 23390,
		"user_id" => 28940,
		"work_status" => "Non European National"
	],
	[
		"id" => 26097,
		"user_id" => 32350,
		"work_status" => "European National"
	],
	[
		"id" => 23392,
		"user_id" => 28941,
		"work_status" => "European National"
	],
	[
		"id" => 23393,
		"user_id" => 28942,
		"work_status" => "European National"
	],
	[
		"id" => 23394,
		"user_id" => 28945,
		"work_status" => "Non European National"
	],
	[
		"id" => 23395,
		"user_id" => 28946,
		"work_status" => "European National"
	],
	[
		"id" => 23396,
		"user_id" => 28947,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23397,
		"user_id" => 28949,
		"work_status" => "0"
	],
	[
		"id" => 23398,
		"user_id" => 28950,
		"work_status" => "0"
	],
	[
		"id" => 23399,
		"user_id" => 28951,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23400,
		"user_id" => 28952,
		"work_status" => "Non European National"
	],
	[
		"id" => 23405,
		"user_id" => 28959,
		"work_status" => "European National"
	],
	[
		"id" => 23406,
		"user_id" => 21200,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23407,
		"user_id" => 28961,
		"work_status" => "Non European National"
	],
	[
		"id" => 23411,
		"user_id" => 28965,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23412,
		"user_id" => 28966,
		"work_status" => "European National"
	],
	[
		"id" => 23413,
		"user_id" => 28967,
		"work_status" => "European National"
	],
	[
		"id" => 23414,
		"user_id" => 27270,
		"work_status" => "European National"
	],
	[
		"id" => 23415,
		"user_id" => 28968,
		"work_status" => "Non European National"
	],
	[
		"id" => 23416,
		"user_id" => 28969,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23417,
		"user_id" => 26960,
		"work_status" => "Non European National"
	],
	[
		"id" => 23418,
		"user_id" => 28971,
		"work_status" => "European National"
	],
	[
		"id" => 23419,
		"user_id" => 28972,
		"work_status" => "Non European National"
	],
	[
		"id" => 23420,
		"user_id" => 28976,
		"work_status" => "Non European National"
	],
	[
		"id" => 23421,
		"user_id" => 28977,
		"work_status" => "0"
	],
	[
		"id" => 23708,
		"user_id" => 29272,
		"work_status" => "European National"
	],
	[
		"id" => 23422,
		"user_id" => 28978,
		"work_status" => "0"
	],
	[
		"id" => 23423,
		"user_id" => 28980,
		"work_status" => "0"
	],
	[
		"id" => 23424,
		"user_id" => 28981,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23425,
		"user_id" => 28982,
		"work_status" => "0"
	],
	[
		"id" => 23427,
		"user_id" => 28983,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23426,
		"user_id" => 28984,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23428,
		"user_id" => 28985,
		"work_status" => "European National"
	],
	[
		"id" => 23429,
		"user_id" => 28986,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23430,
		"user_id" => 28987,
		"work_status" => "Non European National"
	],
	[
		"id" => 23431,
		"user_id" => 28988,
		"work_status" => "European National"
	],
	[
		"id" => 23432,
		"user_id" => 28989,
		"work_status" => "European National"
	],
	[
		"id" => 23433,
		"user_id" => 28991,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23434,
		"user_id" => 28993,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23435,
		"user_id" => 28975,
		"work_status" => "Non European National"
	],
	[
		"id" => 23436,
		"user_id" => 28995,
		"work_status" => "European National"
	],
	[
		"id" => 23438,
		"user_id" => 28997,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23439,
		"user_id" => 29000,
		"work_status" => "European National"
	],
	[
		"id" => 23440,
		"user_id" => 29002,
		"work_status" => "European National"
	],
	[
		"id" => 23441,
		"user_id" => 29003,
		"work_status" => "Non European National"
	],
	[
		"id" => 23442,
		"user_id" => 29005,
		"work_status" => "Non European National"
	],
	[
		"id" => 23443,
		"user_id" => 29006,
		"work_status" => "Non European National"
	],
	[
		"id" => 23444,
		"user_id" => 29008,
		"work_status" => "European National"
	],
	[
		"id" => 23445,
		"user_id" => 29009,
		"work_status" => "Non European National"
	],
	[
		"id" => 27408,
		"user_id" => 34190,
		"work_status" => "0"
	],
	[
		"id" => 26419,
		"user_id" => 31453,
		"work_status" => "European National"
	],
	[
		"id" => 23912,
		"user_id" => 29476,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23913,
		"user_id" => 29477,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23914,
		"user_id" => 29478,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23915,
		"user_id" => 29479,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23916,
		"user_id" => 29480,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23917,
		"user_id" => 29481,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23918,
		"user_id" => 29482,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23919,
		"user_id" => 29483,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23920,
		"user_id" => 29484,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23921,
		"user_id" => 29485,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23922,
		"user_id" => 29486,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23923,
		"user_id" => 29487,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23924,
		"user_id" => 29488,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23925,
		"user_id" => 29489,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23926,
		"user_id" => 29490,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23927,
		"user_id" => 29491,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23928,
		"user_id" => 29492,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23929,
		"user_id" => 29493,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23930,
		"user_id" => 29494,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23931,
		"user_id" => 29495,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23932,
		"user_id" => 29496,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23933,
		"user_id" => 29497,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23934,
		"user_id" => 29498,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23935,
		"user_id" => 29499,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23936,
		"user_id" => 29500,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23937,
		"user_id" => 29501,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23938,
		"user_id" => 29502,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23939,
		"user_id" => 29503,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23940,
		"user_id" => 29504,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23941,
		"user_id" => 29505,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23942,
		"user_id" => 29506,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23943,
		"user_id" => 29507,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23944,
		"user_id" => 29508,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23945,
		"user_id" => 29509,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23946,
		"user_id" => 29510,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23947,
		"user_id" => 29511,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23948,
		"user_id" => 29512,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23949,
		"user_id" => 29513,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23950,
		"user_id" => 29514,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23951,
		"user_id" => 29515,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23952,
		"user_id" => 29516,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23953,
		"user_id" => 29517,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23954,
		"user_id" => 29518,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23955,
		"user_id" => 29519,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23956,
		"user_id" => 29520,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23957,
		"user_id" => 29521,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23958,
		"user_id" => 29522,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23959,
		"user_id" => 29523,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23960,
		"user_id" => 29524,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23961,
		"user_id" => 29525,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23962,
		"user_id" => 29526,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23963,
		"user_id" => 29527,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23964,
		"user_id" => 29528,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23965,
		"user_id" => 29529,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23966,
		"user_id" => 29530,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23967,
		"user_id" => 29531,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23968,
		"user_id" => 29532,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23969,
		"user_id" => 29533,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23970,
		"user_id" => 29534,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23971,
		"user_id" => 29535,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23972,
		"user_id" => 29536,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23973,
		"user_id" => 29537,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23974,
		"user_id" => 29538,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23975,
		"user_id" => 29539,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23976,
		"user_id" => 29540,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23977,
		"user_id" => 29541,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23978,
		"user_id" => 29542,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23979,
		"user_id" => 29543,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23980,
		"user_id" => 29544,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23981,
		"user_id" => 29545,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23982,
		"user_id" => 29546,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23983,
		"user_id" => 29547,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23984,
		"user_id" => 29548,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23985,
		"user_id" => 29549,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23986,
		"user_id" => 29550,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23987,
		"user_id" => 29551,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23988,
		"user_id" => 29552,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23989,
		"user_id" => 29553,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23990,
		"user_id" => 29554,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23991,
		"user_id" => 29555,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23992,
		"user_id" => 29556,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23993,
		"user_id" => 29557,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23994,
		"user_id" => 29558,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23995,
		"user_id" => 29559,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23996,
		"user_id" => 29560,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23997,
		"user_id" => 29561,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23998,
		"user_id" => 29562,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 23999,
		"user_id" => 29563,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24000,
		"user_id" => 29564,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24001,
		"user_id" => 29565,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24002,
		"user_id" => 29566,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24003,
		"user_id" => 29567,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24004,
		"user_id" => 29568,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24005,
		"user_id" => 29569,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24006,
		"user_id" => 29570,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24007,
		"user_id" => 29571,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24008,
		"user_id" => 29572,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24009,
		"user_id" => 29573,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24010,
		"user_id" => 29574,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24011,
		"user_id" => 29575,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24012,
		"user_id" => 29576,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24013,
		"user_id" => 29577,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24014,
		"user_id" => 29578,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24015,
		"user_id" => 29579,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24016,
		"user_id" => 29580,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24017,
		"user_id" => 29581,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24018,
		"user_id" => 29582,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24019,
		"user_id" => 29583,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24020,
		"user_id" => 29584,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24021,
		"user_id" => 29585,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24022,
		"user_id" => 29586,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24023,
		"user_id" => 29587,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24024,
		"user_id" => 29588,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24025,
		"user_id" => 29589,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24026,
		"user_id" => 29590,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24027,
		"user_id" => 29591,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24028,
		"user_id" => 29592,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24029,
		"user_id" => 29593,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24030,
		"user_id" => 29594,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24031,
		"user_id" => 29595,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24032,
		"user_id" => 29596,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24033,
		"user_id" => 29597,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24034,
		"user_id" => 29598,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24035,
		"user_id" => 29599,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24036,
		"user_id" => 29600,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24037,
		"user_id" => 29601,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24038,
		"user_id" => 29602,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24039,
		"user_id" => 29603,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24040,
		"user_id" => 29604,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24041,
		"user_id" => 29605,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24042,
		"user_id" => 29606,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24043,
		"user_id" => 29607,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24044,
		"user_id" => 29608,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24045,
		"user_id" => 29609,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24046,
		"user_id" => 29610,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24047,
		"user_id" => 29611,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24048,
		"user_id" => 29612,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24049,
		"user_id" => 29613,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24050,
		"user_id" => 29614,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24051,
		"user_id" => 29615,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24052,
		"user_id" => 29616,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24053,
		"user_id" => 29617,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24054,
		"user_id" => 29618,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24055,
		"user_id" => 29619,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24056,
		"user_id" => 29620,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24057,
		"user_id" => 29621,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24058,
		"user_id" => 29622,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24059,
		"user_id" => 29623,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24060,
		"user_id" => 29624,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24061,
		"user_id" => 29625,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24062,
		"user_id" => 29626,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24063,
		"user_id" => 29627,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24064,
		"user_id" => 29628,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24065,
		"user_id" => 29629,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24066,
		"user_id" => 29630,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24067,
		"user_id" => 29631,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24068,
		"user_id" => 29632,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24069,
		"user_id" => 29633,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24070,
		"user_id" => 29634,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24071,
		"user_id" => 29635,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24072,
		"user_id" => 29636,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24073,
		"user_id" => 29637,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24074,
		"user_id" => 29638,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24075,
		"user_id" => 29639,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24076,
		"user_id" => 29640,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24077,
		"user_id" => 29641,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24078,
		"user_id" => 29642,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24079,
		"user_id" => 29643,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24080,
		"user_id" => 29644,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24081,
		"user_id" => 29645,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24082,
		"user_id" => 29646,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24083,
		"user_id" => 29647,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24084,
		"user_id" => 29648,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24085,
		"user_id" => 29649,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24086,
		"user_id" => 29650,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24087,
		"user_id" => 29651,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24088,
		"user_id" => 29652,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24089,
		"user_id" => 29653,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24090,
		"user_id" => 29654,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24091,
		"user_id" => 29655,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24092,
		"user_id" => 29656,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24093,
		"user_id" => 29657,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24094,
		"user_id" => 29658,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24095,
		"user_id" => 29659,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24096,
		"user_id" => 29660,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24097,
		"user_id" => 29661,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24098,
		"user_id" => 29662,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24099,
		"user_id" => 29663,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24100,
		"user_id" => 29664,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24101,
		"user_id" => 29665,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24102,
		"user_id" => 29666,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24103,
		"user_id" => 29667,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24104,
		"user_id" => 29668,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24105,
		"user_id" => 29669,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24106,
		"user_id" => 29670,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24107,
		"user_id" => 29671,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24108,
		"user_id" => 29672,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24109,
		"user_id" => 29673,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24110,
		"user_id" => 29674,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24111,
		"user_id" => 29675,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24112,
		"user_id" => 29676,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24113,
		"user_id" => 29677,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24114,
		"user_id" => 29678,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24115,
		"user_id" => 29679,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24116,
		"user_id" => 29680,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24117,
		"user_id" => 29681,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24118,
		"user_id" => 29682,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24119,
		"user_id" => 29683,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24120,
		"user_id" => 29684,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24121,
		"user_id" => 29685,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24122,
		"user_id" => 29686,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24123,
		"user_id" => 29687,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24124,
		"user_id" => 29688,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24125,
		"user_id" => 29689,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24126,
		"user_id" => 29690,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24127,
		"user_id" => 29691,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24128,
		"user_id" => 29692,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24129,
		"user_id" => 29693,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24130,
		"user_id" => 29694,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24131,
		"user_id" => 29695,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24132,
		"user_id" => 29696,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24133,
		"user_id" => 29697,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24134,
		"user_id" => 29698,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24135,
		"user_id" => 29699,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24136,
		"user_id" => 29700,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24137,
		"user_id" => 29701,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24138,
		"user_id" => 29702,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24139,
		"user_id" => 29703,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24140,
		"user_id" => 29704,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24141,
		"user_id" => 29705,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24142,
		"user_id" => 29706,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24143,
		"user_id" => 29707,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24144,
		"user_id" => 29708,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24145,
		"user_id" => 29709,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24146,
		"user_id" => 29710,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24147,
		"user_id" => 29711,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24148,
		"user_id" => 29712,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24149,
		"user_id" => 29713,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24150,
		"user_id" => 29714,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24151,
		"user_id" => 29715,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24152,
		"user_id" => 29716,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24153,
		"user_id" => 29717,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24154,
		"user_id" => 29718,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24155,
		"user_id" => 29719,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24156,
		"user_id" => 29720,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24157,
		"user_id" => 29721,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24158,
		"user_id" => 29722,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24159,
		"user_id" => 29723,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24160,
		"user_id" => 29724,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24161,
		"user_id" => 29725,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24162,
		"user_id" => 29726,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24163,
		"user_id" => 29727,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24164,
		"user_id" => 29728,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24165,
		"user_id" => 29729,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24166,
		"user_id" => 29730,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24167,
		"user_id" => 29731,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24168,
		"user_id" => 29732,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24169,
		"user_id" => 29733,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24170,
		"user_id" => 29734,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24171,
		"user_id" => 29735,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24172,
		"user_id" => 29736,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24173,
		"user_id" => 29737,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24174,
		"user_id" => 29738,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24175,
		"user_id" => 29739,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24176,
		"user_id" => 29740,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24177,
		"user_id" => 29741,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24178,
		"user_id" => 29742,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24179,
		"user_id" => 29743,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24180,
		"user_id" => 29744,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24181,
		"user_id" => 29745,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24182,
		"user_id" => 29746,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24183,
		"user_id" => 29747,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24184,
		"user_id" => 29748,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24185,
		"user_id" => 29749,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24186,
		"user_id" => 29750,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24187,
		"user_id" => 29751,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24188,
		"user_id" => 29752,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24189,
		"user_id" => 29753,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24190,
		"user_id" => 29754,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24191,
		"user_id" => 29755,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24192,
		"user_id" => 29756,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24193,
		"user_id" => 29757,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24194,
		"user_id" => 29758,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24195,
		"user_id" => 29759,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24196,
		"user_id" => 29760,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24197,
		"user_id" => 29761,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24198,
		"user_id" => 29762,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24199,
		"user_id" => 29763,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24200,
		"user_id" => 29764,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24201,
		"user_id" => 29765,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24202,
		"user_id" => 29766,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24203,
		"user_id" => 29767,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24204,
		"user_id" => 29768,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24205,
		"user_id" => 29769,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24206,
		"user_id" => 29770,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24207,
		"user_id" => 29771,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24208,
		"user_id" => 29772,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24209,
		"user_id" => 29773,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24210,
		"user_id" => 29774,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24211,
		"user_id" => 29775,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24212,
		"user_id" => 29776,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24213,
		"user_id" => 29777,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24214,
		"user_id" => 29778,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24215,
		"user_id" => 29779,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24216,
		"user_id" => 29780,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24217,
		"user_id" => 29781,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24218,
		"user_id" => 29782,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24219,
		"user_id" => 29783,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24220,
		"user_id" => 29784,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24221,
		"user_id" => 29785,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24222,
		"user_id" => 29786,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24223,
		"user_id" => 29787,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24224,
		"user_id" => 29788,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24225,
		"user_id" => 29789,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24226,
		"user_id" => 29790,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24227,
		"user_id" => 29791,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24228,
		"user_id" => 29792,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24229,
		"user_id" => 29793,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24230,
		"user_id" => 29794,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24231,
		"user_id" => 29795,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24232,
		"user_id" => 29796,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24233,
		"user_id" => 29797,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24234,
		"user_id" => 29798,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24235,
		"user_id" => 29799,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24236,
		"user_id" => 29800,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24237,
		"user_id" => 29801,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24238,
		"user_id" => 29802,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24239,
		"user_id" => 29803,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24240,
		"user_id" => 29804,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24241,
		"user_id" => 29805,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24242,
		"user_id" => 29806,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24243,
		"user_id" => 29807,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24244,
		"user_id" => 29808,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24245,
		"user_id" => 29809,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24246,
		"user_id" => 29810,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24247,
		"user_id" => 29811,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24248,
		"user_id" => 29812,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24249,
		"user_id" => 29813,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24250,
		"user_id" => 29814,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24251,
		"user_id" => 29815,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24252,
		"user_id" => 29816,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24253,
		"user_id" => 29817,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24254,
		"user_id" => 29818,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24255,
		"user_id" => 29819,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24256,
		"user_id" => 29820,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24257,
		"user_id" => 29821,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24258,
		"user_id" => 29822,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24259,
		"user_id" => 29823,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24260,
		"user_id" => 29824,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24261,
		"user_id" => 29825,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24262,
		"user_id" => 29826,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24263,
		"user_id" => 29827,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24264,
		"user_id" => 29828,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24265,
		"user_id" => 29829,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24266,
		"user_id" => 29830,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24267,
		"user_id" => 29831,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24268,
		"user_id" => 29832,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24269,
		"user_id" => 29833,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24270,
		"user_id" => 29834,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24271,
		"user_id" => 29835,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24272,
		"user_id" => 29836,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24273,
		"user_id" => 29837,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24274,
		"user_id" => 29838,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24275,
		"user_id" => 29839,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24276,
		"user_id" => 29840,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24277,
		"user_id" => 29841,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24278,
		"user_id" => 29842,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24279,
		"user_id" => 29843,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24280,
		"user_id" => 29844,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24281,
		"user_id" => 29845,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24282,
		"user_id" => 29846,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24283,
		"user_id" => 29847,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24284,
		"user_id" => 29848,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24285,
		"user_id" => 29849,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24286,
		"user_id" => 29850,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24287,
		"user_id" => 29851,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24288,
		"user_id" => 29852,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24289,
		"user_id" => 29853,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24290,
		"user_id" => 29854,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24291,
		"user_id" => 29855,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24292,
		"user_id" => 29856,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24293,
		"user_id" => 29857,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24294,
		"user_id" => 29858,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24295,
		"user_id" => 29859,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24296,
		"user_id" => 29860,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24297,
		"user_id" => 29861,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24298,
		"user_id" => 29862,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24299,
		"user_id" => 29863,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24300,
		"user_id" => 29864,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24301,
		"user_id" => 29865,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24302,
		"user_id" => 29866,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24303,
		"user_id" => 29867,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24304,
		"user_id" => 29868,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24305,
		"user_id" => 29869,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24306,
		"user_id" => 29870,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24307,
		"user_id" => 29871,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24308,
		"user_id" => 29872,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24309,
		"user_id" => 29873,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24310,
		"user_id" => 29874,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24311,
		"user_id" => 29875,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24312,
		"user_id" => 29876,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24313,
		"user_id" => 29877,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24314,
		"user_id" => 29878,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24315,
		"user_id" => 29879,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24316,
		"user_id" => 29880,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24317,
		"user_id" => 29881,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24318,
		"user_id" => 29882,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24319,
		"user_id" => 29883,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24320,
		"user_id" => 29884,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24321,
		"user_id" => 29885,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24322,
		"user_id" => 29886,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24323,
		"user_id" => 29887,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24324,
		"user_id" => 29888,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24325,
		"user_id" => 29889,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24326,
		"user_id" => 29890,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24327,
		"user_id" => 29891,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24328,
		"user_id" => 29892,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24329,
		"user_id" => 29893,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24330,
		"user_id" => 29894,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24331,
		"user_id" => 29895,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24332,
		"user_id" => 29896,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24333,
		"user_id" => 29897,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24334,
		"user_id" => 29898,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24335,
		"user_id" => 29899,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24336,
		"user_id" => 29900,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24337,
		"user_id" => 29901,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24338,
		"user_id" => 29902,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24339,
		"user_id" => 29903,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24340,
		"user_id" => 29904,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24341,
		"user_id" => 29905,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24342,
		"user_id" => 29906,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24343,
		"user_id" => 29907,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24344,
		"user_id" => 29908,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24345,
		"user_id" => 29909,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24346,
		"user_id" => 29910,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24347,
		"user_id" => 29911,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24348,
		"user_id" => 29912,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24349,
		"user_id" => 29913,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24350,
		"user_id" => 29914,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24351,
		"user_id" => 29915,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24352,
		"user_id" => 29916,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24353,
		"user_id" => 29917,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24354,
		"user_id" => 29918,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24355,
		"user_id" => 29919,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24356,
		"user_id" => 29920,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24357,
		"user_id" => 29921,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24358,
		"user_id" => 29922,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24359,
		"user_id" => 29923,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24360,
		"user_id" => 29924,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24361,
		"user_id" => 29925,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24362,
		"user_id" => 29926,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24363,
		"user_id" => 29927,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24364,
		"user_id" => 29928,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24365,
		"user_id" => 29929,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24366,
		"user_id" => 29930,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24367,
		"user_id" => 29931,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24368,
		"user_id" => 29932,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24369,
		"user_id" => 29933,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24370,
		"user_id" => 29934,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24371,
		"user_id" => 29935,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24372,
		"user_id" => 29936,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24373,
		"user_id" => 29937,
		"work_status" => "Non European National"
	],
	[
		"id" => 24933,
		"user_id" => 30494,
		"work_status" => "Non European National"
	],
	[
		"id" => 24934,
		"user_id" => 30495,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25788,
		"user_id" => 31907,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25825,
		"user_id" => 31944,
		"work_status" => "Non European National"
	],
	[
		"id" => 25782,
		"user_id" => 31901,
		"work_status" => "Non European National"
	],
	[
		"id" => 25783,
		"user_id" => 31902,
		"work_status" => "European National"
	],
	[
		"id" => 25805,
		"user_id" => 31924,
		"work_status" => "Non European National"
	],
	[
		"id" => 24918,
		"user_id" => 30482,
		"work_status" => "0"
	],
	[
		"id" => 24919,
		"user_id" => 29004,
		"work_status" => "Non European National"
	],
	[
		"id" => 24920,
		"user_id" => 30484,
		"work_status" => "Non European National"
	],
	[
		"id" => 24921,
		"user_id" => 30485,
		"work_status" => "Non European National"
	],
	[
		"id" => 27034,
		"user_id" => 33651,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24923,
		"user_id" => 28860,
		"work_status" => "0"
	],
	[
		"id" => 24924,
		"user_id" => 30486,
		"work_status" => "Non European National"
	],
	[
		"id" => 24925,
		"user_id" => 28973,
		"work_status" => "European National"
	],
	[
		"id" => 24927,
		"user_id" => 30487,
		"work_status" => "Non European National"
	],
	[
		"id" => 24928,
		"user_id" => 30489,
		"work_status" => "Non European National"
	],
	[
		"id" => 24929,
		"user_id" => 30490,
		"work_status" => "European National"
	],
	[
		"id" => 24931,
		"user_id" => 30492,
		"work_status" => "European National"
	],
	[
		"id" => 24938,
		"user_id" => 30504,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24939,
		"user_id" => 30505,
		"work_status" => "Non European National"
	],
	[
		"id" => 24940,
		"user_id" => 30507,
		"work_status" => "Non European National"
	],
	[
		"id" => 27032,
		"user_id" => 33648,
		"work_status" => "European National"
	],
	[
		"id" => 24942,
		"user_id" => 30509,
		"work_status" => "Non European National"
	],
	[
		"id" => 24943,
		"user_id" => 30512,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24944,
		"user_id" => 30513,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24945,
		"user_id" => 30515,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24946,
		"user_id" => 30516,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24947,
		"user_id" => 30511,
		"work_status" => "Non European National"
	],
	[
		"id" => 24948,
		"user_id" => 30517,
		"work_status" => "Non European National"
	],
	[
		"id" => 24949,
		"user_id" => 30520,
		"work_status" => "European National"
	],
	[
		"id" => 24950,
		"user_id" => 30523,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24952,
		"user_id" => 30521,
		"work_status" => "European National"
	],
	[
		"id" => 24953,
		"user_id" => 30519,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24954,
		"user_id" => 30525,
		"work_status" => "Non European National"
	],
	[
		"id" => 24955,
		"user_id" => 30526,
		"work_status" => "Non European National"
	],
	[
		"id" => 24957,
		"user_id" => 30529,
		"work_status" => "Non European National"
	],
	[
		"id" => 24961,
		"user_id" => 30536,
		"work_status" => "0"
	],
	[
		"id" => 24962,
		"user_id" => 30532,
		"work_status" => "European National"
	],
	[
		"id" => 24963,
		"user_id" => 30537,
		"work_status" => "0"
	],
	[
		"id" => 24964,
		"user_id" => 30538,
		"work_status" => "Non European National"
	],
	[
		"id" => 24965,
		"user_id" => 30539,
		"work_status" => "Non European National"
	],
	[
		"id" => 24966,
		"user_id" => 30540,
		"work_status" => "0"
	],
	[
		"id" => 24967,
		"user_id" => 30541,
		"work_status" => "0"
	],
	[
		"id" => 24968,
		"user_id" => 30544,
		"work_status" => "0"
	],
	[
		"id" => 24969,
		"user_id" => 30545,
		"work_status" => "Non European National"
	],
	[
		"id" => 24970,
		"user_id" => 30547,
		"work_status" => "Non European National"
	],
	[
		"id" => 24971,
		"user_id" => 30548,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24972,
		"user_id" => 30550,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24973,
		"user_id" => 30552,
		"work_status" => "0"
	],
	[
		"id" => 24976,
		"user_id" => 30558,
		"work_status" => "0"
	],
	[
		"id" => 24977,
		"user_id" => 30562,
		"work_status" => "0"
	],
	[
		"id" => 24978,
		"user_id" => 30563,
		"work_status" => "Non European National"
	],
	[
		"id" => 24979,
		"user_id" => 30564,
		"work_status" => "European National"
	],
	[
		"id" => 24980,
		"user_id" => 30565,
		"work_status" => "0"
	],
	[
		"id" => 24981,
		"user_id" => 30566,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24982,
		"user_id" => 30568,
		"work_status" => "0"
	],
	[
		"id" => 24983,
		"user_id" => 30569,
		"work_status" => "Non European National"
	],
	[
		"id" => 24984,
		"user_id" => 30570,
		"work_status" => "0"
	],
	[
		"id" => 24985,
		"user_id" => 30571,
		"work_status" => "Non European National"
	],
	[
		"id" => 24986,
		"user_id" => 30573,
		"work_status" => "Non European National"
	],
	[
		"id" => 26875,
		"user_id" => 33465,
		"work_status" => "0"
	],
	[
		"id" => 26876,
		"user_id" => 33468,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24987,
		"user_id" => 30574,
		"work_status" => "European National"
	],
	[
		"id" => 24988,
		"user_id" => 30577,
		"work_status" => "0"
	],
	[
		"id" => 24989,
		"user_id" => 30580,
		"work_status" => "European National"
	],
	[
		"id" => 24990,
		"user_id" => 30581,
		"work_status" => "Non European National"
	],
	[
		"id" => 24991,
		"user_id" => 30582,
		"work_status" => "European National"
	],
	[
		"id" => 24992,
		"user_id" => 30553,
		"work_status" => "European National"
	],
	[
		"id" => 24993,
		"user_id" => 30508,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24994,
		"user_id" => 28943,
		"work_status" => "Non European National"
	],
	[
		"id" => 24995,
		"user_id" => 30584,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24996,
		"user_id" => 30586,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 24997,
		"user_id" => 30587,
		"work_status" => "0"
	],
	[
		"id" => 24998,
		"user_id" => 30589,
		"work_status" => "European National"
	],
	[
		"id" => 24999,
		"user_id" => 30590,
		"work_status" => "Non European National"
	],
	[
		"id" => 25000,
		"user_id" => 30596,
		"work_status" => "0"
	],
	[
		"id" => 25001,
		"user_id" => 30600,
		"work_status" => "0"
	],
	[
		"id" => 25002,
		"user_id" => 30603,
		"work_status" => "0"
	],
	[
		"id" => 25003,
		"user_id" => 30606,
		"work_status" => "0"
	],
	[
		"id" => 25004,
		"user_id" => 30607,
		"work_status" => "Non European National"
	],
	[
		"id" => 25005,
		"user_id" => 30611,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25006,
		"user_id" => 30613,
		"work_status" => "0"
	],
	[
		"id" => 25007,
		"user_id" => 30612,
		"work_status" => "0"
	],
	[
		"id" => 25008,
		"user_id" => 30614,
		"work_status" => "Non European National"
	],
	[
		"id" => 25009,
		"user_id" => 30616,
		"work_status" => "0"
	],
	[
		"id" => 25010,
		"user_id" => 30618,
		"work_status" => "0"
	],
	[
		"id" => 25011,
		"user_id" => 30621,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25012,
		"user_id" => 30622,
		"work_status" => "0"
	],
	[
		"id" => 25013,
		"user_id" => 30608,
		"work_status" => "Non European National"
	],
	[
		"id" => 25014,
		"user_id" => 30501,
		"work_status" => "European National"
	],
	[
		"id" => 25015,
		"user_id" => 30628,
		"work_status" => "European National"
	],
	[
		"id" => 25016,
		"user_id" => 30631,
		"work_status" => "0"
	],
	[
		"id" => 25017,
		"user_id" => 30633,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25018,
		"user_id" => 30634,
		"work_status" => "0"
	],
	[
		"id" => 25019,
		"user_id" => 30636,
		"work_status" => "European National"
	],
	[
		"id" => 25020,
		"user_id" => 30637,
		"work_status" => "0"
	],
	[
		"id" => 25021,
		"user_id" => 30638,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25022,
		"user_id" => 30639,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25023,
		"user_id" => 30643,
		"work_status" => "Non European National"
	],
	[
		"id" => 25024,
		"user_id" => 30645,
		"work_status" => "0"
	],
	[
		"id" => 25025,
		"user_id" => 30646,
		"work_status" => "Non European National"
	],
	[
		"id" => 25026,
		"user_id" => 30648,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25027,
		"user_id" => 30650,
		"work_status" => "European National"
	],
	[
		"id" => 25028,
		"user_id" => 30653,
		"work_status" => "0"
	],
	[
		"id" => 25029,
		"user_id" => 30657,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25030,
		"user_id" => 30655,
		"work_status" => "0"
	],
	[
		"id" => 25031,
		"user_id" => 30660,
		"work_status" => "European National"
	],
	[
		"id" => 25032,
		"user_id" => 30659,
		"work_status" => "Non European National"
	],
	[
		"id" => 25033,
		"user_id" => 30663,
		"work_status" => "0"
	],
	[
		"id" => 25034,
		"user_id" => 30665,
		"work_status" => "European National"
	],
	[
		"id" => 25035,
		"user_id" => 30666,
		"work_status" => "Non European National"
	],
	[
		"id" => 26309,
		"user_id" => 32673,
		"work_status" => "European National"
	],
	[
		"id" => 25037,
		"user_id" => 30668,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25038,
		"user_id" => 30673,
		"work_status" => "0"
	],
	[
		"id" => 25039,
		"user_id" => 30675,
		"work_status" => "0"
	],
	[
		"id" => 25040,
		"user_id" => 30677,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25041,
		"user_id" => 30678,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25042,
		"user_id" => 30680,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25043,
		"user_id" => 30681,
		"work_status" => "0"
	],
	[
		"id" => 25044,
		"user_id" => 30682,
		"work_status" => "0"
	],
	[
		"id" => 25045,
		"user_id" => 30685,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25046,
		"user_id" => 30687,
		"work_status" => "0"
	],
	[
		"id" => 25047,
		"user_id" => 30689,
		"work_status" => "0"
	],
	[
		"id" => 25048,
		"user_id" => 30690,
		"work_status" => "0"
	],
	[
		"id" => 25049,
		"user_id" => 30691,
		"work_status" => "0"
	],
	[
		"id" => 25050,
		"user_id" => 30695,
		"work_status" => "0"
	],
	[
		"id" => 25051,
		"user_id" => 30697,
		"work_status" => "0"
	],
	[
		"id" => 25052,
		"user_id" => 30670,
		"work_status" => "0"
	],
	[
		"id" => 25053,
		"user_id" => 30698,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25054,
		"user_id" => 30703,
		"work_status" => "European National"
	],
	[
		"id" => 25055,
		"user_id" => 30704,
		"work_status" => "0"
	],
	[
		"id" => 25056,
		"user_id" => 30705,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25057,
		"user_id" => 30654,
		"work_status" => "European National"
	],
	[
		"id" => 25058,
		"user_id" => 30711,
		"work_status" => "European National"
	],
	[
		"id" => 25059,
		"user_id" => 30712,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25060,
		"user_id" => 30713,
		"work_status" => "European National"
	],
	[
		"id" => 25061,
		"user_id" => 30716,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25062,
		"user_id" => 30717,
		"work_status" => "European National"
	],
	[
		"id" => 25063,
		"user_id" => 30718,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25064,
		"user_id" => 30720,
		"work_status" => "0"
	],
	[
		"id" => 25065,
		"user_id" => 30722,
		"work_status" => "Non European National"
	],
	[
		"id" => 25066,
		"user_id" => 30724,
		"work_status" => "European National"
	],
	[
		"id" => 25067,
		"user_id" => 30727,
		"work_status" => "0"
	],
	[
		"id" => 25068,
		"user_id" => 30726,
		"work_status" => "Non European National"
	],
	[
		"id" => 25069,
		"user_id" => 30725,
		"work_status" => "Non European National"
	],
	[
		"id" => 25070,
		"user_id" => 30728,
		"work_status" => "Non European National"
	],
	[
		"id" => 25071,
		"user_id" => 30730,
		"work_status" => "0"
	],
	[
		"id" => 25845,
		"user_id" => 31974,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25846,
		"user_id" => 31979,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25847,
		"user_id" => 31976,
		"work_status" => "Non European National"
	],
	[
		"id" => 25073,
		"user_id" => 30732,
		"work_status" => "0"
	],
	[
		"id" => 25074,
		"user_id" => 30719,
		"work_status" => "European National"
	],
	[
		"id" => 25075,
		"user_id" => 30736,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26442,
		"user_id" => 32836,
		"work_status" => "0"
	],
	[
		"id" => 26443,
		"user_id" => 32465,
		"work_status" => "Non European National"
	],
	[
		"id" => 25077,
		"user_id" => 30738,
		"work_status" => "0"
	],
	[
		"id" => 25078,
		"user_id" => 30739,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25079,
		"user_id" => 30740,
		"work_status" => "Non European National"
	],
	[
		"id" => 25080,
		"user_id" => 30741,
		"work_status" => "Non European National"
	],
	[
		"id" => 25081,
		"user_id" => 30743,
		"work_status" => "0"
	],
	[
		"id" => 25082,
		"user_id" => 30744,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25083,
		"user_id" => 30745,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25084,
		"user_id" => 30747,
		"work_status" => "0"
	],
	[
		"id" => 25085,
		"user_id" => 30749,
		"work_status" => "0"
	],
	[
		"id" => 25086,
		"user_id" => 30751,
		"work_status" => "0"
	],
	[
		"id" => 25087,
		"user_id" => 30658,
		"work_status" => "Non European National"
	],
	[
		"id" => 25088,
		"user_id" => 30754,
		"work_status" => "Non European National"
	],
	[
		"id" => 25089,
		"user_id" => 30756,
		"work_status" => "Non European National"
	],
	[
		"id" => 25090,
		"user_id" => 30761,
		"work_status" => "0"
	],
	[
		"id" => 27000,
		"user_id" => 33615,
		"work_status" => "Non European National"
	],
	[
		"id" => 25092,
		"user_id" => 30579,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25093,
		"user_id" => 30763,
		"work_status" => "0"
	],
	[
		"id" => 25094,
		"user_id" => 30764,
		"work_status" => "0"
	],
	[
		"id" => 25095,
		"user_id" => 30767,
		"work_status" => "0"
	],
	[
		"id" => 25096,
		"user_id" => 30768,
		"work_status" => "0"
	],
	[
		"id" => 25097,
		"user_id" => 30769,
		"work_status" => "Non European National"
	],
	[
		"id" => 25098,
		"user_id" => 30771,
		"work_status" => "European National"
	],
	[
		"id" => 25099,
		"user_id" => 30772,
		"work_status" => "0"
	],
	[
		"id" => 25100,
		"user_id" => 30774,
		"work_status" => "European National"
	],
	[
		"id" => 25101,
		"user_id" => 30775,
		"work_status" => "0"
	],
	[
		"id" => 25102,
		"user_id" => 30777,
		"work_status" => "European National"
	],
	[
		"id" => 25103,
		"user_id" => 30779,
		"work_status" => "European National"
	],
	[
		"id" => 25104,
		"user_id" => 30780,
		"work_status" => "Non European National"
	],
	[
		"id" => 25105,
		"user_id" => 25564,
		"work_status" => "European National"
	],
	[
		"id" => 25106,
		"user_id" => 30781,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25107,
		"user_id" => 30783,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25108,
		"user_id" => 30784,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25109,
		"user_id" => 30785,
		"work_status" => "0"
	],
	[
		"id" => 25110,
		"user_id" => 30791,
		"work_status" => "Non European National"
	],
	[
		"id" => 25111,
		"user_id" => 27243,
		"work_status" => "European National"
	],
	[
		"id" => 25112,
		"user_id" => 30793,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25113,
		"user_id" => 30792,
		"work_status" => "European National"
	],
	[
		"id" => 25114,
		"user_id" => 30794,
		"work_status" => "0"
	],
	[
		"id" => 25115,
		"user_id" => 30796,
		"work_status" => "0"
	],
	[
		"id" => 25116,
		"user_id" => 30797,
		"work_status" => "European National"
	],
	[
		"id" => 25117,
		"user_id" => 30799,
		"work_status" => "European National"
	],
	[
		"id" => 25118,
		"user_id" => 30801,
		"work_status" => "0"
	],
	[
		"id" => 25119,
		"user_id" => 30802,
		"work_status" => "Non European National"
	],
	[
		"id" => 25120,
		"user_id" => 30808,
		"work_status" => "0"
	],
	[
		"id" => 25121,
		"user_id" => 30809,
		"work_status" => "European National"
	],
	[
		"id" => 25122,
		"user_id" => 30810,
		"work_status" => "0"
	],
	[
		"id" => 25123,
		"user_id" => 30812,
		"work_status" => "0"
	],
	[
		"id" => 25124,
		"user_id" => 30813,
		"work_status" => "European National"
	],
	[
		"id" => 25125,
		"user_id" => 30814,
		"work_status" => "Non European National"
	],
	[
		"id" => 25126,
		"user_id" => 30815,
		"work_status" => "0"
	],
	[
		"id" => 25127,
		"user_id" => 30816,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25128,
		"user_id" => 30818,
		"work_status" => "Non European National"
	],
	[
		"id" => 25129,
		"user_id" => 30819,
		"work_status" => "European National"
	],
	[
		"id" => 25130,
		"user_id" => 30821,
		"work_status" => "European National"
	],
	[
		"id" => 25131,
		"user_id" => 30822,
		"work_status" => "European National"
	],
	[
		"id" => 25132,
		"user_id" => 30811,
		"work_status" => "European National"
	],
	[
		"id" => 25133,
		"user_id" => 30824,
		"work_status" => "European National"
	],
	[
		"id" => 25134,
		"user_id" => 30828,
		"work_status" => "Non European National"
	],
	[
		"id" => 25135,
		"user_id" => 30829,
		"work_status" => "Non European National"
	],
	[
		"id" => 25136,
		"user_id" => 30830,
		"work_status" => "0"
	],
	[
		"id" => 25137,
		"user_id" => 30833,
		"work_status" => "0"
	],
	[
		"id" => 25138,
		"user_id" => 26026,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25139,
		"user_id" => 30837,
		"work_status" => "0"
	],
	[
		"id" => 25140,
		"user_id" => 30750,
		"work_status" => "Non European National"
	],
	[
		"id" => 25141,
		"user_id" => 27279,
		"work_status" => "0"
	],
	[
		"id" => 25142,
		"user_id" => 27068,
		"work_status" => "European National"
	],
	[
		"id" => 25143,
		"user_id" => 30838,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25145,
		"user_id" => 30840,
		"work_status" => "0"
	],
	[
		"id" => 25146,
		"user_id" => 28979,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25155,
		"user_id" => 30850,
		"work_status" => "Non European National"
	],
	[
		"id" => 25156,
		"user_id" => 25702,
		"work_status" => "Non European National"
	],
	[
		"id" => 25157,
		"user_id" => 24741,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25158,
		"user_id" => 19712,
		"work_status" => "European National"
	],
	[
		"id" => 25159,
		"user_id" => 26714,
		"work_status" => "European National"
	],
	[
		"id" => 25160,
		"user_id" => 30848,
		"work_status" => "European National"
	],
	[
		"id" => 25162,
		"user_id" => 30852,
		"work_status" => "0"
	],
	[
		"id" => 25163,
		"user_id" => 30851,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25198,
		"user_id" => 30895,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25164,
		"user_id" => 30853,
		"work_status" => "0"
	],
	[
		"id" => 25168,
		"user_id" => 30860,
		"work_status" => "Non European National"
	],
	[
		"id" => 25169,
		"user_id" => 30863,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25170,
		"user_id" => 30865,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25172,
		"user_id" => 27048,
		"work_status" => "0"
	],
	[
		"id" => 25173,
		"user_id" => 30867,
		"work_status" => "Non European National"
	],
	[
		"id" => 25174,
		"user_id" => 30868,
		"work_status" => "0"
	],
	[
		"id" => 25175,
		"user_id" => 30870,
		"work_status" => "Non European National"
	],
	[
		"id" => 25176,
		"user_id" => 30872,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25177,
		"user_id" => 30869,
		"work_status" => "0"
	],
	[
		"id" => 25178,
		"user_id" => 30873,
		"work_status" => "0"
	],
	[
		"id" => 25179,
		"user_id" => 30841,
		"work_status" => "Non European National"
	],
	[
		"id" => 25180,
		"user_id" => 30708,
		"work_status" => "0"
	],
	[
		"id" => 25181,
		"user_id" => 30871,
		"work_status" => "Non European National"
	],
	[
		"id" => 25182,
		"user_id" => 30876,
		"work_status" => "Non European National"
	],
	[
		"id" => 27026,
		"user_id" => 33642,
		"work_status" => "European National"
	],
	[
		"id" => 25184,
		"user_id" => 30592,
		"work_status" => "Non European National"
	],
	[
		"id" => 25185,
		"user_id" => 30880,
		"work_status" => "0"
	],
	[
		"id" => 25186,
		"user_id" => 30875,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25187,
		"user_id" => 30879,
		"work_status" => "European National"
	],
	[
		"id" => 25188,
		"user_id" => 30882,
		"work_status" => "0"
	],
	[
		"id" => 25189,
		"user_id" => 30887,
		"work_status" => "0"
	],
	[
		"id" => 25190,
		"user_id" => 30888,
		"work_status" => "European National"
	],
	[
		"id" => 25191,
		"user_id" => 25742,
		"work_status" => "European National"
	],
	[
		"id" => 25192,
		"user_id" => 30889,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25193,
		"user_id" => 30892,
		"work_status" => "European National"
	],
	[
		"id" => 25194,
		"user_id" => 30891,
		"work_status" => "0"
	],
	[
		"id" => 25202,
		"user_id" => 30900,
		"work_status" => "0"
	],
	[
		"id" => 25203,
		"user_id" => 30901,
		"work_status" => "European National"
	],
	[
		"id" => 25204,
		"user_id" => 30902,
		"work_status" => "Non European National"
	],
	[
		"id" => 25205,
		"user_id" => 30899,
		"work_status" => "European National"
	],
	[
		"id" => 25206,
		"user_id" => 30904,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26272,
		"user_id" => 32626,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25208,
		"user_id" => 27221,
		"work_status" => "0"
	],
	[
		"id" => 25209,
		"user_id" => 30908,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25210,
		"user_id" => 24807,
		"work_status" => "0"
	],
	[
		"id" => 25211,
		"user_id" => 30911,
		"work_status" => "European National"
	],
	[
		"id" => 25212,
		"user_id" => 30913,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25213,
		"user_id" => 12606,
		"work_status" => "0"
	],
	[
		"id" => 25214,
		"user_id" => 19942,
		"work_status" => "Non European National"
	],
	[
		"id" => 25215,
		"user_id" => 30825,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25216,
		"user_id" => 30734,
		"work_status" => "European National"
	],
	[
		"id" => 25217,
		"user_id" => 30915,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25218,
		"user_id" => 30918,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25219,
		"user_id" => 30919,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25222,
		"user_id" => 30923,
		"work_status" => "0"
	],
	[
		"id" => 25223,
		"user_id" => 27125,
		"work_status" => "Non European National"
	],
	[
		"id" => 25225,
		"user_id" => 30930,
		"work_status" => "Non European National"
	],
	[
		"id" => 25226,
		"user_id" => 30931,
		"work_status" => "European National"
	],
	[
		"id" => 25227,
		"user_id" => 26636,
		"work_status" => "European National"
	],
	[
		"id" => 25228,
		"user_id" => 30936,
		"work_status" => "0"
	],
	[
		"id" => 25229,
		"user_id" => 30935,
		"work_status" => "Non European National"
	],
	[
		"id" => 25230,
		"user_id" => 30937,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25231,
		"user_id" => 30503,
		"work_status" => "0"
	],
	[
		"id" => 25233,
		"user_id" => 30939,
		"work_status" => "Non European National"
	],
	[
		"id" => 25234,
		"user_id" => 30941,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25235,
		"user_id" => 30942,
		"work_status" => "European National"
	],
	[
		"id" => 25236,
		"user_id" => 30943,
		"work_status" => "Non European National"
	],
	[
		"id" => 25237,
		"user_id" => 30946,
		"work_status" => "0"
	],
	[
		"id" => 25238,
		"user_id" => 30947,
		"work_status" => "Non European National"
	],
	[
		"id" => 25239,
		"user_id" => 30948,
		"work_status" => "Non European National"
	],
	[
		"id" => 25240,
		"user_id" => 30949,
		"work_status" => "European National"
	],
	[
		"id" => 25241,
		"user_id" => 19360,
		"work_status" => "European National"
	],
	[
		"id" => 26744,
		"user_id" => 32500,
		"work_status" => "European National"
	],
	[
		"id" => 25243,
		"user_id" => 30776,
		"work_status" => "Non European National"
	],
	[
		"id" => 25244,
		"user_id" => 30955,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25245,
		"user_id" => 30960,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25246,
		"user_id" => 30961,
		"work_status" => "Non European National"
	],
	[
		"id" => 25247,
		"user_id" => 30962,
		"work_status" => "0"
	],
	[
		"id" => 25248,
		"user_id" => 30963,
		"work_status" => "Non European National"
	],
	[
		"id" => 25249,
		"user_id" => 30938,
		"work_status" => "European National"
	],
	[
		"id" => 25250,
		"user_id" => 30965,
		"work_status" => "Non European National"
	],
	[
		"id" => 25251,
		"user_id" => 27052,
		"work_status" => "Non European National"
	],
	[
		"id" => 25252,
		"user_id" => 30967,
		"work_status" => "0"
	],
	[
		"id" => 25253,
		"user_id" => 30968,
		"work_status" => "0"
	],
	[
		"id" => 25254,
		"user_id" => 30969,
		"work_status" => "Non European National"
	],
	[
		"id" => 25255,
		"user_id" => 30787,
		"work_status" => "Non European National"
	],
	[
		"id" => 25256,
		"user_id" => 30973,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25257,
		"user_id" => 30975,
		"work_status" => "European National"
	],
	[
		"id" => 25258,
		"user_id" => 30976,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25259,
		"user_id" => 30977,
		"work_status" => "Non European National"
	],
	[
		"id" => 25260,
		"user_id" => 30979,
		"work_status" => "0"
	],
	[
		"id" => 25261,
		"user_id" => 30980,
		"work_status" => "European National"
	],
	[
		"id" => 25262,
		"user_id" => 30981,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25263,
		"user_id" => 30985,
		"work_status" => "Non European National"
	],
	[
		"id" => 25264,
		"user_id" => 30984,
		"work_status" => "European National"
	],
	[
		"id" => 25265,
		"user_id" => 30987,
		"work_status" => "Non European National"
	],
	[
		"id" => 25266,
		"user_id" => 30983,
		"work_status" => "European National"
	],
	[
		"id" => 25267,
		"user_id" => 30988,
		"work_status" => "0"
	],
	[
		"id" => 25268,
		"user_id" => 30982,
		"work_status" => "0"
	],
	[
		"id" => 25269,
		"user_id" => 30989,
		"work_status" => "European National"
	],
	[
		"id" => 25270,
		"user_id" => 30990,
		"work_status" => "0"
	],
	[
		"id" => 25271,
		"user_id" => 30996,
		"work_status" => "European National"
	],
	[
		"id" => 25272,
		"user_id" => 31000,
		"work_status" => "0"
	],
	[
		"id" => 25273,
		"user_id" => 30759,
		"work_status" => "Non European National"
	],
	[
		"id" => 25274,
		"user_id" => 31007,
		"work_status" => "0"
	],
	[
		"id" => 25275,
		"user_id" => 31008,
		"work_status" => "0"
	],
	[
		"id" => 25276,
		"user_id" => 31002,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25277,
		"user_id" => 31009,
		"work_status" => "European National"
	],
	[
		"id" => 25278,
		"user_id" => 31012,
		"work_status" => "Non European National"
	],
	[
		"id" => 25279,
		"user_id" => 30686,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25280,
		"user_id" => 31014,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25281,
		"user_id" => 31015,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25282,
		"user_id" => 31018,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25283,
		"user_id" => 30956,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25284,
		"user_id" => 31021,
		"work_status" => "European National"
	],
	[
		"id" => 25285,
		"user_id" => 31023,
		"work_status" => "0"
	],
	[
		"id" => 25286,
		"user_id" => 31026,
		"work_status" => "European National"
	],
	[
		"id" => 25287,
		"user_id" => 31029,
		"work_status" => "European National"
	],
	[
		"id" => 25288,
		"user_id" => 31030,
		"work_status" => "0"
	],
	[
		"id" => 25289,
		"user_id" => 31033,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25290,
		"user_id" => 31040,
		"work_status" => "Non European National"
	],
	[
		"id" => 25291,
		"user_id" => 31042,
		"work_status" => "European National"
	],
	[
		"id" => 25292,
		"user_id" => 30635,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25293,
		"user_id" => 20560,
		"work_status" => "Non European National"
	],
	[
		"id" => 25294,
		"user_id" => 31045,
		"work_status" => "European National"
	],
	[
		"id" => 25295,
		"user_id" => 31048,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25296,
		"user_id" => 31049,
		"work_status" => "Non European National"
	],
	[
		"id" => 25297,
		"user_id" => 31043,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25298,
		"user_id" => 31053,
		"work_status" => "0"
	],
	[
		"id" => 25299,
		"user_id" => 31054,
		"work_status" => "0"
	],
	[
		"id" => 25301,
		"user_id" => 19613,
		"work_status" => "0"
	],
	[
		"id" => 25302,
		"user_id" => 31058,
		"work_status" => "European National"
	],
	[
		"id" => 25303,
		"user_id" => 31059,
		"work_status" => "0"
	],
	[
		"id" => 25304,
		"user_id" => 31060,
		"work_status" => "Non European National"
	],
	[
		"id" => 25305,
		"user_id" => 31062,
		"work_status" => "Non European National"
	],
	[
		"id" => 25307,
		"user_id" => 31065,
		"work_status" => "0"
	],
	[
		"id" => 25308,
		"user_id" => 31067,
		"work_status" => "European National"
	],
	[
		"id" => 25309,
		"user_id" => 31061,
		"work_status" => "0"
	],
	[
		"id" => 25310,
		"user_id" => 31072,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25311,
		"user_id" => 31073,
		"work_status" => "Non European National"
	],
	[
		"id" => 25312,
		"user_id" => 31077,
		"work_status" => "Non European National"
	],
	[
		"id" => 25313,
		"user_id" => 30664,
		"work_status" => "European National"
	],
	[
		"id" => 25314,
		"user_id" => 31080,
		"work_status" => "0"
	],
	[
		"id" => 25315,
		"user_id" => 31081,
		"work_status" => "0"
	],
	[
		"id" => 25316,
		"user_id" => 31076,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25317,
		"user_id" => 31082,
		"work_status" => "European National"
	],
	[
		"id" => 25318,
		"user_id" => 31083,
		"work_status" => "Non European National"
	],
	[
		"id" => 26224,
		"user_id" => 32554,
		"work_status" => "Non European National"
	],
	[
		"id" => 25319,
		"user_id" => 31084,
		"work_status" => "European National"
	],
	[
		"id" => 25320,
		"user_id" => 31085,
		"work_status" => "0"
	],
	[
		"id" => 25321,
		"user_id" => 31086,
		"work_status" => "European National"
	],
	[
		"id" => 25322,
		"user_id" => 31089,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25323,
		"user_id" => 31091,
		"work_status" => "0"
	],
	[
		"id" => 25324,
		"user_id" => 31090,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25325,
		"user_id" => 31092,
		"work_status" => "0"
	],
	[
		"id" => 25326,
		"user_id" => 31094,
		"work_status" => "European National"
	],
	[
		"id" => 25327,
		"user_id" => 31096,
		"work_status" => "Non European National"
	],
	[
		"id" => 25328,
		"user_id" => 31097,
		"work_status" => "0"
	],
	[
		"id" => 25329,
		"user_id" => 30845,
		"work_status" => "European National"
	],
	[
		"id" => 25330,
		"user_id" => 31098,
		"work_status" => "0"
	],
	[
		"id" => 25331,
		"user_id" => 31016,
		"work_status" => "Non European National"
	],
	[
		"id" => 25332,
		"user_id" => 31101,
		"work_status" => "Non European National"
	],
	[
		"id" => 25333,
		"user_id" => 31070,
		"work_status" => "Non European National"
	],
	[
		"id" => 25334,
		"user_id" => 31102,
		"work_status" => "European National"
	],
	[
		"id" => 25335,
		"user_id" => 31088,
		"work_status" => "Non European National"
	],
	[
		"id" => 25336,
		"user_id" => 31107,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25337,
		"user_id" => 31108,
		"work_status" => "European National"
	],
	[
		"id" => 25338,
		"user_id" => 31112,
		"work_status" => "European National"
	],
	[
		"id" => 25339,
		"user_id" => 31113,
		"work_status" => "European National"
	],
	[
		"id" => 25340,
		"user_id" => 31114,
		"work_status" => "0"
	],
	[
		"id" => 25341,
		"user_id" => 31110,
		"work_status" => "European National"
	],
	[
		"id" => 25342,
		"user_id" => 31118,
		"work_status" => "Non European National"
	],
	[
		"id" => 25343,
		"user_id" => 31116,
		"work_status" => "0"
	],
	[
		"id" => 25344,
		"user_id" => 31117,
		"work_status" => "0"
	],
	[
		"id" => 25345,
		"user_id" => 31120,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25346,
		"user_id" => 31115,
		"work_status" => "European National"
	],
	[
		"id" => 25347,
		"user_id" => 31121,
		"work_status" => "0"
	],
	[
		"id" => 25348,
		"user_id" => 31122,
		"work_status" => "0"
	],
	[
		"id" => 25349,
		"user_id" => 31125,
		"work_status" => "0"
	],
	[
		"id" => 25350,
		"user_id" => 26031,
		"work_status" => "Non European National"
	],
	[
		"id" => 25351,
		"user_id" => 31126,
		"work_status" => "Non European National"
	],
	[
		"id" => 25352,
		"user_id" => 31128,
		"work_status" => "0"
	],
	[
		"id" => 25353,
		"user_id" => 31130,
		"work_status" => "Non European National"
	],
	[
		"id" => 25354,
		"user_id" => 31131,
		"work_status" => "0"
	],
	[
		"id" => 25355,
		"user_id" => 31133,
		"work_status" => "European National"
	],
	[
		"id" => 25357,
		"user_id" => 31136,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25358,
		"user_id" => 31139,
		"work_status" => "Non European National"
	],
	[
		"id" => 25359,
		"user_id" => 31142,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25360,
		"user_id" => 31141,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25361,
		"user_id" => 31134,
		"work_status" => "Non European National"
	],
	[
		"id" => 25362,
		"user_id" => 31144,
		"work_status" => "0"
	],
	[
		"id" => 25363,
		"user_id" => 31145,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25364,
		"user_id" => 31146,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25365,
		"user_id" => 30883,
		"work_status" => "Non European National"
	],
	[
		"id" => 25366,
		"user_id" => 31148,
		"work_status" => "European National"
	],
	[
		"id" => 25367,
		"user_id" => 31150,
		"work_status" => "0"
	],
	[
		"id" => 25368,
		"user_id" => 31153,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25369,
		"user_id" => 31155,
		"work_status" => "Non European National"
	],
	[
		"id" => 25370,
		"user_id" => 31156,
		"work_status" => "European National"
	],
	[
		"id" => 26743,
		"user_id" => 33266,
		"work_status" => "Non European National"
	],
	[
		"id" => 25371,
		"user_id" => 31157,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25372,
		"user_id" => 31158,
		"work_status" => "Non European National"
	],
	[
		"id" => 25373,
		"user_id" => 31159,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25374,
		"user_id" => 31162,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25375,
		"user_id" => 31163,
		"work_status" => "Non European National"
	],
	[
		"id" => 25376,
		"user_id" => 31164,
		"work_status" => "Non European National"
	],
	[
		"id" => 25377,
		"user_id" => 31166,
		"work_status" => "European National"
	],
	[
		"id" => 25378,
		"user_id" => 31172,
		"work_status" => "0"
	],
	[
		"id" => 25379,
		"user_id" => 31173,
		"work_status" => "Non European National"
	],
	[
		"id" => 25380,
		"user_id" => 31175,
		"work_status" => "0"
	],
	[
		"id" => 25381,
		"user_id" => 31174,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25382,
		"user_id" => 31177,
		"work_status" => "0"
	],
	[
		"id" => 25383,
		"user_id" => 31178,
		"work_status" => "Non European National"
	],
	[
		"id" => 25384,
		"user_id" => 31180,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25385,
		"user_id" => 31069,
		"work_status" => "0"
	],
	[
		"id" => 25386,
		"user_id" => 31184,
		"work_status" => "0"
	],
	[
		"id" => 25387,
		"user_id" => 31181,
		"work_status" => "Non European National"
	],
	[
		"id" => 25397,
		"user_id" => 9543,
		"work_status" => "Non European National"
	],
	[
		"id" => 25388,
		"user_id" => 31187,
		"work_status" => "European National"
	],
	[
		"id" => 25389,
		"user_id" => 31189,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25390,
		"user_id" => 31191,
		"work_status" => "Non European National"
	],
	[
		"id" => 25391,
		"user_id" => 31196,
		"work_status" => "European National"
	],
	[
		"id" => 25392,
		"user_id" => 31119,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25393,
		"user_id" => 26721,
		"work_status" => "European National"
	],
	[
		"id" => 25394,
		"user_id" => 31199,
		"work_status" => "0"
	],
	[
		"id" => 25395,
		"user_id" => 31202,
		"work_status" => "Non European National"
	],
	[
		"id" => 27405,
		"user_id" => 34187,
		"work_status" => "0"
	],
	[
		"id" => 26433,
		"user_id" => 31252,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25398,
		"user_id" => 31211,
		"work_status" => "0"
	],
	[
		"id" => 25399,
		"user_id" => 31212,
		"work_status" => "0"
	],
	[
		"id" => 25400,
		"user_id" => 31214,
		"work_status" => "0"
	],
	[
		"id" => 25401,
		"user_id" => 31215,
		"work_status" => "0"
	],
	[
		"id" => 25402,
		"user_id" => 31216,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25406,
		"user_id" => 31226,
		"work_status" => "Non European National"
	],
	[
		"id" => 25407,
		"user_id" => 31227,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25408,
		"user_id" => 31230,
		"work_status" => "0"
	],
	[
		"id" => 25409,
		"user_id" => 31231,
		"work_status" => "Non European National"
	],
	[
		"id" => 25410,
		"user_id" => 31234,
		"work_status" => "Non European National"
	],
	[
		"id" => 25411,
		"user_id" => 27017,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25412,
		"user_id" => 31235,
		"work_status" => "0"
	],
	[
		"id" => 25413,
		"user_id" => 31241,
		"work_status" => "European National"
	],
	[
		"id" => 25414,
		"user_id" => 31242,
		"work_status" => "0"
	],
	[
		"id" => 25415,
		"user_id" => 31243,
		"work_status" => "Non European National"
	],
	[
		"id" => 25416,
		"user_id" => 31246,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25417,
		"user_id" => 25967,
		"work_status" => "European National"
	],
	[
		"id" => 25418,
		"user_id" => 31253,
		"work_status" => "0"
	],
	[
		"id" => 25419,
		"user_id" => 31254,
		"work_status" => "Non European National"
	],
	[
		"id" => 25420,
		"user_id" => 31258,
		"work_status" => "0"
	],
	[
		"id" => 25421,
		"user_id" => 31255,
		"work_status" => "European National"
	],
	[
		"id" => 25422,
		"user_id" => 31262,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25423,
		"user_id" => 31268,
		"work_status" => "0"
	],
	[
		"id" => 25424,
		"user_id" => 31259,
		"work_status" => "Non European National"
	],
	[
		"id" => 25425,
		"user_id" => 31271,
		"work_status" => "Non European National"
	],
	[
		"id" => 25426,
		"user_id" => 31274,
		"work_status" => "European National"
	],
	[
		"id" => 25529,
		"user_id" => 31244,
		"work_status" => "European National"
	],
	[
		"id" => 25530,
		"user_id" => 31457,
		"work_status" => "European National"
	],
	[
		"id" => 25428,
		"user_id" => 31276,
		"work_status" => "European National"
	],
	[
		"id" => 25429,
		"user_id" => 31278,
		"work_status" => "Non European National"
	],
	[
		"id" => 25430,
		"user_id" => 31279,
		"work_status" => "0"
	],
	[
		"id" => 25431,
		"user_id" => 31281,
		"work_status" => "European National"
	],
	[
		"id" => 25432,
		"user_id" => 31284,
		"work_status" => "0"
	],
	[
		"id" => 25433,
		"user_id" => 31283,
		"work_status" => "0"
	],
	[
		"id" => 25434,
		"user_id" => 31288,
		"work_status" => "European National"
	],
	[
		"id" => 25435,
		"user_id" => 31287,
		"work_status" => "European National"
	],
	[
		"id" => 25436,
		"user_id" => 31282,
		"work_status" => "European National"
	],
	[
		"id" => 25437,
		"user_id" => 31206,
		"work_status" => "European National"
	],
	[
		"id" => 25438,
		"user_id" => 31293,
		"work_status" => "0"
	],
	[
		"id" => 26102,
		"user_id" => 32359,
		"work_status" => "European National"
	],
	[
		"id" => 25439,
		"user_id" => 31295,
		"work_status" => "0"
	],
	[
		"id" => 25440,
		"user_id" => 31301,
		"work_status" => "European National"
	],
	[
		"id" => 25441,
		"user_id" => 31299,
		"work_status" => "European National"
	],
	[
		"id" => 25442,
		"user_id" => 31296,
		"work_status" => "Non European National"
	],
	[
		"id" => 25443,
		"user_id" => 31305,
		"work_status" => "Non European National"
	],
	[
		"id" => 25444,
		"user_id" => 31310,
		"work_status" => "0"
	],
	[
		"id" => 25445,
		"user_id" => 31309,
		"work_status" => "European National"
	],
	[
		"id" => 25446,
		"user_id" => 31312,
		"work_status" => "Non European National"
	],
	[
		"id" => 25447,
		"user_id" => 31315,
		"work_status" => "Non European National"
	],
	[
		"id" => 25448,
		"user_id" => 31316,
		"work_status" => "Non European National"
	],
	[
		"id" => 25449,
		"user_id" => 31318,
		"work_status" => "Non European National"
	],
	[
		"id" => 25450,
		"user_id" => 31319,
		"work_status" => "0"
	],
	[
		"id" => 25451,
		"user_id" => 31320,
		"work_status" => "0"
	],
	[
		"id" => 25452,
		"user_id" => 31321,
		"work_status" => "0"
	],
	[
		"id" => 25453,
		"user_id" => 31331,
		"work_status" => "0"
	],
	[
		"id" => 25454,
		"user_id" => 31327,
		"work_status" => "Non European National"
	],
	[
		"id" => 25455,
		"user_id" => 31329,
		"work_status" => "European National"
	],
	[
		"id" => 25456,
		"user_id" => 31332,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25457,
		"user_id" => 31334,
		"work_status" => "0"
	],
	[
		"id" => 25458,
		"user_id" => 31324,
		"work_status" => "0"
	],
	[
		"id" => 25459,
		"user_id" => 31337,
		"work_status" => "0"
	],
	[
		"id" => 26074,
		"user_id" => 32322,
		"work_status" => "0"
	],
	[
		"id" => 26075,
		"user_id" => 32323,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25461,
		"user_id" => 31341,
		"work_status" => "Non European National"
	],
	[
		"id" => 25462,
		"user_id" => 31344,
		"work_status" => "0"
	],
	[
		"id" => 25463,
		"user_id" => 31339,
		"work_status" => "Non European National"
	],
	[
		"id" => 25464,
		"user_id" => 31346,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25465,
		"user_id" => 31345,
		"work_status" => "Non European National"
	],
	[
		"id" => 25466,
		"user_id" => 31347,
		"work_status" => "0"
	],
	[
		"id" => 25467,
		"user_id" => 31350,
		"work_status" => "0"
	],
	[
		"id" => 25468,
		"user_id" => 31348,
		"work_status" => "Non European National"
	],
	[
		"id" => 25469,
		"user_id" => 31353,
		"work_status" => "Non European National"
	],
	[
		"id" => 25470,
		"user_id" => 31358,
		"work_status" => "0"
	],
	[
		"id" => 25471,
		"user_id" => 31356,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25472,
		"user_id" => 31359,
		"work_status" => "0"
	],
	[
		"id" => 25473,
		"user_id" => 31352,
		"work_status" => "Non European National"
	],
	[
		"id" => 25475,
		"user_id" => 31361,
		"work_status" => "Non European National"
	],
	[
		"id" => 25476,
		"user_id" => 31364,
		"work_status" => "0"
	],
	[
		"id" => 25477,
		"user_id" => 31365,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25478,
		"user_id" => 31368,
		"work_status" => "0"
	],
	[
		"id" => 25479,
		"user_id" => 31369,
		"work_status" => "European National"
	],
	[
		"id" => 25480,
		"user_id" => 31373,
		"work_status" => "European National"
	],
	[
		"id" => 25481,
		"user_id" => 31374,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25482,
		"user_id" => 31375,
		"work_status" => "Non European National"
	],
	[
		"id" => 25483,
		"user_id" => 31213,
		"work_status" => "0"
	],
	[
		"id" => 25484,
		"user_id" => 31277,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25485,
		"user_id" => 31379,
		"work_status" => "European National"
	],
	[
		"id" => 25486,
		"user_id" => 31380,
		"work_status" => "European National"
	],
	[
		"id" => 25487,
		"user_id" => 31382,
		"work_status" => "European National"
	],
	[
		"id" => 25488,
		"user_id" => 31385,
		"work_status" => "0"
	],
	[
		"id" => 25489,
		"user_id" => 31384,
		"work_status" => "0"
	],
	[
		"id" => 25490,
		"user_id" => 31383,
		"work_status" => "European National"
	],
	[
		"id" => 25491,
		"user_id" => 31386,
		"work_status" => "European National"
	],
	[
		"id" => 25492,
		"user_id" => 31387,
		"work_status" => "European National"
	],
	[
		"id" => 25493,
		"user_id" => 31388,
		"work_status" => "Non European National"
	],
	[
		"id" => 25494,
		"user_id" => 31390,
		"work_status" => "0"
	],
	[
		"id" => 25495,
		"user_id" => 31391,
		"work_status" => "Non European National"
	],
	[
		"id" => 25496,
		"user_id" => 31392,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25497,
		"user_id" => 31395,
		"work_status" => "0"
	],
	[
		"id" => 25498,
		"user_id" => 31394,
		"work_status" => "Non European National"
	],
	[
		"id" => 25499,
		"user_id" => 31397,
		"work_status" => "Non European National"
	],
	[
		"id" => 25500,
		"user_id" => 20923,
		"work_status" => "Non European National"
	],
	[
		"id" => 25501,
		"user_id" => 31398,
		"work_status" => "European National"
	],
	[
		"id" => 25502,
		"user_id" => 31399,
		"work_status" => "Non European National"
	],
	[
		"id" => 25503,
		"user_id" => 31404,
		"work_status" => "European National"
	],
	[
		"id" => 25504,
		"user_id" => 31407,
		"work_status" => "Non European National"
	],
	[
		"id" => 25505,
		"user_id" => 31409,
		"work_status" => "European National"
	],
	[
		"id" => 25506,
		"user_id" => 31410,
		"work_status" => "0"
	],
	[
		"id" => 25507,
		"user_id" => 31412,
		"work_status" => "Non European National"
	],
	[
		"id" => 25508,
		"user_id" => 31415,
		"work_status" => "Non European National"
	],
	[
		"id" => 25509,
		"user_id" => 31417,
		"work_status" => "0"
	],
	[
		"id" => 25510,
		"user_id" => 31418,
		"work_status" => "0"
	],
	[
		"id" => 25511,
		"user_id" => 31420,
		"work_status" => "0"
	],
	[
		"id" => 25512,
		"user_id" => 31419,
		"work_status" => "0"
	],
	[
		"id" => 25513,
		"user_id" => 31422,
		"work_status" => "0"
	],
	[
		"id" => 25514,
		"user_id" => 31426,
		"work_status" => "0"
	],
	[
		"id" => 25515,
		"user_id" => 31433,
		"work_status" => "Non European National"
	],
	[
		"id" => 25516,
		"user_id" => 31434,
		"work_status" => "Non European National"
	],
	[
		"id" => 25517,
		"user_id" => 31435,
		"work_status" => "0"
	],
	[
		"id" => 25518,
		"user_id" => 31436,
		"work_status" => "Non European National"
	],
	[
		"id" => 25519,
		"user_id" => 31444,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25520,
		"user_id" => 30864,
		"work_status" => "0"
	],
	[
		"id" => 25521,
		"user_id" => 31447,
		"work_status" => "0"
	],
	[
		"id" => 25522,
		"user_id" => 31449,
		"work_status" => "European National"
	],
	[
		"id" => 25523,
		"user_id" => 31308,
		"work_status" => "European National"
	],
	[
		"id" => 25524,
		"user_id" => 31450,
		"work_status" => "Non European National"
	],
	[
		"id" => 25525,
		"user_id" => 31249,
		"work_status" => "Non European National"
	],
	[
		"id" => 25526,
		"user_id" => 31452,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25527,
		"user_id" => 31454,
		"work_status" => "0"
	],
	[
		"id" => 25528,
		"user_id" => 31455,
		"work_status" => "European National"
	],
	[
		"id" => 25531,
		"user_id" => 31425,
		"work_status" => "European National"
	],
	[
		"id" => 25532,
		"user_id" => 31461,
		"work_status" => "European National"
	],
	[
		"id" => 25533,
		"user_id" => 26197,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25534,
		"user_id" => 31463,
		"work_status" => "Non European National"
	],
	[
		"id" => 25535,
		"user_id" => 31464,
		"work_status" => "European National"
	],
	[
		"id" => 25536,
		"user_id" => 31466,
		"work_status" => "European National"
	],
	[
		"id" => 26649,
		"user_id" => 33143,
		"work_status" => "Non European National"
	],
	[
		"id" => 25538,
		"user_id" => 31469,
		"work_status" => "0"
	],
	[
		"id" => 25539,
		"user_id" => 31473,
		"work_status" => "0"
	],
	[
		"id" => 25540,
		"user_id" => 31470,
		"work_status" => "European National"
	],
	[
		"id" => 25541,
		"user_id" => 31476,
		"work_status" => "0"
	],
	[
		"id" => 25544,
		"user_id" => 31486,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25545,
		"user_id" => 31491,
		"work_status" => "European National"
	],
	[
		"id" => 25546,
		"user_id" => 31490,
		"work_status" => "Non European National"
	],
	[
		"id" => 25547,
		"user_id" => 31493,
		"work_status" => "0"
	],
	[
		"id" => 25548,
		"user_id" => 31494,
		"work_status" => "0"
	],
	[
		"id" => 25549,
		"user_id" => 31496,
		"work_status" => "European National"
	],
	[
		"id" => 25550,
		"user_id" => 31499,
		"work_status" => "0"
	],
	[
		"id" => 25551,
		"user_id" => 31503,
		"work_status" => "Non European National"
	],
	[
		"id" => 25552,
		"user_id" => 31506,
		"work_status" => "Non European National"
	],
	[
		"id" => 25553,
		"user_id" => 31507,
		"work_status" => "European National"
	],
	[
		"id" => 25554,
		"user_id" => 31509,
		"work_status" => "Non European National"
	],
	[
		"id" => 25555,
		"user_id" => 31511,
		"work_status" => "0"
	],
	[
		"id" => 25556,
		"user_id" => 31510,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25557,
		"user_id" => 31512,
		"work_status" => "0"
	],
	[
		"id" => 25558,
		"user_id" => 31514,
		"work_status" => "0"
	],
	[
		"id" => 25559,
		"user_id" => 31517,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25560,
		"user_id" => 31515,
		"work_status" => "0"
	],
	[
		"id" => 25561,
		"user_id" => 31525,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25563,
		"user_id" => 31529,
		"work_status" => "European National"
	],
	[
		"id" => 25564,
		"user_id" => 31536,
		"work_status" => "European National"
	],
	[
		"id" => 25565,
		"user_id" => 31537,
		"work_status" => "Non European National"
	],
	[
		"id" => 25566,
		"user_id" => 31538,
		"work_status" => "European National"
	],
	[
		"id" => 25567,
		"user_id" => 31540,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25568,
		"user_id" => 31544,
		"work_status" => "European National"
	],
	[
		"id" => 25569,
		"user_id" => 31542,
		"work_status" => "Non European National"
	],
	[
		"id" => 25570,
		"user_id" => 31545,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25571,
		"user_id" => 31548,
		"work_status" => "Non European National"
	],
	[
		"id" => 25572,
		"user_id" => 31558,
		"work_status" => "0"
	],
	[
		"id" => 25573,
		"user_id" => 31552,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25574,
		"user_id" => 31562,
		"work_status" => "0"
	],
	[
		"id" => 25575,
		"user_id" => 31563,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25576,
		"user_id" => 31550,
		"work_status" => "0"
	],
	[
		"id" => 25577,
		"user_id" => 31560,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25578,
		"user_id" => 31561,
		"work_status" => "European National"
	],
	[
		"id" => 25579,
		"user_id" => 31555,
		"work_status" => "0"
	],
	[
		"id" => 25580,
		"user_id" => 31553,
		"work_status" => "Non European National"
	],
	[
		"id" => 25581,
		"user_id" => 31568,
		"work_status" => "0"
	],
	[
		"id" => 25582,
		"user_id" => 31571,
		"work_status" => "European National"
	],
	[
		"id" => 25583,
		"user_id" => 31574,
		"work_status" => "European National"
	],
	[
		"id" => 25584,
		"user_id" => 31577,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25585,
		"user_id" => 31573,
		"work_status" => "European National"
	],
	[
		"id" => 25586,
		"user_id" => 31541,
		"work_status" => "0"
	],
	[
		"id" => 25587,
		"user_id" => 31585,
		"work_status" => "European National"
	],
	[
		"id" => 25588,
		"user_id" => 31578,
		"work_status" => "European National"
	],
	[
		"id" => 25589,
		"user_id" => 31581,
		"work_status" => "Non European National"
	],
	[
		"id" => 25590,
		"user_id" => 31584,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25591,
		"user_id" => 31588,
		"work_status" => "0"
	],
	[
		"id" => 25592,
		"user_id" => 31591,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25593,
		"user_id" => 31589,
		"work_status" => "0"
	],
	[
		"id" => 25594,
		"user_id" => 31592,
		"work_status" => "0"
	],
	[
		"id" => 25595,
		"user_id" => 31595,
		"work_status" => "European National"
	],
	[
		"id" => 25596,
		"user_id" => 31598,
		"work_status" => "European National"
	],
	[
		"id" => 25597,
		"user_id" => 31596,
		"work_status" => "0"
	],
	[
		"id" => 25598,
		"user_id" => 31597,
		"work_status" => "European National"
	],
	[
		"id" => 25599,
		"user_id" => 31599,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25600,
		"user_id" => 31603,
		"work_status" => "0"
	],
	[
		"id" => 25601,
		"user_id" => 31602,
		"work_status" => "European National"
	],
	[
		"id" => 25602,
		"user_id" => 31607,
		"work_status" => "0"
	],
	[
		"id" => 25603,
		"user_id" => 31610,
		"work_status" => "European National"
	],
	[
		"id" => 25604,
		"user_id" => 31615,
		"work_status" => "0"
	],
	[
		"id" => 25605,
		"user_id" => 31608,
		"work_status" => "European National"
	],
	[
		"id" => 25606,
		"user_id" => 31576,
		"work_status" => "European National"
	],
	[
		"id" => 25607,
		"user_id" => 31617,
		"work_status" => "0"
	],
	[
		"id" => 25608,
		"user_id" => 31606,
		"work_status" => "European National"
	],
	[
		"id" => 25609,
		"user_id" => 31618,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25610,
		"user_id" => 31620,
		"work_status" => "Non European National"
	],
	[
		"id" => 25611,
		"user_id" => 31619,
		"work_status" => "Non European National"
	],
	[
		"id" => 25612,
		"user_id" => 31621,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25613,
		"user_id" => 31624,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25614,
		"user_id" => 31628,
		"work_status" => "0"
	],
	[
		"id" => 25615,
		"user_id" => 31627,
		"work_status" => "Non European National"
	],
	[
		"id" => 25617,
		"user_id" => 31524,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25618,
		"user_id" => 31629,
		"work_status" => "European National"
	],
	[
		"id" => 25619,
		"user_id" => 31523,
		"work_status" => "European National"
	],
	[
		"id" => 25620,
		"user_id" => 31604,
		"work_status" => "European National"
	],
	[
		"id" => 25621,
		"user_id" => 31635,
		"work_status" => "0"
	],
	[
		"id" => 25622,
		"user_id" => 31637,
		"work_status" => "0"
	],
	[
		"id" => 25623,
		"user_id" => 31638,
		"work_status" => "Non European National"
	],
	[
		"id" => 25624,
		"user_id" => 31640,
		"work_status" => "0"
	],
	[
		"id" => 25625,
		"user_id" => 31641,
		"work_status" => "Non European National"
	],
	[
		"id" => 25626,
		"user_id" => 31642,
		"work_status" => "European National"
	],
	[
		"id" => 25627,
		"user_id" => 31646,
		"work_status" => "Non European National"
	],
	[
		"id" => 25628,
		"user_id" => 31649,
		"work_status" => "0"
	],
	[
		"id" => 25629,
		"user_id" => 31650,
		"work_status" => "0"
	],
	[
		"id" => 25630,
		"user_id" => 30559,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26311,
		"user_id" => 32676,
		"work_status" => "0"
	],
	[
		"id" => 26312,
		"user_id" => 32412,
		"work_status" => "European National"
	],
	[
		"id" => 25632,
		"user_id" => 31657,
		"work_status" => "Non European National"
	],
	[
		"id" => 25633,
		"user_id" => 26726,
		"work_status" => "European National"
	],
	[
		"id" => 25634,
		"user_id" => 31659,
		"work_status" => "European National"
	],
	[
		"id" => 25635,
		"user_id" => 31658,
		"work_status" => "0"
	],
	[
		"id" => 25636,
		"user_id" => 31661,
		"work_status" => "0"
	],
	[
		"id" => 25637,
		"user_id" => 31660,
		"work_status" => "0"
	],
	[
		"id" => 25638,
		"user_id" => 31663,
		"work_status" => "Non European National"
	],
	[
		"id" => 25639,
		"user_id" => 31666,
		"work_status" => "European National"
	],
	[
		"id" => 25640,
		"user_id" => 31670,
		"work_status" => "0"
	],
	[
		"id" => 25641,
		"user_id" => 31671,
		"work_status" => "0"
	],
	[
		"id" => 25642,
		"user_id" => 31672,
		"work_status" => "European National"
	],
	[
		"id" => 25643,
		"user_id" => 31673,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25644,
		"user_id" => 31675,
		"work_status" => "0"
	],
	[
		"id" => 25645,
		"user_id" => 31676,
		"work_status" => "0"
	],
	[
		"id" => 25646,
		"user_id" => 31678,
		"work_status" => "0"
	],
	[
		"id" => 25650,
		"user_id" => 31684,
		"work_status" => "0"
	],
	[
		"id" => 25651,
		"user_id" => 31687,
		"work_status" => "Non European National"
	],
	[
		"id" => 25914,
		"user_id" => 32094,
		"work_status" => "0"
	],
	[
		"id" => 25915,
		"user_id" => 32095,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25916,
		"user_id" => 32096,
		"work_status" => "Non European National"
	],
	[
		"id" => 25653,
		"user_id" => 31689,
		"work_status" => "European National"
	],
	[
		"id" => 25654,
		"user_id" => 31690,
		"work_status" => "Non European National"
	],
	[
		"id" => 25655,
		"user_id" => 31692,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25656,
		"user_id" => 31691,
		"work_status" => "European National"
	],
	[
		"id" => 25657,
		"user_id" => 31686,
		"work_status" => "European National"
	],
	[
		"id" => 25658,
		"user_id" => 31696,
		"work_status" => "0"
	],
	[
		"id" => 25659,
		"user_id" => 31697,
		"work_status" => "Non European National"
	],
	[
		"id" => 25660,
		"user_id" => 31698,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25661,
		"user_id" => 31699,
		"work_status" => "0"
	],
	[
		"id" => 25662,
		"user_id" => 31700,
		"work_status" => "0"
	],
	[
		"id" => 25663,
		"user_id" => 31701,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25664,
		"user_id" => 31704,
		"work_status" => "European National"
	],
	[
		"id" => 25665,
		"user_id" => 31708,
		"work_status" => "0"
	],
	[
		"id" => 25666,
		"user_id" => 31656,
		"work_status" => "0"
	],
	[
		"id" => 25667,
		"user_id" => 31711,
		"work_status" => "0"
	],
	[
		"id" => 25668,
		"user_id" => 31710,
		"work_status" => "0"
	],
	[
		"id" => 25669,
		"user_id" => 31713,
		"work_status" => "Non European National"
	],
	[
		"id" => 25670,
		"user_id" => 31721,
		"work_status" => "Non European National"
	],
	[
		"id" => 25671,
		"user_id" => 31715,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25672,
		"user_id" => 31719,
		"work_status" => "European National"
	],
	[
		"id" => 25673,
		"user_id" => 31725,
		"work_status" => "0"
	],
	[
		"id" => 25674,
		"user_id" => 26131,
		"work_status" => "Non European National"
	],
	[
		"id" => 25675,
		"user_id" => 31730,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25676,
		"user_id" => 31723,
		"work_status" => "Non European National"
	],
	[
		"id" => 25677,
		"user_id" => 31735,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25678,
		"user_id" => 31736,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25679,
		"user_id" => 31739,
		"work_status" => "0"
	],
	[
		"id" => 25680,
		"user_id" => 31738,
		"work_status" => "European National"
	],
	[
		"id" => 25681,
		"user_id" => 31745,
		"work_status" => "Non European National"
	],
	[
		"id" => 25682,
		"user_id" => 31746,
		"work_status" => "Non European National"
	],
	[
		"id" => 25683,
		"user_id" => 31749,
		"work_status" => "European National"
	],
	[
		"id" => 25684,
		"user_id" => 31750,
		"work_status" => "European National"
	],
	[
		"id" => 25685,
		"user_id" => 31752,
		"work_status" => "Non European National"
	],
	[
		"id" => 25686,
		"user_id" => 27093,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25687,
		"user_id" => 31747,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25688,
		"user_id" => 31753,
		"work_status" => "European National"
	],
	[
		"id" => 25689,
		"user_id" => 31754,
		"work_status" => "0"
	],
	[
		"id" => 25690,
		"user_id" => 31756,
		"work_status" => "Non European National"
	],
	[
		"id" => 25691,
		"user_id" => 31758,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25692,
		"user_id" => 31760,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25693,
		"user_id" => 31462,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25694,
		"user_id" => 31761,
		"work_status" => "0"
	],
	[
		"id" => 25695,
		"user_id" => 31764,
		"work_status" => "0"
	],
	[
		"id" => 25696,
		"user_id" => 31766,
		"work_status" => "0"
	],
	[
		"id" => 25697,
		"user_id" => 31767,
		"work_status" => "European National"
	],
	[
		"id" => 25698,
		"user_id" => 31770,
		"work_status" => "Non European National"
	],
	[
		"id" => 25699,
		"user_id" => 31771,
		"work_status" => "European National"
	],
	[
		"id" => 25700,
		"user_id" => 31772,
		"work_status" => "0"
	],
	[
		"id" => 25701,
		"user_id" => 31773,
		"work_status" => "Non European National"
	],
	[
		"id" => 25702,
		"user_id" => 31775,
		"work_status" => "0"
	],
	[
		"id" => 25703,
		"user_id" => 31776,
		"work_status" => "Non European National"
	],
	[
		"id" => 25704,
		"user_id" => 31777,
		"work_status" => "Non European National"
	],
	[
		"id" => 25705,
		"user_id" => 31778,
		"work_status" => "Non European National"
	],
	[
		"id" => 25706,
		"user_id" => 31780,
		"work_status" => "0"
	],
	[
		"id" => 25707,
		"user_id" => 31785,
		"work_status" => "0"
	],
	[
		"id" => 25708,
		"user_id" => 31784,
		"work_status" => "0"
	],
	[
		"id" => 25709,
		"user_id" => 31720,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25710,
		"user_id" => 31786,
		"work_status" => "0"
	],
	[
		"id" => 25711,
		"user_id" => 31788,
		"work_status" => "European National"
	],
	[
		"id" => 25712,
		"user_id" => 31648,
		"work_status" => "0"
	],
	[
		"id" => 25713,
		"user_id" => 31781,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25714,
		"user_id" => 31792,
		"work_status" => "European National"
	],
	[
		"id" => 25715,
		"user_id" => 31742,
		"work_status" => "Non European National"
	],
	[
		"id" => 25717,
		"user_id" => 31795,
		"work_status" => "0"
	],
	[
		"id" => 25718,
		"user_id" => 31797,
		"work_status" => "Non European National"
	],
	[
		"id" => 25719,
		"user_id" => 31801,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25720,
		"user_id" => 31802,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25721,
		"user_id" => 31803,
		"work_status" => "0"
	],
	[
		"id" => 25722,
		"user_id" => 31804,
		"work_status" => "0"
	],
	[
		"id" => 25723,
		"user_id" => 31808,
		"work_status" => "0"
	],
	[
		"id" => 25724,
		"user_id" => 31811,
		"work_status" => "Non European National"
	],
	[
		"id" => 25725,
		"user_id" => 31812,
		"work_status" => "0"
	],
	[
		"id" => 25726,
		"user_id" => 31814,
		"work_status" => "0"
	],
	[
		"id" => 25727,
		"user_id" => 31819,
		"work_status" => "Non European National"
	],
	[
		"id" => 25728,
		"user_id" => 31810,
		"work_status" => "Non European National"
	],
	[
		"id" => 25729,
		"user_id" => 31822,
		"work_status" => "Non European National"
	],
	[
		"id" => 25730,
		"user_id" => 20894,
		"work_status" => "Non European National"
	],
	[
		"id" => 25731,
		"user_id" => 31828,
		"work_status" => "0"
	],
	[
		"id" => 25732,
		"user_id" => 31831,
		"work_status" => "Non European National"
	],
	[
		"id" => 25733,
		"user_id" => 31833,
		"work_status" => "0"
	],
	[
		"id" => 25734,
		"user_id" => 31834,
		"work_status" => "0"
	],
	[
		"id" => 25735,
		"user_id" => 31835,
		"work_status" => "European National"
	],
	[
		"id" => 25736,
		"user_id" => 31744,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25737,
		"user_id" => 31840,
		"work_status" => "0"
	],
	[
		"id" => 25738,
		"user_id" => 31844,
		"work_status" => "European National"
	],
	[
		"id" => 25739,
		"user_id" => 31839,
		"work_status" => "European National"
	],
	[
		"id" => 25740,
		"user_id" => 31846,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25741,
		"user_id" => 31847,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25742,
		"user_id" => 31848,
		"work_status" => "Non European National"
	],
	[
		"id" => 25743,
		"user_id" => 31850,
		"work_status" => "0"
	],
	[
		"id" => 25744,
		"user_id" => 31849,
		"work_status" => "0"
	],
	[
		"id" => 25745,
		"user_id" => 31823,
		"work_status" => "European National"
	],
	[
		"id" => 25746,
		"user_id" => 31851,
		"work_status" => "European National"
	],
	[
		"id" => 25747,
		"user_id" => 31854,
		"work_status" => "0"
	],
	[
		"id" => 25748,
		"user_id" => 31853,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25749,
		"user_id" => 31855,
		"work_status" => "0"
	],
	[
		"id" => 25750,
		"user_id" => 31858,
		"work_status" => "0"
	],
	[
		"id" => 25751,
		"user_id" => 31859,
		"work_status" => "Non European National"
	],
	[
		"id" => 25752,
		"user_id" => 31860,
		"work_status" => "European National"
	],
	[
		"id" => 25753,
		"user_id" => 31863,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25754,
		"user_id" => 31864,
		"work_status" => "Non European National"
	],
	[
		"id" => 25755,
		"user_id" => 31866,
		"work_status" => "Non European National"
	],
	[
		"id" => 25756,
		"user_id" => 31867,
		"work_status" => "Non European National"
	],
	[
		"id" => 25757,
		"user_id" => 31791,
		"work_status" => "European National"
	],
	[
		"id" => 25758,
		"user_id" => 31868,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25759,
		"user_id" => 31869,
		"work_status" => "0"
	],
	[
		"id" => 25760,
		"user_id" => 31871,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25761,
		"user_id" => 31874,
		"work_status" => "Non European National"
	],
	[
		"id" => 25762,
		"user_id" => 31875,
		"work_status" => "Non European National"
	],
	[
		"id" => 25763,
		"user_id" => 31877,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25764,
		"user_id" => 31876,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25765,
		"user_id" => 31879,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25766,
		"user_id" => 31856,
		"work_status" => "Non European National"
	],
	[
		"id" => 25767,
		"user_id" => 31880,
		"work_status" => "Non European National"
	],
	[
		"id" => 25768,
		"user_id" => 31881,
		"work_status" => "European National"
	],
	[
		"id" => 25769,
		"user_id" => 31882,
		"work_status" => "0"
	],
	[
		"id" => 25770,
		"user_id" => 31884,
		"work_status" => "European National"
	],
	[
		"id" => 25771,
		"user_id" => 31885,
		"work_status" => "Non European National"
	],
	[
		"id" => 25772,
		"user_id" => 31888,
		"work_status" => "European National"
	],
	[
		"id" => 25773,
		"user_id" => 31889,
		"work_status" => "0"
	],
	[
		"id" => 25774,
		"user_id" => 31891,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25775,
		"user_id" => 31878,
		"work_status" => "European National"
	],
	[
		"id" => 25776,
		"user_id" => 31893,
		"work_status" => "Non European National"
	],
	[
		"id" => 25777,
		"user_id" => 31894,
		"work_status" => "0"
	],
	[
		"id" => 25778,
		"user_id" => 31895,
		"work_status" => "0"
	],
	[
		"id" => 25829,
		"user_id" => 31897,
		"work_status" => "European National"
	],
	[
		"id" => 25830,
		"user_id" => 31951,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25831,
		"user_id" => 30826,
		"work_status" => "0"
	],
	[
		"id" => 25832,
		"user_id" => 31952,
		"work_status" => "Non European National"
	],
	[
		"id" => 25833,
		"user_id" => 31954,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27272,
		"user_id" => 33979,
		"work_status" => "Non European National"
	],
	[
		"id" => 25835,
		"user_id" => 31956,
		"work_status" => "Non European National"
	],
	[
		"id" => 25836,
		"user_id" => 31957,
		"work_status" => "Non European National"
	],
	[
		"id" => 25837,
		"user_id" => 31959,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25838,
		"user_id" => 31960,
		"work_status" => "Non European National"
	],
	[
		"id" => 25839,
		"user_id" => 31962,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25840,
		"user_id" => 31205,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25841,
		"user_id" => 31965,
		"work_status" => "European National"
	],
	[
		"id" => 25842,
		"user_id" => 31967,
		"work_status" => "0"
	],
	[
		"id" => 25843,
		"user_id" => 31971,
		"work_status" => "0"
	],
	[
		"id" => 25844,
		"user_id" => 31982,
		"work_status" => "Non European National"
	],
	[
		"id" => 25848,
		"user_id" => 31978,
		"work_status" => "European National"
	],
	[
		"id" => 25849,
		"user_id" => 31987,
		"work_status" => "0"
	],
	[
		"id" => 25850,
		"user_id" => 31992,
		"work_status" => "0"
	],
	[
		"id" => 25851,
		"user_id" => 31990,
		"work_status" => "0"
	],
	[
		"id" => 25852,
		"user_id" => 31980,
		"work_status" => "0"
	],
	[
		"id" => 25853,
		"user_id" => 31995,
		"work_status" => "European National"
	],
	[
		"id" => 25854,
		"user_id" => 31996,
		"work_status" => "0"
	],
	[
		"id" => 25855,
		"user_id" => 31993,
		"work_status" => "European National"
	],
	[
		"id" => 25856,
		"user_id" => 31994,
		"work_status" => "0"
	],
	[
		"id" => 25857,
		"user_id" => 31999,
		"work_status" => "Non European National"
	],
	[
		"id" => 25858,
		"user_id" => 31997,
		"work_status" => "0"
	],
	[
		"id" => 25859,
		"user_id" => 32002,
		"work_status" => "0"
	],
	[
		"id" => 25860,
		"user_id" => 32000,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25861,
		"user_id" => 32006,
		"work_status" => "European National"
	],
	[
		"id" => 25862,
		"user_id" => 32007,
		"work_status" => "Non European National"
	],
	[
		"id" => 25863,
		"user_id" => 32012,
		"work_status" => "European National"
	],
	[
		"id" => 25864,
		"user_id" => 32011,
		"work_status" => "European National"
	],
	[
		"id" => 25865,
		"user_id" => 32013,
		"work_status" => "0"
	],
	[
		"id" => 25866,
		"user_id" => 32015,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25867,
		"user_id" => 32016,
		"work_status" => "0"
	],
	[
		"id" => 25868,
		"user_id" => 32025,
		"work_status" => "0"
	],
	[
		"id" => 25869,
		"user_id" => 32024,
		"work_status" => "Non European National"
	],
	[
		"id" => 25870,
		"user_id" => 32026,
		"work_status" => "Non European National"
	],
	[
		"id" => 25871,
		"user_id" => 32028,
		"work_status" => "0"
	],
	[
		"id" => 25872,
		"user_id" => 32029,
		"work_status" => "0"
	],
	[
		"id" => 25873,
		"user_id" => 31817,
		"work_status" => "0"
	],
	[
		"id" => 25874,
		"user_id" => 32031,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25875,
		"user_id" => 32023,
		"work_status" => "0"
	],
	[
		"id" => 25876,
		"user_id" => 32033,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25877,
		"user_id" => 32034,
		"work_status" => "European National"
	],
	[
		"id" => 25878,
		"user_id" => 32035,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25879,
		"user_id" => 32036,
		"work_status" => "Non European National"
	],
	[
		"id" => 25880,
		"user_id" => 32039,
		"work_status" => "European National"
	],
	[
		"id" => 25881,
		"user_id" => 32041,
		"work_status" => "0"
	],
	[
		"id" => 25882,
		"user_id" => 32042,
		"work_status" => "Non European National"
	],
	[
		"id" => 25883,
		"user_id" => 32043,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25884,
		"user_id" => 32045,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25885,
		"user_id" => 32044,
		"work_status" => "0"
	],
	[
		"id" => 25886,
		"user_id" => 32047,
		"work_status" => "0"
	],
	[
		"id" => 25887,
		"user_id" => 32051,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25888,
		"user_id" => 32052,
		"work_status" => "0"
	],
	[
		"id" => 25889,
		"user_id" => 32055,
		"work_status" => "0"
	],
	[
		"id" => 25890,
		"user_id" => 32058,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25891,
		"user_id" => 32017,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25892,
		"user_id" => 32059,
		"work_status" => "0"
	],
	[
		"id" => 25893,
		"user_id" => 32056,
		"work_status" => "European National"
	],
	[
		"id" => 25894,
		"user_id" => 32060,
		"work_status" => "European National"
	],
	[
		"id" => 25895,
		"user_id" => 32063,
		"work_status" => "0"
	],
	[
		"id" => 25896,
		"user_id" => 32065,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25897,
		"user_id" => 32068,
		"work_status" => "European National"
	],
	[
		"id" => 25898,
		"user_id" => 32070,
		"work_status" => "0"
	],
	[
		"id" => 25899,
		"user_id" => 32022,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25900,
		"user_id" => 32072,
		"work_status" => "Non European National"
	],
	[
		"id" => 25901,
		"user_id" => 32074,
		"work_status" => "Non European National"
	],
	[
		"id" => 25902,
		"user_id" => 32075,
		"work_status" => "Non European National"
	],
	[
		"id" => 25903,
		"user_id" => 32076,
		"work_status" => "Non European National"
	],
	[
		"id" => 25904,
		"user_id" => 32077,
		"work_status" => "0"
	],
	[
		"id" => 25905,
		"user_id" => 32079,
		"work_status" => "0"
	],
	[
		"id" => 25906,
		"user_id" => 32080,
		"work_status" => "Non European National"
	],
	[
		"id" => 25907,
		"user_id" => 32085,
		"work_status" => "Non European National"
	],
	[
		"id" => 25908,
		"user_id" => 32073,
		"work_status" => "0"
	],
	[
		"id" => 25909,
		"user_id" => 32087,
		"work_status" => "European National"
	],
	[
		"id" => 25910,
		"user_id" => 32088,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26509,
		"user_id" => 32922,
		"work_status" => "0"
	],
	[
		"id" => 26510,
		"user_id" => 32924,
		"work_status" => "Non European National"
	],
	[
		"id" => 25912,
		"user_id" => 32089,
		"work_status" => "0"
	],
	[
		"id" => 25913,
		"user_id" => 32093,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25917,
		"user_id" => 32090,
		"work_status" => "Non European National"
	],
	[
		"id" => 25918,
		"user_id" => 32098,
		"work_status" => "Non European National"
	],
	[
		"id" => 25919,
		"user_id" => 32099,
		"work_status" => "European National"
	],
	[
		"id" => 25920,
		"user_id" => 32100,
		"work_status" => "0"
	],
	[
		"id" => 25921,
		"user_id" => 32101,
		"work_status" => "0"
	],
	[
		"id" => 25922,
		"user_id" => 32103,
		"work_status" => "Non European National"
	],
	[
		"id" => 25923,
		"user_id" => 32104,
		"work_status" => "Non European National"
	],
	[
		"id" => 25924,
		"user_id" => 32105,
		"work_status" => "0"
	],
	[
		"id" => 25925,
		"user_id" => 32107,
		"work_status" => "0"
	],
	[
		"id" => 25926,
		"user_id" => 32108,
		"work_status" => "Non European National"
	],
	[
		"id" => 25927,
		"user_id" => 32109,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25928,
		"user_id" => 32111,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25929,
		"user_id" => 32112,
		"work_status" => "Non European National"
	],
	[
		"id" => 25930,
		"user_id" => 32097,
		"work_status" => "Non European National"
	],
	[
		"id" => 25932,
		"user_id" => 8750,
		"work_status" => "0"
	],
	[
		"id" => 25933,
		"user_id" => 32115,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25934,
		"user_id" => 32116,
		"work_status" => "Non European National"
	],
	[
		"id" => 25935,
		"user_id" => 32118,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25936,
		"user_id" => 32121,
		"work_status" => "0"
	],
	[
		"id" => 25937,
		"user_id" => 32123,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25938,
		"user_id" => 32126,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25939,
		"user_id" => 32127,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25940,
		"user_id" => 32128,
		"work_status" => "Non European National"
	],
	[
		"id" => 25941,
		"user_id" => 32129,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25942,
		"user_id" => 32130,
		"work_status" => "0"
	],
	[
		"id" => 25943,
		"user_id" => 32131,
		"work_status" => "0"
	],
	[
		"id" => 25944,
		"user_id" => 32132,
		"work_status" => "European National"
	],
	[
		"id" => 25945,
		"user_id" => 32133,
		"work_status" => "0"
	],
	[
		"id" => 25946,
		"user_id" => 32136,
		"work_status" => "0"
	],
	[
		"id" => 25947,
		"user_id" => 32138,
		"work_status" => "European National"
	],
	[
		"id" => 25948,
		"user_id" => 32139,
		"work_status" => "Non European National"
	],
	[
		"id" => 25949,
		"user_id" => 32142,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25950,
		"user_id" => 32145,
		"work_status" => "Non European National"
	],
	[
		"id" => 25951,
		"user_id" => 32146,
		"work_status" => "European National"
	],
	[
		"id" => 25952,
		"user_id" => 32147,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25953,
		"user_id" => 32148,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25954,
		"user_id" => 23198,
		"work_status" => "Non European National"
	],
	[
		"id" => 25955,
		"user_id" => 30790,
		"work_status" => "Non European National"
	],
	[
		"id" => 25956,
		"user_id" => 32150,
		"work_status" => "0"
	],
	[
		"id" => 25957,
		"user_id" => 32149,
		"work_status" => "0"
	],
	[
		"id" => 25958,
		"user_id" => 32151,
		"work_status" => "0"
	],
	[
		"id" => 25959,
		"user_id" => 32153,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25960,
		"user_id" => 32159,
		"work_status" => "European National"
	],
	[
		"id" => 25961,
		"user_id" => 31051,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25962,
		"user_id" => 32162,
		"work_status" => "Non European National"
	],
	[
		"id" => 25963,
		"user_id" => 32165,
		"work_status" => "Non European National"
	],
	[
		"id" => 25964,
		"user_id" => 25669,
		"work_status" => "Non European National"
	],
	[
		"id" => 25965,
		"user_id" => 32167,
		"work_status" => "European National"
	],
	[
		"id" => 25966,
		"user_id" => 32169,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25967,
		"user_id" => 32170,
		"work_status" => "European National"
	],
	[
		"id" => 25968,
		"user_id" => 32171,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25969,
		"user_id" => 32172,
		"work_status" => "0"
	],
	[
		"id" => 25970,
		"user_id" => 32175,
		"work_status" => "Non European National"
	],
	[
		"id" => 25971,
		"user_id" => 32176,
		"work_status" => "Non European National"
	],
	[
		"id" => 25972,
		"user_id" => 32177,
		"work_status" => "Non European National"
	],
	[
		"id" => 25973,
		"user_id" => 32179,
		"work_status" => "European National"
	],
	[
		"id" => 25974,
		"user_id" => 32021,
		"work_status" => "Non European National"
	],
	[
		"id" => 25975,
		"user_id" => 32184,
		"work_status" => "0"
	],
	[
		"id" => 25976,
		"user_id" => 32185,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25977,
		"user_id" => 19772,
		"work_status" => "0"
	],
	[
		"id" => 25978,
		"user_id" => 23097,
		"work_status" => "Non European National"
	],
	[
		"id" => 25979,
		"user_id" => 32188,
		"work_status" => "Non European National"
	],
	[
		"id" => 25980,
		"user_id" => 32187,
		"work_status" => "Non European National"
	],
	[
		"id" => 25981,
		"user_id" => 32189,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25982,
		"user_id" => 32190,
		"work_status" => "Non European National"
	],
	[
		"id" => 25983,
		"user_id" => 32191,
		"work_status" => "0"
	],
	[
		"id" => 25984,
		"user_id" => 32192,
		"work_status" => "Non European National"
	],
	[
		"id" => 25985,
		"user_id" => 32194,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25986,
		"user_id" => 32195,
		"work_status" => "Non European National"
	],
	[
		"id" => 25987,
		"user_id" => 32196,
		"work_status" => "Non European National"
	],
	[
		"id" => 25988,
		"user_id" => 32197,
		"work_status" => "European National"
	],
	[
		"id" => 25989,
		"user_id" => 32198,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25990,
		"user_id" => 32200,
		"work_status" => "0"
	],
	[
		"id" => 25991,
		"user_id" => 32203,
		"work_status" => "0"
	],
	[
		"id" => 25992,
		"user_id" => 32201,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25993,
		"user_id" => 32207,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 25994,
		"user_id" => 32210,
		"work_status" => "European National"
	],
	[
		"id" => 25995,
		"user_id" => 32212,
		"work_status" => "Non European National"
	],
	[
		"id" => 25996,
		"user_id" => 32213,
		"work_status" => "Non European National"
	],
	[
		"id" => 25997,
		"user_id" => 32214,
		"work_status" => "0"
	],
	[
		"id" => 25999,
		"user_id" => 32216,
		"work_status" => "Non European National"
	],
	[
		"id" => 26000,
		"user_id" => 32217,
		"work_status" => "European National"
	],
	[
		"id" => 26001,
		"user_id" => 32218,
		"work_status" => "Non European National"
	],
	[
		"id" => 26002,
		"user_id" => 32221,
		"work_status" => "0"
	],
	[
		"id" => 26003,
		"user_id" => 32220,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26004,
		"user_id" => 32223,
		"work_status" => "Non European National"
	],
	[
		"id" => 26005,
		"user_id" => 32225,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26006,
		"user_id" => 32229,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26007,
		"user_id" => 32227,
		"work_status" => "0"
	],
	[
		"id" => 26008,
		"user_id" => 32230,
		"work_status" => "0"
	],
	[
		"id" => 26009,
		"user_id" => 32232,
		"work_status" => "European National"
	],
	[
		"id" => 26010,
		"user_id" => 32233,
		"work_status" => "Non European National"
	],
	[
		"id" => 26011,
		"user_id" => 32234,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26012,
		"user_id" => 32235,
		"work_status" => "0"
	],
	[
		"id" => 26013,
		"user_id" => 32236,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26014,
		"user_id" => 32238,
		"work_status" => "0"
	],
	[
		"id" => 26015,
		"user_id" => 32239,
		"work_status" => "0"
	],
	[
		"id" => 26016,
		"user_id" => 32241,
		"work_status" => "Non European National"
	],
	[
		"id" => 26017,
		"user_id" => 32242,
		"work_status" => "Non European National"
	],
	[
		"id" => 26018,
		"user_id" => 32243,
		"work_status" => "0"
	],
	[
		"id" => 26019,
		"user_id" => 32245,
		"work_status" => "Non European National"
	],
	[
		"id" => 26020,
		"user_id" => 32246,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26021,
		"user_id" => 32152,
		"work_status" => "Non European National"
	],
	[
		"id" => 26022,
		"user_id" => 32247,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26023,
		"user_id" => 32248,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26024,
		"user_id" => 32249,
		"work_status" => "Non European National"
	],
	[
		"id" => 26025,
		"user_id" => 32252,
		"work_status" => "European National"
	],
	[
		"id" => 26026,
		"user_id" => 21079,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26027,
		"user_id" => 32253,
		"work_status" => "Non European National"
	],
	[
		"id" => 26028,
		"user_id" => 32256,
		"work_status" => "European National"
	],
	[
		"id" => 26029,
		"user_id" => 32258,
		"work_status" => "Non European National"
	],
	[
		"id" => 26030,
		"user_id" => 31036,
		"work_status" => "0"
	],
	[
		"id" => 26031,
		"user_id" => 32261,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26364,
		"user_id" => 32735,
		"work_status" => "Non European National"
	],
	[
		"id" => 26033,
		"user_id" => 32264,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26034,
		"user_id" => 32265,
		"work_status" => "European National"
	],
	[
		"id" => 26035,
		"user_id" => 32268,
		"work_status" => "European National"
	],
	[
		"id" => 26036,
		"user_id" => 32271,
		"work_status" => "European National"
	],
	[
		"id" => 26037,
		"user_id" => 32272,
		"work_status" => "Non European National"
	],
	[
		"id" => 26038,
		"user_id" => 32274,
		"work_status" => "0"
	],
	[
		"id" => 26039,
		"user_id" => 32275,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26040,
		"user_id" => 32276,
		"work_status" => "European National"
	],
	[
		"id" => 26041,
		"user_id" => 32251,
		"work_status" => "European National"
	],
	[
		"id" => 26042,
		"user_id" => 32277,
		"work_status" => "0"
	],
	[
		"id" => 26043,
		"user_id" => 32278,
		"work_status" => "0"
	],
	[
		"id" => 26044,
		"user_id" => 32279,
		"work_status" => "Non European National"
	],
	[
		"id" => 26045,
		"user_id" => 32280,
		"work_status" => "Non European National"
	],
	[
		"id" => 26046,
		"user_id" => 32281,
		"work_status" => "Non European National"
	],
	[
		"id" => 26047,
		"user_id" => 32282,
		"work_status" => "Non European National"
	],
	[
		"id" => 26048,
		"user_id" => 32284,
		"work_status" => "0"
	],
	[
		"id" => 26049,
		"user_id" => 32286,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26051,
		"user_id" => 32293,
		"work_status" => "European National"
	],
	[
		"id" => 26052,
		"user_id" => 31821,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26053,
		"user_id" => 32295,
		"work_status" => "0"
	],
	[
		"id" => 26054,
		"user_id" => 32297,
		"work_status" => "Non European National"
	],
	[
		"id" => 26055,
		"user_id" => 32300,
		"work_status" => "European National"
	],
	[
		"id" => 26056,
		"user_id" => 32299,
		"work_status" => "European National"
	],
	[
		"id" => 26057,
		"user_id" => 32298,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26058,
		"user_id" => 32270,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26059,
		"user_id" => 32302,
		"work_status" => "Non European National"
	],
	[
		"id" => 26060,
		"user_id" => 32304,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26061,
		"user_id" => 26047,
		"work_status" => "Non European National"
	],
	[
		"id" => 26062,
		"user_id" => 32305,
		"work_status" => "Non European National"
	],
	[
		"id" => 26063,
		"user_id" => 32306,
		"work_status" => "0"
	],
	[
		"id" => 26064,
		"user_id" => 27070,
		"work_status" => "Non European National"
	],
	[
		"id" => 26065,
		"user_id" => 32308,
		"work_status" => "0"
	],
	[
		"id" => 26066,
		"user_id" => 32309,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26067,
		"user_id" => 32312,
		"work_status" => "Non European National"
	],
	[
		"id" => 26068,
		"user_id" => 32313,
		"work_status" => "European National"
	],
	[
		"id" => 26069,
		"user_id" => 32317,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26070,
		"user_id" => 32310,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26071,
		"user_id" => 32318,
		"work_status" => "Non European National"
	],
	[
		"id" => 26072,
		"user_id" => 32319,
		"work_status" => "Non European National"
	],
	[
		"id" => 26073,
		"user_id" => 32321,
		"work_status" => "Non European National"
	],
	[
		"id" => 26077,
		"user_id" => 32324,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26078,
		"user_id" => 32325,
		"work_status" => "Non European National"
	],
	[
		"id" => 26079,
		"user_id" => 32326,
		"work_status" => "Non European National"
	],
	[
		"id" => 26080,
		"user_id" => 32120,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26081,
		"user_id" => 32327,
		"work_status" => "Non European National"
	],
	[
		"id" => 26082,
		"user_id" => 32329,
		"work_status" => "Non European National"
	],
	[
		"id" => 26083,
		"user_id" => 32330,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26084,
		"user_id" => 10310,
		"work_status" => "Non European National"
	],
	[
		"id" => 26085,
		"user_id" => 32333,
		"work_status" => "Non European National"
	],
	[
		"id" => 26086,
		"user_id" => 32334,
		"work_status" => "European National"
	],
	[
		"id" => 26087,
		"user_id" => 32335,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26088,
		"user_id" => 32338,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26089,
		"user_id" => 32340,
		"work_status" => "Non European National"
	],
	[
		"id" => 26090,
		"user_id" => 32343,
		"work_status" => "0"
	],
	[
		"id" => 26091,
		"user_id" => 32344,
		"work_status" => "0"
	],
	[
		"id" => 26092,
		"user_id" => 32346,
		"work_status" => "Non European National"
	],
	[
		"id" => 26093,
		"user_id" => 32347,
		"work_status" => "European National"
	],
	[
		"id" => 26094,
		"user_id" => 32348,
		"work_status" => "Non European National"
	],
	[
		"id" => 26095,
		"user_id" => 32283,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26096,
		"user_id" => 32349,
		"work_status" => "Non European National"
	],
	[
		"id" => 26098,
		"user_id" => 32353,
		"work_status" => "European National"
	],
	[
		"id" => 26099,
		"user_id" => 32354,
		"work_status" => "Non European National"
	],
	[
		"id" => 26100,
		"user_id" => 32356,
		"work_status" => "European National"
	],
	[
		"id" => 26101,
		"user_id" => 32352,
		"work_status" => "Non European National"
	],
	[
		"id" => 26103,
		"user_id" => 32244,
		"work_status" => "European National"
	],
	[
		"id" => 26104,
		"user_id" => 32363,
		"work_status" => "Non European National"
	],
	[
		"id" => 26105,
		"user_id" => 32314,
		"work_status" => "Non European National"
	],
	[
		"id" => 26716,
		"user_id" => 33237,
		"work_status" => "European National"
	],
	[
		"id" => 26107,
		"user_id" => 32366,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26507,
		"user_id" => 32920,
		"work_status" => "Non European National"
	],
	[
		"id" => 26109,
		"user_id" => 32368,
		"work_status" => "Non European National"
	],
	[
		"id" => 26110,
		"user_id" => 32370,
		"work_status" => "Non European National"
	],
	[
		"id" => 26111,
		"user_id" => 32371,
		"work_status" => "0"
	],
	[
		"id" => 26112,
		"user_id" => 32372,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26113,
		"user_id" => 32374,
		"work_status" => "0"
	],
	[
		"id" => 26114,
		"user_id" => 32375,
		"work_status" => "Non European National"
	],
	[
		"id" => 26115,
		"user_id" => 32376,
		"work_status" => "0"
	],
	[
		"id" => 26116,
		"user_id" => 32377,
		"work_status" => "European National"
	],
	[
		"id" => 26117,
		"user_id" => 32378,
		"work_status" => "Non European National"
	],
	[
		"id" => 26118,
		"user_id" => 32379,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26119,
		"user_id" => 32380,
		"work_status" => "European National"
	],
	[
		"id" => 26120,
		"user_id" => 32381,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26121,
		"user_id" => 32382,
		"work_status" => "Non European National"
	],
	[
		"id" => 26122,
		"user_id" => 32386,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26123,
		"user_id" => 32387,
		"work_status" => "Non European National"
	],
	[
		"id" => 26124,
		"user_id" => 32389,
		"work_status" => "0"
	],
	[
		"id" => 27348,
		"user_id" => 34086,
		"work_status" => "Non European National"
	],
	[
		"id" => 26126,
		"user_id" => 32391,
		"work_status" => "Non European National"
	],
	[
		"id" => 26127,
		"user_id" => 32392,
		"work_status" => "European National"
	],
	[
		"id" => 26128,
		"user_id" => 32394,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26129,
		"user_id" => 32395,
		"work_status" => "0"
	],
	[
		"id" => 26130,
		"user_id" => 32237,
		"work_status" => "European National"
	],
	[
		"id" => 26131,
		"user_id" => 32398,
		"work_status" => "0"
	],
	[
		"id" => 26132,
		"user_id" => 32397,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26133,
		"user_id" => 32400,
		"work_status" => "Non European National"
	],
	[
		"id" => 26134,
		"user_id" => 32402,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26135,
		"user_id" => 32403,
		"work_status" => "0"
	],
	[
		"id" => 26136,
		"user_id" => 32404,
		"work_status" => "European National"
	],
	[
		"id" => 26137,
		"user_id" => 32405,
		"work_status" => "Non European National"
	],
	[
		"id" => 26138,
		"user_id" => 32407,
		"work_status" => "European National"
	],
	[
		"id" => 26139,
		"user_id" => 32411,
		"work_status" => "0"
	],
	[
		"id" => 26140,
		"user_id" => 32410,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26141,
		"user_id" => 32415,
		"work_status" => "0"
	],
	[
		"id" => 26142,
		"user_id" => 32416,
		"work_status" => "Non European National"
	],
	[
		"id" => 26143,
		"user_id" => 32417,
		"work_status" => "0"
	],
	[
		"id" => 26144,
		"user_id" => 32420,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26145,
		"user_id" => 32422,
		"work_status" => "European National"
	],
	[
		"id" => 26146,
		"user_id" => 31707,
		"work_status" => "Non European National"
	],
	[
		"id" => 26147,
		"user_id" => 32428,
		"work_status" => "Non European National"
	],
	[
		"id" => 26148,
		"user_id" => 32429,
		"work_status" => "0"
	],
	[
		"id" => 26149,
		"user_id" => 32431,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26150,
		"user_id" => 32432,
		"work_status" => "0"
	],
	[
		"id" => 26151,
		"user_id" => 30789,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26152,
		"user_id" => 32433,
		"work_status" => "Non European National"
	],
	[
		"id" => 26153,
		"user_id" => 32435,
		"work_status" => "Non European National"
	],
	[
		"id" => 27027,
		"user_id" => 33643,
		"work_status" => "Non European National"
	],
	[
		"id" => 26155,
		"user_id" => 32396,
		"work_status" => "Non European National"
	],
	[
		"id" => 26156,
		"user_id" => 32439,
		"work_status" => "0"
	],
	[
		"id" => 26157,
		"user_id" => 32444,
		"work_status" => "0"
	],
	[
		"id" => 26158,
		"user_id" => 32434,
		"work_status" => "Non European National"
	],
	[
		"id" => 26159,
		"user_id" => 32445,
		"work_status" => "Non European National"
	],
	[
		"id" => 26161,
		"user_id" => 32449,
		"work_status" => "European National"
	],
	[
		"id" => 27298,
		"user_id" => 34017,
		"work_status" => "Non European National"
	],
	[
		"id" => 26162,
		"user_id" => 32450,
		"work_status" => "Non European National"
	],
	[
		"id" => 26163,
		"user_id" => 32446,
		"work_status" => "0"
	],
	[
		"id" => 26164,
		"user_id" => 32453,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26165,
		"user_id" => 32457,
		"work_status" => "0"
	],
	[
		"id" => 26166,
		"user_id" => 32418,
		"work_status" => "Non European National"
	],
	[
		"id" => 26167,
		"user_id" => 32456,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26317,
		"user_id" => 32684,
		"work_status" => "European National"
	],
	[
		"id" => 26169,
		"user_id" => 32472,
		"work_status" => "0"
	],
	[
		"id" => 26170,
		"user_id" => 32474,
		"work_status" => "Non European National"
	],
	[
		"id" => 26171,
		"user_id" => 32464,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26172,
		"user_id" => 32476,
		"work_status" => "Non European National"
	],
	[
		"id" => 26174,
		"user_id" => 32479,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26175,
		"user_id" => 32482,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26176,
		"user_id" => 32480,
		"work_status" => "Non European National"
	],
	[
		"id" => 26177,
		"user_id" => 32483,
		"work_status" => "0"
	],
	[
		"id" => 26178,
		"user_id" => 32484,
		"work_status" => "Non European National"
	],
	[
		"id" => 26179,
		"user_id" => 32460,
		"work_status" => "Non European National"
	],
	[
		"id" => 26180,
		"user_id" => 32442,
		"work_status" => "European National"
	],
	[
		"id" => 26181,
		"user_id" => 32459,
		"work_status" => "European National"
	],
	[
		"id" => 26182,
		"user_id" => 32488,
		"work_status" => "European National"
	],
	[
		"id" => 26183,
		"user_id" => 32490,
		"work_status" => "0"
	],
	[
		"id" => 26184,
		"user_id" => 32492,
		"work_status" => "Non European National"
	],
	[
		"id" => 26185,
		"user_id" => 32491,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26186,
		"user_id" => 32493,
		"work_status" => "European National"
	],
	[
		"id" => 26187,
		"user_id" => 32494,
		"work_status" => "Non European National"
	],
	[
		"id" => 26188,
		"user_id" => 32489,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26189,
		"user_id" => 32495,
		"work_status" => "European National"
	],
	[
		"id" => 26190,
		"user_id" => 32497,
		"work_status" => "Non European National"
	],
	[
		"id" => 26191,
		"user_id" => 32498,
		"work_status" => "0"
	],
	[
		"id" => 26192,
		"user_id" => 32501,
		"work_status" => "Non European National"
	],
	[
		"id" => 26193,
		"user_id" => 32504,
		"work_status" => "0"
	],
	[
		"id" => 26194,
		"user_id" => 32505,
		"work_status" => "Non European National"
	],
	[
		"id" => 26195,
		"user_id" => 32507,
		"work_status" => "European National"
	],
	[
		"id" => 26499,
		"user_id" => 32802,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26197,
		"user_id" => 32512,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26198,
		"user_id" => 32515,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26199,
		"user_id" => 32517,
		"work_status" => "Non European National"
	],
	[
		"id" => 26200,
		"user_id" => 32518,
		"work_status" => "Non European National"
	],
	[
		"id" => 26201,
		"user_id" => 32520,
		"work_status" => "European National"
	],
	[
		"id" => 26202,
		"user_id" => 32521,
		"work_status" => "Non European National"
	],
	[
		"id" => 26203,
		"user_id" => 32523,
		"work_status" => "0"
	],
	[
		"id" => 26204,
		"user_id" => 32524,
		"work_status" => "0"
	],
	[
		"id" => 26205,
		"user_id" => 32526,
		"work_status" => "Non European National"
	],
	[
		"id" => 26206,
		"user_id" => 32527,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26207,
		"user_id" => 32528,
		"work_status" => "Non European National"
	],
	[
		"id" => 26208,
		"user_id" => 32462,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26209,
		"user_id" => 32529,
		"work_status" => "Non European National"
	],
	[
		"id" => 26210,
		"user_id" => 32339,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26211,
		"user_id" => 32533,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26212,
		"user_id" => 32534,
		"work_status" => "0"
	],
	[
		"id" => 26213,
		"user_id" => 32537,
		"work_status" => "European National"
	],
	[
		"id" => 26214,
		"user_id" => 32538,
		"work_status" => "0"
	],
	[
		"id" => 26215,
		"user_id" => 32536,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26368,
		"user_id" => 30652,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26217,
		"user_id" => 32513,
		"work_status" => "European National"
	],
	[
		"id" => 26218,
		"user_id" => 32543,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26219,
		"user_id" => 32544,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26220,
		"user_id" => 32545,
		"work_status" => "European National"
	],
	[
		"id" => 26221,
		"user_id" => 32546,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26222,
		"user_id" => 32551,
		"work_status" => "Non European National"
	],
	[
		"id" => 26223,
		"user_id" => 32553,
		"work_status" => "Non European National"
	],
	[
		"id" => 26225,
		"user_id" => 32555,
		"work_status" => "European National"
	],
	[
		"id" => 26226,
		"user_id" => 32552,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26227,
		"user_id" => 32556,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26228,
		"user_id" => 32558,
		"work_status" => "0"
	],
	[
		"id" => 26229,
		"user_id" => 32560,
		"work_status" => "0"
	],
	[
		"id" => 27526,
		"user_id" => 32766,
		"work_status" => "Non European National"
	],
	[
		"id" => 27527,
		"user_id" => 34378,
		"work_status" => "Non European National"
	],
	[
		"id" => 26231,
		"user_id" => 32562,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26232,
		"user_id" => 32563,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26233,
		"user_id" => 32564,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26234,
		"user_id" => 32567,
		"work_status" => "0"
	],
	[
		"id" => 26235,
		"user_id" => 32566,
		"work_status" => "0"
	],
	[
		"id" => 26236,
		"user_id" => 32328,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26237,
		"user_id" => 32568,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26238,
		"user_id" => 32571,
		"work_status" => "Non European National"
	],
	[
		"id" => 26239,
		"user_id" => 32557,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26240,
		"user_id" => 32573,
		"work_status" => "European National"
	],
	[
		"id" => 26241,
		"user_id" => 32576,
		"work_status" => "European National"
	],
	[
		"id" => 26242,
		"user_id" => 32578,
		"work_status" => "Non European National"
	],
	[
		"id" => 26243,
		"user_id" => 32579,
		"work_status" => "Non European National"
	],
	[
		"id" => 26244,
		"user_id" => 32580,
		"work_status" => "Non European National"
	],
	[
		"id" => 26245,
		"user_id" => 32581,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26246,
		"user_id" => 32583,
		"work_status" => "European National"
	],
	[
		"id" => 26247,
		"user_id" => 32586,
		"work_status" => "0"
	],
	[
		"id" => 26248,
		"user_id" => 32585,
		"work_status" => "Non European National"
	],
	[
		"id" => 26249,
		"user_id" => 32588,
		"work_status" => "European National"
	],
	[
		"id" => 26250,
		"user_id" => 32589,
		"work_status" => "European National"
	],
	[
		"id" => 26251,
		"user_id" => 32590,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26252,
		"user_id" => 32592,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26253,
		"user_id" => 32593,
		"work_status" => "0"
	],
	[
		"id" => 26254,
		"user_id" => 32594,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26255,
		"user_id" => 32596,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26256,
		"user_id" => 32290,
		"work_status" => "Non European National"
	],
	[
		"id" => 26257,
		"user_id" => 32598,
		"work_status" => "Non European National"
	],
	[
		"id" => 26258,
		"user_id" => 32599,
		"work_status" => "0"
	],
	[
		"id" => 26259,
		"user_id" => 32603,
		"work_status" => "0"
	],
	[
		"id" => 26417,
		"user_id" => 32805,
		"work_status" => "Non European National"
	],
	[
		"id" => 26261,
		"user_id" => 32606,
		"work_status" => "Non European National"
	],
	[
		"id" => 26262,
		"user_id" => 32609,
		"work_status" => "0"
	],
	[
		"id" => 27315,
		"user_id" => 34032,
		"work_status" => "European National"
	],
	[
		"id" => 27316,
		"user_id" => 34033,
		"work_status" => "European National"
	],
	[
		"id" => 26264,
		"user_id" => 32612,
		"work_status" => "European National"
	],
	[
		"id" => 26265,
		"user_id" => 32615,
		"work_status" => "Non European National"
	],
	[
		"id" => 26266,
		"user_id" => 32616,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26267,
		"user_id" => 32617,
		"work_status" => "0"
	],
	[
		"id" => 26268,
		"user_id" => 32620,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26269,
		"user_id" => 32622,
		"work_status" => "Non European National"
	],
	[
		"id" => 26270,
		"user_id" => 32623,
		"work_status" => "European National"
	],
	[
		"id" => 26271,
		"user_id" => 32625,
		"work_status" => "European National"
	],
	[
		"id" => 26274,
		"user_id" => 32628,
		"work_status" => "Non European National"
	],
	[
		"id" => 26275,
		"user_id" => 32630,
		"work_status" => "0"
	],
	[
		"id" => 26276,
		"user_id" => 32632,
		"work_status" => "European National"
	],
	[
		"id" => 26277,
		"user_id" => 32634,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26278,
		"user_id" => 32636,
		"work_status" => "European National"
	],
	[
		"id" => 26279,
		"user_id" => 32637,
		"work_status" => "European National"
	],
	[
		"id" => 26280,
		"user_id" => 32419,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26281,
		"user_id" => 31706,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26282,
		"user_id" => 32640,
		"work_status" => "0"
	],
	[
		"id" => 26283,
		"user_id" => 32641,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26287,
		"user_id" => 32106,
		"work_status" => "European National"
	],
	[
		"id" => 26444,
		"user_id" => 32837,
		"work_status" => "0"
	],
	[
		"id" => 26289,
		"user_id" => 32648,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26290,
		"user_id" => 32649,
		"work_status" => "European National"
	],
	[
		"id" => 26291,
		"user_id" => 26241,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26292,
		"user_id" => 32651,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26293,
		"user_id" => 32653,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26294,
		"user_id" => 32438,
		"work_status" => "Non European National"
	],
	[
		"id" => 26295,
		"user_id" => 32657,
		"work_status" => "0"
	],
	[
		"id" => 26296,
		"user_id" => 32659,
		"work_status" => "Non European National"
	],
	[
		"id" => 26349,
		"user_id" => 32716,
		"work_status" => "European National"
	],
	[
		"id" => 26297,
		"user_id" => 32661,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26298,
		"user_id" => 26885,
		"work_status" => "0"
	],
	[
		"id" => 26299,
		"user_id" => 32662,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27237,
		"user_id" => 33934,
		"work_status" => "Non European National"
	],
	[
		"id" => 27238,
		"user_id" => 33935,
		"work_status" => "Non European National"
	],
	[
		"id" => 26301,
		"user_id" => 32664,
		"work_status" => "European National"
	],
	[
		"id" => 26302,
		"user_id" => 32665,
		"work_status" => "0"
	],
	[
		"id" => 26303,
		"user_id" => 32667,
		"work_status" => "Non European National"
	],
	[
		"id" => 26304,
		"user_id" => 32668,
		"work_status" => "European National"
	],
	[
		"id" => 26305,
		"user_id" => 32670,
		"work_status" => "0"
	],
	[
		"id" => 26306,
		"user_id" => 32666,
		"work_status" => "European National"
	],
	[
		"id" => 26308,
		"user_id" => 32672,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26310,
		"user_id" => 32675,
		"work_status" => "Non European National"
	],
	[
		"id" => 26313,
		"user_id" => 32677,
		"work_status" => "Non European National"
	],
	[
		"id" => 26314,
		"user_id" => 32678,
		"work_status" => "European National"
	],
	[
		"id" => 26315,
		"user_id" => 32680,
		"work_status" => "0"
	],
	[
		"id" => 26316,
		"user_id" => 32683,
		"work_status" => "Non European National"
	],
	[
		"id" => 26318,
		"user_id" => 32687,
		"work_status" => "0"
	],
	[
		"id" => 26319,
		"user_id" => 12059,
		"work_status" => "Non European National"
	],
	[
		"id" => 26320,
		"user_id" => 31651,
		"work_status" => "Non European National"
	],
	[
		"id" => 26321,
		"user_id" => 31307,
		"work_status" => "0"
	],
	[
		"id" => 26322,
		"user_id" => 31985,
		"work_status" => "0"
	],
	[
		"id" => 26323,
		"user_id" => 27215,
		"work_status" => "European National"
	],
	[
		"id" => 26324,
		"user_id" => 16401,
		"work_status" => "0"
	],
	[
		"id" => 26325,
		"user_id" => 32689,
		"work_status" => "0"
	],
	[
		"id" => 26326,
		"user_id" => 32696,
		"work_status" => "0"
	],
	[
		"id" => 26327,
		"user_id" => 32692,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26328,
		"user_id" => 32690,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26329,
		"user_id" => 32693,
		"work_status" => "0"
	],
	[
		"id" => 26330,
		"user_id" => 32695,
		"work_status" => "European National"
	],
	[
		"id" => 26331,
		"user_id" => 32698,
		"work_status" => "European National"
	],
	[
		"id" => 26332,
		"user_id" => 24618,
		"work_status" => "0"
	],
	[
		"id" => 26333,
		"user_id" => 32699,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26334,
		"user_id" => 24842,
		"work_status" => "Non European National"
	],
	[
		"id" => 26335,
		"user_id" => 24734,
		"work_status" => "Non European National"
	],
	[
		"id" => 26336,
		"user_id" => 32700,
		"work_status" => "Non European National"
	],
	[
		"id" => 26337,
		"user_id" => 30925,
		"work_status" => "European National"
	],
	[
		"id" => 26338,
		"user_id" => 32706,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26339,
		"user_id" => 32631,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26340,
		"user_id" => 31475,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26341,
		"user_id" => 32707,
		"work_status" => "0"
	],
	[
		"id" => 26342,
		"user_id" => 31443,
		"work_status" => "Non European National"
	],
	[
		"id" => 26343,
		"user_id" => 31362,
		"work_status" => "Non European National"
	],
	[
		"id" => 26344,
		"user_id" => 32708,
		"work_status" => "0"
	],
	[
		"id" => 26345,
		"user_id" => 26918,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26346,
		"user_id" => 32710,
		"work_status" => "European National"
	],
	[
		"id" => 26348,
		"user_id" => 32712,
		"work_status" => "0"
	],
	[
		"id" => 26350,
		"user_id" => 32721,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26351,
		"user_id" => 25216,
		"work_status" => "Non European National"
	],
	[
		"id" => 26352,
		"user_id" => 30543,
		"work_status" => "Non European National"
	],
	[
		"id" => 26717,
		"user_id" => 33216,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26353,
		"user_id" => 32724,
		"work_status" => "European National"
	],
	[
		"id" => 26354,
		"user_id" => 32725,
		"work_status" => "0"
	],
	[
		"id" => 26355,
		"user_id" => 32726,
		"work_status" => "Non European National"
	],
	[
		"id" => 26356,
		"user_id" => 32727,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26357,
		"user_id" => 32715,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26358,
		"user_id" => 32728,
		"work_status" => "Non European National"
	],
	[
		"id" => 26359,
		"user_id" => 32729,
		"work_status" => "0"
	],
	[
		"id" => 26360,
		"user_id" => 32732,
		"work_status" => "Non European National"
	],
	[
		"id" => 26361,
		"user_id" => 32733,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26362,
		"user_id" => 32736,
		"work_status" => "Non European National"
	],
	[
		"id" => 26365,
		"user_id" => 32739,
		"work_status" => "Non European National"
	],
	[
		"id" => 26366,
		"user_id" => 32738,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26367,
		"user_id" => 32741,
		"work_status" => "European National"
	],
	[
		"id" => 26369,
		"user_id" => 32744,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26370,
		"user_id" => 32747,
		"work_status" => "European National"
	],
	[
		"id" => 26371,
		"user_id" => 25172,
		"work_status" => "European National"
	],
	[
		"id" => 26372,
		"user_id" => 32748,
		"work_status" => "0"
	],
	[
		"id" => 26373,
		"user_id" => 31445,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26374,
		"user_id" => 32753,
		"work_status" => "0"
	],
	[
		"id" => 26375,
		"user_id" => 32754,
		"work_status" => "Non European National"
	],
	[
		"id" => 26376,
		"user_id" => 32755,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26377,
		"user_id" => 32757,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26378,
		"user_id" => 32756,
		"work_status" => "Non European National"
	],
	[
		"id" => 26379,
		"user_id" => 32758,
		"work_status" => "0"
	],
	[
		"id" => 26380,
		"user_id" => 32759,
		"work_status" => "European National"
	],
	[
		"id" => 26381,
		"user_id" => 32761,
		"work_status" => "Non European National"
	],
	[
		"id" => 26382,
		"user_id" => 32762,
		"work_status" => "0"
	],
	[
		"id" => 26383,
		"user_id" => 32763,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26384,
		"user_id" => 32764,
		"work_status" => "0"
	],
	[
		"id" => 26385,
		"user_id" => 32765,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26386,
		"user_id" => 32767,
		"work_status" => "Non European National"
	],
	[
		"id" => 26387,
		"user_id" => 32769,
		"work_status" => "0"
	],
	[
		"id" => 26388,
		"user_id" => 21380,
		"work_status" => "0"
	],
	[
		"id" => 26389,
		"user_id" => 32772,
		"work_status" => "0"
	],
	[
		"id" => 26390,
		"user_id" => 32341,
		"work_status" => "European National"
	],
	[
		"id" => 26391,
		"user_id" => 32773,
		"work_status" => "0"
	],
	[
		"id" => 26392,
		"user_id" => 32746,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26393,
		"user_id" => 32750,
		"work_status" => "European National"
	],
	[
		"id" => 26394,
		"user_id" => 32775,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26395,
		"user_id" => 32776,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26396,
		"user_id" => 32777,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26397,
		"user_id" => 32779,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26398,
		"user_id" => 32780,
		"work_status" => "Non European National"
	],
	[
		"id" => 26399,
		"user_id" => 32782,
		"work_status" => "Non European National"
	],
	[
		"id" => 26400,
		"user_id" => 32783,
		"work_status" => "European National"
	],
	[
		"id" => 26401,
		"user_id" => 30522,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26402,
		"user_id" => 32788,
		"work_status" => "Non European National"
	],
	[
		"id" => 26404,
		"user_id" => 32790,
		"work_status" => "0"
	],
	[
		"id" => 26405,
		"user_id" => 32791,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26406,
		"user_id" => 32792,
		"work_status" => "Non European National"
	],
	[
		"id" => 26407,
		"user_id" => 32796,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27534,
		"user_id" => 34391,
		"work_status" => "Non European National"
	],
	[
		"id" => 26408,
		"user_id" => 26655,
		"work_status" => "European National"
	],
	[
		"id" => 26409,
		"user_id" => 32787,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27459,
		"user_id" => 34259,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26411,
		"user_id" => 32797,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26412,
		"user_id" => 32799,
		"work_status" => "Non European National"
	],
	[
		"id" => 26413,
		"user_id" => 32801,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26414,
		"user_id" => 21003,
		"work_status" => "Non European National"
	],
	[
		"id" => 26415,
		"user_id" => 32803,
		"work_status" => "Non European National"
	],
	[
		"id" => 26449,
		"user_id" => 32849,
		"work_status" => "0"
	],
	[
		"id" => 26450,
		"user_id" => 32851,
		"work_status" => "European National"
	],
	[
		"id" => 26451,
		"user_id" => 32846,
		"work_status" => "Non European National"
	],
	[
		"id" => 26452,
		"user_id" => 32852,
		"work_status" => "Non European National"
	],
	[
		"id" => 26453,
		"user_id" => 26970,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26454,
		"user_id" => 32854,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26455,
		"user_id" => 32855,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26456,
		"user_id" => 32857,
		"work_status" => "Non European National"
	],
	[
		"id" => 26457,
		"user_id" => 32858,
		"work_status" => "0"
	],
	[
		"id" => 26458,
		"user_id" => 32860,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26459,
		"user_id" => 32861,
		"work_status" => "Non European National"
	],
	[
		"id" => 26460,
		"user_id" => 32863,
		"work_status" => "0"
	],
	[
		"id" => 26461,
		"user_id" => 32864,
		"work_status" => "European National"
	],
	[
		"id" => 26462,
		"user_id" => 32862,
		"work_status" => "Non European National"
	],
	[
		"id" => 26464,
		"user_id" => 32865,
		"work_status" => "European National"
	],
	[
		"id" => 26465,
		"user_id" => 32811,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26466,
		"user_id" => 32867,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26467,
		"user_id" => 19973,
		"work_status" => "European National"
	],
	[
		"id" => 26468,
		"user_id" => 32869,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26469,
		"user_id" => 32871,
		"work_status" => "European National"
	],
	[
		"id" => 26470,
		"user_id" => 32872,
		"work_status" => "European National"
	],
	[
		"id" => 26471,
		"user_id" => 32873,
		"work_status" => "European National"
	],
	[
		"id" => 26472,
		"user_id" => 32874,
		"work_status" => "Non European National"
	],
	[
		"id" => 26473,
		"user_id" => 32875,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26474,
		"user_id" => 32877,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26475,
		"user_id" => 32879,
		"work_status" => "0"
	],
	[
		"id" => 26476,
		"user_id" => 32822,
		"work_status" => "European National"
	],
	[
		"id" => 26477,
		"user_id" => 32882,
		"work_status" => "European National"
	],
	[
		"id" => 26478,
		"user_id" => 32883,
		"work_status" => "Non European National"
	],
	[
		"id" => 26479,
		"user_id" => 32884,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26480,
		"user_id" => 32885,
		"work_status" => "Non European National"
	],
	[
		"id" => 26482,
		"user_id" => 27004,
		"work_status" => "0"
	],
	[
		"id" => 26483,
		"user_id" => 32890,
		"work_status" => "Non European National"
	],
	[
		"id" => 26484,
		"user_id" => 32800,
		"work_status" => "European National"
	],
	[
		"id" => 26485,
		"user_id" => 32808,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26486,
		"user_id" => 32892,
		"work_status" => "European National"
	],
	[
		"id" => 26487,
		"user_id" => 32893,
		"work_status" => "European National"
	],
	[
		"id" => 26488,
		"user_id" => 32894,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26489,
		"user_id" => 32895,
		"work_status" => "Non European National"
	],
	[
		"id" => 27264,
		"user_id" => 33969,
		"work_status" => "European National"
	],
	[
		"id" => 26491,
		"user_id" => 32897,
		"work_status" => "Non European National"
	],
	[
		"id" => 27400,
		"user_id" => 34177,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26492,
		"user_id" => 32899,
		"work_status" => "Non European National"
	],
	[
		"id" => 26493,
		"user_id" => 32901,
		"work_status" => "0"
	],
	[
		"id" => 26494,
		"user_id" => 32905,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26495,
		"user_id" => 32906,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26496,
		"user_id" => 32903,
		"work_status" => "Non European National"
	],
	[
		"id" => 26497,
		"user_id" => 32907,
		"work_status" => "Non European National"
	],
	[
		"id" => 26498,
		"user_id" => 31414,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26500,
		"user_id" => 32909,
		"work_status" => "Non European National"
	],
	[
		"id" => 26501,
		"user_id" => 32910,
		"work_status" => "Non European National"
	],
	[
		"id" => 26502,
		"user_id" => 26442,
		"work_status" => "Non European National"
	],
	[
		"id" => 26503,
		"user_id" => 32913,
		"work_status" => "0"
	],
	[
		"id" => 26504,
		"user_id" => 32917,
		"work_status" => "European National"
	],
	[
		"id" => 26505,
		"user_id" => 32916,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26506,
		"user_id" => 32919,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26511,
		"user_id" => 32652,
		"work_status" => "0"
	],
	[
		"id" => 26571,
		"user_id" => 33016,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26512,
		"user_id" => 32927,
		"work_status" => "0"
	],
	[
		"id" => 26513,
		"user_id" => 32928,
		"work_status" => "European National"
	],
	[
		"id" => 26514,
		"user_id" => 11885,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26515,
		"user_id" => 32929,
		"work_status" => "Non European National"
	],
	[
		"id" => 26516,
		"user_id" => 32930,
		"work_status" => "European National"
	],
	[
		"id" => 26517,
		"user_id" => 32931,
		"work_status" => "Non European National"
	],
	[
		"id" => 26518,
		"user_id" => 32932,
		"work_status" => "European National"
	],
	[
		"id" => 26519,
		"user_id" => 32933,
		"work_status" => "Non European National"
	],
	[
		"id" => 26520,
		"user_id" => 32934,
		"work_status" => "Non European National"
	],
	[
		"id" => 26521,
		"user_id" => 32938,
		"work_status" => "0"
	],
	[
		"id" => 26522,
		"user_id" => 32940,
		"work_status" => "European National"
	],
	[
		"id" => 26523,
		"user_id" => 32941,
		"work_status" => "European National"
	],
	[
		"id" => 26524,
		"user_id" => 32942,
		"work_status" => "European National"
	],
	[
		"id" => 26525,
		"user_id" => 32943,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26526,
		"user_id" => 32945,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26527,
		"user_id" => 32947,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26528,
		"user_id" => 32948,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26529,
		"user_id" => 32949,
		"work_status" => "0"
	],
	[
		"id" => 26530,
		"user_id" => 32950,
		"work_status" => "Non European National"
	],
	[
		"id" => 26531,
		"user_id" => 32951,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26532,
		"user_id" => 32953,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26533,
		"user_id" => 31024,
		"work_status" => "Non European National"
	],
	[
		"id" => 26534,
		"user_id" => 32955,
		"work_status" => "0"
	],
	[
		"id" => 26535,
		"user_id" => 32956,
		"work_status" => "European National"
	],
	[
		"id" => 26536,
		"user_id" => 32957,
		"work_status" => "Non European National"
	],
	[
		"id" => 27240,
		"user_id" => 33939,
		"work_status" => "European National"
	],
	[
		"id" => 26538,
		"user_id" => 32963,
		"work_status" => "Non European National"
	],
	[
		"id" => 26539,
		"user_id" => 32964,
		"work_status" => "Non European National"
	],
	[
		"id" => 26540,
		"user_id" => 32965,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26541,
		"user_id" => 32966,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26542,
		"user_id" => 32969,
		"work_status" => "0"
	],
	[
		"id" => 26543,
		"user_id" => 32970,
		"work_status" => "European National"
	],
	[
		"id" => 26544,
		"user_id" => 32971,
		"work_status" => "0"
	],
	[
		"id" => 26545,
		"user_id" => 32972,
		"work_status" => "Non European National"
	],
	[
		"id" => 26546,
		"user_id" => 32973,
		"work_status" => "0"
	],
	[
		"id" => 26547,
		"user_id" => 32974,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26548,
		"user_id" => 32975,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26549,
		"user_id" => 25444,
		"work_status" => "European National"
	],
	[
		"id" => 26550,
		"user_id" => 32976,
		"work_status" => "European National"
	],
	[
		"id" => 26551,
		"user_id" => 32977,
		"work_status" => "0"
	],
	[
		"id" => 26552,
		"user_id" => 32978,
		"work_status" => "Non European National"
	],
	[
		"id" => 26553,
		"user_id" => 32979,
		"work_status" => "Non European National"
	],
	[
		"id" => 26554,
		"user_id" => 32980,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26555,
		"user_id" => 32961,
		"work_status" => "0"
	],
	[
		"id" => 26556,
		"user_id" => 32986,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26557,
		"user_id" => 32995,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26558,
		"user_id" => 32993,
		"work_status" => "Non European National"
	],
	[
		"id" => 26559,
		"user_id" => 32996,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26560,
		"user_id" => 32997,
		"work_status" => "Non European National"
	],
	[
		"id" => 26561,
		"user_id" => 32998,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26562,
		"user_id" => 33000,
		"work_status" => "Non European National"
	],
	[
		"id" => 26563,
		"user_id" => 32958,
		"work_status" => "0"
	],
	[
		"id" => 26564,
		"user_id" => 33001,
		"work_status" => "0"
	],
	[
		"id" => 26565,
		"user_id" => 33003,
		"work_status" => "Non European National"
	],
	[
		"id" => 26566,
		"user_id" => 33004,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26567,
		"user_id" => 33008,
		"work_status" => "Non European National"
	],
	[
		"id" => 26568,
		"user_id" => 33010,
		"work_status" => "Non European National"
	],
	[
		"id" => 26569,
		"user_id" => 33011,
		"work_status" => "Non European National"
	],
	[
		"id" => 26570,
		"user_id" => 32981,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26572,
		"user_id" => 33015,
		"work_status" => "Non European National"
	],
	[
		"id" => 26573,
		"user_id" => 33017,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26574,
		"user_id" => 33019,
		"work_status" => "Non European National"
	],
	[
		"id" => 26575,
		"user_id" => 33020,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26576,
		"user_id" => 33023,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26577,
		"user_id" => 33027,
		"work_status" => "European National"
	],
	[
		"id" => 26578,
		"user_id" => 33029,
		"work_status" => "0"
	],
	[
		"id" => 26579,
		"user_id" => 33030,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26580,
		"user_id" => 33031,
		"work_status" => "Non European National"
	],
	[
		"id" => 26581,
		"user_id" => 33033,
		"work_status" => "0"
	],
	[
		"id" => 26582,
		"user_id" => 33022,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26583,
		"user_id" => 33037,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26584,
		"user_id" => 33040,
		"work_status" => "European National"
	],
	[
		"id" => 26585,
		"user_id" => 33043,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26586,
		"user_id" => 33044,
		"work_status" => "0"
	],
	[
		"id" => 26587,
		"user_id" => 33045,
		"work_status" => "Non European National"
	],
	[
		"id" => 26588,
		"user_id" => 33047,
		"work_status" => "European National"
	],
	[
		"id" => 26589,
		"user_id" => 33048,
		"work_status" => "0"
	],
	[
		"id" => 26590,
		"user_id" => 33052,
		"work_status" => "0"
	],
	[
		"id" => 26591,
		"user_id" => 33054,
		"work_status" => "0"
	],
	[
		"id" => 26592,
		"user_id" => 33060,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26593,
		"user_id" => 33064,
		"work_status" => "0"
	],
	[
		"id" => 26594,
		"user_id" => 33065,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26595,
		"user_id" => 33066,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26596,
		"user_id" => 31836,
		"work_status" => "0"
	],
	[
		"id" => 26597,
		"user_id" => 32531,
		"work_status" => "European National"
	],
	[
		"id" => 26598,
		"user_id" => 33071,
		"work_status" => "0"
	],
	[
		"id" => 26599,
		"user_id" => 32886,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26600,
		"user_id" => 33073,
		"work_status" => "European National"
	],
	[
		"id" => 26601,
		"user_id" => 33075,
		"work_status" => "0"
	],
	[
		"id" => 26602,
		"user_id" => 33076,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26603,
		"user_id" => 33078,
		"work_status" => "European National"
	],
	[
		"id" => 26604,
		"user_id" => 33079,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26605,
		"user_id" => 33081,
		"work_status" => "European National"
	],
	[
		"id" => 26606,
		"user_id" => 33086,
		"work_status" => "European National"
	],
	[
		"id" => 26607,
		"user_id" => 33089,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26608,
		"user_id" => 33091,
		"work_status" => "Non European National"
	],
	[
		"id" => 26609,
		"user_id" => 33092,
		"work_status" => "European National"
	],
	[
		"id" => 26610,
		"user_id" => 33002,
		"work_status" => "0"
	],
	[
		"id" => 26611,
		"user_id" => 33096,
		"work_status" => "0"
	],
	[
		"id" => 26612,
		"user_id" => 33093,
		"work_status" => "Non European National"
	],
	[
		"id" => 26613,
		"user_id" => 33097,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26614,
		"user_id" => 33099,
		"work_status" => "European National"
	],
	[
		"id" => 26615,
		"user_id" => 33100,
		"work_status" => "European National"
	],
	[
		"id" => 26616,
		"user_id" => 10723,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26617,
		"user_id" => 33101,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26618,
		"user_id" => 33103,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26619,
		"user_id" => 33102,
		"work_status" => "European National"
	],
	[
		"id" => 26620,
		"user_id" => 33104,
		"work_status" => "0"
	],
	[
		"id" => 26621,
		"user_id" => 33105,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26622,
		"user_id" => 33106,
		"work_status" => "European National"
	],
	[
		"id" => 26623,
		"user_id" => 33107,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26624,
		"user_id" => 33108,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26625,
		"user_id" => 33088,
		"work_status" => "Non European National"
	],
	[
		"id" => 26626,
		"user_id" => 33110,
		"work_status" => "European National"
	],
	[
		"id" => 26627,
		"user_id" => 33111,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26682,
		"user_id" => 33197,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26629,
		"user_id" => 33116,
		"work_status" => "European National"
	],
	[
		"id" => 26630,
		"user_id" => 33114,
		"work_status" => "European National"
	],
	[
		"id" => 26631,
		"user_id" => 33119,
		"work_status" => "Non European National"
	],
	[
		"id" => 26632,
		"user_id" => 33120,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26633,
		"user_id" => 33118,
		"work_status" => "0"
	],
	[
		"id" => 26634,
		"user_id" => 33123,
		"work_status" => "European National"
	],
	[
		"id" => 26635,
		"user_id" => 33124,
		"work_status" => "European National"
	],
	[
		"id" => 26636,
		"user_id" => 33127,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26637,
		"user_id" => 33130,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26638,
		"user_id" => 33131,
		"work_status" => "European National"
	],
	[
		"id" => 26639,
		"user_id" => 33132,
		"work_status" => "Non European National"
	],
	[
		"id" => 26640,
		"user_id" => 32842,
		"work_status" => "0"
	],
	[
		"id" => 26641,
		"user_id" => 33133,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26642,
		"user_id" => 31480,
		"work_status" => "0"
	],
	[
		"id" => 26643,
		"user_id" => 33134,
		"work_status" => "0"
	],
	[
		"id" => 26644,
		"user_id" => 33135,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26645,
		"user_id" => 33138,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26646,
		"user_id" => 33139,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26647,
		"user_id" => 33140,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26648,
		"user_id" => 33142,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26650,
		"user_id" => 27083,
		"work_status" => "0"
	],
	[
		"id" => 26651,
		"user_id" => 33146,
		"work_status" => "Non European National"
	],
	[
		"id" => 26652,
		"user_id" => 33149,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26653,
		"user_id" => 33150,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26654,
		"user_id" => 33152,
		"work_status" => "0"
	],
	[
		"id" => 26655,
		"user_id" => 33153,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26656,
		"user_id" => 33156,
		"work_status" => "European National"
	],
	[
		"id" => 26657,
		"user_id" => 33157,
		"work_status" => "European National"
	],
	[
		"id" => 26658,
		"user_id" => 33160,
		"work_status" => "Non European National"
	],
	[
		"id" => 26659,
		"user_id" => 33162,
		"work_status" => "0"
	],
	[
		"id" => 26660,
		"user_id" => 32084,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26661,
		"user_id" => 33163,
		"work_status" => "European National"
	],
	[
		"id" => 26662,
		"user_id" => 33166,
		"work_status" => "0"
	],
	[
		"id" => 26663,
		"user_id" => 33167,
		"work_status" => "European National"
	],
	[
		"id" => 26664,
		"user_id" => 33164,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26665,
		"user_id" => 33168,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26666,
		"user_id" => 33169,
		"work_status" => "Non European National"
	],
	[
		"id" => 26667,
		"user_id" => 20513,
		"work_status" => "Non European National"
	],
	[
		"id" => 26668,
		"user_id" => 33171,
		"work_status" => "European National"
	],
	[
		"id" => 26669,
		"user_id" => 33170,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26670,
		"user_id" => 33174,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26671,
		"user_id" => 33173,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26672,
		"user_id" => 33181,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26673,
		"user_id" => 33184,
		"work_status" => "Non European National"
	],
	[
		"id" => 26674,
		"user_id" => 33185,
		"work_status" => "0"
	],
	[
		"id" => 26675,
		"user_id" => 33186,
		"work_status" => "0"
	],
	[
		"id" => 26676,
		"user_id" => 33188,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26677,
		"user_id" => 33190,
		"work_status" => "0"
	],
	[
		"id" => 26678,
		"user_id" => 33191,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26679,
		"user_id" => 33192,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26680,
		"user_id" => 33193,
		"work_status" => "Non European National"
	],
	[
		"id" => 26681,
		"user_id" => 16410,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26683,
		"user_id" => 32004,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26684,
		"user_id" => 33198,
		"work_status" => "Non European National"
	],
	[
		"id" => 26685,
		"user_id" => 32285,
		"work_status" => "European National"
	],
	[
		"id" => 26686,
		"user_id" => 33201,
		"work_status" => "European National"
	],
	[
		"id" => 26687,
		"user_id" => 33199,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26688,
		"user_id" => 33200,
		"work_status" => "European National"
	],
	[
		"id" => 26689,
		"user_id" => 33204,
		"work_status" => "0"
	],
	[
		"id" => 26690,
		"user_id" => 32549,
		"work_status" => "0"
	],
	[
		"id" => 26691,
		"user_id" => 33206,
		"work_status" => "Non European National"
	],
	[
		"id" => 26692,
		"user_id" => 33182,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26693,
		"user_id" => 33209,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26694,
		"user_id" => 33210,
		"work_status" => "European National"
	],
	[
		"id" => 26695,
		"user_id" => 33006,
		"work_status" => "Non European National"
	],
	[
		"id" => 26696,
		"user_id" => 33208,
		"work_status" => "0"
	],
	[
		"id" => 26697,
		"user_id" => 33214,
		"work_status" => "0"
	],
	[
		"id" => 26698,
		"user_id" => 33215,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26699,
		"user_id" => 33217,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26700,
		"user_id" => 33219,
		"work_status" => "Non European National"
	],
	[
		"id" => 26701,
		"user_id" => 33220,
		"work_status" => "European National"
	],
	[
		"id" => 26702,
		"user_id" => 33221,
		"work_status" => "European National"
	],
	[
		"id" => 26703,
		"user_id" => 33222,
		"work_status" => "0"
	],
	[
		"id" => 26704,
		"user_id" => 33223,
		"work_status" => "Non European National"
	],
	[
		"id" => 26705,
		"user_id" => 33155,
		"work_status" => "European National"
	],
	[
		"id" => 26706,
		"user_id" => 33224,
		"work_status" => "European National"
	],
	[
		"id" => 26708,
		"user_id" => 33228,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26709,
		"user_id" => 33229,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26710,
		"user_id" => 33230,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26711,
		"user_id" => 32173,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26712,
		"user_id" => 33218,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26713,
		"user_id" => 33232,
		"work_status" => "Non European National"
	],
	[
		"id" => 26714,
		"user_id" => 33234,
		"work_status" => "0"
	],
	[
		"id" => 26715,
		"user_id" => 33235,
		"work_status" => "Non European National"
	],
	[
		"id" => 26718,
		"user_id" => 33240,
		"work_status" => "Non European National"
	],
	[
		"id" => 26719,
		"user_id" => 33241,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26720,
		"user_id" => 33242,
		"work_status" => "0"
	],
	[
		"id" => 26721,
		"user_id" => 16912,
		"work_status" => "Non European National"
	],
	[
		"id" => 26722,
		"user_id" => 33243,
		"work_status" => "Non European National"
	],
	[
		"id" => 26723,
		"user_id" => 33245,
		"work_status" => "0"
	],
	[
		"id" => 26724,
		"user_id" => 33244,
		"work_status" => "European National"
	],
	[
		"id" => 26725,
		"user_id" => 33246,
		"work_status" => "Non European National"
	],
	[
		"id" => 26726,
		"user_id" => 30970,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26727,
		"user_id" => 33248,
		"work_status" => "0"
	],
	[
		"id" => 26728,
		"user_id" => 33249,
		"work_status" => "0"
	],
	[
		"id" => 26729,
		"user_id" => 33251,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26730,
		"user_id" => 33253,
		"work_status" => "0"
	],
	[
		"id" => 26731,
		"user_id" => 33255,
		"work_status" => "Non European National"
	],
	[
		"id" => 26732,
		"user_id" => 33256,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26733,
		"user_id" => 33183,
		"work_status" => "0"
	],
	[
		"id" => 26734,
		"user_id" => 33259,
		"work_status" => "European National"
	],
	[
		"id" => 26735,
		"user_id" => 19735,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26736,
		"user_id" => 33260,
		"work_status" => "Non European National"
	],
	[
		"id" => 26737,
		"user_id" => 33261,
		"work_status" => "Non European National"
	],
	[
		"id" => 26738,
		"user_id" => 33263,
		"work_status" => "Non European National"
	],
	[
		"id" => 26739,
		"user_id" => 33122,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26740,
		"user_id" => 33264,
		"work_status" => "European National"
	],
	[
		"id" => 26741,
		"user_id" => 32519,
		"work_status" => "0"
	],
	[
		"id" => 26742,
		"user_id" => 33265,
		"work_status" => "European National"
	],
	[
		"id" => 26745,
		"user_id" => 33268,
		"work_status" => "European National"
	],
	[
		"id" => 26746,
		"user_id" => 33269,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26747,
		"user_id" => 33267,
		"work_status" => "Non European National"
	],
	[
		"id" => 26748,
		"user_id" => 33271,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26749,
		"user_id" => 33272,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26750,
		"user_id" => 33274,
		"work_status" => "European National"
	],
	[
		"id" => 26751,
		"user_id" => 33273,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26752,
		"user_id" => 33277,
		"work_status" => "Non European National"
	],
	[
		"id" => 26753,
		"user_id" => 33279,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26754,
		"user_id" => 33280,
		"work_status" => "Non European National"
	],
	[
		"id" => 26755,
		"user_id" => 33282,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26756,
		"user_id" => 33113,
		"work_status" => "Non European National"
	],
	[
		"id" => 26757,
		"user_id" => 33172,
		"work_status" => "European National"
	],
	[
		"id" => 26758,
		"user_id" => 33283,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26759,
		"user_id" => 33284,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26760,
		"user_id" => 33286,
		"work_status" => "Non European National"
	],
	[
		"id" => 26761,
		"user_id" => 33262,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26762,
		"user_id" => 33289,
		"work_status" => "European National"
	],
	[
		"id" => 26805,
		"user_id" => 33357,
		"work_status" => "0"
	],
	[
		"id" => 26763,
		"user_id" => 33290,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27362,
		"user_id" => 34110,
		"work_status" => "European National"
	],
	[
		"id" => 27096,
		"user_id" => 33694,
		"work_status" => "0"
	],
	[
		"id" => 26765,
		"user_id" => 33292,
		"work_status" => "0"
	],
	[
		"id" => 26766,
		"user_id" => 33295,
		"work_status" => "0"
	],
	[
		"id" => 26767,
		"user_id" => 33296,
		"work_status" => "Non European National"
	],
	[
		"id" => 26768,
		"user_id" => 33297,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26769,
		"user_id" => 33299,
		"work_status" => "Non European National"
	],
	[
		"id" => 26771,
		"user_id" => 33302,
		"work_status" => "European National"
	],
	[
		"id" => 26772,
		"user_id" => 33303,
		"work_status" => "European National"
	],
	[
		"id" => 26773,
		"user_id" => 33304,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26774,
		"user_id" => 33305,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26775,
		"user_id" => 31645,
		"work_status" => "Non European National"
	],
	[
		"id" => 26776,
		"user_id" => 33306,
		"work_status" => "Non European National"
	],
	[
		"id" => 26777,
		"user_id" => 33308,
		"work_status" => "0"
	],
	[
		"id" => 26778,
		"user_id" => 33309,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26779,
		"user_id" => 33313,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26780,
		"user_id" => 33316,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26781,
		"user_id" => 33319,
		"work_status" => "European National"
	],
	[
		"id" => 26782,
		"user_id" => 33321,
		"work_status" => "0"
	],
	[
		"id" => 26783,
		"user_id" => 33323,
		"work_status" => "Non European National"
	],
	[
		"id" => 26784,
		"user_id" => 33325,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26785,
		"user_id" => 33326,
		"work_status" => "Non European National"
	],
	[
		"id" => 26786,
		"user_id" => 33327,
		"work_status" => "Non European National"
	],
	[
		"id" => 26787,
		"user_id" => 33328,
		"work_status" => "0"
	],
	[
		"id" => 26788,
		"user_id" => 33329,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26789,
		"user_id" => 33331,
		"work_status" => "0"
	],
	[
		"id" => 26790,
		"user_id" => 33334,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26791,
		"user_id" => 33335,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26792,
		"user_id" => 33336,
		"work_status" => "0"
	],
	[
		"id" => 26793,
		"user_id" => 33337,
		"work_status" => "Non European National"
	],
	[
		"id" => 26794,
		"user_id" => 33339,
		"work_status" => "0"
	],
	[
		"id" => 26795,
		"user_id" => 33276,
		"work_status" => "Non European National"
	],
	[
		"id" => 26796,
		"user_id" => 30714,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26797,
		"user_id" => 33342,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26798,
		"user_id" => 33344,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26799,
		"user_id" => 33345,
		"work_status" => "European National"
	],
	[
		"id" => 26800,
		"user_id" => 33346,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26801,
		"user_id" => 33343,
		"work_status" => "Non European National"
	],
	[
		"id" => 26802,
		"user_id" => 33347,
		"work_status" => "European National"
	],
	[
		"id" => 26803,
		"user_id" => 33350,
		"work_status" => "European National"
	],
	[
		"id" => 26804,
		"user_id" => 33352,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26806,
		"user_id" => 33358,
		"work_status" => "0"
	],
	[
		"id" => 26807,
		"user_id" => 33360,
		"work_status" => "Non European National"
	],
	[
		"id" => 26808,
		"user_id" => 33359,
		"work_status" => "Non European National"
	],
	[
		"id" => 26809,
		"user_id" => 33364,
		"work_status" => "Non European National"
	],
	[
		"id" => 26810,
		"user_id" => 33365,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26811,
		"user_id" => 33366,
		"work_status" => "Non European National"
	],
	[
		"id" => 26812,
		"user_id" => 33367,
		"work_status" => "European National"
	],
	[
		"id" => 27236,
		"user_id" => 33933,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26813,
		"user_id" => 33371,
		"work_status" => "European National"
	],
	[
		"id" => 26814,
		"user_id" => 32160,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26815,
		"user_id" => 33375,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26816,
		"user_id" => 33377,
		"work_status" => "0"
	],
	[
		"id" => 26817,
		"user_id" => 33378,
		"work_status" => "0"
	],
	[
		"id" => 26818,
		"user_id" => 33381,
		"work_status" => "0"
	],
	[
		"id" => 26819,
		"user_id" => 33382,
		"work_status" => "European National"
	],
	[
		"id" => 26820,
		"user_id" => 33383,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26821,
		"user_id" => 33374,
		"work_status" => "European National"
	],
	[
		"id" => 26822,
		"user_id" => 33388,
		"work_status" => "European National"
	],
	[
		"id" => 26823,
		"user_id" => 33390,
		"work_status" => "European National"
	],
	[
		"id" => 26824,
		"user_id" => 33389,
		"work_status" => "Non European National"
	],
	[
		"id" => 26825,
		"user_id" => 33396,
		"work_status" => "0"
	],
	[
		"id" => 26826,
		"user_id" => 33397,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26827,
		"user_id" => 33386,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26828,
		"user_id" => 33398,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26829,
		"user_id" => 33369,
		"work_status" => "European National"
	],
	[
		"id" => 26830,
		"user_id" => 33400,
		"work_status" => "European National"
	],
	[
		"id" => 26831,
		"user_id" => 33401,
		"work_status" => "Non European National"
	],
	[
		"id" => 26834,
		"user_id" => 33403,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26835,
		"user_id" => 33404,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26836,
		"user_id" => 33407,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26837,
		"user_id" => 33409,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26838,
		"user_id" => 33410,
		"work_status" => "Non European National"
	],
	[
		"id" => 26839,
		"user_id" => 33413,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26840,
		"user_id" => 33414,
		"work_status" => "0"
	],
	[
		"id" => 26841,
		"user_id" => 33415,
		"work_status" => "0"
	],
	[
		"id" => 26842,
		"user_id" => 33417,
		"work_status" => "Non European National"
	],
	[
		"id" => 26843,
		"user_id" => 33418,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26844,
		"user_id" => 33419,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26845,
		"user_id" => 33420,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26846,
		"user_id" => 33421,
		"work_status" => "Non European National"
	],
	[
		"id" => 26847,
		"user_id" => 33422,
		"work_status" => "Non European National"
	],
	[
		"id" => 26848,
		"user_id" => 33395,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26849,
		"user_id" => 33424,
		"work_status" => "Non European National"
	],
	[
		"id" => 26850,
		"user_id" => 33425,
		"work_status" => "European National"
	],
	[
		"id" => 27084,
		"user_id" => 33717,
		"work_status" => "Non European National"
	],
	[
		"id" => 26852,
		"user_id" => 33427,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26853,
		"user_id" => 33428,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26854,
		"user_id" => 33429,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26855,
		"user_id" => 33430,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26856,
		"user_id" => 33432,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26857,
		"user_id" => 33433,
		"work_status" => "0"
	],
	[
		"id" => 26858,
		"user_id" => 33379,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26859,
		"user_id" => 33412,
		"work_status" => "0"
	],
	[
		"id" => 26860,
		"user_id" => 26593,
		"work_status" => "Non European National"
	],
	[
		"id" => 26861,
		"user_id" => 33441,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27424,
		"user_id" => 34213,
		"work_status" => "European National"
	],
	[
		"id" => 26863,
		"user_id" => 33442,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26865,
		"user_id" => 33444,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26866,
		"user_id" => 33447,
		"work_status" => "Non European National"
	],
	[
		"id" => 26867,
		"user_id" => 33448,
		"work_status" => "Non European National"
	],
	[
		"id" => 26868,
		"user_id" => 33450,
		"work_status" => "Non European National"
	],
	[
		"id" => 26869,
		"user_id" => 33451,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26870,
		"user_id" => 33452,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26871,
		"user_id" => 33457,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26872,
		"user_id" => 33458,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26873,
		"user_id" => 33461,
		"work_status" => "European National"
	],
	[
		"id" => 26874,
		"user_id" => 33464,
		"work_status" => "European National"
	],
	[
		"id" => 26877,
		"user_id" => 33467,
		"work_status" => "European National"
	],
	[
		"id" => 26878,
		"user_id" => 33470,
		"work_status" => "Non European National"
	],
	[
		"id" => 26879,
		"user_id" => 33469,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26880,
		"user_id" => 33471,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26881,
		"user_id" => 33472,
		"work_status" => "0"
	],
	[
		"id" => 26882,
		"user_id" => 33453,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26883,
		"user_id" => 33475,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26885,
		"user_id" => 33477,
		"work_status" => "Non European National"
	],
	[
		"id" => 26888,
		"user_id" => 33480,
		"work_status" => "Non European National"
	],
	[
		"id" => 26889,
		"user_id" => 33482,
		"work_status" => "Non European National"
	],
	[
		"id" => 26890,
		"user_id" => 33484,
		"work_status" => "0"
	],
	[
		"id" => 26891,
		"user_id" => 33485,
		"work_status" => "0"
	],
	[
		"id" => 26892,
		"user_id" => 33486,
		"work_status" => "Non European National"
	],
	[
		"id" => 26893,
		"user_id" => 33487,
		"work_status" => "0"
	],
	[
		"id" => 26894,
		"user_id" => 33340,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26895,
		"user_id" => 33490,
		"work_status" => "Non European National"
	],
	[
		"id" => 26896,
		"user_id" => 33494,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26897,
		"user_id" => 33436,
		"work_status" => "European National"
	],
	[
		"id" => 26898,
		"user_id" => 33483,
		"work_status" => "0"
	],
	[
		"id" => 26899,
		"user_id" => 33497,
		"work_status" => "Non European National"
	],
	[
		"id" => 26900,
		"user_id" => 33498,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26902,
		"user_id" => 33501,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26903,
		"user_id" => 33503,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26904,
		"user_id" => 33504,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26905,
		"user_id" => 33505,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26906,
		"user_id" => 33368,
		"work_status" => "Non European National"
	],
	[
		"id" => 26907,
		"user_id" => 33491,
		"work_status" => "Non European National"
	],
	[
		"id" => 26908,
		"user_id" => 33492,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26909,
		"user_id" => 33506,
		"work_status" => "0"
	],
	[
		"id" => 26910,
		"user_id" => 33463,
		"work_status" => "Non European National"
	],
	[
		"id" => 26911,
		"user_id" => 33508,
		"work_status" => "0"
	],
	[
		"id" => 26912,
		"user_id" => 33509,
		"work_status" => "0"
	],
	[
		"id" => 26913,
		"user_id" => 33510,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27097,
		"user_id" => 33737,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26914,
		"user_id" => 33511,
		"work_status" => "Non European National"
	],
	[
		"id" => 26915,
		"user_id" => 32423,
		"work_status" => "Non European National"
	],
	[
		"id" => 26916,
		"user_id" => 33514,
		"work_status" => "Non European National"
	],
	[
		"id" => 26917,
		"user_id" => 33515,
		"work_status" => "European National"
	],
	[
		"id" => 26918,
		"user_id" => 33516,
		"work_status" => "Non European National"
	],
	[
		"id" => 26919,
		"user_id" => 33518,
		"work_status" => "Non European National"
	],
	[
		"id" => 26920,
		"user_id" => 33519,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26921,
		"user_id" => 33520,
		"work_status" => "0"
	],
	[
		"id" => 26922,
		"user_id" => 33523,
		"work_status" => "Non European National"
	],
	[
		"id" => 26923,
		"user_id" => 33524,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26924,
		"user_id" => 33525,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26925,
		"user_id" => 33521,
		"work_status" => "Non European National"
	],
	[
		"id" => 26926,
		"user_id" => 33527,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26927,
		"user_id" => 33528,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26928,
		"user_id" => 33529,
		"work_status" => "Non European National"
	],
	[
		"id" => 26929,
		"user_id" => 33526,
		"work_status" => "Non European National"
	],
	[
		"id" => 26930,
		"user_id" => 33530,
		"work_status" => "European National"
	],
	[
		"id" => 26931,
		"user_id" => 33533,
		"work_status" => "Non European National"
	],
	[
		"id" => 26932,
		"user_id" => 33535,
		"work_status" => "Non European National"
	],
	[
		"id" => 26933,
		"user_id" => 33536,
		"work_status" => "European National"
	],
	[
		"id" => 26934,
		"user_id" => 20989,
		"work_status" => "Non European National"
	],
	[
		"id" => 26935,
		"user_id" => 33539,
		"work_status" => "0"
	],
	[
		"id" => 26936,
		"user_id" => 33538,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26937,
		"user_id" => 24933,
		"work_status" => "European National"
	],
	[
		"id" => 26938,
		"user_id" => 33541,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26939,
		"user_id" => 33542,
		"work_status" => "Non European National"
	],
	[
		"id" => 26940,
		"user_id" => 19702,
		"work_status" => "European National"
	],
	[
		"id" => 26941,
		"user_id" => 33543,
		"work_status" => "0"
	],
	[
		"id" => 26942,
		"user_id" => 33544,
		"work_status" => "European National"
	],
	[
		"id" => 26943,
		"user_id" => 33545,
		"work_status" => "0"
	],
	[
		"id" => 26944,
		"user_id" => 32311,
		"work_status" => "European National"
	],
	[
		"id" => 26945,
		"user_id" => 33507,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26946,
		"user_id" => 32878,
		"work_status" => "European National"
	],
	[
		"id" => 26947,
		"user_id" => 33547,
		"work_status" => "Non European National"
	],
	[
		"id" => 26948,
		"user_id" => 33455,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26949,
		"user_id" => 33548,
		"work_status" => "Non European National"
	],
	[
		"id" => 26950,
		"user_id" => 33551,
		"work_status" => "0"
	],
	[
		"id" => 26951,
		"user_id" => 20488,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26952,
		"user_id" => 33554,
		"work_status" => "European National"
	],
	[
		"id" => 26953,
		"user_id" => 33555,
		"work_status" => "Non European National"
	],
	[
		"id" => 26954,
		"user_id" => 26939,
		"work_status" => "European National"
	],
	[
		"id" => 26955,
		"user_id" => 33558,
		"work_status" => "0"
	],
	[
		"id" => 26956,
		"user_id" => 33559,
		"work_status" => "Non European National"
	],
	[
		"id" => 26957,
		"user_id" => 33560,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26958,
		"user_id" => 33562,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26959,
		"user_id" => 33563,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26960,
		"user_id" => 28974,
		"work_status" => "Non European National"
	],
	[
		"id" => 26961,
		"user_id" => 33567,
		"work_status" => "0"
	],
	[
		"id" => 26962,
		"user_id" => 33566,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26963,
		"user_id" => 33569,
		"work_status" => "European National"
	],
	[
		"id" => 26964,
		"user_id" => 33570,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26965,
		"user_id" => 33561,
		"work_status" => "Non European National"
	],
	[
		"id" => 26966,
		"user_id" => 33571,
		"work_status" => "Non European National"
	],
	[
		"id" => 26967,
		"user_id" => 33574,
		"work_status" => "0"
	],
	[
		"id" => 26968,
		"user_id" => 33394,
		"work_status" => "European National"
	],
	[
		"id" => 26969,
		"user_id" => 33578,
		"work_status" => "Non European National"
	],
	[
		"id" => 26970,
		"user_id" => 33550,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26971,
		"user_id" => 33580,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26972,
		"user_id" => 33314,
		"work_status" => "Non European National"
	],
	[
		"id" => 26973,
		"user_id" => 32427,
		"work_status" => "European National"
	],
	[
		"id" => 26974,
		"user_id" => 33582,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26975,
		"user_id" => 33583,
		"work_status" => "European National"
	],
	[
		"id" => 26976,
		"user_id" => 33584,
		"work_status" => "0"
	],
	[
		"id" => 26977,
		"user_id" => 33585,
		"work_status" => "European National"
	],
	[
		"id" => 26978,
		"user_id" => 32845,
		"work_status" => "Non European National"
	],
	[
		"id" => 26979,
		"user_id" => 33586,
		"work_status" => "European National"
	],
	[
		"id" => 26980,
		"user_id" => 33587,
		"work_status" => "Non European National"
	],
	[
		"id" => 26981,
		"user_id" => 33590,
		"work_status" => "Non European National"
	],
	[
		"id" => 26982,
		"user_id" => 33591,
		"work_status" => "0"
	],
	[
		"id" => 26983,
		"user_id" => 33592,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26984,
		"user_id" => 33593,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26985,
		"user_id" => 33597,
		"work_status" => "European National"
	],
	[
		"id" => 26986,
		"user_id" => 33598,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26987,
		"user_id" => 33599,
		"work_status" => "European National"
	],
	[
		"id" => 26988,
		"user_id" => 33435,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26989,
		"user_id" => 33601,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26990,
		"user_id" => 33602,
		"work_status" => "Non European National"
	],
	[
		"id" => 26991,
		"user_id" => 33594,
		"work_status" => "European National"
	],
	[
		"id" => 26992,
		"user_id" => 33604,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26993,
		"user_id" => 33605,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26994,
		"user_id" => 33606,
		"work_status" => "0"
	],
	[
		"id" => 26995,
		"user_id" => 33607,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 26996,
		"user_id" => 33608,
		"work_status" => "Non European National"
	],
	[
		"id" => 26997,
		"user_id" => 33609,
		"work_status" => "European National"
	],
	[
		"id" => 26998,
		"user_id" => 33611,
		"work_status" => "0"
	],
	[
		"id" => 26999,
		"user_id" => 33613,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27001,
		"user_id" => 33614,
		"work_status" => "0"
	],
	[
		"id" => 27002,
		"user_id" => 33616,
		"work_status" => "Non European National"
	],
	[
		"id" => 27003,
		"user_id" => 33618,
		"work_status" => "European National"
	],
	[
		"id" => 27004,
		"user_id" => 33619,
		"work_status" => "Non European National"
	],
	[
		"id" => 27005,
		"user_id" => 33620,
		"work_status" => "0"
	],
	[
		"id" => 27006,
		"user_id" => 33621,
		"work_status" => "European National"
	],
	[
		"id" => 27007,
		"user_id" => 33622,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27008,
		"user_id" => 33623,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27009,
		"user_id" => 33624,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27010,
		"user_id" => 33626,
		"work_status" => "European National"
	],
	[
		"id" => 27011,
		"user_id" => 33627,
		"work_status" => "Non European National"
	],
	[
		"id" => 27012,
		"user_id" => 33612,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27013,
		"user_id" => 33628,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27014,
		"user_id" => 33629,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27015,
		"user_id" => 33588,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27016,
		"user_id" => 33630,
		"work_status" => "European National"
	],
	[
		"id" => 27017,
		"user_id" => 33631,
		"work_status" => "European National"
	],
	[
		"id" => 27018,
		"user_id" => 33633,
		"work_status" => "0"
	],
	[
		"id" => 27019,
		"user_id" => 33634,
		"work_status" => "European National"
	],
	[
		"id" => 27020,
		"user_id" => 33636,
		"work_status" => "European National"
	],
	[
		"id" => 27021,
		"user_id" => 33576,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27022,
		"user_id" => 33637,
		"work_status" => "European National"
	],
	[
		"id" => 27023,
		"user_id" => 33638,
		"work_status" => "European National"
	],
	[
		"id" => 27024,
		"user_id" => 33639,
		"work_status" => "European National"
	],
	[
		"id" => 27025,
		"user_id" => 33641,
		"work_status" => "European National"
	],
	[
		"id" => 27035,
		"user_id" => 33653,
		"work_status" => "Non European National"
	],
	[
		"id" => 27036,
		"user_id" => 33650,
		"work_status" => "Non European National"
	],
	[
		"id" => 27037,
		"user_id" => 33654,
		"work_status" => "0"
	],
	[
		"id" => 27038,
		"user_id" => 33655,
		"work_status" => "European National"
	],
	[
		"id" => 27039,
		"user_id" => 33656,
		"work_status" => "European National"
	],
	[
		"id" => 27040,
		"user_id" => 33625,
		"work_status" => "Non European National"
	],
	[
		"id" => 27041,
		"user_id" => 33657,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27042,
		"user_id" => 33659,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27043,
		"user_id" => 33661,
		"work_status" => "0"
	],
	[
		"id" => 27044,
		"user_id" => 33662,
		"work_status" => "Non European National"
	],
	[
		"id" => 27045,
		"user_id" => 33557,
		"work_status" => "European National"
	],
	[
		"id" => 27046,
		"user_id" => 24872,
		"work_status" => "Non European National"
	],
	[
		"id" => 27047,
		"user_id" => 33664,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27048,
		"user_id" => 33665,
		"work_status" => "0"
	],
	[
		"id" => 27049,
		"user_id" => 33666,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27050,
		"user_id" => 33667,
		"work_status" => "0"
	],
	[
		"id" => 27051,
		"user_id" => 20831,
		"work_status" => "European National"
	],
	[
		"id" => 27052,
		"user_id" => 33671,
		"work_status" => "0"
	],
	[
		"id" => 27053,
		"user_id" => 33668,
		"work_status" => "European National"
	],
	[
		"id" => 27054,
		"user_id" => 33672,
		"work_status" => "0"
	],
	[
		"id" => 27055,
		"user_id" => 33674,
		"work_status" => "Non European National"
	],
	[
		"id" => 27056,
		"user_id" => 33675,
		"work_status" => "Non European National"
	],
	[
		"id" => 27057,
		"user_id" => 33676,
		"work_status" => "Non European National"
	],
	[
		"id" => 27058,
		"user_id" => 33679,
		"work_status" => "Non European National"
	],
	[
		"id" => 27059,
		"user_id" => 33680,
		"work_status" => "European National"
	],
	[
		"id" => 27060,
		"user_id" => 33681,
		"work_status" => "Non European National"
	],
	[
		"id" => 27061,
		"user_id" => 33682,
		"work_status" => "Non European National"
	],
	[
		"id" => 27062,
		"user_id" => 33683,
		"work_status" => "European National"
	],
	[
		"id" => 27063,
		"user_id" => 33686,
		"work_status" => "European National"
	],
	[
		"id" => 27064,
		"user_id" => 33688,
		"work_status" => "Non European National"
	],
	[
		"id" => 27065,
		"user_id" => 33689,
		"work_status" => "Non European National"
	],
	[
		"id" => 27066,
		"user_id" => 33693,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27067,
		"user_id" => 33695,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27068,
		"user_id" => 33696,
		"work_status" => "Non European National"
	],
	[
		"id" => 27069,
		"user_id" => 33698,
		"work_status" => "0"
	],
	[
		"id" => 27070,
		"user_id" => 33701,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27071,
		"user_id" => 33702,
		"work_status" => "Non European National"
	],
	[
		"id" => 27072,
		"user_id" => 33703,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27073,
		"user_id" => 33705,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27074,
		"user_id" => 33706,
		"work_status" => "European National"
	],
	[
		"id" => 27075,
		"user_id" => 33707,
		"work_status" => "0"
	],
	[
		"id" => 27076,
		"user_id" => 33710,
		"work_status" => "European National"
	],
	[
		"id" => 27077,
		"user_id" => 33699,
		"work_status" => "Non European National"
	],
	[
		"id" => 27078,
		"user_id" => 33711,
		"work_status" => "Non European National"
	],
	[
		"id" => 27079,
		"user_id" => 33712,
		"work_status" => "Non European National"
	],
	[
		"id" => 27080,
		"user_id" => 33315,
		"work_status" => "Non European National"
	],
	[
		"id" => 27081,
		"user_id" => 33713,
		"work_status" => "0"
	],
	[
		"id" => 27082,
		"user_id" => 33715,
		"work_status" => "0"
	],
	[
		"id" => 27083,
		"user_id" => 33716,
		"work_status" => "Non European National"
	],
	[
		"id" => 27088,
		"user_id" => 33721,
		"work_status" => "0"
	],
	[
		"id" => 27089,
		"user_id" => 33670,
		"work_status" => "0"
	],
	[
		"id" => 27090,
		"user_id" => 33722,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27091,
		"user_id" => 33082,
		"work_status" => "European National"
	],
	[
		"id" => 27092,
		"user_id" => 33725,
		"work_status" => "Non European National"
	],
	[
		"id" => 27093,
		"user_id" => 33730,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27094,
		"user_id" => 33731,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27095,
		"user_id" => 33736,
		"work_status" => "Non European National"
	],
	[
		"id" => 27098,
		"user_id" => 33738,
		"work_status" => "0"
	],
	[
		"id" => 27099,
		"user_id" => 33739,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27100,
		"user_id" => 33735,
		"work_status" => "0"
	],
	[
		"id" => 27101,
		"user_id" => 33741,
		"work_status" => "0"
	],
	[
		"id" => 27102,
		"user_id" => 33742,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27103,
		"user_id" => 33727,
		"work_status" => "Non European National"
	],
	[
		"id" => 27104,
		"user_id" => 33743,
		"work_status" => "European National"
	],
	[
		"id" => 27105,
		"user_id" => 33454,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27106,
		"user_id" => 33744,
		"work_status" => "Non European National"
	],
	[
		"id" => 27107,
		"user_id" => 33709,
		"work_status" => "Non European National"
	],
	[
		"id" => 27108,
		"user_id" => 33748,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27109,
		"user_id" => 33747,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27110,
		"user_id" => 33751,
		"work_status" => "Non European National"
	],
	[
		"id" => 27111,
		"user_id" => 33752,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27112,
		"user_id" => 33757,
		"work_status" => "Non European National"
	],
	[
		"id" => 27113,
		"user_id" => 33758,
		"work_status" => "Non European National"
	],
	[
		"id" => 27114,
		"user_id" => 33761,
		"work_status" => "Non European National"
	],
	[
		"id" => 27115,
		"user_id" => 33762,
		"work_status" => "European National"
	],
	[
		"id" => 27116,
		"user_id" => 33763,
		"work_status" => "0"
	],
	[
		"id" => 27117,
		"user_id" => 33764,
		"work_status" => "Non European National"
	],
	[
		"id" => 27118,
		"user_id" => 33766,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27119,
		"user_id" => 33768,
		"work_status" => "European National"
	],
	[
		"id" => 27120,
		"user_id" => 33770,
		"work_status" => "0"
	],
	[
		"id" => 27121,
		"user_id" => 33772,
		"work_status" => "Non European National"
	],
	[
		"id" => 27122,
		"user_id" => 33773,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27123,
		"user_id" => 33774,
		"work_status" => "0"
	],
	[
		"id" => 27124,
		"user_id" => 33776,
		"work_status" => "0"
	],
	[
		"id" => 27125,
		"user_id" => 33775,
		"work_status" => "Non European National"
	],
	[
		"id" => 27126,
		"user_id" => 33779,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27127,
		"user_id" => 33777,
		"work_status" => "European National"
	],
	[
		"id" => 27128,
		"user_id" => 33780,
		"work_status" => "0"
	],
	[
		"id" => 27129,
		"user_id" => 33781,
		"work_status" => "Non European National"
	],
	[
		"id" => 27130,
		"user_id" => 33782,
		"work_status" => "Non European National"
	],
	[
		"id" => 27131,
		"user_id" => 33783,
		"work_status" => "Non European National"
	],
	[
		"id" => 27132,
		"user_id" => 33778,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27133,
		"user_id" => 33784,
		"work_status" => "Non European National"
	],
	[
		"id" => 27134,
		"user_id" => 33771,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27135,
		"user_id" => 33785,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27136,
		"user_id" => 33786,
		"work_status" => "0"
	],
	[
		"id" => 27137,
		"user_id" => 33787,
		"work_status" => "Non European National"
	],
	[
		"id" => 27138,
		"user_id" => 33788,
		"work_status" => "Non European National"
	],
	[
		"id" => 27139,
		"user_id" => 33790,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27140,
		"user_id" => 33793,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27141,
		"user_id" => 33794,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27142,
		"user_id" => 33795,
		"work_status" => "Non European National"
	],
	[
		"id" => 27143,
		"user_id" => 33796,
		"work_status" => "0"
	],
	[
		"id" => 27144,
		"user_id" => 33798,
		"work_status" => "Non European National"
	],
	[
		"id" => 27147,
		"user_id" => 33767,
		"work_status" => "Non European National"
	],
	[
		"id" => 27148,
		"user_id" => 33800,
		"work_status" => "European National"
	],
	[
		"id" => 27149,
		"user_id" => 33801,
		"work_status" => "Non European National"
	],
	[
		"id" => 27150,
		"user_id" => 33803,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27151,
		"user_id" => 33804,
		"work_status" => "Non European National"
	],
	[
		"id" => 27152,
		"user_id" => 33808,
		"work_status" => "Non European National"
	],
	[
		"id" => 27153,
		"user_id" => 33811,
		"work_status" => "Non European National"
	],
	[
		"id" => 27154,
		"user_id" => 33812,
		"work_status" => "0"
	],
	[
		"id" => 27155,
		"user_id" => 33810,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27156,
		"user_id" => 33813,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27157,
		"user_id" => 33815,
		"work_status" => "0"
	],
	[
		"id" => 27158,
		"user_id" => 33817,
		"work_status" => "European National"
	],
	[
		"id" => 27159,
		"user_id" => 33818,
		"work_status" => "Non European National"
	],
	[
		"id" => 27160,
		"user_id" => 33821,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27161,
		"user_id" => 33824,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27162,
		"user_id" => 33825,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27163,
		"user_id" => 33749,
		"work_status" => "European National"
	],
	[
		"id" => 27164,
		"user_id" => 33829,
		"work_status" => "0"
	],
	[
		"id" => 27165,
		"user_id" => 33830,
		"work_status" => "European National"
	],
	[
		"id" => 27166,
		"user_id" => 33831,
		"work_status" => "0"
	],
	[
		"id" => 27167,
		"user_id" => 33835,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27168,
		"user_id" => 33836,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27169,
		"user_id" => 33809,
		"work_status" => "0"
	],
	[
		"id" => 27170,
		"user_id" => 33837,
		"work_status" => "0"
	],
	[
		"id" => 27171,
		"user_id" => 33838,
		"work_status" => "European National"
	],
	[
		"id" => 27172,
		"user_id" => 33839,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27173,
		"user_id" => 33840,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27174,
		"user_id" => 33843,
		"work_status" => "0"
	],
	[
		"id" => 27175,
		"user_id" => 33847,
		"work_status" => "Non European National"
	],
	[
		"id" => 27176,
		"user_id" => 33848,
		"work_status" => "Non European National"
	],
	[
		"id" => 27177,
		"user_id" => 33845,
		"work_status" => "Non European National"
	],
	[
		"id" => 27178,
		"user_id" => 33849,
		"work_status" => "European National"
	],
	[
		"id" => 27179,
		"user_id" => 33851,
		"work_status" => "European National"
	],
	[
		"id" => 27180,
		"user_id" => 33853,
		"work_status" => "Non European National"
	],
	[
		"id" => 27181,
		"user_id" => 33855,
		"work_status" => "European National"
	],
	[
		"id" => 27182,
		"user_id" => 33858,
		"work_status" => "Non European National"
	],
	[
		"id" => 27183,
		"user_id" => 33856,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27184,
		"user_id" => 33862,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27185,
		"user_id" => 32633,
		"work_status" => "0"
	],
	[
		"id" => 27186,
		"user_id" => 33863,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27187,
		"user_id" => 33866,
		"work_status" => "Non European National"
	],
	[
		"id" => 27188,
		"user_id" => 33868,
		"work_status" => "Non European National"
	],
	[
		"id" => 27189,
		"user_id" => 33870,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27190,
		"user_id" => 33869,
		"work_status" => "0"
	],
	[
		"id" => 27191,
		"user_id" => 33871,
		"work_status" => "European National"
	],
	[
		"id" => 27192,
		"user_id" => 33872,
		"work_status" => "Non European National"
	],
	[
		"id" => 27193,
		"user_id" => 33874,
		"work_status" => "Non European National"
	],
	[
		"id" => 27194,
		"user_id" => 33873,
		"work_status" => "European National"
	],
	[
		"id" => 27195,
		"user_id" => 33876,
		"work_status" => "Non European National"
	],
	[
		"id" => 27196,
		"user_id" => 33875,
		"work_status" => "Non European National"
	],
	[
		"id" => 27197,
		"user_id" => 33877,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27198,
		"user_id" => 33880,
		"work_status" => "Non European National"
	],
	[
		"id" => 27199,
		"user_id" => 33882,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27200,
		"user_id" => 33884,
		"work_status" => "0"
	],
	[
		"id" => 27201,
		"user_id" => 33860,
		"work_status" => "0"
	],
	[
		"id" => 27202,
		"user_id" => 33886,
		"work_status" => "Non European National"
	],
	[
		"id" => 27203,
		"user_id" => 33887,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27204,
		"user_id" => 33889,
		"work_status" => "Non European National"
	],
	[
		"id" => 27205,
		"user_id" => 33892,
		"work_status" => "European National"
	],
	[
		"id" => 27206,
		"user_id" => 33895,
		"work_status" => "Non European National"
	],
	[
		"id" => 27207,
		"user_id" => 33894,
		"work_status" => "Non European National"
	],
	[
		"id" => 27208,
		"user_id" => 33896,
		"work_status" => "Non European National"
	],
	[
		"id" => 27209,
		"user_id" => 33897,
		"work_status" => "0"
	],
	[
		"id" => 27210,
		"user_id" => 33898,
		"work_status" => "Non European National"
	],
	[
		"id" => 27211,
		"user_id" => 33901,
		"work_status" => "0"
	],
	[
		"id" => 27212,
		"user_id" => 33906,
		"work_status" => "0"
	],
	[
		"id" => 27213,
		"user_id" => 33907,
		"work_status" => "European National"
	],
	[
		"id" => 27214,
		"user_id" => 33909,
		"work_status" => "0"
	],
	[
		"id" => 27215,
		"user_id" => 33910,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27216,
		"user_id" => 33908,
		"work_status" => "0"
	],
	[
		"id" => 27217,
		"user_id" => 33914,
		"work_status" => "Non European National"
	],
	[
		"id" => 27218,
		"user_id" => 33915,
		"work_status" => "European National"
	],
	[
		"id" => 27219,
		"user_id" => 33905,
		"work_status" => "European National"
	],
	[
		"id" => 27220,
		"user_id" => 33917,
		"work_status" => "0"
	],
	[
		"id" => 27221,
		"user_id" => 33918,
		"work_status" => "0"
	],
	[
		"id" => 27222,
		"user_id" => 9984,
		"work_status" => "Non European National"
	],
	[
		"id" => 27223,
		"user_id" => 33893,
		"work_status" => "European National"
	],
	[
		"id" => 27224,
		"user_id" => 33921,
		"work_status" => "European National"
	],
	[
		"id" => 27225,
		"user_id" => 33922,
		"work_status" => "Non European National"
	],
	[
		"id" => 27226,
		"user_id" => 33890,
		"work_status" => "Non European National"
	],
	[
		"id" => 27227,
		"user_id" => 33924,
		"work_status" => "European National"
	],
	[
		"id" => 27228,
		"user_id" => 33926,
		"work_status" => "European National"
	],
	[
		"id" => 27283,
		"user_id" => 31799,
		"work_status" => "European National"
	],
	[
		"id" => 27230,
		"user_id" => 12403,
		"work_status" => "European National"
	],
	[
		"id" => 27231,
		"user_id" => 33902,
		"work_status" => "Non European National"
	],
	[
		"id" => 27232,
		"user_id" => 33928,
		"work_status" => "Non European National"
	],
	[
		"id" => 27233,
		"user_id" => 33929,
		"work_status" => "European National"
	],
	[
		"id" => 27234,
		"user_id" => 26541,
		"work_status" => "Non European National"
	],
	[
		"id" => 27235,
		"user_id" => 33932,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27239,
		"user_id" => 33937,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27241,
		"user_id" => 33431,
		"work_status" => "0"
	],
	[
		"id" => 27242,
		"user_id" => 33943,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27243,
		"user_id" => 32656,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27244,
		"user_id" => 33946,
		"work_status" => "Non European National"
	],
	[
		"id" => 27245,
		"user_id" => 33938,
		"work_status" => "0"
	],
	[
		"id" => 27246,
		"user_id" => 33949,
		"work_status" => "European National"
	],
	[
		"id" => 27247,
		"user_id" => 33912,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27248,
		"user_id" => 33951,
		"work_status" => "0"
	],
	[
		"id" => 27249,
		"user_id" => 33765,
		"work_status" => "Non European National"
	],
	[
		"id" => 27250,
		"user_id" => 33903,
		"work_status" => "European National"
	],
	[
		"id" => 27251,
		"user_id" => 33954,
		"work_status" => "Non European National"
	],
	[
		"id" => 27252,
		"user_id" => 33956,
		"work_status" => "0"
	],
	[
		"id" => 27253,
		"user_id" => 28927,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27254,
		"user_id" => 28933,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27255,
		"user_id" => 33958,
		"work_status" => "Non European National"
	],
	[
		"id" => 27256,
		"user_id" => 33960,
		"work_status" => "Non European National"
	],
	[
		"id" => 27257,
		"user_id" => 33961,
		"work_status" => "Non European National"
	],
	[
		"id" => 27258,
		"user_id" => 33962,
		"work_status" => "Non European National"
	],
	[
		"id" => 27259,
		"user_id" => 33963,
		"work_status" => "European National"
	],
	[
		"id" => 27511,
		"user_id" => 34351,
		"work_status" => "European National"
	],
	[
		"id" => 27261,
		"user_id" => 33966,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27262,
		"user_id" => 30755,
		"work_status" => "European National"
	],
	[
		"id" => 27341,
		"user_id" => 34078,
		"work_status" => "Non European National"
	],
	[
		"id" => 27263,
		"user_id" => 33968,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27265,
		"user_id" => 33971,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27266,
		"user_id" => 33970,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27267,
		"user_id" => 33973,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27268,
		"user_id" => 33972,
		"work_status" => "European National"
	],
	[
		"id" => 27269,
		"user_id" => 33974,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27270,
		"user_id" => 33975,
		"work_status" => "0"
	],
	[
		"id" => 27347,
		"user_id" => 34085,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27273,
		"user_id" => 33980,
		"work_status" => "Non European National"
	],
	[
		"id" => 27275,
		"user_id" => 32388,
		"work_status" => "European National"
	],
	[
		"id" => 27276,
		"user_id" => 33982,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27277,
		"user_id" => 33987,
		"work_status" => "Non European National"
	],
	[
		"id" => 27278,
		"user_id" => 33988,
		"work_status" => "0"
	],
	[
		"id" => 27279,
		"user_id" => 33989,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27280,
		"user_id" => 33005,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27281,
		"user_id" => 33984,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27282,
		"user_id" => 33993,
		"work_status" => "European National"
	],
	[
		"id" => 27284,
		"user_id" => 33018,
		"work_status" => "European National"
	],
	[
		"id" => 27285,
		"user_id" => 33994,
		"work_status" => "European National"
	],
	[
		"id" => 27286,
		"user_id" => 33996,
		"work_status" => "0"
	],
	[
		"id" => 27287,
		"user_id" => 33999,
		"work_status" => "European National"
	],
	[
		"id" => 27288,
		"user_id" => 33998,
		"work_status" => "European National"
	],
	[
		"id" => 27289,
		"user_id" => 34000,
		"work_status" => "European National"
	],
	[
		"id" => 27292,
		"user_id" => 34007,
		"work_status" => "European National"
	],
	[
		"id" => 27293,
		"user_id" => 34010,
		"work_status" => "0"
	],
	[
		"id" => 27294,
		"user_id" => 34011,
		"work_status" => "European National"
	],
	[
		"id" => 27295,
		"user_id" => 34013,
		"work_status" => "0"
	],
	[
		"id" => 27296,
		"user_id" => 34014,
		"work_status" => "European National"
	],
	[
		"id" => 27297,
		"user_id" => 34016,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27302,
		"user_id" => 33911,
		"work_status" => "Non European National"
	],
	[
		"id" => 27303,
		"user_id" => 34022,
		"work_status" => "0"
	],
	[
		"id" => 27304,
		"user_id" => 34021,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27305,
		"user_id" => 34015,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27306,
		"user_id" => 30601,
		"work_status" => "Non European National"
	],
	[
		"id" => 27307,
		"user_id" => 34025,
		"work_status" => "Non European National"
	],
	[
		"id" => 27308,
		"user_id" => 34026,
		"work_status" => "Non European National"
	],
	[
		"id" => 27309,
		"user_id" => 28994,
		"work_status" => "0"
	],
	[
		"id" => 27310,
		"user_id" => 34027,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27311,
		"user_id" => 34028,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27312,
		"user_id" => 34029,
		"work_status" => "Non European National"
	],
	[
		"id" => 27313,
		"user_id" => 34030,
		"work_status" => "European National"
	],
	[
		"id" => 27318,
		"user_id" => 34038,
		"work_status" => "0"
	],
	[
		"id" => 27319,
		"user_id" => 34040,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27317,
		"user_id" => 34036,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27320,
		"user_id" => 34041,
		"work_status" => "European National"
	],
	[
		"id" => 27321,
		"user_id" => 34042,
		"work_status" => "Non European National"
	],
	[
		"id" => 27322,
		"user_id" => 34043,
		"work_status" => "European National"
	],
	[
		"id" => 27323,
		"user_id" => 34044,
		"work_status" => "Non European National"
	],
	[
		"id" => 27324,
		"user_id" => 34050,
		"work_status" => "European National"
	],
	[
		"id" => 27325,
		"user_id" => 34051,
		"work_status" => "0"
	],
	[
		"id" => 27326,
		"user_id" => 34053,
		"work_status" => "Non European National"
	],
	[
		"id" => 27327,
		"user_id" => 34054,
		"work_status" => "European National"
	],
	[
		"id" => 27328,
		"user_id" => 34056,
		"work_status" => "Non European National"
	],
	[
		"id" => 27329,
		"user_id" => 34059,
		"work_status" => "0"
	],
	[
		"id" => 27330,
		"user_id" => 34063,
		"work_status" => "0"
	],
	[
		"id" => 27331,
		"user_id" => 34064,
		"work_status" => "Non European National"
	],
	[
		"id" => 27332,
		"user_id" => 34062,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27333,
		"user_id" => 34067,
		"work_status" => "0"
	],
	[
		"id" => 27334,
		"user_id" => 34048,
		"work_status" => "Non European National"
	],
	[
		"id" => 27335,
		"user_id" => 34069,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27336,
		"user_id" => 34073,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27337,
		"user_id" => 34074,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27338,
		"user_id" => 34075,
		"work_status" => "0"
	],
	[
		"id" => 27339,
		"user_id" => 34076,
		"work_status" => "0"
	],
	[
		"id" => 27340,
		"user_id" => 34077,
		"work_status" => "0"
	],
	[
		"id" => 27342,
		"user_id" => 34079,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27343,
		"user_id" => 34080,
		"work_status" => "European National"
	],
	[
		"id" => 27344,
		"user_id" => 34081,
		"work_status" => "Non European National"
	],
	[
		"id" => 27345,
		"user_id" => 34083,
		"work_status" => "0"
	],
	[
		"id" => 27346,
		"user_id" => 34070,
		"work_status" => "Non European National"
	],
	[
		"id" => 27349,
		"user_id" => 34089,
		"work_status" => "0"
	],
	[
		"id" => 27350,
		"user_id" => 34090,
		"work_status" => "Non European National"
	],
	[
		"id" => 27351,
		"user_id" => 34092,
		"work_status" => "European National"
	],
	[
		"id" => 27352,
		"user_id" => 34095,
		"work_status" => "European National"
	],
	[
		"id" => 27353,
		"user_id" => 34096,
		"work_status" => "0"
	],
	[
		"id" => 27354,
		"user_id" => 34097,
		"work_status" => "0"
	],
	[
		"id" => 27355,
		"user_id" => 34101,
		"work_status" => "0"
	],
	[
		"id" => 27356,
		"user_id" => 34102,
		"work_status" => "European National"
	],
	[
		"id" => 27357,
		"user_id" => 34104,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27358,
		"user_id" => 34106,
		"work_status" => "0"
	],
	[
		"id" => 27359,
		"user_id" => 34107,
		"work_status" => "0"
	],
	[
		"id" => 27360,
		"user_id" => 34108,
		"work_status" => "0"
	],
	[
		"id" => 27361,
		"user_id" => 34111,
		"work_status" => "European National"
	],
	[
		"id" => 27363,
		"user_id" => 34115,
		"work_status" => "Non European National"
	],
	[
		"id" => 27364,
		"user_id" => 34116,
		"work_status" => "Non European National"
	],
	[
		"id" => 27366,
		"user_id" => 34123,
		"work_status" => "Non European National"
	],
	[
		"id" => 27367,
		"user_id" => 34124,
		"work_status" => "Non European National"
	],
	[
		"id" => 27368,
		"user_id" => 34125,
		"work_status" => "European National"
	],
	[
		"id" => 27369,
		"user_id" => 34120,
		"work_status" => "Non European National"
	],
	[
		"id" => 27370,
		"user_id" => 34131,
		"work_status" => "0"
	],
	[
		"id" => 27371,
		"user_id" => 20987,
		"work_status" => "Non European National"
	],
	[
		"id" => 27372,
		"user_id" => 34132,
		"work_status" => "Non European National"
	],
	[
		"id" => 27373,
		"user_id" => 34134,
		"work_status" => "European National"
	],
	[
		"id" => 27374,
		"user_id" => 34136,
		"work_status" => "Non European National"
	],
	[
		"id" => 27375,
		"user_id" => 34137,
		"work_status" => "Non European National"
	],
	[
		"id" => 27376,
		"user_id" => 34139,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27377,
		"user_id" => 34141,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27378,
		"user_id" => 34143,
		"work_status" => "0"
	],
	[
		"id" => 27379,
		"user_id" => 34144,
		"work_status" => "European National"
	],
	[
		"id" => 27380,
		"user_id" => 34145,
		"work_status" => "European National"
	],
	[
		"id" => 27381,
		"user_id" => 34146,
		"work_status" => "Non European National"
	],
	[
		"id" => 27382,
		"user_id" => 34149,
		"work_status" => "0"
	],
	[
		"id" => 27383,
		"user_id" => 34150,
		"work_status" => "Non European National"
	],
	[
		"id" => 27384,
		"user_id" => 34152,
		"work_status" => "Non European National"
	],
	[
		"id" => 27385,
		"user_id" => 34151,
		"work_status" => "Non European National"
	],
	[
		"id" => 27386,
		"user_id" => 34154,
		"work_status" => "European National"
	],
	[
		"id" => 27387,
		"user_id" => 34155,
		"work_status" => "0"
	],
	[
		"id" => 27388,
		"user_id" => 34156,
		"work_status" => "0"
	],
	[
		"id" => 27389,
		"user_id" => 34157,
		"work_status" => "Non European National"
	],
	[
		"id" => 27390,
		"user_id" => 34159,
		"work_status" => "Non European National"
	],
	[
		"id" => 27391,
		"user_id" => 34161,
		"work_status" => "0"
	],
	[
		"id" => 27392,
		"user_id" => 34162,
		"work_status" => "0"
	],
	[
		"id" => 27393,
		"user_id" => 34165,
		"work_status" => "0"
	],
	[
		"id" => 27394,
		"user_id" => 34168,
		"work_status" => "Non European National"
	],
	[
		"id" => 27395,
		"user_id" => 34170,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27396,
		"user_id" => 34172,
		"work_status" => "European National"
	],
	[
		"id" => 27397,
		"user_id" => 34173,
		"work_status" => "Non European National"
	],
	[
		"id" => 27398,
		"user_id" => 34174,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27399,
		"user_id" => 34176,
		"work_status" => "Non European National"
	],
	[
		"id" => 27401,
		"user_id" => 34171,
		"work_status" => "0"
	],
	[
		"id" => 27402,
		"user_id" => 34183,
		"work_status" => "European National"
	],
	[
		"id" => 27403,
		"user_id" => 34148,
		"work_status" => "0"
	],
	[
		"id" => 27404,
		"user_id" => 34186,
		"work_status" => "Non European National"
	],
	[
		"id" => 27409,
		"user_id" => 34191,
		"work_status" => "European National"
	],
	[
		"id" => 27410,
		"user_id" => 34192,
		"work_status" => "European National"
	],
	[
		"id" => 27411,
		"user_id" => 34194,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27412,
		"user_id" => 34195,
		"work_status" => "0"
	],
	[
		"id" => 27413,
		"user_id" => 34196,
		"work_status" => "European National"
	],
	[
		"id" => 27414,
		"user_id" => 34199,
		"work_status" => "European National"
	],
	[
		"id" => 27415,
		"user_id" => 34200,
		"work_status" => "European National"
	],
	[
		"id" => 27416,
		"user_id" => 34201,
		"work_status" => "European National"
	],
	[
		"id" => 27417,
		"user_id" => 34203,
		"work_status" => "Non European National"
	],
	[
		"id" => 27418,
		"user_id" => 34205,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27419,
		"user_id" => 34207,
		"work_status" => "Non European National"
	],
	[
		"id" => 27420,
		"user_id" => 34208,
		"work_status" => "0"
	],
	[
		"id" => 27421,
		"user_id" => 34209,
		"work_status" => "Non European National"
	],
	[
		"id" => 27422,
		"user_id" => 34211,
		"work_status" => "Non European National"
	],
	[
		"id" => 27423,
		"user_id" => 34212,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27551,
		"user_id" => 34419,
		"work_status" => "Non European National"
	],
	[
		"id" => 27426,
		"user_id" => 33307,
		"work_status" => "European National"
	],
	[
		"id" => 27427,
		"user_id" => 34216,
		"work_status" => "European National"
	],
	[
		"id" => 27428,
		"user_id" => 34218,
		"work_status" => "Non European National"
	],
	[
		"id" => 27429,
		"user_id" => 34219,
		"work_status" => "European National"
	],
	[
		"id" => 27430,
		"user_id" => 34221,
		"work_status" => "Non European National"
	],
	[
		"id" => 27431,
		"user_id" => 34222,
		"work_status" => "Non European National"
	],
	[
		"id" => 27432,
		"user_id" => 34225,
		"work_status" => "European National"
	],
	[
		"id" => 27433,
		"user_id" => 34226,
		"work_status" => "0"
	],
	[
		"id" => 27434,
		"user_id" => 34227,
		"work_status" => "0"
	],
	[
		"id" => 27435,
		"user_id" => 34228,
		"work_status" => "0"
	],
	[
		"id" => 27436,
		"user_id" => 34230,
		"work_status" => "Non European National"
	],
	[
		"id" => 27437,
		"user_id" => 34233,
		"work_status" => "Non European National"
	],
	[
		"id" => 27438,
		"user_id" => 34220,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27439,
		"user_id" => 34234,
		"work_status" => "0"
	],
	[
		"id" => 27440,
		"user_id" => 34235,
		"work_status" => "Non European National"
	],
	[
		"id" => 27441,
		"user_id" => 34237,
		"work_status" => "0"
	],
	[
		"id" => 27442,
		"user_id" => 34238,
		"work_status" => "Non European National"
	],
	[
		"id" => 27443,
		"user_id" => 34236,
		"work_status" => "European National"
	],
	[
		"id" => 27444,
		"user_id" => 34239,
		"work_status" => "0"
	],
	[
		"id" => 27445,
		"user_id" => 34240,
		"work_status" => "0"
	],
	[
		"id" => 27446,
		"user_id" => 34242,
		"work_status" => "European National"
	],
	[
		"id" => 27447,
		"user_id" => 34243,
		"work_status" => "Non European National"
	],
	[
		"id" => 27449,
		"user_id" => 34246,
		"work_status" => "0"
	],
	[
		"id" => 27450,
		"user_id" => 34247,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27451,
		"user_id" => 34249,
		"work_status" => "0"
	],
	[
		"id" => 27452,
		"user_id" => 34251,
		"work_status" => "0"
	],
	[
		"id" => 27453,
		"user_id" => 34253,
		"work_status" => "0"
	],
	[
		"id" => 27454,
		"user_id" => 34254,
		"work_status" => "Non European National"
	],
	[
		"id" => 27455,
		"user_id" => 34250,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27456,
		"user_id" => 34256,
		"work_status" => "European National"
	],
	[
		"id" => 27457,
		"user_id" => 34257,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27461,
		"user_id" => 34262,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27462,
		"user_id" => 34269,
		"work_status" => "0"
	],
	[
		"id" => 27463,
		"user_id" => 34271,
		"work_status" => "European National"
	],
	[
		"id" => 27464,
		"user_id" => 34273,
		"work_status" => "0"
	],
	[
		"id" => 27465,
		"user_id" => 34274,
		"work_status" => "Non European National"
	],
	[
		"id" => 27466,
		"user_id" => 34277,
		"work_status" => "European National"
	],
	[
		"id" => 27468,
		"user_id" => 34281,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27469,
		"user_id" => 34217,
		"work_status" => "0"
	],
	[
		"id" => 27470,
		"user_id" => 34283,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27471,
		"user_id" => 34284,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27472,
		"user_id" => 34285,
		"work_status" => "Non European National"
	],
	[
		"id" => 27473,
		"user_id" => 34286,
		"work_status" => "Non European National"
	],
	[
		"id" => 27474,
		"user_id" => 34287,
		"work_status" => "0"
	],
	[
		"id" => 27475,
		"user_id" => 34288,
		"work_status" => "0"
	],
	[
		"id" => 27476,
		"user_id" => 34292,
		"work_status" => "European National"
	],
	[
		"id" => 27477,
		"user_id" => 34295,
		"work_status" => "European National"
	],
	[
		"id" => 27478,
		"user_id" => 34296,
		"work_status" => "Non European National"
	],
	[
		"id" => 27479,
		"user_id" => 34297,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27480,
		"user_id" => 34275,
		"work_status" => "Non European National"
	],
	[
		"id" => 27481,
		"user_id" => 34304,
		"work_status" => "European National"
	],
	[
		"id" => 27482,
		"user_id" => 34305,
		"work_status" => "Non European National"
	],
	[
		"id" => 27483,
		"user_id" => 34306,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27484,
		"user_id" => 34307,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27488,
		"user_id" => 34311,
		"work_status" => "Non European National"
	],
	[
		"id" => 27489,
		"user_id" => 34312,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27490,
		"user_id" => 34294,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27491,
		"user_id" => 34315,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27492,
		"user_id" => 34314,
		"work_status" => "Non European National"
	],
	[
		"id" => 27493,
		"user_id" => 34317,
		"work_status" => "Non European National"
	],
	[
		"id" => 27494,
		"user_id" => 34319,
		"work_status" => "Non European National"
	],
	[
		"id" => 27496,
		"user_id" => 34324,
		"work_status" => "European National"
	],
	[
		"id" => 27497,
		"user_id" => 34328,
		"work_status" => "Non European National"
	],
	[
		"id" => 27498,
		"user_id" => 34330,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27499,
		"user_id" => 34334,
		"work_status" => "European National"
	],
	[
		"id" => 27500,
		"user_id" => 34336,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27501,
		"user_id" => 34338,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27502,
		"user_id" => 34339,
		"work_status" => "European National"
	],
	[
		"id" => 27503,
		"user_id" => 34340,
		"work_status" => "0"
	],
	[
		"id" => 27504,
		"user_id" => 34343,
		"work_status" => "European National"
	],
	[
		"id" => 27505,
		"user_id" => 34333,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27506,
		"user_id" => 34345,
		"work_status" => "European National"
	],
	[
		"id" => 27507,
		"user_id" => 34346,
		"work_status" => "European National"
	],
	[
		"id" => 27508,
		"user_id" => 34347,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27509,
		"user_id" => 34348,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27510,
		"user_id" => 34350,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27513,
		"user_id" => 34355,
		"work_status" => "Non European National"
	],
	[
		"id" => 27514,
		"user_id" => 34356,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27515,
		"user_id" => 34358,
		"work_status" => "Non European National"
	],
	[
		"id" => 27516,
		"user_id" => 34362,
		"work_status" => "European National"
	],
	[
		"id" => 27517,
		"user_id" => 34364,
		"work_status" => "Non European National"
	],
	[
		"id" => 27518,
		"user_id" => 34365,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27519,
		"user_id" => 34366,
		"work_status" => "European National"
	],
	[
		"id" => 27520,
		"user_id" => 34371,
		"work_status" => "Non European National"
	],
	[
		"id" => 27521,
		"user_id" => 34370,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27522,
		"user_id" => 34372,
		"work_status" => "Non European National"
	],
	[
		"id" => 27523,
		"user_id" => 34375,
		"work_status" => "Non European National"
	],
	[
		"id" => 27524,
		"user_id" => 34379,
		"work_status" => "European National"
	],
	[
		"id" => 27525,
		"user_id" => 34380,
		"work_status" => "Non European National"
	],
	[
		"id" => 27528,
		"user_id" => 34382,
		"work_status" => "Non European National"
	],
	[
		"id" => 27529,
		"user_id" => 34383,
		"work_status" => "0"
	],
	[
		"id" => 27530,
		"user_id" => 34385,
		"work_status" => "Non European National"
	],
	[
		"id" => 27531,
		"user_id" => 34387,
		"work_status" => "0"
	],
	[
		"id" => 27532,
		"user_id" => 34388,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27533,
		"user_id" => 34389,
		"work_status" => "Non European National"
	],
	[
		"id" => 27535,
		"user_id" => 34392,
		"work_status" => "European National"
	],
	[
		"id" => 27536,
		"user_id" => 34393,
		"work_status" => "European National"
	],
	[
		"id" => 27537,
		"user_id" => 34394,
		"work_status" => "0"
	],
	[
		"id" => 27538,
		"user_id" => 34395,
		"work_status" => "Non European National"
	],
	[
		"id" => 27539,
		"user_id" => 34384,
		"work_status" => "0"
	],
	[
		"id" => 27540,
		"user_id" => 34396,
		"work_status" => "0"
	],
	[
		"id" => 27541,
		"user_id" => 34397,
		"work_status" => "Non European National"
	],
	[
		"id" => 27542,
		"user_id" => 34399,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27543,
		"user_id" => 34401,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27544,
		"user_id" => 34406,
		"work_status" => "Non European National"
	],
	[
		"id" => 27545,
		"user_id" => 34408,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27546,
		"user_id" => 34409,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27547,
		"user_id" => 34414,
		"work_status" => "European National"
	],
	[
		"id" => 27548,
		"user_id" => 34416,
		"work_status" => "0"
	],
	[
		"id" => 27549,
		"user_id" => 34417,
		"work_status" => "European National"
	],
	[
		"id" => 27550,
		"user_id" => 34418,
		"work_status" => "Non European National"
	],
	[
		"id" => 27552,
		"user_id" => 34421,
		"work_status" => "Non European National"
	],
	[
		"id" => 27553,
		"user_id" => 34425,
		"work_status" => "European National"
	],
	[
		"id" => 27554,
		"user_id" => 34427,
		"work_status" => "European National"
	],
	[
		"id" => 27555,
		"user_id" => 34428,
		"work_status" => "0"
	],
	[
		"id" => 27556,
		"user_id" => 34429,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27557,
		"user_id" => 34431,
		"work_status" => "Non European National"
	],
	[
		"id" => 27558,
		"user_id" => 34432,
		"work_status" => "0"
	],
	[
		"id" => 27559,
		"user_id" => 34433,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27560,
		"user_id" => 34390,
		"work_status" => "Non European National"
	],
	[
		"id" => 27561,
		"user_id" => 34435,
		"work_status" => "European National"
	],
	[
		"id" => 27562,
		"user_id" => 34436,
		"work_status" => "European National"
	],
	[
		"id" => 27563,
		"user_id" => 34440,
		"work_status" => "0"
	],
	[
		"id" => 27564,
		"user_id" => 34441,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27565,
		"user_id" => 34442,
		"work_status" => "0"
	],
	[
		"id" => 27566,
		"user_id" => 34443,
		"work_status" => "0"
	],
	[
		"id" => 27567,
		"user_id" => 34447,
		"work_status" => "0"
	],
	[
		"id" => 27568,
		"user_id" => 34450,
		"work_status" => "Non European National"
	],
	[
		"id" => 27569,
		"user_id" => 34451,
		"work_status" => "UK Citizen"
	],
	[
		"id" => 27570,
		"user_id" => 34452,
		"work_status" => "0"
	],
	[
		"id" => 27571,
		"user_id" => 34449,
		"work_status" => "Non European National"
	],
	[
		"id" => 27572,
		"user_id" => 34453,
		"work_status" => "0"
	],
	[
		"id" => 27573,
		"user_id" => 34455,
		"work_status" => "Non European National"
	],
	[
		"id" => 27574,
		"user_id" => 34456,
		"work_status" => "0"
	],
	[
		"id" => 27575,
		"user_id" => 34457,
		"work_status" => "European National"
	],
	[
		"id" => 27576,
		"user_id" => 34458,
		"work_status" => "Non European National"
	],
	[
		"id" => 27577,
		"user_id" => 34459,
		"work_status" => "0"
	],
	[
		"id" => 27578,
		"user_id" => 34461,
		"work_status" => "European National"
	],
	[
		"id" => 27579,
		"user_id" => 34463,
		"work_status" => "Non European National"
	],
	[
		"id" => 27580,
		"user_id" => 34448,
		"work_status" => "European National"
	],
	[
		"id" => 27581,
		"user_id" => 34464,
		"work_status" => "Non European National"
	]
];




            
            RTWork::insert($references);


DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }


}
