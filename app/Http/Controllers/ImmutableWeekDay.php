<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImmutableWeekDay extends Controller
{
    const SUNDAY = 0; 
    const MONDAY = 1; 
    const TUESDAY = 2; 
    const WEDNESDAY = 3; 
    const THURSDAY = 4; 
    const FRIDAY = 5; 
    const SATURDAY = 6; 

    /** 
    * @param int $value 
    * @throws \OutOfRangeException 
    */ 
    public function __construct(int $value) 
    {
        $this->val = $value;
        if($this->val > 6) {
            throw new \OutOfRangeException();
        }
    } 
    public function addDays(int $value): ImmutableWeekDay {
        if(($this->val + $value) > 11) {
            throw new \OutOfRangeException();
        }
        $addedDays = (($this->val + $value) % 6) - 1;
        return new ImmutableWeekDay($addedDays);
    } 
    public function equals(ImmutableWeekDay $day): bool { 
        return $this->val === $day->val;
    } 
    public function isOfValue(int $value): bool 
    { 
        return $this->val === $value;
    } 
}
