<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asistencium
 * 
 * @property int $id_asistencia
 * @property Carbon $fecha_respuesta
 * @property string $estado
 * @property int $codigo_usuario
 * 
 * @property Incluye|null $incluye
 *
 * @package App\Models
 */
class Asistencium extends Model
{
	protected $table = 'asistencia';
	protected $primaryKey = 'id_asistencia';
	public $timestamps = false;

	protected $casts = [
		'fecha_respuesta' => 'datetime',
		'codigo_usuario' => 'int'
	];

	protected $fillable = [
		'fecha_respuesta',
		'estado',
		'codigo_usuario'
	];

	public function incluye()
	{
		return $this->hasOne(Incluye::class, 'id_asistencia');
	}
}
