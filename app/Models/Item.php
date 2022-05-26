<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "items";
    protected $fillable = [
        'presupuesto_id',
        'cantidad',
        'item',
        'descripcion',
        'precio',
        'subtotal',
        'band'
    ];

    public function presupuesto()
    {
        return $this->belongsTo(Presupuesto::class, 'presupuestos_id', 'id');
    }


}
