<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('employeeFirstName');
            $table->string('employeeLastName');
            $table->string('employeeCNIC')->unique();
            $table->string('employeeEmail')->unique();
            $table->string('employeePhoneNo');
            $table->string('employeeDateofBirth');
            $table->string('department');
            $table->string('homeAddress');
            $table->string('employeeDescription');
            $table->binary('adminImage');
            $table->string('scoietyName');
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
        Schema::dropIfExists('employees');
    }
}
