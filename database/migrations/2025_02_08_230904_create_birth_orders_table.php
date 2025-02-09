<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirthOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('image')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('dob')->nullable();
            $table->string('which_number_child')->nullable();
            $table->string('fathers_name_bn')->nullable();
            $table->string('fathers_name_en')->nullable();
            $table->string('mothers_name_bn')->nullable();
            $table->string('mothers_name_en')->nullable();
            $table->string('fathers_nid')->nullable();
            $table->string('mothers_nid')->nullable();
            $table->text('address')->nullable();
            $table->string('house_holding')->nullable();
            $table->string('post_office')->nullable();
            $table->string('word_no')->nullable();
            $table->string('village')->nullable();
            $table->string('union')->nullable();
            $table->string('upozila')->nullable();
            $table->string('district')->nullable();
            $table->string('division')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=Pending,1=Accepted');
            $table->text('comment')->nullable();
            $table->string('fathers_nid_file')->nullable();
            $table->string('mothers_nid_file')->nullable();
            $table->string('school_cirtificate')->nullable();
            $table->string('tika_card')->nullable();
            $table->string('nid_file')->nullable();
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
        Schema::dropIfExists('birth_orders');
    }
}
