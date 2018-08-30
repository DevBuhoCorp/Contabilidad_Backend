<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDiariocontableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('diariocontable', function(Blueprint $table)
		{
			$table->foreign('IDNaturaleza', 'fk_DiarioContable_Naturaleza')->references('ID')->on('naturaleza')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('diariocontable', function(Blueprint $table)
		{
			$table->dropForeign('fk_DiarioContable_Naturaleza');
		});
	}

}
