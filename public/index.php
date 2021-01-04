<?php

$app = require_once __DIR__.'/../lib/bootstrap/app.php';

$app->compatible(array(
  'php_version' => (bool) version_compare(PHP_VERSION, '7.0.0', '<'),
  'extension_loaded' => array(
    'gd', 'mbstring', 'xmlreader'
  )
));

// launch app
return $app->createApp();