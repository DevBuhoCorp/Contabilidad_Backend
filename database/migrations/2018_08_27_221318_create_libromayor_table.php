<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLibromayorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('libromayor', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->dateTime('Fecha')->nullable();
			$table->integer('IDCuenta')->index('fk_LibroMayor_CuentaContable1_idx');
			$table->string('Etiqueta', 45)->nullable();
			$table->decimal('Debe', 10)->nullable();
			$table->decimal('Haber', 10)->nullable();
			$table->integer('IDDiario')->index('fk_LibroMayor_DiarioContable1_idx');
			$table->integer('IDFactura')->index('fk_LibroMayor_Factura1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('libromayor');
	}

}
