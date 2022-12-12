<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Book extends Model
{
    use HasFactory,ApiTrait;

    protected $guarded = [];

    protected $allowIncluded = ['messages', 'messages.user', 'bookloans', 'bookloans.user'];
    protected $allowFilter = ['id', 'title', 'author', 'publication', 'status'];
    protected $allowSort = ['id', 'title', 'author', 'publication', 'status'];

    const DISPONIBLE = 1;
    const RESERVADO = 2;
    const PRESTADO = 3;

    // Relación uno a muchos
    public function bookloans(){
        return $this->hasMany(BookLoan::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    
}
