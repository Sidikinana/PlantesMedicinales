<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVertuesTable extends Migration {

	public function up()
	{
		Schema::create('vertues', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('nomVertue', 100);
			$table->mediumText('recette');
			$table->mediumText('utilisation');
			$table->bigInteger('plante_id')->unsigned();
			$table->bigInteger('regionPratiquee_id')->unsigned();
			$table->integer('partieUtilisee_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('vertues');
	}
}