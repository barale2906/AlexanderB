<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */

    public function  booklist(){
        
        $this->withoutExceptionHandling();

        Book::factory(10)->create();

        $response = $this->get('api/books');

        $response->assertStatus(200);
        
    }

    /** @test */

    public function  bookcreated(){
        
        $this->withoutExceptionHandling();

        $data=[
            'title'=>'Test title',
            'author'=>'Test author',
            'publication'=>'2022-12-09',
            'review'=>'Test review',
            'observations'=>'Test observations'
        ];

        $response = $this->post('api/books',$data);

        $response->assertStatus(201);
        $this->assertCount(1, Book::all());

        $book=Book::first();

        $this->assertEquals($book->title, 'Test title');
        $this->assertEquals($book->author, 'Test author');
        $this->assertEquals($book->review, 'Test review');
        $this->assertEquals($book->observations, 'Test observations');
    }
}
