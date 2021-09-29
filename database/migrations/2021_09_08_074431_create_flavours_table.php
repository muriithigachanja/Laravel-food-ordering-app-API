<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlavoursTable extends Migration
{
    public function up()
    {
        Schema::create('flavours', function (Blueprint $table) {

		$table->integer('id',);
		$table->string('flavour',100)->nullable();
		$table->string('meal',100)->nullable();
		$table->string('restaurant_id',10)->nullable();
		$table->string('meal_name',100)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('flavours');
    }
}