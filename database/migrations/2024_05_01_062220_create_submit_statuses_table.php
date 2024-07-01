<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmitStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('sign_copy')->nullable();
            $table->integer('server_copy')->nullable();
            $table->integer('id_card')->nullable();
            $table->integer('biometric')->nullable();
            $table->integer('new_nid')->nullable();
            $table->integer('old_nid')->nullable();
            $table->integer('birth')->nullable();
            $table->integer('server_unofficial')->nullable();
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
        Schema::dropIfExists('submit_statuses');
    }
}
