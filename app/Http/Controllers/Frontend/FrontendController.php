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
        ini_set('memory_limit','2048M');

        /*
-- Query: SELECT id, title, name, lastname, origin, dob, gender, email, password, postcode, address_line_1, address_line_2, city, county, country, mobile, land, emergency_contact_name, emergency_contact_rel, emergency_contact_number, convictions_info, medical_conditions_info, uni, ni_number, payroll, emergency_contact_mobile, uk_driving_license, d1, nrswa, convictions, medical_conditions, heard_about_us,visible FROM applications
-- Date: 2017-01-11 15:01
*/
DB::insert('insert into users (id,title,name,lastname,origin,dob,gender,email,password,postcode,address_line_1,address_line_2,city,county,country,mobile,land,emergency_contact_name,emergency_contact_rel,emergency_contact_number,convictions_info,medical_conditions_info,uni,ni_number,payroll,emergency_contact_mobile,uk_driving_license,d1,nrswa,convictions,medical_conditions,heard_about_us,visible) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [117,'Miss.','Alexandra','Greaves',1,-77590800,1,'alexandra.greaves@btinternet.com','9f6b73a558388daf6dd128477a105242','L31 2HN','114 Liverpool Road North','','Liverpool','Merseyside','','07563214522','','Mrs P Bernard','Mother','01512878035','','','','NP140163A',0,'',1,0,0,0,0,-1,1]);

    }


}
