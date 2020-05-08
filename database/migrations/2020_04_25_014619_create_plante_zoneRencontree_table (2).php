<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanteZoneRencontreeTable extends Migration {

	public function up()
	{
		Schema::create('plante_zoneRencontree', function(Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('plante_id')->unsigned();
			$table->bigInteger('zoneRencontree_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('plante_zoneRencontree');
	}
}