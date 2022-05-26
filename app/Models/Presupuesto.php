<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $table = "presupuesto";
    protected $fillable = [
        'numero',
        'emision',
        'expiracion',
        'empresas_id',
        'clientes_id',
        'subtotal',
        'iva',
        'total',
        'notas',
        'users_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresas_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'presupuestos_id', 'id');
    }

}
