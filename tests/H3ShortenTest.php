<?php declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

use Tester\Assert;

Tester\Environment::setup();

Assert::true(is_callable("H3::shorten"));

Assert::true(H3::shorten('Lorem ipsum', 2, '') === 'Lo');
Assert::true(H3::shorten('Lorem ipsum', 2) === 'Lo&hellip;');
Assert::true(H3::shorten('Lorem ipsum', 100) === 'Lorem ipsum');

Assert::exception(function () {
    H3::shorten(10, 2);
}, TypeError::class);

Assert::exception(function () {
    H3::shorten(new H3(), 2);
}, TypeError::class);

Assert::exception(function () {
    H3::shorten('Lorem ipsum', 'x');
}, TypeError::class);
