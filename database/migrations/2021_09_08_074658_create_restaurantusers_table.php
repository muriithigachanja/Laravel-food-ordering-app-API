<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantusersTable extends Migration
{
    public function up()
    {
        Schema::create('restaurantusers', function (Blueprint $table) {

		$table->id();
		$table->string('firstname',191);
		$table->string('lastname',191);
		$table->string('role',191);
		$table->string('email',191);
		$table->integer('restaurant_id',);
		$table->timestamp('email_verified_at')->nullable();
		$table->string('password',191);
		$table->string('remember_token',100)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurantusers');
    }
}