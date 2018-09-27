<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 Sep 2018 16:44:25 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Transaccion
 * 
 * @property int $ID
 * @property \Carbon\Carbon $Fecha
 * @property int $IDEstacion
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
		'IDEstacion' => 'int'
	];

	protected $dates = [
		'Fecha'
	];

	protected $fillable = [
		'Fecha',
		'IDEstacion'
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
