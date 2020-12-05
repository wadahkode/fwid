<?php
/**
 * Bootstraped
 * 
 * @return object $app
 */
$app = require_once __DIR__.'/lib/bootstrap/app.php';

$test = $app->require('Wadahkode/Test/Test');
return $test->say("Hello world!");