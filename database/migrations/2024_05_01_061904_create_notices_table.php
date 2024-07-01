<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->text('sign_copy')->nullable();
            $table->text('server_copy')->nullable();
            $table->text('id_card')->nullable();
            $table->text('biometric')->nullable();
            $table->text('new_nid')->nullable();
            $table->text('old_nid')->nullable();
            $table->text('birth')->nullable();
            $table->text('server_unofficial')->nullable();
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
        Schema::dropIfExists('notices');
    }
}
