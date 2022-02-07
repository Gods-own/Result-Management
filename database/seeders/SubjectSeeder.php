<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
=======

        DB::table('subjects')->truncate();

>>>>>>> 13db7e93951a379f299d231100d5e65598c1fca7
        DB::table('subjects')->insert([
            ['subject' => 'Mathematics'],
            ['subject' => 'English Language'],
            ['subject' => 'Yoruba'],
            ['subject' => 'Basic Science'],
            ['subject' => 'Social Studies'],
            ['subject' => 'Fine Arts'],
            ['subject' => 'Business Studies'],
            ['subject' => 'Computer Studies'],
            ['subject' => 'Basic Technology'],
            ['subject' => 'French'],
            ['subject' => 'Civic Education'],
            ['subject' => 'Music'],
            ['subject' => 'Agricultural Science'],
        ]);
    }
}
