<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPassNidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_pass_nids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->string('nid')->nullable();
            $table->string('dob')->nullable();
            $table->text('present_address')->nullable();
            $table->string('present_division')->nullable();
            $table->string('present_district')->nullable();
            $table->string('present_upozila')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('permanent_division')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('permanent_upozila')->nullable();
            $table->string('otp_phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=Pending,1=Accepted');
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('user_pass_nids');
    }
}
