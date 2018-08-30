<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModeloplancontableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modeloplancontable', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Modelo', 45)->nullable();
			$table->string('Etiqueta', 45)->nullable();
			$table->string('Estado', 3)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modeloplancontable');
	}

}
