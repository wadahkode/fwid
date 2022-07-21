<?php
/**
 * Bootstraped
 * 
 * @return object $app
 */
$app = require_once __DIR__.'/../bootstrap/app.php';

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

$app->getConfig("app");

/**
 * Debug application
 * 
 * @var boolean true|false
 */
$app->debug(true);

// launch app
return $app->createApp();