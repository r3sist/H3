<?php declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

use Tester\Assert;

Tester\Environment::setup();

Assert::true(is_callable("H3::dump"));
$testArray = ['key' => 100];
ob_start();
H3::dump($testArray);
$testDump = ob_get_contents();
ob_clean();
Assert::contains('<pre>array(1) {', $testDump);
