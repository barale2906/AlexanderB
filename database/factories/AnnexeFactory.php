<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annexe>
 */
class AnnexeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return[
            'route'=>'anexos/'.$this->faker->image('public/storage/anexos',640,480,null,false),
        ];
    }
}
