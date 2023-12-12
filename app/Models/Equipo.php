<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipo';
    protected $fillable = [
        'tipo_equipo',
        'marca_equipo',
        'modelo_equipo',
        'fecha_recepcion',
        'fecha_entrega',
        'fecha_retiro',
        'equipo_retirado',
        'id_cliente',
        'multa',
    ];

    protected $dates = [
        'fecha_recepcion',
        'fecha_entrega',
        'fecha_retiro',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
