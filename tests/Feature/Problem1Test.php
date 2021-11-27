<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Http\Controllers\ImmutableWeekDay;

class Problem1Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $day1 = new ImmutableWeekDay(ImmutableWeekDay::FRIDAY); 
        $day2 = new ImmutableWeekDay(ImmutableWeekDay::FRIDAY); 
        $day3 = $day1->addDays(2); 

        $this->assertFalse($day1->equals($day3)); 
        $this->assertFalse($day1->isOfValue(ImmutableWeekDay::SUNDAY)); 
        $this->assertFalse($day1->isOfValue(123)); 
        $this->assertTrue($day1->equals($day2)); 
        $this->assertTrue($day3->isOfValue(ImmutableWeekDay::SUNDAY)); 
        $this->expectException(\OutOfRangeException::class);
        new ImmutableWeekDay(123);
    }
}
