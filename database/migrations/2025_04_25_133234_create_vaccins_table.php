<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('certification_no')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('certificate_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('name_dose_one')->nullable();
            $table->string('date_dose_one')->nullable();
            $table->string('name_dose_two')->nullable();
            $table->string('date_dose_two')->nullable();
            $table->string('name_dose_three')->nullable();
            $table->string('date_dose_three')->nullable();
            $table->string('vaccinated_by')->nullable();
            $table->string('vaccination_center')->nullable();
            $table->string('vaccine_name')->nullable();
            $table->string('total_dose')->nullable();
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
        Schema::dropIfExists('vaccins');
    }
}
