<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterDevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_devs', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();
=======
            $table->id()->unsigned();
            $table->string('character', 26);
>>>>>>> 13db7e93951a379f299d231100d5e65598c1fca7
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_devs');
    }
}
