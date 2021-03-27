<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caseables', function (Blueprint $table) {
            $table->unsignedBigInteger('legal_case_id');
            $table->foreign('legal_case_id')->references('id')->on('legal_cases')->onDelete('cascade');
            $table->morphs('caseable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caseables');
    }
}
