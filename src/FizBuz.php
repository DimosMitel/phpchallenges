<?php

/*
 * PHP coding challenges.
 * Challenge Name: FizBuz
 * Myteletsis Dimos <dimos.mitel@gmail.com>
 * This file works with tests/FizBuzTest.php for getting the appropriate data
 */

namespace Challenge;

/**
 * Class FizBuz
 */
class FizBuz
{
    //static properties for easy access
    public static $n = null;
    public static $x = null;
    public static $y = null;
    public static $arr = [];

    /**   
    * @return array
    */
    public static function findFizBuz() : array
    {
        for ( $i = 1; $i <= self::$n; $i++ )
        {

           //Multiple ternary operator
           self::$arr[$i] = ( $i % self::$x === 0 && $i % self::$y === 0 ) ? "fizbuz" 
           : ( ( $i % self::$x === 0 ) ? "fiz" 
           : ( ( $i % self::$y === 0 ) ? "buz" 
           : $i ) );

        }
        return self::$arr;
    }
}