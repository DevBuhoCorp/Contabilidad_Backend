<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 24 Aug 2018 14:37:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Detallefactura
 * 
 * @property int $ID
 * @property int $IDFactura
 * @property string $CodigoProducto
 * @property string $Descripcion
 * @property float $ValorUnitario
 * @property float $Cantidad
 * @property float $Total
 * 
 * @property \App\Models\Factura $factura
 *
 * @package App\Models
 */
class Detallefactura extends Eloquent
{
	protected $table = 'detallefactura';
	protected $primaryKey = 'ID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'IDFactura' => 'int',
		'ValorUnitario' => 'float',
		'Cantidad' => 'float',
		'Total' => 'float'
	];

	protected $fillable = [
		'IDFactura',
		'CodigoProducto',
		'Descripcion',
		'ValorUnitario',
		'Cantidad',
		'Total'
	];

	public function factura()
	{
		return $this->belongsTo(\App\Models\Factura::class, 'IDFactura');
	}
}
