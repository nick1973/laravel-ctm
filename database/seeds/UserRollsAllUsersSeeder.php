<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRollsAllUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Attach user role to general user
        $user_model = config('auth.providers.users.model');
        $user_model = new $user_model;
        $user_model::all()->attachRole(3);


        if (DB::connection()->getDriverName() == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
