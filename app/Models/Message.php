<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    const ABIERTO=1;
    const CERRADO=2;

     //Relación uno a muchos inversa.
     public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }

    // Relación uno a muchos
    public function annexes(){
        return $this->hasMany(Annexe::class);
    }
}
