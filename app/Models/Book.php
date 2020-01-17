<?php

namespace App\Models;
use App\Utils\FullSearch;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use FullSearch;

    protected $searchable = [
        'nombre', 'idioma', 'descripcion'
    ];

    protected $fillable = [
        'nombre', 'idioma', 'descripcion', 'autor'
    ];
}
