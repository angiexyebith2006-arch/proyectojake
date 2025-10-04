<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reemplazo
 * 
 * @property int $id_reemplazo
 * @property int $id_actividad
 * @property int|null $id_usuario_titular
 * @property int|null $id_usuario_suplente
 * @property string|null $motivo
 * 
 * @property Actividad $actividad
 * @property Usuario|null $usuario
 * @property Collection|IncluyeAsistencium[] $incluye_asistencia
 *
 * @package App\Models
 */
class Reemplazo extends Model
{
	protected $table = 'reemplazo';
	protected $primaryKey = 'id_reemplazo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_reemplazo' => 'int',
		'id_actividad' => 'int',
		'id_usuario_titular' => 'int',
		'id_usuario_suplente' => 'int'
	];

	protected $fillable = [
		'id_actividad',
		'id_usuario_titular',
		'id_usuario_suplente',
		'motivo'
	];

	public function actividad()
	{
		return $this->belongsTo(Actividad::class, 'id_actividad');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario_suplente');
	}

	public function incluye_asistencia()
	{
		return $this->hasMany(IncluyeAsistencium::class, 'id_reemplazo');
	}
}
