<?php
namespace Wadahkode;

use \Exception;

class Container
{
    public function getConfig($key="")
    {
        if (!array_key_exists($key, $this->config)) {
            throw new Exception("config $key not set!");
        }
        
        $config = file_exists($this->config[$key])
            ? include($this->config[$key])
            : false;
            
        return new Definition($config);
    }
}