<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->string('driverFirstName');
            $table->string('driverLastName');
            $table->string('driverCNIC');
            $table->string('driverPhoneNo');
            $table->string('driverEmail');
            $table->string('driverDateofBirth');
            $table->string('driverLicenseNo');
            $table->string('driverExperience');
            $table->string('driverhomeAddress');
            $table->string('driverDescription');
            $table->binary('Image');
            $table->string('societyName');
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
        Schema::dropIfExists('drivers');
    }
}
