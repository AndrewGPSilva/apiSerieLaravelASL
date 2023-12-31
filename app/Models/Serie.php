<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'capa', 'genero', 'sinopse', 'ano', 'temporadas', 'episodios', 'classificacao'];
}
