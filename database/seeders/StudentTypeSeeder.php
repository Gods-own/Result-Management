<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('student_types')->truncate();

        DB::table('student_types')->insert([
            ['student_type' => 'Junior Student'],
            ['student_type' => 'Senior Arts Student'],
            ['student_type' => 'Senior Science Student'],
        ]);
    }
}
