<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPlancontableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('plancontable', function(Blueprint $table)
		{
			$table->foreign('IDCuenta', 'fk_PlanContable_CuentaContable1')->references('ID')->on('cuentacontable')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('IDModelo', 'fk_PlanContable_ModeloPlanContable1')->references('ID')->on('modeloplancontable')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('plancontable', function(Blueprint $table)
		{
			$table->dropForeign('fk_PlanContable_CuentaContable1');
			$table->dropForeign('fk_PlanContable_ModeloPlanContable1');
		});
	}

}
