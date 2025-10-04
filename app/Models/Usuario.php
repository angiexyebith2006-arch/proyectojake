<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_numero_documento
 * @property string $nombre
 * @property string $apellido
 * @property string $tipo_documento
 * @property string $correo_electronico
 * @property Carbon $fecha_nacimiento
 * @property string $bautizo
 * @property string $bautizado_espiritu
 * @property int $telefono
 * @property string $genero
 * @property string $contrasena
 * @property int $rol
 * @property int $cargo
 * 
 * @property Collection|Cargo[] $cargo
 * @property Collection|Cumpleano[] $cumpleanos
 * @property Incluye|null $incluye
 * @property Collection|IncluyeAsistencium[] $incluye_asistencia
 * @property Collection|Mensaje[] $mensajes
 * @property Collection|Reemplazo[] $reemplazos
 * @property Collection|Rol[] $rol
 * @property Collection|Transaccion[] $transaccions
 * @property Collection|Visitum[] $visita
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'id_numero_documento';
	public $incrementing = false;
	public $timestamps = false;

    protected $casts = [
        'id_numero_documento' => 'int',
        'fecha_nacimiento'    => 'date',
        'telefono'            => 'int', // bigint → mejor string para no perder precisión
        'rol'                 => 'int',
        'cargo'               => 'int',
    ];
    protected $fillable = [
        'id_numero_documento',
        'tipo_documento',
        'nombre',
        'apellido',
        'correo_electronico',
        'fecha_nacimiento',
        'bautizo',
        'bautizado_espiritu',
        'telefono',
        'genero',
        'contrasena',
        'rol',
        'cargo'
    ];
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo', 'id_cargo');
    }


	public function cumpleanos()
	{
		return $this->hasMany(Cumpleano::class, 'codigo_usuario');
	}

	public function incluye()
	{
		return $this->hasOne(Incluye::class, 'codigo_usuario');
	}

	public function incluye_asistencia()
	{
		return $this->hasMany(IncluyeAsistencium::class, 'id_numero_documento');
	}

	public function mensajes()
	{
		return $this->hasMany(Mensaje::class, 'codigo_usuario');
	}

	public function reemplazos()
	{
		return $this->hasMany(Reemplazo::class, 'id_usuario_suplente');
	}

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol', 'id_rol');
    }

	public function transaccions()
	{
		return $this->hasMany(Transaccion::class, 'codigo_usuario');
	}

	public function visita()
	{
		return $this->hasMany(Visitum::class, 'codigo_usuario');
	}
}

