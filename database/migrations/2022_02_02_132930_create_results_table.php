<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBiginteger('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->unsignedBiginteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedBiginteger('test1_id');
            $table->foreign('test1_id')->references('id')->on('tests1');
            $table->unsignedBiginteger('test2_id');
            $table->foreign('test2_id')->references('id')->on('tests2');
            $table->unsignedBiginteger('exam_id');
            $table->foreign('exam_id')->references('id')->on('exams');
            $table->integer('total');
            $table->string('grade', 2);
            $table->unsignedBiginteger('term_id');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->timestamps();
            $table->unsignedBiginteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
