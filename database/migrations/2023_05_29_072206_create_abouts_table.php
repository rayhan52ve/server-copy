<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('mission_title')->nullable();
            $table->text('vision_title')->nullable();
            $table->text('mission_details')->nullable();
            $table->text('vision_details')->nullable();
            $table->text('mv_photo')->nullable();
            $table->text('about_photo')->nullable();
            $table->text('banner_image')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('abouts');
    }
}
