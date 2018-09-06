<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 04 Sep 2018 20:28:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Modeloplancontable
 * 
 * @property int $ID
 * @property string $Modelo
 * @property string $Etiqueta
 * @property string $Estado
 * 
 * @property \Illuminate\Database\Eloquent\Collection $plancontables
 *
 * @package App\Models
 */
class Modeloplancontable extends Eloquent
{
	protected $table = 'modeloplancontable';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $fillable = [
		'Modelo',
		'Etiqueta',
		'Estado'
	];

	public function plancontables()
	{
		return $this->hasMany(\App\Models\Plancontable::class, 'IDModelo');
	}
}
