<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_routes', function (Blueprint $table) {
            $table->string('vehicalNumber');
            $table->string('driverName');
            $table->string('driverPhoneNo');
            $table->string('departurelocation');
            $table->string('departureTime');
            $table->string('arrivallocation');
            $table->string('arrivalTime');
            $table->string('busStop');
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
        Schema::dropIfExists('transport_routes');
    }
}
