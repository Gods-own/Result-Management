<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('character_devs')->insert([
            ['character' => 'Attendance'],
            ['character' => 'Attentiveness'],
            ['character' => 'Punctuality'],
            ['character' => 'Neatness'],
            ['character' => 'Politeness'],
            ['character' => 'Self Control'],
            ['character' => 'Relationship with others'],
        ]);
    }
}
