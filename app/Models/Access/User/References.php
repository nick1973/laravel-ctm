<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

class References extends Model
{

    protected $fillable = ['user_id', 'ref_job_title', 'ref_employed_from', 'ref_employed_to', 'ref_company_name', 'ref_contact',
        'origin', 'gender', 'nationality', 'townofbirth',
        'ref_phone_number', 'ref_employer_address_line_1', 'ref_employer_address_line_2', 'ref_employer_city', 'ref_employer_county',
        'ref_employer_country', 'ref_employer_postcode',
        'ref_char_name', 'ref_char_how_know', 'ref_char_company', 'ref_char_phone_number', 'ref_character_address_line_1',
        'ref_character_address_line_2', 'ref_character_city', 'ref_character_county', 'ref_character_country', 'ref_character_postcode',
        'd1_photo', 'passport_photo', 'birth_cert', 'ni_card', 'passport_photo_page', 'work_status'];
}
