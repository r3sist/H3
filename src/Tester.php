<?php declare(strict_types=1);

/**
 * H3/Tester - Fatfree Framework Test helper
 * (c) 2020 resist | https://resist.hu | https://github.com/r3sist/h3
 */

namespace resist\H3;

use Test;

/**
 * Fatfree Framework Test helper
 * @deprecated
 */
class Tester extends Test
{
    public function show(): void
    {
        echo "\nTest results\n".str_repeat('=', 100)."\n";
        foreach ($this->results() as $result) {
            echo str_pad($result['text'].' ', 93);
            if ($result['status']) {
                echo str_pad("\033[32mPASSED\e[0m", 7);
            } else {
                echo str_pad("\033[31mFAILED\e[0m", 7);
                echo "\n\t".$result['source'];
            }
            echo "\n";
        }
        echo str_repeat('-', 100)."\n".($this->passed()?"\033[32mPASSED\e[0m":"\033[31mFAILED\e[0m")."\n";
    }

    public function missing(string $text): void
    {
        echo str_pad($text.' ', 93);
        echo str_pad("\033[31mMISSING\e[0m", 7);
        echo "\n";
    }
}
