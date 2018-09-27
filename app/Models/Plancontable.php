<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 Sep 2018 16:44:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Plancontable
 * 
 * @property int $ID
 * @property int $IDModelo
 * @property int $IDCuenta
 * @property int $ncuenta
 * 
 * @property \App\Models\Cuentacontable $cuentacontable
 * @property \App\Models\Modeloplancontable $modeloplancontable
 * @property \App\Models\Detalletransaccion $detalletransaccion
 *
 * @package App\Models
 */
class Plancontable extends Eloquent
{
	protected $table = 'plancontable';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'IDModelo' => 'int',
		'IDCuenta' => 'int',
		'ncuenta' => 'int'
	];

	protected $fillable = [
		'IDModelo',
		'IDCuenta',
		'ncuenta'
	];

	public function cuentacontable()
	{
		return $this->belongsTo(\App\Models\Cuentacontable::class, 'IDCuenta');
	}

	public function modeloplancontable()
	{
		return $this->belongsTo(\App\Models\Modeloplancontable::class, 'IDModelo');
	}

	public function detalletransaccion()
	{
		return $this->belongsTo(\App\Models\Detalletransaccion::class, 'ID', 'IDCuenta');
	}
}
