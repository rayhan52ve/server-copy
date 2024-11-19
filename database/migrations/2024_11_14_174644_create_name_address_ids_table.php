<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNameAddressIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('name_address_ids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->string('name')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->text('address')->nullable();
            $table->string('village')->nullable();
            $table->string('union')->nullable();
            $table->string('upozila')->nullable();
            $table->string('district')->nullable();
            $table->string('division')->nullable();
            $table->string('fathers_nid')->nullable();
            $table->string('mothers_nid')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=Pending,1=Accepted');
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
        Schema::dropIfExists('name_address_ids');
    }
}
