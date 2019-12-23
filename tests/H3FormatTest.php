<?php declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

use Tester\Assert;

Tester\Environment::setup();

// TEST N0
Assert::true(is_callable("H3::n0"));

Assert::type('int', H3::n0(0));
Assert::type('int', H3::n0(1));
Assert::type('int', H3::n0(-1));
Assert::type('int', H3::n0(10.1));
Assert::type('int', H3::n0(10.51));

Assert::true(H3::n0(0) === 0);
Assert::true(H3::n0(1) === 1);
Assert::true(H3::n0(-1) === -1);
Assert::true(H3::n0(10.1) === 10);
Assert::true(H3::n0(10.51) === 11);
Assert::true(H3::n0((int)'10') === 10);

Assert::exception(function () {
    H3::n0('10');
}, TypeError::class);

Assert::exception(function () {
    H3::n0(true);
}, TypeError::class);

Assert::exception(function () {
    H3::n0(false);
}, TypeError::class);

// TEST N1
Assert::true(is_callable("H3::n1"));

Assert::type('float', H3::n1(0));
Assert::type('float', H3::n1(1));
Assert::type('float', H3::n1(-1));
Assert::type('float', H3::n1(10.1));
Assert::type('float', H3::n1(10.51));

Assert::true(H3::n1(0) === 0.0);
Assert::true(H3::n1(1) === 1.0);
Assert::true(H3::n1(-1) === -1.0);
Assert::true(H3::n1(10.1) === 10.1);
Assert::true(H3::n1(10.51) === 10.5);
Assert::true(H3::n1((float)'10.11') === 10.1);

Assert::exception(function () {
    H3::n1('10.11');
}, TypeError::class);

// TEST N2, N3, N4
Assert::true(is_callable("H3::n2"));
Assert::true(is_callable("H3::n3"));
Assert::true(is_callable("H3::n4"));
