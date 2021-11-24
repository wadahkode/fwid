<?php
/**
 * Mengatur lokasi direktori
 *
 * @author Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 * @since version v1.0.0
 */
$basedir = dirname(__DIR__, 2);

define('APP_PRODUCTION', false);

define('APP_API_DIR',           $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Helpers' . DIRECTORY_SEPARATOR);
define('APP_CONFIG_DIR',        $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR);
define('APP_CONTROLLER_DIR',    $basedir . DIRECTORY_SEPARATOR . 'src'  . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR);
define('APP_MODEL_DIR',         $basedir . DIRECTORY_SEPARATOR . 'src'  . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR);
define('APP_HELPERS_DIR',       $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Helpers' . DIRECTORY_SEPARATOR);
define('APP_PACKAGES_DIR',      $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Storage' . DIRECTORY_SEPARATOR . 'packages' . DIRECTORY_SEPARATOR);
define('APP_PUBLIC_DIR',        $basedir . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);
define('APP_RES_DIR',           $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR);
define('APP_ROUTE_DIR',         $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Routes' . DIRECTORY_SEPARATOR);
define('APP_STORE_DIR',         $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Storage' . DIRECTORY_SEPARATOR);
define('APP_TEMPLATES_DIR',     $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR);

define('PHP_EXT', '.php');