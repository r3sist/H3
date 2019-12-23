<?php

require __DIR__ . '/../vendor/autoload.php';

use Tester\Assert;

Tester\Environment::setup();

$v = new \resist\H3\Validator();

// TEST ALPHANUMERIC-LIST

Assert::type('bool', $v->isAlphanumericList(new \H3()));
Assert::type('bool', $v->isAlphanumericList(0));
Assert::type('bool', $v->isAlphanumericList(1));
Assert::type('bool', $v->isAlphanumericList(null));
Assert::type('bool', $v->isAlphanumericList('string'));
Assert::type('bool', $v->isAlphanumericList(true));

Assert::true($v->isAlphanumericList(''));
Assert::true($v->isAlphanumericList(' '));
Assert::true($v->isAlphanumericList('0 1 2 d f'));
Assert::true($v->isAlphanumericList('0, 1 .2; d f.'));
Assert::true($v->isAlphanumericList('abc023'));
Assert::true($v->isAlphanumericList('abc'));
Assert::true($v->isAlphanumericList(100));
Assert::true($v->isAlphanumericList(0.1));
Assert::true($v->isAlphanumericList(10.0));
Assert::true($v->isAlphanumericList(1));
Assert::true($v->isAlphanumericList(0));

Assert::false($v->isAlphanumericList('_'));
Assert::false($v->isAlphanumericList('a_'));
Assert::false($v->isAlphanumericList('a_2, 3'));
Assert::false($v->isAlphanumericList('$this'));
Assert::false($v->isAlphanumericList('<script>'));
Assert::false($v->isAlphanumericList(null));
Assert::false($v->isAlphanumericList(true));
Assert::false($v->isAlphanumericList(false));
Assert::false($v->isAlphanumericList(new \H3()));



