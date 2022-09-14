<?php

namespace App\Modules;

class NestedArrayHelper
{
    /**
     * A function that processes an input array of integers multiplying each element with a given integer factor
     *
     * @param array|int $input  an incoming array of numbers
     * @param int       $factor an integer multiplier
     * @return array|int
     */
    public static function product(array|int $input, int $factor): array|int
    {
        if (!is_array($input)) return $input * $factor;
        $processed = [];
        foreach ($input as $key => $value) {
            $processed[$key] = self::product($value, $factor);
        }

        return $processed;
    }
}