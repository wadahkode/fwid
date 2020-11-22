<?php
/**
 * Register Autoload
 * 
 * @author wadahkode
 * @since version v1.0.0
 */
require_once(__DIR__.'/../lib/autoload.php');

/**
 * Create Factory
 * 
 * @param callable $factory
 * @return Autoload::createFactory(callable $factory)
 */
Autoload::createFactory(function($factory){
    $factory->set('zip', true);
    $factory->set('development', true);
    $factory->set('composer', false);
    $factory->set('password', '1234');
    
    $factory->add([
        'App\\' => $factory->basepath .'src/App',
        'Wadahkode\\' => $factory->basepath . 'lib',
    ]);
    
    return $factory->is('vendor')->register();
});

$app = new Wadahkode\App(realpath(rtrim(__DIR__, '/\\')));

return $app;