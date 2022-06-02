<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camada extends Model
{
    use HasFactory;
    protected $table = 'camadas';
    protected $fillable = ['fecha_de_inicio','fecha_de_fin'];
}
