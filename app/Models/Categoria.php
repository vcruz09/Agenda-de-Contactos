<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'categoria_id');
    }
}
