<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'celular',
        'direccion',
    ];

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_cliente');
    }

    
}
