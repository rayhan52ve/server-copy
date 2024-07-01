<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeratorAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moderator_accesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('sign_copy')->default(0);
            $table->integer('server_copy')->default(0);
            $table->integer('id_card')->default(0);
            $table->integer('biometric')->default(0);
            $table->integer('biometric_type')->default(0);
            $table->integer('recharge')->default(0);
            $table->integer('video')->default(0);
            $table->integer('user_list')->default(0);
            $table->integer('user_edit')->default(0);
            $table->integer('premium_request')->default(0);
            $table->integer('general_settings')->default(0);
            $table->integer('notice_settings')->default(0);
            $table->integer('message_settings')->default(0);
            $table->integer('premium_settings')->default(0);
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
        Schema::dropIfExists('moderator_accesses');
    }
}
