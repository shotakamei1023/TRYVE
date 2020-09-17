<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address_first');
            $table->string('address_last');
            $table->integer('price');
            $table->text('order');
            $table->text('report')->nullable();
            $table->integer('value')->nullable();
            $table->integer('content_status')->default(1);
            $table->integer('report_status')->default(1);
            $table->softDeletes();
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('helper_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('helper_id')->references('id')->on('users');
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
        Schema::dropIfExists('contents');
    }
}