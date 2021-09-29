<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourceDatasTable extends Migration
{
    public function up()
    {
        Schema::create('source_datas', function (Blueprint $table) {

		$table->id();
		$table->string('source_name',191)->nullable();
		$table->string('active',191)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('source_datas');
    }
}