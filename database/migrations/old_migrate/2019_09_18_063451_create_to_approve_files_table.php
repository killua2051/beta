<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToApproveFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_approve_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id');
            $table->integer('form_id');
            $table->integer('user_id');
            $table->integer('approver_id');
            $table->integer('approve_file_status');
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
        Schema::dropIfExists('to_approve_files');
    }
}
