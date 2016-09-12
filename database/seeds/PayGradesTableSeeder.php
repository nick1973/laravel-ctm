<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PayGradesTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $grades = [
            [
                'role'             => 'Admin',
                'pay'             => 9.00,
                'leeway'         => 9.56,
                'training'          => 0,
                'accreditation'          => 0,
                'charge_per_hour'             => 15.55,
                'margin'          => '34',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role'             => 'Admin Manager',
                'pay'             => 12.00,
                'leeway'         => 13.64,
                'training'          => 0,
                'accreditation'          => 0,
                'charge_per_hour'             => 22.17,
                'margin'          => '38',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role'             => 'Admin Supervisor',
                'pay'             => 10.00,
                'leeway'         => 10.56,
                'training'          => 0,
                'accreditation'          => 0,
                'charge_per_hour'             => 17.17,
                'margin'          => '34',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'role'             => 'Assistant Manager',
                'pay'             => 11.00,
                'leeway'         => 12.10,
                'training'          => 0,
                'accreditation'          => 0,
                'charge_per_hour'             => 19.67,
                'margin'          => '34',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],

        ];

        DB::table('pay_grades')->insert($grades);
    }
}
