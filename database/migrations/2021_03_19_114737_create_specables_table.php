<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specables', function (Blueprint $table) {
            $table->unsignedBigInteger('spec_id');
            $table->foreign('spec_id')->references('id')->on('specializations')->onDelete('cascade');
            $table->morphs('specable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specables');
    }
}
