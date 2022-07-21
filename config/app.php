<?php
/**
 * Mengatur lokasi direktori
 *
 * @author Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 * @since version v1.0.0
 */
$basedir = dirname(__DIR__);

define('APP_PRODUCTION', false);

define('APP_CONFIG_DIR',        $basedir . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
define('APP_CONTROLLER_DIR',    $basedir . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR);
define('APP_MODEL_DIR',         $basedir . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR);
define('APP_HELPERS_DIR',       $basedir . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR);
define('APP_PACKAGES_DIR',      $basedir . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'packages' . DIRECTORY_SEPARATOR);
define('APP_PUBLIC_DIR',        $basedir . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
define('APP_RES_DIR',           $basedir . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR);
define('APP_ROUTE_DIR',         $basedir . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR);
define('APP_STORE_DIR',         $basedir . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR);
define('APP_TEMPLATES_DIR',     $basedir . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR);

define('PHP_EXT', '.php');