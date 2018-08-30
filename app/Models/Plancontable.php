<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 24 Aug 2018 14:37:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Plancontable
 * 
 * @property int $ID
 * @property int $IDModelo
 * @property int $IDCuenta
 * 
 * @property \App\Models\Cuentacontable $cuentacontable
 * @property \App\Models\Modeloplancontable $modeloplancontable
 *
 * @package App\Models
 */
class Plancontable extends Eloquent
{
	protected $table = 'plancontable';
	protected $primaryKey = 'ID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'IDModelo' => 'int',
		'IDCuenta' => 'int'
	];

	protected $fillable = [
		'IDModelo',
		'IDCuenta'
	];

	public function cuentacontable()
	{
		return $this->belongsTo(\App\Models\Cuentacontable::class, 'IDCuenta');
	}

	public function modeloplancontable()
	{
		return $this->belongsTo(\App\Models\Modeloplancontable::class, 'IDModelo');
	}
}
