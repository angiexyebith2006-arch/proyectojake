<?php

/**
 * Created by Reliese Model.
 */


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cumpleano extends Model
{
    //  importante: Laravel buscaría "cumpleanos" automáticamente,
    // pero lo dejamos explícito para evitar errores
    protected $table = 'cumpleanos';

    protected $primaryKey = 'id_cumpleanos';
    public $incrementing = true;
    public $timestamps = false;
    protected $keyType = 'int';

    protected $casts = [
        'id_cumpleanos' => 'int',
        'fecha_nacimiento' => 'date',
        'codigo_usuario' => 'int'
    ];

    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'codigo_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'codigo_usuario');
    }
}


