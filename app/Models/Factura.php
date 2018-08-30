<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 24 Aug 2018 14:37:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Factura
 * 
 * @property int $ID
 * @property \Carbon\Carbon $Fecha
 * @property string $NFactura
 * @property string $FormaPago
 * @property string $PuntoVenta
 * @property string $Sucursal
 * @property float $Descuento
 * @property float $IVA
 * @property float $Total
 * @property string $Imagen
 * @property string $Tipo
 * 
 * @property \Illuminate\Database\Eloquent\Collection $detallefacturas
 * @property \Illuminate\Database\Eloquent\Collection $libromayors
 *
 * @package App\Models
 */
class Factura extends Eloquent
{
	protected $table = 'factura';
	protected $primaryKey = 'ID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'Descuento' => 'float',
		'IVA' => 'float',
		'Total' => 'float'
	];

	protected $dates = [
		'Fecha'
	];

	protected $fillable = [
		'Fecha',
		'NFactura',
		'FormaPago',
		'PuntoVenta',
		'Sucursal',
		'Descuento',
		'IVA',
		'Total',
		'Imagen',
		'Tipo'
	];

	public function detallefacturas()
	{
		return $this->hasMany(\App\Models\Detallefactura::class, 'IDFactura');
	}

	public function libromayors()
	{
		return $this->hasMany(\App\Models\Libromayor::class, 'IDFactura');
	}
}
