<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PublisherTest extends TestCase
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
     * Test for getting all publishers
     */
    public function testGetAllPublishers() {
        $this->get('/api/publishers')
            ->seeJson(['id' => 2,]);
    }

    /**
     * Test for getting publisher with an id
     */
    public function testGetPublisher() {
        $this->get('/api/publisher/3')
            ->seeJson(['id' => 3,]);
    }

    /**
     * test for updating publisher name with an id
     */
    public function testUpdatePublisher() {
        $this->put('/api/publisher/3',
            ['publisher_name' => 'A Publishers'] )
            ->seeJson(['publisher_name' => 'A Publishers']);
    }

    /**
     * test for deleting a publisher which doesn't exist
     */

    public function testDeleteFail() {
        $this->delete('/api/publisher/100')
            ->seeJson(['message' => 'invalid request']);
    }

    /**
     * test for adding new publisher
     */
    public function testAddNewPublisher() {
        $this->post('/api/publisher',
            [
                'publisher_name' => 'New Publisher'
            ])
            ->seeJson(['publisher_name' => 'New Publisher']);
    }
}
