<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewNidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_nids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nid_image')->nullable();
            $table->string('sign_image')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('pin')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birthday')->nullable();
            $table->string('blood_group')->nullable();
            $table->date('issue_date')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('new_nids');
    }
}
