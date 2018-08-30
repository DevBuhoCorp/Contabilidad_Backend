<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 24 Aug 2018 14:37:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Libromayor
 * 
 * @property int $ID
 * @property \Carbon\Carbon $Fecha
 * @property int $IDCuenta
 * @property string $Etiqueta
 * @property float $Debe
 * @property float $Haber
 * @property int $IDDiario
 * @property int $IDFactura
 * 
 * @property \App\Models\Cuentacontable $cuentacontable
 * @property \App\Models\Diariocontable $diariocontable
 * @property \App\Models\Factura $factura
 *
 * @package App\Models
 */
class Libromayor extends Eloquent
{
	protected $table = 'libromayor';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'IDCuenta' => 'int',
		'Debe' => 'float',
		'Haber' => 'float',
		'IDDiario' => 'int',
		'IDFactura' => 'int'
	];

	protected $dates = [
		'Fecha'
	];

	protected $fillable = [
		'Fecha',
		'IDCuenta',
		'Etiqueta',
		'Debe',
		'Haber',
		'IDDiario',
		'IDFactura'
	];

	public function cuentacontable()
	{
		return $this->belongsTo(\App\Models\Cuentacontable::class, 'IDCuenta');
	}

	public function diariocontable()
	{
		return $this->belongsTo(\App\Models\Diariocontable::class, 'IDDiario');
	}

	public function factura()
	{
		return $this->belongsTo(\App\Models\Factura::class, 'IDFactura');
	}
}
