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

    public function  bookShow(){
        
        $this->withoutExceptionHandling();

        Book::factory(1)->create();

        $response = $this->get('api/books/1');

        $response->assertOk();        
        $response->assertStatus(200);

    }
    
    /** @test */

    public function  bookList(){
        
        $this->withoutExceptionHandling();

        Book::factory(10)->create();

        $response = $this->get('api/books');

        $response->assertStatus(200);
        
    }

    /** @test */

    public function  bookCreated(){
        
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

    /** @test */

    public function  bookUpdated(){
        
        $this->withoutExceptionHandling();

        $book = Book::factory()->create();

        $data=[
            'title'=>'Test title actualizado',
            'author'=>'Test author actualizado',
            'publication'=>'2022-12-11',
            'review'=>'Test review actualizado',
            'observations'=>'Test observations actualizado'
        ];

        $response = $this->put('api/books/'.$book->id,$data);

        $response->assertStatus(200);

        $book = $book->fresh();

        $this->assertEquals($book->title, 'Test title actualizado');
        $this->assertEquals($book->author, 'Test author actualizado');
        $this->assertEquals($book->publication, '2022-12-11');
        $this->assertEquals($book->review, 'Test review actualizado');
        $this->assertEquals($book->observations, 'Test observations actualizado');
    }

    /** @test */

    public function  bookDelete(){
        
        $this->withoutExceptionHandling();

        $book = Book::factory()->create();

        
        $response = $this->delete('api/books/'.$book->id);

        $response->assertOk();
        $response->assertStatus(200);

    }

    
}
