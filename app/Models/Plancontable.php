<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 19:50:53 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $detalletransaccions
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

	public function detalletransaccions()
	{
		return $this->hasMany(\App\Models\Detalletransaccion::class, 'IDCuenta');
	}
}
