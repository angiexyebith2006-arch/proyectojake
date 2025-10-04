<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
    protected $primaryKey = 'id_actividad';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'motivo',
        'lugar',
        'responsable',
        'fecha',
        'hora',
        'mensaje'
    ];

    protected $casts = [
        'fecha' => 'date:Y-m-d',
    ];

    public function incluye_asistencia()
    {
        return $this->hasMany(IncluyeAsistencium::class, 'id_actividad');
    }

    public function reemplazos()
    {
        return $this->hasMany(Reemplazo::class, 'id_actividad');
    }
}