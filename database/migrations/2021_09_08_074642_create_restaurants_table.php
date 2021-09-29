<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {

		$table->id();
		$table->string('rname',191)->nullable();
		$table->string('rphone',191)->nullable();
		$table->string('mname',191)->nullable();
		$table->string('mcphone',191)->nullable();
		$table->string('cemail',191)->nullable();
		$table->string('latitude',191)->nullable();
		$table->string('longitude',191)->nullable();
		$table->string('city',191)->nullable();
		$table->string('website',191)->nullable();
		$table->string('dpickup',191)->nullable();
		$table->string('stax',191)->nullable();
        $table->string('dfee',191)->nullable();
		$table->string('dfamount',191)->nullable();
		$table->string('mffrom',191)->nullable();
		$table->string('mfto',191)->nullable();
		$table->string('safrom',191)->nullable();
		$table->string('sato',191)->nullable();
		$table->string('sufrom',191)->nullable();
		$table->string('suto',191)->nullable();
		$table->string('username',191)->nullable();
		$table->string('password',191)->nullable();
		$table->string('bank');
		$table->string('account_no');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->string('image',100);
		$table->string('created_by',100)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
