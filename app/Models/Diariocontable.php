<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 24 Aug 2018 14:37:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Diariocontable
 * 
 * @property int $ID
 * @property string $Codigo
 * @property string $Etiqueta
 * @property int $IDNaturaleza
 * @property string $Estado
 * 
 * @property \App\Models\Naturaleza $naturaleza
 * @property \Illuminate\Database\Eloquent\Collection $cuentabancaria
 * @property \Illuminate\Database\Eloquent\Collection $libromayors
 *
 * @package App\Models
 */
class Diariocontable extends Eloquent
{
	protected $table = 'diariocontable';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'IDNaturaleza' => 'int'
	];

	protected $fillable = [
		'Codigo',
		'Etiqueta',
		'IDNaturaleza',
		'Estado'
	];

	public function naturaleza()
	{
		return $this->belongsTo(\App\Models\Naturaleza::class, 'IDNaturaleza');
	}

	public function cuentabancaria()
	{
		return $this->hasMany(\App\Models\Cuentabancarium::class, 'IDDiario');
	}

	public function libromayors()
	{
		return $this->hasMany(\App\Models\Libromayor::class, 'IDDiario');
	}
}
