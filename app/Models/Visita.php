<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Visita
 * 
 * @property int $id_visita
 * @property string|null $motivo
 * @property Carbon $fecha
 * @property string $responsable
 * @property Carbon $hora
 * @property string|null $tipo
 * @property int $codigo_usuario
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Visita extends Model
{
	protected $table = 'visita';
    protected $primaryKey = 'id_visita';
    public $incrementing  = true;
    public $timestamps = false; 

	protected $casts = [
		'id_visita' => 'int',
		'fecha' => 'datetime',
		'hora' => 'datetime',
		'codigo_usuario' => 'int'
	];

	protected $fillable = [
		'motivo',
		'fecha',
		'responsable',
		'hora',
		'tipo',
		'codigo_usuario'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'codigo_usuario', 'id_numero_documento');
	}
}