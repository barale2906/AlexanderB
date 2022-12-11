<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subject'=>fake()->sentence(),
            'body'=>fake()->text(200),
            'status'=>fake()->randomElement([Message::ABIERTO, Message::CERRADO]),

            'user_id'=>User::all()->random()->id,
            'book_id'=>Book::all()->random()->id,
        ];
    }
}
