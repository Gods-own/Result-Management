<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSubjectTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_subject_type', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->unsignedBiginteger('subject_type_id');
            $table->foreign('subject_type_id')->references('id')->on('subject_types')->onDelete('cascade');
            $table->unsignedBiginteger('class_id');
            $table->foreign('class_id')->references('id')->on('class_rooms')->onDelete('cascade');
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
        Schema::dropIfExists('class_subject_type');
    }
}
