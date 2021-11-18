<?php
/**
 * Bootstraped
 * 
 * @return object $app
 */
$app = require_once __DIR__.'/../lib/bootstrap/app.php';

/**
 * Mencocokkan dengan versi yang terinstall dimesin.
 * 
 * @available php_version
 * @available extension_loaded
 * @custom []
 */
$app->compatible(array(
  'php_version' => (bool) version_compare(PHP_VERSION, '7.0.0', '<'),
  'extension_loaded' => array(
    'gd', 'mbstring', 'xmlreader'
  )
));

$app->debug(false);

// launch app
return $app->createApp();