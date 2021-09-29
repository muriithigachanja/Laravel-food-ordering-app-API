<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('restaurant_orders', function (Blueprint $table) {

		$table->integer('id',);
		$table->integer('order_id',)->nullable();
		$table->integer('restaurant_id',)->nullable();
		$table->string('status',50)->nullable();
		$table->string('delivery_description')->nullable();
		$table->string('latitude',200)->nullable();
		$table->string('longitude',200)->nullable();
		$table->string('receiptno',50);
		$table->datetime('sent')->nullable();
		$table->string('delivery_status',10)->nullable();
		$table->integer('driver_id',)->nullable();
		$table->integer('client_id',);
		$table->string('dtime',20)->nullable();
		$table->string('dreason',245)->nullable();
		$table->integer('refunds',)->nullable();
		$table->integer('balances',)->nullable();
		$table->integer('commission',)->nullable();
		$table->string('admin_commission',100)->nullable();
		$table->integer('rating_status',)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurant_orders');
    }
}
