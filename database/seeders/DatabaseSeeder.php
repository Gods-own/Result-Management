<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            SubjectSeeder::class,
            TermSeeder::class,
<<<<<<< HEAD
            Character::class,
=======
            CharacterSeeder::class,
            SubjectTypeSeeder::class,
            StudentTypeSeeder::class,
>>>>>>> 13db7e93951a379f299d231100d5e65598c1fca7
        ]);
    }
}
