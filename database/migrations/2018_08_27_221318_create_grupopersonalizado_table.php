<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGrupopersonalizadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grupopersonalizado', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Codigo', 45)->nullable();
			$table->string('Etiqueta', 100)->nullable();
			$table->string('Comentario', 100)->nullable();
			$table->string('GrupoPersonalizadocol', 45)->nullable();
			$table->boolean('Calculado')->nullable();
			$table->string('Formula', 100)->nullable();
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
		Schema::drop('grupopersonalizado');
	}

}
