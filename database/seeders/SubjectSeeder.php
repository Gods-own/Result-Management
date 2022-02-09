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

        DB::table('subjects')->truncate();

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
