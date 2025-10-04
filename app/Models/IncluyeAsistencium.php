<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class IncluyeAsistencium
 * 
 * @property int $id_numero_documento
 * @property int $id_actividad
 * @property string|null $estado
 * @property int|null $id_reemplazo
 * 
 * @property Usuario $usuario
 * @property Actividad $actividad
 * @property Reemplazo|null $reemplazo
 *
 * @package App\Models
 */
class IncluyeAsistencium extends Model
{
	protected $table = 'incluye_asistencia';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_numero_documento' => 'int',
		'id_actividad' => 'int',
		'id_reemplazo' => 'int'
	];

	protected $fillable = [
		'estado',
		'id_reemplazo'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_numero_documento');
	}

	public function actividad()
	{
		return $this->belongsTo(Actividad::class, 'id_actividad');
	}

	public function reemplazo()
	{
		return $this->belongsTo(Reemplazo::class, 'id_reemplazo');
	}
}
