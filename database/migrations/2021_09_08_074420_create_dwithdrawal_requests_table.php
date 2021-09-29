<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDwithdrawalRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('dwithdrawal_requests', function (Blueprint $table) {

		$table->integer('id',);
		$table->integer('driver_id',)->nullable();
		$table->string('amount',100)->nullable();
		$table->string('status',20)->nullable();
		$table->string('reference',100)->nullable();
		$table->datetime('date')->nullable();
		$table->string('updated_by',100)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('dwithdrawal_requests');
    }
}