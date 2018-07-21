<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReadThreadTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     *
     * @return void
     */
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }
    /** @test */
    public function a_user_can_view_all_threads()
    {

        $this->get($this->thread->path())
        ->assertSee($this->thread->title);
    }
    /** @test */
    public function a_user_can_read_single_thread()
    {


        $this->get($this->thread->path())
            ->assertSee($this->thread->title);

    }
    /** @test */
    public function user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = factory('App\Reply')
            ->create(['thread_id' => $this->thread->id]);

        $this->get('/threads/'.$this->thread->id)
            ->assertSee($reply->body);


    }

}
