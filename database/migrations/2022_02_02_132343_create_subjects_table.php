<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();
=======
            $table->id()->unsigned();
            $table->unsignedBiginteger('subject_type_id');
            $table->foreign('subject_type_id')->references('id')->on('subject_types')->onDelete('cascade');
            $table->string('subject', 30);
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
        Schema::dropIfExists('subjects');
    }
}
