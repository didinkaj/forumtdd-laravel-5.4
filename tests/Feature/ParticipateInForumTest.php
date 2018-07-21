<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();

    }
    /** @test*/
    function unauthenticated_users_may_not_add_replies(){
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread =  factory('App\Thread')->create();

        $reply = factory('App\Reply')->create();

        $this->post( 'threads/1/replies', $reply->toArray());
    }

    /** @test */
    function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->be($user = factory('App\User')->create());

        $reply = factory('App\Reply')->make();

        $this->post($this->thread->path() . '/replies', $reply->toArray());

        $this->get($this->thread->path())
            ->assertSee($reply->body);


    }
}
