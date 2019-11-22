<?php

include __DIR__ . '/../../../vendor/autoload.php';

use DS\LinkedList\Src\LinkedList;

$Book = new LinkedList();
$Book->insert('abc');
$Book->insert('ab');

foreach ($Book as $k => $v) {
    echo 1;
}

echo 2;