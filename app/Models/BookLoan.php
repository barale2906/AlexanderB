<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLoan extends Model
{
    use HasFactory,ApiTrait;

    protected $guarded = [];

    protected $allowIncluded = ['messages', 'messages.user', 'bookloans', 'bookloans.user'];
    protected $allowFilter = ['id', 'loanDate', 'scheduledReturnDate', 'returnDate', 'status'];
    protected $allowSort = ['id', 'loanDate', 'scheduledReturnDate', 'returnDate', 'status'];

    const ABIERTO=1;
    const CERRADO=2;

    //Relación uno a muchos inversa.
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}

