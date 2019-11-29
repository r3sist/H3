<?php
// H3 - Helpers for Fatfree Framework
// Test methods
// (c) resist | https://github.com/r3sist/h3

require_once '../vendor/autoload.php';

$test = new \resist\H3\Tester();

// Atom
$a = new \resist\H3\Atom(\Web::instance());
$test->expect(is_array($a->getFeedAsArray('')), '');

$test->show();

die;
// Old and deprecated ones
$test->expect(is_callable("H3::render") == true, 'is_callable("H3::render") == true');
$test->expect(is_callable("\Template::render") == true, 'is_callable("\Template::render") == true');

$test->expect(is_callable("H3::gen") == true, 'is_callable("H3::gen")');
$test->expect(strlen(H3::gen(2)) === 2, 'strlen(H3::gen(2)) === 2');
$test->expect(H3::gen(50) != H3::gen(50), 'H3::gen(50) != H3::gen(50)');

$test->expect(is_callable("H3::clean") == true, 'is_callable("H3::clean")');
$test->expect(is_callable("\V3::clean") == true, 'is_callable("\V3::clean")');

$test->expect(is_callable("H3::dump") == true, 'is_callable("H3::dump")');
ob_start();
H3::dump(['x']);
$echo = ob_get_contents();
ob_end_clean();
$test->expect(strpos($echo, '<pre>') === 0, '// position of <pre> === 0');
$test->expect(strpos($echo, '</pre>') > 0, '// position of </pre> > 0');

$test->expect(is_callable("H3::shorten") == true, 'is_callable("H3::shorten")');
$test->expect(H3::shorten("Lorem ipsum", 100) == "Lorem ipsum", 'H3::shorten("Lorem ipsum", 100) == "Lorem ipsum"');
$test->expect(H3::shorten("Lorem ipsum", 2) == "Lo&hellip;", 'H3::shorten("Lorem ipsum", 2) == "Lo&hellip;"');

$test->expect(is_callable("H3::keyUp") == true, 'is_callable("H3::keyUp")');
$test->expect(is_callable("H3::keyDown") == true, 'is_callable("H3::keyDown")');

$test->expect(is_callable("H3::n0") == true, 'is_callable("H3::n0")');
$test->expect(is_callable("H3::n1") == true, 'is_callable("H3::n1")');
$test->expect(is_callable("H3::n2") == true, 'is_callable("H3::n2")');
$test->expect(is_callable("H3::n3") == true, 'is_callable("H3::n3")');
$test->expect(is_callable("H3::n4") == true, 'is_callable("H3::n4")');
$test->expect(H3::n0(1) === 1, 'H3::n0(1) === 1');
$test->expect(H3::n0(1.5) === 2, 'H3::n0(1.5) === 2');
$test->expect(H3::n0(1.4) === 1, 'H3::n0(1.4) === 1');
$test->expect(H3::n1(1) === (float)1, 'H3::n1(1) === (float)1');
$test->expect(H3::n1(1.5) === (float)1.5, 'H3::n1(1.5) === (float)1.5');
$test->expect(H3::n1(1.49) === (float)1.5, 'H3::n1(1.49) === (float)1.5');

$test->expect(is_callable("H3::test") == true, 'is_callable("H3::test")');
$test->expect(is_callable("H3::testMissing") == true, 'is_callable("H3::testMissing")');


$test->missing('keyUp');
$test->missing('keyDown');
$test->missing('getJson');
$test->missing('makeMdStrict');
$test->missing('makeMdLight');
$test->missing('makeMd');
