<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 19:50:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cuentadefecto
 * 
 * @property int $ID
 * @property string $Opcion
 * @property int $IDCuenta
 * 
 * @property \App\Models\Cuentacontable $cuentacontable
 *
 * @package App\Models
 */
class Cuentadefecto extends Eloquent
{
	protected $table = 'cuentadefecto';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'IDCuenta' => 'int'
	];

	protected $fillable = [
		'Opcion',
		'IDCuenta'
	];

	public function cuentacontable()
	{
		return $this->belongsTo(\App\Models\Cuentacontable::class, 'IDCuenta');
	}
}
