<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCuentacontableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cuentacontable', function(Blueprint $table)
		{
			$table->foreign('IDPadre', 'fk_CuentaContable_CuentaContable1')->references('ID')->on('cuentacontable')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('IDGrupoCuenta', 'fk_CuentaContable_GrupoCuenta1')->references('ID')->on('grupocuenta')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cuentacontable', function(Blueprint $table)
		{
			$table->dropForeign('fk_CuentaContable_CuentaContable1');
			$table->dropForeign('fk_CuentaContable_GrupoCuenta1');
		});
	}

}
