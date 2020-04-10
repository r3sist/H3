<?php declare(strict_types = 1);

$classLoc = './../../../structure/structure_app/Ecc/Blc.php';
$className = '\Ecc\Blc';

require_once ($classLoc);
$reflection = new ReflectionClass($className);

$methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);

foreach ($methods as $m) {
    echo $m->name;
    echo "\n";
}