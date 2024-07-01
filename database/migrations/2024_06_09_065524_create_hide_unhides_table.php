<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHideUnhidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hide_unhides', function (Blueprint $table) {
            $table->id();
            $table->integer('sign_copy')->default(0);
            $table->integer('server_copy')->default(0);
            $table->integer('id_card')->default(0);
            $table->integer('biometric')->default(0);
            $table->integer('new_nid')->default(0);
            $table->integer('old_nid')->default(0);
            $table->integer('birth')->default(0);
            $table->integer('server_unofficial')->default(0);
            $table->integer('sign_to_server')->default(0);
            $table->integer('premium')->default(0);
            $table->integer('admin')->default(0);
            $table->integer('video')->default(0);
            $table->integer('recharge')->default(0);
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
        Schema::dropIfExists('hide_unhides');
    }
}
