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
            $table->string('register_office_address')->nullable();
            $table->string('upazila_zila')->nullable();
            $table->string('birth_registration_no')->nullable();
            $table->date('registration_date')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('name_en')->nullable();
            $table->string('fathers_name_bn')->nullable();
            $table->string('fathers_name_en')->nullable();
            $table->string('mothers_name_bn')->nullable();
            $table->string('mothers_name_en')->nullable();
            $table->string('birth_place_bn')->nullable();
            $table->string('birth_place_en')->nullable();
            $table->text('address_bn')->nullable();
            $table->text('address_en')->nullable();
            $table->text('fathers_nationality_bn')->nullable();
            $table->text('fathers_nationality_en')->nullable();
            $table->text('mothers_nationality_bn')->nullable();
            $table->text('mothers_nationality_en')->nullable();
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
