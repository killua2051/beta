<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditableFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editable_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id');
            $table->integer('form_id');
            $table->integer('file_holder_id');
            $table->integer('user_id');
            $table->timestamp('downloaded_at');
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
        Schema::dropIfExists('editable_files');
    }
}
