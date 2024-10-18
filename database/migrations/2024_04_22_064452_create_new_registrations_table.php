<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('regOff')->nullable();
            $table->string('upazila')->nullable();
            $table->string('birthNo')->nullable();
            $table->string('verify')->nullable();
            $table->date('dob')->nullable();
            $table->string('wdob')->nullable();
            $table->date('issuteDate')->nullable();
            $table->date('regDate')->nullable();
            $table->string('name')->nullable();
            $table->string('nameEn')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('fatherNameEn')->nullable();
            $table->string('fatherNational')->nullable();
            $table->string('fatherNationalEn')->nullable();
            $table->string('motherName')->nullable();
            $table->string('motherNameEn')->nullable();
            $table->string('motherNational')->nullable();
            $table->string('motherNationalEn')->nullable();
            $table->string('birthPlace')->nullable();
            $table->string('birthPlaceEn')->nullable();
            $table->string('sex')->nullable();
            $table->text('permanentAddr')->nullable();
            $table->text('permanentAddrEn')->nullable();
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
        Schema::dropIfExists('new_registrations');
    }
}
