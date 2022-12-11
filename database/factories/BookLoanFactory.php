<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\BookLoan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookLoan>
 */
class BookLoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'loanDate'=>fake()->date('Y-m-d'),
            'scheduledReturnDate'=>fake()->date('Y-m-d'),
            'returnDate'=>fake()->date('Y-m-d'),
            'observations'=>fake()->text(500),
            'status'=>fake()->randomElement([BookLoan::ABIERTO,BookLoan::CERRADO]),

            'user_id'=>User::all()->random()->id,
            'book_id'=>Book::all()->random()->id,
        ];
    }
}