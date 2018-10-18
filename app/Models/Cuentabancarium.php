<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 18 Oct 2018 19:50:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cuentabancarium
 * 
 * @property int $ID
 * @property int $IDEmpresa
 * @property int $IDBanco
 * @property int $IDTipoCuenta
 * @property \Carbon\Carbon $FechaApertura
 * @property float $SaldoInicial
 * @property float $SaldoMinimo
 * @property string $NumeroCuenta
 * @property string $IdentificacionTitular
 * @property string $NombreTitular
 * @property string $DireccionTitular
 * @property string $Estado
 * 
 * @property \App\Models\Banco $banco
 * @property \App\Models\Empresa $empresa
 * @property \App\Models\Tipocuentabancarium $tipocuentabancarium
 *
 * @package App\Models
 */
class Cuentabancarium extends Eloquent
{
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'IDEmpresa' => 'int',
		'IDBanco' => 'int',
		'IDTipoCuenta' => 'int',
		'SaldoInicial' => 'float',
		'SaldoMinimo' => 'float'
	];

	protected $dates = [
		'FechaApertura'
	];

	protected $fillable = [
		'IDEmpresa',
		'IDBanco',
		'IDTipoCuenta',
		'FechaApertura',
		'SaldoInicial',
		'SaldoMinimo',
		'NumeroCuenta',
		'IdentificacionTitular',
		'NombreTitular',
		'DireccionTitular',
		'Estado'
	];

	public function banco()
	{
		return $this->belongsTo(\App\Models\Banco::class, 'IDBanco');
	}

	public function empresa()
	{
		return $this->belongsTo(\App\Models\Empresa::class, 'IDEmpresa');
	}

	public function tipocuentabancarium()
	{
		return $this->belongsTo(\App\Models\Tipocuentabancarium::class, 'IDTipoCuenta');
	}
}
