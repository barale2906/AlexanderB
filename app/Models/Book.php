<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    const DISPONIBLE = 1;
    const RESERVADO = 2;
    const PRESTADO = 3;

    
}
