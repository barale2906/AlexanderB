<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\BookLoan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookLoanTest extends TestCase
{
   use RefreshDatabase;

    /** @test */

    public function  bookLoanShow(){
        
        $this->withoutExceptionHandling();

        User::factory(5)->create();
        Book::factory(30)->create();
        BookLoan::factory(100)->create();

        $response=$this->get('api/bookloans/10');

        $response->assertOk();
        $response->assertStatus(200);
    }

    /** @test */

    public function  bookLoanList(){
        
        $this->withoutExceptionHandling();

        User::factory(5)->create();
        Book::factory(30)->create();
        BookLoan::factory(100)->create();

        $response=$this->get('api/bookloans');

        $response->assertOk();
        $response->assertStatus(200);
    }

     /** @test */

     public function  bookLoanCreate(){
        
        $this->withoutExceptionHandling();

        User::factory()->create();
        Book::factory()->create();

        $data=[
            'loanDate'=>'2022-12-11',
            'scheduledReturnDate'=>'2022-12-18',
            'returnDate'=>'2022-12-15',
            'observations'=>'El usuario reservo el libro y lo entrego a tiempo',
            'status'=>2,
            'user_id'=>1,
            'book_id'=>1,
        ];

        $response=$this->post('api/bookloans', $data);

        $response->assertStatus(201);
        $this->assertCount(1, Book::all());

        $bookLoan=BookLoan::first();

        $this->assertEquals($bookLoan->loanDate, '2022-12-11');
        $this->assertEquals($bookLoan->scheduledReturnDate, '2022-12-18');
        $this->assertEquals($bookLoan->returnDate, '2022-12-15');
        $this->assertEquals($bookLoan->observations, 'El usuario reservo el libro y lo entrego a tiempo');

     }

     /** @test */

     public function  bookLoanUpdate(){
        
        $this->withoutExceptionHandling();

        User::factory()->create();
        Book::factory()->create();
        $bookloan=BookLoan::factory()->create();

        $data=[
            'loanDate'=>'2022-12-09',
            'scheduledReturnDate'=>'2022-12-18',
            'returnDate'=>null,
            'observations'=>'El usuario reservo el libro y lo entrego a tiempo ACTUALIZADO',
            'status'=>1,
            'user_id'=>1,
            'book_id'=>1,
        ];

        $response = $this->put('api/bookloans/'.$bookloan->id,$data);

        $response->assertStatus(200);

        $bookloan->fresh();

        $this->assertEquals($bookloan->loanDate, '2022-12-09');
        $this->assertEquals($bookloan->scheduledReturnDate, '2022-12-18');
        $this->assertEquals($bookloan->returnDate, null);
        $this->assertEquals($bookloan->observations, 'El usuario reservo el libro y lo entrego a tiempo  ACTUALIZADO');


     }

     /** @test */

     public function  bookLoanDelete(){
        
        $this->withoutExceptionHandling();

        User::factory()->create();
        Book::factory()->create();
        $bookloan=BookLoan::factory()->create();

        $response=$this->delete('api/bookloans/'.$bookloan);

        $response->assertOk();
        $response->assertStatus(200);
    }
}
