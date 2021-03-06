<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Models\Access\User\References;
use App\Models\Access\User\RTWork;
use App\Services\Access\Access;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Access\User\User;
use App\Repositories\Frontend\Access\User\UserRepositoryContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Lodge\Postcode\Facades\Postcode;
use phpDocumentor\Reflection\Types\Object_;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Frontend
 */
class ProfileController extends Controller
{
    /**
     * @return mixed
     */
    public function edit()
    {
        $reference = References::where('user_id', access()->id())->get();
        return view('frontend.user.profile.edit', compact('reference'))
            ->withUser(access()->user());
    }

    public function edit_address()
    {
        $apikey = 'AIzaSyCD7jKYXhgDTka8qlsPSqNcU2HV7DCwfUs';
        $address = [
            'street'=>'',
            'town'=>'',
            'county'=>'',
            'country'=>'',
            'postcode'=>''
        ];

        return view('frontend.user.profile.edit_address', compact('apikey', 'address'))
            ->withUser(access()->user());
    }

    public function get_postcode(Request $request)
    {
        $postcode = $request->input('postcode');
        $apikey = 'AIzaSyCD7jKYXhgDTka8qlsPSqNcU2HV7DCwfUs';
        $address = Postcode::lookup($postcode);
        if($postcode=='' || empty($address))
        {
            $address = [
                'street'=>'',
                'town'=>'',
                'county'=>'',
                'country'=>'',
                'postcode'=>''
            ];
            return redirect()->route('frontend.user.profile.edit_address',compact('apikey', 'address'))->withErrors('Postcode Returned No Results');
            //return view('frontend.user.profile.edit_address', compact('apikey', 'address'))
                //->withUser(access()->user())->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
        }
        //return $address;
        return view('frontend.user.profile.edit_address', compact('apikey', 'address'))
            ->withUser(access()->user());
    }

    public function get_postcode_ref(Request $request)
    {
        $postcode = $request->input('postcode');
        $apikey = 'AIzaSyCD7jKYXhgDTka8qlsPSqNcU2HV7DCwfUs';
        $address = Postcode::lookup($postcode);
        $reference = References::where('user_id', access()->id())->get();
        if($postcode=='' || empty($address))
        {
            $address = [
                'street'=>'',
                'town'=>'',
                'county'=>'',
                'country'=>'',
                'postcode'=>''
            ];
            return redirect()->route('frontend.user.profile.edit_employer_reference',compact('apikey', 'address', 'reference'))->withErrors('Postcode Returned No Results');
            //return view('frontend.user.profile.edit_address', compact('apikey', 'address'))
            //->withUser(access()->user())->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
        }
        //return $address;
        return view('frontend.user.profile.edit_employer_reference', compact('apikey', 'address', 'reference'))
            ->withUser(access()->user());
    }

    public function get_postcode_ref_char(Request $request)
    {
        $postcode = $request->input('postcode');
        $apikey = 'AIzaSyCD7jKYXhgDTka8qlsPSqNcU2HV7DCwfUs';
        $address = Postcode::lookup($postcode);
        $reference = References::where('user_id', access()->id())->get();
        if($postcode=='' || empty($address))
        {
            $address = [
                'street'=>'',
                'town'=>'',
                'county'=>'',
                'country'=>'',
                'postcode'=>''
            ];
            return redirect()->route('frontend.user.profile.edit_character_reference',compact('apikey', 'address', 'reference'))->withErrors('Postcode Returned No Results');
            //return view('frontend.user.profile.edit_address', compact('apikey', 'address'))
            //->withUser(access()->user())->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
        }
        //return $address;
        return view('frontend.user.profile.edit_character_reference', compact('apikey', 'address', 'reference'))
            ->withUser(access()->user());
    }

    public function edit_employer_reference()
    {
        $address = [
            'street'=>'',
            'town'=>'',
            'county'=>'',
            'country'=>'',
            'postcode'=>''
        ];
        $reference = References::where('user_id', access()->id())->get();
        return view('frontend.user.profile.edit_employer_reference', compact('reference', 'address'));

//        return view('frontend.user.profile.edit_character_reference')
//            ->withUser(access()->user())->references();
    }

    public function edit_character_reference()
    {
        $address = [
            'street'=>'',
            'town'=>'',
            'county'=>'',
            'country'=>'',
            'postcode'=>''
        ];
        $reference = References::where('user_id', access()->id())->get();
        return view('frontend.user.profile.edit_character_reference', compact('reference', 'address'));
    }

    public function edit_righttowork()
    {
        $rt_work = RTWork::where('user_id', access()->id())->get();
        return view('frontend.user.profile.edit_righttowork', compact('rt_work'));
    }

    public function edit_money()
    {
        return view('frontend.user.profile.edit_money')
            ->withUser(access()->user());
    }

    public function edit_documents()
    {
        $rt_work = RTWork::where('user_id', access()->id())->get();
        return view('frontend.user.profile.edit_documents', compact('rt_work'))->withUser(access()->user());
    }

    public function submit_profile(Request $request, $id)
    {
        $user = User::find($id);
        if($user->app_status!=8){
            $user->update(['app_status'=>1, 'profile_confirmed'=>'no']);
        }
        $input = $request->all();
        $user->update($input);
        Auth::logout();
        return redirect()->route('frontend.index')->withFlashSuccess('Your Applications has been submitted!');
    }

    public function update_righttowork(Request $request, $id)
    {
        $reference = RTWork::where('user_id', $id)->get();
        foreach ($reference as $results)
        {
            $rtw = RTWork::find($results->id);
        }
        $input = $request->except(['_method', '_token']);
        DB::table('rt_work')
            ->where('user_id', $id)
            ->update($input);

        $rtw->work_status = $request->input('work_status');
        $rtw->student = $request->input('student');
        $rtw->teaching_establishment = $request->input('teaching_establishment');
        $rtw->autumn_term_starts = $request->input('autumn_term_starts');
        $rtw->autumn_term_ends = $request->input('autumn_term_ends');
        $rtw->spring_term_starts = $request->input('spring_term_starts');
        $rtw->spring_term_ends = $request->input('spring_term_ends');
        $rtw->summer_term_starts = $request->input('summer_term_starts');
        $rtw->summer_term_ends = $request->input('summer_term_ends');

        $dirty = $rtw->getDirty();

        $dirty = json_encode($dirty, true);
        if($dirty!="[]"){
            DB::table('users')
                ->where('id', $id)
                ->update(['rtw_dirty' => $dirty]);
        }

        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
        //return $input;
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function update_employer_reference(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ref_phone_number' => 'digits:11',
            'ref_char_phone_number' => 'digits:11'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $reference = References::where('user_id', $id)->get();
        foreach ($reference as $results)
        {
            $ref = References::find($results->id);
        }
        $input = $request->except(['_method', '_token']);
        $ref->ref_job_title = $request->input('ref_job_title');
        $ref->ref_employed_from = $request->input('ref_employed_from');
        $ref->ref_employed_to = $request->input('ref_employed_to');
        $ref->ref_company_name = $request->input('ref_company_name');
        $ref->ref_contact = $request->input('ref_contact');
        $ref->ref_phone_number = $request->input('ref_phone_number');
        $ref->ref_employer_address_line_1 = $request->input('ref_employer_address_line_1');
        $ref->ref_employer_address_line_2 = $request->input('ref_employer_address_line_2');
        $ref->ref_employer_city = $request->input('ref_employer_city');
        $ref->ref_employer_county = $request->input('ref_employer_county');
        $ref->ref_employer_country = $request->input('ref_employer_country');
        $ref->ref_employer_postcode = $request->input('ref_employer_postcode');
        $ref->ref_char_name = $request->input('ref_char_name');
        $ref->ref_char_how_know = $request->input('ref_char_how_know');
        $ref->ref_char_company = $request->input('ref_char_company');
        $ref->ref_char_phone_number = $request->input('ref_char_phone_number');
        $ref->ref_character_address_line_1 = $request->input('ref_character_address_line_1');
        $ref->ref_character_address_line_2 = $request->input('ref_character_address_line_2');
        $ref->ref_character_city = $request->input('ref_character_city');
        $ref->ref_character_county = $request->input('ref_character_county');
        $ref->ref_character_country = $request->input('ref_character_country');
        $ref->ref_character_postcode = $request->input('ref_character_postcode');
        DB::table('references')
            ->where('user_id', $id)
            ->update($input);

        $dirty = $ref->getDirty();

        $dirty = json_encode($dirty, true);
        if($dirty!="[]"){
            DB::table('users')
                ->where('id', $id)
                ->update(['reference_dirty' => $dirty]);
        }
        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function update_address(Request $request, $id)
    {
        $input = $request->all();
        $user = User::find($id);
        $user->address_line_1 = $request->input('address_line_1');
        $user->address_line_2 = $request->input('address_line_2');
        $user->city = $request->input('city');
        $user->county = $request->input('county');
        $user->country = $request->input('country');
        $user->postcode = $request->input('postcode');
        $user->payroll_export = $request->input('payroll_export');
        $user->dob = $request->input('dob');
        $dirty = $user->getDirty();
        if($dirty!=[]){
            $dirty = json_encode($dirty, true);
            DB::table('users')
                ->where('id', $id)
                ->update(['address_dirty' => $dirty]);
            //return "saved" . $dirty;
        }
        $user->fill($input)->save();
        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    function update_bank(Request $request, $id)
    {
        $ni = $request->input('ni_number');
        $validator = Validator::make($request->all(), [
            'account_number' => 'required|numeric|digits:8',
            'account_sort_code' => 'required|numeric|digits:6',
            'ni_number' => 'required|max:9'
        ]);
        if ($validator->fails()) {
            return redirect('/profile/edit_money')
                ->withErrors($validator)
                ->withInput();
        }
        $first_letters = substr($ni, 0, 2);
        $digits = substr($ni, 2, 6);
        $last_letter = substr($ni, 8, 1);
        if (ctype_digit($first_letters)) {
            return redirect('/profile/edit_money')
                ->withErrors('NI Number is Incorrect')
                ->withInput();
        }
        if (!ctype_digit($digits)) {
            return redirect('/profile/edit_money')
                ->withErrors('NI Number is Incorrect')
                ->withInput();
        }
        if (ctype_digit($last_letter)) {
            return redirect('/profile/edit_money')
                ->withErrors('NI Number is Incorrect')
                ->withInput();
        }
        //$input = $request->all();
        $user = User::find($id);
        $user->fill([
            'account_number' => Crypt::encrypt($request->account_number),
            'account_sort_code' => Crypt::encrypt($request->account_sort_code),
            'ni_number' => strtoupper($request->input('ni_number')),
            'account_name' => $request->input('account_name'),
            'job_status' => $request->input('job_status'),
            'student_loan' => $request->input('student_loan')
        ])->save();
        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }

    /**
     * @param  UserRepositoryContract         $user
     * @param  UpdateProfileRequest $request
     * @return mixed
     */
    public function updates(UserRepositoryContract $user, UpdateProfileRequest $request)
    {
        $staff = User::find(access()->id());
        $dob = $request->input('dob');
        $dob = (string)$dob;
        $input = $request->all();
        //dd($dob);
        $photo = User::where('id', access()->id())->first();
        if ($request->hasFile('photo')) {
            $input = $request->all();

            $fileName = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('/mnt/volume-1/' . $user->name . $user->lastname . '.' . $user->dob .'/photo', $fileName);

            array_pull($input, 'photo');

            $add_image = array_add($input, 'photo', 'photos/' . $fileName);
            dd($request->all());
            $user->updateProfile(access()->id(), $add_image);
            return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
        }

        if (strpos($dob, '-')!== false) {
            //dd($input = $request->all());
//                if(is_numeric(substr($dob, 0, 4))){
//                    brake;
//                }
            array_pull($input, 'dob');
            $year = substr($dob, 6, 4);
            $day = substr($dob, 0, 2);
            $month = substr($dob, 3, 2);
            $new_input = array_add($input, 'dob', $year . '-' . $month . '-' . $day);
            if($staff->email !== $request->input('email')){
                $user->updateProfile(access()->id(), $new_input);
                return redirect()->route('frontend.user.dashboard')->withFlashDanger('Your email/username has been changed to '. $request->input('email'). ' used this username/email to login in future!');
            }
            $user->updateProfile(access()->id(), $new_input);
            return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
        }
        if($staff->email !== $request->input('email')){
            $user->updateProfile(access()->id(), $request->all());
            return redirect()->route('frontend.user.dashboard')->withFlashDanger('Your Email has');
        }
        //dd($request->all());
        $user->updateProfile(access()->id(), $request->all());
        //dd($request->all());
        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }

    public function update_passport_photo_page(Request $request, $id)
    {
        
        $this->validate($request, [
            'passport_photo_page' => 'mimes:jpg,jpeg,png'
        ]);
        $user = User::find($id);
        $user->update(['profile_confirmed'=>'no']);
        $reference = References::where('user_id', $id)->get();
        foreach ($reference as $results)
        {
            $ref = References::find($results->id);
        }
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        
        $file->move('/mnt/volume-1/' . $user->name . $user->lastname . '.' . $user->dob .'/passport_photo_page', $file_name);
        
        $path = $user->name . $user->lastname . '.' . $user->dob .'/passport_photo_page/' . $file_name;
        
        References::where('user_id', $user->id)->update(['passport_photo_page' => $path]);
        $path = References::find(1);
        $ref->passport_photo_page = $file_name;
        $dirty = $ref->getDirty();
        $dirty = json_encode($dirty, true);
        if($dirty!="[]"){
            DB::table('users')
                ->where('id', $id)
                ->update(['docs_dirty' => $dirty]);
        }
        return $path->passport_photo_page;
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update_passport_photo(Request $request, $id)
    {
        ini_set('upload_max_filesize ', 6000);
        ini_set('file_uploads ', 'On');
        ini_set('post_max_size', 6000);
        ini_set('memory_limit','2048M');

        $this->validate($request, [
            'passport_photo' => 'mimes:jpg,jpeg,png'
        ]);
        $user = User::find($id);
        $user->update(['profile_confirmed'=>'no']);
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file_path = $file->move('/mnt/volume-1/' . $user->name . $user->lastname . '.' . $user->dob .'/passport_photo', $file_name);
        References::where('user_id', $user->id)->update(['passport_photo' => $file_path]);
        $user->update(['photo' => $file_path]);
        References::find(1);
        $user->passport_photo = $file_name;
        $dirty = $user->getDirty();
        $dirty = json_encode($dirty, true);
        if($dirty!="[]"){
            DB::table('users')
                ->where('id', $id)
                ->update(['docs_dirty' => $dirty]);
        }
        return $user->photo;
    }

    public function update_birth_cert(Request $request, $id)
    {
        $this->validate($request, [
            'birth_cert' => 'mimes:jpg,jpeg,png'
        ]);
        $user = User::find($id);
        $user->update(['profile_confirmed'=>'no']);
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file->move('/mnt/volume-1/' . $user->name . $user->lastname . '.' . $user->dob .'/birth_cert', $file_name);
        $path = $user->name . $user->lastname . '.' . $user->dob .'/birth_cert/' . $file_name;
        References::where('user_id', $user->id)->update(['birth_cert' => $path]);
        $path = References::find(1);
        $user->birth_cert = $file_name;
        $dirty = $user->getDirty();
        $dirty = json_encode($dirty, true);
        if($dirty!="[]"){
            DB::table('users')
                ->where('id', $id)
                ->update(['docs_dirty' => $dirty]);
        }
        return $path->passport_photo;
    }

    public function update_ni_card(Request $request, $id)
    {
        $this->validate($request, [
            'ni_card' => 'mimes:jpg,jpeg,png'
        ]);
        $user = User::find($id);
        $user->update(['profile_confirmed'=>'no']);
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file->move('/mnt/volume-1/' . $user->name . $user->lastname . '.' . $user->dob .'/ni_card', $file_name);
        $path = $user->name . $user->lastname . '.' . $user->dob .'/ni_card/' . $file_name;
        References::where('user_id', $user->id)->update(['ni_card' => $path]);
        $path = References::find(1);
        $user->ni_card = $file_name;
        $dirty = $user->getDirty();
        $dirty = json_encode($dirty, true);
        if($dirty!="[]"){
            DB::table('users')
                ->where('id', $id)
                ->update(['docs_dirty' => $dirty]);
        }
        return $path->passport_photo;

    }

    public function update_license_photo(Request $request, $id)
    {
        $this->validate($request, [
            'ni_card' => 'mimes:jpg,jpeg,png'
        ]);
        $user = User::find($id);
        $user->update(['profile_confirmed'=>'no']);
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file->move('/mnt/volume-1/' . $user->name . $user->lastname . '.' . $user->dob .'/driving_license', $file_name);
        $path = $user->name . $user->lastname . '.' . $user->dob .'/driving_license/' . $file_name;
        References::where('user_id', $user->id)->update(['d1_photo' => $path]);
        $path = References::find(1);
        $user->ni_card = $file_name;
        $dirty = $user->getDirty();
        $dirty = json_encode($dirty, true);
        if($dirty!="[]"){
            DB::table('users')
                ->where('id', $id)
                ->update(['docs_dirty' => $dirty]);
        }
        return $path->passport_photo;

    }

    public function submit_events(Request $request, $id)
    {
        $user = User::find($id);
        if($request->input('event') != '')
        {
            $input = $request->input('event');
            $user->tags()->sync($input);
        } else{
            $user->tags()->sync([]);
        }
        //return $user->tags;
        return redirect()->back();
    }

    /**
     * @param UpdateProfileRequest|Request $request
     * @param $id
     * @return mixed
     */
//    public function update(Request $request, $id)
//    {
//        $user = User::where('id', $id)->first();
//
//        if ($request->hasFile('photo')) {
//            $input = $request->all();
//            $fileName = $request->file('photo')->getClientOriginalName();
//            $request->file('image')->move('photos', $fileName);
//            array_pull($input, 'image');
//            $add_image = array_add($input, 'image', 'photos/' . $fileName);
//            $user->fill($add_image)->save();
//        } else {
//            $input = $request->except('image');
//            $user->fill($input)->save();
//        }
//
//        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
//
//    }
}