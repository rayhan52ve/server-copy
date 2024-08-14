<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->decimal('auto_recharge', 10, 2)->default(0)->nullable();
            $table->decimal('manual_recharge', 10, 2)->default(0)->nullable();
            $table->decimal('income', 10, 2)->default(0)->nullable();
            $table->decimal('expense', 10, 2)->default(0)->nullable();
            $table->decimal('profit', 10, 2)->default(0)->nullable();
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
        Schema::dropIfExists('reports');
    }
}
