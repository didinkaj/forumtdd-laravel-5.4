<?php

namespace Tests\Feature;

use Illuminate\Notifications\DatabaseNotification;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NotificationTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function a_notification_is_prepared_when_a_subscribed_thread_receives_a_new_reply_that_is_not_by_the_current_user()
    {
        $this->signIn();
        
        $thread = create('App\Thread')->subscribe();
        
        $this->assertCount(0, auth()->user()->notifications);

        $thread->addReply([
            'user_id' => auth()->id(),
            'body' => 'Some reply here'
        ]);
        
        $this->assertCount(0, auth()->user()->fresh()->notifications);
    
        $thread->addReply([
            'user_id' => create('App\User')->id,
            'body' => 'Some reply here'
        ]);
    
        $this->assertCount(1, auth()->user()->fresh()->notifications);
    
        //   $this->assertCount(1,$thread->subscriptions);
    }
    
    /** @test */
    function a_user_can_fetch_their_unread_notifications()
    {
        $this->signIn();
    
        $thread = create('App\Thread')->subscribe();
    
        $thread->addReply([
            'user_id' => create('App\User')->id,
            'body' => 'some reply here'
        ]);
    
        $user = auth()->user();
    
        $response = $this->getJson('/profiles/'.$user->name .'/notifications')->json();
    
        $this->assertCount(1, $response);
    }
    
    /** @test*/
    function a_user_can_mark_a_notification_as_read()
    {
        $this->signIn();
    
        $thread = create('App\Thread')->subscribe();
    
        $thread->addReply([
            'user_id' => create('App\User')->id,
            'body' => 'some reply here'
        ]);
    
        $user = auth()->user();
        
        $this->assertCount(1, $user->unreadNotifications);
    }
    
}
