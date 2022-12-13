<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        Storage::fake('avatars');
        $file=UploadedFile::fake()->image('avatar.jpg');
        $url=Storage::url($file);

        return [
            'route'=>$url,
            'message_id'=>Message::all()->random()->id,
        ];
    }
}
