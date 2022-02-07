<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('user_type', ['principal', 'staff', 'student']);
<<<<<<< HEAD
            $table->string('gender');
            $table->string('phoneNumber');
=======
            $table->string('gender', 8);
            $table->string('phoneNumber', 11);
>>>>>>> 13db7e93951a379f299d231100d5e65598c1fca7
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['user_type', 'gender', 'phoneNumber']);
        });
    }
}
