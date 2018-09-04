<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 04 Sep 2018 20:28:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Empresaaplicacion
 * 
 * @property int $ID
 * @property int $IDEmpresa
 * @property int $IDAplicacion
 * @property string $token
 * 
 * @property \App\Models\Aplicacion $aplicacion
 * @property \App\Models\Empresa $empresa
 *
 * @package App\Models
 */
class Empresaaplicacion extends Eloquent
{
	protected $table = 'empresaaplicacion';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'IDEmpresa' => 'int',
		'IDAplicacion' => 'int'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'IDEmpresa',
		'IDAplicacion',
		'token'
	];

	public function aplicacion()
	{
		return $this->belongsTo(\App\Models\Aplicacion::class, 'IDAplicacion');
	}

	public function empresa()
	{
		return $this->belongsTo(\App\Models\Empresa::class, 'IDEmpresa');
	}
}
