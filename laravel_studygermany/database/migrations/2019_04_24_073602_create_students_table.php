<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('gender', 10);
            $table->string('firstname', 32);
            $table->string('lastname', 10);
            $table->decimal('day_of_birth', 8, 2);
            $table->string('month_of_birth');
            $table->decimal('year_of_birth', 8, 2);
            $table->text('place_of_birth');
            $table->text('country_of_birth');
            $table->text('nationality');
            $table->string('phone_number', 32);
            $table->text('email', 32);
            $table->text('degree');
            $table->text('university');
            $table->string('semester_begin', 32);
            $table->text('name_of_program');
            $table->string('expected_graduation_date', 32);
            $table->text('bank_name');
            $table->string('bank_iban', 32);
            $table->string('bank_acount_number', 32);
            $table->string('bank_branch_code', 32);
            $table->binary('admit_letter');
            $table->binary('passport_first_page');
            $table->binary('passport_last_page');
            $table->string('travel_date', 32);
            $table->text('nominee_name');
            $table->string('nominee_date_of_birth', 32);
            $table->text('comments');
            $table->binary('signature')->default('no signature')->change();
            $table->boolean('sepa_mandate_confirmed');
            $table->boolean('terms_c_confirmed');
            $table->boolean('private_thi_confirmed');
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
