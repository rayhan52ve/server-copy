<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->text('premium_sign_copy')->before('created_at')->nullable();
            $table->string('premium_sign_copy_price')->before('created_at')->nullable();
            $table->text('premium_server_copy')->before('created_at')->nullable();
            $table->string('premium_server_copy_price')->before('created_at')->nullable();
            $table->text('premium_id_card')->before('created_at')->nullable();
            $table->string('premium_id_card_price')->before('created_at')->nullable();
            $table->text('premium_biometric')->before('created_at')->nullable();
            $table->string('premium_biometric_price')->before('created_at')->nullable();
            $table->text('premium_new_nid')->before('created_at')->nullable();
            $table->string('premium_new_nid_price')->before('created_at')->nullable();
            $table->text('premium_old_nid')->before('created_at')->nullable();
            $table->string('premium_old_nid_price')->before('created_at')->nullable();
            $table->text('premium_birth')->before('created_at')->nullable();
            $table->string('premium_birth_price')->before('created_at')->nullable();
            $table->text('premium_server_unofficial')->before('created_at')->nullable();
            $table->string('premium_server_unofficial_price')->before('created_at')->nullable();
            $table->string('premium_sign_to_server')->before('created_at')->nullable();
            $table->string('premium_sign_to_server_price')->before('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('premium_sign_copy');
            $table->dropColumn('premium_sign_copy_price');
            $table->dropColumn('premium_server_copy');
            $table->dropColumn('premium_server_copy_price');
            $table->dropColumn('premium_id_card');
            $table->dropColumn('premium_id_card_price');
            $table->dropColumn('premium_biometric');
            $table->dropColumn('premium_biometric_price');
            $table->dropColumn('premium_new_nid');
            $table->dropColumn('premium_new_nid_price');
            $table->dropColumn('premium_old_nid');
            $table->dropColumn('premium_old_nid_price');
            $table->dropColumn('premium_birth');
            $table->dropColumn('premium_birth_price');
            $table->dropColumn('premium_server_unofficial');
            $table->dropColumn('premium_server_unofficial_price');
            $table->dropColumn('premium_sign_to_server');
            $table->dropColumn('premium_sign_to_server_price');
        });
    }
}
