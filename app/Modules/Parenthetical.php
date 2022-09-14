<?php

namespace App\Modules;

class Parenthetical
{
    const MATCH = [
        '(' => ')',
        '{' => '}',
        '[' => ']'
    ];

    /**
     * Checks if all parenthetical characters in the string including nested — (, ), [, ], {, } — are balanced
     * This is balanced: mary (had a [little] lamb)
     * This is unbalanced: mary (had a [little) lamb]
     *
     * @param string $string
     * @return bool
     */
    public static function isBalanced(string $string): bool
    {
        $stack = [];
        for ($i = 0; $i <= strlen($string) - 1 ; $i++) {
            if (self::isOpening($string[$i])) {
                array_push($stack, $string[$i]);
            }

            if (self::isClosing($string[$i])) {
                $currentParenthesis = array_pop($stack);
                if (self::matches($string[$i], $currentParenthesis)) return false;
            }
        }

        return true;
    }

    /**
     * @param $string
     * @return bool
     */
    protected static function isOpening($string): bool
    {
        return in_array($string, array_keys(self::MATCH));
    }

    /**
     * @param $string
     * @return bool
     */
    protected static function isClosing($string): bool
    {
        return in_array($string, array_values(self::MATCH));
    }

    /**
     * @param       $string
     * @param mixed $currentParenthesis
     *
     * @return bool
     */
    public static function matches($string, mixed $currentParenthesis): bool
    {
        return ($string !== self::MATCH[$currentParenthesis]);
    }

}