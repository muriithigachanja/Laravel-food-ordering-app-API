<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartitemsTable extends Migration
{
    public function up()
    {
        Schema::create('cartitems', function (Blueprint $table) {

		$table->integer('id',);
		$table->integer('meal_id',)->nullable();
		$table->string('meal_name',100)->nullable();
		$table->integer('price',)->nullable();
		$table->integer('quantity',)->nullable();
		$table->string('size',100)->nullable();
		$table->string('flavour',200);
		$table->string('flavour_id',10);
		$table->integer('order_id',)->nullable();
		$table->integer('restaurant_id',);
		$table->datetime('date')->nullable();
		$table->string('address',100)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('cartitems');
    }
}