<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 04 Sep 2018 20:28:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tipocuentabancarium
 * 
 * @property int $ID
 * @property string $Etiqueta
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cuentabancaria
 *
 * @package App\Models
 */
class Tipocuentabancarium extends Eloquent
{
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Etiqueta'
	];

	public function cuentabancaria()
	{
		return $this->hasMany(\App\Models\Cuentabancarium::class, 'TipoCuenta');
	}
}
