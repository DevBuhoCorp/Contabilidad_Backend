<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 24 Aug 2018 14:37:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cuentacontable
 * 
 * @property int $ID
 * @property string $NumeroCuenta
 * @property string $Etiqueta
 * @property int $IDGrupoCuenta
 * @property int $IDPadre
 * @property string $Estado
 * @property float $Saldo
 * 
 * @property \App\Models\Cuentacontable $cuentacontable
 * @property \App\Models\Grupocuentum $grupocuentum
 * @property \Illuminate\Database\Eloquent\Collection $cuentabancaria
 * @property \Illuminate\Database\Eloquent\Collection $cuentacontables
 * @property \Illuminate\Database\Eloquent\Collection $cuentadefectos
 * @property \Illuminate\Database\Eloquent\Collection $cuentaimpuestos
 * @property \Illuminate\Database\Eloquent\Collection $libromayors
 * @property \Illuminate\Database\Eloquent\Collection $listagrupopersonalizados
 * @property \Illuminate\Database\Eloquent\Collection $plancontables
 *
 * @package App\Models
 */
class Cuentacontable extends Eloquent
{
	protected $table = 'cuentacontable';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'IDGrupoCuenta' => 'int',
		'IDPadre' => 'int',
		'Saldo' => 'float'
	];

	protected $fillable = [
		'NumeroCuenta',
		'Etiqueta',
		'IDGrupoCuenta',
		'IDPadre',
		'Estado',
		'Saldo'
	];

	public function cuentacontable()
	{
		return $this->belongsTo(\App\Models\Cuentacontable::class, 'IDPadre');
	}

	public function grupocuentum()
	{
		return $this->belongsTo(\App\Models\Grupocuentum::class, 'IDGrupoCuenta');
	}

	public function cuentabancaria()
	{
		return $this->hasMany(\App\Models\Cuentabancarium::class, 'IDCuenta');
	}

	public function cuentacontables()
	{
		return $this->hasMany(\App\Models\Cuentacontable::class, 'IDPadre');
	}

	public function cuentadefectos()
	{
		return $this->hasMany(\App\Models\Cuentadefecto::class, 'IDCuenta');
	}

	public function cuentaimpuestos()
	{
		return $this->hasMany(\App\Models\Cuentaimpuesto::class, 'IDCuenta');
	}

	public function libromayors()
	{
		return $this->hasMany(\App\Models\Libromayor::class, 'IDCuenta');
	}

	public function listagrupopersonalizados()
	{
		return $this->hasMany(\App\Models\Listagrupopersonalizado::class, 'IDCuenta');
	}

	public function plancontables()
	{
		return $this->hasMany(\App\Models\Plancontable::class, 'IDCuenta');
	}
}
