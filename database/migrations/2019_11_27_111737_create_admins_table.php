<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->string('adminId');
            $table->string('adminFirstName');
            $table->string('adminLastName');
            $table->string('adminPassword');
            $table->string('adminCnic')->unique();
            $table->string('adminEmail')->unique();
            $table->string('adminPhoneNo');
            $table->string('admindateofBirth');
            $table->binary('adminImage');
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
        Schema::dropIfExists('admins');
    }
}
