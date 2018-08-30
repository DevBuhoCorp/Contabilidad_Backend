<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacturaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('factura', function(Blueprint $table)
		{
			$table->integer('ID')->primary();
			$table->dateTime('Fecha')->nullable();
			$table->string('NFactura', 45)->nullable();
			$table->string('FormaPago', 45)->nullable();
			$table->string('PuntoVenta', 45)->nullable();
			$table->string('Sucursal', 45)->nullable();
			$table->decimal('Descuento', 10)->nullable();
			$table->decimal('IVA', 10)->nullable();
			$table->decimal('Total', 10)->nullable();
			$table->string('Imagen', 45)->nullable();
			$table->string('Tipo', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('factura');
	}

}
