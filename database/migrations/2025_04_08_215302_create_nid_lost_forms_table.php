<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNidLostFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nid_lost_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('file')->nullable();
            $table->string('nid')->nullable();
            $table->string('userId')->nullable();
            $table->string('password')->nullable();
            $table->string('whatsapp')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=Pending,1=Accepted');
            $table->tinyInteger('hide')->default('0')->comment('0=unhide,1=hide');
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
        Schema::dropIfExists('nid_lost_forms');
    }
}
