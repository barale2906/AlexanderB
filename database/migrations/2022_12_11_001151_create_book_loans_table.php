<?php

use App\Models\Book;
use App\Models\BookLoan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_loans', function (Blueprint $table) {
            $table->id();

            $table->date('loanDate');
            $table->date('scheduledReturnDate')->nullable();
            $table->date('returnDate')->nullable();
            $table->longText('observations')->nullable();
            $table->enum('status', [BookLoan::ABIERTO, BookLoan::CERRADO])->default(BookLoan::ABIERTO);

            $table->foreignId('user_id')->constrained();
            $table->foreignId('book_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_loans');
    }
};
