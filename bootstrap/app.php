<?php
require_once(__DIR__.'/../lib/autoload.php');

return Autoload::createFactory(function($factory){
    $factory->set('zip', true);
    $factory->set('development', false);
    $factory->set('composer', false);
    $factory->set('password', 'password_here');
    
    $factory->add([
        'App\\' => $factory->basepath .'src/App',
        'Wadahkode\\' => $factory->basepath . 'lib',
    ]);
    
    return $factory->is('vendor')->register();
});