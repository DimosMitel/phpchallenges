<?php

/*
 * PHP coding challenges.
 * Challenge Name: Character Frequency
 * Myteletsis Dimos <dimos.mitel@gmail.com>
 * This file works with tests/CharacterFrequency.php for getting the appropriate data
 */

namespace Challenge;

/**
 * Class CharacterFrequency
 */
class CharacterFrequency
{
    //static properties for easy access
    public static $letters = '';
    public static $alphas = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
    public static $arr = [];

    /**   
    * @return bool
    */
    public static function findCharacterFrequency() : bool
    {
        //26 is the number of english alphabet
        for ( $i = 0; $i < 26; $i++ )
        {
            //we can use if we want strtolower() function to $letters variable to ensure that the data is in lowercase
            $value = substr_count( self::$letters, self::$alphas[$i] );

            if( $value > 0 ) 
            {
                self::$arr[self::$alphas[$i]] = $value;
            }
        }

        //if all the letters appear with the same frequency return true, otherwise false
        return ( count( array_unique( self::$arr ) ) == 1 ) ? true : false;
    }    
}