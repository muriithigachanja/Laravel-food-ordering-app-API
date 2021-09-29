<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

		$table->integer('id',);
		$table->integer('client_id',)->nullable();
		$table->integer('restaurant_id',)->nullable();
		$table->string('status',50)->nullable();
		$table->string('total',100)->nullable();
		$table->datetime('sent')->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}