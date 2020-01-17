<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = ['nombre', 'nacionalidad', 'fecha_nacimiento'];
}
