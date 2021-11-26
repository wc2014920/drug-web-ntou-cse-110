<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('clinic_id');
            $table->string('name')->nullable();
            $table->string('ownership')->nullable();
            $table->string('Type')->nullable();
            $table->string('city_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('med_part')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinic_hospitals');
    }
}
