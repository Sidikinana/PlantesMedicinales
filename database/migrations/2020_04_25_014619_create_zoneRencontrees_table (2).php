<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateZoneRencontreesTable extends Migration {

	public function up()
	{
		Schema::create('zoneRencontrees', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('nomzone', 100);
			$table->float('latitude')->nullable();
			$table->float('longitude')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('zoneRencontrees');
	}
}