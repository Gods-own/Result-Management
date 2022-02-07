<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterDevGradingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_dev_gradings', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();
=======
            $table->id()->unsigned();
            $table->unsignedBiginteger('student_id');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBiginteger('character_id');
            $table->foreign('character_id')->references('id')->on('character_devs')->onDelete('cascade');
            $table->unsignedBiginteger('term_id');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->string('grade', 2);
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
        Schema::dropIfExists('character_dev_gradings');
    }
}
