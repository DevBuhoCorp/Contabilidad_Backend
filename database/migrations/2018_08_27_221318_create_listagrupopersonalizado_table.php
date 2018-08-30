<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListagrupopersonalizadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listagrupopersonalizado', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('IDGrupo')->index('fk_ListaGrupoPersonalizado_GrupoPersonalizado1_idx');
			$table->integer('IDCuenta')->index('fk_ListaGrupoPersonalizado_CuentaContable1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('listagrupopersonalizado');
	}

}
