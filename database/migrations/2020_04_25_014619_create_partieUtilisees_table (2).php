<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartieUtiliseesTable extends Migration {

	public function up()
	{
		Schema::create('partieUtilisees', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('nomPartie', 100);
		});
	}

	public function down()
	{
		Schema::drop('partieUtilisees');
	}
}