<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNidMakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nid_makes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->longText('nid_image')->nullable();
            $table->longText('sign_image')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('name_en')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('pin')->nullable();
            $table->string('husband_father')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('birthday')->nullable();
            $table->string('issue_date')->nullable();
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
        Schema::dropIfExists('nid_makes');
    }
}
