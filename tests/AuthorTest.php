<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorTest extends TestCase
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
     * test for fetching all authors
     */
    public function testGetAllAuthors() {
        $this->get('/api/authors')
            ->seeJson(['id' => 2,]);
    }

    /**
     * test for getting an author information from an id
     */
    public function testGetAuthor() {
        $this->get('/api/author/3')
            ->seeJson(['id' => 3,]);
    }

    /**
     * test for updating author's first name
     */
    public function testUpdateAuthor() {
        $this->put('/api/author/3',
            ['first_name' => 'Karim'] )
            ->seeJson(['first_name' => 'Karim']);
    }

    /**
     * deleting an invalid author
     */
    public function testDeleteFail() {
        $this->delete('/api/author/100')
            ->seeJson(['message' => 'invalid request']);
    }

    /**
     * test for adding new author
     */

    public function testAddNewAuthor() {
        $this->post('/api/author',
            [
                'first_name' => 'John',
                'last_name' => 'Doe'
            ])
            ->seeJson(['first_name' => 'John']);
    }
}
