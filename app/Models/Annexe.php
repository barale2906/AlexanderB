<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annexe extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Relación uno a muchos inversa.
    public function message(){
        return $this->belongsTo(Message::class);
    }
}
