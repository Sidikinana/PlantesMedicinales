<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegionPratiqueesTable extends Migration {

	public function up()
	{
		Schema::create('regionPratiquees', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('nomRegion', 100);
			$table->float('latitude')->nullable();
			$table->float('longitude')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('regionPratiquees');
	}
}