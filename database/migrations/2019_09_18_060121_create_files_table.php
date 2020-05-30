<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id');
            $table->integer('user_id');
            $table->integer('approver_id');
            $table->integer('reviewer_id');
            $table->date('approved_date');
            $table->date('reviewed_date');
            $table->string('file_title');
            $table->string('file_path');
            $table->integer('file_status');
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
        Schema::dropIfExists('files');
    }
}
