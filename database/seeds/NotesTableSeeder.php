<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesTableSeeder extends Seeder
{

    /**
     *
     */
    public function run()
    {
        $notes = [
            [
                'notes'             => 'This is Text from the resource dashboard.',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
        ];
        DB::table('registration_notes')->insert($notes);
    }
}
