<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChatActividade
 * 
 * @property int $id_chat
 * 
 * @property Collection|Mensaje[] $mensajes
 *
 * @package App\Models
 */
class ChatActividade extends Model
{
	protected $table = 'chat_actividades';
	protected $primaryKey = 'id_chat';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_chat' => 'int'
	];

	public function mensajes()
	{
		return $this->hasMany(Mensaje::class, 'codigo_chat');
	}
}
