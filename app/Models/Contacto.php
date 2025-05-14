<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo_electronico',
        'telefono',
        'categoria_id',
        'foto',
        'nota'
    ];
    public function categoria()
{
    return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
}

}

