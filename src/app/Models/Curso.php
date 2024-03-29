<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'duracion', 'precio', 'dificultad'];

    public function categoria()
    {
        return $this->belongsTo(CategoriaCurso::class, 'categoria_id');
    }
}
