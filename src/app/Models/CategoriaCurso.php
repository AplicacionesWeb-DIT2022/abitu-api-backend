<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CategoriaCurso extends Model
{
    use HasFactory;
    protected $table = 'categorias_curso';
    protected $fillable = ['nombre'];

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'id');
    }
}
