<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 25 Sep 2018 16:44:25 +0000.
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
