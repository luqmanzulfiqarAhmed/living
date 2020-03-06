<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintainanceStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintainance_staff', function (Blueprint $table) {
            $table->string('mStaffFirstName');
            $table->string('mStaffLastName');
            $table->string('mStaffCNIC');
            $table->string('employeeEmail');
            $table->string('mStaffPhoneNo');
            $table->string('DateofBirth');
            $table->string('mStaffType');
            $table->string('mStaffExperience');
            $table->string('mStaffhomeAddress');
            $table->string('mStaffDescription');
            $table->binary('Image');
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
        Schema::dropIfExists('maintainance_staff');
    }
}
