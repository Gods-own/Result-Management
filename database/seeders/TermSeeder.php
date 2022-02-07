<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermSeeder extends Seeder
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
        DB::table('terms')->truncate();

>>>>>>> 13db7e93951a379f299d231100d5e65598c1fca7
        DB::table('terms')->insert([
            ['term' => 'First'],
            ['term' => 'Second'],
            ['term' => 'Third'],
        ]);
    }
}
