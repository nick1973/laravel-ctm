<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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
