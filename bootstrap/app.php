<?php
/**
 * Register Autoload
 * 
 * @author wadahkode
 * @since version v1.0.0
 */
require_once(__DIR__.'/../lib/autoload.php');

return Autoload::createFactory(function($factory){
    $factory->set('zip', true);
    $factory->set('development', false);
    $factory->set('composer', false);
    $factory->set('password', '1234');
    
    $factory->add([
        'App\\' => $factory->basepath .'src/App',
        'Wadahkode\\' => $factory->basepath . 'lib',
    ]);
    
    return $factory->is('vendor')->register();
});