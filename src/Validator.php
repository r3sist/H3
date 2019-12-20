<?php
// H3 - Validator - Simple true/false validator
// (c) resist | https://github.com/r3sist/h3

namespace resist\H3;

class Validator
{
    /** May contain: a-zA-Z0-9 space , ; . */
    public function isAlphanumericList(string $value): bool
    {
        if ((bool)preg_match("/^([a-zA-Z0-9 ,;.])+$/i", $value)) {
            return true;
        }
        return false;
    }
}