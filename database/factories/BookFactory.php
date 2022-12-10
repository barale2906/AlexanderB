<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->sentence(),
            'author'=>fake()->sentence(),
            'publication'=>fake()->date('Y-m-d'),
            'review'=>fake()->text(500),
            'observations'=>fake()->text(100),
            'status'=>fake()->randomElement([Book::DISPONIBLE, Book::RESERVADO, Book::PRESTADO]),
        ];
    }
}
