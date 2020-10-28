<?php
require_once 'src/WordGenerator.php';

$newDocument = new \kxl\WordGenerator\WordGenerator();

$newDocument->addText($argv['text']);
$newDocument->export();
