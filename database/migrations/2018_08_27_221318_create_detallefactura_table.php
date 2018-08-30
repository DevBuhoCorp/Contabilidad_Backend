<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetallefacturaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detallefactura', function(Blueprint $table)
		{
			$table->integer('ID')->primary();
			$table->integer('IDFactura')->index('fk_DetalleFactura_Factura1_idx');
			$table->string('CodigoProducto', 45)->nullable();
			$table->string('Descripcion', 45)->nullable();
			$table->decimal('ValorUnitario', 10)->nullable();
			$table->decimal('Cantidad', 10)->nullable();
			$table->decimal('Total', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detallefactura');
	}

}
