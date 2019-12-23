<?php declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

use Tester\Assert;

Tester\Environment::setup();

Assert::true(is_callable("H3::shorten"));
