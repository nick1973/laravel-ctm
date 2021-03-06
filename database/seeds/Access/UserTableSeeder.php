<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UserTableSeeder
 */
class UserTableSeeder extends Seeder
{
    public function run()
    {
        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table(config('access.users_table'))->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM ' . config('access.users_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('access.users_table') . ' CASCADE');
        }

        //Add the master administrator, user id of 1
        $users = [
            [
                'visible'             => 0,
                'title'             => 'Mr',
                'name'         => 'Admin',
                'lastname'          => 'istrator',
                'dob'          => '1/1/2000',
                'email'             => 'admin@admin.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'visible'             => 0,
                'title'             => 'Mr',
                'name'         => 'Manager',
                'lastname'          => 'User',
                'dob'          => '1/1/2000',
                'email'             => 'manager@manager.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'visible'             => 0,
                'title'             => 'Mr',
                'name'         => 'Bob',
                'lastname'          => 'the user',
                'dob'          => '1/1/2000',
                'email'             => 'user@user.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'visible'             => 0,
                'title'             => 'Mr',
                'name'         => 'Ops Manager',
                'lastname'          => 'Ops Manager',
                'dob'          => '1/1/2000',
                'email'             => 'ops@ctm.uk.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                //'id'        => 1000000,
                'visible'             => 0,
                'title'             => '',
                'name'         => '',
                'lastname'          => '',
                'dob'          => '1/1/2000',
                'email'             => '',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                //'id'        => 1000000,
                'visible'             => 1,
                'title'             => 'Miss',
                'name'         => 'Emma',
                'lastname'          => 'Smith',
                'dob'          => '1/1/1991',
                'email'             => 'emma@emma.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                //'id'        => 1000000,
                'visible'             => 1,
                'title'             => 'Mr',
                'name'         => 'Harry',
                'lastname'          => 'Jones',
                'dob'          => '1/1/1995',
                'email'             => 'Harry@harry.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                //'id'        => 1000000,
                'visible'             => 1,
                'title'             => 'miss',
                'name'         => 'Jacqui',
                'lastname'          => 'Jones',
                'dob'          => '1/1/1995',
                'email'             => 'Jacqui@Jacqui.com',
                'password'          => bcrypt('1234'),
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table(config('access.users_table'))->insert($users);

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}