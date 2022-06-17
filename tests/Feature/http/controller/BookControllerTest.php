<?php

namespace Tests\Feature\http\controller;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
   use RefreshDatabase;
    public function test_example()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/book');

        $response->assertStatus(200);
    }

    public function test_user_can_create_book()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        $author = Author::factory()->create();

        $response= $this->post('/book',[
            'name'=>'Book 1',
            'price'=>250,
            'copied_sold'=>0,
            'author_id'=>$author->id
        ]);
        $response->assertStatus(302);
    }
}
