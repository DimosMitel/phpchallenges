<?php

/*
 * PHP coding challenges.
 * Challenge Name: FizBuz
 * Myteletsis Dimos <dimos.mitel@gmail.com>
 * This file is important for doing some test cases for src/FizBuz.php file
 */

use Challenge\FizBuz;
use PHPUnit\Framework\TestCase; 

class FizBuzTest extends TestCase
{

    //Given Data: $n = 15, $x = 3, $y = 2
    protected $arrSampleOne = [1 => 1, 'buz', 'fiz', 'buz', 5, 'fizbuz', 7, 'buz', 'fiz', 'buz', 11, 'fizbuz', 13, 'buz', 'fiz'];

    /**
    * Other test case we can try:
    * Given Data: $n = 15, $x = 4, $y = 3
    * protected $arrSampleTwo = [1 => 1, 'buz', 'fiz', 'buz', 5, 'fizbuz', 7, 'buz', 'fiz', 'buz'];
    */

    public function testFizBuz()
    {   
        FizBuz::$n = 15;
        FizBuz::$x = 3;
        FizBuz::$y = 2;

        $fizbuzResults = FizBuz::findFizBuz();

        //Variable data length: 1 to 1000000
        if ( FizBuz::$n > 0 && FizBuz::$n <= 1000000 )
        {

            /**
            * Assertion 1:
            * You need this line of code to start testing: "php vendor/bin/phpunit tests/FizBuzTest.php"
            * Result: OK (1 test, 1 assertion)
            */ 
            $this->assertEquals( $this->arrSampleOne, $fizbuzResults );

            /**
            * Assertion 2:
            * You need this line of code to start testing: "php vendor/bin/phpunit tests/FizBuzTest.php"
            * Result: FAILURES! Tests: 1, Assertions: 1, Failures: 1
            */ 
            //$this->assertEquals( $this->arrSampleTwo, $fizbuzResults );

        }
    }
}