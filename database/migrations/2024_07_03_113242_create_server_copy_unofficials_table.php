<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerCopyUnofficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_copy_unofficials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name')->nullable();
            $table->string('nameEn')->nullable();
            $table->string('gender')->nullable();
            $table->string('bloodGroup')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('spouse')->nullable();
            $table->string('nationalId')->nullable();
            $table->text('permanentAddress')->nullable();
            $table->text('presentAddress')->nullable();
            $table->longText('photo')->nullable();
            $table->string('mobile')->nullable();
            $table->string('religion')->nullable();
            $table->string('nidFather')->nullable();
            $table->string('nidMother')->nullable();
            $table->string('voterArea')->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('birthPlace')->nullable();
            $table->string('pin')->nullable();
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
        Schema::dropIfExists('server_copy_unofficials');
    }
}
