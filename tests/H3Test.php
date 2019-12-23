<?php declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

use Tester\Assert;

Tester\Environment::setup();

// TEST RENDER

Assert::true(is_callable("H3::render"));

// TEST GEN

Assert::type('string', H3::gen(10));
Assert::type('string', H3::gen(0));
Assert::true(strlen(H3::gen(10)) === 10);
Assert::true(H3::gen(100) != H3::gen(100));
Assert::exception(function () {
    H3::gen('string was given');
}, TypeError::class);
Assert::exception(function () {
    H3::gen(10.1);
}, TypeError::class);




