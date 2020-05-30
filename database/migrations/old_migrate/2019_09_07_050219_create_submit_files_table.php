<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmitFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('files_id');
            $table->integer('forms_id');
            $table->string('sf_title');
            $table->integer('sf_sender');
            $table->integer('sf_receiver');
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
        Schema::dropIfExists('submit_files');
    }
}
