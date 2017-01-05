<?php

namespace App\Http\Requests\Frontend\Auth;

use App\Http\Requests\Request;
use Carbon\CarbonInterval;

/**
 * Class RegisterRequest
 * @package App\Http\Requests\Frontend\Access
 */
class RegisterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $date = date('d-m-Y', strtotime('-16 years'));
        return [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'dob' => 'date:d/m/Y|required|before:' . $date,
            'email' => 'required|email|max:255|unique:users',
            'mobile' => 'required|numeric',
            'heard_about_us' => 'required',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required_if:captcha_status,true|captcha',
        ];
    }

	/**
     * @return array
     */
    public function messages() {
        return [
            'g-recaptcha-response.required_if' => trans('validation.required', ['attribute' => 'captcha']),
        ];
    }
}