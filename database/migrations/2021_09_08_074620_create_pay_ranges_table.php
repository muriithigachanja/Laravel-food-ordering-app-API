<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayRangesTable extends Migration
{
    public function up()
    {
        Schema::create('pay_ranges', function (Blueprint $table) {

		$table->integer('id',);
		$table->string('distance',100)->nullable();
		$table->string('charges',100)->nullable();
		$table->string('created_by',100)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pay_ranges');
    }
}