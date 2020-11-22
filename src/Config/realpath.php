<?php

$basedir = dirname(__DIR__, 2);

/**
 * Mengatur path direktori
 *
 * @author Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 * @since version v1.0.0
 * @return array []
 */
return [
    /**
     * FOLDER API Collection Helpers
     *
     * @var array [(key) 'APP_API_DIR' => (value) ...]
     */
    'APP_API_DIR'           => $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Helpers' . DIRECTORY_SEPARATOR,

    /**
     * FOLDER CONFIG
     *
     * @var array [(key) 'APP_CONFIG_DIR' => (value) ...]
     */
    'APP_CONFIG_DIR'        => $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR,

    /**
     * FOLDER Controller
     *
     * @var array [(key) 'APP_CONTROLLER_DIR' => (value) ...]
     */
    'APP_CONTROLLER_DIR'    => $basedir . DIRECTORY_SEPARATOR . 'src'  . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR,

    /**
     * FOLDER Model
     *
     * @var array [(key) 'APP_MODEL_DIR' => (value) ...]
     */
    'APP_MODEL_DIR'    => $basedir . DIRECTORY_SEPARATOR . 'src'  . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Http' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR,

    /**
     * FOLDER HELPERS
     *
     * @var array [(key) 'APP_HELPERS_DIR' => (value) ...]
     */
    'APP_HELPERS_DIR'           => $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Helpers' . DIRECTORY_SEPARATOR,

    /**
     * FOLDER PACKAGES
     *
     * @var array [(key) 'APP_PACKAGES_DIR' => (value) ...]
     */
    'APP_PACKAGES_DIR'      => $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Storage' . DIRECTORY_SEPARATOR . 'packages' . DIRECTORY_SEPARATOR,

    /**
     * FOLDER PUBLIC
     *
     * @var array [(key) 'APP_PUBLIC_DIR' => (value) ...]
     */
    'APP_PUBLIC_DIR'        => $basedir . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR,

    /**
     * FOLDER RESOURCES
     *
     * @var array [(key) 'APP_RES_DIR' => (value) ...]
     */
    'APP_RES_DIR'           => $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR,
    
    /**
     * FOLDER ROUTES
     *
     * @var array [(key) 'APP_ROUTE_DIR' => (value) ...]
     */
    'APP_ROUTE_DIR'         => $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Routes' . DIRECTORY_SEPARATOR,

    /**
     * FOLDER STORAGE
     *
     * @var array [(key) 'APP_STORE_DIR' => (value) ...]
     */
    'APP_STORE_DIR'         => $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Storage' . DIRECTORY_SEPARATOR,
    
    /**
     * FOLDER TEMPLATES
     *
     * @var array [(key) 'APP_TEMPLATES_DIR' => (value) ...]
     */
    'APP_TEMPLATES_DIR'           => $basedir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Templates' . DIRECTORY_SEPARATOR,

];
