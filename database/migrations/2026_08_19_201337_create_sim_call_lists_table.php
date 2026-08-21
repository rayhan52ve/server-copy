<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimCallListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sim_call_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('phone_no')->nullable();
            $table->string('type')->nullable();
            $table->string('file')->nullable();
            $table->integer('hide')->nullable()->default(0);
            $table->string('comment')->nullable();
            $table->string('admin_comment')->nullable();
            $table->integer('status')->nullable()->default(0)->comment('0=Pending,1=Accepted');
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
        Schema::dropIfExists('sim_call_lists');
    }
}
