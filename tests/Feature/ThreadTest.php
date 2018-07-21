<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     *
     * @return void
     */
    use DatabaseMigrations;

    public function a_user_can_browse_threads()
    {
        $thred = factory('App\Thread')->create();
        $response = $this->get('/threads');
        $response->assertSee($thred->title);
    }
}
