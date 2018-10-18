<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 19:50:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Empresaaplicacion
 * 
 * @property int $ID
 * @property int $IDEmpresa
 * @property int $IDAplicacion
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

	protected $fillable = [
		'IDEmpresa',
		'IDAplicacion'
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
