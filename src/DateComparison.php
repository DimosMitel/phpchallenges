<?php

/*
 * PHP coding challenges.
 * Challenge Name: Date Comparison
 * Myteletsis Dimos <dimos.mitel@gmail.com>
 * This file works with tests/DateComparisonTest.php for getting the appropriate data
 */

namespace Challenge;

/**
 * Class DateComparison
 */
class DateComparison
{
    /** 
    * Use of spaceship operator and return integer values (0, -1, 1) based on comparison result
    * @return int
    */
    public static function Compare( \DateTime $dateTimeOne, \DateTime $dateTimeTwo ) : int
    {   

        return $dateTimeOne <=> $dateTimeTwo;
        
    }    
}