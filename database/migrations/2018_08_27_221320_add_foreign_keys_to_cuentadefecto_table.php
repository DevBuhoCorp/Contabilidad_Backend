<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCuentadefectoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cuentadefecto', function(Blueprint $table)
		{
			$table->foreign('IDCuenta', 'fk_CuentaDefecto_CuentaContable1')->references('ID')->on('cuentacontable')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cuentadefecto', function(Blueprint $table)
		{
			$table->dropForeign('fk_CuentaDefecto_CuentaContable1');
		});
	}

}
