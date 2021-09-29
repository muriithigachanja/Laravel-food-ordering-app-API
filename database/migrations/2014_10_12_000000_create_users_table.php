<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',191)->nullable();
            $table->string('last_name',191)->nullable();
            $table->string('email')->unique();
            $table->string('role',45)->nullable();
            $table->string('password');
            $table->string('restaurant_id',45)->nullable();
            $table->string('category',100)->nullable();
            $table ->string('phone_number')->nullable();
            $table->string('city',100)->nullable();
            $table->string('latitude',100)->nullable();
            $table->string('longitude',100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token',100)->nullable();
            $table->enum('status',['0','1'])->default('1');
            $table->string('created_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('license_no',100)->nullable();
            $table->string('number_plate',100)->nullable();
            $table->string('bank_name',100)->nullable();
            $table->string('balances',45)->nullable();
            $table->string('id_no',45)->nullable();
            $table->string('account_no',45)->nullable();
            $table->string('api_token',195)->nullable();
            $table->timestamp('last_login')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
