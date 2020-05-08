<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('vertues', function(Blueprint $table) {
			$table->foreign('plante_id')->references('id')->on('plantes')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('vertues', function(Blueprint $table) {
			$table->foreign('regionPratiquee_id')->references('id')->on('regionPratiquees')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('vertues', function(Blueprint $table) {
			$table->foreign('partieUtilisee_id')->references('id')->on('partieUtilisees')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('plante_zoneRencontree', function(Blueprint $table) {
			$table->foreign('plante_id')->references('id')->on('plantes')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('plante_zoneRencontree', function(Blueprint $table) {
			$table->foreign('zoneRencontree_id')->references('id')->on('zoneRencontrees')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('vertues', function(Blueprint $table) {
			$table->dropForeign('vertues_plante_id_foreign');
		});
		Schema::table('vertues', function(Blueprint $table) {
			$table->dropForeign('vertues_regionPratiquee_id_foreign');
		});
		Schema::table('vertues', function(Blueprint $table) {
			$table->dropForeign('vertues_partieUtilisee_id_foreign');
		});
		Schema::table('plante_zoneRencontree', function(Blueprint $table) {
			$table->dropForeign('plante_zoneRencontree_plante_id_foreign');
		});
		Schema::table('plante_zoneRencontree', function(Blueprint $table) {
			$table->dropForeign('plante_zoneRencontree_zoneRencontree_id_foreign');
		});
	}
}