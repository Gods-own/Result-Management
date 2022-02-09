<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBiginteger('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->unsignedBiginteger('student_type_id');
            $table->foreign('student_type_id')->references('id')->on('student_types');
            $table->string('profile_pic');
            $table->unsignedBiginteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions');
            $table->unsignedBiginteger('class_room_id');
            $table->foreign('class_room_id')->references('id')->on('class_rooms');
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
        Schema::dropIfExists('students');
    }
}
