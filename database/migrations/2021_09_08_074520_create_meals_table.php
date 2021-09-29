<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {

		$table->id();
		$table->string('meal',191);
		$table->string('category',191);
		$table->string('description',191);
		$table->integer('restaurant_id',);
		$table->string('image',200);
		$table->string('wtime',191);
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->integer('ratings_count',)->default('0');
		$table->integer('ratings_people',)->default('0');
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('meals');
    }
}