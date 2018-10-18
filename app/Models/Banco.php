<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 19:50:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Banco
 * 
 * @property int $ID
 * @property string $Descripcion
 * @property string $Observacion
 * @property string $Estado
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cuentabancaria
 *
 * @package App\Models
 */
class Banco extends Eloquent
{
	protected $table = 'banco';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Descripcion',
		'Observacion',
		'Estado'
	];

	public function cuentabancaria()
	{
		return $this->hasMany(\App\Models\Cuentabancarium::class, 'IDBanco');
	}
}
