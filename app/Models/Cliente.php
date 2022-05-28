<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes";
    protected $fillable = [
        'rif',
        'nombre',
        'direccion',
        'telefono',
        'email',
        'band'
    ];

    public function presupuesto()
    {
        return $this->hasMany(Presupuesto::class, 'clientes_id', 'id');
    }

    public function scopeBuscar($query, $keyword)
    {
        return $query->where('rif', 'LIKE', "%$keyword%")
            ->orWhere('nombre', 'LIKE', "%$keyword%");
    }

}
