<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 19:50:53 +0000.
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
 * @property int $IDDiario
 * @property int $IDTipoEstado
 * 
 * @property \App\Models\Tipoestado $tipoestado
 * @property \App\Models\Cuentacontable $cuentacontable
 * @property \App\Models\Diariocontable $diariocontable
 * @property \App\Models\Grupocuentum $grupocuentum
 * @property \Illuminate\Database\Eloquent\Collection $cuentacontables
 * @property \Illuminate\Database\Eloquent\Collection $cuentadefectos
 * @property \Illuminate\Database\Eloquent\Collection $cuentaimpuestos
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
		'Saldo' => 'float',
		'IDDiario' => 'int',
		'IDTipoEstado' => 'int'
	];

	protected $fillable = [
		'NumeroCuenta',
		'Etiqueta',
		'IDGrupoCuenta',
		'IDPadre',
		'Estado',
		'Saldo',
		'IDDiario',
		'IDTipoEstado'
	];

	public function tipoestado()
	{
		return $this->belongsTo(\App\Models\Tipoestado::class, 'IDTipoEstado');
	}

	public function cuentacontable()
	{
		return $this->belongsTo(\App\Models\Cuentacontable::class, 'IDPadre');
	}

	public function diariocontable()
	{
		return $this->belongsTo(\App\Models\Diariocontable::class, 'IDDiario');
	}

	public function grupocuentum()
	{
		return $this->belongsTo(\App\Models\Grupocuentum::class, 'IDGrupoCuenta');
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

	public function listagrupopersonalizados()
	{
		return $this->hasMany(\App\Models\Listagrupopersonalizado::class, 'IDCuenta');
	}

	public function plancontables()
	{
		return $this->hasMany(\App\Models\Plancontable::class, 'IDCuenta');
	}
}
