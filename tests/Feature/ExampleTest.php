<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase; 
    /** @test */
    public function test_the_application_returns_a_successful_response()
    {
        $this->withoutExceptionHandling();

        User::factory(10)->create();
        /*
        $response = $this->get('/');

        $response->assertStatus(200);*/
    }
}
