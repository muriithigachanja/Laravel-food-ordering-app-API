<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {

		$table->integer('id',);
		$table->string('size',100)->nullable();
		$table->integer('meal',)->nullable();
		$table->string('price',100)->nullable();
		$table->string('restaurant_id',100)->nullable();
		$table->string('meal_name',100)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('sizes');
    }
}