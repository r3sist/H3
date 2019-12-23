<?php
// H3 - Validator - Simple true/false validator
// (c) resist | https://github.com/r3sist/h3

namespace resist\H3;

class Validator
{
    /** May be empty string or contain: a-zA-Z0-9 space , ; . */
    public function isAlphanumericList($value): bool
    {
        if ($value === true || is_object($value)) {
            return false;
        }
        return $value === '' || (bool)preg_match("/^([a-zA-Z0-9 ,;.])+$/i", $value);
    }

    /** May be empty string or contain: a-zA-Z0-9 space .,;<>+()=%^*-/ */
    public function isMath($mathExpression): bool
    {
        return $mathExpression === '' || (bool)preg_match("/([^A-Za-z0-9 .,;<>+()=%^\-\*\/])+/u", $mathExpression);
    }
}