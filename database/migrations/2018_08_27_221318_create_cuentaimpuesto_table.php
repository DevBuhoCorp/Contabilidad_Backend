<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentaimpuestoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuentaimpuesto', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Codigo', 45)->nullable();
			$table->string('Etiqueta', 45)->nullable();
			$table->integer('IDCuenta')->index('fk_CuentaImpuesto_CuentaContable1_idx');
			$table->string('Estado', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cuentaimpuesto');
	}

}
