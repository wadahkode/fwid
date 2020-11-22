<?php
/**
 * Bootstraped
 * 
 * @return object $app
 */
$app = require_once __DIR__.'/lib/bootstrap/app.php';

$test = $app->require('Wadahkode/Test/Test', "Hello world");
return $test->say();