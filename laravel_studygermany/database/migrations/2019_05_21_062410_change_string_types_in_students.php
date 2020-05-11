<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeStringTypesInStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('firstname', 255)->change();
            $table->string('lastname', 255)->change();
            $table->string('place_of_birth', 255)->change();
            $table->string('university', 255)->change();
            $table->string('name_of_program', 255)->change();
            $table->string('bank_name', 255)->change();
            $table->string('nominee_name', 255)->change();
            $table->text('comments')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
