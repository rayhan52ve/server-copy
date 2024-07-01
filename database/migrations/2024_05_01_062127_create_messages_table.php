<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('sign_copy')->nullable();
            $table->string('sign_copy_price')->nullable();
            $table->text('server_copy')->nullable();
            $table->string('server_copy_price')->nullable();
            $table->text('id_card')->nullable();
            $table->string('id_card_price')->nullable();
            $table->text('biometric')->nullable();
            $table->string('biometric_price')->nullable();
            $table->text('new_nid')->nullable();
            $table->string('new_nid_price')->nullable();
            $table->text('old_nid')->nullable();
            $table->string('old_nid_price')->nullable();
            $table->text('birth')->nullable();
            $table->string('birth_price')->nullable();
            $table->text('server_unofficial')->nullable();
            $table->string('server_unofficial_price')->nullable();
            $table->string('sign_to_server')->nullable();
            $table->string('sign_to_server_price')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
