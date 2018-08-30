<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCuentaimpuestoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cuentaimpuesto', function(Blueprint $table)
		{
			$table->foreign('IDCuenta', 'fk_CuentaImpuesto_CuentaContable1')->references('ID')->on('cuentacontable')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cuentaimpuesto', function(Blueprint $table)
		{
			$table->dropForeign('fk_CuentaImpuesto_CuentaContable1');
		});
	}

}
