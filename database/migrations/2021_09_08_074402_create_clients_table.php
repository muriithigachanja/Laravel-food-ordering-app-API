<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {

		$table->integer('id',);
		$table->text('firstname');
		$table->text('lastname');
		$table->string('phone',100);
		$table->string('email',50)->nullable();
		$table->string('password',100)->nullable();
		$table->string('reset_token')->nullable();
		$table->string('api_token',155)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}