<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Models\Access\User\References;
use App\Models\Access\User\RTWork;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Access\User\User;
use App\Repositories\Frontend\Access\User\UserRepositoryContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
        return view('frontend.user.profile.edit_address')
            ->withUser(access()->user());
    }

    public function edit_employer_reference()
    {
        //$reference = access()->user()->references();
        $reference = References::where('user_id', access()->id())->get();
        return view('frontend.user.profile.edit_employer_reference', compact('reference'));

//        return view('frontend.user.profile.edit_character_reference')
//            ->withUser(access()->user())->references();
    }

    public function edit_character_reference()
    {
        $reference = References::where('user_id', access()->id())->get();
        return view('frontend.user.profile.edit_character_reference', compact('reference'));
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
        return view('frontend.user.profile.edit_documents')
            ->withUser(access()->user());
    }

    public function update_righttowork(Request $request, $id)
    {
        $input = $request->except(['_method', '_token']);
        DB::table('rt_work')
            ->where('user_id', $id)
            ->update($input);
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
        $input = $request->except(['_method', '_token']);
        DB::table('references')
            ->where('user_id', $id)
            ->update($input);
        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
        //return $input;
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function update_address(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $user->fill($input)->save();
        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }

    /**
     * @param  UserRepositoryContract         $user
     * @param  UpdateProfileRequest $request
     * @return mixed
     */
    public function updates(UserRepositoryContract $user, UpdateProfileRequest $request)
    {
        $photo = User::where('id', access()->id())->first();
        if ($request->hasFile('photo')) {
            $input = $request->all();

            $fileName = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move('photos', $fileName);

            array_pull($input, 'photo');
            $add_image = array_add($input, 'photo', 'photos/' . $fileName);

            $user->updateProfile(access()->id(), $add_image);
            return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
        }

        $user->updateProfile(access()->id(), $request->all());
        //dd($request->all());
        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }

    public function upload_documents(Request $request)
    {
        return $request;
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update_documents(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->hasFile('passport_photo')) {

            $input = $request->all();
            $passport_photo_fileName = $request->file('passport_photo')->getClientOriginalName();
            $passport_photo_page_fileName = $request->file('passport_photo_page')->getClientOriginalName();
            $birth_cert_fileName = $request->file('birth_cert')->getClientOriginalName();
            $ni_card_fileName = $request->file('ni_card')->getClientOriginalName();

            $request->file('passport_photo')->move('docs/'. $user->name . $user->lastname . '.' . Carbon::now()->formatLocalized('%d %B %Y'), $passport_photo_fileName);
            $request->file('passport_photo_page')->move('docs/'. $user->name . $user->lastname . '.' . Carbon::now()->formatLocalized('%d %B %Y'), $passport_photo_page_fileName);
            $request->file('birth_cert')->move('docs/'. $user->name . $user->lastname . '.' . Carbon::now()->formatLocalized('%d %B %Y'), $birth_cert_fileName);
            $request->file('ni_card')->move('docs/'. $user->name . $user->lastname . '.' . Carbon::now()->formatLocalized('%d %B %Y'), $ni_card_fileName);

//            array_pull($input, 'passport_photo');
//            array_pull($input, 'passport_photo_page');
//            array_pull($input, 'birth_cert');
//            array_pull($input, 'ni_card');
//
//            array_add($input, 'passport_photo', 'public/docs/'.$user->name.$user->lastname.'.'.Carbon::now()->formatLocalized('%d %B %Y').'/'.$passport_photo_fileName);
//            array_add($input, 'passport_photo_page', 'public/docs/'.$user->name.$user->lastname.'.'.Carbon::now()->formatLocalized('%d %B %Y').'/'.$passport_photo_page_fileName);
//            array_add($input, 'birth_cert', 'public/docs/'.$user->name.$user->lastname.'.'.Carbon::now()->formatLocalized('%d %B %Y').'/'.$birth_cert_fileName);
//            array_add($input, 'ni_card', 'public/docs/'.$user->name.$user->lastname.'.'.Carbon::now()->formatLocalized('%d %B %Y').'/'.$ni_card_fileName);


            //$reference = References::where('user_id', $id)->update($add_docs);

            //return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
            return $input;
        }
        //dd($request->all());
        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
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