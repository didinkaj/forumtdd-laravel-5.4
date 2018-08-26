<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubscribeToThreadTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    
    /** @test */
    public function a_user_can_subscribe_to_thread()
    {
        $this->signIn();
        
        $thread = create('App\Thread');
        
        $this->post($thread->path().'/subscriptions');
        
        $thread->addReply([
            'user_id' => auth()->id(),
            'body' => 'Some reply here'
        ]);
        
       // auth()->user()->notifications;
        
        $this->assertCount(1,$thread->subscriptions);
        
      
    }
    
    public function a_user_can_unsubscribe_to_threads()
    {
        $this->signIn();
        
        $thread = create('App\Thread');
        
        $thread->subscribe();
        
        $this->delete($thread->path() . '/subscriptions');
        
        $this->assertCount(0, $thread->subscriptions);
    
    }
}
