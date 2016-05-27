<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * test for fetching all books
     */

    public function testGetAllBooks() {
        $this->get('/api/books')
            ->seeJson(['id' => 2,]);
    }

    /**
     * test for getting a book from an id
     */
    public function testGetBook() {
        $this->get('/api/book/3')
            ->seeJson(['id' => 3,]);
    }

    /**
     * updating a book name with an id
     */
    public function testUpdateBook() {
        $this->put('/api/book/3',
            ['name' => 'Updated Book'] )
            ->seeJson(['name' => 'Updated Book']);
    }

    /**
     * test for deleting a book which doesn't exist
     */

    public function testDeleteFail() {
        $this->delete('/api/book/100')
            ->seeJson(['message' => 'invalid request']);
    }

    /**
     * test for adding a new book
     */
    public function testAddNewBook() {
        $this->post('/api/book',
            [
                'name' => 'New Book',
                'publish_date' => '2013-03-10',
                'edition' => 2,
                'isbn_10' => '1234567890',
                'isbn_13' => '1234567890123',
                'publisher_id' => 3,
                'author_id' => 10
            ])
            ->seeJson(['name' => 'New Book']);
    }
}
