<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesSpecializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases_specializations', function (Blueprint $table) {
            $table->unsignedBigInteger('case_id');
            $table->unsignedBigInteger('spec_id');

            $table->foreign('case_id')->references('id')->on('legal_cases')->onDelete('cascade');
            $table->foreign('spec_id')->references('id')->on('specializations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases_specializations');
    }
}
