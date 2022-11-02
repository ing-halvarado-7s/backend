<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookAPITest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    function can_get_all_books(){
        $books = Book::factory(4)->cretae();

        $response = $this->getJson(route('books.index'));

        $response->assertJsonFragment([
            'title' => $books[0]->title
        ])->assertJsonFragment([
            'title' => $books[1]->title
        ]);
    }

    /** @test */
    function can_create_books(){

    }
}
