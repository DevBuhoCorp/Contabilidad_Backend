<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCuentabancariaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cuentabancaria', function(Blueprint $table)
		{
			$table->foreign('IDCuenta', 'fk_CuentaBancaria_CuentaContable1')->references('ID')->on('cuentacontable')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('IDDiario', 'fk_CuentaBancaria_DiarioContable1')->references('ID')->on('diariocontable')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('TipoCuenta', 'fk_CuentaBancaria_TipoCuentaBancaria1')->references('ID')->on('tipocuentabancaria')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cuentabancaria', function(Blueprint $table)
		{
			$table->dropForeign('fk_CuentaBancaria_CuentaContable1');
			$table->dropForeign('fk_CuentaBancaria_DiarioContable1');
			$table->dropForeign('fk_CuentaBancaria_TipoCuentaBancaria1');
		});
	}

}
