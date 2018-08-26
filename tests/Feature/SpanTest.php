<?php

namespace Tests\Feature;

use App\Spam;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SpanTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function it_validates_spam()
    {
        $spam = new Spam();
        
        $this->assertFalse($spam->detect('inoccent reply here'));
        
        $this->assertTrue(true);
    }
}
