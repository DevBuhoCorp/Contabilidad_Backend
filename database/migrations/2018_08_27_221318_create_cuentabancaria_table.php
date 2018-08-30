<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentabancariaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuentabancaria', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Referencia', 45)->nullable();
			$table->string('Cuenta', 45)->nullable();
			$table->string('Etiqueta', 45)->nullable();
			$table->integer('TipoCuenta')->index('fk_CuentaBancaria_TipoCuentaBancaria1_idx');
			$table->string('Estado', 3)->nullable();
			$table->string('Web', 45)->nullable();
			$table->decimal('SaldoInicial', 10)->nullable();
			$table->dateTime('Fecha')->nullable();
			$table->decimal('SaldoMinimo', 10)->nullable();
			$table->string('NombreBanco', 45)->nullable();
			$table->string('NumeroCuenta', 45)->nullable();
			$table->string('NombreTitular', 45)->nullable();
			$table->string('DireccionTitular', 45)->nullable();
			$table->string('CuentaBancariacol', 45)->nullable();
			$table->integer('IDCuenta')->index('fk_CuentaBancaria_CuentaContable1_idx');
			$table->integer('IDDiario')->index('fk_CuentaBancaria_DiarioContable1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cuentabancaria');
	}

}
