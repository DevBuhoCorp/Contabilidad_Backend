<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentacontableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuentacontable', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('NumeroCuenta', 45)->nullable();
			$table->string('Etiqueta', 45)->nullable();
			$table->integer('IDGrupoCuenta')->index('fk_CuentaContable_GrupoCuenta1_idx');
			$table->integer('IDPadre')->index('fk_CuentaContable_CuentaContable1_idx');
			$table->string('Estado', 3)->nullable();
			$table->decimal('Saldo', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cuentacontable');
	}

}
