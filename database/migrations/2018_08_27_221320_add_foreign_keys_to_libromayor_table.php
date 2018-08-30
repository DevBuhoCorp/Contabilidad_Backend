<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLibromayorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('libromayor', function(Blueprint $table)
		{
			$table->foreign('IDCuenta', 'fk_LibroMayor_CuentaContable1')->references('ID')->on('cuentacontable')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('IDDiario', 'fk_LibroMayor_DiarioContable1')->references('ID')->on('diariocontable')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('IDFactura', 'fk_LibroMayor_Factura1')->references('ID')->on('factura')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('libromayor', function(Blueprint $table)
		{
			$table->dropForeign('fk_LibroMayor_CuentaContable1');
			$table->dropForeign('fk_LibroMayor_DiarioContable1');
			$table->dropForeign('fk_LibroMayor_Factura1');
		});
	}

}
