<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 19:50:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Estacion
 * 
 * @property int $ID
 * @property string $Nmaquina
 * @property string $Token
 * @property string $Estado
 * @property int $IDAplicacion
 * 
 * @property \App\Models\Aplicacion $aplicacion
 * @property \Illuminate\Database\Eloquent\Collection $transaccions
 *
 * @package App\Models
 */
class Estacion extends Eloquent
{
	protected $table = 'estacion';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'IDAplicacion' => 'int'
	];

	protected $fillable = [
		'Nmaquina',
		'Token',
		'Estado',
		'IDAplicacion'
	];

	public function aplicacion()
	{
		return $this->belongsTo(\App\Models\Aplicacion::class, 'IDAplicacion');
	}

	public function transaccions()
	{
		return $this->hasMany(\App\Models\Transaccion::class, 'IDEstacion');
	}
}
