<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Incluye
 * 
 * @property int $codigo_usuario
 * @property int $id_asistencia
 * 
 * @property Usuario $usuario
 * @property Asistencium $asistencium
 *
 * @package App\Models
 */
class Incluye extends Model
{
	protected $table = 'incluye';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'codigo_usuario' => 'int',
		'id_asistencia' => 'int'
	];

	protected $fillable = [
		'codigo_usuario',
		'id_asistencia'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'codigo_usuario');
	}

	public function asistencium()
	{
		return $this->belongsTo(Asistencium::class, 'id_asistencia');
	}
}
