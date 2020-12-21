<?php declare(strict_types = 1);
/**
 * Run this script to generate public API documentation via Dirtydoc
 * >php dd.php
 */

use resist\Dirtydoc\MarkdownGenerator;
use resist\H3\Atom;
use resist\H3\Cache;
use resist\H3\Json;
use resist\H3\Logger;
use resist\H3\Md;
use resist\H3\Tester;
use resist\H3\Validator;

require_once(__DIR__.'/vendor/autoload.php');

require_once(__DIR__.'/src/Atom.php');
require_once(__DIR__.'/src/Cache.php');
require_once(__DIR__.'/src/H3.php');
require_once(__DIR__.'/src/Json.php');
require_once(__DIR__.'/src/Logger.php');
require_once(__DIR__.'/src/Md.php');
require_once(__DIR__.'/src/Tester.php');
require_once(__DIR__.'/src/Validator.php');

$classes = [
    Atom::class,
    Cache::class,
    H3::class,
    Json::class,
    Logger::class,
    Md::class,
    Tester::class,
    Validator::class,
];

$md = '';

foreach ($classes as $className) {
    $dd = new MarkdownGenerator($className);
    $md .= $dd->getMarkdown()."\n\n---\n\n";
}

file_put_contents('API.md', $md);
