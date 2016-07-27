<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Models\Access\User\References;
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