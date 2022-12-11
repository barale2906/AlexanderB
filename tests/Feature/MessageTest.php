<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */

    public function  messageShow(){
        
        $this->withoutExceptionHandling();

        User::factory(5)->create();
        Book::factory(30)->create();
        Message::factory(100)->create();

        $response = $this->get('/api/messages/1');

        $response->assertOk();        
        $response->assertStatus(200);


    } 
    
    /** @test */

    public function  messageList(){
        
        $this->withoutExceptionHandling();

        User::factory(5)->create();
        Book::factory(30)->create();
        Message::factory(100)->create();

        $response = $this->get('/api/messages');

        $response->assertOk();        
        $response->assertStatus(200);

    }

    /** @test */

    public function  messageCreate(){
        
        $this->withoutExceptionHandling();

        User::factory()->create();
        Book::factory()->create();

        $data=[
            'subject'=>'Precio Alquiler',
            'body'=>'¿Cuanto cuesta el alquiler por 3 semanas?',
            'status'=>2,
            'user_id'=>1,
            'book_id'=>1,
        ];

        $response=$this->post('api/messages', $data);

        $response->assertStatus(201);
        $this->assertCount(1, Message::all());

        $message=Message::first();

        $this->assertEquals($message->subject, 'Precio Alquiler');
        $this->assertEquals($message->body, '¿Cuanto cuesta el alquiler por 3 semanas?');

     }

    /** @test */

    public function  messageUpdate(){
        
        $this->withoutExceptionHandling();

        User::factory()->create();
        Book::factory()->create();
        $message = Message::factory()->create();

        $data=[
            'subject'=>'Precio Alquiler ACTUALIZADO',
            'body'=>'¿Cuanto cuesta el alquiler por 3 semanas? ACTUALIZADO',
            'status'=>2,
            'user_id'=>1,
            'book_id'=>1,
        ];

        $response=$this->put('api/messages/'.$message->id,$data);

        $response->assertStatus(200);

        $message=$message->fresh();

        $this->assertEquals($message->subject, 'Precio Alquiler ACTUALIZADO');
        $this->assertEquals($message->body, '¿Cuanto cuesta el alquiler por 3 semanas? ACTUALIZADO');

    }

    /** @test */

    public function  messageDelete(){
        
        $this->withoutExceptionHandling();

        User::factory()->create();
        Book::factory()->create();
        $message = Message::factory()->create();

        $response = $this->delete('api/messages/'.$message->id);

        $response->assertOk();
        $response->assertStatus(200);
    }
}
