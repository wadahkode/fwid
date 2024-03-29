<?php
/**
 * Register Autoload
 * 
 * @author wadahkode
 * @since version v1.0.0
 */
require_once __DIR__ . '/loader/autoload.php';

// First launch app
return (new Wadahkode\App(__DIR__))->register(function($app){
  $app->setconfig('config.app');
  $app->getSupportHelper(['app'], true);
  
  return $app;
});