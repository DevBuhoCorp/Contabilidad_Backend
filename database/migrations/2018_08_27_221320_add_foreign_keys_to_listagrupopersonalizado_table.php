<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToListagrupopersonalizadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('listagrupopersonalizado', function(Blueprint $table)
		{
			$table->foreign('IDCuenta', 'fk_ListaGrupoPersonalizado_CuentaContable1')->references('ID')->on('cuentacontable')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('IDGrupo', 'fk_ListaGrupoPersonalizado_GrupoPersonalizado1')->references('ID')->on('grupopersonalizado')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('listagrupopersonalizado', function(Blueprint $table)
		{
			$table->dropForeign('fk_ListaGrupoPersonalizado_CuentaContable1');
			$table->dropForeign('fk_ListaGrupoPersonalizado_GrupoPersonalizado1');
		});
	}

}
