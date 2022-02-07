<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject_types')->truncate();

        DB::table('subject_types')->insert([
            ['subject_type' => 'Junior General Subject'],
            ['subject_type' => 'Senior Arts Subject'],
            ['subject_type' => 'Senior Science Subject'],
            ['subject_type' => 'General Subject'],
        ]);
    }
}
