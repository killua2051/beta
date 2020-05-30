<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQmsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qms_files', function (Blueprint $table) {
            $table->increments('qms_id');
            $table->integer('forms_id');
            $table->integer('qms_author');
            $table->integer('qms_approver');
            $table->integer('qms_reviewer');
            $table->string('qms_title');
            $table->text('qms_location');
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
        Schema::dropIfExists('qms_files');
    }
}
