<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('all_languages', function (Blueprint $table) {

		$table->id();
		$table->string('language_name',191)->nullable();
		$table->text('note');
		$table->string('flag',191)->nullable();
		$table->string('created_by',191)->nullable();
		$table->string('updated_by',191)->nullable();
		$table->string('deleted_by',191)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('all_languages');
    }
}