<?php

/*
 * PHP coding challenges.
 * Challenge Name: Character Frequency
 * Myteletsis Dimos <dimos.mitel@gmail.com>
 * This file is important for doing some test cases for src/CharacterFrequency.php file
 */

use Challenge\CharacterFrequency;
use PHPUnit\Framework\TestCase; 

class CharacterFrequencyTest extends TestCase
{
    public function testCharacterFrequency()
    {   

        //give the $letters static variable of file src/CharacterFrequency.php the appropriate data
        CharacterFrequency::$letters = 'aaabbbcccddd';

       /**
        * Other data we can use for test cases:
        * CharacterFrequency::$letters = 'aabbcdcdabcda';
        * CharacterFrequency::$letters = 'abcabcdefg';
        * CharacterFrequency::$letters = 'aabbcdcdabc';
        */

        $characterFrequencyResults = CharacterFrequency::findCharacterFrequency();
        
        //Variable data length: 2 to 1000
        if ( strlen( CharacterFrequency::$letters ) > 1 && strlen( CharacterFrequency::$letters ) < 1000 )
        {
            /**
            * Assertion 1:
            * You need this line of code to start testing: "php vendor/bin/phpunit tests/CharacterFrequencyTest.php"
            * Result: OK (1 test, 1 assertion)
            */ 
            $this->assertEquals( true, $characterFrequencyResults );

            /**
            * Assertion 2:
            * You need this line of code to start testing: "php vendor/bin/phpunit tests/CharacterFrequencyTest.php"
            * Result: FAILURES! Tests: 1, Assertions: 1, Failures: 1
            */ 
            //$this->assertEquals( false, $characterFrequencyResults );
        }
    }
}