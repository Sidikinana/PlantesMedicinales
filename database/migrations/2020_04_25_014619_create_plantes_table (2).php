<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlantesTable extends Migration {

	public function up()
	{
		Schema::create('plantes', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('nomScientifique', 100);
			$table->string('espece', 100)->nullable();
			$table->string('famille', 100)->nullable();
			$table->string('nomMoore', 100)->nullable();
			$table->string('nomDioula', 100)->nullable();
			$table->string('nomFulfulde', 100);
			$table->boolean('enDanger');
			$table->string('photo', 100);
		});
	}

	public function down()
	{
		Schema::drop('plantes');
	}
}