<?php

namespace Tests\Feature;

use App\Inspections\Spam;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SpamTest extends TestCase
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
        
        $this->expectException('Exception');
    
        $spam->detect('yahoo customer support');
    }
    
    /** @test */
    public function it_checks_for_any_key_being_held_down()
    {
        $spam = new Spam();
    
        $this->expectException('Exception');
    
        $spam->detect('Hellow World aaaaaa');
    
    }
}
