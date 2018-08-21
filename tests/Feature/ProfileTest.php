<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileTest extends TestCase
{
    use  DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test*/
    public function a_user_has_a_profile()
    {
        $user = create('App\User');
        
        $this->get("/profiles/{$user->name}")
            ->assertSee($user->name);
    }
    
    /** @test */
    function profiles_display_all_threads_created_by_the_associated_user()
    {
        $this->signIn();
        
        $thread = create('App\Thread', ['user_id' => auth()->id()]);
        
        $this->get("/profiles/".auth()->user()->name)
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
