<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('withdrawal_requests', function (Blueprint $table) {

		$table->integer('id',);
		$table->integer('restaurant_id',)->nullable();
		$table->string('amount',100)->nullable();
		$table->string('status',100)->nullable();
		$table->string('reference',100)->nullable();
		$table->datetime('date')->nullable();
		$table->string('updated_by',100)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('withdrawal_requests');
    }
}