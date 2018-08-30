<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiariocontableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diariocontable', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Codigo', 10)->nullable();
			$table->string('Etiqueta', 45)->nullable();
			$table->integer('IDNaturaleza')->index('fk_DiarioContable_Naturaleza_idx');
			$table->boolean('Estado')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('diariocontable');
	}

}
