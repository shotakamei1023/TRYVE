<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeContentsChangeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->string('placename')->default(NULL)->change();
        });
        Schema::table('contents', function (Blueprint $table) {
            $table->string('gmap')->default(NULL)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}