<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mensaje
 * 
 * @property int $id_mensaje
 * @property Carbon $fecha_envio
 * @property Carbon $hora_envio
 * @property string $contenido
 * @property int $codigo_usuario
 * @property int $codigo_chat
 * 
 * @property Usuario $usuario
 * @property ChatActividade $chat_actividade
 *
 * @package App\Models
 */
class Mensaje extends Model
{
	protected $table = 'mensaje';
	protected $primaryKey = 'id_mensaje';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_mensaje' => 'int',
		'fecha_envio' => 'datetime',
		'hora_envio' => 'datetime',
		'codigo_usuario' => 'int',
		'codigo_chat' => 'int'
	];

	protected $fillable = [
		'fecha_envio',
		'hora_envio',
		'contenido',
		'codigo_usuario',
		'codigo_chat'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'codigo_usuario');
	}

	public function chat_actividade()
	{
		return $this->belongsTo(ChatActividade::class, 'codigo_chat');
	}
}
