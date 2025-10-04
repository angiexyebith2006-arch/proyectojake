<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $id_rol
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	protected $primaryKey = 'id_rol';
	public $incrementing = true;
	public $timestamps = false;

	protected $casts = [
		'id_rol' => 'int',
	];

	protected $fillable = [
		'nombre',
		'descripcion',
	];

	public function usuario()
	{
		return $this->hasMany(Usuario::class, 'rol', 'id_rol');
	}
}
