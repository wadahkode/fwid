<?php
namespace Wadahkode;

use \Exception;

class Definition
{
    public function __construct(array $constants = [])
    {
        if (empty($constants)) {
            throw new Exception("the array cannot be empty");
        }
        
        array_map(function($name, $value){
            defined($name) or define($name, $value);
        }, array_keys($constants), array_values($constants));
    }
    
}