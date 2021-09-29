<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestsTable extends Migration
{
    public function up()
    {
        Schema::create('suggests', function (Blueprint $table) {

		$table->id();
		$table->bigInteger('suggest_recordid',)->nullable();
		$table->string('suggest_organization',191)->nullable();
		$table->text('suggest_content');
		$table->string('suggest_username',191)->nullable();
		$table->string('suggest_user_email',191)->nullable();
		$table->string('suggest_user_phone',191)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('suggests');
    }
}