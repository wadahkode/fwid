<?php
/**
 * Configuration for autoload
 * 
 * @author wadahkode
 * @since version v1.0.0
 */
return [
    /**
     * Composer
     * 
     * To use composer, set it to true or false.
     * 
     * @var boolean true|false
     */
    'composer' => false,
    
    /**
     * Zip reader
     * 
     * Warning: Don't modify!  if you don't want error.
     * 
     * @var boolean true|false
     */
    'zip' => true,
    
    /**
     * Environment library
     * 
     * Set the library environment to development or production.
     * 
     * @var boolean true|false
     */
    'development' => true,
    
    /**
     * Password Zip
     * 
     * Set a password for the zip file!
     * 
     * @default 1234
     */
    'password' => '1234'
];