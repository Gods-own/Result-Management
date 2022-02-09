<?php

namespace Database\Seeders;

require 'vendor/autoload.php';

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sessions')->insert([
            ['session_start' => Carbon::createFromDate('2021', '9', '11')->format('Y-m-d'),
            'session_end' => Carbon::createFromDate('2022', '7', '8')->format('Y-m-d'), 
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
