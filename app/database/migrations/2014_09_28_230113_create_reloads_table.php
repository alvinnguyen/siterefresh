<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReloadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reloads', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('site_id',false,true);
            $table->string('hash',32);
            $table->integer('weight');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reloads');
	}

}
