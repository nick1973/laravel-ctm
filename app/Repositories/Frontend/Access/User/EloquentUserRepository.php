<?php

namespace App\Repositories\Frontend\Access\User;

use App\Models\Access\User\References;
use App\Models\Access\User\RTWork;
use App\Models\Access\User\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\GeneralException;
use Illuminate\Support\Facades\Hash;
use App\Models\Access\User\SocialLogin;
use App\Events\Frontend\Auth\UserConfirmed;
use App\Repositories\Backend\Access\Role\RoleRepositoryContract;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\Frontend\User
 */
class EloquentUserRepository implements UserRepositoryContract
{

    /**
     * @var RoleRepositoryContract
     */
    protected $role;

    /**
     * @param RoleRepositoryContract $role
     */
    public function __construct(RoleRepositoryContract $role)
    {
        $this->role = $role;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return User::findOrFail($id);
    }

    /**
     * @param $email
     * @return bool
     */
    public function findByEmail($email) {
        $user = User::where('email', $email)->first();

        if ($user instanceof User)
            return $user;

        return false;
    }

    /**
     * @param $token
     * @return mixed
     * @throws GeneralException
     */
    public function findByToken($token) {
        $user = User::where('confirmation_code', $token)->first();

        if (! $user instanceof User)
            throw new GeneralException(trans('exceptions.frontend.auth.confirmation.not_found'));

        return $user;
    }

    /**
     * @param array $data
     * @param bool $provider
     * @return static
     */
    public function create(array $data, $provider = false)
    {
        //$dob = date_format($data['dob'],"d/m/Y");
        if ($provider) {
            $user = User::create([
                'visible' => 1,
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'dob' => $data['dob'],
                'email' => $data['email'],
                'password' => null,
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed' => 1,
                'status' => 1,
            ]);
        } else {

            $user = User::create([
                'visible' => 1,
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'dob' => $data['dob'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed' => config('access.users.confirm_email') ? 0 : 1,
                'status' => 1,
            ]);
        }

        if (References::where('user_id', $user->id)->count() > 0) {
            // user found
        } else{
            DB::table('references')->insert(
                ['user_id' => $user->id]
            );
        }
        if (RTWork::where('user_id', $user->id)->count() > 0) {
            // user found
        } else{
            DB::table('rt_work')->insert(
                ['user_id' => $user->id]
            );
        }

        /**
         * Add the default site role to the new user
         */
        $user->attachRole($this->role->getDefaultUserRole());

        /**
         * If users have to confirm their email and this is not a social account,
         * send the confirmation email
         *
         * If this is a social account they are confirmed through the social provider by default
         */
        if (config('access.users.confirm_email') && $provider === false) {
            $this->sendConfirmationEmail($user);
        }

        /**
         * Return the user object
         */
        return $user;
    }

    /**
     * @param $data
     * @param $provider
     * @return EloquentUserRepository
     */
    public function findOrCreateSocial($data, $provider)
    {
        /**
         * User email may not provided.
         */
        $user_email = $data->email ? : "{$data->id}@{$provider}.com";

        /**
         * Check to see if there is a user with this email first
         */
        $user = $this->findByEmail($user_email);

        /**
         * If the user does not exist create them
         * The true flag indicate that it is a social account
         * Which triggers the script to use some default values in the create method
         */
        if (! $user) {
            $user = $this->create([
                'name'  => $data->name,
                'email' => $user_email,
            ], true);
        }

        /**
         * See if the user has logged in with this social account before
         */
        if (! $user->hasProvider($provider)) {
            /**
             * Gather the provider data for saving and associate it with the user
             */
            $user->providers()->save(new SocialLogin([
                'provider'    => $provider,
                'provider_id' => $data->id,
                'token'       => $data->token,
                'avatar'      => $data->avatar,
            ]));
        } else {
            /**
             * Update the users information, token and avatar can be updated.
             */
            $user->providers()->update([
                'token'       => $data->token,
                'avatar'      => $data->avatar,
            ]);
        }

        /**
         * Return the user object
         */
        return $user;
    }

    /**
     * @param $token
     * @return bool
     * @throws GeneralException
     */
    public function confirmAccount($token)
    {
        $user = $this->findByToken($token);

        if ($user->confirmed == 1) {
            throw new GeneralException(trans('exceptions.frontend.auth.confirmation.already_confirmed'));
        }

        if ($user->confirmation_code == $token) {
            $user->confirmed = 1;

			event(new UserConfirmed($user));
            return $user->save();
        }

        throw new GeneralException(trans('exceptions.frontend.auth.confirmation.mismatch'));
    }

	/**
     * @param $user
     * @return bool
     * @throws GeneralException
     */
    public function sendConfirmationEmail($user)
    {
        //$user can be user instance or id
        if (! $user instanceof User) {
            $user = $this->find($user);
        }

        Mail::send('frontend.auth.emails.confirm', ['token' => $user->confirmation_code], function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject(app_name() . ': ' . trans('exceptions.frontend.auth.confirmation.confirm'));
        });

        if (count(Mail::failures()) > 0) {
            throw new GeneralException("There was a problem sending the confirmation e-mail");
        }

        return true;
    }

    /**
     * @param $user_id
     * @return mixed
     * @throws GeneralException
     */
    public function resendConfirmationEmail($user_id) {
        return $this->sendConfirmationEmail($this->find($user_id));
    }

    /**
     * @param $id
     * @param $input
     * @return mixed
     * @throws GeneralException
     */
    public function updateProfile($id, $input)
    {
        if (References::where('user_id', $id)->count() > 0) {
            // user found
        } else{
            DB::table('references')->insert(
                ['user_id' => $id]
            );
        }
        if (RTWork::where('user_id', $id)->count() > 0) {
            // user found
        } else{
            DB::table('rt_work')->insert(
                ['user_id' => $id]
            );
        }

        $user = $this->find($id);
        $user->title = $input['title'];
        if(array_key_exists('photo', $input) ){
            $user->photo = $input['photo'];
        }

        $user->name = $input['name'];
        $user->lastname = $input['lastname'];
        $user->mobile = $input['mobile'];
        $user->land = $input['land'];
        $user->origin = $input['origin'];
        $user->gender = $input['gender'];
        $user->dob = $input['dob'];
        $user->nationality = $input['nationality'];
        $user->emergency_contact_name = $input['emergency_contact_name'];
        $user->emergency_contact_rel = $input['emergency_contact_rel'];
        $user->emergency_contact_number = $input['emergency_contact_number'];
        $user->emergency_contact_mobile = $input['emergency_contact_mobile'];
        $user->other_lang = $input['other_lang'];
        $user->uk_driving_license = $input['uk_driving_license'];
        $user->nrswa = $input['nrswa'];
        $user->convictions = $input['convictions'];
        $user->convictions_info = $input['convictions_info'];
        $user->medical_conditions = $input['medical_conditions'];
        $user->medical_conditions_info = $input['medical_conditions_info'];
        $user->townofbirth = $input['townofbirth'];
        $user->countryofbirth = $input['countryofbirth'];

        if ($user->canChangeEmail()) {
            //Address is not current address
            if ($user->email != $input['email']) {
                //Emails have to be unique
                if ($this->findByEmail($input['email'])) {
                    throw new GeneralException(trans('exceptions.frontend.auth.email_taken'));
                }

                $user->email = $input['email'];
            }
        }

        return $user->save();
    }

    /**
     * @param $input
     * @return mixed
     * @throws GeneralException
     */
    public function changePassword($input)
    {
        $user = $this->find(access()->id());

        if (Hash::check($input['old_password'], $user->password)) {
            $user->password = bcrypt($input['password']);
            return $user->save();
        }

        throw new GeneralException(trans('exceptions.frontend.auth.password.change_mismatch'));
    }
}