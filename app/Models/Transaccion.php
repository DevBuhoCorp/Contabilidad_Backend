<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 19:50:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Transaccion
 * 
 * @property int $ID
 * @property \Carbon\Carbon $Fecha
 * @property int $IDEstacion
 * @property int $IDEmpresa
 * @property string $Etiqueta
 * @property float $Debe
 * @property float $Haber
 * @property string $Estado
 * 
 * @property \App\Models\Estacion $estacion
 * @property \Illuminate\Database\Eloquent\Collection $detalletransaccions
 * @property \Illuminate\Database\Eloquent\Collection $documentocontables
 *
 * @package App\Models
 */
class Transaccion extends Eloquent
{
	protected $table = 'transaccion';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'IDEstacion' => 'int',
		'IDEmpresa' => 'int',
		'Debe' => 'float',
		'Haber' => 'float'
	];

	protected $dates = [
		'Fecha'
	];

	protected $fillable = [
		'Fecha',
		'IDEstacion',
		'IDEmpresa',
		'Etiqueta',
		'Debe',
		'Haber',
		'Estado'
	];

	public function estacion()
	{
		return $this->belongsTo(\App\Models\Estacion::class, 'IDEstacion');
	}

	public function detalletransaccions()
	{
		return $this->hasMany(\App\Models\Detalletransaccion::class, 'IDTransaccion');
	}

	public function documentocontables()
	{
		return $this->hasMany(\App\Models\Documentocontable::class, 'IDTransaccion');
	}
}
