<?php

/*
 * PHP coding challenges.
 * Challenge Name: Date Comparison
 * Myteletsis Dimos <dimos.mitel@gmail.com>
 * This file is important for doing some test cases for src/DateComparison.php file
 */

use Challenge\DateComparison;
use PHPUnit\Framework\TestCase; 

class DateComparisonTest extends TestCase
{  
    public function testDateComparison()
    {
        //DateTime Configuration
        $userTimezone = new DateTimeZone('Europe/Athens');

        //First date for comparison
        $myDateTimeOne = new DateTime('2021-04-31 13:14:12', $userTimezone);
        $myDateTimeOne->format( 'Y-m-d H:i:s' );

        //Second date for comparison
        $myDateTimeTwo = new DateTime('2020-05-31 13:14:12', $userTimezone);
        $myDateTimeTwo->format( 'Y-m-d H:i:S' );
        
        //Take only the date part
        $dateStringOne = $myDateTimeOne->format( 'Y-m-d' );
        $dateStringTwo = $myDateTimeTwo->format( 'Y-m-d' );

        //Separate in different variables the year, month and day for use in checkdate()
        list( $yearOne, $monthOne, $dayOne ) = explode( '-', $dateStringOne ); //First Date
        list( $yearTwo, $monthTwo, $dayTwo ) = explode( '-', $dateStringTwo ); //Second Date 

        //Validate our dates with php checkdate()
        if ( checkdate( $monthOne, $dayOne, $yearOne ) && checkdate( $monthTwo, $dayTwo, $yearTwo ) )
        {
            /**
            * Returning values:
            * 1: myDateTimeOne > myDateTimeTwo  
            * 0: myDateTimeOne == myDateTimeTwo 
            * -1: myDateTimeOne < myDateTimeTwo
            */

            /**
            * Assertion 1:
            * You need this line of code to start testing: "php vendor/bin/phpunit tests/DateComparisonTest.php"
            * Result: OK (1 test, 1 assertion)
            */ 
            $this->assertEquals( 1, DateComparison::Compare( $myDateTimeOne, $myDateTimeTwo ) );

            /**
            * Assertion 2:
            * You need this line of code to start testing: "php vendor/bin/phpunit tests/DateComparisonTest.php"
            * Result: FAILURES! Tests: 1, Assertions: 1, Failures: 1
            */ 
            //$this->assertEquals( 0, DateComparison::Compare( $myDateTimeOne, $myDateTimeTwo ) );
        }
    }
}