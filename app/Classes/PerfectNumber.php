<?php

namespace App\Classes;

class PerfectNumber
{

    public static function isPerfectNumber($number)
    {

        $sum = 0;

        // Traversing through each number
        // In the range [1,N)
        for ($i = 1; $i < $number; $i++) {
            if ($number % $i == 0) {
                $sum = $sum + $i;
            }
        }

        // returns True is sum is equal
        // to the original number.
        return [
            'number' => $number,
            'is_perfect' => $sum == $number
        ];
        
    }
}
