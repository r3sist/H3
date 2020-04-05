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
        if ($mathExpression === true || is_object($mathExpression)) {
            return false;
        }
        return $mathExpression === '' || (bool)preg_match("/^([a-zA-Z0-9 .,;<>+()=%^\-*\/])+$/i", $mathExpression);
    }

    public function isJson(string $json): bool
    {
        json_decode($json);
        return (json_last_error() === JSON_ERROR_NONE);
    }

    public function isIMDbId(string $id): bool
    {
        if (strpos($id, 'tt') === 0) {
            $remained = explode('tt', $id);
            if (count($remained) === 2 && is_numeric($remained[1])) {
                return true;
            }
        }
        return false;
    }
}