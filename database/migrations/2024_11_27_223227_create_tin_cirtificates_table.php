<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinCirtificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_cirtificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name_english')->nullable();
            $table->string('father_name_english')->nullable(); 
            $table->string('mother_name_english')->nullable(); 
            $table->text('present_address')->nullable(); 
            $table->text('permanent_address')->nullable(); 
            $table->string('tin')->nullable(); 
            $table->string('previous_tin')->nullable();
            $table->string('tax_zone')->nullable(); 
            $table->string('tax_circle')->nullable(); 
            $table->string('status')->nullable(); 
            $table->string('date')->nullable();
            $table->string('qr_code_url')->nullable();
            $table->string('zone_address')->nullable();
            $table->string('zone_phone')->nullable();
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
        Schema::dropIfExists('tin_cirtificates');
    }
}
