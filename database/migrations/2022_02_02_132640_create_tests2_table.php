<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTests2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests2', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBiginteger('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->unsignedBiginteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedBiginteger('term_id');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->integer('test2');
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
        Schema::dropIfExists('tests2');
    }
}
