<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentadefectoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cuentadefecto', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Opcion', 100)->nullable();
			$table->integer('IDCuenta')->index('fk_CuentaDefecto_CuentaContable1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cuentadefecto');
	}

}
