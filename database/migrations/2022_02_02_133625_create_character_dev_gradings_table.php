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
            $table->id()->unsigned();
            $table->unsignedBiginteger('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->unsignedBiginteger('character_id');
            $table->foreign('character_id')->references('id')->on('character_devs');
            $table->unsignedBiginteger('term_id');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->string('grade', 2);
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
