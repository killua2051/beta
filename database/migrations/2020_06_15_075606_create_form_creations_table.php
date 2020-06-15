<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormCreationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_creations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('approver_id');
            $table->integer('reviewer_id');
            $table->integer('crf_number_id');
            $table->integer('form_status');
            $table->string('form_doc_code');
            $table->string('form_doc_title');
            $table->string('form_version_number');
            $table->string('form_new_version');
            $table->date('form_effective_date');
            $table->string('form_classification');
            $table->date('form_new_effective_date');
            $table->string('form_parts');
            $table->integer('file_version');
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
        Schema::dropIfExists('form_creations');
    }
}
