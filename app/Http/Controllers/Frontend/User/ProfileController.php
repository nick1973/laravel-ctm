<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use Illuminate\Http\Request;

use App\Models\Access\User\User;
use App\Repositories\Frontend\Access\User\UserRepositoryContract;
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
        return view('frontend.user.profile.edit')
            ->withUser(access()->user());
    }

    /**
     * @param  UserRepositoryContract         $user
     * @param  UpdateProfileRequest $request
     * @return mixed
     */
    public function update(UserRepositoryContract $user, UpdateProfileRequest $request)
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