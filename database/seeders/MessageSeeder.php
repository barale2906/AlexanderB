<?php

namespace Database\Seeders;

use App\Models\Annexe;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::factory(10)->create()->each(function(Message $message){
            Annexe::factory(2)->create([
                'message_id'=>$message->id,
            ]);
        });
    }
}
