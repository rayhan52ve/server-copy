<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopupNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popup_notices', function (Blueprint $table) {
            $table->id();
            $table->longText('message')->nullable();
            $table->longText('reply')->nullable();
            $table->bigInteger('status')->nullable();
            $table->integer('hour')->nullable(); // For hour (can be larger than 23)
            $table->integer('minute')->nullable();
            $table->dateTime('end_time')->nullable();
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
        Schema::dropIfExists('popup_notices');
    }
}
