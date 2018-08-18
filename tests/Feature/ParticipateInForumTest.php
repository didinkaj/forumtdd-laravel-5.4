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
        
        $this->thread = create('App\Thread');
        
    }
    
    /** @test */
    function unauthenticated_users_may_not_add_replies()
    {
        $this->withExceptionHandling()
            ->post('threads/some-channel/1/replies', [])
            ->assertRedirect('/login');
    }
    
    /** @test */
    function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->signIn();
        
        $thread = create('App\Thread');
        
        $reply = make('App\Reply');
        
        $this->post($thread->path() . '/replies', $reply->toArray());
        
        $this->assertDatabaseHas('replies', ['body' => $reply->body]);
        
    }
    
    /** @test */
    function a_reply_requires_a_body()
    {
        $this->withExceptionHandling()->signIn();
        
        $thread = create('App\Thread');
        
        $reply = make('App\Reply', ['body' => null]);
        
        $this->post($thread->path() . '/replies', $reply->toArray())
            ->assertSessionHasErrors('body');
    }
}
