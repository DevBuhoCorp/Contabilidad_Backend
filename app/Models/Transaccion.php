<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 04 Sep 2018 20:28:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Transaccion
 * 
 * @property int $ID
 * @property \Carbon\Carbon $Fecha
 * 
 * @property \Illuminate\Database\Eloquent\Collection $detalletransaccions
 * @property \Illuminate\Database\Eloquent\Collection $documentocontables
 *
 * @package App\Models
 */
class Transaccion extends Eloquent
{
	protected $table = 'transaccion';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $dates = [
		'Fecha'
	];

	protected $fillable = [
		'Fecha'
	];

	public function detalletransaccions()
	{
		return $this->hasMany(\App\Models\Detalletransaccion::class, 'IDTransaccion');
	}

	public function documentocontables()
	{
		return $this->hasMany(\App\Models\Documentocontable::class, 'IDTransaccion');
	}
}
