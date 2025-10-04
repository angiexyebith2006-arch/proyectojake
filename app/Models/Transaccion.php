<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaccion
 * 
 * @property int $id_transaccion
 * @property Carbon $fecha
 * @property string|null $detalle
 * @property string $tipo
 * @property float|null $valor
 * @property string|null $metodo_pago
 * @property string|null $comite
 * @property int $codigo_usuario
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Transaccion extends Model
{
	protected $table = 'transaccion';
	protected $primaryKey = 'id_transaccion';
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'datetime',
		'valor' => 'float',
		'codigo_usuario' => 'int'
	];

	protected $fillable = [
		'fecha',
		'detalle',
		'tipo',
		'valor',
		'metodo_pago',
		'comite',
		'codigo_usuario'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'codigo_usuario', 'id_numero_documento');
	}
}
