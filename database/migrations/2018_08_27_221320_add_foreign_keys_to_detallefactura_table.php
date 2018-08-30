<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDetallefacturaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('detallefactura', function(Blueprint $table)
		{
			$table->foreign('IDFactura', 'fk_DetalleFactura_Factura1')->references('ID')->on('factura')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('detallefactura', function(Blueprint $table)
		{
			$table->dropForeign('fk_DetalleFactura_Factura1');
		});
	}

}
