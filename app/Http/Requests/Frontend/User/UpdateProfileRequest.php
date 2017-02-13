<?php

namespace App\Http\Requests\Frontend\User;

use App\Http\Requests\Request;

/**
 * Class UpdateProfileRequest
 * @package App\Http\Requests\Frontend\User
 */
class UpdateProfileRequest extends Request
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
        $messages = [
            'date_format' => 'The date needs to be yyyy-dd-mm.',
        ];

        return [
            'name'  => 'required',
            'lastname'  => 'required',
            'mobile'  => 'required|digits:11',
            'email' => 'sometimes|required|email',
            'land' => 'digits:11',
            'dob' => 'date_format:"d-m-Y"',
            'emergency_contact_number' => 'digits:11',
            'emergency_contact_mobile' => 'digits:11'
        ];
    }
}