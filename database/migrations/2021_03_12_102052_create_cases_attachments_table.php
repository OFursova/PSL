<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases_attachments', function (Blueprint $table) {
            $table->id();
            $table->morphs('attachable');
            $table->unsignedBigInteger('legal_case_id');
            $table->timestamps();
            $table->foreign('legal_case_id')->references('id')->on('legal_cases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases_attachments');
    }
}
