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
        $apikey = 'AIzaSyCD7jKYXhgDTka8qlsPSqNcU2HV7DCwfUs';
        return view('frontend.user.profile.edit_address', compact('apikey'))
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

    public function update_passport_photo_page(Request $request, $id)
    {
        $this->validate($request, [
            'passport_photo_page' => 'mimes:jpg,jpeg,png'
        ]);
        $user = User::find($id);
        $file = $request->file('file');

        $file_name = $file->getClientOriginalName();

        $file_path = $file->move('docs/' . $user->name . $user->lastname . '.' . $user->dob .'/passport_photo_page', $file_name);

        References::where('user_id', $user->id)->update(['passport_photo_page' => $file_path]);

        $path = References::find(1);

        return $path->passport_photo_page;
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update_passport_photo(Request $request, $id)
    {
        $this->validate($request, [
            'passport_photo' => 'mimes:jpg,jpeg,png'
        ]);
        $user = User::find($id);
        $file = $request->file('file');

        $file_name = $file->getClientOriginalName();

        $file_path = $file->move('docs/' . $user->name . $user->lastname . '.' . $user->dob .'/passport_photo', $file_name);

        References::where('user_id', $user->id)->update(['passport_photo' => $file_path]);
        $user->update(['photo' => $file_path]);
        $path = References::find(1);

        return $user->photo;

    }

    public function update_birth_cert(Request $request, $id)
    {
        $this->validate($request, [
            'birth_cert' => 'mimes:jpg,jpeg,png'
        ]);
        $user = User::find($id);
        $file = $request->file('file');

        $file_name = $file->getClientOriginalName();

        $file_path = $file->move('docs/' . $user->name . $user->lastname . '.' . $user->dob .'/birth_cert', $file_name);

        References::where('user_id', $user->id)->update(['birth_cert' => $file_path]);

        $path = References::find(1);

        return $path->passport_photo;

    }

    public function update_ni_card(Request $request, $id)
    {
        $this->validate($request, [
            'ni_card' => 'mimes:jpg,jpeg,png'
        ]);
        $user = User::find($id);
        $file = $request->file('file');

        $file_name = $file->getClientOriginalName();

        $file_path = $file->move('docs/' . $user->name . $user->lastname . '.' . $user->dob .'/ni_card', $file_name);

        References::where('user_id', $user->id)->update(['ni_card' => $file_path]);

        $path = References::find(1);

        return $path->passport_photo;

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