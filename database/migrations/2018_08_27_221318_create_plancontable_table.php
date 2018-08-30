<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlancontableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plancontable', function(Blueprint $table)
		{
			$table->integer('ID')->primary();
			$table->integer('IDModelo')->index('fk_PlanContable_ModeloPlanContable1_idx');
			$table->integer('IDCuenta')->index('fk_PlanContable_CuentaContable1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plancontable');
	}

}
