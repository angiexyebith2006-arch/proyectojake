<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cargo
 * 
 * @property int $id_cargo
 * @property string $nombre
 * @property string $descripcion
 * @property int $codigo_usuario
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Cargo extends Model
{
	protected $table = 'cargo';
	protected $primaryKey = 'id_cargo';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'id_cargo' => 'int',
	];

	protected $fillable = [
		'nombre',
		'descripcion',
	];

	public function usuario()
	{
		return $this->hasMany(Usuario::class, 'codigo_usuario');
	}
}
