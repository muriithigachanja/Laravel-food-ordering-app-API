<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapsTable extends Migration
{
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {

		$table->id();
		$table->string('name')->nullable();
		$table->string('sku')->nullable();
		$table->string('api_key')->nullable();
		$table->string('state')->nullable();
		$table->string('lat')->nullable();
		$table->string('long')->nullable();
		$table->tinyInteger('active',)->default('0');
		$table->integer('zoom',)->nullable();
		$table->integer('zoom_profile',)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('maps');
    }
}